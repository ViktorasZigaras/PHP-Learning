<?php

# launch url: http://localhost/PHP-Learning/s7/t8/rose.php

// create two pages, Rose redirects to Pink on GET method

if (!empty($_GET)) {
    header("Location: http://localhost/PHP-Learning/s7/t8/pink.php");
    die();
}

echo "<div style='background-color: red; width: 500px; height: 500px'>";
echo "</div>";