<?php
    # launch url: http://localhost/PHP-Learning/viktoras_zigaras_3.php

    class SessionThree {

        function __construct() {
            echo "  </br> Viktoras Zigaras - Session 1 - Part 3  </br></br> ";
            $this->taskOneFunc();
            $this->taskTwoFunc();
            $this->taskThreeFunc();
            $this->taskFourFunc();
            $this->taskFiveFunc();
            $this->taskSixFunc();
            $this->taskSevenFunc();
            $this->taskEightFunc();
            $this->taskNineFunc();
            $this->taskTenFunc();
            $this->taskSpecialFunc();
        }

        function taskHeader(string $title, string $description) {
            echo " </br>=====================</br>$title </br></br> ";
            echo " $description: </br></br> ";
        }
       
        # task 1
        function taskOneFunc() {
            $this->taskHeader('Task 1', '');

            //

            echo "  </br> ";
        } 

        // Naršyklėje nupieškite linija iš 400 “*”. 
            // Naudodami css stilių “suskaldykite” liniją taip, kad visos žvaigždutės matytųsi ekrane;
            // Programiškai “suskaldykite” žvaigždutes taip, kad vienoje eilutėje nebūtų daugiau nei 50 “*”; 

        # task 2
        function taskTwoFunc() {
            $this->taskHeader('Task 2', '');

            //

            echo "  </br> ";
        }

        // Sugeneruokit 300 atsitiktinių skaičių nuo 0 iki 300, atspausdinkite juos atskirtus tarpais ir suskaičiuokite kiek tarp jų yra didesnių už 150.  Skaičiai didesni nei 275 turi būti raudonos spalvos.

        # task 3
        function taskThreeFunc() {
            $this->taskHeader('Task 3', '');

            //

            echo "  </br> ";
        }

        // Vienoje eilutėje atspausdinkite visus skaičius nuo 1 iki 3000, kurie dalijasi iš 77 be liekanos. Skaičius atskirkite kableliais. Po paskutinio skaičiaus kablelio neturi būti. Jeigu reikia, panaudokite css, kad visi rezultatai matytųsi ekrane.


        # task 4
        function taskFourFunc() {
            $this->taskHeader('Task 4', '');

            //

            echo "  </br> ";
        }

        // Nupieškite kvadratą iš “*”, kurio kraštines sudaro 100 “*”. Panaudokite css stilių, kad kvadratas ekrane atrodytų kvadratinis.
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *

        # task 5
        function taskFiveFunc() {
            $this->taskHeader('Task 5', '');

            //

            echo "  </br> ";
        }

        // Prieš tai nupieštam kvadratui nupieškite raudonas istrižaines.

        # task 6
        function taskSixFunc() {
            $this->taskHeader('Task 6', '');

            //

            echo "  </br> ";
        }

        // Metam monetą. Monetos kritimo rezultatą imituojam rand() funkcija, kur 0 yra herbas, o 1 - skaičius. Monetos metimo rezultatus išvedame į ekraną atskiroje eilutėje: “S” jeigu iškrito skaičius ir “H” jeigu herbas. Suprogramuokite keturis skirtingus scenarijus kai monetos metimą stabdome:
        //     Iškritus herbui;
        //     Tris kartus iškritus herbui;
        //     Tris kartus iš eilės iškritus herbui;

        # task 7

        function taskSevenFunc() {
            $this->taskHeader('Task 7', '');

            //

            echo "  </br> ";
        }

        // Kazys ir Petras žaidžiai šaškėm. Petras surenka taškų kiekį nuo 10 iki 20, Kazys surenka taškų kiekį nuo 5 iki 25. Vienoje eilutėje išvesti žaidėjų vardus su taškų kiekiu ir “Partiją laimėjo: ​laimėtojo vardas​”. Taškų kiekį generuokite funkcija ​rand()​. Žaidimą laimi tas, kas greičiau surenka 222 taškus. Partijas kartoti tol, kol kažkuris žaidėjas pirmas surenka 222 arba daugiau taškų.

        # task 8

        function taskEightFunc() {
            $this->taskHeader('Task 8', '');

            //

            echo "  </br> ";
        }

        // Reikia nupaišyti pilnavidurį rombą, taip pat, kaip ir pilnavidurį kvadratą (https://lt.wikipedia.org/wiki/Rombas), kurio aukštis 21 eilutė. Reikia padaryti, kad kiekviena rombo žvaigždutė būtų atsitiktinės RGB spalvos (perkrovus puslapį spalvos turi keistis).

        # task 9

        function taskNineFunc() {
            $this->taskHeader('Task 9', '');

            //

            echo "  </br> ";
        }

        // Panaudokite funkciją microtime(). Paskaičiuokite kiek sekundžių užtruks kodą:
        // $c = "10 bezdzioniu suvalge 20 bananu.";
        // Įvykdyti 1 milijoną kartų ir palyginkite kiek užtruks įvykdyti kodą: 
        // $c = '10 bezdzioniu suvalge 20 bananu.';
        // (Stringas viengubose ir dvigubose kabutėse)

         # task 10

        function generateString($length) {
            $string = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3);
            return $string;
        }

        function taskTenFunc() {
            $this->taskHeader('Task 10', '');

            //

            echo "  </br> ";
        }

        // Sumodeliuokite vinies kalimą. Įkalimo gylį sumodeliuokite pasinaudodami rand() funkcija. Vinies ilgis 8.5cm (pilnai sulenda į lentą).
        // “Įkalkite” 5 vinis mažais smūgiais. Vienas smūgis vinį įkala 5-20 mm. Suskaičiuokite kiek reikia smūgių.
        // “Įkalkite” 5 vinis dideliais smūgiais. Vienas smūgis vinį įkala 20-30 mm, bet yra 50% tikimybė (pasinaudokite rand() funkcija tikimybei sumodeliuoti), kad smūgis nepataikys į vinį. Suskaičiuokite kiek reikia smūgių.

        # task 11
        function taskSpecialFunc() {
            $this->taskHeader('Task 11', '');

            //

            echo "  </br> ";
        }

        // Sugeneruokite stringą, kurį sudarytų 50 atsitiktinių skaičių nuo 1 iki 200, atskirtų tarpais. Skaičiai turi būti unikalūs (t.y. nesikartoti). Sugeneruokite antrą stringą, pasinaudodami pirmu, palikdami jame tik pirminius skaičius (t.y tokius, kurie dalinasi be liekanos tik iš 1 ir patys savęs). Skaičius stringe sudėliokite didėjimo tvarka, nuo mažiausio iki didžiausio.

    }

    echo "  </br> Viktoras Zigaras - Session 1 - Part 2  </br></br> ";
  
    $session = new SessionThree;