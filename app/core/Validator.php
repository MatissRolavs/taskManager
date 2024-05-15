<?php

namespace App\Validators;

class Validator
{
    static public function string($data, $min = 0 ,$max = INF) {

        $data = trim($data);

        return  is_string($data) 
                && strlen($data) >= $min 
                && strlen($data) <= $max;
    }

    public static function validateEmail($email)
    {
        // Using PHP filter_var to validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // Check if email domain is Gmail
        $domain = substr(strrchr($email, "@"), 1);
        if ($domain !== 'gmail.com') {
            return false;
        }

        return true;
    }
}