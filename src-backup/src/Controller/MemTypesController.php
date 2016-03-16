<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MemTypes Controller
 *
 * @property \App\Model\Table\MemTypesTable $MemTypes */
class MemTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('memTypes', $this->paginate($this->MemTypes));
        $this->set('_serialize', ['memTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Mem Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $memType = $this->MemTypes->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('memType', $memType);
        $this->set('_serialize', ['memType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $memType = $this->MemTypes->newEntity();
        if ($this->request->is('post')) {
            $memType = $this->MemTypes->patchEntity($memType, $this->request->data);
            if ($this->MemTypes->save($memType)) {
                $this->Flash->success('The mem type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The mem type could not be saved. Please, try again.');
            }
        }
        $this->set(compact('memType'));
        $this->set('_serialize', ['memType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mem Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $memType = $this->MemTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $memType = $this->MemTypes->patchEntity($memType, $this->request->data);
            if ($this->MemTypes->save($memType)) {
                $this->Flash->success('The mem type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The mem type could not be saved. Please, try again.');
            }
        }
        $this->set(compact('memType'));
        $this->set('_serialize', ['memType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mem Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $memType = $this->MemTypes->get($id);
        if ($this->MemTypes->delete($memType)) {
            $this->Flash->success('The mem type has been deleted.');
        } else {
            $this->Flash->error('The mem type could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
