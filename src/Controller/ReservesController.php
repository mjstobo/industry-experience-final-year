<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;

/**
 * Reserves Controller
 *
 * @property \App\Model\Table\ReservesTable $Reserves
 */
class ReservesController extends AppController
{

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
            $this->Auth->allow(['index','addReserves', 'viewReserves', 'removeReserves']);
        }
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Items', 'ReserveStatuses']
        ];
        $this->set('reserves', $this->paginate($this->Reserves));
        $this->set('_serialize', ['reserves']);
    }

    /**
     * View method
     *
     * @param string|null $id Reserve id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function viewReserves()
    {


        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');



            $query = $this->Reserves->find()
                ->where(['user_id' => $user_id])
                ->all();


            $results = $query->isEmpty();


            if ($results) {

                $status = false;
                $reserve_status = "You currently have no reserves";
                $this->set('reserve_status', $reserve_status);
                $this->set('status', $status);
                $this->set('results', $results);
                $this->set('reserve_status', 'There are no reserves');

            } else {

                $reserve_item = $this->Reserves->find()
                    ->contain(['Items', 'ReserveStatuses'])
                    ->where(['user_id' => $user_id])
                    ->toArray();

                $status = true;

                $this->set('reserve_items', $reserve_item);
                $this->set('_serialize', ['reserve_items']);
                $this->set('status', $status);
                $this->set('results', $results);


            }
        }
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */


    public function addReserves($id = null)
    {


        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');

            $date = time::today();
            $reserve_item = $this->Reserves->newEntity(['user_id' => $user_id, 'item_id' =>$id, 'request_date' => $date,'reserve_status_id' => 1]);



            if ($this->Reserves->save($reserve_item)) {
                $this->Flash->success(__('The Reserve item has been saved.'));

                $reserved = $this->Reserves->find()
                    ->contain('Items')
                    ->where(['item_id'=>$id])
                    ->first();

                $user_fname = $this->request->session()->read('Auth.User.given_name');
                $user_lname = $this->request->session()->read('Auth.User.family_name');
                $user_address = $this->request->session()->read('Auth.User.street_address');
                $state = $this->request->session()->read('Auth.User.state_id');
                $user_suburb = $this->request->session()->read('Auth.User.suburb');
                $user_postcode = $this->request->session()->read('Auth.User.postcode');
                $user_email = $this->request->session()->read('Auth.User.email_address');
                $user_number = $this->request->session()->read('Auth.User.phone_number');

                $userTable = TableRegistry::get('Users');
                $user_query = $userTable->find()
                    ->contain(['States','Salutations'])
                    ->where(['Users.id' => $user_id, 'state_id' => $state])
                    ->first();
                $user_state = $user_query->state->state_name;
                $user_salutation = $user_query->salutation->salutation_name;


                $email = new Email('default');

                $email->transport('edv');

                $email->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                    ->to([$user_email]) //change to $user_email after testing
                    ->template('reservedItemNotificationAvailable')
                    ->viewVars(['fname'=> $user_fname, 'lname'=>$user_lname, 'title'=>$reserved->item->title])
                    ->emailformat('html')
                    ->subject('EDV Reserve Item')
                    ->send();

                return $this->redirect(['action' => 'viewReserves']);


            }

        }
    }

    public function removeReserves($id = null)
    {


        if ($this->request->session()->check('Auth.User.id')) {

            $user_id = $this->request->session()->read('Auth.User.id');


            $query = $this->Reserves->find()->where(['user_id' => $user_id])
                ->all();

            $results = $query->isEmpty();
            $this->set('results', $results);

            if ($results) {

                $status = false;
                $reserve_status = "You currently have no reserves";
                $this->set('reserve_status', $reserve_status);
                $this->set('status', $status);

            } else {
                $reserve_item = $this->Reserves->find()
                    ->select('id')
                    ->where(['id' => $id]);
                $this->set('reserve_item', $reserve_item);


                $entity = $this->Reserves->get($id);


                if ($entity->reserve_status_id == 2) {
                    $item_copiesTable = TableRegistry::get('ItemCopies');
                    $itemcopy = $item_copiesTable->find()
                        ->where(['id' => $entity->item_copy_id])
                        ->first();

                    $itemcopy->item_status_id = 1;

                    $item_copiesTable->save($itemcopy);

                    if ($this->Reserves->delete($entity)) {
                        $this->Flash->success('Removed');
                        return $this->redirect(['action' => 'viewReserves']);
                    }

                } elseif ($this->Reserves->delete($entity)) {

                    $this->Flash->success('Removed');
                    return $this->redirect(['action' => 'viewReserves']);
                } else {

                    $this->Flash->error('Unable to Remove');
                    return $this->redirect(['action' => 'viewReserves']);
                }

            }
        }
    }
}
