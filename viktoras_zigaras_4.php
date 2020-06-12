<?php
    # launch url: http://localhost/PHP-Learning/viktoras_zigaras_4.php

    class SessionFour {

        function __construct() {
            echo "  </br> Viktoras Zigaras - Session 1 - Part 4  </br></br> ";
            $letter_count = 200;
            $letters = ['A', 'B', 'C', 'D'];
            # passing functions to functions VS saving values in class variables or otherwise are all debatable strategies here - highly dependent on imagined project business logic and overall app architecture, meaning, there are many ways to achieve what I've done here
            $this->taskTwoFunc($this->taskOneFunc(30, 5, 25), 10, 10, 5, 25, 0, 15, 10);
            $this->taskFourFunc($this->taskThreeFunc($letter_count, $letters));
            $this->taskFiveFunc(3, $letter_count, $letters);
            $this->taskSixFunc(2, 100, 100, 999);
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

        // function generateNumberArray(int $count = 0, int $min = 0, int $max = 0) {
        //     $numbers = [];
        //     for ($i = 0; $i < $count; $i++) {
        //         array_push($numbers, rand($min, $max));
        //     }
        //     return $numbers;
        // }

        function taskOneFunc(
            int $count = 0, 
            int $min = 0, 
            int $max = 0
        ) {
            $this->taskHeader('Task 1', "Generate $count numbers ($min, $max)");

            // $numbers = $this->generateNumberArray($count, $min, $max);
            $numbers = [];
            for ($i = 0; $i < $count; $i++) {
                array_push($numbers, rand($min, $max));
            }
            $array = join(' ', $numbers);

            echo " numbers: $array </br> ";

            return $numbers;
        } 

        # task 2

        function taskTwoFunc(
            array $numbers = [], 
            int $compare_value = 0, 
            int $add_count = 0, 
            int $add_min = 0, 
            int $add_max = 0, 
            int $replace_compare_value = 0, 
            int $replace_compare = 0, 
            int $index_compare = 0
        ) {
            $this->taskHeader('Task 2', "Using number array from previous task: </br>
                1) count all numbers above $compare_value; </br>
                2) find largest number; </br>
                3) find sum of all values; </br>
                4) make a new array with modified values by deducting the index of original value; </br>
                5) add $add_count more numbers ($add_min, $add_max); </br>
                6) split into odd and even index arrays; </br>
                7) turn numbers into $replace_compare_value if those numbers are larger than $replace_compare; </br>
                8) find the first occurence of a number that is larger than $index_compare; </br>
                9) remove all numbers ar even index; </br>
            ");

            $compare_count = 0;
            $sum = 0;
            $indexed_array = [];
            $even_array = [];
            $odd_array = [];
            $compared_array = $numbers;
            $removed_array = $numbers;
            $index_compare_location = 0;
            $index_compare_location_set = false;
            foreach ($numbers as $index=>&$number) {
                # 1
                if ($number > $compare_value) $compare_count++;
                # 2
                if ($index === 0 || $number > $max_number) {
                    $max_number = $number;
                }
                # 3
                $sum += $number;
                # 4
                array_push($indexed_array, $number - $index);
                # 6
                if ($index % 2 === 0) {
                    array_push($even_array, $number);
                } else {
                    array_push($odd_array, $number);
                }
                # 7
                if ($index % 2 === 0 && $number > $replace_compare) {
                    $compared_array[$index] = $replace_compare_value;
                }
                # 8
                if (!$index_compare_location_set && $number > $index_compare) {
                    $index_compare_location = $index;
                    $index_compare_location_set = true;
                }
                # 9
                if ($index % 2 === 0) unset($removed_array[$index]);
            }
            unset($number);
            $indexed_string = join(' ', $indexed_array);
            $even_string = join(' ', $even_array);
            $odd_string = join(' ', $odd_array);
            $compared_string = join(' ', $compared_array);
            $removed_string = join(' ', $removed_array);
            
            # 5
            $increased_array = $numbers;
            for ($i = 0; $i < $add_count; $i++) {
                array_push($increased_array, rand($add_min, $add_max));
            }
            $increased_string = join(' ', $increased_array);

            echo " 1) numbers above $compare_value: $compare_count </br> ";
            echo " 2) largest number: $max_number </br> ";
            echo " 3) sum of all numbers: $sum </br> ";
            echo " 4) modified array: $indexed_string </br> ";
            echo " 5) increased array: $increased_string </br> ";
            echo " 6) even index array: $even_string; odd index array: $odd_string </br> ";
            echo " 7) compared array: $compared_string </br> ";
            echo " 8) first compared number is at: $index_compare_location </br> ";
            echo " 9) array with even positions removed: $removed_string </br> ";
        }

        # task 3

        function generateLetterArray(
            int $count = 0, 
            array $values = []
        ) {
            $letters = [];
            $no_of_letters_index = count($values) - 1;
            for ($i = 0; $i < $count; $i++) {
                array_push($letters, $values[rand(0, $no_of_letters_index)]);
            }
            return $letters;
        }

        function taskThreeFunc(
            int $count = 0, 
            array $values = []
        ) {
            $letters_values = '[ ' . join(' ', $values) . ' ]';
            $this->taskHeader('Task 3', "Generate $count letters from $letters_values and count occurences of each letter");

            $letters = $this->generateLetterArray($count, $values);
            $counts = [];
            $no_of_letters = count($values);
            for ($i = 0; $i < $no_of_letters; $i++) {
                array_push($counts, 0);
            }
            foreach ($letters as $index=>&$letter) {
                for ($j = 0; $j < $no_of_letters; $j++) {
                    if ($letter === $values[$j]) {
                        $counts[$j]++;
                        break;
                    }
                }
            }
            unset($letter);
            $letters_string = join(' ', $letters);
            $count_string = '[ ' . join(' ', $counts) . ' ]';

            echo " all letters:</br> $letters_string </br> ";
            echo " $letters_values: $count_string </br> ";

            return $letters;
        }

        # task 4

        function sortArray(
            array $array = [], 
            int $direction = 1
        ) {
            do {
                $offset = 0;
                $run = false;
                for ($i = $offset; $i < count($array) - 1; $i++) {
                    $current = $array[$i];
                    $next = $array[$i + 1];
                    if (($current <=> $next) === $direction) {
                        $array[$i] = $next;
                        $array[$i + 1] = $current;
                        $run = true;
                    }
                }
                $offset++;
            } while ($run);
            return join(' ', $array);
        }

        function taskFourFunc(
            array $letters = []
        ) {
            $this->taskHeader('Task 4', 'Sort previous array in ascending order');

            $sorted_array = $this->sortArray($letters, 1);

            echo " sorted array:</br> $sorted_array </br> ";
        }

        # task 5
        
        function taskFiveFunc(
            int $count = 0, 
            int $letter_count = 0, 
            array $values = []
        ) {
            $this->taskHeader('Task 5', "Generate $count letter arrays, add all of them in words, count unique variations");

            $arrays = [];
            $joined_array = [];
            for ($i = 0; $i < $count; $i++) {
                array_push($arrays, $this->generateLetterArray($letter_count, $values));
                echo 'array at ' . $i . ': </br>' . join(' ', $arrays[$i]) . '</br>';
            }
            for ($i = 0; $i < $letter_count; $i++) {
                $word = '';
                for ($j = 0; $j < $count; $j++) {
                    $word .= $arrays[$j][$i];
                }
                $word .= ' ';
                array_push($joined_array, $word);
            }
            $words = join($joined_array);
            $unique_words = count(array_unique($joined_array));

            echo " all words:</br> $words </br> ";
            echo " unique words: $unique_words </br> ";
        }

        # task 6

        function generateUniqueNumberArray(
            int $number_count = 0, 
            int $min = 0, 
            int $max = 0
        ) {
            $numbers = [];
            while (count($numbers) < $number_count) {
                array_push($numbers, rand($min, $max));
                $numbers = array_unique($numbers);
            }
            return $numbers;
        }

        function generateUniqueNumberArrays(
            int $array_count = 0, 
            int $number_count = 0, 
            int $min = 0, 
            int $max = 0
        ) {
            $number_array = [];
            for ($i = 0; $i < $array_count; $i++) {
                array_push($number_array, $this->generateUniqueNumberArray($number_count, $min, $max));
            }
            return $number_array;
        }

        private $numbers_array = [];

        function taskSixFunc(
            int $array_count = 0, 
            int $number_count = 0, 
            int $min = 0, 
            int $max = 0
        ) {
            $this->taskHeader('Task 6', "Generate $array_count arrays, $number_count long, values being ($min-$max); all values must be unique");

            $this->numbers_array = $this->generateUniqueNumberArrays($array_count, $number_count, $min, $max);

            foreach ($this->numbers_array as $array_index=>&$array) {
                echo 'array at ' . $array_index . ':</br> ' . join(' ', $array) . '</br>';
            }
            unset($array);
        }

        # task 7

        function taskSevenFunc() {
            $this->taskHeader('Task 7', "Use previous data structure and filter values that are in the first array but not in the second");

            if (count($this->numbers_array) < 2) {
                echo "At least two arrays are needed, generated with previous functions!";
                return;
            }

            $filtered_array = [];
            foreach ($this->numbers_array[0] as &$number) {
                if (!in_array($number, $this->numbers_array[1])) array_push($filtered_array, $number);
            }
            unset($number);
            $string = join(' ', $filtered_array);

            echo " filtered array:</br> $string </br> ";
        }

        # task 8

        function taskEightFunc() {
            $this->taskHeader('Task 8', "Use previous data structure and filter values that are present in both arrays");

            if (count($this->numbers_array) < 2) {
                echo "At least two arrays are needed, generated with previous functions!";
                return;
            }

            # it is possible that one array's indexes won't be the same as the other's!
            $filtered_array = [];
            foreach ($this->numbers_array[0] as &$number) {
                if (in_array($number, $this->numbers_array[1])) array_push($filtered_array, $number);
            }
            unset($number);
            $string = join(' ', $filtered_array);

            echo " filtered array:</br> $string </br> ";
        }

        # task 9

        function taskNineFunc() {
            $this->taskHeader('Task 9', "Use previous data structure to assign indexes from first and values from second arrays");

            if (count($this->numbers_array) < 2) {
                echo "At least two arrays are needed, generated with previous functions!";
                return;
            }

            # it is possible that one array's indexes won't be the same as the other's!
            $altered_array = [];
            $string = '';
            foreach ($this->numbers_array[0] as $index=>&$number) {
                $value = $this->numbers_array[1][$index];
                $altered_array[$number] = $value;
                $string .= '[' . $number . ']->' . $value . ' ';
            }
            unset($number);

            echo " filtered array:</br> $string </br> ";
        }

        # task 10

        function taskTenFunc() {
            $this->taskHeader('Task 10', "");

            //

            echo "  </br> ";
        }

        // Sugeneruokite 10 skaičių masyvą pagal taisyklę: Du pirmi skaičiai- atsitiktiniai nuo 5 iki 25. Trečias, pirmo ir antro suma. Ketvirtas- antro ir trečio suma. Penktas trečio ir ketvirto suma ir t.t.

        # task 11
        function taskSpecialFunc() {
            $this->taskHeader('Task 11', "");

            //

            echo "  </br> ";
        }

        // Sugeneruokite 101 elemento masyvą su atsitiktiniais skaičiais nuo 0 iki 300. Reikšmes kurios tame masyve yra ne unikalios pergeneruokite iš naujo taip, kad visos reikšmės masyve būtų unikalios. Išrūšiuokite masyvą taip, kad jo didžiausia reikšmė būtų masyvo viduryje, o einant nuo jos link masyvo pradžios ir pabaigos reikšmės mažėtų. Paskaičiuokite pirmos ir antros masyvo dalies sumas (neskaičiuojant vidurinės). Jeigu sumų skirtumas (modulis, absoliutus dydis) yra didesnis nei | 30 | rūšiavimą kartokite. (Kad sumos nesiskirtų viena nuo kitos daugiau nei per 30)

    }
  
    $session = new SessionFour;