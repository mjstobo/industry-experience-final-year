<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Catalogues Controller
 *
 * @property \App\Model\Table\CataloguesTable $Catalogues
 */
class CataloguesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'admin';
        $this->set('catalogues', $this->paginate($this->Catalogues));
        $this->set('_serialize', ['catalogues']);
    }

    /**
     * View method
     *
     * @param string|null $id Catalogue id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {   $this->layout = 'admin';
        $catalogue = $this->Catalogues->get($id, [
            'contain' => ['Items']
        ]);
        $this->set('catalogue', $catalogue);
        $this->set('_serialize', ['catalogue']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   $this->layout = 'admin';
        $catalogue = $this->Catalogues->newEntity();
        if ($this->request->is('post')) {
            $catalogue = $this->Catalogues->patchEntity($catalogue, $this->request->data);
            if ($this->Catalogues->save($catalogue)) {
                $this->Flash->success(__('The catalogue has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The catalogue could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('catalogue'));
        $this->set('_serialize', ['catalogue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Catalogue id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout = 'admin';
        $catalogue = $this->Catalogues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catalogue = $this->Catalogues->patchEntity($catalogue, $this->request->data);
            if ($this->Catalogues->save($catalogue)) {
                $this->Flash->success(__('The catalogue has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The catalogue could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('catalogue'));
        $this->set('_serialize', ['catalogue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Catalogue id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {   $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $catalogue = $this->Catalogues->get($id);
        if ($this->Catalogues->delete($catalogue)) {
            $this->Flash->success(__('The catalogue has been deleted.'));
        } else {
            $this->Flash->error(__('The catalogue could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
