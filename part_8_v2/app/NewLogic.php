<?php
namespace Main;

use Main\Design;
use App\DB\JsonDb as DB;

class NewLogic {

    private static $numbers = [];

    public function __construct() {
        self::$numbers = range('0', '9');

        if (!empty($_POST)) {
            if (!isset($_POST['name'])) $_SESSION['message'] = Design::failureMessage('Name Is Not Provided');
            elseif (!isset($_POST['surname'])) $_SESSION['message'] = Design::failureMessage('Surname Is Not Provided');
            elseif (!isset($_POST['accountId'])) $_SESSION['message'] = Design::failureMessage('Account Is Not Provided');
            elseif (!isset($_POST['personId'])) $_SESSION['message'] = Design::failureMessage('Personal ID Is Not Provided');
            elseif (
                $_POST['name'] === '' || 
                $_POST['surname'] === '' || 
                $_POST['accountId'] === '' || 
                $_POST['personId'] === '') $_SESSION['message'] = Design::failureMessage('Some Fields Are Empty');
            elseif (mb_strlen($_POST['name']) < 3) $_SESSION['message'] = Design::failureMessage('Name Has To Be 3 Characters Long');
            elseif (mb_strlen($_POST['surname']) < 3) $_SESSION['message'] = Design::failureMessage('Surname Has To Be 3 Characters Long');
            else {
                // $ids = [];
                // foreach ($data as &$account) {
                //     $ids[] = $account['personId'];
                // }
                // $ids[] = $_POST['personId'];
                // unset($account);
                // if (count($ids) !== count(array_unique($ids))) {
                //     $_SESSION['message'] = Design::failureMessage('Personal ID Is Not Unique');
                // } else {
                    $data = [
                        'name' => $_POST['name'], 
                        'surname' => $_POST['surname'], 
                        'accountId' => $_POST['accountId'], 
                        'personId' => $_POST['personId'],
                        'value' => 0
                    ];
                    DB::create($data);
                    $_SESSION['message'] = Design::successMessage('Account Created');
                // }
            }
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