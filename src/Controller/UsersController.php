<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Email\Email;
use \CS_REST_Subscribers;
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
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
//




/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */


class UsersController extends AppController
{

	//var $components=array("Email","Session");
var $helpers=array("Html","Form");


    /**
     * Index method
     *
     * @return void
     */

    public function index()
    {
        $this->paginate = [
            'contain' => ['UserTypes', 'Salutations', 'Memberships','Years', 'ContactTypes','Genders','Countries','States', 'Memberships.MemTypes']
        ];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);




    }



    public function home(){

        if(!$this->request->session()->read('Auth.User')) {

            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }


    }



    public function renew(){

        $memprices = TableRegistry::get('MemTypes');
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $salutations = $this->Users->Salutations->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $genders = $this->Users->Genders->find('list', ['limit' => 200]);
        $years = $this->Users->Years->find('list',['order id desc']);
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $memberships = $this->Users->Memberships->MemTypes->find('list')
            ->contain(['Memberships.MemTypes','Memberships.MemTypes.Durations'])
            ->skip(1);
        $contactTypes = $this->Users->ContactTypes->find('list', ['limit' => 200]);
        $years = $this->Users->Years->find('list',['order'=>'id desc']);
        $this->set(compact('userTypes', 'salutations','years', 'memberships', 'contactTypes', 'genders', 'countries', 'states'));
        $this->set('_serialize', ['membership']);
        $this->loadModel('Memberships');


        $user_id = $this->request->session()->read('Auth.User.id');
        $conditions = ['user_id' => $user_id, 'status_id' => 1];

        $this->set('user_id',$user_id);

        $membershipsTable = TableRegistry::get('Memberships');
        $currStatus = $membershipsTable->find()
            ->contain(['MemTypes.Durations'])
            ->where($conditions)
            ->all();

            $currStatus->toArray();


        if($currStatus->isEmpty()){

            if($this->request->is('post')){

              $apiTable = TableRegistry::get('ApiKeys');
              $ppClient = $apiTable->find()
              ->where(['id' => 1])
              ->first();
              $ppSecret = $apiTable->find()
              ->where(['id' => 2])
              ->first();

               $apiContext = new ApiContext(new OAuthTokenCredential($ppClient->key, $ppSecret->key));


                $payer = new Payer();
                $payer->setPaymentMethod('paypal');

                $mem_type = $this->request->data['mem_type_id'];
                $query = $memprices->find()
                    ->contain(['Durations'])
                    ->where(['MemTypes.id =' => $mem_type])
                    ->first();
                $price = $query->mem_price;
                $duration = $query->duration_id;
                $duration_year = $query->duration->duration_year;
                $duration_name =$query->duration->name;
                $description = $query->mem_name;
                $total = $price;



               $item1 = new Item();
                $item1->setName('EDV Renewal - ' . $description)
                    ->setCurrency('AUD')
                    ->setQuantity(1)
                    ->setPrice($price);

                $itemList = new ItemList();
                $itemList->setItems([$item1]);

                $details = new Details();
                $details->setShipping(0)
                    ->setSubtotal($price);

                $amount = new Amount();
                $amount->setCurrency('AUD')
                    ->setTotal($total)
                    ->setDetails($details);

                $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($itemList)
                    ->setDescription('Eating Disorders Victoria')
                    ->setInvoiceNumber(uniqid());

                $redirectUrls = new RedirectUrls();
                $redirectUrls->setReturnUrl(Router::url([
                    'controller' => 'users',
                    'action' => 'renewconfirm',
                    '?' => ['success' => 'true'], '_full' => true]))
                    ->setCancelUrl(Router::url([
                        'controller' => 'users',
                        'action' => 'renewconfirm',
                        '?' => ['success' => 'false'], '_full' => true]));

                $payment = new Payment();
                $payment->setIntent('sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirectUrls)
                    ->setTransactions([$transaction]);

                $request = clone $payment;

                try {
                    $payment->create($apiContext);
                } catch (Exception $ex) {
                    echo "Exception: " . $ex->getMessage() . PHP_EOL;
                    echo "<pre>";
                    var_dump($ex->getData());
                    exit(1);
                }

                $approvalUrl = $payment->getApprovalLink();
                $session = $this->request->session();
                $payments = TableRegistry::get('Settlements');
                $date = time::now();
                $newPayment = $payments->newEntity([
                    'payment_method_id' => 1,
                    'user_id' => $user_id,
                    'payment_type_id' => 2,
                    'amount' => $total,
                    'payment_date' => $date
                ]);

                $join = time::today();
                $expiry = $date->addYears($duration_year);


                $membership = $membershipsTable->newEntity([
                'user_id' => $user_id, 'status_id' => 1, 'mem_type_id' => $mem_type, 'duration_id' => $duration, 'join_date' => $join, 'expiry_date' => $expiry]);
                $session->write('membership', $membership);
                $session->write('payment', $newPayment);
                $this->redirect($approvalUrl);

            }

        } else {

            $this->redirect(['action' => 'extend']);


        }


    }



    public function extend(){

      $memprices = TableRegistry::get('MemTypes');
      $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
      $salutations = $this->Users->Salutations->find('list', ['limit' => 200]);
      $countries = $this->Users->Countries->find('list', ['limit' => 200]);
      $genders = $this->Users->Genders->find('list', ['limit' => 200]);
      $years = $this->Users->Years->find('list',['order id desc']);
      $states = $this->Users->States->find('list', ['limit' => 200]);
      $contactTypes = $this->Users->ContactTypes->find('list', ['limit' => 200]);
      $years = $this->Users->Years->find('list',['order'=>'id desc']);

      $memTypesTable = TableRegistry::get('MemTypes');
      $memberships = $memTypesTable->find('list')
      ->contain('Durations')
      ->where(['MemTypes.id !=' => 1])
      ->all();


      $this->set(compact('userTypes', 'salutations','years', 'memberships', 'contactTypes', 'genders', 'countries', 'states'));
      $this->set('_serialize', ['membership']);
      $this->loadModel('Memberships');

      $membershipsTable = TableRegistry::get('Memberships');
      $user_id = $this->request->session()->read('Auth.User.id');

      $membership = $membershipsTable->find()
      ->where(['user_id' => $user_id, 'status_id' => 1])
      ->contain(['Users', 'Durations', 'MemTypes'])
      ->order(['expiry_date' => 'DESC'])
      ->first();

      $this->set('currMem', $membership);

      if($this->request->is('post')){

        $currMem = $membership;
        $expiry = $currMem->expiry_date;
        $currMem->expiry_date = $expiry->addYears(1);
        $apiTable = TableRegistry::get('ApiKeys');
        $ppClient = $apiTable->find()
        ->where(['id' => 1])
        ->first();
        $ppSecret = $apiTable->find()
        ->where(['id' => 2])
        ->first();

         $apiContext = new ApiContext(new OAuthTokenCredential($ppClient->key, $ppSecret->key));
         $payer = new Payer();
         $payer->setPaymentMethod('paypal');

         $mem_type = $this->request->data['mem_type_id'];
         $query = $memprices->find()
             ->contain(['Durations'])
             ->where(['MemTypes.id =' => $mem_type])
             ->first();
         $price = $query->mem_price;
         $duration = $query->duration_id;
         $duration_year = $query->duration->duration_year;
         $duration_name =$query->duration->name;
         $description = $query->mem_name;
         $total = $price;

        $item1 = new Item();
         $item1->setName('EDV Renewal - ' . $description)
             ->setCurrency('AUD')
             ->setQuantity(1)
             ->setPrice($price);

         $itemList = new ItemList();
         $itemList->setItems([$item1]);

         $details = new Details();
         $details->setShipping(0)
             ->setSubtotal($price);

         $amount = new Amount();
         $amount->setCurrency('AUD')
             ->setTotal($total)
             ->setDetails($details);

         $transaction = new Transaction();
         $transaction->setAmount($amount)
             ->setItemList($itemList)
             ->setDescription('Eating Disorders Victoria')
             ->setInvoiceNumber(uniqid());

         $redirectUrls = new RedirectUrls();
         $redirectUrls->setReturnUrl(Router::url([
             'controller' => 'users',
             'action' => 'renewconfirm',
             '?' => ['success' => 'true'], '_full' => true]))
             ->setCancelUrl(Router::url([
                 'controller' => 'users',
                 'action' => 'renewconfirm',
                 '?' => ['success' => 'false'], '_full' => true]));

         $payment = new Payment();
         $payment->setIntent('sale')
             ->setPayer($payer)
             ->setRedirectUrls($redirectUrls)
             ->setTransactions([$transaction]);

         $request = clone $payment;

         try {
             $payment->create($apiContext);
         } catch (Exception $ex) {
             echo "Exception: " . $ex->getMessage() . PHP_EOL;
             echo "<pre>";
             var_dump($ex->getData());
             exit(1);
         }

         $approvalUrl = $payment->getApprovalLink();
         $session = $this->request->session();
         $payments = TableRegistry::get('Settlements');
         $date = time::now();
         $newPayment = $payments->newEntity([
             'payment_method_id' => 1,
             'user_id' => $user_id,
             'payment_type_id' => 2,
             'amount' => $total,
             'payment_date' => $date
         ]);

         $session->write('membership', $membership);
         $session->write('payment', $newPayment);
         $this->redirect($approvalUrl);


    }

    }

    public function renewconfirm(){

      $apiTable = TableRegistry::get('ApiKeys');
      $ppClient = $apiTable->find()
      ->where(['id' => 1])
      ->first();
      $ppSecret = $apiTable->find()
      ->where(['id' => 2])
      ->first();

       $apiContext = new ApiContext(new OAuthTokenCredential($ppClient->key, $ppSecret->key));
            if (isset($_GET['success']) && $_GET['success'] == 'true') {

                $membership = $this->request->session()->read('membership');
                $membershipsTable = TableRegistry::get('Memberships');

                if ($membershipsTable->save($membership)) {
                    $paymentId = $_GET['paymentId'];
                    $payment = Payment::get($paymentId, $apiContext);

                    $execution = new PaymentExecution();
                    $execution->setPayerId($_GET['PayerID']);
                    try {
                        $result = $payment->execute($execution, $apiContext);
                        try {
                            $payment = Payment::get($paymentId, $apiContext);
                        } catch (Exception $ex) {
                            $this->Flash->error('There was an error processing your payment.');
                            exit(0);
                        }
                    } catch (Exception $ex) {
                        $this->Flash->error('There was an error processing your payment.');
                        exit(0);
                    }

                    $payment_details = $this->request->session()->read('payment');
                    $payments = TableRegistry::get('Settlements');
                    $newPayment = $payments->newEntity();
                    $newPayment = $payment_details;

                    $newPayment->user_id = $membership->user_id;

                    if ($payments->save($newPayment)) {

                        $this->Flash->success('Your membership has been renewed');
                        $user_id = $this->request->session()->read('Auth.User.id');
                        $user_fname = $this->request->session()->read('Auth.User.given_name');
                        $user_email = $this->request->session()->read ('Autg.User.email_address');
                        $user_lname = $this->request->session()->read('Auth.User.family_name');
                        $membership = $this->request->session()->read('membership');
                        $membership_id = $membership->id;
                        $salutation_id =$this->request->session()->read('Auth.User.salutation_id');
                        $mem_type_id =$membership->mem_type_id;


                        $salutationTable = TableRegistry::get('Salutations');
                        $salutations = $salutationTable->find()
                            ->where(['id' => $salutation_id])
                            ->first();

                       $salutation = $salutations->salutation_name;


                        $memtypeTable = TableRegistry::get('MemTypes');
                        $mem_types = $memtypeTable->find()
                            ->where(['id'=> $mem_type_id])
                            ->first();

                        $durationTable = TableRegistry::get('Durations');
                        $durations = $durationTable->find()
                            ->where(['id'=>$mem_types->duration_id])
                            ->first();
                        $description = $mem_types->mem_name;
                        $duration_name = $durations->duration_name;
                        $join  = $membership->join_date;
                        $expiry = $membership->expiry_date;
                        $price  = $mem_types->mem_price;

                        $email = new Email('default');

                        $email->transport();

                        $email->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                            ->to($user_email)
                            ->subject('Membership Renewal')
                            ->message('Dear '.$salutation.' '.$user_fname.' '.$user_lname.','."\n"."\n"."\n".
                                'You have renewed your membership for '.$duration_name.'.'."\n"."\n"
                                .'Membership: '.$description."\n".'Effective from: '.$join."\n".'Expires on: '.$expiry."\n\n".'Amount Paid: $'.$price )
                            ->send();



                        return $this->redirect(['action' => 'home']);

                        }



                    }





                }
            }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->find()
            ->contain(['UserTypes', 'Salutations', 'Memberships', 'ContactTypes','Years', 'Organisations','Countries','Genders','States','Memberships.MemTypes'])
            ->where(['id' => $id])
            ->first();
        ;
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $user = $this->Users->newEntity();

        $memprices = TableRegistry::get('MemTypes');
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $salutations = $this->Users->Salutations->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $genders = $this->Users->Genders->find('list', ['limit' => 200]);
        $years=$this->Users->Years->find('list',['order id desc']);
        $states = $this->Users->States->find('list', ['limit' => 200]);

        $memberships = $this->Users->Memberships->MemTypes->find('list')
            ->contain(['Memberships.MemTypes','Memberships.MemTypes.Durations'])
            ->all()
            ->skip(1);


        $contactTypes = $this->Users->ContactTypes->find('list', ['limit' => 200]);
        $years = $this->Users->Years->find('list')
            ->order(['year_number Like "%N/A%" desc'])
            ->orderDesc('year_number');
        $this->set(compact('user', 'userTypes', 'salutations','years', 'memberships', 'contactTypes', 'genders', 'countries', 'states'));
        $this->set('_serialize', ['user']);



        if ($this->request->is('post')) {
              $user = $this->Users->patchEntity($user, $this->request->data);




        if($user->errors()){
                $this->Flash->error("Please correctly fill all fields.");
        }

        else {
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

            $membership = $membershipsTable->newEntity([
                'user_id' => $user->id,
                'status_id' => 1,
                'mem_type_id' => $mem_type,
                'duration_id' => $duration,
                'join_date' => $join,
                'expiry_date' => $expiry]);

            $session = $this->request->session();
            $session->write('membership',$membership);




            $apiTable = TableRegistry::get('ApiKeys');
            $ppClient = $apiTable->find()
            ->where(['id' => 1])
            ->first();
            $ppSecret = $apiTable->find()
            ->where(['id' => 2])
            ->first();

             $apiContext = new ApiContext(new OAuthTokenCredential($ppClient->key, $ppSecret->key));                // $accessToken     = $apiContext->getAccessToken(array('mode' => 'sandbox'));
                // echo $accessToken;

                $payer = new Payer();
                $payer->setPaymentMethod('paypal');
                $total = $price;

                $item1 = new Item();
                $item1->setName('EDV - ' . $description)
                    ->setCurrency('AUD')
                    ->setQuantity(1)
                    ->setPrice($price);

                $itemList = new ItemList();
                $itemList->setItems([$item1]);

                $details = new Details();
                $details->setShipping(0)
                    ->setSubtotal($price);

                $amount = new Amount();
                $amount->setCurrency('AUD')
                    ->setTotal($total)
                    ->setDetails($details);

                $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($itemList)
                    ->setDescription('Eating Disorders Victoria')
                    ->setInvoiceNumber(uniqid());

                $redirectUrls = new RedirectUrls();
                $redirectUrls->setReturnUrl(Router::url([
                    'controller' => 'users',
                    'action' => 'confirm',
                    '?' => ['success' => 'true'], '_full' => true]))
                    ->setCancelUrl(Router::url([
                        'controller' => 'users',
                        'action' => 'confirm',
                        '?' => ['success' => 'false'], '_full' => true]));

                $payment = new Payment();
                $payment->setIntent('sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirectUrls)
                    ->setTransactions([$transaction]);

                $request = clone $payment;

                try {
                    $payment->create($apiContext);
                } catch (Exception $ex) {
                    echo "Exception: " . $ex->getMessage() . PHP_EOL;
                    echo "<pre>";
                    var_dump($ex->getData());
                    exit(1);
                }

                $approvalUrl = $payment->getApprovalLink();
                $session->write('User', $user);
                $payments = TableRegistry::get('Settlements');
                $date = time::now();
                $newPayment = $payments->newEntity([
                    'payment_method_id' => 1,
                    'user_id' => $user->id,
                    'payment_type_id' => 1,
                    'amount' => $total,
                    'payment_date' => $date
                ]);

                $session->write('payment', $newPayment);
                $this->redirect($approvalUrl);

            }
        }

    }

    public function confirm()
    {
        $membershipTable = TableRegistry::get('Memberships');
        $apiTable = TableRegistry::get('ApiKeys');
        $ppClient = $apiTable->find()
        ->where(['id' => 1])
        ->first();
        $ppSecret = $apiTable->find()
        ->where(['id' => 2])
        ->first();

         $apiContext = new ApiContext(new OAuthTokenCredential($ppClient->key, $ppSecret->key));        if (isset($_GET['success']) && $_GET['success'] == 'true') {

            $user = $this->request->session()->read('User');
            $memberships=$this->request->session()->read('membership');

            if ($this->Users->save($user)) {
                $paymentId = $_GET['paymentId'];
                $payment = Payment::get($paymentId, $apiContext);

                $execution = new PaymentExecution();
                $execution->setPayerId($_GET['PayerID']);
                try {
                    $result = $payment->execute($execution, $apiContext);
                    try {
                        $payment = Payment::get($paymentId, $apiContext);
                    } catch (Exception $ex) {
                        $this->Flash->error('There was an error processing your payment.');
                        exit(0);
                    }
                } catch (Exception $ex) {
                    $this->Flash->error('There was an error processing your payment.');
                    exit(0);
                }


                $payment_details = $this->request->session()->read('payment');
                $payments = TableRegistry::get('Settlements');
                $newPayment = $payments->newEntity();
                $newPayment = $payment_details;

                $newPayment->user_id = $user->id;

                if ($payments->save($newPayment)) {

                    $this->Flash->success('Your registration has been successful');

                    $this->Auth->setUser($user->toArray());

                    $user = $this->request->session()->read('Auth.User');
                    $user_id = $this->request->session()->read('Auth.User.id');
                    $user_email = $this->request->session()->read('Auth.User.email_address');
                    $memberships->user_id = $user_id;
                    $membershipTable->save($memberships);


                    $email2 = new Email('default');
                    $email2->transport();
                    $email2->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                        ->template('registration')
                        ->viewVars(['fname'=> $user->given_name, 'lname'=>$user->family_name, 'email'=>$user->email_address,'memID'=>$memberships->id,'exDate'=>$memberships->expiry_date])
                        ->emailformat('html')
                        ->to([$user_email])
                        ->subject('Welcome to Eating Disorders Victoria')
                        ->send();


                        $email = new Email('default');
                        $email->transport();
                        $email->from(['reception@eatingdisorders.org.au' => 'EDV Website'])
                            ->to('reception@eatingdisorders.org.au')
                            ->subject('New Registered User')
                            ->message('A new user has been registered to EDV.
                                    Name: ' . $user->given_name . ' ' . $user->family_name . '
                                    User ID: ' . $user->id . '
                                    Email: ' . $user->email_address . '')
                            ->send();
                    if ($user->newsletter) {
                        //Authenticate via API key for 'Test List'
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
                            'Member' => true,
                            'Resubscribe' => true
                        ));

                        if ($result->was_successful()) {
                            $this->Flash->success('Welcome to Eating Disorders Victoria');
                            return $this->redirect(['action' => 'home']);
                        } else {
                            $this->Flash->error('Membership has been created, but unable to add member to mailing list.');
                        }
                    } else {

                        return $this->redirect(['action' => 'home']);
                    }
                }

            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function viewprofile($id = null)
    {
        if($id != $this->request->session()->read('Auth.User.id')){
            $this->redirect(['action' => 'viewprofile', $this->request->session()->read('Auth.User.id')]);
        }
        $this->loadModel('MemTypes');
        $this->loadModel('Memberships');

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

        $user = $this->Users->find()
            ->where(['Users.id'=>$id])
            ->contain(['UserTypes', 'Salutations','Years', 'Memberships'=> function($q){return $q ->orderAsc('status_id');}, 'ContactTypes', 'Organisations', 'Countries', 'Genders', 'States','Memberships.Status','Loans','Loans.ReturnStatuses','Settlements','Settlements.PaymentMethods','Settlements.PaymentTypes'])
            ->first();

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if($id != $this->request->session()->read('Auth.User.id')){
            $this->redirect(['action' => 'edit', $this->request->session()->read('Auth.User.id')]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('You have successfully changed your details.');
                return $this->redirect(['action' => 'viewprofile',$id]);
            } else {
                $this->Flash->error('The details could not be saved. Please, try again.');
            }
        }
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $salutations = $this->Users->Salutations->find('list', ['limit' => 200]);
        $memberships = $this->Users->Memberships->MemTypes->find('list', ['limit' => 200]);
        $contactTypes = $this->Users->ContactTypes->find('list', ['limit' => 200]);
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $genders = $this->Users->Genders->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $years = $this->Users->Years->find('list')
            ->order(['year_number Like "%N/A%" desc'])
            ->orderDesc('year_number');
        $this->set(compact('user', 'userTypes', 'salutations','years', 'memberships', 'contactTypes','genders','countries','states'));
        $this->set('_serialize', ['user']);
    }

    public function editpassword($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if($id != $this->request->session()->read('Auth.User.id')){
            $this->redirect(['action' => 'edit', $this->request->session()->read('Auth.User.id')]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('You have successfully changed your password.');
                return $this->redirect(['action' => 'viewprofile',$id]);
            } else {
                $this->Flash->error('The details could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }


		public function beforeFilter(Event $event)
        {
            parent::beforeFilter($event);

            $user_id = $this->request->session()->read('Auth.User.id');

            $membershipsTable = TableRegistry::get('Memberships');
            $currStatus = $membershipsTable->find()
                ->where(['user_id' => $user_id, 'status_id' => 1])
                ->all();

            $currStatus->toArray();

            if ($currStatus->isEmpty()) {

                $this->Auth->allow(['renew', 'add', 'logout', 'renewconfirm', 'confirm', 'home', 'forget']);

            } else {
                // Allow users to register and logout.
                // You should not add the "login" action to allow list. Doing so would
                // cause problems with normal functioning of AuthComponent.
                $this->Auth->allow(['onefourtech', 'logout', 'forget', 'home', 'edit', 'confirm', 'enquiry', 'viewprofile', 'forget', 'extend', 'renewconfirm', 'editpassword', 'renew']);



            }
        }


	public function login()
    {

        $this->layout = 'loginLayout';
        $this->loadModel('Memberships');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            $user_id = $this->request->session()->read('Auth.User.id');
            //  $isEmpty = $user->isEmpty();
            if ($user) {
                $memberships = TableRegistry::get('Memberships');
                $user_details = $memberships->find()
                    ->where(['user_id' => $user['id']])
                    ->orderDesc('id')
                    ->first();

                if ($user_details) {
                    if ($user_details->status_id == 1) {
                        $this->Auth->setUser($user);

                        if ($user['user_type_id'] === 1) {
                            return $this->redirect($this->Auth->redirectUrl(['controller' => 'admin/users', 'action' => 'index']));
                        } else {
                            return $this->redirect($this->Auth->redirectUrl(['controller' => 'users', 'action' => 'home']));

                        }
                    } elseif ($user_details->status_id != 1) {
                        $this->Auth->setUser($user);
                        $this->Flash->error('Your Membership has expired, Please follow the steps to Renew.');
                        return $this->redirect(['controller' => 'users', 'action' => 'renew']);
                    }

                }


            } elseif (!$user) {
                $this->Flash->error('Incorrect Email Address or Password');
            }
        }
    }



	public function logout()
	{
        $this->Auth->logout();
		return $this->redirect(['controller' => 'users', 'action' => 'login']);
	}

    public function forget()
    {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $email = $data['email_address'];
            $users = $this->Users->find('all');

            foreach ($users as $user) {
                if ($user['email_address'] == $email) {
                    $newpw = $this->Users->generateRandomString(10);
                    $user['password'] = $newpw;
                    if ($this->Users->save($user)) {
                        $email = new Email('default');

                        $email->transport();

                        try {
                            $res = $email->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                                ->to([$user['email_address'] => $user['given_name']])
                                ->subject('Your new password to log in for EDV')
                                ->send('Your new password for EDV is: ' . $newpw . ' Please log in here http://member.eatingdisorders.org.au/users/login');
                        } catch (Exception $e) {

                            echo 'Exception : ', $e->getMessage(), "\n";
                        }

                        $this->Flash->success('New password is sent to your email, please check your email.');
                        return $this->redirect(['action' => 'login']);
                    }
                } else {
                    $this->Flash->error('Email incorrect or does not match with the Email we have for you. Please try again');
                }
            }
        }
       //return $this->redirect(['action' => 'login']);
    }



    public function enquiry()
    {
        if($this->request->is('post')) {

            $name = $this->request->data('name');
            $message = $this->request->data('message');
            $subject = $this->request->data('subject');
            $email1 = $this->request->data('email');
            $email = new Email('default');
            $email->transport();
            $email->from([$email1 => 'EDV Enquiry'])
                ->to('reception@eatingdisorders.org.au')
                ->subject($subject)
                ->send('A new enquiry has been received.' . "\n\n" . 'Name: ' . $name . "\n" . 'Subject: ' . $subject . "\n" .  'Email: ' . $email1 . "\n\n" . 'Message: ' . $message . '');
            if($email->send()){
                $this->Flash->success('Your enquiry has been successfully sent');
            }
            else{
                $this->Flash->error('Your enquiry was not sent!');
            }

        }
    }


}
