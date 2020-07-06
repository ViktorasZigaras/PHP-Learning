<?php
    Main\Design::setBody();
    Main\Design::setHeader();
    Main\Design::setMenu(true, false);
    echo Main\App::getMessage();
?>

<div class="main">
    <div class="container new-container">
        <form action="" method="post">
            <span>Customer Name: </span>
            <input class="new-input" type="text" name="name" value="<?= 'name ' . rand(1, 50) ?>"><br>
            <span>Customer Surname: </span>
            <input class="new-input" type="text" name="surname" value="<?= 'surname ' . rand(1, 50) ?>"><br>
            <span>Customer Account ID: </span
            ><input class="new-input" type="text" name="accountId" value="<?= Main\NewLogic::generateAccountID() ?>" readonly><br>
            <span>Customer Person ID: </span>
            <input class="new-input" type="text" name="personId" value="<?= Main\NewLogic::generatePersonID() ?>"><br>
            <input type="hidden" name="csrf" value="<?= Main\App::getCSRF() ?>">
            <button type="submit">Create</button>
        </form>
    </div>
</div>

<?php
    Main\Design::setFooter();
    Main\Design::finishBody();