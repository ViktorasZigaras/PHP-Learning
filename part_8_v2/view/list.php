<?php
    use Main\App;
    use Main\Design;

    Design::setBody();
    Design::setHeader();
    Design::setMenu(false, $_SESSION['role'] === 'admin');
    echo App::Message();
?>

<div class="main">
    <div class="container list-container">

    <?php
        $data = App::DB()::showAll();
        uasort($data, function($a, $b) {
            return $a['surname'] <=> $b['surname'];
        });
        // var_dump($data);
        foreach ($data as $index => &$account) {
            var_dump($account['uuid']);
            var_dump($account);
            // echo '<span>' . 
                $account['account'] .
                ' (' . $account['personal_code'] . ') ' .
                $account['name'] . ' ' .
                $account['surname'] . ': ' . 
                $account['value'] . ' &euro; ' . 
                ($account['value'] * App::USDrate()) . ' &dollar;' . 
                ' </span>';
            if ($_SESSION['role'] === 'admin') {
                echo '<form action="" method="post">';
                echo '<input type="hidden" id="id" name="id" value="' . $account['account'] . '">';
                echo '<button type="submit" name="delete" value="delete">Delete</button>';
                echo '<button type="submit" name="add" value="add">Add</button>';
                echo '<button type="submit" name="remove" value="remove">Remove</button>';
                echo '<input class="list-input" type="text" id="amount" name="amount" value="0">';
                echo '<input type="hidden" name="uuid" value="' . $account['uuid'] . '">';
                // echo '<input type="hidden" name="uuid" value="' . $index . '">';
                echo '<input type="hidden" name="csrf" value="' . App::CSRF() . '">';
                echo '</form>';
            }
        }
        unset($account);
    ?>

    </div>
</div>

<?php
    Design::setFooter();
    Design::finishBody();