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
            $this->taskHeader('Task 1', 'Generate 400 asterisks, 1) use css to stop them from overflowing 2) and then break them into lines of 50');

            # part 1
            $total_count = 400;
            $html = '<div style="width:100%; word-break:break-all">';
            for ($i = 0; $i < $total_count; $i++) {
                $html .= '*';
            }
            $html .= '</div>';
            echo " $html </br> ";

            # part 2
            $line_count = 50;
            $iteration_count = $total_count / $line_count;
            $html = '';
            for ($i = 0; $i < $iteration_count; $i++) {
                $html .= '<div>';
                for ($j = 0; $j < $line_count; $j++) {
                    $html .= '*';
                }
                $html .= '</div>';
            }
            echo " $html </br> ";
        } 

        # task 2
        function taskTwoFunc() {
            $this->taskHeader('Task 2', 'Generate 300 random numbers, 1) print all separated, 2) count all numbers above 150, 3) all numbers above 275 must be colored red');

            // $numbers = [];
            // for ($i = 0; $i < 300; $i++) {
            //     array_push($numbers, rand(0, 300));
            // }

            // $count = 0;
            // $html = '<div style="width:100%; word-break:break-all">';
            // foreach($numbers as &$number) {
            //     # part 1 and 3
            //     if ($number > 275) $html .= '<div style="color:red">' . $number . '</div> ';
            //     else $html .= '<div>' . $number . '</div> ';
            //     # part 2 
            //     if ($number > 150) $count++;
            // }
            // unset($number);
            // $html .= '</div>';

            // echo " $html </br> ";
            // echo " count over 150: $count </br> ";
        }

        # task 3
        function taskThreeFunc() {
            $this->taskHeader('Task 3', 'Display all numbers between 1 and 3000 that are divisable by 77, divide by commas except the last number in line');

            $numbers = [];
            for ($i = 0; $i < 3000; $i++) {
                if ($i % 77 === 0) array_push($numbers, $i);
            }
            $count = 0;
            $html = '<div style="width:100%; word-break:break-all">';
            foreach($numbers as &$number) {
                $count++;
                $html .= ' ' . $number;
                if ($count !== count($numbers)) $html .= ',';
            }
            $html .= '</div>';

            echo " $html </br> ";
        }

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
            $this->taskHeader('Task 6', 'Throw coin (0-H/1-S) until - 1) top (0/H) is rolled, 2) top (0/H) is rolled three times total, 3) top (0/H) is rolled three times in a row');

            # part 1
            $string = '';
            do {
                $throw = rand(0, 1);
                if ($throw === 0) {
                    $run = false;
                    $string .= 'H ';
                } else {
                    $run = true;
                    $string .= 'S ';
                }
            } while ($run);
            echo " sequence: $string </br> ";

            # part 2
            $string = '';
            $counter = 0;
            do {
                $run = true;
                $throw = rand(0, 1);
                if ($throw === 0) {
                    $string .= 'H ';
                    if (++$counter === 3) $run = false;
                } else {
                    $string .= 'S ';
                }
            } while ($run);
            echo " sequence: $string </br> ";

            # part 3
            $string = '';
            $counter = 0;
            do {
                $run = true;
                $throw = rand(0, 1);
                if ($throw === 0) {
                    $string .= 'H ';
                    if (++$counter === 3) $run = false;
                } else {
                    $string .= 'S ';
                    $counter = 0;
                }
            } while ($run);
            echo " sequence: $string </br> ";
        }

        # task 7

        function taskSevenFunc() {
            $this->taskHeader('Task 7', 'One player rolls 10-20, another 5-25, repeat rounds until one player collects 222 points first');

            $end_points = 222;
            $player_one_points = 0;
            $player_two_points = 0;
            $player_one_name = 'Kazys';
            $player_two_name = 'Petras';
            $turn_winner = '';
            $winner = '';
            $points = 0;
            $counter = 0;
            do {
                $player_one_increment = rand(10, 20);
                $player_two_increment = rand(5, 25);
                $player_one_points += $player_one_increment;
                $player_two_points += $player_two_increment;
                $counter++;
                if ($player_one_increment > $player_two_increment) $turn_winner = $player_one_name;
                elseif ($player_one_increment < $player_two_increment) $turn_winner = $player_two_name;
                else $turn_winner = 'Draw';
                echo " Turn $counter: Kazys-$player_one_points, Petras-$player_two_points; rolls: $player_one_increment-$player_two_increment: winner is $turn_winner </br> ";
                if ($player_one_points >= $end_points) {
                    $winner = $player_one_name;
                    $points = $player_one_points;
                }
                elseif ($player_two_points >= $end_points) {
                    $winner = $player_two_name;
                    $points = $player_two_points;
                }
            } while ($player_one_points < $end_points || $player_two_points < $end_points);

            echo " winner is: $winner with $points points </br> ";
        }

        # task 8

        function taskEightFunc() {
            $this->taskHeader('Task 8', '');

            //

            echo "  </br> ";
        }

        // Reikia nupaišyti pilnavidurį rombą, taip pat, kaip ir pilnavidurį kvadratą (https://lt.wikipedia.org/wiki/Rombas), kurio aukštis 21 eilutė. Reikia padaryti, kad kiekviena rombo žvaigždutė būtų atsitiktinės RGB spalvos (perkrovus puslapį spalvos turi keistis).

        # task 9

        function taskNineFunc() {
            $this->taskHeader('Task 9', 'Run two identical strings with different notation one million times to compare');

            $start_time = microtime(true);
            for ($i = 1; $i <= 1000000; $i++) {
                $c = "10 bezdzioniu suvalge 20 bananu.";
            }
            $end_time = microtime(true);
            $total_time_first = $end_time - $start_time;

            $start_time = microtime(true);
            for ($i = 1; $i <= 1000000; $i++) {
                $c = '10 bezdzioniu suvalge 20 bananu.';
            }
            $end_time = microtime(true);
            $total_time_second = $end_time - $start_time;

            $total_time_difference = abs($total_time_first - $total_time_second);

            echo " First: $total_time_first, Second: $total_time_second, Total difference: $total_time_difference </br> ";
        }

        # task 10

        function taskTenFunc() {
            $this->taskHeader('Task 10', 'Hit the nail a certain random amount; nail is 8.5 cm/units long; 1) insert five nails with small hits (5-20mm), 2) insert five nails with heavy hits (possible misses)');

            $nail_lenght = 8500;

            # part 1
            $count = 0;
            for ($i = 1; $i <= 5; $i++) {
                $current_nail = $nail_lenght;
                while ($current_nail > 0) {
                    $current_nail -= rand(5, 20);
                    $count++;
                }
            }
            echo " hits taken (light): $count </br> ";

            # part 2
            $count = 0;
            for ($i = 1; $i <= 5; $i++) {
                $current_nail = $nail_lenght;
                while ($current_nail > 0) {
                    if (rand(0, 1) !== 0) $current_nail -= rand(20, 30);
                    $count++;
                }
            }
            echo " hits taken (heavy): $count </br> ";
        }

        # task 11
        function taskSpecialFunc() {
            $this->taskHeader('Task 11', '');

            //

            echo "  </br> ";
        }

        // Sugeneruokite stringą, kurį sudarytų 50 atsitiktinių skaičių nuo 1 iki 200, atskirtų tarpais. 
        // Skaičiai turi būti unikalūs (t.y. nesikartoti). 
        // Sugeneruokite antrą stringą, pasinaudodami pirmu, palikdami jame tik pirminius skaičius (t.y tokius, kurie dalinasi be liekanos tik iš 1 ir patys savęs). 
        // Skaičius stringe sudėliokite didėjimo tvarka, nuo mažiausio iki didžiausio.

    }
  
    $session = new SessionThree;