<?php


namespace App\Controllers;


class PaymentController
{
    public function total($a , $b, $type)
    {
        //$c = 1;
        if ($type === 1 ) {
            return ($a + $b) * 2;
        } else {
            return ($a + $b) * 1;
        }
    }

    private function validateEmail($email, $message)
    {
        $pass = true;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $pass = false;
            $message = 'Email không hợp lệ';
        } elseif (preg_match('/^.*@(pavietnam|web30s)\.vn$/', $email)) {
            $pass = false;
            $message = 'Không được dùng mail xx@pavietnam.vn , xxx@web30s.vn';
        }

        return $pass;
    }


}