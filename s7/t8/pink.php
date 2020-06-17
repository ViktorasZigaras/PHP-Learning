<?php

# launch url: http://localhost/PHP-Learning/s7/t8/pink.php

// create two pages, Pink has a form that forwards to Rose

echo "<div style='background-color: pink; width: 500px; height: 500px'>";
echo "<form action='rose.php' method='post'>";
echo "<button type='submit'>GO TO ROSE</button>";
echo "</form>";
echo "</div>";