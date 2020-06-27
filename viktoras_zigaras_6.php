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
            $snake_array = $this->taskSevenFunc(2, 5, 0, 10, 3, 6, 0);
            $this->taskEightFunc($snake_array);
            $this->taskNineFunc(3, 3, 1, 33);
            $this->taskTenFunc(10, 10, 1, 100, 70, 3);
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

        function checkPrime(
            int $number = 0
        ) { 
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

        function generateSnakeArray(
            int $count_min = 0,
            int $count_max = 0,
            int $value_min = 0,
            int $value_max = 0,
            int $final_value = 0,
            int $repeat_count = 0
        ) {
            $inner_array = [];
            $count = rand($count_min, $count_max) - 1;
            for ($i = 0; $i < $count; $i++) {
                array_push($inner_array, rand($value_min, $value_max));
            }
            if ($repeat_count > 0) {
                array_push($inner_array, $this->generateSnakeArray($count_min, $count_max, $value_min, $value_max, $final_value, $repeat_count - 1));
            } else {
                array_push($inner_array, $final_value);
            }
            return $inner_array;
        }

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

            $snake_array = [];
            $repeat_count = rand($repeat_min, $repeat_max);
            array_push($snake_array, $this->generateSnakeArray($count_min, $count_max, $value_min, $value_max, $final_value, $repeat_count - 1));

            print('<pre>' . print_r($snake_array, true) . '</pre>');
            return $snake_array;
        }

        # task 8

        function traverseSnakeArray(
            array $array = [],
            int $sum = 0
        ) {
            foreach ($array as &$node) {
                if (is_array($node)) {
                    $sum = $this->traverseSnakeArray($node, $sum);
                } else {
                    $sum += $node;
                }
            }
            unset($node);
            
            return $sum;
        }

        function taskEightFunc(
            array $snake_array = []
        ) {
            $this->taskHeader('Task 8', "Sum all numbers from previous array");

            $sum = $this->traverseSnakeArray($snake_array, 0);

            echo " sum is: $sum </br> ";
        }

        # task 9

        function taskNineFunc(
            int $count = 0,
            int $count_last = 0,
            int $min = 0,
            int $max = 0
        ) {
            $this->taskHeader('Task 9', "Generate array of $count with values ($min-$max), check last $count_last values for primary numbers and if found, add another value to the array");

            $array = [];
            for ($i = 0; $i < $count; $i++) {
                array_push($array, rand($min, $max));
            }
            do {
                $add = false;
                # it is assumed that indexes are integer in ascending order
                for ($i = count($array) - $count_last; $i < count($array); $i++) {
                    if ($this->checkPrime($array[$i])) {
                        $add = true;
                        array_push($array, rand($min, $max));
                    }
                }
            } while ($add);

            print('<pre>' . print_r($array, true) . '</pre>');
        }

        # task 10

        function taskTenFunc(
            int $row_count = 0,
            int $col_count = 0,
            int $min = 0,
            int $max = 0,
            int $avg = 0,
            int $add_value = 0
        ) {
            $this->taskHeader('Task 10', "Generate array of ($row_count x $col_count) with values ($min-$max), while average of primary numbers is below int $avg, add $add_value to lowest existing value");

            $numbers = [];
            for ($i = 0; $i < $row_count; $i++) {
                $inner_numbers = [];
                for ($j = 0; $j < $col_count; $j++) {
                    array_push($inner_numbers, rand($min, $max));
                }
                array_push($numbers, $inner_numbers);
            }

            $iterations = 0;
            do {
                $iterations++;
                $primary_sum = 0;
                $primary_count = 0;
                $min_value = 0;
                $continue = false;
                foreach ($numbers as &$array) {
                    foreach ($array as &$number) {
                        if ($min_value === 0 || $number < $min_value) {
                            $min_value = $number;
                        }
                        if ($this->checkPrime($number)) {
                            $primary_count++;
                            $primary_sum += $number;
                        }
                    }
                }
                unset($array, $number);
                $primary_avg = $primary_sum / $primary_count;
                if ($primary_avg < $avg) {
                    $continue = true;
                    foreach ($numbers as &$array) {
                        foreach ($array as &$number) {
                            if ($number === $min_value) {
                                $number += $add_value;
                                break 2;
                            }
                        }
                    }
                    unset($array, $number);
                }
            } while($continue);
            
            echo " total average is: $primary_avg, increased $iterations times </br> ";

            print('<pre>' . print_r($numbers, true) . '</pre>');
        }

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
