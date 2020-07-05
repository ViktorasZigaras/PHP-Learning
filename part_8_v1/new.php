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
setMenu(true, false);

if (!empty($_POST)) {
    if (!isset($_POST['name'])) failureMessage('Name Is Not Provided');
    elseif (!isset($_POST['surname'])) failureMessage('Surname Is Not Provided');
    elseif (!isset($_POST['accountId'])) failureMessage('Account Is Not Provided');
    elseif (!isset($_POST['personId'])) failureMessage('Personal ID Is Not Provided');
    elseif (
        $_POST['name'] === '' || 
        $_POST['surname'] === '' || 
        $_POST['accountId'] === '' || 
        $_POST['personId'] === '') failureMessage('Some Fields Are Empty');
    elseif (mb_strlen($_POST['name']) < 3) failureMessage('Name Has To Be 3 Characters Long');
    elseif (mb_strlen($_POST['surname']) < 3) failureMessage('Surname Has To Be 3 Characters Long');
    else {
        $ids = [];
        foreach ($data as &$account) {
            $ids[] = $account['personId'];
        }
        $ids[] = $_POST['personId'];
        unset($account);
        if (count($ids) !== count(array_unique($ids))) {
            failureMessage('Personal ID Is Not Unique');
        } else {
            $data[] = [
                'name' => $_POST['name'], 
                'surname' => $_POST['surname'], 
                'accountId' => $_POST['accountId'], 
                'personId' => $_POST['personId'],
                'value' => 0
            ];
            file_put_contents(__DIR__ .'/data/data.json', json_encode($data));
            successMessage('Account Created');
        }
    }
}

$numbers = range('0', '9');
$person_id = '';
for ($i = 0; $i < 11; $i++) { 
    $person_id .= $numbers[rand(0, count($numbers) - 1)];
}
$account_id = 'LT';
for ($i = 0; $i < 20; $i++) { 
    $account_id .= $numbers[rand(0, count($numbers) - 1)];
}

echo '<div class="main">';
echo '<div class="container new-container">';
echo '<form action="" method="post">';
echo '<span>Customer Name: </span><input class="new-input" type="text" name="name" value="name ' . rand(1, 50) . '"><br>';
echo '<span>Customer Surname: </span><input class="new-input" type="text" name="surname" value="surname ' . rand(1, 50) . '"><br>';
echo '<span>Customer Account ID: </span><input class="new-input" type="text" name="accountId" value="' . $account_id . '" readonly><br>';
echo '<span>Customer Person ID: </span><input class="new-input" type="text" name="personId" value="' . $person_id . '"><br>';
echo '<button type="submit">Create</button>';
echo '</form>';
echo '</div></div>';

setFooter();
finishBody();