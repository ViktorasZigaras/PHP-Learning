<?php

$data = json_decode(file_get_contents(__DIR__ .'/data.json'), 1);

foreach ($data as &$account) {

    $accountId = $account['accountId'];
    if (!empty($_POST) && isset($_POST['remove'])) {
        $account['value'] -= $_POST['remove'];
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
        echo '<input type="text" id="remove" name="remove" value="0">';
        echo '<button type="submit">Remove</button>';
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

echo "remove <br>";

?>

<a href="./index.php">login</a><br>
<a href="./list.php">list</a><br>
<a href="./new.php">new</a><br>
<a href="./add.php">add</a><br>
<a href="./remove.php">remove</a><br>