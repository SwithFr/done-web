<?php


namespace App\Helpers;


class Authenticate
{
    public static function isFakeConnected()
    {
        return isset($_SESSION['username']) && strpos($_SESSION['username'], 'fake-') === 0;
    }

    public static function isConnected()
    {
        return isset($_SESSION['username']) && isset($_SESSION['usertoken']);
    }
}