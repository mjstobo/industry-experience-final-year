<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Email\Email;
use \CS_REST_Subscribers;
use Cake\ORM\TableRegistry; //



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
        $this->Auth->allow(['logout']);
    }


    public function index(){
        $this->layout = 'admin';
        $this->loadModel('Users');
        $this->loadModel('UserTypes');
        $this->set('users', $this->Users->find('all')->contain(['UserTypes', 'ContactTypes', 'Memberships', 'Memberships.Status']));

    }

        public function view($id = null) // view for individual users mailing subscription
        {
            $this->layout = 'admin';
            $this->loadModel('Users');
            $this->loadModel('MemTypes');
            $user = $this->Users->get($id, [
                'contain' => ['UserTypes', 'Memberships', 'ContactTypes', 'Organisations', 'Countries', 'Genders', 'States', 'Memberships.Status']
            ]);
            $this->set('user', $user);
            $this->set('_serialize', ['user']);


            // Find individual users subscription details
            $this->loadComponent('RequestHandler');
            // $myRedirect = Router::url(['controller' => 'Mycontroller', 'action' => 'myaction'], true);

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
                    }
                } else {
                     // echo 'Failed with code ' . $checkSub->http_status_code . "\n<br /><pre>";
                    //debug($checkFirst->response);
                    $responseMessage = $firstResponseArray['Message'];
                    $this->set('firstList', "Unsubscribed");
                    $this->set('firstBool', false);
                }
            }

        }


    public function unsubscribe($id = null)
    {
        $this->layout = 'admin';
        $this->loadModel('Users');
        $user = $this->Users->get($id, [
            'contain' => ['UserTypes', 'Memberships', 'ContactTypes', 'Organisations', 'Countries', 'Genders', 'States']
        ]);

        $this->set('user', $user);

        $this->loadComponent('RequestHandler');
        //debug($this->request->query['?listid']);

        $apiTable = TableRegistry::get('ApiKeys');
        $cmKey = $apiTable->find()
        ->where(['id' => 3])
        ->first();
        $listKey = $apiTable->find()
        ->where(['id' => 4])
        ->first();
        $auth = array('api_key' => $cmKey->key);
        $wrap = new CS_REST_Subscribers($listKey->key, $auth);
        $userEmail = $user['email_address'];
        $result = $wrap->unsubscribe($userEmail);

       // echo "Result of GET /api/v3.1/subscribers/{list id}/unsubscribe.{format}\n<br />";
        if ($result->was_successful()) {
           // echo "Unsubscribed with code " . $result->http_status_code;
            $this->Flash->success($user['given_name']." ".$user['family_name']." has been successfully unsubscribed.");
        } else {
            $this->Flash->error($user['given_name']." ".$user['family_name']." could not be unsubscribed.");
           // echo 'Failed with code ' . $result->http_status_code . "\n<br /><pre>";
          //  var_dump($result->response);
           // echo '</pre>';


        }
    }

    public function subscribe($id = null){
        $this->layout = 'admin';
        $this->loadModel('Users');
        $user = $this->Users->get($id, [
            'contain' => ['UserTypes', 'Memberships', 'ContactTypes', 'Organisations', 'Countries', 'Genders', 'States']
        ]);

        $this->set('user', $user);

        $name = $user['family_name'].", ".$user['given_name'];
        $email = $user['email_address'];

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
            'Member' => true,
            'Resubscribe' => true
        ));
        
  
      //  echo "Result of POST /api/v3.1/subscribers/{list id}.{format}\n<br />";
        if ($result->was_successful()) {
            $this->Flash->success('Subscribed!');
        } else {
             //echo $result->response;
            $this->Flash->error($email." could not be subscribed due to ".$result->response);
        } 


    }
}