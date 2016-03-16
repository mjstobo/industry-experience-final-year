<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Database\Schema\Table;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Network;

/**
 * Loans Controller
 *
 * @property \App\Model\Table\LoansTable $Loans
 */
class LoansController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */

    public function index()
    {
        $this->layout = 'admin';
        $loansTables = TableRegistry::get('Loans');
        $loans = $loansTables->find()
            ->where(['return_status_id !=' => 1])
            ->contain(['Users', 'ReturnStatuses', 'ItemCopies', 'ItemCopies.Items', 'ItemCopies.Items.Authors', 'ItemCopies.Items.Subjects'])
            ->all();

        $this->set('loans', $loans);
        $this->set('_serialize', ['loans']);
    }

    public function history()
    {

        $this->layout = 'admin';

        $result = false;
        $this->set('result', $result);

        if ($this->request->is('post')) {

            $user_email = $this->request->data['email_address'];

            $usersTable = TableRegistry::get('Users');

            $user = $usersTable->find()
                ->contain(['Loans.ItemCopies', 'Loans.ReturnStatuses', 'Loans' => function ($q) {
                    return $q
                        ->where(['Loans.return_status_id !=' => 1]);
                }])
                ->where(['email_address' => $user_email])
                ->toArray();

            if (!$user) {

                $result = false;
                $message = 'Email Address was incorrect';

            } else {

                $result = true;

            }

            $this->set('user', $user);
            $this->set('result', $result);

        }


    }


    public function viewcomplete()
    {
        $this->layout = 'admin';

        $loansTables = TableRegistry::get('Loans');
        $loans = $loansTables->find()
            ->where(['return_status_id =' => 3])
            ->contain(['Users', 'ReturnStatuses', 'ItemCopies', 'ItemCopies.Items', 'ItemCopies.Items.Authors', 'ItemCopies.Items.Subjects'])
            ->all();

        $this->set('loans', $loans);
        $this->set('_serialize', ['loans']);
    }

    public function viewonloan()
    {
        $this->layout = 'admin';

        $loansTables = TableRegistry::get('Loans');
        $loans = $loansTables->find()
            ->where(['return_status_id =' => 2])
            ->contain(['Users', 'ReturnStatuses', 'ItemCopies', 'ItemCopies.Items', 'ItemCopies.Items.Authors', 'ItemCopies.Items.Subjects'])
            ->all();

        $this->set('loans', $loans);
        $this->set('_serialize', ['loans']);
    }


    public function view($id = null)
    {
        $this->layout = 'admin';
        $loan = $this->Loans->get($id, [
            'contain' => ['Users', 'ReturnStatuses', 'ItemCopies']
        ]);
        $lic = TableRegistry::get('LoanItemCopies');
        $lic1 = $lic->find()
            ->contain(['Loans', 'ItemCopies', 'ItemCopies.Items', 'ItemCopies.Items.Authors', 'ItemCopies.Items.Publishers', 'Loans.ReturnStatuses'])
            ->where(['loan_id' => $id])
            ->all();
        $this->set('lic1', $lic1);
        $this->set('loan', $loan);
        $this->set('_serialize', ['loan']);
    }

    function viewPdf($id = null)
    {
        $loan = $this->Loans->get($id, [
            'contain' => ['Users', 'ReturnStatuses', 'ItemCopies', 'Users.States', 'Users.Countries']
        ]);
        $lic = TableRegistry::get('LoanItemCopies');
        $lic1 = $lic->find()
            ->contain(['Loans', 'ItemCopies', 'ItemCopies.Items', 'ItemCopies.Items.Authors', 'ItemCopies.Items.Publishers', 'Loans.ReturnStatuses'])
            ->where(['loan_id' => $id])
            ->all();
        $this->set('lic1', $lic1);
        $this->set('loan', $loan);
        $this->set('_serialize', ['loan']);
    }

    public function overdue()

    {
        $this->layout = 'admin';
        $now = time::today();
        $overdue = $this->Loans->find()
            ->contain(['Users', 'ReturnStatuses'])
            ->where(['return_status_id' => 4])
            ->toArray();
        $this->set('overdue', $overdue);
    }

    public function createloan()
    {
        $this->layout = 'admin';
        if ($this->request->is('get')) {

            if (!empty($this->request->query['term'])) {
                $term = $this->request->query['term'];

                $usersTable = TableRegistry::get('Users');
                $user = $usersTable->find()
                    ->contain(['Loans.ItemCopies', 'Loans.ItemCopies.Items', 'Loans' => function ($q) {
                        return $q
                            ->where(['Loans.return_status_id' => 2]);
                    }])
                    ->where(['email_address LIKE' => '%' . $term . '%'])
                    ->orWhere(['given_name LIKE' => '%' . $term . '%'])
                    ->orWhere(['family_name LIKE' => '%' . $term . '%'])
                    ->orWhere(['id LIKE' => '%' . $term . '%'])
                    ->orWhere(['CONCAT(given_name, " ", family_name) LIKE' => '%' . $term . '%'])
                    ->toArray();

                if (isset($term)) {
                    $this->set('term', $term);
                }

                if (!$user) {
                    $result = false;
                    $this->Flash->set('This search returned no results. Please search again', ['element' => 'error']);

                } else {

                    $result = true;

                }

                $this->set('users', $user);
                $this->set('result', $result);
                $this->set('message', '');

            }
        }
    }

    public function process($id = null)
    {

        $this->layout = 'admin';

        if (!$id) {

            $user = $this->request->session()->read('user');

            if (!$user) {

                $this->Flash->set('Unable to find Member. Please try again', ['element' => 'error']);
                $this->redirect(['action' => 'createloan']);

            }

        } else {
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->find()
            ->contain(['Salutations', 'States', 'Genders', 'Countries', 'Years', 'ContactTypes', 'Settlements', 'Loans'])
            ->where(['Users.id' => $id])
            ->first();
    }

        if(!$user){

            $this->Flash->set('Error when selecting Member. Please try again', ['element' => 'error']);
            $this->redirect(['action' => 'createloan']);

        }

        $this->set('user', $user);
        $this->request->session()->write('user', $user);


        $loansTable = TableRegistry::get('Loans');
        $loanCount = $loansTable->find()
            ->contain(['ItemCopies.Items', 'ItemCopies.Items', 'Users', 'ItemCopies.Items.Authors', 'ItemCopies.Items.Subjects'])
            ->where(['user_id' => $user->id, 'return_status_id' => 2])
            ->all();

        $currLoan = $loansTable->find()
            ->contain(['ItemCopies.Items', 'ItemCopies.Items', 'Users', 'ItemCopies.Items.Authors', 'ItemCopies.Items.Subjects', 'ItemCopies'])
            ->where(['user_id' => $user->id, 'return_status_id' => 5])
            ->all();

        if ($currLoan->isEmpty()) {
            $deskLoan = $loansTable->newEntity(['user_id' => $user->id, 'return_status_id' => 5]);
            $loansTable->save($deskLoan);
            $this->set('loan', $deskLoan);
        } else {
            $deskLoan = $currLoan->first();
            $this->set('loan', $deskLoan);
        }


        $bookCount = 0;
        $dvdCount = 0;

        $licTable = TableRegistry::get('LoanItemCopies');
        $limitTable = TableRegistry::get('LoanLimits');

        $curr_i_c = $licTable->find()
            ->contain(['ItemCopies', 'ItemCopies.Items.Authors', 'ItemCopies.Items.ItemTypes'])
            ->where(['loan_id' => $deskLoan->id])
            ->toArray();

        $this->set('loan', $deskLoan);
        $this->set('cart_items', $curr_i_c);


        foreach ($loanCount as $loans):

            $books = $licTable->find()->where(['item_type_id' => 1, 'loan_id' => $loans->id])->contain(['ItemCopies.Items', 'ItemCopies.Items.ItemTypes', 'Loans'])->count();
            $dvds = $licTable->find()->where(['item_type_id' => 2, 'loan_id' => $loans->id])->contain(['ItemCopies.Items', 'ItemCopies.Items.ItemTypes', 'Loans'])->count();

            $bookCount = $bookCount + $books;
            $dvdCount = $dvdCount + $dvds;

        endforeach;

        $this->set('dvdCount', $dvdCount);
        $this->set('bookCount', $bookCount);

        $bookLimit = $limitTable->find()
            ->select('limit_amounts')
            ->where(['id' => 1])
            ->toArray();

        $dvdLimit = $limitTable->find()
            ->select('limit_amounts')
            ->where(['id' => 2])
            ->toArray();

        if ($bookCount >= $bookLimit[0]->limit_amounts && $dvdCount >= $dvdLimit[0]->limit_amounts) {

            // $this->Flash->set('Member has maximum number of items permitted on loan currently', ['element' => 'error']);


        } elseif ($bookCount >= $bookLimit[0]->limit_amounts) {

            //  $this->Flash->set('Member has ' . $bookCount . ' out of ' . $bookLimit[0]->limit_amounts . ' books on loan. They cannot borrow anymore books.', ['element' => 'error']);

        } elseif ($dvdCount >= $dvdLimit[0]->limit_amounts) {

            // $this->Flash->set('Member has ' . $dvdCount . ' out of ' . $dvdLimit[0]->limit_amounts . ' DVDs on loan. They cannot borrow anymore DVDs.', ['element' => 'error']);

        }

        if ($this->request->is('post')) {

            $itemCopiesTable = TableRegistry::get('ItemCopies');
            $barcode = $this->request->data('barcode');

            $itemCopy = $itemCopiesTable->find()
                ->where(['barcode' => $barcode])
                ->contain(['Items'])
                ->first();


            if ($itemCopy == null) {
                $this->Flash->set('Unable to find an item with that barcode. Please try again', ['element' => 'error']);
                $this->redirect(['action' => 'process']);
            } else {

                if ($itemCopy->item_status_id == 3) {
                    $this->Flash->set('This item is currently on loan to another member, please use "Return Item" before lending this item.', ['element' => 'error']);
                    $this->redirect(['action' => 'process']);

                } else {

                    $this->set('itemCopy', $itemCopy);
                    $reservesTable = TableRegistry::get('Reserves');

                    $reserve = $reservesTable->find()
                        ->where(['item_copy_id' => $itemCopy->id, 'reserve_status_id' => 2])
                        ->all();

                    $reserveCount = $reserve->count();

                    if ($reserveCount > 0) {
                        $reserveForUser = false;
                        foreach ($reserve as $reserves):
                            if ($reserves->user_id == $user->id) {
                                $reserveForUser = true;
                            }
                        endforeach;

                        if ($reserveForUser == false) {
                            $this->Flash->set('Item is reserved. Cannot be added to this loan.', ['element' => 'error']);
                            $this->redirect(['action' => 'process']);
                        }

                    }

                    $licCheck = $licTable->find()
                        ->where(['loan_id' => $deskLoan->id, 'item_copy_id' => $itemCopy->id])
                        ->contain(['Loans'])
                        ->all();

                    if ($licCheck->isEmpty()) {

                        $loan_item = $licTable->newEntity(['user_id' => $user->id, 'loan_id' => $deskLoan->id, 'item_copy_id' => $itemCopy->id]);
                        if ($licTable->save($loan_item)) {

                            $this->Flash->success('Item has been added to loan instance');
                            $loansTable->save($deskLoan);
                            $this->set('loan', $deskLoan);
                            $this->redirect(['action' => 'process']);

                            $this->request->session()->write('user', $user);

                        }

                    } else {

                        $this->Flash->set('Unable to add this Item - already exists in this loan instance', ['element' => 'error']);
                        $this->redirect(['action' => 'process']);
                    }


                }
            }

        }
    }


    public function complete($id = null)
    {

        $this->layout = 'admin';

        $user = $this->request->session()->read('user');

        $loan = $this->Loans->get($id, [
            'contain' => ['Users', 'ReturnStatuses', 'ItemCopies']
        ]);
        $loansTable = TableRegistry::get('Loans');
        $reservesTable = TableRegistry::get('Reserves');
        $LoanItemCopiesTable = TableRegistry::get('LoanItemCopies');

        $currLoan = $loansTable->find()
            ->where(['Loans.id' => $id])
            ->contain(['ItemCopies', 'ItemCopies.Items', 'Users', 'ItemCopies.Items.ItemTypes'])
            ->first();

        if ($currLoan->return_status_id == 2) {

            $this->Flash->set('This loan instance has already been completed', ['element' => 'error']);
            $this->redirect(['action' => 'process']);

        } else {

            $cart_items = $LoanItemCopiesTable->find()
                ->where(['loan_id' => $currLoan->id])
                ->contain(['ItemCopies.Items', 'ItemCopies', 'ItemCopies.Items.Authors', 'ItemCopies.Items.Subjects', 'ItemCopies.Items.ItemTypes'])
                ->all();

            $itemCopiesTable = TableRegistry::get('ItemCopies');


            foreach ($cart_items as $item):

                if ($item->item_copy->item_status_id == 1) {

                    $item->item_copy->item_status_id = 3;

                } else if ($item->item_copy->item_status_id == 5) {

                    $reserve = $reservesTable->find()
                        ->where(['item_id' => $item->item_copy->item->item_id, 'item_copy_id' => $item->item_copy_id, 'reserve_status_id' => 2, 'user_id' => $user[0]->id])
                        ->first();

                    if (!$reserve) {

                        $item->item_copy->item_status_id = 3;

                    } elseif ($reserve->user_id == $user[0]->id) {

                        $reserve->reserve_status_id = 4;
                        $item->item_copy->item_status_id = 3;
                        $reservesTable->save($reserve);

                    } elseif ($reserve->user_id != $user[0]->id) {

                        $this->Flash->set('The item: ' . $item->item->title . ' is reserved by another user. Please remove from loan.', ['element' => 'error']);
                        $this->redirect(['action' => 'process']);

                    }

                }

                $itemCopiesTable->save($item->item_copy);
            endforeach;

            $date = time::today();
            $return = time::today();
            $return->addWeeks(2);
            $currLoan->date_borrowed = $date;
            $currLoan->return_date = $return;
            $currLoan->return_status_id = 2;
            $loansTable->save($currLoan);
            $this->set('cart_items', $cart_items);
            $this->set('returnDate', $return);
            $this->set('loan', $loan);
            $this->set('user', $user);


        }
    }

    public function scan_barcode_ajax(){

        $data = [];

            $barcode = $this->request->query('barcode');

            if($barcode){

                $itemCopiesTable = TableRegistry::get('ItemCopies');

                $itemCopy = $itemCopiesTable->find()
                    ->contain(['Items'])
                    ->where(['barcode' => $barcode])
                    ->toArray();

                $data = ['content' => $itemCopy[0]->item->title, 'barcode' => $barcode];
            }

            $this->set(compact('data'));
            $this->set('_serialize', ['data']);
    }



    public function add()
    {   $this->layout = 'admin';
        $loan = $this->Loans->newEntity();
        if ($this->request->is('post')) {
            $loan = $this->Loans->patchEntity($loan, $this->request->data);
            if ($this->Loans->save($loan)) {
                $this->Flash->success(__('The loan has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The loan could not be saved. Please, try again.'));
            }
        }
        $users = $this->Loans->Users->find('list', ['limit' => 200]);
        $returnStatuses = $this->Loans->ReturnStatuses->find('list', ['limit' => 200]);
        $this->set(compact('loan', 'users', 'returnStatuses'));
        $this->set('_serialize', ['loan']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Loan id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {   $this->layout = 'admin';
        $loan = $this->Loans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loan = $this->Loans->patchEntity($loan, $this->request->data);
            if ($this->Loans->save($loan)) {
                $this->Flash->success(__('The loan has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The loan could not be saved. Please, try again.'));
            }
        }
        $users = $this->Loans->Users->find('list', ['limit' => 200]);
        $returnStatuses = $this->Loans->ReturnStatuses->find('list', ['limit' => 200]);
        $this->set(compact('loan', 'users', 'returnStatuses'));
        $this->set('_serialize', ['loan']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Loan id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {   $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $loan = $this->Loans->get($id);
        if ($this->Loans->delete($loan)) {
            $this->Flash->success(__('The loan has been deleted.'));
        } else {
            $this->Flash->error(__('The loan could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
