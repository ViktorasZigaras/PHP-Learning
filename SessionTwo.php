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
            $upper_case_count = substr_count($original_string, 'A');
            $lower_case_count = substr_count($original_string, 'a');
            
            echo " ($original_string) upper case: $upper_case_count, lower case: $lower_case_count </br> ";
        }

        # task 7
        function taskSevenFunc() {
            echo '</br>=====================</br>Task 7 </br></br>';
            echo ': </br></br>';
        }
        // Sukurti kintamąjį su stringu: “An American in Paris”. Jame ištrinti visas balses. Rezultatą atspausdinti. Kodą pakartoti su stringais: “Breakfast at Tiffany's”, “2001: A Space Odyssey” ir “It's a Wonderful Life”.

        # task 8
        function taskEightFunc() {
            echo '</br>=====================</br>Task 8 </br></br>';
            echo ': </br></br>';
        }
        // Stringe, kurį generuoja toks kodas: 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope'; Surasti ir atspausdinti epizodo numerį.

        # task 9
        function taskNineFunc() {
            echo '</br>=====================</br>Task 9 </br></br>';
            echo ': </br></br>';
        }
        // Suskaičiuoti kiek stringe “Don't Be a Menace to South Central While Drinking Your Juice in the Hood” yra žodžių trumpesnių arba lygių nei 5 raidės. Pakartokite kodą su stringu “Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale”.

         # task 10
        function taskTenFunc() {
            echo '</br>=====================</br>Task 10 </br></br>';
            echo ': </br></br>';
        }
        // Parašyti kodą, kuris generuotų atsitiktinį stringą iš lotyniškų mažųjų raidžių. Stringo ilgis 3 simboliai.

        # task 11
        function taskSpecialFunc() {
            echo '</br>=====================</br>Task 11 </br></br>';
            echo ': </br></br>';
        }
        // Parašykite kodą, kuris generuotų atsitiktinį stringą su 10 atsitiktine tvarka išdėliotų žodžių, o žodžius generavimui imtų iš 9-me uždavinyje pateiktų dviejų stringų. Žodžiai neturi kartotis. (reikės masyvo)
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
