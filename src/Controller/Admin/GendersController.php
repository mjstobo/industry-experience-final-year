<?php
namespace App\Controller\Admin;

use App\Controller\AppController;


/**
 * Genders Controller
 *
 * @property \App\Model\Table\GendersTable $Genders */
class GendersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'admin';
        $this->set('genders', $this->paginate($this->Genders));
        $this->set('_serialize', ['genders']);
    }

    /**
     * View method
     *
     * @param string|null $id Gender id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout = 'admin';
        $gender = $this->Genders->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('gender', $gender);
        $this->set('_serialize', ['gender']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout = 'admin';
        $gender = $this->Genders->newEntity();
        if ($this->request->is('post')) {
            $gender = $this->Genders->patchEntity($gender, $this->request->data);
            if ($this->Genders->save($gender)) {
                $this->Flash->success('The gender has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The gender could not be saved. Please, try again.');
            }
        }
        $this->set(compact('gender'));
        $this->set('_serialize', ['gender']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gender id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout = 'admin';
        $gender = $this->Genders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gender = $this->Genders->patchEntity($gender, $this->request->data);
            if ($this->Genders->save($gender)) {
                $this->Flash->success('The gender has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The gender could not be saved. Please, try again.');
            }
        }
        $this->set(compact('gender'));
        $this->set('_serialize', ['gender']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gender id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $gender = $this->Genders->get($id);
        if ($this->Genders->delete($gender)) {
            $this->Flash->success('The gender has been deleted.');
        } else {
            $this->Flash->error('The gender could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
