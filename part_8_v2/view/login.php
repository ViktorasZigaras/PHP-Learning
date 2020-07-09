<?php
    use Main\App;
    use Main\Design;

    Design::setBody();
    Design::setHeader();
    echo App::Message();
?>

<div class="main">
    <div class="container login-container">
        <form action="<?= App::URL ?>doLogin" method="post">
            <span>User Name: </span>
            <input class="login-input" type="text" name="user"><br>
            <span>User Password: </span>
            <input class="login-input" type="password" name="password"><br>
            <input type="hidden" name="csrf" value="<?= App::CSRF() ?>">
            <button type="submit">Login</button>
        </form>
    </div>
</div>

<?php
    Design::setFooter();
    Design::finishBody();
