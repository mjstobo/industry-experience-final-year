<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Authors Controller
 *
 * @property \App\Model\Table\AuthorsTable $Authors
 */
class AuthorsController extends AppController
{
    public function beforeFilter(Event $event)
    {

            $this->Auth->allow(['index', 'view', 'edit', 'delete']);

    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'admin';
        $authors = $this->Authors->find('all',['order'=>'author_name asc']);

        $authorTable = TableRegistry::get('Authors');
        $author = $authorTable->find()
            ->all();
        $this->set('authors', $authors);
        $this->set('author', $author);
        $this->set('_serialize', ['authors']);
    }

    /**
     * View method
     *
     * @param string|null $id Author id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout = 'admin';
        $itemauthorstable = TableRegistry::get('ItemAuthors');
        $author = $itemauthorstable->find()
            ->contain(['Items','Items.Publishers','Items.Catalogues','Items.Years','Items.ItemTypes'])
            ->where(['author_id'=>$id])
            ->all();

            $itemauthor = $itemauthorstable->find()
                ->where(['author_id'=>$id])
                ->first();
        if($itemauthor)
        {
            $deletable = false;
        }
        else
        {
            $deletable = true;

        }

        $this->set('itemauthor',$itemauthor);
        $this->set('id',$id);
        $this->set('deletable', $deletable);
        $this->set('author', $author);
        $this->set('_serialize', ['author']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout = 'admin';
        $author = $this->Authors->newEntity();
        if ($this->request->is('post')) {
            $author = $this->Authors->patchEntity($author, $this->request->data);
            if ($this->Authors->save($author)) {
                $this->Flash->success(__('The author has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The author could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('author'));
        $this->set('_serialize', ['author']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Author id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout = 'admin';
        $author = $this->Authors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $author = $this->Authors->patchEntity($author, $this->request->data);
            if ($this->Authors->save($author)) {
                $this->Flash->success(__('The author has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The author could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('author'));
        $this->set('_serialize', ['author']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Author id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->layout = 'admin';
       // $this->request->allowMethod(['post', 'delete']);
        $author = $this->Authors->get($id);
        if ($this->Authors->delete($author)) {
            $this->Flash->success(__('The author has been deleted.'));
        } else {
            $this->Flash->error(__('The author could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
