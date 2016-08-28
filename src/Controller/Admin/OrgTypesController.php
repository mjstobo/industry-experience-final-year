<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * OrgTypes Controller
 *
 * @property \App\Model\Table\OrgTypesTable $OrgTypes
 */
class OrgTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'admin';
        $this->set('orgTypes', $this->paginate($this->OrgTypes));
        $this->set('_serialize', ['orgTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Org Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout = 'admin';
        $orgType = $this->OrgTypes->get($id, [
            'contain' => ['Organisations']
        ]);
        $this->set('orgType', $orgType);
        $this->set('_serialize', ['orgType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout = 'admin';
        $orgType = $this->OrgTypes->newEntity();
        if ($this->request->is('post')) {
            $orgType = $this->OrgTypes->patchEntity($orgType, $this->request->data);
            if ($this->OrgTypes->save($orgType)) {
                $this->Flash->success('The org type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The org type could not be saved. Please, try again.');
            }
        }
        $this->set(compact('orgType'));
        $this->set('_serialize', ['orgType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Org Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout = 'admin';
        $orgType = $this->OrgTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orgType = $this->OrgTypes->patchEntity($orgType, $this->request->data);
            if ($this->OrgTypes->save($orgType)) {
                $this->Flash->success('The org type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The org type could not be saved. Please, try again.');
            }
        }
        $this->set(compact('orgType'));
        $this->set('_serialize', ['orgType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Org Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $orgType = $this->OrgTypes->get($id);
        if ($this->OrgTypes->delete($orgType)) {
            $this->Flash->success('The org type has been deleted.');
        } else {
            $this->Flash->error('The org type could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
