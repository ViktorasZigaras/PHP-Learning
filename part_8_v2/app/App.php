<?php
namespace Main;

use Main\Login;
use Main\Design;
// use Main\User;
// use App\DB\JsonDb as DB;

class App {
    const DIR = '/PHP-Learning/part_8_v2/public/';
    const VIEW_DIR = './../view/';
    const URL = 'http://localhost/PHP-Learning/part_8_v2/public/';

    private static $params = [];
    private static $guarded = ['slaptas-1'];
    private static $message = '';

    public static function start() {
        session_start();
        self::$params = explode('/', str_replace(self::DIR, '', $_SERVER['REQUEST_URI']));
        /*
        if (count(self::$params) === 2) {
            if (self::$params[0] === 'users') {
                if (self::$params[1] === 'addUser') {
                    $newUser = ['name' => $_POST['user'], 'pass' => md5($_POST['password'])];
                    // User::createNew();
                    $db = new DB; # static methods!
                    $db->create($newUser); # static methods!
                }
                if (file_exists(self::VIEW_DIR . self::$params[0] . '/' . self::$params[1] . '.php')) {
                    require(self::VIEW_DIR . self::$params[0] . '/' . self::$params[1] . '.php');
                }
            }
        }
        else 
        */
        if (isset($_SESSION['message'])) self::$message = $_SESSION['message'];
        $_SESSION['message'] = '';

        if (count(self::$params) === 1) {

            if (self::$params[0] === 'doLogin') {
                $login = new Login; # make static??
                if ($login->getResult()) {
                    self::redirect('slaptas-1');
                } else {
                    $_SESSION['message'] = Design::failureMessage('Login Failed');
                    self::redirect('login');
                }
            }
            if (in_array(self::$params[0], self::$guarded)) {
                if (!Login::getAuthStatus()) self::redirect('login');
            }
            if (file_exists(self::VIEW_DIR.self::$params[0].'.php')) {
                require(self::VIEW_DIR.self::$params[0].'.php');
            }
        }
    }

    public static function getUriParams() : array {
        return self::$params;
    }

    public static function getMessage() : string {
        return self::$message;
    }

    public static function redirect(string $page = '') : void {
        header('Location: ' . self::URL . $page);
        die();
    }

}