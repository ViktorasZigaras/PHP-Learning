<?php

# launch url: http://localhost/PHP-Learning/s7/t4/lemon.php

// create two pages, lemon and ornage;
// lemon redirects to orange

header("Location: http://localhost/PHP-Learning/s7/t4/orange.php");
die();

echo "<div style='background-color: lemon; width: 500px; height: 500px'></div>";
