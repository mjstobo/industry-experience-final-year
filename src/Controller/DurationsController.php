<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Durations Controller
 *
 * @property \App\Model\Table\DurationsTable $Durations */
class DurationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('durations', $this->paginate($this->Durations));
        $this->set('_serialize', ['durations']);
    }

    /**
     * View method
     *
     * @param string|null $id Duration id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $duration = $this->Durations->get($id, [
            'contain' => ['Memberships']
        ]);
        $this->set('duration', $duration);
        $this->set('_serialize', ['duration']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $duration = $this->Durations->newEntity();
        if ($this->request->is('post')) {
            $duration = $this->Durations->patchEntity($duration, $this->request->data);
            if ($this->Durations->save($duration)) {
                $this->Flash->success('The duration has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The duration could not be saved. Please, try again.');
            }
        }
        $this->set(compact('duration'));
        $this->set('_serialize', ['duration']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Duration id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $duration = $this->Durations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $duration = $this->Durations->patchEntity($duration, $this->request->data);
            if ($this->Durations->save($duration)) {
                $this->Flash->success('The duration has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The duration could not be saved. Please, try again.');
            }
        }
        $this->set(compact('duration'));
        $this->set('_serialize', ['duration']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Duration id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $duration = $this->Durations->get($id);
        if ($this->Durations->delete($duration)) {
            $this->Flash->success('The duration has been deleted.');
        } else {
            $this->Flash->error('The duration could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
