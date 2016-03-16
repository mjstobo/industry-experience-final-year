<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReserveItemCopies Controller
 *
 * @property \App\Model\Table\ReserveItemCopiesTable $ReserveItemCopies
 */
class ReserveItemCopiesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Reserves', 'ItemCopies']
        ];
        $this->set('reserveItemCopies', $this->paginate($this->ReserveItemCopies));
        $this->set('_serialize', ['reserveItemCopies']);
    }

    /**
     * View method
     *
     * @param string|null $id Reserve Item Copy id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reserveItemCopy = $this->ReserveItemCopies->get($id, [
            'contain' => ['Reserves', 'ItemCopies']
        ]);
        $this->set('reserveItemCopy', $reserveItemCopy);
        $this->set('_serialize', ['reserveItemCopy']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reserveItemCopy = $this->ReserveItemCopies->newEntity();
        if ($this->request->is('post')) {
            $reserveItemCopy = $this->ReserveItemCopies->patchEntity($reserveItemCopy, $this->request->data);
            if ($this->ReserveItemCopies->save($reserveItemCopy)) {
                $this->Flash->success(__('The reserve item copy has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reserve item copy could not be saved. Please, try again.'));
            }
        }
        $reserves = $this->ReserveItemCopies->Reserves->find('list', ['limit' => 200]);
        $itemCopies = $this->ReserveItemCopies->ItemCopies->find('list', ['limit' => 200]);
        $this->set(compact('reserveItemCopy', 'reserves', 'itemCopies'));
        $this->set('_serialize', ['reserveItemCopy']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reserve Item Copy id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reserveItemCopy = $this->ReserveItemCopies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reserveItemCopy = $this->ReserveItemCopies->patchEntity($reserveItemCopy, $this->request->data);
            if ($this->ReserveItemCopies->save($reserveItemCopy)) {
                $this->Flash->success(__('The reserve item copy has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reserve item copy could not be saved. Please, try again.'));
            }
        }
        $reserves = $this->ReserveItemCopies->Reserves->find('list', ['limit' => 200]);
        $itemCopies = $this->ReserveItemCopies->ItemCopies->find('list', ['limit' => 200]);
        $this->set(compact('reserveItemCopy', 'reserves', 'itemCopies'));
        $this->set('_serialize', ['reserveItemCopy']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reserve Item Copy id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reserveItemCopy = $this->ReserveItemCopies->get($id);
        if ($this->ReserveItemCopies->delete($reserveItemCopy)) {
            $this->Flash->success(__('The reserve item copy has been deleted.'));
        } else {
            $this->Flash->error(__('The reserve item copy could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
