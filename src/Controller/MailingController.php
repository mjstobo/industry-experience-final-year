<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Email\Email;
use \CS_REST_Subscribers;
use Cake\ORM\TableRegistry;//


class MailingController extends AppController
{

    //var $components=array("Email","Session");
    var $helpers = array("Html", "Form");

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $user_id = $this->request->session()->read('Auth.User.id');

        $membershipsTable = TableRegistry::get('Memberships');
        $currStatus = $membershipsTable->find()
            ->where(['user_id' => $user_id, 'status_id' => 1])
            ->all();

        $currStatus->toArray();

        if ($currStatus->isEmpty()) {
            $this->redirect(['controller' => 'users', 'action' => 'renew']);
        } else {
            $this->Auth->allow(['add', 'logout', 'forget', 'home', 'edit', 'index', 'unsubscribe', 'subscribe']);
        }
    }

    public function index()
    {
        $this->loadComponent('RequestHandler');
        // $myRedirect = Router::url(['controller' => 'Mycontroller', 'action' => 'myaction'], true);

        //Authenticate via API key for 'Test List'
        $apiTable = TableRegistry::get('ApiKeys');
        $cmKey = $apiTable->find()
        ->where(['id' => 3])
        ->first();
        $listKey = $apiTable->find()
        ->where(['id' => 4])
        ->first();
        $auth = array('api_key' => $cmKey->key);
        $wrap1 = new CS_REST_Subscribers($listKey->key, $auth);

        // Check subscription status of session user


        $user = $this->request->session()->read('Auth.User');
        $userEmail = $user['email_address'];
        $checkFirst = $wrap1->get($userEmail);

        $firstResponseArray = get_object_vars($checkFirst->response);

        if ($this->request->is('get')) {
           // echo "Result of GET /api/v3.1/subscribers/{list id}.{format}?email={email}\n<br />";
            if ($checkFirst->was_successful()) {

                $responseState = $firstResponseArray['State'];
                if($responseState == 'Active') {
                    $this->set('firstList', "Subscribed");
                    $this->set('firstBool', true);
                } else if($responseState == 'Unsubscribed'){
                    $this->set('firstList', "Unsubscribed");
                    $this->set('firstBool', false);
                  } else if($responseState == 'Unconfirmed'){
                      $this->set('firstList', "Unconfirmed");
                      $this->set('firstBool', true);
                }
            } else {
                 // echo 'Failed with code ' . $checkSub->http_status_code . "\n<br /><pre>";
                //debug($checkFirst->response);
                $responseMessage = $firstResponseArray['Message'];
                $this->set('firstList', "Unsubscribed");
                $this->set('firstBool', false);
            }
        }


        // Manual Subscription Form
        $email = $this->request->data('email');
        $name = $this->request->data('name');

        if ($this->request->is('post')) {
            $result = $wrap1->add(array(
                'EmailAddress' => $email,
                'Name' => $name,
                'Resubscribe' => true
            ));

         //   echo "Result of POST /api/v3.1/subscribers/{list id}.{format}\n<br />";
            if ($result->was_successful()) {
                $this->Flash->success('Subscribed!');
            } else {
                $this->Flash->error('Did not work!');
            }

        }
    }

    public function unsubscribe()
    {
        $this->loadComponent('RequestHandler');

        $apiTable = TableRegistry::get('ApiKeys');
        $cmKey = $apiTable->find()
        ->where(['id' => 3])
        ->first();
        $listKey = $apiTable->find()
        ->where(['id' => 4])
        ->first();
        $auth = array('api_key' => $cmKey->key);
        $wrap = new CS_REST_Subscribers($listKey->key, $auth);

        $userEmail = $this->request->session()->read('Auth.User.email_address');
        $result = $wrap->unsubscribe($userEmail);

       // echo "Result of GET /api/v3.1/subscribers/{list id}/unsubscribe.{format}\n<br />";
        if ($result->was_successful()) {
              $this->Flash->success(__('Successfully Unsubscribed'));
        } else {
              $this->Flash->error(__('Failed to unsubscribe. Please contact EDV.'));
        }
    }

    public function subscribe(){


        $name = $this->request->session()->read('Auth.User.family_name').", ".$this->request->session()->read('Auth.User.given_name');
        $email = $this->request->session()->read('Auth.User.email_address');

        $apiTable = TableRegistry::get('ApiKeys');
        $cmKey = $apiTable->find()
        ->where(['id' => 3])
        ->first();
        $listKey = $apiTable->find()
        ->where(['id' => 4])
        ->first();
        $auth = array('api_key' => $cmKey->key);
        $wrap = new CS_REST_Subscribers($listKey->key, $auth);

        $result = $wrap->add(array(
            'EmailAddress' => $email,
            'Name' => $name,
            'Resubscribe' => true
        ));

         //echo "Result of POST /api/v3.1/subscribers/{list id}.{format}\n<br />";
        if ($result->was_successful()) {
            $this->Flash->success('Subscribed successfully.');
        } else {
            $this->Flash->error(__('Failed to subscribe. Please contact EDV.'));
        }


    }
}
