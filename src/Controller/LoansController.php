<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Loans Controller
 *
 * @property \App\Model\Table\LoansTable $Loans
 */
class LoansController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $user_id = $this->request->session()->read('Auth.User.id');

        $membershipsTable = TableRegistry::get('Memberships');
        $currStatus = $membershipsTable->find()
            ->where(['user_id' => $user_id, 'status_id' => 1])
            ->all();

        $currStatus->toArray();

        if ($currStatus->isEmpty()) {
            $this->redirect(['controller' => 'users', 'action' => 'renew']);
        } else {
            $this->Auth->allow(['view', 'index', 'history']);
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
      $loans = $this->Loans->find()
          ->contain(['Users', 'ReturnStatuses','ItemCopies','ItemCopies.Items'])
          ->where(['user_id' => $user_id,'return_status_id' => 2]);
            $results = $loans->isEmpty();
        $this->set('results',$results);

        if($results)
        {
            $loan_status = 'You currently have no active loans';
            $this->set('loan_status',$loan_status);
        }

        else{
            $this->set('loans', $loans);

            $this->set('_serialize', ['loans']);
        }


    }


    public function view($id = null)
    {
        $loan = $this->Loans->get($id, [
            'contain' => ['Users', 'ReturnStatuses', 'ItemCopies','ItemCopies.Items','ItemCopies.Items.Authors','ItemCopies.Items.Subjects','ItemCopies.ItemStatuses','ItemCopies.Items.Publishers']
        ]);
        $this->set('loan', $loan);
        $this->set('_serialize', ['loan']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
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
    {
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

    public function history(){

        $user_id = $this->request->session()->read('Auth.User.id');
        $loans = $this->Loans->find()
            ->contain(['Users', 'ReturnStatuses','ItemCopies','ItemCopies.Items'])
            ->where(['user_id' => $user_id,'return_status_id !=' => 1]);

        $results = $loans->isEmpty();
        $this->set('results',$results);

        if($results)
        {
            $loan_status = 'You do not have any loan history.';
            $this->set('loan_status',$loan_status);
        }

        else{
            $this->set('loans', $loans);
            $this->set('_serialize', ['loans']);
        }




    }

    /**
     * Delete method
     *
     * @param string|null $id Loan id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
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
