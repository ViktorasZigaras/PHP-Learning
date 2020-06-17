<?php

# launch url: http://localhost/PHP-Learning/s7/t2/t2_index.php,
# http://localhost/PHP-Learning/s7/t2/t2_index.php?color=purple,
# http://localhost/PHP-Learning/s7/t2/t2_index.php?color=599955, etc

// create similar page to task 1;
// pass a link manually color=value;
// on load pass BG color as given,
// on plain click color page black

print('<pre>' . print_r($_GET, true) . '</pre>');
if (!empty($_GET) && isset($_GET['color'])) $color = $_GET['color'];
else $color = 'black';
echo "<div style='background-color: $color; width: 500px; height: 500px'>";
echo '<a href="./t2_index.php">normal link</a><br>';
echo "</div>";