<?php

namespace App\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken {
    public static function create_token($user_email): string {

        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel_bookingggo',
            'iat' => time(),
            'exp' => time() + 60 * 60,
            'user_email' => $user_email
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public static function verify_token($token): string {

        try {
            $key = env('JWT_KEY');
            $decode = JWT::decode($token, new Key($key, 'HS256'));
            return $decode->user_email;
        } catch (\Exception $e) {
            return 'unauthorized';
        }

    }
}