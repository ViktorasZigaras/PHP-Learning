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

// https://docs.google.com/document/d/14680HmxLSaPORUKhP2a0nkUK-Hr-TtdSrPkyvljSGC8/edit doc
// https://docs.google.com/document/d/1nzfcVxpgmmS6ZguZoHyCqehTFlNy7GqXGqdANzWxKUo/edit to do

/*
Pakartokite 9 uždavinį. Padarykite taip, kad atsirastų du skaičiai. Vienas rodytų kiek buvo pažymėta, o kitas kiek iš vis buvo jų sugeneruota.

11. papildomas
Suprogramuokite žaidimą. Žaidimas prasideda dviem laukeliais, kuriuose žaidėjai įveda savo vardus ir mygtuku “pradėti”. Šone yra rodomas žaidėjų rezultatas. Paspaudus “pradėti” turi atsirasti pirmo žaidėjo vardas ir mygtukas “mesti kauliuką”. Jį nuspaudus skriptas automatiškai sugeneruoja skaičių nuo 1 iki 6 ir jį prideda prie žaidėjo rezultato, o pirmo žaidėjo vardas pakeičiamas antro žaidėjo vardu (parodo kieno eilė “mesti kauliuką”). Žaidimas tęsiamas iki tol, kol kažkuris žaidėjas surenka 30 taškų. Tada parodomas pranešimas apie laimėjimą ir vėl leidžiama suvesti žaidėjų vardus ir pradėti žaidimą iš naujo.
*/