<?php

namespace App\Validators;

class Validator
{
    public static function validatePassword($password)
    {
        // Password must be at least 8 characters long
        if (strlen($password) < 8) {
            return false;
        }

        // Password must contain at least one uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }

        // Password must contain at least one lowercase letter
        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }

        // Password must contain at least one digit
        if (!preg_match('/[0-9]/', $password)) {
            return false;
        }

        // Password must contain at least one special character
        if (!preg_match('/[!@#$%^&*()\-_=+{};:,<.>ยง~]/', $password)) {
            return false;
        }

        return true;
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