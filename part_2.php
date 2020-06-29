<?php
    # launch url: http://localhost/PHP-Learning/part_2.php

    class SessionTwo {

        function __construct() {
            echo "  </br> Viktoras Zigaras - Session 1 - Part 2  </br></br> ";
            $name = 'Ewan';
            $surname = 'McGregor';
            $this->taskOneFunc($name, $surname);
            $this->taskTwoFunc($name, $surname);
            $this->taskThreeFunc($name, $surname);
            $this->taskFourFunc($name, $surname);
            $this->taskFiveFunc(['a', 'A'], '*');
            $this->taskSixFunc('a', 'A');
            $test_values = [
                'An American in Paris', 
                "Breakfast at Tiffany's", 
                '2001: A Space Odyssey', 
                "It's a Wonderful Life"
            ];
            $vowels = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U"];
            $this->taskSevenFunc($test_values, $vowels);
            $this->taskEightFunc();
            $test_values = [
                "Don't Be a Menace to South Central While Drinking Your Juice in the Hood", 
                "Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale"
            ];
            $this->taskNineFunc(5, $test_values);
            $this->taskTenFunc(3);
            $this->taskSpecialFunc(10, 3);
        }

        function taskHeader(
            string $title = '', 
            string $description = ''
        ) {
            echo " </br>=====================</br>$title </br></br> ";
            echo " $description: </br></br> ";
        }
       
        # task 1

        function taskOneFunc(
            string $name = '',
            string $surname = ''
        ) {
            $this->taskHeader('Task 1', 'Create two strings - famous actor name and surname, display the shorter one');

            $selected_string = (mb_strlen($name) <= mb_strlen($surname)) ? $name: $surname;

            echo " ($name, $surname): $selected_string </br> ";
        } 

        # task 2

        function taskTwoFunc(
            string $name = '',
            string $surname = ''
        ) {
            $this->taskHeader('Task 2', 'Create two strings - famous actor name and surname, display name uppercase and surname lowercase');

            $actor_name = mb_strtoupper($name);
            $actor_surname = mb_strtolower($surname);
             
            echo " $actor_name, $actor_surname </br> ";
        }

        # task 3

        function taskThreeFunc(
            string $name = '',
            string $surname = ''
        ) {
            $this->taskHeader('Task 3', 'Create two strings - famous actor name and surname, display their initials');

            $actor_name = mb_substr($name, 0, 1);
            $actor_surname = mb_substr($surname, 0, 1);
             
            echo " $actor_name.$actor_surname. </br> ";
        }

        # task 4

        function taskFourFunc(
            string $name = '',
            string $surname = ''
        ) {
            $this->taskHeader('Task 4', 'Create two strings - famous actor name and surname, display end on their name and surname');

            $actor_name = mb_substr($name, -3);
            $actor_surname = mb_substr($surname, -3);
             
            echo " < $actor_name - $actor_surname > </br> ";
        }

        # task 5

        function taskFiveFunc(
            array $replace = [],
            string $replace_with = ''
        ) {
            $replace_string = implode(' ', $replace);
            $this->taskHeader('Task 5', "Create a certain string and replace all < $replace_string > letters with $replace_with");

            $original_string = 'An American in Paris';
            $string = str_replace($replace, $replace_with, $original_string);

            echo " original: $original_string, new: $string </br> ";
        }

        # task 6

        function taskSixFunc(
            string $replace_one = '',
            string $replace_two = ''
        ) {
            $this->taskHeader('Task 6', "Create a certain string and count all < $replace_one, $replace_two > letters");

            $original_string = 'An American in Paris';
            $first_count = mb_substr_count($original_string, $replace_one);
            $second_count = mb_substr_count($original_string, $replace_two);
            
            echo " ($original_string) first count: $first_count, second count: $second_count </br> ";
        }

        # task 7

        function taskSevenFunc(
            array $test_values = [], 
            array $vowels = []
        ) {
            $replace_string = implode(' ', $vowels);
            $this->taskHeader('Task 7', "Create certain strings and remove [ $replace_string ] from them");

            foreach($test_values as &$string) {
                $replaced_string = str_replace($vowels, "", $string);
                echo " string to replace: $string - result: $replaced_string </br> ";
            }
            unset($string);
        }

        # task 8

        function taskEightFunc() {
            $this->taskHeader('Task 8', 'Generate a certain string and find a specific number in it');

            # a specific formulae given
            $string = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';
            $int = (int) filter_var($string, FILTER_SANITIZE_NUMBER_INT);
            # there are many more ways to find a number and their advantages over others are dependent on a given business logic, specifications, etc.

            echo " original string: $string, extracted number: $int </br> ";
        }

        # task 9

        function splitStrings(
            int $length = 0,
            string $string = ''
        ) {
            $pieces = explode(" ", $string);
            $count = 0;
            foreach($pieces as $item) {
                if (mb_strlen($item) <= $length) $count++;
            }
            echo " count of words of $length characters or less in ($string) is: $count </br> ";
        }

        function taskNineFunc(
            int $length = 0,
            array $test_values = []
        ) {
            $this->taskHeader('Task 9', "Count the amount of words of length <= $length in a string out of a set of strings (array)");

            foreach($test_values as &$string) {
                $this->splitStrings($length, $string);
            }
            unset($string);
        }

        # task 10

        private array $alphabeth = [];
        private array $extended_aplhabeth = [];

        function generateString(
            int $length = 0
        ) {
            # one of the many strategies to join many chars and randomise them
            // $string = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, $length);

            if (count($this->extended_aplhabeth) === 0) {
                if (count($this->alphabeth) === 0) $this->alphabeth = range('a', 'z');
                $this->extended_aplhabeth = $this->alphabeth;
                array_push($this->extended_aplhabeth, ...$this->alphabeth);
            }
            
            $string = implode('', array_rand(array_flip($this->extended_aplhabeth), $length));

            return $string;
        }

        function taskTenFunc(
            int $length = 0
        ) {
            $this->taskHeader('Task 10', "Generate a random word of $length latin lower case symbols");

            $string = $this->generateString($length);

            echo " random word: $string </br> ";
        }

        # task 11

        function taskSpecialFunc(
            int $count = 0,
            int $length = 0
        ) {
            $this->taskHeader('Task 11', "Generate $count random strings using previous task, ensure that all 'words' are unique");

            $string_array = [];
            while (count($string_array) < $count) {
                array_push($string_array, $this->generateString($length));
                $string_array = array_unique($string_array);
            }
            $sentence = implode(' ', $string_array);

            echo " random sentence: $sentence </br> ";
        }

    }
  
    $session = new SessionTwo;