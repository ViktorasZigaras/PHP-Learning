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

setBody();
setHeader();
setMenu(true, true);

if (!isset($_GET['id'])) {
    failureMessage('No Account ID');
} else {
    $account_found = false;
    foreach ($data as &$account) {
        if ($account['accountId'] === $_GET['id']) {
            if (!empty($_POST) && isset($_POST['add'])) {
                if (is_numeric($_POST['add'])) {
                    if ($_POST['add'] < 0) {
                        failureMessage('Negative Amount Is Not Allowed');
                    } else {
                        $account['value'] += $_POST['add'];
                        successMessage($_POST['add'] . ' Has Been Added');
                        file_put_contents(__DIR__ .'/data.json', json_encode($data));
                    }
                } else {
                    failureMessage('No Amount Was Provided');
                }
            }
            echo '<div class="container">';
            echo '<form action="" method="post">';
            echo '<span>' . 
                $account['name'] . ' - ' . 
                $account['surname'] . ' - ' . 
                $account['value'] . ' - ' .
                $account['accountId'] . ' - ' . 
                $account['personId'] . ' </span>';
            echo '<input type="text" id="add" name="add" value="0">';
            if ($_SESSION['role'] === 'admin') {
                echo '<button type="submit">Add</button>';
            }
            echo '</form></div>';
            $account_found = true;
            break;
        }
    }
    unset($account);
    if (!$account_found) failureMessage('Account Is Not Found');
}

setFooter();
finishBody();