<?php

# launch url: http://localhost/PHP-Learning/s7/t9/t9_index.php

// create a POST form with a button and 3-10 checkboxes
// on submit change BG color to white, hide form and show count of selected checkboxes
# additionally give a link to return and try again

if (isset($_GET['redraw'])) {
    echo "<div style='background-color: white; width: 500px; height: 500px'>";
    echo "<div id='selected'>Selected: </div><br>";
    echo "<div id='count'>Count: </div><br>";
    echo '<a href="./t9_index.php">back</a><br>';
    echo "</div>";
    die();
}
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js" defer></script>';

echo "<div style='background-color: beige; width: 500px; height: 500px'>";
$letters = range('A', 'Z');
for ($i=0; $i < rand(3, 10); $i++) { 
    $letter = $letters[$i];
    echo '<input type="checkbox" id="' . $letter . '" name="elements[]" value="' . $letter . '">';
    echo '<label for="' . $letter . '"> ' . $letter . '</label><br>';
}
echo '<button type="button">Submit</button>';
echo "</div>";
echo "<script src='./count.js' defer></script>";