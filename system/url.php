<?php

namespace System;

class url {

    public static function to($url = '', $https = false) {
        if (filter_var($url, FILTER_VALIDATE_URL) !== false)
            return $url;

        $root = Config::get('base_url') . '/' . Config::get('index');

        if ($https and Config::get('ssl')) {
            $root = preg_replace('~http://~', 'https://', $root, 1);
        }

        return rtrim($root, '/') . '/' . ltrim($url, '/');
    }

}
