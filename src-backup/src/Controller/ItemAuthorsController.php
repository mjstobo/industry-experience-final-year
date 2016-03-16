<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemAuthors Controller
 *
 * @property \App\Model\Table\ItemAuthorsTable $ItemAuthors */
class ItemAuthorsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items', 'Authors']
        ];
        $this->set('itemAuthors', $this->paginate($this->ItemAuthors));
        $this->set('_serialize', ['itemAuthors']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Author id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemAuthor = $this->ItemAuthors->get($id, [
            'contain' => ['Items', 'Authors']
        ]);
        $this->set('itemAuthor', $itemAuthor);
        $this->set('_serialize', ['itemAuthor']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemAuthor = $this->ItemAuthors->newEntity();
        if ($this->request->is('post')) {
            $itemAuthor = $this->ItemAuthors->patchEntity($itemAuthor, $this->request->data);
            if ($this->ItemAuthors->save($itemAuthor)) {
                $this->Flash->success(__('The item author has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item author could not be saved. Please, try again.'));
            }
        }
        $items = $this->ItemAuthors->Items->find('list', ['limit' => 200]);
        $authors = $this->ItemAuthors->Authors->find('list', ['limit' => 200]);
        $this->set(compact('itemAuthor', 'items', 'authors'));
        $this->set('_serialize', ['itemAuthor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Author id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemAuthor = $this->ItemAuthors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemAuthor = $this->ItemAuthors->patchEntity($itemAuthor, $this->request->data);
            if ($this->ItemAuthors->save($itemAuthor)) {
                $this->Flash->success(__('The item author has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item author could not be saved. Please, try again.'));
            }
        }
        $items = $this->ItemAuthors->Items->find('list', ['limit' => 200]);
        $authors = $this->ItemAuthors->Authors->find('list', ['limit' => 200]);
        $this->set(compact('itemAuthor', 'items', 'authors'));
        $this->set('_serialize', ['itemAuthor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Author id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemAuthor = $this->ItemAuthors->get($id);
        if ($this->ItemAuthors->delete($itemAuthor)) {
            $this->Flash->success(__('The item author has been deleted.'));
        } else {
            $this->Flash->error(__('The item author could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
