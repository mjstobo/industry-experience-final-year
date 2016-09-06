<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Symfony\Component\Console\Helper\Table;
use Cake\I18n\Time;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\ExecutePayment;
use Cake\Network\Email\Email;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class ItemsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $user_id = $this->request->session()->read('Auth.User.id');

        $membershipsTable = TableRegistry::get('Memberships');
        $currStatus = $membershipsTable->find()
            ->where(['user_id' => $user_id, 'status_id' => 1])
            ->all();

        $currStatus->toArray();

        if ($currStatus->isEmpty()) {
            $this->redirect(['controller' => 'users', 'action' => 'renew']);
        } else {
            $this->Auth->allow(['LibraryCart', 'view', 'index', 'addToLoan', 'remove', 'search', 'confirm', 'addReserves', 'viewReserves', 'removeReserves', 'loanconfirm', 'hold']);
        }
    }

    public function search()
    {



        $this->paginate = [
            'contain' => ['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies', 'ItemCopies.ItemStatuses'], 'order' => ['Items.title' => 'asc']
        ];

        $filters = ['Title', 'Author', 'Subject', 'Publisher'];
        $this->set('filters', $filters);

        $itemauthor = TableRegistry::get('Items');

        if (!isset($this->request->query['Search'])) {
            $this->set('noSearch', true);
            $this->set('items', $this->paginate($this->Items));
            $this->set('_serialize', ['items']);


        } else {
            $this->set('noSearch', false);
            if(empty($this->request->query['option'])){
                $item = $itemauthor->find()
                    ->contain(['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies'])
                    ->where(['title LIKE' => "%" . $this->request->query['keyword'] . "%"])
                    ->orWhere(['Publishers.publisher_name LIKE' => "%" . $this->request->query['keyword'] . "%"])
                    ->all();

            } else if ($this->request->query['option'] == 0) {
                $item = $this->Items->find()
                    ->contain(['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies'])
                    ->where(['title LIKE' => "%" . $this->request->query['keyword'] . "%"]);
            } else if ($this->request->query['option'] == 1) {
                $item = $itemauthor->find()
                    ->contain(['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies'])
                    ->matching('Authors')
                    ->where(['author_name LIKE' => "%" . $this->request->query['keyword'] . "%"])
                    ->all();
            } else if ($this->request->query['option'] == 2) {
                $item = $itemauthor->find()
                    ->contain(['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies'])
                    ->matching('Subjects')
                    ->where(['subject_name LIKE' => "%" . $this->request->query['keyword'] . "%"])
                    ->all();
            } else if ($this->request->query['option'] == 3) {
                $item = $this->Items->find()
                    ->contain(['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies'])
                    ->where(['Publishers.publisher_name LIKE' => "%" . $this->request->query['keyword'] . "%"])
                    ->all();
            } else {
                $item = $this->paginate($this->Items);
            }


            $this->set('items', $item);
            $this->set('_serialize', ['items']);

        }


    }

    public function index()
    {

        $items = $this->Items->find('all', [
            'contain' => ['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies']
        ]);
        $this->set('items', $items);
        $this->set('_serialize', ['items']);
    }


    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $reserves = TableRegistry::get('Reserves');
        $itemcopiesTable = TableRegistry::get('ItemCopies');
        $itemstatusTable = TableRegistry::get('ItemStatuses');


        $reserve = $reserves->find()
            ->contain(['Items'])
            ->where(['user_id' => $user_id,'item_id'=>$id])
            ->first();


        if($reserve) {

                $copy = $itemcopiesTable->find()
                    ->where(['id'=> $reserve->item_copy_id])
                    ->first();
            $this->set('copy',$copy);

            if ($copy)
            {

                $statuses = $itemstatusTable->find()
                    ->where(['id'=> $copy->item_status_id])
                    ->first();
                $this->set('statuses',$statuses);
            }

            if ($reserve->reserve_status_id == 2) {
                $status = true;
                $pending = false;
                $this->set('status', $status);
                $this->set('pending', $pending);
            }

            elseif($reserve->reserve_status_id == 1) {
                $pending = true;
                $status = false;
                $message = 'You currently have a reservation on this item, we will notify you as soon as a copy becomes available';
                $this->set('message', $message);
                $this->set('pending', $pending);
                $this->set('status', $status);
            }
        }

        elseif(!$reserve)
        {   $pending = false;
            $status = false;
            $this->set('status',$status);
            $this->set('pending', $pending);
        }

        $this->set('reserve',$reserve);


        $item = $this->Items->get($id, [
            'contain' => ['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'ItemCopies', 'ItemCopies.ItemStatuses','Subjects']
        ]);



        $itemcopies = $itemcopiesTable->find()
            ->where(['item_id' => $id])
            ->all();

        $i_c_count = $itemcopies->count();

        $unavail_copies = $itemcopiesTable->find()
            ->where(['item_id' => $id, 'item_status_id !=' => 1])
            ->all();

        $u_c_count = $unavail_copies->count();

        if($u_c_count == $i_c_count){

            $this->set('avail_status', 0);
        } else {

            $this->set('avail_status', 1);
        }

        $this->set('item', $item);
        $this->set('_serialize', ['item']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }
        $catalogues = $this->Items->Catalogues->find('list', ['limit' => 200]);
        $itemStatuses = $this->Items->ItemStatuses->find('list', ['limit' => 200]);
        $authors = $this->Items->Authors->find('list', ['limit' => 200]);
        $itemsubjects = $this->Items->ItemSubjects->find('list', ['limit' => 200]);
        $years = $this->Items->Years->find('list');
        $publishers = $this->Items->Publishers->find('list', ['limit' => 200]);
        $itemTypes = $this->Items->ItemTypes->find('list', ['limit' => 200]);
        $this->set(compact('item', 'years', 'catalogues', 'publishers', 'itemTypes'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }
        $languages = $this->Items->Languages->find('list', ['limit' => 200]);
        $catalogues = $this->Items->Catalogues->find('list', ['limit' => 200]);
        $authors = $this->Items->Authors->find('list', ['limit' => 200]);
        $itemsubjects = $this->Items->ItemSubjects->find('list', ['limit' => 200]);
        $years = $this->Items->Years->find('list');
        $publishers = $this->Items->Publishers->find('list', ['limit' => 200]);
        $itemTypes = $this->Items->ItemTypes->find('list', ['limit' => 200]);
        $this->set(compact('item', 'years', 'catalogues', 'publishers', 'itemTypes'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function addToLoan($id = null)
    {

        if ($this->request->session()->check('Auth.User.id')) {
            $user_id = $this->request->session()->read('Auth.User.id');

            $itemCopiesTable = TableRegistry::get('ItemCopies');
            $reserves = TableRegistry::get('Reserves');

            $reserve = $reserves->find()
                ->contain(['ItemCopies'])
                ->where(['item_copy_id'=>$id,'reserve_status_id'=>2])
                ->first();
            //echecking if copy has an active reserve
            $this->set('reserve',$reserve);

            $itemCopy = $itemCopiesTable->find()
                ->contain(['ItemStatuses'])
                ->where(['ItemCopies.id' => $id])
                ->toArray();

            if($itemCopy[0]->item_status_id != 1 && $itemCopy[0]->item_status_id != 5) {
                //checking to see if the item is not on shelf and not reserved, this means the item is unavailable
                $this->Flash->error('Copy unavailable - please select another copy.');
                $this->redirect(['controller' => 'items', 'action' => 'view', $itemCopy[0]->item_id]);

            } else {
                // item is on shelf or reserved.
                 if($reserve)
                 {
                     //item copy has a reserve

                if($reserve->user_id == $user_id)
                    //if the user has a reserve, let them borrow the item
                {
                    // let it add

                    $currentLoan = TableRegistry::get('Loans');
                    $query = $currentLoan->find()
                        ->where(['return_status_id =' => 1, 'user_id' => $user_id])
                        ->all();

                    $results = $query->isEmpty();

                    if ($results) {

                        $loans = TableRegistry::get('Loans');
                        $loan = $loans->newEntity(['user_id' => $user_id, 'return_status_id' => 1]);
                        $loan->all_returned = 0;

                        if ($loans->save($loan)) {

                            $loan_items = TableRegistry::get('LoanItemCopies');
                            $loan_item = $loan_items->newEntity(['user_id' => $user_id, 'loan_id' => $loan->id, 'item_copy_id' => $id]);
                            if ($loan_items->save($loan_item)) {
                                $this->Flash->success(__('Successfully added to your Library Cart.'));
                                return $this->redirect(['controller' => 'Items', 'action' => 'librarycart']);

                            }
                        }
                    }


                    $firstLoan = $query->first();
                    $loan_items = TableRegistry::get('LoanItemCopies');

                    $currentItems = $loan_items->find()
                        ->where(['item_copy_id' => $id, 'loan_id' => $firstLoan->id])
                        ->all();

                    if (!$currentItems->isEmpty()) {

                        $this->Flash->error('Unable to add to cart - item already in cart');
                        $this->redirect(['controller' => 'items', 'action' => 'librarycart']);

                    } else {

                        $loan_item = $loan_items->newEntity(['user_id' => $user_id, 'loan_id' => $firstLoan->id, 'item_copy_id' => $id]);
                        if ($loan_items->save($loan_item)) {
                            $this->Flash->success(__('Item has been added to your Library Cart.'));
                            $this->redirect(['controller' => 'items', 'action' => 'librarycart']);
                        }

                    }


                } else
                {
                    $this->Flash->error('This Copy is reserved');
                    $this->redirect(['controller' => 'items', 'action' => 'view', $itemCopy[0]->item_id]);
                    //item is reserved, but not to this user.
                }
                 } else {
                    // item copy is not reserved

                    $currentLoan = TableRegistry::get('Loans');
                    $query = $currentLoan->find()
                        ->where(['return_status_id =' => 1, 'user_id' => $user_id])
                        ->all();

                    $results = $query->isEmpty();

                    if ($results) {

                        $loans = TableRegistry::get('Loans');
                        $loan = $loans->newEntity(['user_id' => $user_id, 'return_status_id' => 1]);
                        if ($loans->save($loan)) {

                            $loan_items = TableRegistry::get('LoanItemCopies');
                            $loan_item = $loan_items->newEntity(['user_id' => $user_id, 'loan_id' => $loan->id, 'item_copy_id' => $id]);
                            if ($loan_items->save($loan_item)) {
                                $this->Flash->success(__('Item has been added to your cart.'));
                                return $this->redirect(['controller' => 'Items', 'action' => 'librarycart']);

                            }
                        }
                    }


                    $firstLoan = $query->first();
                    $loan_items = TableRegistry::get('LoanItemCopies');

                    $currentItems = $loan_items->find()
                        ->where(['item_copy_id' => $id, 'loan_id' => $firstLoan->id])
                        ->all();

                    if (!$currentItems->isEmpty()) {

                        $this->Flash->error('Unable to add to cart - item already in cart');
                        $this->redirect(['controller' => 'items', 'action' => 'librarycart']);

                    } else {

                        $loan_item = $loan_items->newEntity(['user_id' => $user_id, 'loan_id' => $firstLoan->id, 'item_copy_id' => $id]);
                        if ($loan_items->save($loan_item)) {
                            $this->Flash->success(__('Item has been added to your cart.'));
                            $this->redirect(['controller' => 'items', 'action' => 'librarycart']);
                        }

                    }
                }
            }
        }
    }


    public function remove($id = null)
    {


        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');

            $currentLoan = TableRegistry::get('Loans');

            $query = $currentLoan->find()
                ->where(['user_id' => $user_id])
                ->all();

            $results = $query->isEmpty();

            if ($results) {

                $status = false;
                $cart_status = "Library Cart is currently empty.";
                $this->set('cart_status', $cart_status);
                $this->set('status', $status);

            } else {

                $this->loadModel('LoanItemCopies');

                $firstLoan = $query->first();
                $cart_items = TableRegistry::get('LoanItemCopies');
                $cart_item = $cart_items->find()
                    ->select('id')
                    ->where(['loan_id' => $firstLoan->id, 'id' => $id])
                    ->first();

                $entity = $this->LoanItemCopies->get($id);

                if ($this->LoanItemCopies->delete($entity)) {

                    $this->Flash->success('Removed');
                    return $this->redirect(['action' => 'librarycart']);
                } else {

                    $this->Flash->error('Unable to Remove');
                    return $this->redirect(['action' => 'librarycart']);
                }

            }
        }
    }


    public function LibraryCart()
    {
        $this->loadModel('Items');

        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');
            $currentLoan = TableRegistry::get('Loans');
            $query = $currentLoan->find()
                ->where(['return_status_id =' => 1, 'user_id' => $user_id])
                ->all();

            $isEmpty = $query->isEmpty();
            $this->set('isEmpty', $isEmpty);

            if ($isEmpty) {
                $loans = TableRegistry::get('Loans');
                $loan = $loans->newEntity(['user_id' => $user_id, 'return_status_id' => 1 ]);
                $loan->all_returned=0;



                if ($loans->save($loan)) {

                    $this->set('cart_status', 'Library Cart is empty.');
                    $this->set('cart_items', false);
                    $this->set('loan_id', $loan->id);
                }
            } else {
                $firstLoan = $query->first();
                $cart_items = TableRegistry::get('LoanItemCopies');
                $cart_item = $cart_items->find()
                    ->contain(['ItemCopies', 'ItemCopies.Items.Authors', 'ItemCopies.Items.ItemTypes'])
                    ->where(['loan_id' => $firstLoan->id])
                    ->toArray();

                $this->set('cart_items', $cart_item);
                $this->set('_serialize', ['cart_items']);
                $this->set('loan_id', $firstLoan->id);
                if (!$cart_item) {
                    $this->set('cart_status', 'Library Cart is empty.');
                }
            }
        }
    }




    public function removeReserves($id = null)
    {


        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');

            $currentReserve = TableRegistry::get('ReserveItems');

            $query = $currentReserve->find()->where(['user_id' => $user_id])
                ->all();

            $results = $query->isEmpty();
            $this->set('results', $results);

            if ($results) {

                $status = false;
                $reserve_status = "You currently have no reserves";
                $this->set('reserve_status', $reserve_status);
                $this->set('status', $status);

            } else {

                $this->loadModel('Items');
                $this->loadModel('ReserveItems');


                $reserve_items = TableRegistry::get('ReserveItems');
                $reserve_item = $reserve_items->find()
                    ->select('id')
                    ->where(['id' => $id]);
                $this->set('reserve_item', $reserve_item);


                $entity = $this->ReserveItems->get($id);

                if ($this->ReserveItems->delete($entity)) {

                    $this->Flash->success('Removed');
                    return $this->redirect(['action' => 'viewReserves']);
                } else {

                    $this->Flash->error('Unable to Remove');
                    return $this->redirect(['action' => 'viewReserves']);
                }

            }
        }
    }

    public function addReserves($id = null)
    {


        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');
            $currentReserve = TableRegistry::get('ReserveItems');

            $date = time::now();
            $expiry = time::now();

            $expirydate = $expiry->addDays(14);

            $reserve_item = $currentReserve->newEntity(['user_id' => $user_id, 'return_status_id' => 1, 'item_id' => $id, 'date_reserved' => $date, 'reserve_expiry' => $expirydate]);


            if ($currentReserve->save($reserve_item)) {
                $this->Flash->success(__('The Reserve item has been saved.'));
                return $this->redirect(['action' => 'index']);

            }

        }
    }

    public function hold($id = null){

      $loansTable = TableRegistry::get('Loans');

        if ($this->request->session()->check('Auth.User.id')) {
          $user_id = $this->request->session()->read('Auth.User.id');

      $loan = $loansTable->find()
      ->where(['Loans.id' => $id, 'user_id' => $user_id])
      ->contain(['ItemCopies', 'Users'])
      ->first();

      if(!$loan){

        $this->Flash->set('There was an error finding cart items. Try again', ['element' => 'error']);
        $this->redirect(['action' => 'confirm', $id]);
      }

      $cart_items = TableRegistry::get('LoanItemCopies');
      $cart_item = $cart_items->find()
          ->contain(['ItemCopies', 'ItemCopies.Items.Authors', 'ItemCopies.Items.ItemTypes', 'ItemCopies.Items'])
          ->where(['loan_id' => $loan->id])
          ->all();


      $reservesTable = TableRegistry::get('Reserves');
      $itemCopyTable = TableRegistry::get('ItemCopies');
      $date = time::today();
      $return = time::today();
      $return->addWeeks(2);

      $this->set('cart_items', $cart_item);
          foreach($cart_item as $item){

            $newReserve = $reservesTable->newEntity();
            $newReserve->item_id = $item->item_copy->item_id;
            $newReserve->item_copy_id = $item->item_copy_id;
            $newReserve->user_id = $user_id;
            $newReserve->request_date = $date;
            $newReserve->reservation_date = $date;
            $newReserve->end_date = $return;
            $newReserve->reserve_status_id = 2;
            $reservesTable->save($newReserve);
            $item->item_copy->item_status_id = 5;
            $itemCopy = $item->item_copy;
            $itemCopyTable->save($itemCopy);
          }

          $loansTable = TableRegistry::get('Loans');
          $loan->return_status_id = 3;
          $loansTable->save($loan);
          $this->Flash->set('Items are reserved for two weeks', ['element' => 'success']);

            $user_id = $this->request->session()->read('Auth.User.id');
            $user_fname = $this->request->session()->read('Auth.User.given_name');
            $user_lname = $this->request->session()->read('Auth.User.family_name');
            $user_address = $this->request->session()->read('Auth.User.street_address');
            $user_state = $this->request->session()->read('Auth.User.state_id');
            $user_suburb = $this->request->session()->read('Auth.User.suburb');
            $user_postcode = $this->request->session()->read('Auth.User.postcode');
            $user_email = $this->request->session()->read('Auth.User.email_address');
            $user_number = $this->request->session()->read('Auth.User.phone_number');
            $user_fname = $this->request->session()->read('Auth.User.given_name');
            $user_lname = $this->request->session()->read('Auth.User.family_name');
            $user_email = $this->request->session()->read('Auth.User.email_address');
            $date = Time::today();
            $return = $date->addWeeks(2);



            $email1 = new Email('default');
            $email1->transport();
            $email1->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                ->template('hold_item')
                ->viewVars(['cart'=> $cart_item,'fname'=>$user_fname,'lname'=>$user_lname,'today'=>$date,'return'=>$return])
                ->emailformat('html')
                ->to($user_email)
                ->subject('EDV: Library Hold')
                ->send();

          $email2 = new Email('default');
            $email2->transport();
            $email2->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
            	->template('admin_return_item')
               ->viewVars(['cart'=> $cart_item,'fname'=>$user_fname,'lname'=>$user_lname,'today'=>$date,'return'=>$return])
                ->emailformat('html')
                ->to(['reception@eatingdisorders.org.au'])
                ->subject('EDV: Item Reserved')
                ->send();

    }
  }


    public function confirm($id = null)
    {

        $this->loadModel('Items');

        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');
            $user_state = $this->request->session()->read('Auth.User.state_id');
            $loansTable = TableRegistry::get('Loans');

            $postageTable = TableRegistry::get('Postages');

            $postage = $postageTable->find()
                ->where(['state_id' => $user_state])
                ->first();

            $price = $postage->amount;
            $total = $price;


            $this->set('postage', $price);
            $currentLoan = $loansTable->find()
                ->where(['id =' => $id, 'user_id' => $user_id])
                ->all();

            $userTable = TableRegistry::get('Users');
            $user_query = $userTable->find()
                ->contain(['States'])
                ->where(['Users.id' => $user_id, 'state_id' => $user_state])
                ->all();

            $user = $user_query->toArray();
            $this->set('user', $user);

            $isEmpty = $currentLoan->isEmpty();
            $this->set('isEmpty', $isEmpty);

            if ($isEmpty) {
                $this->redirect(['controller' => 'items', 'action' => 'librarycart']);
            } else {
                $firstLoan = $currentLoan->first();
                $cart_items = TableRegistry::get('LoanItemCopies');
                $cart_item = $cart_items->find()
                    ->contain(['ItemCopies.Items', 'ItemCopies.Items.Authors', 'ItemCopies.Items.ItemTypes', 'Loans'])
                    ->where(['loan_id' => $firstLoan->id])
                    ->all();
                $this->set('cart_items', $cart_item);
                $this->set('_serialize', ['cart_items']);

                $cart_item->toArray();

                if (!$cart_item) {
                    $this->redirect(['controller' => 'items', 'action' => 'librarycart']);
                }
            }
        } else {
            $this->redirect(['controller' => 'users', 'action' => 'home']);
        }

        if ($this->request->is('post')) {

            $cart_items = TableRegistry::get('LoanItemCopies');
            $books = $cart_items->find()->where(['item_type_id' => 1, 'loan_id' => $firstLoan->id])->contain(['ItemCopies.Items', 'ItemCopies.Items.ItemTypes', 'Loans'])->count();
            $dvds = $cart_items->find()->where(['item_type_id' => 2, 'loan_id' => $firstLoan->id])->contain(['ItemCopies.Items', 'ItemCopies.Items.ItemTypes', 'Loans'])->count();

            $isViolated = false;

            if ($isViolated == false) {

                if ($books > 2) {
                    $isViolated = true;
                }

                if ($dvds > 1) {
                    $isViolated = true;
                }
            }

            if ($isViolated == true) {
                $this->Flash->error('You may only loan 2 (Two) Books and 1 (One) DVD.');
                $this->redirect(['controller' => 'Items', 'action' => 'confirm']);
            } else {

              $apiTable = TableRegistry::get('ApiKeys');
              $ppClient = $apiTable->find()
              ->where(['id' => 1])
              ->first();
              $ppSecret = $apiTable->find()
              ->where(['id' => 2])
              ->first();

               $apiContext = new ApiContext(new OAuthTokenCredential($ppClient->key, $ppSecret->key));

                $payer = new Payer();
                $payer->setPaymentMethod('paypal');


                $description = "Postage";

                $postageTable = TableRegistry::get('Postages');

                $postage = $postageTable->find()
                    ->where(['state_id' => $user_state])
                    ->first();

                $price = $postage->amount;
                $total = $price;


                $this->set('postage', $price);

                $item1 = new Item();
                $item1->setName('EDV Library - ' . $description)
                    ->setCurrency('AUD')
                    ->setQuantity(1)
                    ->setPrice($price);

                $itemList = new ItemList();
                $itemList->setItems([$item1]);

                $details = new Details();
                $details->setShipping(0)
                    ->setSubtotal($price);

                $amount = new Amount();
                $amount->setCurrency('AUD')
                    ->setTotal($total)
                    ->setDetails($details);

                $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($itemList)
                    ->setDescription('Eating Disorders Victoria')
                    ->setInvoiceNumber(uniqid());

                $redirectUrls = new RedirectUrls();
                $redirectUrls->setReturnUrl(Router::url([
                    'controller' => 'items',
                    'action' => 'loanconfirm',
                    '?' => ['success' => 'true'], '_full' => true]))
                    ->setCancelUrl(Router::url([
                        'controller' => 'items',
                        'action' => 'loanconfirm',
                        '?' => ['success' => 'false'], '_full' => true]));

                $payment = new Payment();
                $payment->setIntent('sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirectUrls)
                    ->setTransactions([$transaction]);

                $request = clone $payment;

                try {
                    $payment->create($apiContext);
                } catch (Exception $ex) {
                    echo "Exception: " . $ex->getMessage() . PHP_EOL;
                    echo "<pre>";
                    var_dump($ex->getData());
                    exit(1);
                }

                $approvalUrl = $payment->getApprovalLink();
                $session = $this->request->session();
                $payments = TableRegistry::get('Settlements');
                $date = time::now();
                $newPayment = $payments->newEntity([
                    'payment_method_id' => 1,
                    'user_id' => $user_id,
                    'payment_type_id' => 4,
                    'amount' => $total,
                    'payment_date' => $date
                ]);


                $session->write('loan', $firstLoan);
                $session->write('cart_item', $cart_item);
                $session->write('payment', $newPayment);
                $session->write('user', $this->Auth->user);
                $this->redirect($approvalUrl);


            }
        }
    }

    public function loanconfirm()
    {

      $apiTable = TableRegistry::get('ApiKeys');
      $ppClient = $apiTable->find()
      ->where(['id' => 1])
      ->first();
      $ppSecret = $apiTable->find()
      ->where(['id' => 2])
      ->first();

       $apiContext = new ApiContext(new OAuthTokenCredential($ppClient->key, $ppSecret->key));        if (isset($_GET['success']) && $_GET['success'] == 'true') {

            $user = $this->request->session()->read('user');

            $paymentId = $_GET['paymentId'];
            $payment = Payment::get($paymentId, $apiContext);

            $execution = new PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);
            try {
                $result = $payment->execute($execution, $apiContext);
                try {
                    $payment = Payment::get($paymentId, $apiContext);
                } catch (Exception $ex) {
                    $this->Flash->error('There was an error processing your payment.');
                    exit(1);
                }
            } catch (Exception $ex) {
                $this->Flash->error('There was an error processing your payment.');
                exit(1);
            }

            $payment_details = $this->request->session()->read('payment');
            $payments = TableRegistry::get('Settlements');
            $newPayment = $payments->newEntity();
            $newPayment = $payment_details;
            $user_id = $this->request->session()->read('Auth.User.id');
            $user_fname = $this->request->session()->read('Auth.User.given_name');
            $user_lname = $this->request->session()->read('Auth.User.family_name');
            $user_email = $this->request->session()->read('Auth.User.email_address');
            $user_address = $this->request->session()->read('Auth.User.street_address');
            $user_postcode = $this->request->session()->read('Auth.User.postcode');
            $user_suburb = $this->request->session()->read('Auth.User.suburb');
            $user_state = $this->request->session()->read('Auth.User.state_id');
            $stateTable = TableRegistry::get('States');
            $state = $stateTable->find()
                        ->where(['id'=> $user_state])
                        ->first();
            $user_state = $state->state_name;
            $cart_items = TableRegistry::get('LoanItemCopies');
            $date = Time::today();
            $return = $date->addWeeks(2);


            if ($payments->save($newPayment)) {
                $firstLoan = $this->request->session()->read('loan');
                $cart_item = $this->request->session()->read('cart_item');
                $itemsTable = TableRegistry::get('ItemCopies');
                $loansTable = TableRegistry::get('Loans');
                $reservesTable = TableRegistry::get('Reserves');
                $cart = $cart_items->find()
                    ->contain(['ItemCopies.Items', 'ItemCopies.Items.Authors', 'ItemCopies.Items.ItemTypes', 'Loans', 'ItemCopies.Items.ItemTypes'])
                    ->where(['loan_id' => $firstLoan->id])
                    ->all();



                foreach ($cart_item as $item) {

                    $copy = $reservesTable->find()
                        ->contain(['ItemCopies'])
                        ->where(['item_copy_id'=> $item->item_copy_id, 'reserve_status_id'=> 2])
                        ->first();

                    $this->set('copy',$copy);

                    if($copy)
                    {
                        if($copy->user_id == $user_id)
                        {
                        $copy->reserve_status_id = 4;
                        $reservesTable->save($copy);
                    } else {
                            $this->Flash->error( $item->title. 'is currently reserved to another member.');
                            return $this->redirect(['action'=>'librarycart']);
                        }


                        }

                    $item = $itemsTable->get($item->item_copy_id);
                    $item->item_status_id = 3;
                    $itemsTable->save($item);

                }

                $date = time::today();
                $return = time::today();
                $return->addWeeks(2);
                $cart_items = TableRegistry::get('LoanItemCopies');
                $firstLoan->date_borrowed = $date;
                $firstLoan->return_date = $return;
                $firstLoan->return_status_id = 2;
                $loansTable->save($firstLoan);


                $index = $cart->first();
                $index1 = $cart->skip(1)->first();
                $index2 = $cart->skip(2)->first();

                $user_address = $user_address.' '.$user_suburb.' '.$user_postcode.' '.$user_state;

                $email1 = new Email('default');
                $email1->transport();
                $email1->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                    ->template('loan_item')
                    ->viewVars(['cart'=> $cart,'fname'=>$user_fname,'lname'=>$user_lname,'today'=>$date,'return'=>$return])
                    ->emailformat('html')
                    ->to([$user_email])
                    ->subject('EDV: Library Loan')
                    ->send();

		$email2 = new Email('default');
                $email2->transport();
                $email2->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                    ->template('admin_item_loan')
                    ->viewVars(['cart'=> $cart,'fname'=>$user_fname,'lname'=>$user_lname,'today'=>$date,'return'=>$return, 'user_address'=>$user_address])
                    ->emailformat('html')
                    ->to('reception@eatingdisorders.org.au')
                    ->subject('EDV: Library Loan - postage required')
                    ->send();






                $this->Flash->success('Payment successful. Items successfully borrowed.');
               return $this->redirect(['action' => 'librarycart']);


            } else {
                $this->Flash->error('There was an error processing your request.');
            }
        } else {

            return $this->redirect(['action' => 'home']);
        }


    }
}
