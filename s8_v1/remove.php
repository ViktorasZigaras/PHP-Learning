<?php

require __DIR__ . '/bootstrap.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    header('Location: ./index.php');
    die();
}

if ($_SESSION['role'] !== 'admin') {
    header('Location: ./list.php');
    die();
}

if (!isset($_GET['id'])) {
    echo '<br> [ No Account ID ] <br><br>';
} else {
    $account_found = false;
    foreach ($data as &$account) {

        $accountId = $account['accountId'];
        
        // echo $accountId . ' | ' . $_GET['id'] . '<br> ';
        if ($accountId === $_GET['id']) {
            if (!empty($_POST) && isset($_POST['remove'])) {
                if (is_numeric($_POST['remove'])) {
                    if ($_POST['remove'] < 0) {
                        echo '<br> [ Negative Amount Is Not Allowed ] <br><br>';
                    } elseif (($account['value'] - $_POST['remove']) >= 0) {
                        $account['value'] -= $_POST['remove'];
                        echo '<br> [ ' . $_POST['remove'] . ' Has Been Removed ] <br><br>';
                    } else {
                        echo '<br> [ Can Not Remove Given Amount ] <br><br>';
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
            echo '<input type="text" id="remove" name="remove" value="0">';
            if ($_SESSION['role'] === 'admin') {
                echo '<button type="submit">Remove</button>';
            }
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

echo "remove <br>";

?>

<a href="./index.php">login</a><br>
<a href="./list.php">list</a><br>
<a href="./new.php">new</a><br>