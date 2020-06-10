<?php
    # launch url: http://localhost/PHP-Learning/viktoras_zigaras_1.php

    class SessionOne {

        function __construct() {
            echo "  </br> Viktoras Zigaras - Session 1 - Part 1  </br></br> ";
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
            $this->taskHeader('Task 1', 'Create 4 vars: name, surname, birth year and a given year; calculate age and output full info');

            $own_name = 'Viktoras';
            $own_surname = 'Zigaras';
            $birth_year = 1986;
            $given_year = 2020;
            $value = $given_year - $birth_year;

            echo " I am $own_name $own_surname. I am $value years old. </br> ";
        }

        # task 2
        function taskTwoFunc() {
            $this->taskHeader('Task 2', 'Generate two random numbers, choose bigger one and divide from smaller one, use two digits after comma format');

            $number_one = rand(0, 4);
            $number_two = rand(0, 4);
            $value = 0;
            if ($number_one >= 1 && $number_two >= 1) {
                $value = ($number_one >= $number_two) ? $number_one / $number_two : $number_two / $number_one;
            } 
            $value = number_format($value, 2, '.', '');

            echo " ($number_one, $number_two): $value </br> ";
        }

        # task 3
        function taskThreeFunc() {
            $this->taskHeader('Task 3', 'Generate three random numbers - choose the middle value between them');

            $number_one = rand(0, 25);
            $number_two = rand(0, 25);
            $number_three = rand(0, 25);

            $value = 'None are completely average.';
            if (
                ($number_one > $number_two && $number_one < $number_three) || 
                ($number_one > $number_three && $number_one < $number_two)
            ) {
                $value = $number_one;
            } elseif (
                ($number_two > $number_one && $number_two < $number_three) || 
                ($number_two > $number_three && $number_two < $number_one)
            ) {
                $value = $number_two;
            } elseif (
                ($number_three > $number_one && $number_three < $number_two) || 
                ($number_three > $number_two && $number_three < $number_one)
            ) {
                $value = $number_three;
            } 
            
            echo " ($number_one, $number_two, $number_three): $value </br> ";
        }

        # task 4
        function taskFourFunc() {
            $this->taskHeader('Task 4', 'Generate three random numbers - try to make a triangle out of them');

            $number_one = rand(1, 10);
            $number_two = rand(1, 10);
            $number_three = rand(1, 10);

            $value = (
                ($number_one + $number_two > $number_three) && 
                ($number_one + $number_three > $number_two) &&
                ($number_two + $number_three > $number_one)
            ) ? 'Triangle is possible' : 'Triangle is impossible';

            echo " ($number_one, $number_two, $number_three): $value </br> ";
        }

        # task 5
        function taskFiveFunc() {
            $this->taskHeader('Task 5', 'Generate four random numbers - list count of all value instances');

            // $number_one = rand(0, 2);
            // $number_two = rand(0, 2);
            // $number_three = rand(0, 2);
            // $number_four = rand(0, 2);
            $zero_count = 0;
            $one_count = 0;
            $two_count = 0;

            // $zero_count += ($number_one === 0) ? 1 : 0;
            // $zero_count += ($number_two === 0) ? 1 : 0;
            // $zero_count += ($number_three === 0) ? 1 : 0;
            // $zero_count += ($number_four === 0) ? 1 : 0;
            // $one_count += ($number_one === 1) ? 1 : 0;
            // $one_count += ($number_two === 1) ? 1 : 0;
            // $one_count += ($number_three === 1) ? 1 : 0;
            // $one_count += ($number_four === 1) ? 1 : 0;
            // $two_count += ($number_one === 2) ? 1 : 0;
            // $two_count += ($number_two === 2) ? 1 : 0;
            // $two_count += ($number_three === 2) ? 1 : 0;
            // $two_count += ($number_four === 2) ? 1 : 0;

            // echo " ($number_one, $number_two, $number_three, $number_four): 0x$zero_count, 1x$one_count, 2x$two_count </br> ";

            # alternative:
            $numbers = [rand(0, 2), rand(0, 2), rand(0, 2), rand(0, 2)];
            $all_numbers = join(' ', $numbers);
            foreach($numbers as &$number) {
                // ($number === 0) ? $zero_count++ : ($number === 1) ? $one_count++ : ($number === 2) ? $two_count++ : 'neither of those';
                $zero_count += ($number === 0) ? 1 : 0;
                $one_count += ($number === 1) ? 1 : 0;
                $two_count += ($number === 2) ? 1 : 0;
            }
            unset($number);
            
            echo " ($all_numbers): (0)x$zero_count, (1)x$one_count, (2)x$two_count </br> ";
        }

        # task 6
        function taskSixFunc() {
            $this->taskHeader('Task 6', 'Generate a random number and create a header of that size');

            $value = rand(1, 6);
            echo '<h' . $value . '>' . $value . '</h' . $value . '></br>';
        }

        # task 7
        function taskSevenFunc() {
            $this->taskHeader('Task 7', 'Generate three random numbers and color them based on value - negative (green), zero (red), positive (blue)');

            // $number_one = rand(-10, 10);
            // $number_two = rand(-10, 10);
            // $number_three = rand(-10, 10);
            $html = '<div style="display:flex">';
            // $color = ($number_one < 0) ? 'green' : (($number_one === 0) ? 'red' : (($number_one > 0) ? 'blue' : 'neither'));
            // $html .= '<div style="color:' . $color . '">' . $number_one . '/</div>';
            // $color = ($number_two < 0) ? 'green' : (($number_two === 0) ? 'red' : (($number_two > 0) ? 'blue' : 'neither'));
            // $html .= '<div style="color:' . $color . '">' . $number_two . '/</div>';
            // $color = ($number_three < 0) ? 'green' : (($number_three === 0) ? 'red' : (($number_three > 0) ? 'blue' : 'neither'));
            // $html .= '<div style="color:' . $color . '">' . $number_three . '</div>';
            // $html = $html . '</div>';

            # alternative:
            $numbers = [rand(-10, 10), rand(-10, 10), rand(-10, 10)];
            foreach($numbers as &$number) {
                $color = ($number < 0) ? 'green' : (($number === 0) ? 'red' : (($number > 0) ? 'blue' : 'neither'));
                $html .= '<div style="color:' . $color . '">' . $number . '/</div>';
            }
            $html .= '</div>';
            unset($number);

            echo $html;
        }

        # task 8
        function taskEightFunc() {
            $this->taskHeader('Task 8', 'Generate a random number of items bought and apply discounts at treshholds of 1K and 2K');

            $value = rand(5, 3000);
            $cost = 1;
            if ($value > 2000) $cost = 0.96; 
            elseif ($value > 1000) $cost = 0.97;
            $total = $value * $cost;
        
            echo " Quantity: $value, Cost: $cost, Total: $total </br> ";
        }

        # task 9
        function taskNineFunc() {
            $this->taskHeader('Task 9', 'Generate three random numbers and calculate total average and average of values 10-90, format to integer');

            // $number_one = rand(0, 100);
            // $number_two = rand(0, 100);
            // $number_three = rand(0, 100);
            // $total_average = number_format((($number_one + $number_two + $number_three) / 3), 0);
            // $number_one_modified = ($number_one < 10 || $number_one > 90) ? 0 : $number_one;
            // $number_two_modified = ($number_two < 10 || $number_two > 90) ? 0 : $number_two;
            // $number_three_modified = ($number_three < 10 || $number_three > 90) ? 0 : $number_three;
            # missed filtered count here
            // $sorted_average = number_format((($number_one_modified + $number_two_modified + $number_three_modified) / 3), 0);

            // echo " ($number_one, $number_two, $number_three) total average: $total_average, sorted average: $sorted_average </br> ";

            # alternative:
            $numbers = [rand(0, 100), rand(0, 100), rand(0, 100)];
            $all_numbers = join(' ', $numbers);
            $total_sum = 0;
            $filtered_sum = 0;
            $filtered_count = 0;
            foreach($numbers as &$number) {
                $total_sum += $number;
                if ($number < 10 || $number > 90) {
                    $filtered_sum += $number;
                    $filtered_count++;
                }
            }
            unset($number);
            $total_average = number_format((($total_sum) / count($numbers)), 0);
            $sorted_average = 0;
            if ($filtered_count > 0) $sorted_average = number_format((($filtered_sum) / $filtered_count), 0);
            
            echo " ($all_numbers) total average: $total_average, sorted average: $sorted_average </br> ";
        }

         # task 10
        function taskTenFunc() {
            $this->taskHeader('Task 10', 'Generate HH:MM:SS type of clock and 0-300 second increment, display initial value and the increment effect');

            $hours = rand(0, 23);
            $minutes = rand(0, 59);
            $seconds = rand(0, 59);
            if ($seconds < 10) $seconds = '0' . $seconds;
            if ($minutes < 10) $minutes = '0' . $minutes;
            if ($hours < 10) $hours = '0' . $hours;

            echo " (before) HH:MM:SS - $hours:$minutes:$seconds </br> ";

            $increment = rand(0, 300);
            $increment_minutes = floor($increment / 60);
            $increment_seconds = $increment - $increment_minutes * 60;
            $seconds += $increment_seconds;
            $minutes += $increment_minutes;

            if ($seconds > 60) {
                $seconds -= 60;
                $minutes++;
            }
            if ($minutes > 60) {
                $minutes -= 60;
                $hours++;
            }
            if ($hours > 24) {
                $hours -= 24;
                // add a new day
            }

            if (strlen($seconds) < 2) $seconds = '0' . $seconds;
            if (strlen($minutes) < 2) $minutes = '0' . $minutes;
            if (strlen($hours) < 2) $hours = '0' . $hours;

            echo " (after) HH:MM:SS - $hours:$minutes:$seconds - increment: $increment_minutes:$increment_seconds </br> ";
        }

        # task 11
        function taskSpecialFunc() {
            $this->taskHeader('Task 11', 'Generate six large numbers and sort them');

            // $number_one = rand(1000, 9999);
            // $number_two = rand(1000, 9999);
            // $number_three = rand(1000, 9999);
            // $number_four = rand(1000, 9999);
            // $number_five = rand(1000, 9999);
            // $number_six = rand(1000, 9999);

            $values = [];
            for ($i = 1; $i <= 6; $i++) {
                array_push($values, rand(1000, 9999));
            }
            
            // if (($number_one <=> $number_two) === -1) {
            //     $temp = $number_two;
            //     $number_two = $number_one;
            //     $number_one = $temp;
            // }
            // if (($number_one <=> $number_three) === -1) {
            //     $temp = $number_three;
            //     $number_three = $number_one;
            //     $number_one = $temp;
            // }
            // if (($number_one <=> $number_four) === -1) {
            //     $temp = $number_four;
            //     $number_four = $number_one;
            //     $number_one = $temp;
            // }
            // if (($number_one <=> $number_five) === -1) {
            //     $temp = $number_five;
            //     $number_five = $number_one;
            //     $number_one = $temp;
            // }
            // if (($number_one <=> $number_six) === -1) {
            //     $temp = $number_six;
            //     $number_six = $number_one;
            //     $number_one = $temp;
            // }

            // if (($number_two <=> $number_three) === -1) {
            //     $temp = $number_three;
            //     $number_three = $number_two;
            //     $number_two = $temp;
            // }
            // if (($number_two <=> $number_four) === -1) {
            //     $temp = $number_four;
            //     $number_four = $number_two;
            //     $number_two = $temp;
            // }
            // if (($number_two <=> $number_five) === -1) {
            //     $temp = $number_five;
            //     $number_five = $number_two;
            //     $number_two = $temp;
            // }
            // if (($number_two <=> $number_six) === -1) {
            //     $temp = $number_six;
            //     $number_six = $number_two;
            //     $number_two = $temp;
            // }

            // if (($number_three <=> $number_four) === -1) {
            //     $temp = $number_four;
            //     $number_four = $number_three;
            //     $number_three = $temp;
            // }
            // if (($number_three <=> $number_five) === -1) {
            //     $temp = $number_five;
            //     $number_five = $number_three;
            //     $number_three = $temp;
            // }
            // if (($number_three <=> $number_six) === -1) {
            //     $temp = $number_six;
            //     $number_six = $number_three;
            //     $number_three = $temp;
            // }

            // if (($number_four <=> $number_five) === -1) {
            //     $temp = $number_five;
            //     $number_five = $number_four;
            //     $number_four = $temp;
            // }
            // if (($number_four <=> $number_six) === -1) {
            //     $temp = $number_six;
            //     $number_six = $number_four;
            //     $number_four = $temp;
            // }

            // if (($number_five <=> $number_six) === -1) {
            //     $temp = $number_six;
            //     $number_six = $number_five;
            //     $number_five = $temp;
            // }

            do {
                $offset = 0;
                $run = false;
                for ($i = $offset; $i < count($values) - 1; $i++) {
                    $current = $values[$i];
                    $next = $values[$i + 1];
                    if (($current <=> $next) === -1) {
                        $values[$i] = $next;
                        $values[$i + 1] = $current;
                        $run = true;
                    }
                }
                $offset++;
            } while ($run);
            $string = join(' ', $values); 

            // echo " (sorted) $number_one, $number_two, $number_three, $number_four, $number_five, $number_six </br> ";
            echo " (sorted) $string </br> ";
        }

    }
    
    $session = new SessionOne;