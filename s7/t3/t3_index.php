
<form action="" method="get">
    Color: <input type="text" name="color"><br>
    <button type="submit">Submit</button>
</form>

<?php

# launch url: http://localhost/PHP-Learning/s7/t3/t3_index.php

// create similar page to task 2;
// additionally pass color through input field

print('<pre>' . print_r($_GET, true) . '</pre>');
if (!empty($_GET) && isset($_GET['color'])) $color = $_GET['color'];
else $color = 'black';
echo "<div style='background-color: $color; width: 500px; height: 500px'>";
echo '<a href="./t3_index.php">normal link</a><br>';
echo "</div>";