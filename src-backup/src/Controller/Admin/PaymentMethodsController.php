<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PaymentMethods Controller
 *
 * @property \App\Model\Table\PaymentMethodsTable $PaymentMethods
 */
class PaymentMethodsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'admin';
        $this->set('paymentMethods', $this->paginate($this->PaymentMethods));
        $this->set('_serialize', ['paymentMethods']);
    }

    /**
     * View method
     *
     * @param string|null $id Payment Method id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {   $this->layout = 'admin';
        $paymentMethod = $this->PaymentMethods->get($id, [
            'contain' => ['Payments']
        ]);
        $this->set('paymentMethod', $paymentMethod);
        $this->set('_serialize', ['paymentMethod']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   $this->layout = 'admin';
        $paymentMethod = $this->PaymentMethods->newEntity();
        if ($this->request->is('post')) {
            $paymentMethod = $this->PaymentMethods->patchEntity($paymentMethod, $this->request->data);
            if ($this->PaymentMethods->save($paymentMethod)) {
                $this->Flash->success(__('The payment method has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payment method could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('paymentMethod'));
        $this->set('_serialize', ['paymentMethod']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Method id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {   $this->layout = 'admin';
        $paymentMethod = $this->PaymentMethods->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentMethod = $this->PaymentMethods->patchEntity($paymentMethod, $this->request->data);
            if ($this->PaymentMethods->save($paymentMethod)) {
                $this->Flash->success(__('The payment method has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payment method could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('paymentMethod'));
        $this->set('_serialize', ['paymentMethod']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Method id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {   $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $paymentMethod = $this->PaymentMethods->get($id);
        if ($this->PaymentMethods->delete($paymentMethod)) {
            $this->Flash->success(__('The payment method has been deleted.'));
        } else {
            $this->Flash->error(__('The payment method could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
