<?php


namespace App\Controllers;


class PaymentController
{
    public function total($a , $b, $type)
    {
        if ($type === 1 ) {
            return ($a + $b) * 2;
        } else {
            return ($a + $b) * 1;
        }
    }
}