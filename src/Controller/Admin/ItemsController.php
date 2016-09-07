<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Database\Schema\Table;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

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

    public function returns($id = null){

        $itemCopiesTable = TableRegistry::get('ItemCopies');
        $reserves = TableRegistry::get('Reserves');
        $time = time::today();

        $itemcopy = $itemCopiesTable->find()
            ->contain(['Items'])
            ->where(['ItemCopies.id' => $id])
            ->first();

        if($itemcopy) {

            $loanitemcopyTable = TableRegistry::get('LoanItemCopies');
            $loanitemcopies = $loanitemcopyTable->find()
                ->where(['item_copy_id'=> $itemcopy->id ])
                ->orderDesc('id')
                ->first();

            if ($itemcopy->item_status_id == 1) {
                $this->Flash->error(__("'".$itemcopy->item->title."'".' is already On Shelf'));
                $this->redirect(['action' => 'barcodeSearch']);

            } elseif ($itemcopy->item_status_id == 5) {
                $this->Flash->error(__('Item is already reserved'));
                $this->redirect(['action' => 'barcodeSearch']);
            }


            elseif ($itemcopy->item_status_id == 3) {

                $reserve = $reserves->find()
                    ->contain(['Users', 'Users.Salutations', 'Items', 'Items.ItemCopies'])
                    ->where(['item_id' => $itemcopy->item_id, 'reserve_status_id' => 1])
                    ->orderAsc('request_date')
                    ->first();



                if ($reserve) {

                    $date = time::today();
                    $reserve->item_copy_id = $itemcopy->id;
                    $reserve->reservation_date = $date;
                    $expire = time::today();
                    $expire->addDays(14);
                    $reserve->end_date = $expire;
                    $reserve->reserve_status_id = 2;
                    $itemcopy->item_status_id = 5;
                    $itemCopiesTable->save($itemcopy);
                    $reserves->save($reserve);
                    $user_salutation = $reserve->user->salutation->salutation_name;
                    $user_fname = $reserve->user->given_name;
                    $user_lname = $reserve->user->family_name;
                    $user_id = $reserve->user_id;
                    $user_email = $reserve->user->email_address;
                    $user_phone = $reserve->user->phone_number;

                    $email_date = $expire->i18nFormat('d MMMM, YYY');


                    $email = new Email('default');

                    $email->transport();

                    $email->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                        ->to($user_email)//change to $user_email
                        ->template('reservedItemNotificationReturn')
                        ->viewVars(['fname'=> $user_fname, 'lname'=>$user_lname, 'title'=>$reserve->item->title])
                        ->emailformat('html')
                        ->subject('Item Reservation')
                        ->send();

                    $email1 = new Email('default');

                    $email1->transport();

                    $email1->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                        ->to('mjstobo@gmail.com')//change to edv email
                        ->subject('Item Reservation')
                        ->message('Dear EDV, ' . "\n \n" . 'The following user has a reserve on an item, please put the item on the side.' . "\n \n" . 'User ID: ' . $user_id . "\n" . 'Name: ' . $user_salutation .
                            $user_fname . ' ' . $user_lname . 'Phone: ' . $user_phone . "\n" . 'Email: ' . $user_email . "\n \n" . 'The requested copy' . "\n" . 'Barcode: ' . $reserve->item->item_copies[0]->barcode . "\n" . 'Title: ' . $reserve->item->title)
                        ->send();

                    $loanitemcopies->copy_returned =1;
                    $loanitemcopies->date_returned = $time;
                    $loanitemcopyTable->save($loanitemcopies);
                    $this->Flash->success(__("'".$itemcopy->item->title."'".' is reserved. Please place aside.'));
                    $this->redirect(['action' => 'barcodeSearch']);
                } elseif (!$reserve) ;
                {

                    $itemcopy->item_status_id = 1;
                    $itemCopiesTable->save($itemcopy);
                    $loanitemcopies->copy_returned =1;
                    $loanitemcopies->date_returned = $time;
                    $loanitemcopyTable->save($loanitemcopies);
                    $this->Flash->success(__("'".$itemcopy->item->title."'".' has been successfully returned'));
                    $this->redirect(['action' => 'barcodeSearch']);
                }
            }

        }
        elseif (!$itemcopy) {
            $this->Flash->error(__('The ID is invalid, Please try again'));
            $this->redirect(['action' => 'barcodeSearch']);
        }


    }


    public function addToLoan($id = null)
    {

        $this->layout = 'admin';

        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');

            $currentLoan = TableRegistry::get('Loans');

            $query = $currentLoan->find()
                ->where(['return_status_id =' => 1, 'user_id' => $user_id])
                ->all();


            $results = $query->isEmpty();


            if ($results) {

                $loans = TableRegistry::get('Loans');
                $loan = $loans->newEntity(['user_id' => $user_id, 'return_status_id' => 1]);


                if ($loans->save($loan)) {

                    $loan_items = TableRegistry::get('LoanItems');
                    $loan_item = $loan_items->newEntity(['user_id' => $user_id, 'loan_id' => $loan->id, 'item_id' => $id]);
                    if ($loan_items->save($loan_item)) {
                        $this->Flash->success(__('The Loan item has been saved.'));
                        return;

                    }
                }
            }

            $firstLoan = $query->first();
            $loan_items = TableRegistry::get('LoanItems');
            $loan_item = $loan_items->newEntity(['user_id' => $user_id, 'loan_id' => $firstLoan->id, 'item_id' => $id]);
            if ($loan_items->save($loan_item)) {
                $this->Flash->success(__('The Loan item has been saved.'));
                return;
            }

        }
    }

    public function barcodeSearch()
    {

        $this->layout = 'admin';

        $itemCopiesTable = TableRegistry::get('ItemCopies');
        $loansTable = TableRegistry::get('Loans');
        $loanItemCopiesTable = TableRegistry::get('LoanItemCopies');
        $this->set('search', false);

        if ($this->request->is('post')) {

            $itemCopy = $itemCopiesTable->find()
                ->where(['ItemCopies.barcode' => $this->request->data['barcode']])
                ->contain(['Items', 'Items.Authors', 'Items.Subjects', 'Items.ItemTypes', 'Items.Publishers', 'Items.Years', 'ItemStatuses'])
                ->all();

            $item = $itemCopy->first();

            if ($itemCopy->isEmpty()) {

                $this->Flash->set('Invalid Barcode', ['element' => 'error']);
                $this->redirect(['action' => 'barcodeSearch']);

            } else {

                $lic = $loanItemCopiesTable->find()
                    ->where(['item_copy_id' => $item->id])
                    ->contain(['Loans', 'Loans.Users'])
                    ->orderDesc('LoanItemCopies.id')
                    ->first();

                $this->set('search', true);
                $this->set('item', $item);
                $this->set('lic', $lic);

            }


        }

    }

    public function remove($id = null)
    {


        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');

            $currentLoan = TableRegistry::get('Loans');

            $query = $currentLoan->find()
                ->where(['return_status_id =' => 1, 'user_id' => $user_id])
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
                    return $this->redirect(['controller'=>'Loans','action' => 'process']);
                } else {

                    $this->Flash->error('Unable to Remove');
                    return $this->redirect(['controller'=>'Loans','action' => 'process']);
                }

            }
        }
    }


    public function LibraryCart()
    {
        $this->loadModel('Items');
        $this->loadModel('Subjects');
        $this->layout = 'admin';


        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');

            $currentLoan = TableRegistry::get('Loans');

            $query = $currentLoan->find()
                ->where(['return_status_id =' => 1, 'user_id' => $user_id])
                ->all();

            $results = $query->isEmpty();


            if ($results) {

                $status = false;
                $cart_status = "Library Cart is currently empty.";
                $this->set('cart_status', $cart_status);
                $this->set('status', $status);

            } else {
                $firstLoan = $query->first();

                $cart_items = TableRegistry::get('LoanItems');
                $cart_item = $cart_items->find()
                    ->contain(['Items', 'Items.Authors'])
                    ->where(['loan_id' => $firstLoan->id])
                    ->toArray();

                $status = true;

                $this->set('cart_items', $cart_item);
                $this->set('_serialize', ['cart_items']);
                $this->set('status', $status);
            }
        }
    }
    public function removeReserves($id = null)
    {
        $this->loadModel('Reserves');
        $entity = $this->Reserves->get($id);

        if ($this->Reserves->delete($entity)) {

            $this->Flash->success('Removed');
            return $this->redirect(['controller'=>'Users','action' => 'view',$entity->user_id]);
        } else {

            $this->Flash->error('Unable to Remove');
            return $this->redirect(['controller'=>'Users','action' => 'view',$entity->user_id]);
        }

    }
    public function viewReserves()
    {

        $this->loadModel('Items');
        $this->loadModel('ReserveItems');
        $this->loadModel('Authors');
        $this->layout = 'admin';


        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');

            $currentreserve = TableRegistry::get('ReserveItems');

            $query = $currentreserve->find('list');


            $results = $query->isEmpty();



            if ($results) {

                $status = false;
                $reserve_status = "You currently have no reserves";
                $this->set('reserve_status', $reserve_status);
                $this->set('status', $status);
                $this->set('results',$results);

            } else {


                $reserve_items = TableRegistry::get('ReserveItems');
                $reserve_item = $reserve_items->find()
                    ->contain(['Items'])
                    ->toArray();

                $status = true;

                $this->set('reserve_items', $reserve_item);
                $this->set('_serialize', ['reserve_items']);
                $this->set('status', $status);
                $this->set('results',$results);
                $this->set('reserve_status','There are no reserves');


            }
        }
    }





    public function index()
    {
        $this->layout = 'admin';
        $items = $this->Items->find('all', [
            'contain' => ['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies']
        ]);

        $this->set('items', $items);
        $this->set('_serialize', ['items']);
    }

    public function viewonloan(){
        $this->layout = 'admin';
        $itemsTable = TableRegistry::get('ItemCopies');

        $items = $itemsTable->find()
            ->contain(['Items', 'Items.Years', 'Items.Authors', 'Items.Subjects'])
            ->where(['item_status_id' => 3])
            ->all();

        $this->set('items', $items);
        $this->set('_serialize', ['items']);
    }

    public function viewavailable(){
        $this->layout = 'admin';
        $itemsTable = TableRegistry::get('ItemCopies');
        $items = $itemsTable->find('all', [
            'contain' => ['Items.Years', 'Items.Authors', 'Items.Subjects']
        ])
        ->where(['item_status_id' => 1])
        ->all();

        $this->set('items', $items);
        $this->set('_serialize', ['items']);
    }



    public function addReserves($id = null)
    {
        $this->layout = 'admin';


        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');
            $currentReserve = TableRegistry::get('ReserveItems');

            $date = time::now();
            $expiry = time::now();

            $expirydate= $expiry->addDays(14);

            $reserve_item = $currentReserve->newEntity(['user_id' => $user_id,'return_status_id' => 1, 'item_id' => $id,'date_reserved' =>$date,'reserve_expiry' => $expirydate]);


            if ($currentReserve->save($reserve_item)) {
                $this->Flash->success(__('The Reserve item has been saved.'));
                return $this->redirect(['action' => 'index']);

            }

        }
    }

    public function view($id = null)
    {   $this->layout = 'admin';
        $item = $this->Items->get($id, [
            'contain' => [ 'Catalogues','Years', 'Publishers', 'ItemTypes','Authors', 'ItemCopies', 'ItemCopies.ItemStatuses','ShelfSections']
        ]);
        $this->set('item', $item);
        $this->set('_serialize', ['item']);

    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */

    public function addItem()
    {
        $this->layout = 'admin';
        $this->loadModel('Subjects');
        $this->loadModel('Authors');


        $this->loadModel('ShelfSections');
        $shelfcategory = $this->ShelfSections->find('list')
            ->orderASC('shelf_name')
            ->all();
        $this->set('shelf_category',$shelfcategory);



        $itemsTable = TableRegistry::get('Items');
        $itemAuthorsTable = TableRegistry::get('ItemAuthors');
        $publishersTable = TableRegistry::get('Publishers');
        $item = $this->Items->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data();

            $publishers = $publishersTable->newEntity();
                $item = $this->Items->patchEntity($item, $data);
                $authors = $this->Authors->newEntities($data['authors']);
                if (!$item->errors()) {
                    foreach ($authors as $author) {
                        $this->Authors->save($author);
                    }
                    if ($data['publisher_name']) {

                        $publishers->publisher_name = $data['publisher_name'];
                        $publishersTable->save($publishers);
                        $item->publisher_id = $publishers->id;
                    }
                }
                if ($this->Items->save($item)) {
                    $this->request->session()->write('item', $item);
                    foreach ($authors as $author) {
                        $itemAuthor = $itemAuthorsTable->newEntity(['author_id' => $author->id, 'item_id' => $item->id]);
                        $itemAuthorsTable->save($itemAuthor);
                        $itemAuthor = null;
                    }


                    $this->Flash->success('Item has been successfully created.');

                    return $this->redirect(['action' => 'addSummary']);
                } else {
                    $this->Flash->error('The item could not be saved!');
                }
            }

            $catalogues = $this->Items->Catalogues->find('list');
            $years = $this->Items->Years->find('list',['order' => 'year_number desc']);
            $publishers = $this->Items->Publishers->find('list',['order' => 'publisher_name asc']);
            $itemTypes = $this->Items->ItemTypes->find('list');
            $this->set(compact('item', 'catalogues', 'years', 'publishers', 'itemTypes'));
            $this->set('_serialize', ['item']);

            $authors = $this->Items->Authors->find('list', ['order' => 'author_name']);
            $authors = $authors->toArray();
            $this->set(compact('authors'));
            $this->set('_serialize', ['authors']);

            $subjects = $this->Items->Subjects->find('list', ['order' => 'subject_name']);
            $subjects = $subjects->toArray();
            $this->set(compact('subjects'));
            $this->set('_serialize', ['subjects']);

            $items = $this->Items->find('list', ['order' => 'title']);
            $this->set(compact('items'));
            $this->set('_serialize', ['items']);

        }


    public function addAuthor()
    {
        $author = $this->Authors->newEntity();
        if ($this->request->is('post')) {
            $author = $this->Authors->patchEntity($author, $this->request->data);
            if ($this->Authors->save($author)) {
                $this->Flash->success(__('The author has been saved.'));
                return $this->redirect(['action' => 'addItem']);
            } else {
                $this->Flash->error(__('The author could not be saved. Please, try again.'));
            }
        }
        $items = $this->Authors->Items->find('list');
        $this->set(compact('author', 'items'));
        $this->set('_serialize', ['author']);
    }



    public function addSummary()
    {
        $this->layout = 'admin';
        $itemsTable = TableRegistry::get('Items');


        $items = $this->request->session()->read('item');
        $item_id = $items->id;

        $items = $this->Items->find()
            ->contain(['Catalogues','Years', 'Publishers', 'ItemTypes','Authors', 'ItemCopies', 'ItemCopies.ItemStatuses', 'Subjects'])
            ->where(['Items.id'=> $item_id])
            ->first();



        $this->set('items', $items);
        $this->set('_serialize', ['items']);


    }


