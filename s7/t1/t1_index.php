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

// echo __DIR__;

// https://docs.google.com/document/d/14680HmxLSaPORUKhP2a0nkUK-Hr-TtdSrPkyvljSGC8/edit doc
// https://docs.google.com/document/d/1nzfcVxpgmmS6ZguZoHyCqehTFlNy7GqXGqdANzWxKUo/edit to do

// https://stackoverflow.com/questions/768431/how-do-i-make-a-redirect-in-php redirect


// print('<pre>' . print_r($_POST, true) . '</pre>');
// print('<pre>' . ($_GET['rrr'] ?? null) . '</pre>');
// if(!empty($_POST)) {}
# ? >
// <form action="?getoparametras=ggg&rrrt=uuu" method="post">
// Page: <input type="text" name="page">
// <br>
// orderBy: <input type="text" name="orderBy">
// <br>
// <button type="submit">Varyk!</button>
// <input type="hidden" name="ilgis" value="3metrai">
// </form>


/*
Padarykite puslapį su dviem mygtukais. Mygtukus įdėkite į dvi skairtingas formas- vieną GET ir kitą POST. Nenaudodami jokių konkrečių $_GET ar $_POST reikšmių, o tik tikrindami pačius masyvus, nuspalvinkite foną žaliai, kai paspaustas mygtukas iš GET formos ir geltonai- kai iš POST.

Pakartokite 6 uždavinį. Papildykite jį kodu, kuris naršyklę po POST metodo peradresuotų tuo pačiu adresu (t.y. į patį save) jau GET metodu.

Sukurkite du puslapius pink.php ir rose.php. Nuspalvinkite juos atitinkamo spalvom. Į pink.php puslapį įdėkite formą su POST metodu ir mygtuku “GO TO ROSE”. Formą nukreipkite, kad ji atsidarinėtų rose.php puslapyje. Padarykite taip, kad surinkus naršyklėje tiesiogiai adresą į rose.php puslapį, naršyklė būtų peradresuojama į pink.php puslapį. 

Padarykite juodą puslapį, kuriame būtų POST forma, mygtukas ir atsitiktinis kiekis (3-10) checkbox su raidėm A,B,C… Padarykite taip, kad paspaudus mygtuką, fono spalva pasikeistų į baltą, forma išnyktų ir atsirastų skaičius, rodantis kiek buvo pažymėta checkboksų (ne kurie, o kiek). 

Pakartokite 9 uždavinį. Padarykite taip, kad atsirastų du skaičiai. Vienas rodytų kiek buvo pažymėta, o kitas kiek iš vis buvo jų sugeneruota.

11. papildomas
Suprogramuokite žaidimą. Žaidimas prasideda dviem laukeliais, kuriuose žaidėjai įveda savo vardus ir mygtuku “pradėti”. Šone yra rodomas žaidėjų rezultatas. Paspaudus “pradėti” turi atsirasti pirmo žaidėjo vardas ir mygtukas “mesti kauliuką”. Jį nuspaudus skriptas automatiškai sugeneruoja skaičių nuo 1 iki 6 ir jį prideda prie žaidėjo rezultato, o pirmo žaidėjo vardas pakeičiamas antro žaidėjo vardu (parodo kieno eilė “mesti kauliuką”). Žaidimas tęsiamas iki tol, kol kažkuris žaidėjas surenka 30 taškų. Tada parodomas pranešimas apie laimėjimą ir vėl leidžiama suvesti žaidėjų vardus ir pradėti žaidimą iš naujo.
*/