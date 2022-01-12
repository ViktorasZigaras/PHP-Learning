<?php

# launch url: http://localhost/PHP-Learning/part_7/task_5/red.php

// create two pages, on link click redirect to the other

if (isset($_GET['redirect'])) {
    header("Location: http://localhost/BIT-stuff/PHP-Learning/part_7/task_5/blue.php");
    die();
}

echo "<div style='background-color: red; width: 500px; height: 500px'>";
echo '<a href="./red.php?redirect=true">to blue</a><br>';
echo "</div>";