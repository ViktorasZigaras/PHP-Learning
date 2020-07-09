<?php
    use Main\App;
    use Main\Design;
    use Main\NewLogic;

    Design::setBody();
    Design::setHeader();
    Design::setMenu(true, false);
    echo App::Message();
?>

<div class="main">
    <div class="container new-container">
        <form action="" method="post">
            <span>Customer Name: </span>
            <input class="new-input" type="text" name="name" value="<?= 'name ' . rand(1, 50) ?>"><br>
            <span>Customer Surname: </span>
            <input class="new-input" type="text" name="surname" value="<?= 'surname ' . rand(1, 50) ?>"><br>
            <span>Customer Account ID: </span>
            <input class="new-input" type="text" name="accountId" value="<?= NewLogic::generateAccountID() ?>" readonly><br>
            <span>Customer Person ID: </span>
            <input class="new-input" type="text" name="personId" value="<?= NewLogic::generatePersonID() ?>"><br>
            <input type="hidden" name="csrf" value="<?= App::CSRF() ?>">
            <button type="submit">Create</button>
        </form>
    </div>
</div>

<?php
    Design::setFooter();
    Design::finishBody();