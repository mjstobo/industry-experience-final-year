<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{


    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()

    {

        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler');
        // added in line to format date correctly
        Time::$defaultLocale = 'en-AU';

        Time::setToStringFormat('dd-MM-YYYY'); // taken out BUt can be put back in "HH:mm:ss'
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email_address', 'password' => 'password']
                ]],
            'authorize' => ['Controller'],
            'loginRedirect' => [
                'controller' => 'users',
                'action' => 'index',
                'admin'=> true
            ],
            'logoutRedirect' => [
                'controller' => 'users',
                'action' => 'login',
                $this->request->prefix => false
            ]
        ]);

        parent::initialize();
        if ($this->request->action === 'index') {
            $this->loadComponent('Search.Prg');
        }

    }


    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['display']);
        $user_id = $this->request->session()->read('Auth.User.id');
        $loansTable = TableRegistry::get('Loans');
        $loanitemcopyTable = TableRegistry::get('LoanItemCopies');
        $loan = $loansTable->find()
            ->where(['user_id' => $user_id, 'return_status_id' => 1])
            ->orderDesc('id')
            ->first();
        $this->set('loan', $loan);

        if ($loan) {

            $lic = $loanitemcopyTable->find()
                ->where(['loan_id' => $loan->id]);
            $count = $lic->count();


            $this->request->session()->write('count', $count);
        } else {
            $count = 0;
            $this->request->session()->write('count', $count);
        }



    }

    //...

    public function isAuthorized($user)
    {
        // Admin can access every action
        if ($user['user_type_id'] === 1 && isset($user['email_address'])) {
            return true;
        }

        // Default deny
        return false;
    }



}
