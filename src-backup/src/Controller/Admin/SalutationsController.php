<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Salutations Controller
 *
 * @property \App\Model\Table\SalutationsTable $Salutations
 */
class SalutationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'admin';
        $this->set('salutations', $this->paginate($this->Salutations));
        $this->set('_serialize', ['salutations']);
    }

    /**
     * View method
     *
     * @param string|null $id Salutation id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout = 'admin';
        $salutation = $this->Salutations->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('salutation', $salutation);
        $this->set('_serialize', ['salutation']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout = 'admin';
        $salutation = $this->Salutations->newEntity();
        if ($this->request->is('post')) {
            $salutation = $this->Salutations->patchEntity($salutation, $this->request->data);
            if ($this->Salutations->save($salutation)) {
                $this->Flash->success('The salutation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The salutation could not be saved. Please, try again.');
            }
        }
        $this->set(compact('salutation'));
        $this->set('_serialize', ['salutation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Salutation id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout = 'admin';
        $salutation = $this->Salutations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salutation = $this->Salutations->patchEntity($salutation, $this->request->data);
            if ($this->Salutations->save($salutation)) {
                $this->Flash->success('The salutation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The salutation could not be saved. Please, try again.');
            }
        }
        $this->set(compact('salutation'));
        $this->set('_serialize', ['salutation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Salutation id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $salutation = $this->Salutations->get($id);
        if ($this->Salutations->delete($salutation)) {
            $this->Flash->success('The salutation has been deleted.');
        } else {
            $this->Flash->error('The salutation could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
