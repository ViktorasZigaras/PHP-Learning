<?php

# launch url: http://localhost/PHP-Learning/s8/index.php

session_start();

#### bootstrap, session, imports!!!
#### json calls?

echo "index <br>";

if (!empty($_POST)) {
    $users = json_decode(file_get_contents(__DIR__ .'/users.json'), 1);
    foreach ($users as $user) {
        if ($user['user'] === $_POST['user'] &&
        $user['password'] === md5($_POST['password'])) {
            $_SESSION['login'] = 1;
            header('Location: ./list.php');
            die();
        }
    }
    if (!isset($_SESSION['login']) || (isset($_SESSION['login']) && $_SESSION['login'] !== 1)) {
        echo '<br> [ Login Failed ] <br><br>';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    echo '<br> [ Logout Successful ] <br><br>';
}

if (isset($_SESSION['login']) && $_SESSION['login'] === 1 && !isset($_GET['logout'])) {
    echo '<form action="?logout" method="post">';
    echo '<button type="submit">Logout</button>';
    echo '</form><br><br><br>';
} else {
    echo '<form action="?" method="post">';
    echo '<input type="text" name="user"> User Name<br>';
    echo '<input type="password" name="password"> User Password<br>';
    echo '<button type="submit">Login</button>';
    echo '</form><br><br><br>';
}

?>

<a href="./index.php">login</a><br>
<a href="./list.php">list</a><br>
<a href="./new.php">new</a><br>