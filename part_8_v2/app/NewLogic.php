<?php
namespace Main;

use Main\Design;
use App\DB\JsonDb as DB;
use Exceptions\FailureException;
use Exceptions\SuccessException;

class NewLogic {

    private static $numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    public static function addAccount() : void {
        if (isset($_POST['csrf']) && App::getCSRF() === $_POST['csrf']) {
            if (!isset($_POST['name'])) throw new FailureException('Name Is Not Provided');
            elseif (!isset($_POST['surname'])) throw new FailureException('Surname Is Not Provided');
            elseif (!isset($_POST['accountId'])) throw new FailureException('Account Is Not Provided');
            elseif (!isset($_POST['personId'])) throw new FailureException('Personal ID Is Not Provided');
            elseif (
                $_POST['name'] === '' || 
                $_POST['surname'] === '' || 
                $_POST['accountId'] === '' || 
                $_POST['personId'] === '') throw new FailureException('Some Fields Are Empty');
            elseif (mb_strlen($_POST['name']) < 3) throw new FailureException('Name Has To Be 3 Characters Long');
            elseif (mb_strlen($_POST['surname']) < 3) throw new FailureException('Surname Has To Be 3 Characters Long');
            else {
                $data = [
                    'name' => $_POST['name'], 
                    'surname' => $_POST['surname'], 
                    'accountId' => $_POST['accountId'], 
                    'personId' => $_POST['personId'],
                    'value' => 0
                ];
                DB::create($data);
                throw new SuccessException('Account Created');
            }
        } else {
            throw new FailureException('Account Not Found');
        }
    }

    public static function generatePersonID() : string {
        $person_id = '';
        for ($i = 0; $i < 11; $i++) { 
            $person_id .= self::$numbers[rand(0, count(self::$numbers) - 1)];
        }
        return $person_id;
    }

    public static function generateAccountID() : string {
        $account_id = 'LT';
        for ($i = 0; $i < 20; $i++) { 
            $account_id .= self::$numbers[rand(0, count(self::$numbers) - 1)];
        }
        return $account_id;
    }
    
}