<?php
    Main\Design::setBody();
    Main\Design::setHeader();
    echo Main\App::getMessage();
?>

<div class="main">
    <div class="container login-container">
        <form action="<?= Main\App::URL ?>doLogin" method="post">
            <span>User Name: </span>
            <input class="login-input" type="text" name="user"><br>
            <span>User Password: </span>
            <input class="login-input" type="password" name="password"><br>
            <button type="submit">Login</button>
        </form>
    </div>
</div>

<?php
    Main\Design::setFooter();
    Main\Design::finishBody();
