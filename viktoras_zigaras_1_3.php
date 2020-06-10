<?php
    # launch url: http://localhost/PHP-Learning/viktoras_zigaras_1_3.php

    class SessionThree {

        function taskHeader(string $title, string $description) {
            echo " </br>=====================</br>$title </br></br> ";
            echo " $description: </br></br> ";
        }
       
        # task 1
        function taskOneFunc() {
            $this->taskHeader('Task 1', '');

            //

            echo "  </br> ";
        } 

        # task 2
        function taskTwoFunc() {
            $this->taskHeader('Task 2', '');

            //

            echo "  </br> ";
        }

        # task 3
        function taskThreeFunc() {
            $this->taskHeader('Task 3', '');

            //

            echo "  </br> ";
        }

        # task 4
        function taskFourFunc() {
            $this->taskHeader('Task 4', '');

            //

            echo "  </br> ";
        }

        # task 5
        function taskFiveFunc() {
            $this->taskHeader('Task 5', '');

            //

            echo "  </br> ";
        }

        # task 6
        function taskSixFunc() {
            $this->taskHeader('Task 6', '');

            //

            echo "  </br> ";
        }

        # task 7

        function taskSevenFunc() {
            $this->taskHeader('Task 7', '');

            //

            echo "  </br> ";
        }

        # task 8

        function taskEightFunc() {
            $this->taskHeader('Task 8', '');

            //

            echo "  </br> ";
        }

        # task 9

        function taskNineFunc() {
            $this->taskHeader('Task 9', '');

            //

            echo "  </br> ";
        }

         # task 10

        function generateString($length) {
            $string = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3);
            return $string;
        }

        function taskTenFunc() {
            $this->taskHeader('Task 10', '');

            //

            echo "  </br> ";
        }

        # task 11
        function taskSpecialFunc() {
            $this->taskHeader('Task 11', '');

            //

            echo "  </br> ";
        }

    }

    echo "  </br> Viktoras Zigaras - Session 1 - Part 2  </br></br> ";
  
    $session = new SessionThree;
    $session->taskOneFunc();
    $session->taskTwoFunc();
    $session->taskThreeFunc();
    $session->taskFourFunc();
    $session->taskFiveFunc();
    $session->taskSixFunc();
    $session->taskSevenFunc();
    $session->taskEightFunc();
    $session->taskNineFunc();
    $session->taskTenFunc();
    $session->taskSpecialFunc();