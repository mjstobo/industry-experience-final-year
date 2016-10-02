<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Email\Email;


class CronsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.

            $this->Auth->allow(['membershipExpired','membershipExpiry', 'loanEmail', 'loanOverdue','membershipInactive','reserveCheck','yearCheck','checkLoan']);
        }


    public function membershipExpired()


    {
        $time = Time::today();


        $now = $time->i18nFormat('d MMMM, YYYY');



        $memberships = TableRegistry::get('Memberships');
        $user_expiry = $memberships->find()
            ->contain(['Users','Users.Salutations'])
            ->where(['expiry_date' => $time])
            ->all();
        $results = $user_expiry->isEmpty();



        if (!$results) {
            foreach ($user_expiry as $user) {

                $email = new Email('default');

                $email->transport();

                $email->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                    ->to([$user->user['email_address'] => $user->user['given_name']])
                   // ->to(['ie.expo.team14@gmail.com'])
                    ->template('membershipExpired')
                    ->viewVars(['fname'=> $user->user['given_name'], 'lname'=>$user->user['family_name'], 'date'=>$now])
                    ->emailformat('html')
                    ->subject('Your EDV membership has expired')
                    ->send();


            }
            echo $user_expiry->count().' Members have been expired';

        }
    } //email for when the membership is actually expired

    public function membershipExpiry() // email for when a membership is about to expire

    {

        $time = Time::today();
        $time->addDays(7);

        $now = $time->i18nFormat('d MMMM, YYYY');


        $this->loadModel('Users');
        $memberships = TableRegistry::get('Memberships');
        $user_expiry = $memberships->find()
            ->contain(['Users','Users.Salutations'])
            ->where(['expiry_date' => $time])
            ->all();

        $results = $user_expiry->isEmpty();


        if (!$results) {
            foreach ($user_expiry as $user) {

                $email = new Email('default');

                $email->transport();

                $email->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                    ->to([$user->user['email_address'] => $user->user['given_name']])
                   // ->to(['ie.expo.team14@gmail.com'])
                    ->template('membershipRenewalReminder')
                    ->viewVars(['fname'=> $user->user['given_name'], 'lname'=>$user->user['family_name'], 'date'=>$now])
                    ->emailformat('html')
                    ->subject('Your EDV membership expires soon')
                    ->send();


            }

        }
    }

    public function loanEmail()  //email for overdue loans
{
    $loans = TableRegistry::get('Loans');
    $loan = $loans->find()
        ->contain('Users','ReturnStatuses','Users.Salutations', 'ItemCopies', 'ItemCopies.Items')
        ->where(['return_status_id'=>4])
        ->all();
    $results = $loan->isEmpty();



    if(!$results) {


        foreach ($loan as $check) {
            $email = new Email('default');

            $email->transport();

            try {
                $email->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                    ->to([$check->user['email_address'] => $check->user['given_name']])
                    ->template('overdueNotice')
                    ->viewVars(['fname'=> $check->user['given_name'], 'lname'=>$check->user['family_name'], 'date'=>$check['return_date']])
                    ->emailformat('html')
                    ->subject('EDV Overdue Notice')
                    ->send();

            } catch (Exception $e) {

                echo 'Exception : ', $e->getMessage(), "\n";
            }
        }
    } else{

    }
}

     public function loanOverdue() //does a check to set the status of all expired loans, to expired.
    {
        $time = Time::today();
        $loans = TableRegistry::get('Loans');
        $loan = $loans->find()
            ->contain('ReturnStatuses')
            ->where(['return_date <' => $time])
            ->all();


        foreach ($loan as $check) {
            if ($check->return_date < $time && $check->return_status_id != 4) {
                $check->return_status_id = 4;
                $loans->save($check);


            } else {

            }
        }


    }

    public function membershipInactive() //sets all expired membership to inactive to prevent login.
    {

        $today = time::today();
        $memberships = TableRegistry::get('Memberships');
        $membership = $memberships->find('all',['contain'=> ['Users','Status']])
            ->where(['expiry_date <'=>$today,'status_id'=> 1])
            ->all();


        $isEmpty = $membership->isEmpty();


        $count = $membership->count();


        if(!$isEmpty)
        {
            foreach($membership as $members)
            { $members->status_id = 2;
                $memberships->save($members);
            }

            echo $count.' Memberships are now inactive';

        } elseif($isEmpty)
        {


        }
    }

    public function reserveCheck() // checks for inactive reserves and sets them to expired
    {
        $time = Time::today();


        $now = $time->i18nFormat('d MMMM, YYYY');


        $reserves = TableRegistry::get('Reserves');
        $copy = TableRegistry::get('ItemCopies');
        $reserve = $reserves->find()
            ->contain(['Users', 'Users.Salutations', 'Items', 'Items.ItemCopies'])
            ->where(['end_date' => $time, 'reserve_status_id' => 2])
            ->all();



        $results = $reserve->isEmpty();





        if (!$results) {

            foreach ($reserve as $reservation) {
                $copies = $copy->find()
                    ->where(['id'=> $reservation->item_copy_id])
                    ->first();


                $user_email = $reservation->user->email_address;
                $copies->item_status_id = 1;
                $reservation->reserve_status_id = 3;
                $reserves->save($reservation);
                $copy->save($copies);



                $email = new Email('default');

                $email->transport();

                $email->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                  //  ->to($user_email) //edvs email goes here
                    ->to('reception@eatingdisorders.org.au')
                    ->template('adminReturnItem')
                    ->viewVars(['fname'=> $reservation->user->given_name, 'lname'=>$reservation->user->family_name, 'title'=>$reservation->item->title, 'barcode'=>$reservation->item->item_copies[0]->barcode])
                    ->emailformat('html')
                    ->subject('Return to shelf')
                    ->send();

                $email->from(['no-reply@eatingdisorders.org.au' => 'Eating Disorders Victoria'])
                    //  ->to($user_email) //edvs email goes here
                    ->to('reception@eatingdisorders.org.au')
                    ->template('reserve_expiry')
                    ->viewVars(['fname'=> $reservation->user->given_name, 'lname'=>$reservation->user->family_name, 'title'=>$reservation->item->title, 'barcode'=>$reservation->item->item_copies[0]->barcode])
                    ->emailformat('html')
                    ->subject('Reservation Expiry')
                    ->send();



            }



        }
    }

    public function yearCheck() //creates a new year in the db for forms when the year comes to an end
    {
        $time = Time::today();


        $yearsTable = TableRegistry::get('Years');

        $lastyear = $yearsTable->find()
            ->orderDesc('id')
            ->orderDesc('year_number')
            ->first();


        if($time->year == $lastyear->year_number +1 )
        {


            $year = $yearsTable->newEntity(['year_number'=>$time->year]);
            $yearsTable->save($year);
            echo 'Added new year... '.$year->year_number;

        }
        else
        {
            echo 'Year is current... '.$time->year;
        }
    }

    public function checkLoan()
    {

        $loanitemcopiesTable = TableRegistry::get('LoanItemCopies');
        $loansTable = TableRegistry::get('Loans');  // gets table registries

        $loans = $loansTable->find() //finds all loans in loan table
            ->all();

        foreach ($loans as $loan)  // sorts through each loan to find all of the loanitemcopies within that loan
        { $count = 0;
            $loanitemcopy = $loanitemcopiesTable->find()
            ->where(['loan_id'=>$loan->id])
                ->all();
            $items= $loanitemcopy->count(); // gets a count of the amount of copies for comparison



            foreach($loanitemcopy as $lic) //checks the status of each loan item copy to see if it has been returned
            {
                if ($lic->copy_returned)  // if the copy has been returned, count +1
                {
                    $count = $count +1;
                    $this->set('count',$count);

                    if ($count == $items) {  // check to see if the number of items in a loan adds to the number of items returned.
                                                    // If there is a match, the loan is closed and saved. marked as returned.
                        $loan->all_returned = 1;
                        $loan->return_status_id =3;
                        $loansTable->save($loan);
                    }
                }


            } echo $items. 'Loans have been closed';
        }
    }
}
