<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Postages Controller
 *
 * @property \App\Model\Table\PostagesTable $Postages
 */
class PostagesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'admin';
        $this->paginate = [
            'contain' => ['States']
        ];
        $this->set('postages', $this->paginate($this->Postages));
        $this->set('_serialize', ['postages']);
    }

    /**
     * View method
     *
     * @param string|null $id Postage id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout = 'admin';
        $postage = $this->Postages->get($id, [
            'contain' => ['States']
        ]);
        $this->set('postage', $postage);
        $this->set('_serialize', ['postage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout = 'admin';
        $postage = $this->Postages->newEntity();
        if ($this->request->is('post')) {
            $postage = $this->Postages->patchEntity($postage, $this->request->data);
            if ($this->Postages->save($postage)) {
                $this->Flash->success(__('The postage has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The postage could not be saved. Please, try again.'));
            }
        }
        $states = $this->Postages->States->find('list', ['limit' => 200]);
        $this->set(compact('postage', 'states'));
        $this->set('_serialize', ['postage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Postage id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout = 'admin';
        $postage = $this->Postages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postage = $this->Postages->patchEntity($postage, $this->request->data);
            if ($this->Postages->save($postage)) {
                $this->Flash->success(__('The postage has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The postage could not be saved. Please, try again.'));
            }
        }
        $states = $this->Postages->States->find('list', ['limit' => 200]);
        $this->set(compact('postage', 'states'));
        $this->set('_serialize', ['postage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Postage id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $postage = $this->Postages->get($id);
        if ($this->Postages->delete($postage)) {
            $this->Flash->success(__('The postage has been deleted.'));
        } else {
            $this->Flash->error(__('The postage could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
