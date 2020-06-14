<?php
    # launch url: http://localhost/PHP-Learning/viktoras_zigaras_5.php

    class SessionFive {

        function __construct() {
            echo "  </br> Viktoras Zigaras - Session 1 - Part 5  </br></br> ";
            $array_of_arrays = $this->taskOneFunc(10, 5, 5, 25);
            $this->taskTwoFunc($array_of_arrays, 10, 2, 5, 25);
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

        function taskHeader(
            string $title, 
            string $description
        ) {
            echo " </br>=====================</br>$title </br></br> ";
            echo " $description: </br></br> ";
        }
       
        # task 1

        function taskOneFunc(
            int $count = 0,
            int $sub_count = 0,
            $min = 0,
            $max = 0
        ) {
            $this->taskHeader('Task 1', "Generate an array of $count with $sub_count sub-dimension with ($min, $max) values each");

            $array_of_arrays = [];
            for ($i = 0; $i < $count; $i++) {
                $internal_array = [];
                for ($j = 0; $j < $sub_count; $j++) {
                    array_push($internal_array, rand($min, $max));
                }
                echo 'index of ' . $i . ': '. join(' ', $internal_array) . '</br>';
                array_push($array_of_arrays, $internal_array);
            }

            return $array_of_arrays;
        } 

        # task 2

        function taskTwoFunc(
            array $array_of_arrays = [],
            $compare_above = 0,
            $add_count = 0,
            $min = 0,
            $max = 0
        ) {
            $this->taskHeader('Task 2', "Using previous array do the following: </br>
                1) calculate all numbers above $compare_above; </br>
                2) find highest value; </br>
                3) sum all same indexes of sub-arrays; </br>
                4) add every sub-array by $add_count; </br>
                5) sum expanded arrays and make a new array from them; </br>
            ");

            $compare_count = 0;
            $max_number = 0;
            $sum_array = [];
            $sum_expanded_array = [];
            foreach ($array_of_arrays as $index=>&$array) {
                foreach ($array as $sub_index=>&$number) {
                    # 1
                    if ($number > $compare_above) $compare_count++;
                    # 3
                    if (isset($sum_array[$sub_index])) {
                        $sum_array[$sub_index] += $number;
                    } else {
                        $sum_array[$sub_index] = $number;
                    }
                }
                # 2
                $max_local_number = max($array);
                echo " 2) largest local number at $index: $max_local_number </br> ";
                $max_number = max($max_local_number, $max_number);
            }
            unset($array, $number);
            # 3
            $sum_string = '';
            foreach ($sum_array as $index=>&$sum) {
                $sum_string .= "[$index]->($sum) ";
            }
            unset($sum);
            # 4
            foreach ($array_of_arrays as $index=>&$array) {
                for ($i = 0; $i < $add_count; $i++) {
                    array_push($array, rand($min, $max));
                }
                echo '4) index of ' . $index . ': '. join(' ', $array) . '</br>';
                # 5
                array_push($sum_expanded_array, array_sum($array));
            }
            unset($array, $number);
            # 5
            $sum_expanded_string = '';
            foreach ($sum_expanded_array as $index=>&$sum) {
                $sum_expanded_string .= "[$index]->($sum) ";
            }
            unset($sum);

            echo " 1) numbers above $compare_above: $compare_count </br> ";
            echo " 2) largest total number: $max_number </br> ";
            echo " 3) sum of all same indexes: $sum_string </br> ";
            echo " 5) sum of all expanded arrays: $sum_expanded_string </br> ";
        }

        # task 3

        function taskThreeFunc() {
            $this->taskHeader('Task 3', "");

            //

            echo "  </br> ";
        }

        // Sukurkite masyvą iš 10 elementų. Kiekvienas masyvo elementas turi būti masyvas su atsitiktiniu kiekiu nuo 2 iki 20 elementų. Elementų reikšmės atsitiktinai parinktos raidės iš intervalo A-Z. Išrūšiuokite antro lygio masyvus pagal abėcėlę (t.y. tuos kur su raidėm).

        # task 4

        function taskFourFunc() {
            $this->taskHeader('Task 4', "");

            //

            echo "  </br> ";
        }

        // Išrūšiuokite trečio uždavinio pirmo lygio masyvą taip, kad elementai kurių masyvai trumpiausi eitų pradžioje.

        # task 5

        function taskFiveFunc() {
            $this->taskHeader('Task 5', "");

            //

            echo "  </br> ";
        }

        // Sukurkite masyvą iš 30 elementų. Kiekvienas masyvo elementas yra masyvas [user_id => xxx, place_in_row => xxx] user_id atsitiktinis unikalus skaičius nuo 1 iki 1000000, place_in_row atsitiktinis skaičius nuo 0 iki 100. 

        # task 6

        function taskSixFunc() {
            $this->taskHeader('Task 6', "");

            //

            echo "  </br> ";
        }

        // Išrūšiuokite 6 uždavinio masyvą pagal user_id didėjančia tvarka. Ir paskui išrūšiuokite pagal place_in_row mažėjančia tvarka.

        # task 7

        function taskSevenFunc() {
            $this->taskHeader('Task 7', "");

            //

            echo "  </br> ";
        }

        // Prie 6 uždavinio masyvo antro lygio masyvų pridėkite dar du elementus: name ir surname. Elementus užpildykite stringais iš atsitiktinai sugeneruotų lotyniškų raidžių, kurių ilgiai nuo 5 iki 15.

        # task 8

        function taskEightFunc() {
            $this->taskHeader('Task 8', "");

            //

            echo "  </br> ";
        }

        // Sukurkite masyvą iš 10 elementų. Masyvo reikšmes užpildykite pagal taisyklę: generuokite skaičių nuo 0 iki 5. Ir sukurkite tokio ilgio masyvą. Jeigu reikšmė yra 0 masyvo nekurkite. Antro lygio masyvo reikšmes užpildykite atsitiktiniais skaičiais nuo 0 iki 10. Ten kur masyvo nekūrėte reikšmę nuo 0 iki 10 įrašykite tiesiogiai.

        # task 9

        function taskNineFunc() {
            $this->taskHeader('Task 9', "");

            //

            echo "  </br> ";
        }

        // Sukurkite Paskaičiuokite 8 uždavinio masyvo visų reikšmių sumą ir išrūšiuokite masyvą taip, kad pirmiausiai eitų mažiausios masyvo reikšmės arba jeigu reikšmė yra masyvas, to masyvo reikšmių sumos.

        # task 10

        function taskTenFunc() {
            $this->taskHeader('Task 10', "");

            //

            echo "  </br> ";
        }

        // Sukurkite masyvą iš 10 elementų. Jo reikšmės masyvai iš 10 elementų. Antro lygio masyvų reikšmės masyvai su dviem elementais value ir color. Reikšmė value vienas iš atsitiktinai parinktų simbolių: #%+*@%, o reikšmė color atsitiktinai sugeneruota spalva formatu: #XXXXXX. Pasinaudoję masyvų atspausdinkite “kvadratą” kurį sudarytų masyvo reikšmės nuspalvintos spalva color.

        # task 11
        
        function taskSpecialFunc() {
            $this->taskHeader('Task 11', "");

            //

            echo "  </br> ";
        }

        // Duotas kodas, generuojantis masyvą:
        // do {
        //     $a = rand(0, 1000);
        //     $b = rand(0, 1000);
        // } while ($a == $b);
        // $long = rand(10,30);
        // $sk1 = $sk2 = 0;
        // echo '<h3>Skaičiai '.$a.' ir '.$b.'</h3>';
        // $c = [];
        // for ($i=0; $i<$long; $i++) {
        //     $c[] = array_rand(array_flip([$a, $b]));
        // }
        // echo '<h4>Masyvas:</h4>';
        // echo '<pre>';
        // print_r($c);
        // echo '</pre>';
        // Reikia apskaičiuoti kiek buvo $sk1 ir $sk2 naudojantis matematika.
        // NEGALIMA! naudoti jokių palyginimo operatorių (if-else, swich, ()?:)
        // NEGALIMA! naudoti jokių regex ir string funkcijų.
        // GALIMA naudotis tik aritmetiniais veiksmais ir matematinėmis funkcijomis iš skyrelio: https://www.php.net/manual/en/ref.math.php

        // Jeigu reikia, kodo patogumui galima panaudoti įvairias funkcijas, bet sprendimo pagrindas turi būti matematinis.

        // Atsakymą reikia pateikti formatu:
        // echo '<h3>Skaičius 789 yra pakartotas '.$sk1.' kartų, o skaičius 123 - '.$sk2.' kartų.</h3>';

        // Kur rudi skaičiai yra pakeisti skaičiais $a ir $b generuojamais kodo.

    }
  
    $session = new SessionFive;