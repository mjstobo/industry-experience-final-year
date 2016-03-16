<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\I18n\Time;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class yearShell extends Shell
{
    public function main()


    {
        $time = Time::today();


        $yearsTable = TableRegistry::get('Years');

        $lastyear = $yearsTable->find()
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



}



