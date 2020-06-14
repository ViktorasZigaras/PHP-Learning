<?php
    # launch url: http://localhost/PHP-Learning/viktoras_zigaras_5.php

    class SessionFive {

        function __construct() {
            echo "  </br> Viktoras Zigaras - Session 1 - Part 5  </br></br> ";
            $arrays_of_numbers = $this->taskOneFunc(10, 5, 5, 25);
            $this->taskTwoFunc($arrays_of_numbers, 10, 2, 5, 25);
            $letters = range('A', 'Z');
            $arrays_of_letters = $this->taskThreeFunc(10, 2, 20, $letters);
            $this->taskFourFunc($arrays_of_letters);
            $arrays_of_objects = $this->taskFiveFunc(30, 1, 1000000, 0, 100);
            $this->taskSixFunc($arrays_of_objects);
            $this->taskSevenFunc($arrays_of_objects,  $letters, 5, 15);
            $arrays_of_numbers = $this->taskEightFunc(10, 0, 5, 0, 10, 0, 10);
            $this->taskNineFunc($arrays_of_numbers);
            $this->taskTenFunc(['#', '%', '+', '*', '@'], 10, 10);
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

            $arrays_of_numbers = [];
            for ($i = 0; $i < $count; $i++) {
                $internal_array = [];
                for ($j = 0; $j < $sub_count; $j++) {
                    array_push($internal_array, rand($min, $max));
                }
                echo 'index of ' . $i . ': ' . join(' ', $internal_array) . '</br>';
                array_push($arrays_of_numbers, $internal_array);
            }

            return $arrays_of_numbers;
        } 

        # task 2

        function taskTwoFunc(
            array $arrays_of_numbers = [],
            int $compare_above = 0,
            int $add_count = 0,
            int $min = 0,
            int $max = 0
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
            foreach ($arrays_of_numbers as $index=>&$array) {
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
            foreach ($arrays_of_numbers as $index=>&$array) {
                for ($i = 0; $i < $add_count; $i++) {
                    array_push($array, rand($min, $max));
                }
                echo '4) index of ' . $index . ': ' . join(' ', $array) . '</br>';
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

        function taskThreeFunc(
            int $count = 0,
            int $min = 0,
            int $max = 0,
            array $letters = []
        ) {
            $letters_values = '[ ' . join(' ', $letters) . ' ]';
            $this->taskHeader('Task 3', "Generate a $count long array, every element of it has to be ($min-$max) long and have values ($letters_values); sort the arrays in ascending order");

            $arrays_of_letters = [];
            for ($i = 0; $i < $count; $i++) {
                $internal_array = [];
                for ($j = 0; $j < rand($min, $max); $j++) {
                    array_push($internal_array, $letters[array_rand($letters)]);
                }
                sort($internal_array);
                echo 'index of ' . $i . ': ' . join(' ', $internal_array) . '</br>';
                array_push($arrays_of_letters, $internal_array);
            }

            return $arrays_of_letters;
        }

        # task 4

        function taskFourFunc(
            array $arrays_of_letters = []
        ) {
            $this->taskHeader('Task 4', "Sort previous array by length of sub-arrays");

            uasort($arrays_of_letters, function($a, $b) {
                return -(count($b) <=> count($a));
            });

            foreach ($arrays_of_letters as $index=>&$array) {
                echo 'index of ' . $index . ': ' . join(' ', $array) . '</br>';
            }
            unset($array);
        }

        # task 5

        function taskFiveFunc(
            int $count = 0,
            int $min_user = 0,
            int $max_user = 0,
            int $min_place = 0,
            int $max_place = 0
        ) {
            $this->taskHeader('Task 5', "Generate an array of $count, each element is object of [user_id => ($min_user-$max_user), place_in_row => ($min_place-$max_place)]");

            $arrays_of_objects = [];
            for ($i = 0; $i < $count; $i++) {
                array_push($arrays_of_objects, ['user_id' => rand($min_user, $max_user), 'place_in_row' => rand($min_place, $max_place)]);
            }

            foreach ($arrays_of_objects as $index=>&$array) {
                echo 'index of ' . $index . ': ' . $array['user_id'] . ' (' . $array['place_in_row'] . ')</br>';
            }
            unset($array);

            return $arrays_of_objects;
        } 

        # task 6

        function taskSixFunc(
            array $arrays_of_objects = []
        ) {
            $this->taskHeader('Task 6', "Sort previous array by user (ascending) and then place id's (descending)");

            uasort($arrays_of_objects, function($a, $b) {
                return -($b['user_id'] <=> $a['user_id']);
            });

            foreach ($arrays_of_objects as $index=>&$array) {
                echo 'index of ' . $index . ': ' . $array['user_id'] . ' (' . $array['place_in_row'] . ')</br>';
            }
            unset($array);

            echo "</br> ======================= </br></br>";

            uasort($arrays_of_objects, function($a, $b) {
                return $b['place_in_row'] <=> $a['place_in_row'];
            });

            foreach ($arrays_of_objects as $index=>&$array) {
                echo 'index of ' . $index . ': ' . $array['user_id'] . ' (' . $array['place_in_row'] . ')</br>';
            }
            unset($array);
        }

        # task 7

        function taskSevenFunc(
            array $arrays_of_objects = [],
            array $letters = [],
            int $min = 0,
            int $max = 0
        ) {
            $this->taskHeader('Task 7', "Expand previous array with [name, surname], use random strings from letters $min-$max long");

            foreach ($arrays_of_objects as $index=>&$array) {
                $name_string = '';
                for ($i = 0; $i < rand($min, $max); $i++) {
                    $name_string .= $letters[array_rand($letters)];
                }
                $array['name'] = $name_string;
                $surname_string = '';
                for ($i = 0; $i < rand($min, $max); $i++) {
                    $surname_string .= $letters[array_rand($letters)];
                }
                $array['surname'] = $surname_string;
            }
            unset($array);

            foreach ($arrays_of_objects as $index=>&$array) {
                echo 'index of ' . $index . ': ' . $array['name'] . ' ' . $array['surname'] . ' -> ' . $array['user_id'] . ' (' . $array['place_in_row'] . ')</br>';
            }
            unset($array);
        }

        # task 8

        function taskEightFunc(
            int $count = 0,
            int $min_length = 0,
            int $max_length = 0,
            int $min_main = 0,
            int $max_main = 0,
            int $min_extra = 0,
            int $max_extra = 0
        ) {
            $this->taskHeader('Task 8', "Generate array of $count, each element is a sub-array of ($min_length-$max_length) with values ($min_main-$max_main) and empty arrays have values ($min_extra-$max_extra)");

            $arrays_of_numbers = [];
            for ($i = 0; $i < $count; $i++) {
                $internal_array = [];
                for ($j = 0; $j < rand($min_length, $max_length); $j++) {
                    array_push($internal_array, rand($min_main, $max_main));
                }
                if (count($internal_array) === 0) array_push($internal_array, rand($min_extra, $max_extra));
                echo 'index of ' . $i . ': ' . join(' ', $internal_array) . '</br>';
                array_push($arrays_of_numbers, $internal_array);
            }

            return $arrays_of_numbers;
        }

        # task 9

        function taskNineFunc(
            array $arrays_of_numbers = []
        ) {
            $this->taskHeader('Task 9', "Calculate total sum of entire previous array and its sub-array sums, sort individual sums in ascending order");

            $sum_array = [];
            foreach ($arrays_of_numbers as &$array) {
                array_push($sum_array, array_sum($array));
            }
            unset($array);
            uasort($sum_array, function($a, $b) {
                return -($b <=> $a);
            });
            foreach ($sum_array as $index=>&$sum) {
                echo "sum of index $index: $sum </br>";
            }
            unset($sum);
            $total_sum = array_sum($sum_array);

            echo " total sum: $total_sum </br> ";
        }

        # task 10

        function taskTenFunc(
            array $symbols = [],
            int $x_count = 0,
            int $y_count = 0
        ) {
            $this->taskHeader('Task 10', "Create rectangle of $x_count x $y_count, each element has value  and color");

            # generate
            $symbol_array = [];
            for ($i = 0; $i < $x_count; $i++) {
                $internal_array = [];
                for ($j = 0; $j < $y_count; $j++) {
                    array_push($internal_array, [ 'value' => $symbols[array_rand($symbols)], 'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)) ]);
                }
                array_push($symbol_array, $internal_array);
            }

            # view
            $html = '';
            foreach ($symbol_array as &$array) {
                $html .= '<div>';
                foreach ($array as &$symbol) {
                    $html .= '<span style="color:' . $symbol['color'] . ';width:15px;display:inline-block">' . $symbol['value'] . '</span>';
                }
                $html .= '</div>';
            }
            unset($array, $symbol);

            echo "$html";
        }

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