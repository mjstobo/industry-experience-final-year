<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LoanLimits Controller
 *
 * @property \App\Model\Table\LoanLimitsTable $LoanLimits
 */
class LoanLimitsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('loanLimits', $this->paginate($this->LoanLimits));
        $this->set('_serialize', ['loanLimits']);
    }

    /**
     * View method
     *
     * @param string|null $id Loan Limit id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loanLimit = $this->LoanLimits->get($id, [
            'contain' => []
        ]);
        $this->set('loanLimit', $loanLimit);
        $this->set('_serialize', ['loanLimit']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loanLimit = $this->LoanLimits->newEntity();
        if ($this->request->is('post')) {
            $loanLimit = $this->LoanLimits->patchEntity($loanLimit, $this->request->data);
            if ($this->LoanLimits->save($loanLimit)) {
                $this->Flash->success(__('The loan limit has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The loan limit could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('loanLimit'));
        $this->set('_serialize', ['loanLimit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Loan Limit id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loanLimit = $this->LoanLimits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loanLimit = $this->LoanLimits->patchEntity($loanLimit, $this->request->data);
            if ($this->LoanLimits->save($loanLimit)) {
                $this->Flash->success(__('The loan limit has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The loan limit could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('loanLimit'));
        $this->set('_serialize', ['loanLimit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Loan Limit id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loanLimit = $this->LoanLimits->get($id);
        if ($this->LoanLimits->delete($loanLimit)) {
            $this->Flash->success(__('The loan limit has been deleted.'));
        } else {
            $this->Flash->error(__('The loan limit could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
