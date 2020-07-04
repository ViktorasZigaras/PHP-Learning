<?php

require __DIR__ . '/bootstrap.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    header('Location: ./index.php');
    die();
}

uasort($data, function($a, $b) {
    return $a['surname'] <=> $b['surname'];
});

setBody();
setHeader();
setMenu(false, $_SESSION['role'] === 'admin');

if (!empty($_POST)) {
    foreach ($data as $index => &$account) {
        # delete
        if (isset($_POST['delete']) && $account['accountId'] === $_POST['id']) {
            if ($account['value'] === 0) {
                unset($data[$index]);
                successMessage('Account Deleted');
                break;
            } else {
                failureMessage('Account Has To Be Empty And Not Have Negative Balance');
            }
        } 
        # add
        if (isset($_POST['add']) && $account['accountId'] === $_POST['id']) {
            if (is_numeric($_POST['amount'])) {
                if ($_POST['amount'] < 0) {
                    failureMessage('Negative Amount Is Not Allowed');
                } else {
                    $account['value'] += $_POST['amount'];
                    successMessage($_POST['amount'] . ' Has Been Added');
                    break;
                }
            } else {
                failureMessage('No Amount Was Provided');
            }
        }
        # remove
        if (isset($_POST['remove']) && $account['accountId'] === $_POST['id']) {
            if (is_numeric($_POST['amount'])) {
                if ($_POST['amount'] < 0) {
                    failureMessage('Negative Amount Is Not Allowed');
                } elseif ($_POST['amount'] > 0 && $account['value'] < $_POST['amount']) {
                    failureMessage('Not Enough Money In Balance');
                } else {
                    $account['value'] -= $_POST['amount'];
                    successMessage($_POST['amount'] . ' Has Been Removed');
                    break;
                }
            } else {
                failureMessage('No Amount Was Provided');
            }
        }
    }
    unset($account);
    # save
    file_put_contents(__DIR__ .'/data/data.json', json_encode($data));
}

echo '<div class="main">';
echo '<div class="container list-container">';
foreach ($data as &$account) {
    echo '<span>' . 
        $account['accountId'] .
        ' (' . $account['personId'] . ') ' .
        $account['name'] . ' ' .
        $account['surname'] . ': ' . 
        $account['value'] . ' &euro;' . 
        ' </span>';
    if ($_SESSION['role'] === 'admin') {
        echo '<form action="" method="post">';
        echo '<input type="hidden" id="id" name="id" value="' . $account['accountId'] . '">';
        echo '<button type="submit" name="delete" value="delete">Delete</button>';
        echo '<button type="submit" name="add" value="add">Add</button>';
        echo '<button type="submit" name="remove" value="remove">Remove</button>';
        echo '<input class="list-input" type="text" id="amount" name="amount" value="0">';
        echo '</form>';
    }
}
unset($account);
echo '</div></div>';

setFooter();
finishBody();