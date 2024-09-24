<?php
// namespace App\Helpers;
use Config\Services;
use \IonAuth\Libraries\IonAuth;

if (!function_exists('is_logged_in')) {
    function is_logged_in()
    {
        $session = \Config\Services::session();
        return $session->get('logged_in') ?? false;
    }
}
if (!function_exists('get_user_info')) {
    function get_user_info($user_id = null)
    {
        $ionAuth = new IonAuth();
        return $ionAuth->user($user_id)->row() ?? null;
    }
}

if (!function_exists('UsersGroups')) {
    function UsersGroups()
    {
        $ionAuth = new IonAuth();
        return  $ionAuth->getUsersGroups()->getRow();
    }
}
if (!function_exists('Isadmin')) {
    function is_admin()
    {
        $ionAuth = new IonAuth();
        return  $ionAuth->Isadmin() ?? false;
    }
}


