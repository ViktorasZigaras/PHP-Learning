<?php
    # launch url: http://localhost/PHP-Learning/SessionTwo.php

    class SessionTwo {
       
        # task 1
        function taskOneFunc() {
            echo '</br>=====================</br>Task 1 </br></br>';
            echo 'Create two strings - famous actor name and surname, display the shorter one: </br></br>';

            $actor_name = 'Ewan';
            $actor_surname = 'McGregor';
            $selected_string = '';
            if (mb_strlen($actor_name) <= mb_strlen($actor_surname)) $selected_string = $actor_name;
            else $selected_string = $actor_surname;

            echo " ($actor_name, $actor_surname): $selected_string </br> ";
        } 

        # task 2
        function taskTwoFunc() {
            echo '</br>=====================</br>Task 2 </br></br>';
            echo 'Create two strings - famous actor name and surname, display name uppercase and surname lowercase: </br></br>';

            $actor_name = mb_strtoupper('Ewan');
            $actor_surname = mb_strtolower('McGregor');
             
            echo " $actor_name, $actor_surname </br> ";
        }

        # task 3
        function taskThreeFunc() {
            echo '</br>=====================</br>Task 3 </br></br>';
            echo 'Create two strings - famous actor name and surname, display their initials: </br></br>';

            $actor_name = mb_substr('Ewan', 0, 1);
            $actor_surname = mb_substr('McGregor', 0, 1);
             
            echo " $actor_name.$actor_surname. </br> ";
        }

        # task 4
        function taskFourFunc() {
            echo '</br>=====================</br>Task 4 </br></br>';
            echo 'Create two strings - famous actor name and surname, display end on their name and surname: </br></br>';

            $actor_name = mb_substr('Ewan', -3);
            $actor_surname = mb_substr('McGregor', -3);
             
            echo " < $actor_name - $actor_surname > </br> ";
        }

        # task 5
        function taskFiveFunc() {
            echo '</br>=====================</br>Task 5 </br></br>';
            echo 'Create a certain string and replace all <a, A> letters with *: </br></br>';

            $original_string = 'An American in Paris';
            $string = str_replace('A', '*', str_replace('a', '*', $original_string));

            echo " original: $original_string, new: $string </br> ";
        }

        # task 6
        function taskSixFunc() {
            echo '</br>=====================</br>Task 6 </br></br>';
            echo 'Create a certain string and count all <a, A> letters: </br></br>';

            $original_string = 'An American in Paris';
            $upper_case_count = mb_substr_count($original_string, 'A');
            $lower_case_count = mb_substr_count($original_string, 'a');
            
            echo " ($original_string) upper case: $upper_case_count, lower case: $lower_case_count </br> ";
        }

        # task 7

        function deleteVowels($string, $vowels) {
            echo 'string to replace: ' . $string . ' - result: ' . str_replace($vowels, "", $string) . '</br>';
        }

        function taskSevenFunc() {
            echo '</br>=====================</br>Task 7 </br></br>';
            echo 'Create certain strings and remove vowels from them: </br></br>';

            $test_values = array('An American in Paris', "Breakfast at Tiffany's", '2001: A Space Odyssey', "It's a Wonderful Life");
            $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
            foreach($test_values as $string) {
                $this->deleteVowels($string, $vowels);
            }
        }

        # task 8

        function taskEightFunc() {
            echo '</br>=====================</br>Task 8 </br></br>';
            echo 'Generate a certain string and find a specific number in it: </br></br>';

            $string = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';
            $int = (int) filter_var($string, FILTER_SANITIZE_NUMBER_INT);
            # there are many more ways to find a number and their advantages over others are dependent on a given business logic, specifications, etc.

            echo " original string: $string, extracted number: $int </br> ";
        }

        # task 9

        function splitStrings($string) {
            $pieces = explode(" ", $string);
            $count = 0;
            foreach($pieces as $item) {
                if (mb_strlen($item) <= 5) $count++;
            }
            echo " count of words of 5 characters or less in ($string) is: $count </br> ";
        }

        function taskNineFunc() {
            echo '</br>=====================</br>Task 9 </br></br>';
            echo 'Count the amount of words of length <= 5 in a string out of a set of strings (array): </br></br>';

            $test_values = array("Don't Be a Menace to South Central While Drinking Your Juice in the Hood", "Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale");
            foreach($test_values as $string) {
                $this->splitStrings($string);
            }
        }

         # task 10

        function generateString($length) {
            $string = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3);
            return $string;
        }

        function taskTenFunc() {
            echo '</br>=====================</br>Task 10 </br></br>';
            echo 'Generate a random word of 3 latin lower case symbols: </br></br>';

            # alternatively generate a number and convert to string character (chr function)
            $string = $this->generateString(3);

            echo " random word: $string </br> ";
            
        }

        # task 11
        function taskSpecialFunc() {
            echo '</br>=====================</br>Task 11 </br></br>';
            echo 'Generate 10 random strings using previous task, ensure that all "words" are unique: </br></br>';

            $string_array = array();
            while (count($string_array) < 10) {
                array_push($string_array, $this->generateString(3));
                $string_array = array_unique($string_array);
            }
            $sentence = '';
            foreach($string_array as $string) {
                $sentence .= ' ' . $string;
            }

            echo " random sentence: $sentence </br> ";
        }

    }
  
    $sessionTwo = new SessionTwo;
    $sessionTwo->taskOneFunc();
    $sessionTwo->taskTwoFunc();
    $sessionTwo->taskThreeFunc();
    $sessionTwo->taskFourFunc();
    $sessionTwo->taskFiveFunc();
    $sessionTwo->taskSixFunc();
    $sessionTwo->taskSevenFunc();
    $sessionTwo->taskEightFunc();
    $sessionTwo->taskNineFunc();
    $sessionTwo->taskTenFunc();
    $sessionTwo->taskSpecialFunc();