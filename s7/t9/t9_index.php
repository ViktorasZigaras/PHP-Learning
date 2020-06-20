<?php

# launch url: http://localhost/PHP-Learning/s7/t9/t9_index.php

// create a POST form with a button and 3-10 checkboxes
// on submit change BG color to white, hide form and show count of selected checkboxes

# edit: do not reload and just update values through JS

// if (isset($_GET['redraw'])) {
  // echo isset($_GET['redraw']);
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     echo "<div style='background-color: white; width: 500px; height: 500px'>";
//     echo "<div id='selected'>Selected: </div><br>";
//     echo "<div id='count'>Count: </div><br>";
//     echo '<a href="./t9_index.php">back</a><br>';
//     echo "</div>";
//     die();
// } else 
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js" defer></script>';

echo "<div style='background-color: beige; width: 500px; height: 500px'>";
echo '<form action="?redraw" method="post">';
$letters = range('A', 'Z');
for ($i=0; $i < rand(3, 10); $i++) { 
    $letter = $letters[$i];
    echo '<input type="checkbox" id="' . $letter . '" name="elements[]" value="' . $letter . '">';
    echo '<label for="' . $letter . '"> ' . $letter . '</label><br>';
}
echo '<button type="button">Submit</button>';
echo '</form>';
echo "<div id='selected'>Selected: </div><br>";
echo "<div id='count'>Count: </div><br>";
echo "</div>";

?>

<script src="./count.js" defer></script>