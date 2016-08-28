<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MembershipCategories Controller
 *
 * @property \App\Model\Table\MembershipCategoriesTable $MembershipCategories
 */
class MembershipCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('membershipCategories', $this->paginate($this->MembershipCategories));
        $this->set('_serialize', ['membershipCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Membership Category id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membershipCategory = $this->MembershipCategories->get($id, [
            'contain' => []
        ]);
        $this->set('membershipCategory', $membershipCategory);
        $this->set('_serialize', ['membershipCategory']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membershipCategory = $this->MembershipCategories->newEntity();
        if ($this->request->is('post')) {
            $membershipCategory = $this->MembershipCategories->patchEntity($membershipCategory, $this->request->data);
            if ($this->MembershipCategories->save($membershipCategory)) {
                $this->Flash->success(__('The membership category has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The membership category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('membershipCategory'));
        $this->set('_serialize', ['membershipCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Membership Category id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membershipCategory = $this->MembershipCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membershipCategory = $this->MembershipCategories->patchEntity($membershipCategory, $this->request->data);
            if ($this->MembershipCategories->save($membershipCategory)) {
                $this->Flash->success(__('The membership category has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The membership category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('membershipCategory'));
        $this->set('_serialize', ['membershipCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Membership Category id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membershipCategory = $this->MembershipCategories->get($id);
        if ($this->MembershipCategories->delete($membershipCategory)) {
            $this->Flash->success(__('The membership category has been deleted.'));
        } else {
            $this->Flash->error(__('The membership category could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
