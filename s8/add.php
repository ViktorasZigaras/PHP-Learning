<?php

// require __DIR__ . '/index.php';
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    header('Location: ./index.php');
    die();
}

$data = json_decode(file_get_contents(__DIR__ .'/data.json'), 1);

foreach ($data as &$account) {

    $accountId = $account['accountId'];
    if (!empty($_POST) && isset($_POST['add'])) {
        $account['value'] += $_POST['add'];
    }
    // echo $accountId . ' | ' . $_GET['id'] . '<br> ';
    if (isset($_GET['id']) && $accountId === $_GET['id']) {
        echo '<form action="" method="post">';
        echo '<span>' . 
            $account['name'] . ' ' . 
            $account['surname'] . ' ' . 
            $account['value'] . ' ' .
            $accountId . ' ' . 
            $account['personId'] . ' </span>';
        echo '<input type="text" id="add" name="add" value="0">';
        echo '<button type="submit">Add</button>';
        echo '</form><br>';
        break;
    }
   
}
unset($account);

if (!isset($_GET['delete'])) {
    file_put_contents(__DIR__ .'/data.json', json_encode($data));
}

### review risks
# also if id is received
# also if item is found
# adding non numbers
# only positive ints

echo "add <br>";

?>

<a href="./index.php">login</a><br>
<a href="./list.php">list</a><br>
<a href="./new.php">new</a><br>