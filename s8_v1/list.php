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
setMenu(false, ($_SESSION['role'] === 'admin') ? true : false);

if (!empty($_POST) && isset($_POST['delete'])) {
    foreach ($data as $index => $account) {
        if (!empty($_POST) && $account['accountId'] === $_POST['delete']) {
            if ($account['value'] === 0) {
                unset($data[$index]);
                successMessage('Account Deleted');
            } else {
                failureMessage('Account Has To Be Empty And Not Have Negative Balance');
            }
        }       
    }
}

echo '<div class="container">';
foreach ($data as $account) {
    $accountId = $account['accountId'];
    echo '<form action="" method="post">';
    echo '<span>' . 
        $account['name'] . ' - ' . 
        $account['surname'] . ' - ' . 
        $account['value'] . ' - ' .
        $accountId . ' - ' . 
        $account['personId'] . ' </span>';
    echo '<input type="hidden" id="delete" name="delete" value="' . $accountId . '">';
    if ($_SESSION['role'] === 'admin') {
        echo '<button type="submit">Delete</button>';
        echo ' <a href="./add.php?id=' . $accountId . '">Add</a> ';
        echo ' <a href="./remove.php?id=' . $accountId . '">Remove</a> ';
    }
    echo '</form><br>';
}
echo '</div>';

if (!empty($_POST)) {
    file_put_contents(__DIR__ .'/data.json', json_encode($data));
}

setFooter();
finishBody();