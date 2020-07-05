<?php
namespace Main;

use Main\Login;
use Main\Design;
use Main\ListLogic;
use Main\NewLogic;
use App\DB\JsonDb as DB;

class App {
    const DIR = '/PHP-Learning/part_8_v2/public/';
    const VIEW_DIR = './../view/';
    const URL = 'http://localhost/PHP-Learning/part_8_v2/public/';

    private static $params = [];
    private static $guarded = ['list', 'new'];
    private static $message = '';

    public static function start() {
        session_start();
        self::$params = explode('/', str_replace(self::DIR, '', $_SERVER['REQUEST_URI']));
        if (isset($_SESSION['message'])) self::$message = $_SESSION['message'];
        $_SESSION['message'] = '';

        if (count(self::$params) === 1) {

            if (self::$params[0] === 'doLogin') {
                $login = new Login; # make static??
                if ($login->getResult()) {
                    $_SESSION['message'] = Design::successMessage('Login Successful');
                    self::redirect('list');
                } else {
                    $_SESSION['message'] = Design::failureMessage('Login Failed');
                    self::redirect('login');
                }
            } elseif (self::$params[0] === 'logout') {
                $_SESSION['message'] = Design::successMessage('Logout Successful');
                self::redirect('login');
                session_destroy();
            } elseif (self::$params[0] === 'list') {
                new ListLogic; # make static??
            } elseif (self::$params[0] === 'new') {
                new NewLogic; # make static??
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

    private static function redirect(string $page = '') : void {
        header('Location: ' . self::URL . $page);
        die();
    }

}