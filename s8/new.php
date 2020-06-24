<?php

// require __DIR__ . '/index.php';
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    header('Location: ./index.php');
    die();
}

$data = json_decode(file_get_contents(__DIR__ .'/data.json'), 1);

if (!empty($_POST)) {

    $data[] = [
        'name' => $_POST['name'], 
        'surname' => $_POST['surname'], 
        'accountId' => $_POST['accountId'], 
        'personId' => $_POST['personId'],
        'value' => 0
    ];

    file_put_contents(__DIR__ .'/data.json', json_encode($data));

}

print('<pre>' . print_r($data, true) . '</pre>');

echo "newlist <br>";

### review risks

?>

<form action="" method="post">
<input type="text" name="name" value="test name 1"> name <br>
<input type="text" name="surname" value="test surname 1"> surname <br>
<input type="text" name="accountId" value="001"> accountId <br>
<input type="text" name="personId" value="1001"> personId <br>
<button type="submit">Create</button>
</form>

<a href="./index.php">login</a><br>
<a href="./list.php">list</a><br>
<a href="./new.php">new</a><br>