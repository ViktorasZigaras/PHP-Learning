
<form action="" method="get">
    Color: <input type="text" name="color"><br>
    <button type="submit">Submit</button>
</form>

<?php

# launch url: http://localhost/PHP-Learning/part_7/task_2/index.php,
# http://localhost/PHP-Learning/part_7/task_2/index.php?color=purple,
# http://localhost/PHP-Learning/part_7/task_2/index.php?color=599955, etc

// create similar page to task 1;
// pass a link manually color=value;
// on load pass BG color as given,
// on plain click color page black

// additionally pass color through input field

print('<pre>' . print_r($_GET, true) . '</pre>');
$color = (isset($_GET['color'])) ? $_GET['color'] : 'black';
echo "<div style='background-color: $color; width: 500px; height: 500px'>";
echo '<a href="./t2_index.php">normal link</a><br>';
echo "</div>";