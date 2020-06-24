<?php

// require __DIR__ . '/index.php';
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    header('Location: ./index.php');
    die();
}

$data = json_decode(file_get_contents(__DIR__ .'/data.json'), 1);

foreach ($data as $index => $account) {

    $accountId = $account['accountId'];
    if (!empty($_POST) && $accountId === $_POST['delete']) {
        unset($data[$index]);
    } else {
        echo '<form action="" method="post">';
        echo '<span>' . 
            $account['name'] . ' ' . 
            $account['surname'] . ' ' . 
            $account['value'] . ' ' .
            $accountId . ' ' . 
            $account['personId'] . ' </span>';
        echo '<input type="hidden" id="delete" name="delete" value="' . $accountId . '">';
        echo '<button type="submit">Delete</button>';
        echo ' <a href="./add.php?id=' . $accountId . '">Add</a> ';
        echo ' <a href="./remove.php?id=' . $accountId . '">Remove</a> ';
        echo '</form><br>';
    }
   
}

if (!empty($_POST)) {
    file_put_contents(__DIR__ .'/data.json', json_encode($data));
}

### review risks

echo "list <br>";

?>

<a href="./index.php">login</a><br>
<a href="./list.php">list</a><br>
<a href="./new.php">new</a><br>