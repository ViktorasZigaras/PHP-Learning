<?php

// require __DIR__ . '/index.php';
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    header('Location: ./index.php');
    die();
}

$data = json_decode(file_get_contents(__DIR__ .'/data.json'), 1);

uasort($data, function($a, $b) {
    return $a['surname'] <=> $b['surname'];
});

function displayItem($item, $accountId) {
    echo '<form action="" method="post">';
    echo '<span>' . 
        $item['name'] . ' - ' . 
        $item['surname'] . ' - ' . 
        $item['value'] . ' - ' .
        $accountId . ' - ' . 
        $item['personId'] . ' </span>';
    echo '<input type="hidden" id="delete" name="delete" value="' . $accountId . '">';
    echo '<button type="submit">Delete</button>';
    echo ' <a href="./add.php?id=' . $accountId . '">Add</a> ';
    echo ' <a href="./remove.php?id=' . $accountId . '">Remove</a> ';
    echo '</form><br>';
}

foreach ($data as $index => $account) {
    $display = true;
    $accountId = $account['accountId'];
    if (!empty($_POST) && $accountId === $_POST['delete']) {
        if ($account['value'] === 0) {
            unset($data[$index]);
            echo '<br> [ Account Deleted ] <br><br>';
            $display = false;
        } else {
            echo '<br> [ Account Has To Be Empty And Not Have Negative Balance ] <br><br>';
            // displayItem($account, $accountId);
        }
    } 
    if ($display) {
        displayItem($account, $accountId);
    }
   
}

if (!empty($_POST)) {
    file_put_contents(__DIR__ .'/data.json', json_encode($data));
}

echo "list <br>";

?>

<a href="./index.php">login</a><br>
<a href="./list.php">list</a><br>
<a href="./new.php">new</a><br>