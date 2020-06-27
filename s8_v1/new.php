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

if (!empty($_POST)) {

    if (!isset($_POST['name'])) {
        echo '<br> [ Name Is Not Provided ] <br><br>';
    } elseif (!isset($_POST['surname'])) {
        echo '<br> [ Surname Is Not Provided ] <br><br>';
    } elseif (!isset($_POST['accountId'])) {
        echo '<br> [ Account Is Not Provided ] <br><br>';
    } elseif (!isset($_POST['personId'])) {
        echo '<br> [ Personal ID Is Not Provided ] <br><br>';
    } elseif (
        $_POST['name'] === '' || 
        $_POST['surname'] === '' || 
        $_POST['accountId'] === '' || 
        $_POST['personId'] === '') {
        echo '<br> [ Some Fields Are Empty ] <br><br>';
    } elseif (mb_strlen($_POST['name']) < 3) {
        echo '<br> [ Name Has To Be 3 Characters Long ] <br><br>';
    } elseif (mb_strlen($_POST['surname']) < 3) {
        echo '<br> [ Surname Has To Be 3 Characters Long ] <br><br>';
    } else {
        $ids = [];
        foreach ($data as &$account) {
            $ids[] = $account['personId'];
        }
        $ids[] = $_POST['personId'];
        unset($account);

        if (count($ids) !== count(array_unique($ids))) {
            echo '<br> [ Personal ID Is Not Unique ] <br><br>';
        } else {
            $data[] = [
                'name' => $_POST['name'], 
                'surname' => $_POST['surname'], 
                'accountId' => $_POST['accountId'], 
                'personId' => $_POST['personId'],
                'value' => 0
            ];
        
            file_put_contents(__DIR__ .'/data.json', json_encode($data));
        
            echo '<br> [ Account Created ] <br><br>';
        }
    }
}

print('<pre>' . print_r($data, true) . '</pre>');

echo "newlist <br>";

$numbers = range('0', '9');
$person_id = '';
for ($i = 0; $i < 11; $i++) { 
    $person_id .= $numbers[rand(0, count($numbers) - 1)];
}
$account_id = 'LT';
for ($i = 0; $i < 20; $i++) { 
    $account_id .= $numbers[rand(0, count($numbers) - 1)];
}

?>

<form action="" method="post">
<input type="text" name="name" value="test name <?= rand(1, 50) ?>"> name <br>
<input type="text" name="surname" value="test surname <?= rand(1, 50) ?>"> surname <br>
<input type="text" name="accountId" value="<?= $account_id ?>" readonly> accountId <br>
<input type="text" name="personId" value="<?= $person_id ?>"> personId <br>
<button type="submit">Create</button>
</form>

<a href="./index.php">login</a><br>
<a href="./list.php">list</a><br>
<a href="./new.php">new</a><br>