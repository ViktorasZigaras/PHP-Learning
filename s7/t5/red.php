<?php

# launch url: http://localhost/PHP-Learning/s7/t4/red.php

// create two pages, on link click redirect to the other

print('<pre>' . print_r($_GET, true) . '</pre>');

if (!empty($_GET) && isset($_GET['redirect'])) {
    header("Location: http://localhost/PHP-Learning/s7/t5/blue.php");
    die();
}

echo "<div style='background-color: red; width: 500px; height: 500px'>";
echo '<a href="./red.php?redirect=true">to blue</a><br>';
echo "</div>";