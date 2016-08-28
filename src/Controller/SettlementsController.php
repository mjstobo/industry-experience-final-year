<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\View\Helper;
use Cake\ORM\TableRegistry;

/**
 * Settlements Controller
 *
 * @property \App\Model\Table\SettlementsTable $Settlements
 */
class SettlementsController extends AppController
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
            $this->Auth->allow(['index', 'logout', 'view', 'viewPdf']);
        }
    }

    public function index()
    {
        $user_id = $this->request->session()->read('Auth.User.id');
        $conditions = ['user_id' => $user_id];
        $this->paginate = ['conditions' => $conditions,
            'contain' => ['PaymentMethods', 'Users', 'PaymentTypes']];
        $this->set('settlements', $this->paginate($this->Settlements));
        $this->set('_serialize', ['settlements']);

    }

    /**
     * View method
     *
     * @param string|null $id Settlement id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $settlement = $this->Settlements->get($id, [
            'contain' => ['PaymentMethods', 'Users', 'PaymentTypes','Users.States', 'Users.Countries', 'Users.Memberships', 'Users.Memberships.MemTypes']
        ]);
        $this->set('settlement', $settlement);
        $this->set('_serialize', ['settlement']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $settlement = $this->Settlements->newEntity();
        if ($this->request->is('post')) {
            $settlement = $this->Settlements->patchEntity($settlement, $this->request->data);
            if ($this->Settlements->save($settlement)) {
                $this->Flash->success(__('The settlement has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The settlement could not be saved. Please, try again.'));
            }
        }
        $paymentMethods = $this->Settlements->PaymentMethods->find('list', ['limit' => 200]);
        $users = $this->Settlements->Users->find('list', ['limit' => 200]);
        $paymentTypes = $this->Settlements->PaymentTypes->find('list', ['limit' => 200]);
        $this->set(compact('settlement', 'paymentMethods', 'users', 'paymentTypes'));
        $this->set('_serialize', ['settlement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Settlement id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $settlement = $this->Settlements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $settlement = $this->Settlements->patchEntity($settlement, $this->request->data);
            if ($this->Settlements->save($settlement)) {
                $this->Flash->success(__('The settlement has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The settlement could not be saved. Please, try again.'));
            }
        }
        $paymentMethods = $this->Settlements->PaymentMethods->find('list', ['limit' => 200]);
        $users = $this->Settlements->Users->find('list', ['limit' => 200]);
        $paymentTypes = $this->Settlements->PaymentTypes->find('list', ['limit' => 200]);
        $this->set(compact('settlement', 'paymentMethods', 'users', 'paymentTypes'));
        $this->set('_serialize', ['settlement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Settlement id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $settlement = $this->Settlements->get($id);
        if ($this->Settlements->delete($settlement)) {
            $this->Flash->success(__('The settlement has been deleted.'));
        } else {
            $this->Flash->error(__('The settlement could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    function viewPdf($id = null)
    {
        $settlement = $this->Settlements->find('all', ['contain'=>['PaymentMethods', 'Users', 'PaymentTypes','Users.States', 'Users.Countries', 'Users.Memberships', 'Users.Memberships.MemTypes']],
            ['order'=> ['id' => 'asc']])
            ->where (['Settlements.id' => $id])
            ->toArray();

        $this->set('settlement', $settlement);
        $this->set('_serialize', ['settlement']);

    }
}
