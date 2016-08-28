<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;


/**
 * Memberships Controller
 *
 * @property \App\Model\Table\MembershipsTable $Memberships */
class MembershipsController extends AppController
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
            $this->Auth->allow(['view', 'index', 'almostExpired']);
        }
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $conditions = ['user_id' => $user_id];
        $this->paginate = ['conditions' => $conditions,
            'contain' => ['MemTypes', 'Durations', 'Users','Status']];
        $this->set('memberships', $this->paginate($this->Memberships));
        $this->set('_serialize', ['memberships']);
    }


    /**
     * View method
     *
     * @param string|null $id Membership id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)

    {
        $membership = $this->Memberships->get($id, [
            'contain' => ['MemTypes','Durations','Users','Status']]);


        $this->set('membership', $membership);
        $this->set('_serialize', ['membership']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membership = $this->Memberships->newEntity();
        if ($this->request->is('post')) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->data);
            debug($membership);
            if ($this->Memberships->save($membership)) {
                $this->Flash->success('The membership has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The membership could not be saved. Please, try again.');
            }
        }
        $memTypes = $this->Memberships->MemTypes->find('list', ['limit' => 200]);
        $durations = $this->Memberships->Durations->find('list', ['limit' => 200]);
        $users = $this->Memberships->Users->find('list', ['limit' => 200]);
        $status = $this->Memberships->Status->find('list', ['limit' => 200]);
        $this->set(compact('membership', 'memTypes', 'durations', 'users', 'status'));
        $this->set('_serialize', ['membership']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Membership id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->data);
            if ($this->Memberships->save($membership)) {
                $this->Flash->success('The membership has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The membership could not be saved. Please, try again.');
            }
        }
        $memTypes = $this->Memberships->MemTypes->find('list', ['limit' => 200]);
        $durations = $this->Memberships->Durations->find('list', ['limit' => 200]);
        $this->set(compact('membership', 'memTypes', 'durations'));
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
       $membership = $this->Memberships->get($id);
        $query = $membership->query();
        $query->update()
            ->set(['status_id' => 2])
            ->where(['id' => $id])
            ->execute();

    }
}
