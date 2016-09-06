<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Membership;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\View\Helper;
use Cake\Network\Email\Email;
use PayPal\Api\PayerInfo;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\ExecutePayment;
use Cake\View\UrlHelper;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use App\Model\Entity\Settlement;
use Symfony\Component\Console\Helper\Table;
use Cake\Collection;
use \CS_REST_Subscribers;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users

 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */


    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->loadComponent('Flash');
        $this->Auth->allow(['logout']);
    }

    public function index()
    {
        $this->layout = 'admin';

        $users = TableRegistry::get('Memberships');
        $now = Time::today();
        $then = $now->subMonths(1);

        $time = time::today();


        $total = $users->find()
          ->where(['status_id' => 1,'join_date >' => $then])
            ->count();
        $this->set('total_users',$total);


        $memberships = TableRegistry::get('Memberships');
        $user_expiry = $memberships->find()
            ->contain(['Users','Users.Salutations'])
            ->where(['expiry_date <' => $time,'status_id' => 2])
            ->count();
        $this->set('user_expiry',$user_expiry);

        $loans = TableRegistry::get('Loans');
        $loan = $loans->find()
            ->where(['return_date >'=>$time,'return_status_id' => 2])
            ->count();
        $this->set('loan',$loan);


        $loan_expiry = $loans->find()
            ->where(['return_status_id' => 4])
            ->count();
        $this->set('loan_expiry',$loan_expiry);

    }

        //$time = $this-> //Fix this when someone has time.




    public function isAuthorized($user)
    {
        return parent::isAuthorized($user);
    }

    public function view($id = null) // view for individual users
    {
        $membershipsTable = TableRegistry::get('Memberships');

        $membership = $membershipsTable->find()
            ->where(['user_id'=>$id])
            ->orderDesc('expiry_date')
            ->orderDesc('id')
             ->first();
        $this->set('membership',$membership);
        if($membership->status_id == 1)
        {
            $status = true;
            $this->set('status',$status);
        }
        elseif($membership->status_id == 2)
        {
            $status = false;
            $this->set('status',$status);
        }
        $this->layout = 'admin';
        $this->loadModel('MemTypes');
        $this->loadModel('Memberships');

        $user = $this->Users->find()
            ->where(['Users.id'=>$id])
            ->contain(['UserTypes', 'Salutations','Years', 'Memberships'=> function($q){return $q ->orderAsc('status_id');}, 'ContactTypes', 'Organisations', 'Countries', 'Genders', 'States','Memberships.Status','Loans','Loans.ReturnStatuses','Settlements','Settlements.PaymentMethods','Settlements.PaymentTypes'])
            ->first();

        $loansTable = TableRegistry::get('Loans');

        $loans = $loansTable->find()
            ->contain('ReturnStatuses')
            ->where(['user_id'=>$id,'return_status_id !='=>1])
            ->andWhere(['return_status_id !='=>5])
            ->all();

        if($loans->isEmpty())
        {
            $loans = false;
        }

        $this->set('loans',$loans);

        $reservesTable = TableRegistry::get('Reserves');
        $reserve = $reservesTable->find()
            ->contain(['ReserveStatuses','Items' .
                ''])
            ->where(['reserve_status_id'=>1])
            ->andWhere(['user_id'=>$user->id])
            ->orWhere(['reserve_status_id'=>2])

            ->all();
        if($reserve->isEmpty())
        {
            $resStatus = false;
            $this->set('resStatus',$resStatus);
            $message = 'There are Currently no Reserves';
            $this->set('message',$message);
        }
        else
        {
            $resStatus = true;
            $this->set('resStatus',$resStatus);
        }

        $this->set('reserve',$reserve);


        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }


    public function viewall()// method for viewing a list of all users in the admin panel.
    {
        $this->layout = 'admin';
        $memberships = TableRegistry::get('Memberships');

        $users = $this->Users->find()
            ->contain(['UserTypes', 'Years', 'ContactTypes', 'Memberships.Status', 'Memberships.MemTypes','Memberships'])
            ->all();

        foreach($users as $user)
        {
            $membership = $memberships->find()
            ->where(['user_id'=> $user->id,'status_id'=>1])
                ->all();

            if ($membership->isEmpty()) {
                $user->mem = 'Inactive';
                    }
            else {
                $user->mem = 'Active';
            }
        }

            $this->set('users', $users);


            $this->set('_serialize', ['users']);


        }


    public function viewactiveusers()// method for viewing a list of all ACTIVE users in the admin panel.
    {
        $this->layout = 'admin';
        $this->loadModel('Users');
        $this->loadModel('UserTypes');
        $this->loadModel('Memberships');

        $this->set('users', $this->Users->find('all', ['contain' => ['UserTypes','Years', 'ContactTypes','Memberships.Status', 'Memberships', 'Memberships.MemTypes']])->matching('Memberships', function ($q) {
            return $q->where(['Memberships.status_id' => 1]);
        }
        ));
        $this->set('_serialize', ['users']);


    }

    public function viewinactiveusers()// method for viewing a list of all INACTIVE users in the admin panel.
    {
        $this->layout = 'admin';
        $this->loadModel('Users');
        $this->loadModel('UserTypes');
        $this->loadModel('Memberships');

        $this->set('users', $this->Users->find('all', ['contain' => ['UserTypes','Years', 'ContactTypes','Memberships.Status', 'Memberships','Memberships.MemTypes']])->matching('Memberships', function ($q) {
            return $q->where(['Memberships.status_id' => 2]);
        }
        ));
        $this->set('_serialize', ['users']);

    }


    public function add()
    {

        $this->layout = 'admin';

        $user = $this->Users->newEntity();

        $mem_Cat_Table = TableRegistry::get('MembershipCategories');
        $mem_cat = $mem_Cat_Table->find('list', ['limit' => 200]);

        $this->set('mem_cat', $mem_cat);



        $memprices = TableRegistry::get('MemTypes');
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $salutations = $this->Users->Salutations->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $genders = $this->Users->Genders->find('list', ['limit' => 200]);
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $memberships = $this->Users->Memberships->MemTypes->find('list', ['limit' => 200]);
        $contactTypes = $this->Users->ContactTypes->find('list', ['limit' => 200]);
        $years = $this->Users->Years->find('list')
            ->order(['year_number Like "%N/A%" desc'])
            ->orderDesc('year_number');
        $memberships->contain('Memberships.MemTypes');
        $methods = ['Cash' => 'Cash', 'Credit / Debit Card' => 'Credit / Debit Card', 'Staff' => 'Staff'];
        $this->set(compact('user', 'userTypes', 'salutations','years', 'memberships', 'contactTypes', 'genders', 'countries', 'states', 'methods'));
        $this->set('_serialize', ['user']);

        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($user->errors()) {
                $this->Flash->error("Please correctly fill all fields.");

            } else if ($user->payment == 'Cash') {

              $mem_type = $this->request->data['mem_type_id'];
              $membershipsTable = TableRegistry::get('Memberships');
              $query = $memprices->find()
                  ->contain(['Durations'])
                  ->where(['MemTypes.id =' => $mem_type])
                  ->first();
              $price = $query->mem_price;
              $duration = $query->duration_id;
              $duration_year = $query->duration->duration_year;
              $duration_name =$query->duration->name;
              $description = $query->mem_name;
              $date = time::today();

              $join = time::today();
              $expiry = $date->addYears($duration_year);


                $query = $memprices->find()
                    ->select(['mem_price', 'mem_name'])
                    ->where(['id =' => $mem_type])
                    ->first();
                $price = $query->mem_price;
                $total = $price;

                if ($this->Users->save($user)) {

                    $membership = $membershipsTable->newEntity([
                        'user_id' => $user->id,
                        'status_id' => 1,
                        'mem_type_id' => $mem_type,
                        'duration_id' => $duration,
                        'join_date' => $join,
                        'expiry_date' => $expiry]);


                  if(  $membershipsTable->save($membership))
                  {
                      $payments = TableRegistry::get('Settlements');
                      $date = time::now();
                      $newCash = $payments->newEntity([
                          'payment_method_id' => 2,
                          'user_id' => $user->id,
                          'payment_type_id' => 1,
                          'amount' => $total,
                          'payment_date' => $date
                      ]);
                      $newCash->toArray();

                      if ($payments->save($newCash)) {
                          $this->request->session()->write('settlement', $newCash);
                          $this->Flash->success('The member has been added');
                  }
                      return $this->redirect(['action' => 'success', 'controller' => 'users', '?' => ['type' => 'cash'],$user->id]);
                    } else {
                        $this->Flash->error('The member could not be saved');
                    }
                }


            } else if ($user->payment == 'Credit / Debit Card') {

                $mem_type = $this->request->data['mem_type_id'];
                $membershipsTable = TableRegistry::get('Memberships');
                $query = $memprices->find()
                    ->contain(['Durations'])
                    ->where(['MemTypes.id =' => $mem_type])
                    ->first();
                $price = $query->mem_price;
                $duration = $query->duration_id;
                $duration_year = $query->duration->duration_year;
                $duration_name =$query->duration->name;
                $description = $query->mem_name;
                $date = time::today();

                $join = time::today();
                $expiry = $date->addYears($duration_year);

                $query = $memprices->find()
                    ->select(['mem_price', 'mem_name'])
                    ->where(['id =' => $mem_type])
                    ->first();
                $price = $query->mem_price;
                $total = $price;

                if ($this->Users->save($user)) {

                    $membership = $membershipsTable->newEntity([
                        'user_id' => $user->id,
                        'status_id' => 1,
                        'mem_type_id' => $mem_type,
                        'duration_id' => $duration,
                        'join_date' => $join,
                        'expiry_date' => $expiry]);


                    if(  $membershipsTable->save($membership))
                    {
                        $payments = TableRegistry::get('Settlements');
                        $date = time::now();
                        $newCash = $payments->newEntity([
                            'payment_method_id' => 3,
                            'user_id' => $user->id,
                            'payment_type_id' => 1,
                            'amount' => $total,
                            'payment_date' => $date
                        ]);
                        $newCash->toArray();

                        if ($payments->save($newCash)) {
                            $this->request->session()->write('settlement', $newCash);
                            $this->Flash->success('The member has been added');
                        }
                        return $this->redirect(['action' => 'success', 'controller' => 'users', '?' => ['type' => 'cash'],$user->id]);
                    } else {
                        $this->Flash->error('The member could not be saved');
                    }
                }



            } else if ($user->payment == 'Staff') {

                $mem_type = $this->request->data['mem_type_id'];
                $membershipsTable = TableRegistry::get('Memberships');
                $query = $memprices->find()
                    ->contain(['Durations'])
                    ->where(['MemTypes.id =' => $mem_type])
                    ->first();
                $price = $query->mem_price;
                $duration = $query->duration_id;
                $duration_year = $query->duration->duration_year;
                $duration_name =$query->duration->name;
                $description = $query->mem_name;
                $date = time::today();

                $join = time::today();
                $expiry = $date->addYears($duration_year);

                $query = $memprices->find()
                    ->select(['mem_price', 'mem_name'])
                    ->where(['id =' => $mem_type])
                    ->first();
                $price = $query->mem_price;
                $total = $price;

                if ($this->Users->save($user)) {

                    $membership = $membershipsTable->newEntity([
                        'user_id' => $user->id,
                        'status_id' => 1,
                        'mem_type_id' => $mem_type,
                        'duration_id' => $duration,
                        'join_date' => $join,
                        'expiry_date' => $expiry]);


                    if(  $membershipsTable->save($membership))
                    {
                        $payments = TableRegistry::get('Settlements');
                        $date = time::now();
                        $newCash = $payments->newEntity([
                            'payment_method_id' => 4,
                            'user_id' => $user->id,
                            'payment_type_id' => 1,
                            'amount' => $total,
                            'payment_date' => $date
                        ]);
                        $newCash->toArray();

                        if ($payments->save($newCash)) {
                            $this->request->session()->write('settlement', $newCash);
                            $this->Flash->success('The member has been added');
                        }
                        return $this->redirect(['action' => 'success', 'controller' => 'users', '?' => ['type' => 'cash'],$user->id]);
                    } else {
                        $this->Flash->error('The member could not be saved');
                    }
                }

            }
        }

        $status = $this->Users->Status->find('list', ['limit' => 200]);
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $salutations = $this->Users->Salutations->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $genders = $this->Users->Genders->find('list', ['limit' => 200]);
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $memberships = $this->Users->Memberships->MemTypes->find('list', ['limit' => 200]);
        $contactTypes = $this->Users->ContactTypes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'userTypes', 'salutations','years', 'memberships', 'contactTypes', 'genders', 'countries', 'states', 'status'));
        $this->set('_serialize', ['user']);
    }


    public function success($id = null){

        $this->layout = 'admin';

        $this->loadModel('Memberships');

        $user = $this->Users->get($id, [
            'contain' => ['UserTypes', 'Salutations','Years', 'Memberships', 'ContactTypes', 'Organisations', 'Countries', 'Genders', 'States','Memberships.Status','Loans','Loans.ReturnStatuses','Settlements','Settlements.PaymentMethods','Settlements.PaymentTypes','Memberships.MemTypes']
        ]);
        
        
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

        if ($result->was_successful()) {
          $this->Flash->success('Membership has been added to mailing list');
        } else {
          $this->Flash->error('Membership has been created, but unable to add member to mailing list.');
        }

        $this->set('user', $user);
        $this->set('_serialize', ['user']);

        if (isset($_GET['type']) && $_GET['type'] == 'cash') {

            $paymentType = 'Cash';

        } else if($_GET['type'] == 'eftpos') {

            $paymentType = 'EFTPOS';

        } else if($_GET['type'] == 'admin'){

            $paymentType = 'Staff';

        }


        $this->set('paymentType', $paymentType);



    }


    public function edit($id = null)
    {

        $this->layout = 'admin';
        $user = $this->Users->get($id, [
            'contain' => ['Memberships']
        ]);
        $usermem = $this->Users->get($id, [
            'contain' => ['Memberships']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'view',$id]);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $salutations = $this->Users->Salutations->find('list', ['limit' => 200]);
        $memberships = $this->Users->Memberships->find('list', ['limit' => 200]);
        $contactTypes = $this->Users->ContactTypes->find('list', ['limit' => 200]);
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $memTypes = $this->Users->Memberships->MemTypes->find('list', ['limit' => 200]);
        $genders = $this->Users->Genders->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $status = $this->Users->status->find('list', ['limit' => 200]);
        $years = $this->Users->Years->find('list')
            ->order(['year_number Like "%N/A%" desc'])
            ->orderDesc('year_number');
        $memstatus = $this->Users->Memberships->Status->find('list',['limit' =>200]);
        $this->set(compact('user', 'userTypes', 'salutations','years', 'memberships', 'contactTypes', 'genders', 'countries', 'states', 'memTypes','memstatus'));

        $this->set('_serialize', ['user']);
        $this->set('usermem', $usermem);

    }

    public function editpassword($id = null)
    {
        $this->layout = 'admin';
                $user = $this->Users->get($id, [
            'contain' => ['Memberships']
        ]);
        $usermem = $this->Users->get($id, [
            'contain' => ['Memberships']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'view',$id]);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $salutations = $this->Users->Salutations->find('list', ['limit' => 200]);
        $memberships = $this->Users->Memberships->find('list', ['limit' => 200]);
        $contactTypes = $this->Users->ContactTypes->find('list', ['limit' => 200]);
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $memTypes = $this->Users->Memberships->MemTypes->find('list', ['limit' => 200]);
        $genders = $this->Users->Genders->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $years = $this->Users->Years->find('list',['order'=>'id desc']);
        $memstatus = $this->Users->Memberships->Status->find('list',['limit' =>200]);
        $this->set(compact('user', 'userTypes', 'salutations','years', 'memberships', 'contactTypes', 'genders', 'countries', 'states', 'memTypes','memstatus'));

        $this->set('_serialize', ['user']);
        $this->set('usermem', $usermem);
    }

    public function generatepassword($id = null)
    {
        $users = TableRegistry::get('Users');;
        $user = $users->find()
            ->where(['id' => $id])
            ->first();
        $this->set('user', $user);
        $useremail = $user->email_address;
        $email = new Email('default');
        $email->transport('edv');

        try {
            $newpw = $this->Users->generateRandomString(10);
            $user->password = $newpw;
            $users->save($user);
            $res = $email->from(['admin@eatingdisorders.org.au' => 'EDV Website'])
                ->to([$useremail])
                ->subject('Your new password to log in for EDV')
                ->send('Your new password is for EDV is: ' . $newpw . ' Please log in here: http://members.eatingdisorders.org.au/users/login');
        } catch (Exception $e) {

            echo 'Exception : ', $e->getMessage(), "\n";
        }


        $this->Flash->success('New password is sent to the members email.');
        return $this->redirect(['action' => 'view',$id]);

    }

    public function delete($id = null)
    {
        $this->layout = 'admin';
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }



    public function login()
    {
        $this->layout = 'admin';
        if ($this->request->session()->read('Auth.User.user_type_id') == 1) {
            $this->redirect(['controller' => 'users', 'action' => 'index', 'admin' => true]);
        } else {
            $this->redirect(['controller' => 'users', 'action' => 'login', 'prefix' => false]);
        }
    }

    public function logout()
    {
        if ($this->Auth->logout()) {
            $user = $this->Auth->identify();
            if ($user['user_type_id'] != 1) {
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
        }
        return $this->redirect($this->Auth->logout());
    }




    public function renew()
    {
        $this->layout = 'admin';
        if ($this->request->is('get')) {

            if (!empty($this->request->query['term'])) {
                $term = $this->request->query['term'];

                $usersTable = TableRegistry::get('Users');
                $user = $usersTable->find()
                    ->contain(['Loans.ItemCopies', 'Loans.ItemCopies.Items','Settlements'])
                    ->where(['email_address LIKE' => '%' . $term . '%'])
                    ->orWhere(['given_name LIKE' => '%' . $term . '%'])
                    ->orWhere(['family_name LIKE' => '%' . $term . '%'])
                    ->orWhere(['id LIKE' => '%' . $term . '%'])
                    ->orWhere(['CONCAT(given_name, " ", family_name) LIKE' => '%' . $term . '%'])
                    ->toArray();

                if (isset($term)) {
                    $this->set('term', $term);
                }

                if (!$user) {
                    $result = false;
                    $this->Flash->set('This search returned no results. Please search again', ['element' => 'error']);

                } else {

                    $result = true;

                }

                $this->set('users', $user);
                $this->set('result', $result);
                $this->set('message', '');

            }
        }
        }


    public function renewconfirm($id = null)
    {
        if (!$id) {

            $this->redirect(['action' => 'renew']);

        }

        $this->layout = 'admin';

        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->find()
            ->contain(['Memberships', 'Settlements', 'Settlements.PaymentMethods', 'Salutations', 'Genders', 'Years', 'ContactTypes', 'States', 'Countries', 'Memberships.MemTypes'])
            ->where(['Users.id' => $id])
            ->first();

        $membershipTable = TableRegistry::get('Memberships');

        $membership = $membershipTable->find()
            ->where(['user_id' => $id, 'status_id' => 1])
            ->contain(['Users', 'Durations', 'MemTypes'])
            ->order(['expiry_date' => 'DESC'])
            ->first();

        if (!$membership) {

            $membershipStatus = false;
            $this->set('membershipStatus', $membershipStatus);

        } else {

            $membershipStatus = true;
            $this->set('membershipStatus', $membershipStatus);

        }

        $this->set('user', $user);

        $paymentoptionsTable = TableRegistry::get('PaymentMethods');

        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $salutations = $this->Users->Salutations->find('list', ['limit' => 200]);
        $memberships = $this->Users->Memberships->MemTypes->find('list', ['limit' => 200]);
        $memberships->contain('Memberships.MemTypes', 'Memberships.MemTypes.Durations');
        $paymentoptions = $paymentoptionsTable->find('list')
            ->skip(1)
            ->toArray();
        $this->set('payment', $paymentoptions);
        // $options = ['1' => 'Cash', '2' => 'EFTPOS'];
        $this->set(compact('userTypes', 'salutations', 'years', 'memberships', 'contactTypes', 'genders', 'countries', 'states', 'options'));
        $this->set('_serialize', ['membership']);
        $this->loadModel('Memberships');


        if ($this->request->is('post')) {

            $memprices = TableRegistry::get('MemTypes');
            $mem_type = $this->request->data['mem_type_id'];
            $payment_type = $this->request->data['payment_type'];
            $join_date = $this->request->data['join_date'];
            $expiry_date = $this->request->data['expiry_date'];

            $query = $memprices->find()
                ->contain(['Durations'])
                ->where(['MemTypes.id =' => $mem_type])
                ->first();
            $price = $query->mem_price;


            $payments = TableRegistry::get('Settlements');
            $date = time::now();
            $newPayment = $payments->newEntity([
                'payment_method_id' => $payment_type,
                'user_id' => $id,
                'payment_type_id' => 2,
                'amount' => $price,
                'payment_date' => $date
            ]);

            if (!$membershipStatus) {

                $newMembership = $membershipTable->newEntity([
                    'user_id' => $id,
                    'mem_type_id' => $mem_type,
                    'status_id' => 1,
                    'duration_id' => $query->duration_id,
                    'join_date' => $join_date,
                    'expiry_date' => $expiry_date]);
            } else {

                $currMem = $membership;
                $currExpiry = $currMem->expiry_date;
                $currMem->expiry_date = $currExpiry->addYears($query->duration->duration_year);
                $currMem->mem_type_id = $mem_type;
            }

            if ($payments->save($newPayment)) {

                if (!$membershipStatus) {
                    if ($membershipTable->save($newMembership)) {
                        $email = new Email('default');
                        $email->transport('edv');
                        $email->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                            ->to($user[0]->email_address)
                            //->to('ie.expo.team14@gmail.com')
                            ->subject('EDV Membership Renewal')
                            ->send('Dear ' . $user->salutation->salutation_name . ' ' . $user->given_name . ' ' . $user->family_name . ',' . "\n" . "\n" . "\n" .
                                'Your Membership has been renewed for ' . $query->duration->duration_name . '.' . "\n" . "\n"
                                . 'Membership: ' . $query->description . "\n" . 'Effective from: ' . $join_date . "\n" . 'Expires on: ' . $expiry_date . "\n\n" . 'Amount Paid: $' . $price);

                        $this->set('query', $query);
                        $this->Flash->success('The Membership has been renewed');
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
                            'Email address' => $user->email_address,
                            'Name' => $user->given_name . ' ' . $user->family_name,
                            'Title' => $user->salutation->salutation_name,
                            'Gender' => $user->gender,
                            'Member' => true,
                            'Resubscribe' => true
                        ));

                        if ($result->was_successful()) {
                        } else {
                            $this->Flash->error('Membership has been created, but unable to add member to mailing list.');
                        }
                        $this->redirect(['action' => 'renewsuccess', $user->id]);
                    }
                } else {
                    if ($membershipTable->save($currMem)) {
                        $email = new Email('default');
                        $email->transport('edv');
                        $email->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                            ->to($user[0]->email_address)
                            //->to('ie.expo.team14@gmail.com')
                            ->subject('EDV Membership Renewal')
                            ->send('Dear ' . $user->salutation->salutation_name . ' ' . $user->given_name . ' ' . $user->family_name . ',' . "\n" . "\n" . "\n" .
                                'Your Membership has been renewed for ' . $query->duration->duration_name . '.' . "\n" . "\n"
                                . 'Membership: ' . $query->description . "\n" . 'Effective from: ' . $join_date . "\n" . 'Expires on: ' . $expiry_date . "\n\n" . 'Amount Paid: $' . $price);

                        $this->set('query', $query);
                        $this->Flash->success('The Membership has been renewed');
                        $this->redirect(['action' => 'renewsuccess', $user->id]);


                    }
                }
            }
        }
    }
    public function inactive($id = null)
    {
        $this->layout = 'admin';
        $memberships = TableRegistry::get('Memberships');;

        $membership = $memberships->find()
            ->where(['user_id' => $id])
            ->orderDesc('expiry_date')
            ->orderDesc('id')
            ->first();
        if ($membership) {
            $status = $membership->status_id;
            $this->set('status', $status);
            $this->set('membership', $membership);

            if ($status == 1) { // checks if the user is already inactive or not
                $membership->status_id = '2';
                $memberships->save($membership);
                $this->Flash->success('The member is now inactive.');
            }

            if ($status == 2) {
                $this->Flash->error('The member is already inactive');
            }

            return $this->redirect(['controller' => 'users', 'action' => 'view', $id]);

        } else {
            return $this->redirect(['controller' => 'users', 'action' => 'view', $id]);
            $this->Flash->error('The member doesnt have a valid membership');

        }
    }


    public function active($id = null)

    {
        $date = time::today();
        $this->layout = 'admin';
        $memberships = TableRegistry::get('Memberships');;

        $membership = $memberships->find()
            ->where(['user_id' => $id, 'expiry_date >' => $date])
            ->orderDesc('expiry_date')
            ->orderDesc('id')
            ->first();

        if ($membership) {
            $status = $membership->status_id;
            $this->set('status', $status);
            $this->set('membership', $membership);

            if ($status == 2) { // checks if the user is already inactive or not
                $membership->status_id = '1';
                $memberships->save($membership);
                $this->Flash->success('The member is now active.');
                $this->redirect(['controller' => 'users', 'action' => 'view',$id]);

            } else {
                $this->Flash->error('The member is already active');
                $this->redirect(['controller' => 'users', 'action' => 'view',$id]);
            }
        } else {
            $this->Flash->error('The member doesnt have a valid membership');
            return $this->redirect(['controller' => 'users', 'action' => 'view', $id]);


        }
    }

    function renewsuccess($id = null)
    {
        $this->layout = 'admin';
        $this->loadModel('MemTypes');
        $this->loadModel('Memberships');
        $settlementsTable = TableRegistry::get('Settlements');


        $membership = $this->Memberships->find('all')
            ->contain(['MemTypes','Status'])
            ->where(['user_id' => $id])
            ->last();

        $settlement = $settlementsTable->find()
            ->where(['user_id' => $id])
            ->last();
        $this->set('lastPay', $settlement->id);

        $this->set('membership', $membership);
        $this->set('_serialize', ['membership']);

        $user = $this->Users->get($id, [
            'contain' => ['UserTypes', 'Salutations','Years', 'Memberships', 'ContactTypes', 'Organisations', 'Countries', 'Genders', 'States','Memberships.Status','Loans','Loans.ReturnStatuses','Settlements','Settlements.PaymentMethods','Settlements.PaymentTypes']
        ]);



        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }


}