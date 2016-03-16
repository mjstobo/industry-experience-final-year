<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ShelfSections Controller
 *
 * @property \App\Model\Table\ShelfSectionsTable $ShelfSections
 */
class ShelfSectionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'admin';
        $this->set('shelfSections', $this->paginate($this->ShelfSections));
        $this->set('_serialize', ['shelfSections']);
    }

    /**
     * View method
     *
     * @param string|null $id Shelf Section id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout = 'admin';
        $shelfSection = $this->ShelfSections->get($id, [
            'contain' => []
        ]);
        $this->set('shelfSection', $shelfSection);
        $this->set('_serialize', ['shelfSection']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout = 'admin';
        $shelfSection = $this->ShelfSections->newEntity();
        if ($this->request->is('post')) {
            $shelfSection = $this->ShelfSections->patchEntity($shelfSection, $this->request->data);
            if ($this->ShelfSections->save($shelfSection)) {
                $this->Flash->success(__('The shelf section has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The shelf section could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shelfSection'));
        $this->set('_serialize', ['shelfSection']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shelf Section id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout = 'admin';
        $shelfSection = $this->ShelfSections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shelfSection = $this->ShelfSections->patchEntity($shelfSection, $this->request->data);
            if ($this->ShelfSections->save($shelfSection)) {
                $this->Flash->success(__('The shelf section has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The shelf section could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shelfSection'));
        $this->set('_serialize', ['shelfSection']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shelf Section id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $shelfSection = $this->ShelfSections->get($id);
        if ($this->ShelfSections->delete($shelfSection)) {
            $this->Flash->success(__('The shelf section has been deleted.'));
        } else {
            $this->Flash->error(__('The shelf section could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
