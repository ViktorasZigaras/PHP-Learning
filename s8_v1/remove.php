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
            if (!empty($_POST) && isset($_POST['remove'])) {
                if (is_numeric($_POST['remove'])) {
                    if ($_POST['remove'] < 0) {
                        failureMessage('Negative Amount Is Not Allowed');
                    } elseif (($account['value'] - $_POST['remove']) >= 0) {
                        $account['value'] -= $_POST['remove'];
                        successMessage($_POST['remove'] . ' Has Been Removed');
                        file_put_contents(__DIR__ .'/data.json', json_encode($data));
                    } else {
                        failureMessage('Can Not Remove Given Amount');
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
            echo '<input type="text" id="remove" name="remove" value="0">';
            if ($_SESSION['role'] === 'admin') {
                echo '<button type="submit">Remove</button>';
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