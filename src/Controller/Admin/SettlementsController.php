<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\View\Helper;

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
    public function index()
    {

        $this->layout = 'admin';
        $settlements = $this->Settlements->find('all', [
            'contain' => ['PaymentMethods', 'Users', 'PaymentTypes']
        ]);

        $this->set('settlements', $settlements);
        $this->set('_serialize', ['settlements']);
    }

    public function history(){

        $this->layout = 'admin';
        $result = false;
        $this->set('result', $result);

        if($this->request->is('post')){

            $user_email = $this->request->data['email_address'];

            $usersTable = TableRegistry::get('Users');

            $user = $usersTable->find()
                ->contain(['Settlements', 'Loans', 'Settlements.PaymentTypes', 'Settlements.PaymentMethods'])
                ->where(['email_address' => $user_email])
                ->toArray();

            if(!$user){

                $result = false;
                $message = 'Email Address was incorrect';

            } else {

                $result = true;

            }

            $this->set('user', $user);
            $this->set('result', $result);

        }



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
        $this->layout = 'admin';
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
        $this->layout = 'admin';
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
        $this->layout = 'admin';
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
        $this->layout = 'admin';
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
