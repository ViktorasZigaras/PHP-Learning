<?php

# launch url: http://localhost/PHP-Learning/s7/t6/t6_index.php

// create a site with two buttons, one button is in GET and another in POST form
// depending on what was clicked color it green - GET and yellow - POST

### Pakartokite 6 uždavinį. Papildykite jį kodu, kuris naršyklę po POST metodo peradresuotų tuo pačiu adresu (t.y. į patį save) jau GET metodu.

$color = 'pink';
if (!empty($_GET) && isset($_GET['type'])) {
    $color = 'green';
}
if (!empty($_POST) && isset($_POST['type'])) {
    $color = 'yellow';
}

echo "<div style='background-color: $color; width: 500px; height: 500px'>";

?>

    <form action="?type=get" method="get">
        <button type="submit">GET</button>
    </form>
    <br>
    <form action="?type=post" method="post">
        <button type="submit">POST</button>
    </form>
</div>