<?php
namespace Main;

class Login {
    
    private $loginResult = false;

    public function __construct() {
        # static users: guest and admin
        $data = [
            ['user' => 'guest', 'role' => 'guest', 'password' => '202cb962ac59075b964b07152d234b70'],
            ['user' => 'admin', 'role' => 'admin', 'password' => '900150983cd24fb0d6963f7d28e17f72']
        ];

        if (!empty($_POST)) {
            foreach ($data as $user) {
                if ($user['user'] === $_POST['user'] && $user['password'] === md5($_POST['password'])) {
                    $_SESSION['login'] = 1;
                    $_SESSION['role'] = $user['role'];
                    $this->loginResult = true;
                    break;
                }
            }
        }
    }

    public function getResult() : bool {
        return $this->loginResult;
    }

    public static function getAuthStatus(): bool {
        return (isset($_SESSION['login']) && $_SESSION['login'] == 1);
    }

}