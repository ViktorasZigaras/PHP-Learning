<?php

# launch url: http://localhost/PHP-Learning/s7/t1/t1_index.php

// create page with two links to self (black BG);
// one link is plain with this file, and another also has a parameter color=1;
// on GET click color page red,
// on plain click color page black

print('<pre>' . print_r($_GET, true) . '</pre>');
if (!empty($_GET)) $color = 'red';
else $color = 'black';
echo "<div style='background-color: $color; width: 500px; height: 500px'>";
echo '<a href=".' . '/t1_index.php">normal link</a><br>';
echo '<a href=".' . '/t1_index.php?color=1">GET link</a>';
echo "</div>";