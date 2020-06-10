<?php
    # launch url: http://localhost/PHP-Learning/viktoras_zigaras_2.php

    class SessionTwo {

        function __construct() {
            echo "  </br> Viktoras Zigaras - Session 1 - Part 2  </br></br> ";
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
            $this->taskHeader('Task 1', 'Create two strings - famous actor name and surname, display the shorter one');

            $actor_name = 'Ewan';
            $actor_surname = 'McGregor';
            $selected_string = (mb_strlen($actor_name) <= mb_strlen($actor_surname)) ? $actor_name: $actor_surname;

            echo " ($actor_name, $actor_surname): $selected_string </br> ";
        } 

        # task 2
        function taskTwoFunc() {
            $this->taskHeader('Task 2', 'Create two strings - famous actor name and surname, display name uppercase and surname lowercase');

            $actor_name = mb_strtoupper('Ewan');
            $actor_surname = mb_strtolower('McGregor');
             
            echo " $actor_name, $actor_surname </br> ";
        }

        # task 3
        function taskThreeFunc() {
            $this->taskHeader('Task 3', 'Create two strings - famous actor name and surname, display their initials');

            $actor_name = mb_substr('Ewan', 0, 1);
            $actor_surname = mb_substr('McGregor', 0, 1);
             
            echo " $actor_name.$actor_surname. </br> ";
        }

        # task 4
        function taskFourFunc() {
            $this->taskHeader('Task 4', 'Create two strings - famous actor name and surname, display end on their name and surname');

            $actor_name = mb_substr('Ewan', -3);
            $actor_surname = mb_substr('McGregor', -3);
             
            echo " < $actor_name - $actor_surname > </br> ";
        }

        # task 5
        function taskFiveFunc() {
            $this->taskHeader('Task 5', 'Create a certain string and replace all <a, A> letters with *');

            $original_string = 'An American in Paris';
            $string = str_replace('A', '*', str_replace('a', '*', $original_string));

            echo " original: $original_string, new: $string </br> ";
        }

        # task 6
        function taskSixFunc() {
            $this->taskHeader('Task 6', 'Create a certain string and count all <a, A> letters');

            $original_string = 'An American in Paris';
            $upper_case_count = mb_substr_count($original_string, 'A');
            $lower_case_count = mb_substr_count($original_string, 'a');
            
            echo " ($original_string) upper case: $upper_case_count, lower case: $lower_case_count </br> ";
        }

        # task 7

        function deleteVowels(string $string, array $vowels) {
            echo 'string to replace: ' . $string . ' - result: ' . str_replace($vowels, "", $string) . '</br>';
        }

        function taskSevenFunc() {
            $this->taskHeader('Task 7', 'Create certain strings and remove vowels from them');

            $test_values = [
                'An American in Paris', 
                "Breakfast at Tiffany's", 
                '2001: A Space Odyssey', 
                "It's a Wonderful Life"
            ];
            $vowels = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U"];
            foreach($test_values as &$string) {
                $this->deleteVowels($string, $vowels);
            }
            unset($string);
        }

        # task 8

        function taskEightFunc() {
            $this->taskHeader('Task 8', 'Generate a certain string and find a specific number in it');

            $string = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';
            $int = (int) filter_var($string, FILTER_SANITIZE_NUMBER_INT);
            # there are many more ways to find a number and their advantages over others are dependent on a given business logic, specifications, etc.

            echo " original string: $string, extracted number: $int </br> ";
        }

        # task 9

        function splitStrings(string $string) {
            $pieces = explode(" ", $string);
            $count = 0;
            foreach($pieces as $item) {
                if (mb_strlen($item) <= 5) $count++;
            }
            echo " count of words of 5 characters or less in ($string) is: $count </br> ";
        }

        function taskNineFunc() {
            $this->taskHeader('Task 9', 'Count the amount of words of length <= 5 in a string out of a set of strings (array)');

            $test_values = [
                "Don't Be a Menace to South Central While Drinking Your Juice in the Hood", 
                "Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale"
            ];
            foreach($test_values as &$string) {
                $this->splitStrings($string);
            }
            unset($string);
        }

        # task 10

        private array $alphabeth = [];
        private array $extended_aplhabeth = [];

        function generateString(int $length) {
            # one of the many strategies to join many chars and randomise them
            // $string = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, $length);

            if (count($this->extended_aplhabeth) === 0) {
                if (count($this->alphabeth) === 0) {
                    $this->alphabeth = range('a', 'z');
                }
                $this->extended_aplhabeth = $this->alphabeth;
                array_push($this->extended_aplhabeth, ...$this->alphabeth);
            }
            
            $string = implode('', 
                array_rand(
                    array_flip($this->extended_aplhabeth)
                , $length)
            );

            return $string;
        }

        function taskTenFunc() {
            $this->taskHeader('Task 10', 'Generate a random word of 3 latin lower case symbols');

            $string = $this->generateString(3);

            echo " random word: $string </br> ";
        }

        # task 11
        function taskSpecialFunc() {
            $this->taskHeader('Task 11', 'Generate 10 random strings using previous task, ensure that all "words" are unique');

            $string_array = [];
            while (count($string_array) < 10) {
                array_push($string_array, $this->generateString(3));
                $string_array = array_unique($string_array);
            }
            $sentence = implode(' ', $string_array);

            echo " random sentence: $sentence </br> ";
        }

    }
  
    $session = new SessionTwo;