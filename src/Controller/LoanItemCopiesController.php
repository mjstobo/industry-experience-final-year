<?php
namespace App\Controller;

use App\Controller\AppController;

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
}
