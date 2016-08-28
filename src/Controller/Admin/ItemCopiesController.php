<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ItemCopies Controller
 *
 * @property \App\Model\Table\ItemCopiesTable $ItemCopies
 */
class ItemCopiesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'admin';
        $this->paginate = [
            'contain' => ['Items', 'ItemStatuses']
        ];
        $this->set('itemCopies', $this->paginate($this->ItemCopies));
        $this->set('_serialize', ['itemCopies']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Copy id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout = 'admin';
        $item = $this->ItemCopies->get($id, [
            'contain' => ['Items', 'ItemStatuses','Items.Authors','Items.Subjects','Items.Publishers']
        ]);
        $this->set('item', $item);
        $this->set('_serialize', ['item']);

    //    $copies = $this->ItemCopies->get($id, ['contain' =>['Items','ItemStatuses']])
          //  ->where(['item_id' => 'Items.item_id'])                    WIPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP
      //  $this->set($copies);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout = 'admin';
        $itemCopy = $this->ItemCopies->newEntity();
        if ($this->request->is('post')) {
            $itemCopy = $this->ItemCopies->patchEntity($itemCopy, $this->request->data);
            if ($this->ItemCopies->save($itemCopy)) {
                $this->Flash->success(__('The item copy has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item copy could not be saved. Please, try again.'));
            }
        }
        $items = $this->ItemCopies->Items->find('list', ['limit' => 200]);
        $itemStatuses = $this->ItemCopies->ItemStatuses->find('list', ['limit' => 200]);
        $this->set(compact('itemCopy', 'items', 'itemStatuses'));
        $this->set('_serialize', ['itemCopy']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Copy id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout = 'admin';
        $itemCopy = $this->ItemCopies->get($id, [
            'contain' => ['Items']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemCopy = $this->ItemCopies->patchEntity($itemCopy, $this->request->data);
            if ($this->ItemCopies->save($itemCopy)) {
                $this->Flash->success(__('The item copy has been saved.'));
                return $this->redirect(['controller'=>'items','action' => 'view',$itemCopy->item_id]);
            } else {
                $this->Flash->error(__('The item copy could not be saved. Please, try again.'));
            }
        }
        $items = $this->ItemCopies->Items->find('list', ['limit' => 200]);
        $itemStatuses = $this->ItemCopies->ItemStatuses->find('list', ['limit' => 200]);
        $this->set(compact('itemCopy', 'items', 'itemStatuses'));
        $this->set('_serialize', ['itemCopy']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Copy id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $itemCopy = $this->ItemCopies->get($id);
        if ($this->ItemCopies->delete($itemCopy)) {
            $this->Flash->success(__('The item copy has been deleted.'));
        } else {
            $this->Flash->error(__('The item copy could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);

    }

public function viewDamaged()

{   $this->layout = 'admin';
    $result = false;
    $this->set('result', $result);
    $itemCopies = $this->ItemCopies->find()
        ->contain(['Items','Items.Authors'])
        ->where(['item_status_id'=> 4])
        ->toArray();

    if($itemCopies)

    {
        $result = true;

    }
    else
    {
        $result= false;
        $this->set('result', $result);
    }
    $this->set('result', $result);
    $this->set('itemCopies',$itemCopies);
}
}

