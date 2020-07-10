<?php
namespace Main;

use Main\App;
use Exceptions\FailureException;
use Exceptions\SuccessException;

class ListLogic {

    public static function deleteAccount() : void {
        $account = App::DB()->show($_POST['uuid']);
        if ($account) {
            if ($account['value'] === 0) {
                App::DB()->delete($_POST['uuid']);
                throw new SuccessException('Account Deleted');
            } else {
                throw new FailureException('Account Has To Be Empty And Not Have Negative Balance');
            }
        } else {
            throw new FailureException('Account Not Found');
        }
    }

    public static function addAmount() : void {
        $account = App::DB()->show($_POST['uuid']);
        var_dump($_POST['uuid']);
        var_dump($account);
        if ($account) {
            if (is_numeric($_POST['amount'])) {
                if ($_POST['amount'] < 0) {
                    throw new FailureException('Negative Amount Is Not Allowed');
                } else {
                    $account['value'] += $_POST['amount'];
                    App::DB()->update($_POST['uuid'], $account);
                    throw new SuccessException($_POST['amount'] . ' Has Been Added');
                }
            } else {
                throw new FailureException('No Amount Was Provided');
            }
        } else {
            throw new FailureException('Account Not Found');
        }
    }

    public static function removeAmount() : void {
        $account = App::DB()->show($_POST['uuid']);
        if ($account) { 
            if (is_numeric($_POST['amount'])) {
                if ($_POST['amount'] < 0) {
                    throw new FailureException('Negative Amount Is Not Allowed');
                } elseif ($_POST['amount'] > 0 && $account['value'] < $_POST['amount']) {
                    throw new FailureException('Not Enough Money In Balance');
                } else {
                    $account['value'] -= $_POST['amount'];
                    App::DB()->update($_POST['uuid'], $account);
                    throw new SuccessException($_POST['amount'] . ' Has Been Removed');
                }
            } else {
                throw new FailureException('No Amount Was Provided');
            }
        } else {
            throw new FailureException('Account Not Found');
        }
    }

}