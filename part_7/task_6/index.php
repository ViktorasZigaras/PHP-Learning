<?php

# launch url: http://localhost/PHP-Learning/part_7/task_6/index.php

// create a site with two buttons, one button is in GET and another in POST form
// depending on what was clicked color it green - GET and yellow - POST

// additionally use POST form to reload itself and color pink

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['type'])) $color = 'pink';
    else $color = 'yellow';
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $color = 'green';
}

echo "<div style='background-color: $color; width: 500px; height: 500px'>";

?>

    <form action="" method="get">
        <button type="submit">GET</button>
    </form>
    <br>
    <form action="" method="post">
        <button type="submit">POST</button>
    </form>
    <br>
    <form action="?type=post" method="post">
        <button type="submit">POST + PARAM</button>
    </form>
</div>