<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ItemTypes Controller
 *
 * @property \App\Model\Table\ItemTypesTable $ItemTypes
 */
class ItemTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'admin';
        $this->set('itemTypes', $this->paginate($this->ItemTypes));
        $this->set('_serialize', ['itemTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout = 'admin';
        $itemType = $this->ItemTypes->get($id, [
            'contain' => ['Items']
        ]);
        $this->set('itemType', $itemType);
        $this->set('_serialize', ['itemType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout = 'admin';
        $itemType = $this->ItemTypes->newEntity();
        if ($this->request->is('post')) {
            $itemType = $this->ItemTypes->patchEntity($itemType, $this->request->data);
            if ($this->ItemTypes->save($itemType)) {
                $this->Flash->success(__('The item type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('itemType'));
        $this->set('_serialize', ['itemType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout = 'admin';
        $itemType = $this->ItemTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemType = $this->ItemTypes->patchEntity($itemType, $this->request->data);
            if ($this->ItemTypes->save($itemType)) {
                $this->Flash->success(__('The item type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('itemType'));
        $this->set('_serialize', ['itemType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $itemType = $this->ItemTypes->get($id);
        if ($this->ItemTypes->delete($itemType)) {
            $this->Flash->success(__('The item type has been deleted.'));
        } else {
            $this->Flash->error(__('The item type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
