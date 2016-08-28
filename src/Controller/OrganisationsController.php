<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Organisations Controller
 *
 * @property \App\Model\Table\OrganisationsTable $Organisations
 */
class OrganisationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'OrgTypes']
        ];
        $this->set('organisations', $this->paginate($this->Organisations));
        $this->set('_serialize', ['organisations']);
    }

    /**
     * View method
     *
     * @param string|null $id Organisation id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $organisation = $this->Organisations->get($id, [
            'contain' => ['Users', 'OrgTypes']
        ]);
        $this->set('organisation', $organisation);
        $this->set('_serialize', ['organisation']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $organisation = $this->Organisations->newEntity();
        if ($this->request->is('post')) {
            $organisation = $this->Organisations->patchEntity($organisation, $this->request->data);
            if ($this->Organisations->save($organisation)) {
                $this->Flash->success('The organisation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The organisation could not be saved. Please, try again.');
            }
        }
        $users = $this->Organisations->Users->find('list', ['limit' => 200]);
        $orgTypes = $this->Organisations->OrgTypes->find('list', ['limit' => 200]);
        $this->set(compact('organisation', 'users', 'orgTypes'));
        $this->set('_serialize', ['organisation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Organisation id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $organisation = $this->Organisations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $organisation = $this->Organisations->patchEntity($organisation, $this->request->data);
            if ($this->Organisations->save($organisation)) {
                $this->Flash->success('The organisation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The organisation could not be saved. Please, try again.');
            }
        }
        $users = $this->Organisations->Users->find('list', ['limit' => 200]);
        $orgTypes = $this->Organisations->OrgTypes->find('list', ['limit' => 200]);
        $this->set(compact('organisation', 'users', 'orgTypes'));
        $this->set('_serialize', ['organisation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Organisation id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organisation = $this->Organisations->get($id);
        if ($this->Organisations->delete($organisation)) {
            $this->Flash->success('The organisation has been deleted.');
        } else {
            $this->Flash->error('The organisation could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
