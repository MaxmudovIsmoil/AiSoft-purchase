<?php

namespace App\Helpers;

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


}
