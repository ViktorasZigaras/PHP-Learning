<?php
    # launch url: http://localhost/PHP-Learning/part_3.php

    class SessionThree {

        function __construct() {
            echo "  </br> Viktoras Zigaras - Session 1 - Part 3  </br></br> ";
            $this->taskOneFunc(400, 50);
            $this->taskTwoFunc(300, 0, 300, 150, 275);
            $this->taskThreeFunc(1, 3000, 77);
            $this->taskFourFunc(100);
            $this->taskFiveFunc(100);
            $this->taskSixFunc();
            $this->taskSevenFunc(222, 10, 20, 5, 25);
            $this->taskEightFunc(21);
            $this->taskNineFunc(10000000);
            $this->taskTenFunc(5, 8500, 5, 20, 20, 30);
            $this->taskSpecialFunc(50, 1, 200);
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
            int $number_count = 0, 
            int $line_count = 50
        ) {
            $this->taskHeader('Task 1', "Generate $number_count asterisks, 1) use css to stop them from overflowing 2) and then break them into lines of 50");

            # part 1
            $html = '<div style="width:100%;word-break:break-all">';
            for ($i = 0; $i < $number_count; $i++) {
                $html .= '*';
            }
            $html .= '</div>';
            echo " $html </br> ";

            # part 2
            $iteration_count = $number_count / $line_count;
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

        function taskTwoFunc(
            int $number_count = 0, 
            int $min = 0, 
            int $max = 0, 
            int $count_over = 0, 
            int $color_red_at = 0
        ) {
            $this->taskHeader('Task 2', "Generate $number_count random numbers, print all separated, count all numbers above 150, all numbers above 275 must be colored red");

            $numbers = [];
            for ($i = 0; $i < $number_count; $i++) {
                array_push($numbers, rand($min, $max));
            }

            $count = 0;
            $html = '<div style="width:100%;display:flex;flex-wrap:wrap">';
            foreach($numbers as &$number) {
                $html .= '<div ' . (($number > $color_red_at) ? 'style="color:red">' : '>') . $number . '</div>&nbsp;';
                if ($number > $count_over) $count++;
            }
            unset($number);
            $html .= '</div>';

            echo " $html </br> ";
            echo " count over $count_over: $count </br> ";
        }

        # task 3

        function taskThreeFunc(
            int $min = 0, 
            int $max = 0, 
            int $criteria = 0
        ) {
            $this->taskHeader('Task 3', "Display all numbers between $min and $max that are divisable by $criteria, divide by commas except the last number in line");

            $numbers = [];
            for ($i = $min; $i < $max; $i++) {
                if ($i % $criteria === 0) array_push($numbers, $i);
            }
            $html = '<div style="width:100%; word-break:break-all">';
            foreach($numbers as &$number) {
                $html .= "$number, ";
            }
            unset($number);
            $html = substr($html, 0, strlen($html) - 2) . '</div>';

            echo " $html </br> ";
        }

        # task 4

        function taskFourFunc(
            int $count = 0
        ) {
            $this->taskHeader('Task 4', "Generate $count asterisks and make them form a square using css");

            $lenght = sqrt($count);
            if (floor($lenght) != $lenght) {
                echo " Need a certain number that can form a square </br> ";
                return;
            }
            $standart_width = 20;
            $width = $lenght * $standart_width;
            $html = '<div style="width:' . $width . 'px;font-size:20px;display:flex;flex-wrap:wrap">';
            for ($i = 0; $i < $count; $i++) {
                $html .= '<div style="width:' . $standart_width . 'px">*</div>';
            }
            $html .= '</div>';

            echo " $html </br> ";
        }

        # task 5

        function taskFiveFunc(
            int $count = 0
        ) {
            $this->taskHeader('Task 5', 'Color cross section of previous "square" red');

            $lenght = sqrt($count);
            if (floor($lenght) != $lenght) {
                echo " Need a certain number that can form a square </br> ";
                return;
            }
            $offset = 0;
            $criteria = $lenght - 1;
            $standart_width = 20;
            $width = $lenght * $standart_width;
            $html = '<div style="width:' . $width . 'px;font-size:20px;display:flex;flex-wrap:wrap">';
            for ($i = 0; $i < $count; $i++) {
                $html .= '<div style="width:' . $standart_width . 'px' . (($i % $lenght == $offset || $i % $lenght == ($criteria - $offset)) ? ';color:red">' : '">') . '*</div>';
                if ($i % $lenght == $criteria) $offset++;
            }
            $html .= '</div>';

            echo " $html </br> ";
        }

        # task 6

        function taskSixFunc() {
            $this->taskHeader('Task 6', 'Throw coin (0-H/1-S) until - 1) head is rolled, 2) head is rolled three times total, 3) head is rolled three times in a row');

            $min = 0;
            $max = 1;
            $head = 0;
            $tail = 1;
            $head_string = 'H';
            $tail_string = 'S';

            # part 1
            $string = '';
            do {
                $throw = rand($min, $max);
                if ($throw === $head) {
                    $run = false;
                    $string .= "$head_string ";
                } else {
                    $run = true;
                    $string .= "$tail_string ";
                }
            } while ($run);
            echo " sequence: $string </br> ";

            # part 2
            $string = '';
            $counter = 0;
            do {
                $run = true;
                $throw = rand($min, $max);
                if ($throw === $head) {
                    $string .= "$head_string ";
                    if (++$counter === 3) $run = false;
                } else {
                    $string .= "$tail_string ";
                }
            } while ($run);
            echo " sequence: $string </br> ";

            # part 3
            $string = '';
            $counter = 0;
            do {
                $run = true;
                $throw = rand($min, $max);
                if ($throw === $head) {
                    $string .= "$head_string ";
                    if (++$counter === 3) $run = false;
                } else {
                    $string .= "$tail_string ";
                    $counter = 0;
                }
            } while ($run);
            echo " sequence: $string </br> ";
        }

        # task 7

        function taskSevenFunc(
            int $end_points = 1, 
            int $player_one_min = 0, 
            int $player_one_max = 0, 
            int $player_two_min = 0, 
            int $player_two_max = 0
        ) {
            $this->taskHeader('Task 7', "One player rolls $player_one_min-$player_one_max, another $player_two_min-$player_two_max, repeat rounds until one player collects $end_points points first");

            $player_one_points = 0;
            $player_two_points = 0;
            $player_one_name = 'Kazys';
            $player_two_name = 'Petras';
            $turn_winner = '';
            $winner = '';
            $points = 0;
            $counter = 0;
            do {
                $player_one_increment = rand($player_one_min, $player_one_max);
                $player_two_increment = rand($player_two_min, $player_two_max);
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

        function taskEightFunc(
            int $heigth = 0
        ) {
            $this->taskHeader('Task 8', "Draw a filled 'diamond' of $heigth rows height, color every asterisk randomly");

            if ($heigth < 1 || $heigth % 2 === 0) {
                echo " Need an odd height number above 0 </br> ";
                return;
            }
            $configuration = 1; # 1 is for slim diamond, 2 for symetric diamond but &nbsp; needs to be replaced by something like '~'
            $mid_height = ceil($heigth / 2); 
            $next_length = 1;
            $offset = 1;
            $rhombus = '<div style="line-height: 10px;">';
            for($i = 1; $i <= $heigth; $i++){
                for($j = 0; $j < $next_length; $j++){
                    if ($j == 0) $rhombus .= str_repeat("&nbsp;", $mid_height - $offset);
                    $rhombus .= '<span style="color:rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ')">*</span>';
                }
                $rhombus .= "<br>";
                if ($i < $mid_height) {
                    $next_length += $configuration;
                    $offset++;
                } else {
                    $next_length -= $configuration;
                    $offset--;
                }
            }
            $rhombus .= '</div>';

            echo " $rhombus </br> ";
        }

        # task 9

        function formatMiliseconds(
            float $time = 0
        ) {
            return number_format($time * 1000, 0) . ' ms';
        }

        function taskNineFunc(
            int $count = 0
        ) {
            $this->taskHeader('Task 9', "Run two identical strings with different notation $count times to compare");

            $start_time = microtime(true);
            for ($i = 1; $i <= $count; $i++) {
                $c = "10 bezdzioniu suvalge 20 bananu.";
            }
            $end_time = microtime(true);
            $total_time_first = $end_time - $start_time;

            $start_time = microtime(true);
            for ($i = 1; $i <= $count; $i++) {
                $c = '10 bezdzioniu suvalge 20 bananu.';
            }
            $end_time = microtime(true);
            $total_time_second = $end_time - $start_time;

            $total_time_difference = abs($total_time_first - $total_time_second);

            $total_time_first = $this->formatMiliseconds($total_time_first);
            $total_time_second = $this->formatMiliseconds($total_time_second);
            $total_time_difference = $this->formatMiliseconds($total_time_difference);

            echo " First: $total_time_first, Second: $total_time_second, Total difference: $total_time_difference </br> ";
        }

        # task 10

        function taskTenFunc(
            int $runs = 0, 
            int $nail_lenght = 0, 
            int $light_min = 0, 
            int $light_max = 0, 
            int $heavy_min = 0, 
            int $heavy_max = 0
        ) {
            $this->taskHeader('Task 10', "Hit the nail a certain random amount; nail is $nail_lenght (mm) long; 1) insert $runs nails with small hits, 2) insert $runs nails with heavy hits (possible misses)");

            # part 1
            $count = 0;
            for ($i = 0; $i < $runs; $i++) {
                $current_nail = $nail_lenght;
                while ($current_nail > 0) {
                    $current_nail -= rand($light_min, $light_max);
                    $count++;
                }
            }
            echo " hits taken (light): $count </br> ";

            # part 2
            $count = 0;
            for ($i = 0; $i < $runs; $i++) {
                $current_nail = $nail_lenght;
                while ($current_nail > 0) {
                    if (rand(0, 1) !== 0) $current_nail -= rand($heavy_min, $heavy_max);
                    $count++;
                }
            }
            echo " hits taken (heavy): $count </br> ";
        }

        # task 11

        # mathematics borrowed from internet
        function checkPrime(int $number){ 
            if ($number === 1) return false; 
            for ($i = 2; $i <= sqrt($number); $i++){ 
                if ($number % $i === 0) return false; 
            } 
            return true;
        } 

        function taskSpecialFunc(
            int $count = 0, 
            int $min = 0, 
            int $max = 0
        ) {
            $this->taskHeader('Task 11', "Generate a string of $count random numbers (separated, sorted), each number has to be unique; filter numbers from previous sequence to leave primary numbers only");

            # random numbers
            $numbers = [];
            while (count($numbers) < $count) {
                array_push($numbers, rand($min, $max));
                $numbers = array_unique($numbers);
            }
            sort($numbers);
            $string = join(' ', $numbers);
            echo " random numbers: $string </br> ";

            # prime random numbers
            $prime_numbers = [];
            foreach($numbers as &$number) {
                if ($this->checkPrime($number)) array_push($prime_numbers, $number);
            }
            unset($number);
            $string = join(' ', $prime_numbers);
            echo " prime random numbers: $string </br> ";
        }

    }
  
    $session = new SessionThree;