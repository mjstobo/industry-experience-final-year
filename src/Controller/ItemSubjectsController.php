<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemSubjects Controller
 *
 * @property \App\Model\Table\ItemSubjectsTable $ItemSubjects
 */
class ItemSubjectsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items', 'Subjects']
        ];
        $this->set('itemSubjects', $this->paginate($this->ItemSubjects));
        $this->set('_serialize', ['itemSubjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Subject id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemSubject = $this->ItemSubjects->get($id, [
            'contain' => ['Items', 'Subjects']
        ]);
        $this->set('itemSubject', $itemSubject);
        $this->set('_serialize', ['itemSubject']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemSubject = $this->ItemSubjects->newEntity();
        if ($this->request->is('post')) {
            $itemSubject = $this->ItemSubjects->patchEntity($itemSubject, $this->request->data);
            if ($this->ItemSubjects->save($itemSubject)) {
                $this->Flash->success(__('The item subject has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item subject could not be saved. Please, try again.'));
            }
        }
        $items = $this->ItemSubjects->Items->find('list', ['limit' => 200]);
        $subjects = $this->ItemSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('itemSubject', 'items', 'subjects'));
        $this->set('_serialize', ['itemSubject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Subject id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemSubject = $this->ItemSubjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemSubject = $this->ItemSubjects->patchEntity($itemSubject, $this->request->data);
            if ($this->ItemSubjects->save($itemSubject)) {
                $this->Flash->success(__('The item subject has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item subject could not be saved. Please, try again.'));
            }
        }
        $items = $this->ItemSubjects->Items->find('list', ['limit' => 200]);
        $subjects = $this->ItemSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('itemSubject', 'items', 'subjects'));
        $this->set('_serialize', ['itemSubject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Subject id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemSubject = $this->ItemSubjects->get($id);
        if ($this->ItemSubjects->delete($itemSubject)) {
            $this->Flash->success(__('The item subject has been deleted.'));
        } else {
            $this->Flash->error(__('The item subject could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
