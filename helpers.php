<?php

if (!function_exists('isBase64')) {
    /**
     * Check if a given string is valid base64 payload
     *
     * @param string $string
     * @return boolean
     */
    function isBase64($string)
    {
        if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $string)) return false;

        $decoded = base64_decode($string, true);
        if (false === $decoded) return false;

        if (base64_encode($decoded) !== $string) return false;

        return true;
    }
}
