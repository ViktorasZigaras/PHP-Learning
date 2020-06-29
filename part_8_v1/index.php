<?php

# launch url: http://localhost/PHP-Learning/part_8_v1/index.php

require __DIR__ . '/bootstrap.php';

setBody();
setHeader();

if (!empty($_POST)) {
    $users = json_decode(file_get_contents(__DIR__ .'/users.json'), 1);
    foreach ($users as $user) {
        if ($user['user'] === $_POST['user'] &&
        $user['password'] === md5($_POST['password'])) {
            $_SESSION['login'] = 1;
            $_SESSION['role'] = $user['role'];
            header('Location: ./list.php');
            die();
        }
    }
    if (!isset($_SESSION['login']) || (isset($_SESSION['login']) && $_SESSION['login'] !== 1)) {
        failureMessage('Login Failed');
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    successMessage('Logout Successful');
}

echo '<div class="container">';
echo '<form action="?" method="post">';
echo '<input type="text" name="user"> User Name<br>';
echo '<input type="password" name="password"> User Password<br>';
echo '<button type="submit">Login</button>';
echo '</form>';
echo '</div>';

setFooter();
finishBody();