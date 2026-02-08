<?php
define('COOKIE_SECRET_KEY', 'b24a9d269a47662591de578b73aadd137cb9076a6fc2c9bb0799c3edf9bb56af');

class Cookie
{

    public static function encryptCookie($value)
    {
        $key = hash('sha256', COOKIE_SECRET_KEY, true);
        $iv  = openssl_random_pseudo_bytes(16);

        $encrypted = openssl_encrypt(
            $value,
            'AES-256-CBC',
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );

        return base64_encode($iv . $encrypted);
    }

    public static function decryptCookie($value)
    {
        $key = hash('sha256', COOKIE_SECRET_KEY, true);
        $data = base64_decode($value);

        $iv = substr($data, 0, 16);
        $encrypted = substr($data, 16);

        return openssl_decrypt(
            $encrypted,
            'AES-256-CBC',
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );
    }
}
