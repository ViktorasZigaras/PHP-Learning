<?php
namespace Main;

use Main\Login;
use Main\Design;
use Main\ListLogic;
use Main\NewLogic;
use Exceptions\FailureException;
use Exceptions\SuccessException;
use App\DB\JsonDb as DB;

class App {
    const DIR = '/PHP-Learning/part_8_v2/public/';
    const VIEW_DIR = './../view/';
    const URL = 'http://localhost/PHP-Learning/part_8_v2/public/';

    private static $params = [];
    private static $guarded = ['list', 'new'];
    private static $message = '';
    private static $csrf = '';
    private static $usd_rate = 1;

    public static function start() {
        session_start();
        self::$params = explode('/', str_replace(self::DIR, '', $_SERVER['REQUEST_URI']));
        if (isset($_SESSION['message'])) {
            self::$message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        self::$csrf = md5($_SERVER['HTTP_USER_AGENT'] . 'abcdefgh');

        $output = '';
        if (file_exists('./../db/currency.json')) {
            $output = json_decode(file_get_contents('./../db/currency.json'), 1);
            self::$usd_rate = $output['rates']['USD'];
        }
        if (!file_exists('./../db/currency.json') || ($output !== null && $output['time'] - time() > 30)) {
            $call = curl_init(); 
            curl_setopt($call, CURLOPT_URL, 'https://api.exchangeratesapi.io/latest?symbols=USD');
            curl_setopt($call, CURLOPT_RETURNTRANSFER, 1); 
            $output = json_decode(curl_exec($call)); 
            curl_close($call);
            $output->time = time();
            file_put_contents('./../db/currency.json', json_encode($output));
            self::$usd_rate = $output->rates->USD;
        } 
        // self::$usd_rate = $output->rates->USD;

        if (count(self::$params) === 1) {
            try {
                if (self::$params[0] === 'doLogin') {
                    if (!empty($_POST)) {
                        if (Login::login()) {
                            $_SESSION['message'] = Design::successMessage('Login Successful');
                            self::redirect('list');
                            // $_SESSION['message'] = Design::successMessage('Login Successful');
                        } else {
                            $_SESSION['message'] = Design::failureMessage('Login Failed');
                            self::redirect('login');
                        }
                    }
                } elseif (self::$params[0] === 'logout') {
                    $_SESSION['message'] = Design::successMessage('Logout Successful');
                    self::redirect('login');
                    session_destroy();
                } elseif (self::$params[0] === 'list') {
                    if (!empty($_POST)) {
                        if ((isset($_POST['delete']) || isset($_POST['add']) || isset($_POST['remove'])) && isset($_POST['csrf']) && self::$csrf === $_POST['csrf']) {
                            if (isset($_POST['delete']) && isset($_POST['uuid'])) {
                                ListLogic::deleteAccount();
                            }
                            if (isset($_POST['add']) && isset($_POST['uuid']) && isset($_POST['amount'])) {
                                ListLogic::addAmount();
                            }
                            if (isset($_POST['remove']) && isset($_POST['uuid']) && isset($_POST['amount'])) {
                                ListLogic::removeAmount();
                            }
                        } else {
                            throw new FailureException('CSRF Token Is Not Provided');
                        }
                    }
                } elseif (self::$params[0] === 'new') {
                    if (!empty($_POST)) {
                        NewLogic::addAccount();
                    }
                }
            } catch (FailureException $e) {
                // $_SESSION['message'] = Design::failureMessage($e->getMessage());
                self::$message = Design::failureMessage($e->getMessage());
            } catch (SuccessException $e) {
                // $_SESSION['message'] = Design::successMessage($e->getMessage());
                self::$message = Design::successMessage($e->getMessage());
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

    public static function getCSRF() : string {
        return self::$csrf;
    }

    public static function getUSDrate() : float {
        return self::$usd_rate;
    }

    private static function redirect(string $page = '') : void {
        header('Location: ' . self::URL . $page);
        die();
    }

}