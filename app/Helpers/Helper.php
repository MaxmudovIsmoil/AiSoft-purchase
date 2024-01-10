<?php
namespace App\Helpers;

use Carbon\Carbon;

class Helper
{
    public static function phoneFormat(string $phone): string
    {
        $ac = substr($phone, 0, 2);
        $prefix = substr($phone, 2, 3);
        $suffix1 = substr($phone, 3, 2);
        $suffix2 = substr($phone, 5,2);

        return "(".$ac.") ".$prefix." - ".$suffix1." - ".$suffix2;
    }


    public static function businessHours(string $start, string $end):string
    {
        $startDate = strtotime(date('Y-m-d', strtotime($start)));
        $endDate = strtotime(date('Y-m-d', strtotime($end)));

        $start_working_hour = strtotime('09:00:00');
        $start_dinner_hour = strtotime('13:00:00');
        $end_dinner_hour = strtotime('14:00:00');
        $end_working_hour = strtotime('18:00:00');

        return '1';
    }




}
