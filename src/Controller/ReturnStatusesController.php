<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReturnStatuses Controller
 *
 * @property \App\Model\Table\ReturnStatusesTable $ReturnStatuses
 */
class ReturnStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('returnStatuses', $this->paginate($this->ReturnStatuses));
        $this->set('_serialize', ['returnStatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Return Status id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $returnStatus = $this->ReturnStatuses->get($id, [
            'contain' => ['Loans']
        ]);
        $this->set('returnStatus', $returnStatus);
        $this->set('_serialize', ['returnStatus']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $returnStatus = $this->ReturnStatuses->newEntity();
        if ($this->request->is('post')) {
            $returnStatus = $this->ReturnStatuses->patchEntity($returnStatus, $this->request->data);
            if ($this->ReturnStatuses->save($returnStatus)) {
                $this->Flash->success(__('The return status has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The return status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('returnStatus'));
        $this->set('_serialize', ['returnStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Return Status id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $returnStatus = $this->ReturnStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $returnStatus = $this->ReturnStatuses->patchEntity($returnStatus, $this->request->data);
            if ($this->ReturnStatuses->save($returnStatus)) {
                $this->Flash->success(__('The return status has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The return status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('returnStatus'));
        $this->set('_serialize', ['returnStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Return Status id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $returnStatus = $this->ReturnStatuses->get($id);
        if ($this->ReturnStatuses->delete($returnStatus)) {
            $this->Flash->success(__('The return status has been deleted.'));
        } else {
            $this->Flash->error(__('The return status could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
