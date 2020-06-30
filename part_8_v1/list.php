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
        if (isset($_POST['delete_id']) && $account['accountId'] === $_POST['delete_id']) {
            if ($account['value'] === 0) {
                unset($data[$index]);
                successMessage('Account Deleted');
                break;
            } else {
                failureMessage('Account Has To Be Empty And Not Have Negative Balance');
            }
        } 
        # add
        if (isset($_POST['add_id']) && $account['accountId'] === $_POST['add_id']) {
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
        if (isset($_POST['remove_id']) && $account['accountId'] === $_POST['remove_id']) {
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

echo '<div class="container">';
foreach ($data as &$account) {
    $accountId = $account['accountId'];
    echo '<form action="" method="post">';
    echo '<span>' . 
        $account['name'] . ' - ' . 
        $account['surname'] . ' - ' . 
        $account['value'] . ' - ' .
        $accountId . ' - ' . 
        $account['personId'] . ' </span>';
    echo '<input type="hidden" id="delete_id" name="delete_id" value="' . $accountId . '">';
    if ($_SESSION['role'] === 'admin') {
        echo '<button type="submit">Delete</button>';
        echo '</form><br>';

        echo '<form action="" method="post">';
        echo '<input type="text" id="amount" name="amount" value="0">';
        echo '<input type="hidden" id="add_id" name="add_id" value="' . $accountId . '">';
        echo '<button type="submit">Add</button>';
        echo '</form><br>';

        echo '<form action="" method="post">';
        echo '<input type="text" id="amount" name="amount" value="0">';
        echo '<input type="hidden" id="remove_id" name="remove_id" value="' . $accountId . '">';
        echo '<button type="submit">Remove</button>';
        echo '</form><br>';
    } else {
        echo '</form><br>';
    }
}
unset($account);
echo '</div>';

setFooter();
finishBody();