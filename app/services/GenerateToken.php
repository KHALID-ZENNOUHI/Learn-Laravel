<?php

namespace App\Services;

use Illuminate\Support\Str;


class GenerateToken
{
    public static function new($email)
    {
        $token = Str::random(40);
        session(['password_reset_token' => $token]);
        session(['password_token_expires_at' => now()->addMinutes(10)]);
        session(['password_reset_email' => $email]);
        return $token;
    }
}
