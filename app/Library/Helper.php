<?php

namespace App\Library;

class Helper
{
    public static function calculateAge($date)
    {
        // $from = \DateTime::createFromFormat('F j, Y', $date);
        // $to   = new \DateTime('today');

        // return $from->diff($to)->y;
    }

    public static function currencyFormater($amount)
    {
        return money_format('%.2n', $amount);
    }

    public static function setActive($path, $active = 'active')
    {
        return \Request::is($path) ? $active : '';
    }
}