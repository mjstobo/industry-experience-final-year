<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReserveItems Controller
 *
 * @property \App\Model\Table\ReserveItemsTable $ReserveItems
 */
class ReserveItemsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Items', 'ReturnStatuses']
        ];
        $this->set('reserveItems', $this->paginate($this->ReserveItems));
        $this->set('_serialize', ['reserveItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Reserve Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reserveItem = $this->ReserveItems->get($id, [
            'contain' => ['Users', 'Items', 'ReturnStatuses']
        ]);
        $this->set('reserveItem', $reserveItem);
        $this->set('_serialize', ['reserveItem']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
        $reserveItem = $this->Reserves->newEntity();
        if ($this->request->is('post')) {
            $reserveItem = $this->Reserves->patchEntity($reserveItem, $this->request->data);
            if ($this->Reserves->save($reserveItem)) {
                $this->Flash->success(__('The reserve item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reserve item could not be saved. Please, try again.'));
            }
        }
        $users = $this->ReserveItems->Users->find('list', ['limit' => 200]);
        $items = $this->ReserveItems->Items->find('list', ['limit' => 200]);
        $returnStatuses = $this->ReserveItems->ReturnStatuses->find('list', ['limit' => 200]);
        $this->set(compact('reserveItem', 'users', 'items', 'returnStatuses'));
        $this->set('_serialize', ['reserveItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reserve Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reserveItem = $this->ReserveItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reserveItem = $this->ReserveItems->patchEntity($reserveItem, $this->request->data);
            if ($this->ReserveItems->save($reserveItem)) {
                $this->Flash->success(__('The reserve item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reserve item could not be saved. Please, try again.'));
            }
        }
        $users = $this->ReserveItems->Users->find('list', ['limit' => 200]);
        $items = $this->ReserveItems->Items->find('list', ['limit' => 200]);
        $returnStatuses = $this->ReserveItems->ReturnStatuses->find('list', ['limit' => 200]);
        $this->set(compact('reserveItem', 'users', 'items', 'returnStatuses'));
        $this->set('_serialize', ['reserveItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reserve Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reserveItem = $this->ReserveItems->get($id);
        if ($this->ReserveItems->delete($reserveItem)) {
            $this->Flash->success(__('The reserve item has been deleted.'));
        } else {
            $this->Flash->error(__('The reserve item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
