<?php

# launch url: http://localhost/PHP-Learning/s7/t9/t9_index.php

// create a POST form with a button and 3-10 checkboxes
// on submit change BG color to white, hide form and show count of selected checkboxes

// show number of checkboxes present
if (!empty($_GET) && isset($_GET['elements'])) {
$aDoor = $_GET['elements'];
  if(empty($aDoor)) 
  {
    echo("You didn't select any buildings.");
  } 
  else 
  {
    $N = count($aDoor);

    echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
      echo($aDoor[$i] . " ");
    }
  }
}

if (!empty($_GET) && isset($_GET['redraw'])) {
    echo "<div style='background-color: white; width: 500px; height: 500px'>";
    die();
}

echo "<div style='background-color: beige; width: 500px; height: 500px'>";
echo '<form action="?redraw" method="post">';
$letters = range('A', 'Z');
for ($i=0; $i < rand(3, 10); $i++) { 
    $letter = $letters[$i];
    echo '<input type="checkbox" id="' . $letter . '" name="elements[]" value="' . $letter . '">';
    echo '<label for="' . $letter . '"> ' . $letter . '</label><br>';
}
echo '<button type="submit">Submit</button>';
echo '</form>';
echo "</div>";