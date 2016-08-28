<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ItemStatuses Controller
 *
 * @property \App\Model\Table\ItemStatusesTable $ItemStatuses
 */
class ItemStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    { $this->layout = 'admin';
        $this->set('itemStatuses', $this->paginate($this->ItemStatuses));
        $this->set('_serialize', ['itemStatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Status id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {$this->layout = 'admin';
        $itemStatus = $this->ItemStatuses->get($id, [
            'contain' => ['Items']
        ]);
        $this->set('itemStatus', $itemStatus);
        $this->set('_serialize', ['itemStatus']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {$this->layout = 'admin';
        $itemStatus = $this->ItemStatuses->newEntity();
        if ($this->request->is('post')) {
            $itemStatus = $this->ItemStatuses->patchEntity($itemStatus, $this->request->data);
            if ($this->ItemStatuses->save($itemStatus)) {
                $this->Flash->success(__('The item status has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('itemStatus'));
        $this->set('_serialize', ['itemStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Status id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {$this->layout = 'admin';
        $itemStatus = $this->ItemStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemStatus = $this->ItemStatuses->patchEntity($itemStatus, $this->request->data);
            if ($this->ItemStatuses->save($itemStatus)) {
                $this->Flash->success(__('The item status has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('itemStatus'));
        $this->set('_serialize', ['itemStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Status id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {$this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $itemStatus = $this->ItemStatuses->get($id);
        if ($this->ItemStatuses->delete($itemStatus)) {
            $this->Flash->success(__('The item status has been deleted.'));
        } else {
            $this->Flash->error(__('The item status could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
