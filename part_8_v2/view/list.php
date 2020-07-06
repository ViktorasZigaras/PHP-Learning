<?php
    Main\Design::setBody();
    Main\Design::setHeader();
    Main\Design::setMenu(false, $_SESSION['role'] === 'admin');
    echo Main\App::getMessage();
?>

<div class="main">
    <div class="container list-container">

    <?php
        $data = App\DB\JsonDb::showAll();
        uasort($data, function($a, $b) {
            return $a['surname'] <=> $b['surname'];
        });
        foreach ($data as $index => &$account) {
            echo '<span>' . 
                $account['accountId'] .
                ' (' . $account['personId'] . ') ' .
                $account['name'] . ' ' .
                $account['surname'] . ': ' . 
                $account['value'] . ' &euro;' . 
                ' </span>';
            if ($_SESSION['role'] === 'admin') {
                echo '<form action="" method="post">';
                echo '<input type="hidden" id="id" name="id" value="' . $account['accountId'] . '">';
                echo '<button type="submit" name="delete" value="delete">Delete</button>';
                echo '<button type="submit" name="add" value="add">Add</button>';
                echo '<button type="submit" name="remove" value="remove">Remove</button>';
                echo '<input class="list-input" type="text" id="amount" name="amount" value="0">';
                echo '<input type="hidden" name="uuid" value="' . $index . '">';
                echo '<input type="hidden" name="csrf" value="' . Main\App::getCSRF() . '">';
                echo '</form>';
            }
        }
        unset($account);
    ?>

    </div>
</div>

<?php
    Main\Design::setFooter();
    Main\Design::finishBody();