<?php

// require __DIR__ . '/index.php';
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    header('Location: ./index.php');
    die();
}

if (!isset($_GET['id'])) {
    echo '<br> [ No Account ID ] <br><br>';
} else {
    $data = json_decode(file_get_contents(__DIR__ .'/data.json'), 1);
    $account_found = false;
    foreach ($data as &$account) {

        $accountId = $account['accountId'];
        
        // echo $accountId . ' | ' . $_GET['id'] . '<br> ';
        if ($accountId === $_GET['id']) {
            if (!empty($_POST) && isset($_POST['add'])) {
                if (is_numeric($_POST['add'])) {
                    if ($_POST['add'] < 0) {
                        echo '<br> [ Negative Amount Is Not Allowed ] <br><br>';
                    } else {
                        $account['value'] += $_POST['add'];
                    }
                } else {
                    echo '<br> [ No Amount Was Provided ] <br><br>';
                }
            }
            
            echo '<form action="" method="post">';
            echo '<span>' . 
                $account['name'] . ' - ' . 
                $account['surname'] . ' - ' . 
                $account['value'] . ' - ' .
                $accountId . ' - ' . 
                $account['personId'] . ' </span>';
            echo '<input type="text" id="add" name="add" value="0">';
            echo '<button type="submit">Add</button>';
            echo '</form><br>';
            $account_found = true;
            break;
        }
    
    }
    unset($account);
    if (!$account_found) {
        echo '<br> [ Account Is Not Found ] <br><br>';
    }
    if (!isset($_GET['delete'])) {
        file_put_contents(__DIR__ .'/data.json', json_encode($data));
    }
}

echo "add <br>";

?>

<a href="./index.php">login</a><br>
<a href="./list.php">list</a><br>
<a href="./new.php">new</a><br>