/*

<!--  <div> <span class="subjects"><?php  foreach ($subjects as $subject=>$label) {  echo $this->Form->input('subjects.ids.$subject', ['value' => $subject ,'label' =>$label , 'type' => 'checkbox']);}  ?>
</div>  -->
    } */ // this code is needed aat some point to display subjects dont delete.

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {   $this->layout = 'admin';
        $item = $this->Items->get($id, [
            'contain' => ['Subjects','Authors']
        ]);

        $this->loadModel('ShelfSections');
        $shelfcategory = $this->ShelfSections->find('list')
            ->orderASC('shelf_name')
            ->all();
        $this->set('shelf_category',$shelfcategory);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));
                return $this->redirect(['action' => 'view',$id]);
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }
        $catalogues = $this->Items->Catalogues->find('list', ['limit' => 200]);
        $itemStatuses = $this->Items->ItemStatuses->find('list', ['limit' => 200]);
        $publishers = $this->Items->Publishers->find('list',['order' => 'publisher_name asc']);
        $itemTypes = $this->Items->ItemTypes->find('list', ['limit' => 200]);
        $years= $this->Items->Years->find('list',['order' => 'year_number desc']);
        $this->set(compact('item', 'catalogues','years', 'publishers', 'itemTypes'));
        $this->set('_serialize', ['item']);

        $authors = $this->Items->Authors->find('list', ['order'=> 'author_name']);
        $authors = $authors->toArray();
        $this->set(compact('authors'));
        $this->set('_serialize', ['authors']);

        $subjects = $this->Items->Subjects->find('list', ['order'=> 'subject_name']);
        $subjects = $subjects->toArray();
        $this->set(compact('subjects'));
        $this->set('_serialize', ['subjects']);

        $items = $this->Items->find('list', ['order'=> 'title']);
        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {   $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function addCopy($id = null)
    {
        $this->layout = 'admin';
        $items = TableRegistry::get('Items');
        $itemcopiesTable = TableRegistry::get('ItemCopies');
        $itemCopy = $itemcopiesTable->newEntity(['item_id'=>$id]);
        if ($this->request->is('post')) {
            $itemCopy = $itemcopiesTable->patchEntity($itemCopy, $this->request->data);
            if ($itemcopiesTable->save($itemCopy)) {
                $this->Flash->success(__('The item copy has been saved.'));
                return $this->redirect(['action' => 'addCopy',$id]);
            } else {
                $this->Flash->error(__('The item copy could not be saved. Please, try again.'));
            }
        }
        $item = $items->find()
            ->contain(['ItemCopies'])
            ->where(['id'=>$id])
            ->first();
        $item_id = $id;
        $itemStatuses = $itemcopiesTable->ItemStatuses->find('list', ['limit' => 200]);
        $this->set('item',$item);
        $this->set('itemCopy',$itemCopy);
        $this->set('items',$items);
        $this->set('itemStatuses',$itemStatuses);
        $this->set('item_id',$item_id);

        $this->set('_serialize', ['itemCopy','item']);



    }

    public function addDeskCopy()
    {
        $this->layout = 'admin';
        $itemcopiesTable = TableRegistry::get('ItemCopies');
        $itemCopy = $itemcopiesTable->newEntity();
        if ($this->request->is('post')) {
            $itemCopy = $itemcopiesTable->patchEntity($itemCopy, $this->request->data);
            if ($itemcopiesTable->save($itemCopy)) {
                $this->Flash->success(__('The item copy has been saved.'));
                return $this->redirect(['action' => 'addDeskCopy']);
            } else {
                $this->Flash->error(__('The item copy could not be saved. Please, try again.'));
            }
        }
        $items = $itemcopiesTable->Items->find('list',['order'=>'title asc']);
        $itemStatuses = $itemcopiesTable->ItemStatuses->find('list', ['limit' => 200]);
        $this->set('itemCopy',$itemCopy);
        $this->set('items',$items);
        $this->set('itemStatuses',$itemStatuses);
        $this->set('_serialize', ['itemCopy']);




    }

}
