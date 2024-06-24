<?php

namespace App\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken {
    public static function create_token($user_email, $user_id): string {

        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel_bookingggo',
            'iat' => time(),
            'exp' => time() + 60 * 60,
            'user_email' => $user_email,
            'user_id' => $user_id,
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public static function verify_token($token): string|object {
        try {
            $key = env('JWT_KEY');

            if ($token !== null) {
                $decode = JWT::decode($token, new Key($key, 'HS256'));
                return $decode;

            } else {
                return 'unauthorized';
            }

        } catch (\Exception $e) {
            return 'unauthorized';
        }

    }
}
