<?php

# launch url: http://localhost/PHP-Learning/part_7/task_5/blue.php

// create two pages, on link click redirect to the other

if (isset($_GET['redirect'])) {
    header("Location: http://localhost/BIT-stuff/PHP-Learning/part_7/task_5/red.php");
    die();
}

echo "<div style='background-color: blue; width: 500px; height: 500px'>";
echo '<a href="./blue.php?redirect=true" style="color:red">to red</a><br>';
echo "</div>";