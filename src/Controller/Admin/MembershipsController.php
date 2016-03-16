<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Network\Email\Email;


/**
 * Memberships Controller
 *
 * @property \App\Model\Table\MembershipsTable $Memberships
 */
class MembershipsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */


    public function index()
    {
        $this->layout = 'admin';
        $this->loadModel('Users');
        $memberships = $this->Memberships->find('all', ['contain' => ['Users', 'MemTypes', 'Status']]);
        // $this->paginate = ['contain' => ['Users']];
        $this->set('memberships', $memberships);
        $this->set('_serialize', ['memberships']);
    }


    public function almostExpired()
    {   $time = Time::today();
        $time->addDays(7);

        $now = $time->i18nFormat('d MMMM, YYYY');


        $this->loadModel('Users');
        $memberships = TableRegistry::get('Memberships');
        $user_expiry = $memberships->find()
            ->contain(['Users','Users.Salutations'])
            ->where(['expiry_date ' => $time])
            ->all();

        $results = $user_expiry->isEmpty();


        if (!$results) {
            foreach ($user_expiry as $user) {

                $email = new Email('default');

                $email->transport();

                try {
                    $res = $email->from(['ie.onefourtech@gmail.com' => 'EDV Website'])
                        ->to([$user->user['email_address'] => $user->user['given_name']])
                        ->subject('Membership Expiry Reminder')
                        ->send('Dear' . ' ' . $user->user->salutation['salutation_name'] . ' ' . $user->user['given_name'] . ' ' . $user->user['family_name'] . ',' . "\n"
                            . 'Just a quick reminder to let you know that your membership will expire on ' . $now);
                } catch (Exception $e) {

                    echo 'Exception : ', $e->getMessage(), "\n";
                }


            }

        }
            }

    public function isExpired()
    {   $time = Time::today();


        $now = $time->i18nFormat('d MMMM, YYYY');


        $this->loadModel('Users');
        $memberships = TableRegistry::get('Memberships');
        $user_expiry = $memberships->find()
            ->contain(['Users', 'Users.Salutations'])
            ->where(['expiry_date ' => $time])
            ->all();
        $results = $user_expiry->isEmpty();


        if (!$results) {
            foreach ($user_expiry as $user) {

                $email = new Email('default');

                $email->transport();

                try {
                    $res = $email->from(['ie.onefourtech@gmail.com' => 'EDV Website'])
                        ->to([$user->user['email_address'] => $user->user['given_name']])
                        ->subject('Membership Expired')
                        ->send('Dear' . ' ' . $user->user->salutation['salutation_name'] . ' ' . $user->user['given_name'] . ' ' . $user->user['family_name'] . ',' . "\n"
                            . 'Just a quick reminder to let you know that your membership has now expired as of ' . $now);
                } catch (Exception $e) {

                    echo 'Exception : ', $e->getMessage(), "\n";
                }

            }

        }
    }


    public function view($id = null)
    {
        $this->layout = 'admin';
        $membership = $this->Memberships->get($id, [
            'contain' => ['MemTypes', 'Durations', 'Users','Status']
        ]);
        $this->set('membership', $membership);
        $this->set('_serialize', ['membership']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
        $this->loadModel('Users');
        $user = $this->Users->find()
            ->where(['id' => $id])
            ->first();

        if (!$user) {
            $this->Flash->error('Invalid Member ID');
            $this->redirect(['controller' => 'Users', 'action' => 'viewall']);
        } else {


            $membershipsTable = TableRegistry::get('Memberships');
            $memberships = $this->Users->Memberships->MemTypes->find('list')
                ->contain(['Memberships.MemTypes', 'Memberships.MemTypes.Durations'])
                ->all();
            $this->layout = 'admin';
            $memprices = TableRegistry::get('MemTypes');
            $membership = $membershipsTable->newEntity();


            if ($this->request->is('post')) {
                $mem_type = $this->request->data['mem_type_id'];
                $query = $memprices->find()
                    ->contain(['Durations'])
                    ->where(['MemTypes.id =' => $mem_type])
                    ->first();
                $price = $query->mem_price;
                $duration = $query->duration_id;
                $duration_year = $query->duration->duration_year;
                $duration_name = $query->duration->name;
                $description = $query->mem_name;
                $date = time::today();

                $join = time::today();
                $expiry = $date->addYears($duration_year);


                $query = $memprices->find()
                    ->select(['mem_price', 'mem_name'])
                    ->where(['id =' => $mem_type])
                    ->first();
                $price = $query->mem_price;
                $total = $price;

                $membership = $this->Memberships->patchEntity($membership, $this->request->data);
                $membership->user_id = $id;
                $membership->status_id = 1;
                $membership->mem_type_id = $mem_type;
                $membership->duration_id = $duration;

                echo 'i patched the entity';

                if ($membership->errors()) {
                    $this->Flash->error(['There has been an error. Please try again.']);
                    $this->redirect(['controller' => 'Memberships', 'action' => 'add', $id]);
                }

                if ($membershipsTable->save($membership)) {
                    echo 'i made it to save';
                    $this->redirect(['controller' => 'Users', 'action' => 'view', $id]);
                }
            }
            $this->set('user',$user);
            $this->set('membership', $membership);
            $this->set('memberships', $memberships);

        }
    }



      /*  $this->layout = 'admin';
        $membership = $this->Memberships->newEntity();
        if ($this->request->is('post')) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->data);
            if ($this->Memberships->save($membership)) {
                $this->Flash->success('The membership has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The membership could not be saved. Please, try again.');
            }
        }
        $this->set(compact('membership'));
        $this->set('_serialize', ['membership']);
    }/*

    /**
     * Edit method
     *
     * @param string|null $id Membership id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $this->layout = 'admin';
        $this->loadModel('Users');
        $memberships = $this->Users->Memberships->MemTypes->find('list')
            ->contain(['Memberships.MemTypes','Memberships.MemTypes.Durations'])
            ->all();
        $membership = $this->Memberships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->data);
            if ($this->Memberships->save($membership)) {
                $this->Flash->success('The membership has been saved.');
                return $this->redirect(['controller'=>'Users','action' => 'view',$membership->user_id]);
            } else {
                $this->Flash->error('The membership could not be saved. Please, try again.');
            }
        }
        $this->set(compact('membership'));
        $this->set('memberships',$memberships);
        $this->set('_serialize', ['membership']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Membership id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $membership = $this->Memberships->get($id);
        if ($this->Memberships->delete($membership)) {
            $this->Flash->success('The membership has been deleted.');
        } else {
            $this->Flash->error('The membership could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function cancel($id = null)
    {
        $this->layout = 'admin';
        $memtable = TableRegistry::get('Memberships');
        $membership = $memtable->get($id);

        $membership->status_id = 2;

        $memtable->save($membership);
        $this->Flash->success('Membership is inactive');
        $this->redirect(['controller' => 'users', 'action' => 'index']);


    }

    public function viewExpired()
    {
        $this->layout = 'admin';
        $now = time::today();
       $memberships = $this->Memberships->find()
           ->contain(['Users'])
           ->where(['expiry_date <'=> $now,'status_id' => 2])
           ->toArray();

        $this->set('memberships',$memberships);


    }
}
