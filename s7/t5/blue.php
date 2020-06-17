<?php

print('<pre>' . print_r($_GET, true) . '</pre>');

if (!empty($_GET) && isset($_GET['redirect'])) {
    header("Location: http://localhost/PHP-Learning/s7/t5/red.php");
    die();
}

echo "<div style='background-color: blue; width: 500px; height: 500px'>";
echo '<a href="./blue.php?redirect=true" style="color:red">to red</a><br>';
echo "</div>";