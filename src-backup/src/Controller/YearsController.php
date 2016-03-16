<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Years Controller
 *
 * @property \App\Model\Table\YearsTable $Years
 */
class YearsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('years', $this->paginate($this->Years));
        $this->set('_serialize', ['years']);
    }

    /**
     * View method
     *
     * @param string|null $id Year id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $year = $this->Years->get($id, [
            'contain' => []
        ]);
        $this->set('year', $year);
        $this->set('_serialize', ['year']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $year = $this->Years->newEntity();
        if ($this->request->is('post')) {
            $year = $this->Years->patchEntity($year, $this->request->data);
            if ($this->Years->save($year)) {
                $this->Flash->success(__('The year has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The year could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('year'));
        $this->set('_serialize', ['year']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Year id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $year = $this->Years->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $year = $this->Years->patchEntity($year, $this->request->data);
            if ($this->Years->save($year)) {
                $this->Flash->success(__('The year has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The year could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('year'));
        $this->set('_serialize', ['year']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Year id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $year = $this->Years->get($id);
        if ($this->Years->delete($year)) {
            $this->Flash->success(__('The year has been deleted.'));
        } else {
            $this->Flash->error(__('The year could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
