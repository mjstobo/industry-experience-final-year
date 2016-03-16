<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReserveStatuses Controller
 *
 * @property \App\Model\Table\ReserveStatusesTable $ReserveStatuses
 */
class ReserveStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('reserveStatuses', $this->paginate($this->ReserveStatuses));
        $this->set('_serialize', ['reserveStatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Reserve Status id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reserveStatus = $this->ReserveStatuses->get($id, [
            'contain' => ['Reserves']
        ]);
        $this->set('reserveStatus', $reserveStatus);
        $this->set('_serialize', ['reserveStatus']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reserveStatus = $this->ReserveStatuses->newEntity();
        if ($this->request->is('post')) {
            $reserveStatus = $this->ReserveStatuses->patchEntity($reserveStatus, $this->request->data);
            if ($this->ReserveStatuses->save($reserveStatus)) {
                $this->Flash->success(__('The reserve status has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reserve status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('reserveStatus'));
        $this->set('_serialize', ['reserveStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reserve Status id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reserveStatus = $this->ReserveStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reserveStatus = $this->ReserveStatuses->patchEntity($reserveStatus, $this->request->data);
            if ($this->ReserveStatuses->save($reserveStatus)) {
                $this->Flash->success(__('The reserve status has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reserve status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('reserveStatus'));
        $this->set('_serialize', ['reserveStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reserve Status id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reserveStatus = $this->ReserveStatuses->get($id);
        if ($this->ReserveStatuses->delete($reserveStatus)) {
            $this->Flash->success(__('The reserve status has been deleted.'));
        } else {
            $this->Flash->error(__('The reserve status could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
