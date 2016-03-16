<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\View\UrlHelper;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Event\Event;
class PublicController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $user_id = $this->request->session()->read('Auth.User.id');
        $this->Auth->allow(['search','view']);
        $this->layout = 'public';
    }




    public function search()
    {
        $this->paginate = [
            'contain' => ['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies', 'ItemCopies.ItemStatuses'], 'order' => ['Items.title' => 'asc']
        ];

        $filters = ['Title', 'Author', 'Subject', 'Publisher'];
        $this->set('filters', $filters);

        $itemauthor = TableRegistry::get('Items');

        $this->loadModel('Items');

        if (!isset($this->request->data['Search'])) {
            $this->set('noSearch', true);
            $this->set('items', $this->paginate($this->Items));
            $this->set('_serialize', ['items']);


        } else {
            $this->set('noSearch', false);
            if ($this->request->data['option'] == 0) {
                $item = $this->Items->find()
                    ->contain(['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies'])
                    ->where(['title LIKE' => "%" . $this->request->data['keyword'] . "%"]);
            } else if ($this->request->data['option'] == 1) {
                $item = $itemauthor->find()
                    ->contain(['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies'])
                    ->matching('Authors')
                    ->where(['author_name LIKE' => "%" . $this->request->data['keyword'] . "%"])
                    ->all();
            } else if ($this->request->data['option'] == 2) {
                $item = $itemauthor->find()
                    ->contain(['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies'])
                    ->matching('Subjects')
                    ->where(['subject_name LIKE' => "%" . $this->request->data['keyword'] . "%"])
                    ->all();
            } else if ($this->request->data['option'] == 3) {
                $item = $this->Items->find()
                    ->contain(['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'Subjects', 'ItemCopies'])
                    ->where(['Publishers.publisher_name LIKE' => "%" . $this->request->data['keyword'] . "%"]);
            } else {
                $item = $this->paginate($this->Items);
            }


            $this->set('items', $item);
            $this->set('_serialize', ['items']);

        }


    }

    public function view($id = null)
    {
        $this->loadModel('Items');
        $item = $this->Items->get($id, [
            'contain' => ['Years', 'Catalogues', 'Publishers', 'ItemTypes', 'Authors', 'ItemCopies', 'ItemCopies.ItemStatuses']
        ]);

        $this->set('item',$item);
    }







}