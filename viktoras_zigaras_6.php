<?php
    # launch url: http://localhost/PHP-Learning/viktoras_zigaras_6.php

    class SessionSix {

        function __construct() {
            echo "  </br> Viktoras Zigaras - Session 1 - Part 6  </br></br> ";
            $this->taskOneFunc('first text');
            $this->taskTwoFunc('second text', 5);
            $this->taskThreeFunc();
            $this->taskFourFunc(444);
            $this->taskFiveFunc(100, 33, 77);
            $this->taskSixFunc(100, 333, 777);
            $this->taskSevenFunc(10, 20, 0, 10, 10, 30, 0);
            $this->taskEightFunc();
            $this->taskNineFunc();
            $this->taskTenFunc();
            $this->taskSpecialFunc(5, 15, 1, 5, 70, 100, 0, 100);
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
            string $text = ''
        ) {
            $this->taskHeader('Task 1', "Create a function that inserts given text ($text) to H1 tag");

            echo " <h1> $text </h1> </br> ";
        } 

        # task 2

        function taskTwoFunc(
            string $text = '',
            int $level = 0
        ) {
            $this->taskHeader('Task 2', "Create a function that inserts given text ($text) to a given level ($level) of H tag");

            if ($level < 1 || $level > 6) {
                echo "Invalid H tag level!";
                return;
            }

            echo '<h' . $level . '>' . $text . '</h' . $level . '> </br>';
        }

        # task 3

        function taskThreeFunc() {
            $this->taskHeader('Task 3', "Generate a random string, split all numbers in it into groups and put them all to separate H1 tags");

            $string = md5(time());
            $numbers = preg_replace('/[^0-9]/', '', preg_split('/(?<=[0-9])(?=[a-z]+)/i', $string));  
            $html = '';
            foreach ($numbers as &$number) {
                $html .= "<h1> $number </h1> </br>";
            }
            unset($number);  

            echo " $string:</br> $html </br> ";                                                    
        }
        
        # task 4

        function taskFourFunc(
            int $number = 0
        ) {
            $this->taskHeader('Task 4', "Create a function that determines from how many integers a number divides fully");

            if (!is_int($number) || abs($number) < 1) {
                echo "Value is not integer or less than 1!";
                return;
            }
            $number = abs($number);
            $values = '';
            // don't use 1 or self
            for ($i = 2; $i < $number; $i++) { 
                if ($number % $i === 0) $values .= " $i ";
            }

            echo " 1 $values ($number) </br> ";
        }

        # task 5

        function taskFiveFunc(
            int $count = 0,
            int $min = 0,
            int $max = 0
        ) {
            $this->taskHeader('Task 5', "Generate an array of $count with values ($min-$max), sort it by amount of divisible numbers within values");

            $numbers = [];
            for ($i = 0; $i < $count; $i++) { 
                $number = rand($min, $max);
                $count_dividers = 0;
                for ($j = 2; $j < $number; $j++) { 
                    if ($number % $j === 0) $count_dividers++;
                }
                array_push($numbers, ['value' => $number, 'count' => $count_dividers]);
            }

            uasort($numbers, function($a, $b) {
                $result = $a['count'] <=> $b['count'];
                if ($result === 0) {
                    if ($a <=> $b) {
                        return 1;
                    } else return $result;
                } else return $result;
            });

            $string = '';
            foreach ($numbers as &$number) {
                $string .= ' ' . $number['value'] . '-(' . $number['count'] . ')';
            }
            unset($number);  

            echo " $string </br> ";
        }

        # task 6

        function checkPrime(int $number){ 
            if ($number === 1) return false; 
            for ($i = 2; $i <= sqrt($number); $i++){ 
                if ($number % $i === 0) return false; 
            } 
            return true;
        } 

        function taskSixFunc(
            int $count = 0,
            int $min = 0,
            int $max = 0
        ) {
            $this->taskHeader('Task 6', "Generate an array of $count with values ($min-$max), filter out all primary numbers (and sort)");

            $numbers = [];
            for ($i = 0; $i < $count; $i++) { 
                array_push($numbers, rand($min, $max));
            }
            uasort($numbers, function($a, $b) {
                return $a <=> $b;
            });
            $original = join(' ', $numbers);
            echo " original array:</br> $original </br></br> ";

            $filtered_numbers = [];
            foreach ($numbers as &$number) {
                if ($this->checkPrime($number)) array_push($filtered_numbers, $number);
            }
            unset($number); 
            $filtered = join(' ', $filtered_numbers);
            echo " filtered array:</br> $filtered </br> ";
        }

        # task 7

        function taskSevenFunc(
            int $count_min = 0,
            int $count_max = 0,
            int $value_min = 0,
            int $value_max = 0,
            int $repeat_min = 0,
            int $repeat_max = 0,
            int $final_value = 0
        ) {
            $this->taskHeader('Task 7', "Generate array of ($count_min-$count_max) with values of ($value_min-$value_max), last element is using same formulae - repeat it for ($repeat_min-$repeat_max) times; final element is $final_value");

            //
            ##############
            echo "  </br> ";
        }

        # task 8

        function taskEightFunc() {
            $this->taskHeader('Task 8', "");

            //
            ##############
            echo "  </br> ";
        }

        // Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą.

        # task 9

        function taskNineFunc() {
            $this->taskHeader('Task 9', "");

            //
            ###########
            echo "  </br> ";

            $primaries = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31];
            print('<pre>' . print_r($primaries, true) . '</pre>');
            $array = [];
            for ($i = 0; $i < 3; $i++) {
                $rand = rand(1, 33);
                array_push($array, $rand);
            }
            do {
                $input = false;
                for ($i = count($array) - 3; $i < count($array); $i++) {
                    foreach ($primaries as &$primary) {
                        if ($array[$i] === $primary) {
                            $input = true;
                            array_push($array, rand(1,33));
                        }
                    }
                }
                unset($number, $primary);
            } while ($input);
            print('<pre>' . print_r($array, true) . '</pre>');

        }

        // Sugeneruokite masyvą iš trijų elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 33. Jeigu tarp trijų paskutinių elementų yra nors vienas ne pirminis skaičius, prie masyvo pridėkite dar vieną elementą- atsitiktinį skaičių nuo 1 iki 33. Vėl patikrinkite pradinę sąlygą ir jeigu reikia pridėkite dar vieną elementą. Kartokite, kol sąlyga nereikalaus pridėti elemento. 

        # task 10

        function taskTenFunc() {
            $this->taskHeader('Task 10', "");

            //
            ##########
            echo "  </br> ";
        }

        // Sugeneruokite masyvą iš 10 elementų, kurie yra masyvai iš 10 elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 100. Jeigu tokio masyvo pirminių skaičių vidurkis mažesnis už 70, suraskite masyve mažiausią skaičių (nebūtinai pirminį) ir prie jo pridėkite 3. Vėl paskaičiuokite masyvo pirminių skaičių vidurkį ir jeigu mažesnis nei 70 viską kartokite.

        # task 11

        private $number_count = 0;
        private $sum = 0;
        private $height = 0;
        private $id = 0;
        private $level = 0;
        private $html = '';

        function generateArray(
            int $count = 0,
            int $min_internal = 0,
            int $max_internal = 0,
            int $min_percent = 0,
            int $max_percent = 0,
            int $min_value = 0,
            int $max_value = 0
        ) {
            $array = [];
            $count = rand($min_internal, $max_internal);
            $int_count = (int) (rand($min_percent, $max_percent) * $count) / 100;
            for ($i = 0; $i < $count; $i++) {
                if ($i < $int_count) {
                    array_push($array, rand($min_value, $max_value));
                } else {
                    array_push($array, $this->generateArray($count, $min_internal, $max_internal, $min_percent, $max_percent, $min_value, $max_value));
                }
            }
            return $array;
        }

        function traverseArray(
            array $array = [],
            int $level = 0
        ) {
            $this->id++;
            $level++;
            $this->html .= '<div id="' . $this->id . '" style="background-color:rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ');margin-left:' . ($level * 20) . 'px;display: table">';
            $this->html .= "($this->id)&nbsp;";
            foreach ($array as &$node) {
                if (is_array($node)) {
                    $this->traverseArray($node, $level);
                } else {
                    $this->number_count++;
                    $this->sum += $node;
                    $this->html .= $node . '&nbsp;';
                }
            }
            unset($node);
            $this->html .= "</div>";
            if ($level > $this->level) $this->level = $level;
        }
        
        function taskSpecialFunc(
            int $min_length = 0,
            int $max_length = 0,
            int $min_internal = 0,
            int $max_internal = 0,
            int $min_percent = 0,
            int $max_percent = 0,
            int $min_value = 0,
            int $max_value = 0
        ) {
            $this->taskHeader('Task 11', "Generate an irregular tree with numbers as children: </br>
                1) generate an array of ($min_length-$max_length); </br>
                2) every element is a combination of numbers (%:$min_percent-$max_percent, values:$min_value-$max_value) and arrays (remainder) of total count ($min_internal-$max_internal); </br>
                3) count all numbers that were added; </br>
                4) count sum all numbers; </br>
                5) count max levels; </br>
                6) put all sub-arrays in divs; </br>
                7) give id's to divs; </br>
                8) color those divs; </br>
                9) display entire tree; </br>
            ");

            $count = rand($min_length, $max_length);
            $array = [];
            for ($i = 0; $i < $count; $i++) {
                array_push($array, $this->generateArray($count, $min_internal, $max_internal, $min_percent, $max_percent, $min_value, $max_value));
            }

            $this->number_count = $this->sum = $this->level = $this->id = 0;
            $this->html = '';
            $this->traverseArray($array, 0);

            echo " total count is: $this->number_count </br>";
            echo " total sum is: $this->sum </br>";
            echo " total level is: $this->level </br>";
            echo " total id count is: $this->id </br>";
            echo " $this->html </br>";
            print('<pre>' . print_r($array, true) . '</pre>');
        }

    }
  
    $session = new SessionSix;
