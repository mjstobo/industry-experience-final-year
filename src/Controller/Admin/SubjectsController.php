<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Database\Schema\Table;
use Cake\ORM\TableRegistry;

/**
 * Subjects Controller
 *
 * @property \App\Model\Table\SubjectsTable $Subjects
 */
class SubjectsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {   $this->layout = 'admin';
        $subjects = $this->Subjects->find('all',['order'=>'subject_name asc']);

        $this->set('subjects', $subjects);
        $this->set('_serialize', ['subjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Subject id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {   $this->layout = 'admin';
        $subject = $this->Subjects->get($id, [
            'contain' => ['Items','Items.Publishers','Items.Catalogues','Items.Years','Items.ItemTypes','Items.Authors']
        ]);
        $itemSubjectTable = TableRegistry::get('ItemSubjects');

        $itemSubject = $itemSubjectTable->find()
            ->where(['subject_id'=>$id])
            ->first();
        if($itemSubject)
        {
            $deletable = false;
        }
        else
        {
            $deletable = true;

        }

        $this->set('deletable',$deletable);
        $this->set('id',$id);


        $this->set('subject', $subject);
        $this->set('_serialize', ['subject']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   $this->layout = 'admin';
        $subject = $this->Subjects->newEntity();
        if ($this->request->is('post')) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->data);
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('The subject has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The subject could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('subject'));
        $this->set('_serialize', ['subject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subject id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {   $this->layout = 'admin';
        $subject = $this->Subjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->data);
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('The subject has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The subject could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('subject'));
        $this->set('_serialize', ['subject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subject id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {   $this->layout = 'admin';
        //$this->request->allowMethod(['post', 'delete']);
        $subject = $this->Subjects->get($id);
        if ($this->Subjects->delete($subject)) {
            $this->Flash->success(__('The subject has been deleted.'));
        } else {
            $this->Flash->error(__('The subject could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
