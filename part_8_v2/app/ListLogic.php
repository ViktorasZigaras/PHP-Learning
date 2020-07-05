<?php
namespace Main;

use Main\Design;
use App\DB\JsonDb as DB;

class ListLogic {

    public function __construct() {
        if (!empty($_POST)) {
            # delete
            if (isset($_POST['delete']) && isset($_POST['uuid'])) {
                DB::delete($_POST['uuid']);
            }
            # add
            if (isset($_POST['add']) && isset($_POST['uuid']) && isset($_POST['amount'])) {
                $account = DB::show($_POST['uuid']);
                if ($account) {
                    if (is_numeric($_POST['amount'])) {
                        if ($_POST['amount'] < 0) {
                            $_SESSION['message'] = Design::failureMessage('Negative Amount Is Not Allowed');
                        } else {
                            $account['value'] += $_POST['amount'];
                            DB::update($_POST['uuid'], $account);
                            $_SESSION['message'] = Design::successMessage($_POST['amount'] . ' Has Been Added');
                        }
                    } else {
                        $_SESSION['message'] = Design::failureMessage('No Amount Was Provided');
                    }
                } else {
                    $_SESSION['message'] = Design::failureMessage('Account Not Found');
                }
            }
            # remove
            if (isset($_POST['remove']) && isset($_POST['uuid']) && isset($_POST['amount'])) {
                $account = DB::show($_POST['uuid']);
                if ($account) { 
                    if (is_numeric($_POST['amount'])) {
                        if ($_POST['amount'] < 0) {
                            $_SESSION['message'] = Design::failureMessage('Negative Amount Is Not Allowed');
                        } elseif ($_POST['amount'] > 0 && $account['value'] < $_POST['amount']) {
                            $_SESSION['message'] = Design::failureMessage('Not Enough Money In Balance');
                        } else {
                            $account['value'] -= $_POST['amount'];
                            DB::update($_POST['uuid'], $account);
                            $_SESSION['message'] = Design::successMessage($_POST['amount'] . ' Has Been Removed');
                        }
                    } else {
                        $_SESSION['message'] = Design::failureMessage('No Amount Was Provided');
                    }
                } else {
                    $_SESSION['message'] = Design::failureMessage('Account Not Found');
                }
            }
        }
    }

}