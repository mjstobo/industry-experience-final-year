<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * ItemCopies Controller
 *
 * @property \App\Model\Table\ItemCopiesTable $ItemCopies
 */
class ItemCopiesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items', 'ItemStatuses']
        ];
        $this->set('itemCopies', $this->paginate($this->ItemCopies));
        $this->set('_serialize', ['itemCopies']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Copy id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemCopiesTable = TableRegistry::get('ItemCopies');
        $itemCopy = $itemCopiesTable->find()
            ->where(['itemcopies.id' => $id])
            ->contain(['Items','Items.Authors','Items.Subjects','Items.Publishers'])
            ->first();
        $this->set('itemCopy', $itemCopy);
        $this->set('_serialize', ['itemCopy']);

    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $itemCopy = $this->ItemCopies->newEntity();
        if ($this->request->is('post')) {
            $itemCopy = $this->ItemCopies->patchEntity($itemCopy, $this->request->data);
            if ($this->ItemCopies->save($itemCopy)) {
                $this->Flash->success(__('The item copy has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item copy could not be saved. Please, try again.'));
            }
        }
        $items = $this->ItemCopies->Items->find('list', ['limit' => 200]);
        $itemStatuses = $this->ItemCopies->ItemStatuses->find('list', ['limit' => 200]);
        $this->set(compact('itemCopy', 'items', 'itemStatuses'));
        $this->set('_serialize', ['itemCopy']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Copy id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemCopy = $this->ItemCopies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemCopy = $this->ItemCopies->patchEntity($itemCopy, $this->request->data);
            if ($this->ItemCopies->save($itemCopy)) {
                $this->Flash->success(__('The item copy has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item copy could not be saved. Please, try again.'));
            }
        }
        $items = $this->ItemCopies->Items->find('list', ['limit' => 200]);
        $itemStatuses = $this->ItemCopies->ItemStatuses->find('list', ['limit' => 200]);
        $this->set(compact('itemCopy', 'items', 'itemStatuses'));
        $this->set('_serialize', ['itemCopy']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Copy id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemCopy = $this->ItemCopies->get($id);
        if ($this->ItemCopies->delete($itemCopy)) {
            $this->Flash->success(__('The item copy has been deleted.'));
        } else {
            $this->Flash->error(__('The item copy could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
