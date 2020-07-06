<?php
namespace Main;

use Exceptions\FailureException;
use Main\App;

class Login {
    
    private static $users = [
        ['user' => 'guest', 'role' => 'guest', 'password' => '202cb962ac59075b964b07152d234b70'],
        ['user' => 'admin', 'role' => 'admin', 'password' => '900150983cd24fb0d6963f7d28e17f72']
    ];

    public static function login() : bool {
        $loginResult = false;
        if (isset($_POST['csrf']) && App::getCSRF() === $_POST['csrf']) {
            foreach (self::$users as $user) {
                if ($user['user'] === $_POST['user'] && $user['password'] === md5($_POST['password'])) {
                    $_SESSION['login'] = 1;
                    $_SESSION['role'] = $user['role'];
                    $loginResult = true;
                    break;
                }
            }
        } else {
            throw new FailureException('CSRF Token Is Not Provided');
        }
        return $loginResult;
    }

    public static function getAuthStatus(): bool {
        return isset($_SESSION['login']) && $_SESSION['login'] == 1;
    }

}