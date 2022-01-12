<?php

# launch url: http://localhost/BIT-stuff/PHP-Learning/part_7/task_4/lemon.php

// create two pages, lemon and ornage;
// lemon redirects to orange

header("Location: http://localhost/BIT-stuff/PHP-Learning/part_7/task_4/orange.php");
die();

echo "<div style='background-color: lemon; width: 500px; height: 500px'></div>";
