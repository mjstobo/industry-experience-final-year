<?php
namespace App\Controller\Admin;
use Cake\I18n\Time;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;
/**
 * LoanItemCopies Controller
 *
 * @property \App\Model\Table\LoanItemCopiesTable $LoanItemCopies
 */
class LoanItemCopiesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Loans', 'ItemCopies']
        ];
        $this->set('loanItemCopies', $this->paginate($this->LoanItemCopies));
        $this->set('_serialize', ['loanItemCopies']);
    }

    /**
     * View method
     *
     * @param string|null $id Loan Item Copy id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loanItemCopy = $this->LoanItemCopies->get($id, [
            'contain' => ['Loans', 'ItemCopies']
        ]);
        $this->set('loanItemCopy', $loanItemCopy);
        $this->set('_serialize', ['loanItemCopy']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loanItemCopy = $this->LoanItemCopies->newEntity();
        if ($this->request->is('post')) {
            $loanItemCopy = $this->LoanItemCopies->patchEntity($loanItemCopy, $this->request->data);
            if ($this->LoanItemCopies->save($loanItemCopy)) {
                $this->Flash->success(__('The loan item copy has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The loan item copy could not be saved. Please, try again.'));
            }
        }
        $loans = $this->LoanItemCopies->Loans->find('list', ['limit' => 200]);
        $itemCopies = $this->LoanItemCopies->ItemCopies->find('list', ['limit' => 200]);
        $this->set(compact('loanItemCopy', 'loans', 'itemCopies'));
        $this->set('_serialize', ['loanItemCopy']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Loan Item Copy id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loanItemCopy = $this->LoanItemCopies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loanItemCopy = $this->LoanItemCopies->patchEntity($loanItemCopy, $this->request->data);
            if ($this->LoanItemCopies->save($loanItemCopy)) {
                $this->Flash->success(__('The loan item copy has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The loan item copy could not be saved. Please, try again.'));
            }
        }
        $loans = $this->LoanItemCopies->Loans->find('list', ['limit' => 200]);
        $itemCopies = $this->LoanItemCopies->ItemCopies->find('list', ['limit' => 200]);
        $this->set(compact('loanItemCopy', 'loans', 'itemCopies'));
        $this->set('_serialize', ['loanItemCopy']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Loan Item Copy id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loanItemCopy = $this->LoanItemCopies->get($id);
        if ($this->LoanItemCopies->delete($loanItemCopy)) {
            $this->Flash->success(__('The loan item copy has been deleted.'));
        } else {
            $this->Flash->error(__('The loan item copy could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


public function returnItem()
{
    $time = time::today();
    $this->layout = 'admin';

    $item = TableRegistry::get('ItemCopies');
    $reserves = TableRegistry::get('Reserves');



    if ($this->request->is('post')) {

        $barcode = $this->request->data['barcode'];

        // check barcode for validity

        if (!$barcode) {
            $this->Flash->error(__('The barcode is invalid, Please try again'));

            return $this->redirect(['action' => 'returnItem']);

        } else {

            $itemcopy = $item->find()
                ->contain(['Items'])
                ->where(['barcode' => $barcode])
                ->first();


            if($itemcopy) {

                $loanitemcopyTable = TableRegistry::get('LoanItemCopies');
                $loanitemcopies = $loanitemcopyTable->find()
                    ->where(['item_copy_id'=> $itemcopy->id ])
                    ->orderDesc('id')
                    ->first();

                if ($itemcopy->item_status_id == 1) {
                    $this->Flash->error(__('Item is already On Shelf'));
                    return $this->redirect(['action' => 'returnItem']);
                    $this->set('itemcopy', $itemcopy);

                } elseif ($itemcopy->item_status_id == 5) {
                    $this->Flash->error(__('Item is already Reserved'));
                    return $this->redirect(['action' => 'returnItem']);
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
                        $item->save($itemcopy);
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

                        $email = new Email('default');

                        $email->transport();

                        $email->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                            ->to(['reception@eatingdisorders.org.au'])//change to edv email
                            ->subject('Item Reservation')
                            ->send('Dear EDV, ' . "\n \n" . 'The following user as a reserve on an item, please put the item on the side.' . "\n \n" . 'User ID: ' . $user_id . "\n" . 'Name: ' . $user_salutation .
                                $user_fname . ' ' . $user_lname . 'Phone: ' . $user_phone . "\n" . 'Email: ' . $user_email . "\n \n" . 'The requested copy' . "\n" . 'Barcode: ' . $reserve->item->item_copies[0]->barcode . "\n" . 'Title: ' . $reserve->item->title);

                        $loanitemcopies->copy_returned =1;
                        $loanitemcopies->date_returned = $time;
                        $loanitemcopyTable->save($loanitemcopies);
                        return $this->Flash->success(__('The item has been assigned to the next member which has reserved it'));
                    } elseif (!$reserve) ;
                    {

                        $itemcopy->item_status_id = 1;
                        $item->save($itemcopy);
                        $loanitemcopies->copy_returned =1;
                        $loanitemcopies->date_returned = $time;
                        $loanitemcopyTable->save($loanitemcopies);
                        return $this->Flash->success(__('The item has been successfully returned'));
                    }
                }

                }
            elseif (!$itemcopy) {
                $this->Flash->error(__('The barcode is invalid, Please try again'));
                return $this->redirect(['action' => 'returnItem']);
            }
            

        }


    }

}
}
