<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentTypes Controller
 *
 * @property \App\Model\Table\PaymentTypesTable $PaymentTypes
 */
class PaymentTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('paymentTypes', $this->paginate($this->PaymentTypes));
        $this->set('_serialize', ['paymentTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Payment Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentType = $this->PaymentTypes->get($id, [
            'contain' => ['Payments']
        ]);
        $this->set('paymentType', $paymentType);
        $this->set('_serialize', ['paymentType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentType = $this->PaymentTypes->newEntity();
        if ($this->request->is('post')) {
            $paymentType = $this->PaymentTypes->patchEntity($paymentType, $this->request->data);
            if ($this->PaymentTypes->save($paymentType)) {
                $this->Flash->success(__('The payment type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payment type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('paymentType'));
        $this->set('_serialize', ['paymentType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentType = $this->PaymentTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentType = $this->PaymentTypes->patchEntity($paymentType, $this->request->data);
            if ($this->PaymentTypes->save($paymentType)) {
                $this->Flash->success(__('The payment type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payment type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('paymentType'));
        $this->set('_serialize', ['paymentType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentType = $this->PaymentTypes->get($id);
        if ($this->PaymentTypes->delete($paymentType)) {
            $this->Flash->success(__('The payment type has been deleted.'));
        } else {
            $this->Flash->error(__('The payment type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
