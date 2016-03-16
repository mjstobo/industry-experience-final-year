<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContactTypes Controller
 *
 * @property \App\Model\Table\ContactTypesTable $ContactTypes
 */
class ContactTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('contactTypes', $this->paginate($this->ContactTypes));
        $this->set('_serialize', ['contactTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Contact Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactType = $this->ContactTypes->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('contactType', $contactType);
        $this->set('_serialize', ['contactType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactType = $this->ContactTypes->newEntity();
        if ($this->request->is('post')) {
            $contactType = $this->ContactTypes->patchEntity($contactType, $this->request->data);
            if ($this->ContactTypes->save($contactType)) {
                $this->Flash->success('The contact type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The contact type could not be saved. Please, try again.');
            }
        }
        $this->set(compact('contactType'));
        $this->set('_serialize', ['contactType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactType = $this->ContactTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactType = $this->ContactTypes->patchEntity($contactType, $this->request->data);
            if ($this->ContactTypes->save($contactType)) {
                $this->Flash->success('The contact type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The contact type could not be saved. Please, try again.');
            }
        }
        $this->set(compact('contactType'));
        $this->set('_serialize', ['contactType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactType = $this->ContactTypes->get($id);
        if ($this->ContactTypes->delete($contactType)) {
            $this->Flash->success('The contact type has been deleted.');
        } else {
            $this->Flash->error('The contact type could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
