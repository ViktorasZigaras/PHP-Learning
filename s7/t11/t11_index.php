<?php

# launch url: http://localhost/PHP-Learning/s7/t11/t11_index.php

// enter two player names (use defaults), press Start to begin/restart
// each player has a score, roll dice 6 (could press buttons to roll but automatic process is faster)
// display all rolls and their impact on score until one player gets 30 points first; restart and rename players if needed then

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js" defer></script>
    <script src="./count.js" defer></script>
    <title>Extra task</title>
    <style></style>
</head>
<body>

    <div style="">

        <label for="first">Player 1</label>
        <input type="text" name="first" id="first" value="First"><br>
        <br>
        <label for="second">Player 2</label>
        <input type="text" name="second" id="second" value="Second"><br>
        <br>
        <button type="button" id="start">START</button><br>

        <div id="result"></div>

    </div>

</body>
</html>