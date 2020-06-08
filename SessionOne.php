<?php
    # launch url: http://localhost/PHP-Learning/SessionOne.php

    # task 1
    echo '</br>=====================</br>Task 1 </br></br>';
    echo 'Create 4 vars: name, surname, birth year and a given year; calculate age and output full info: </br></br>';

    $own_name = 'Viktoras';
    $own_surname = 'Zigaras';
    $birth_year = 1986;
    $given_year = 2020;
    $value = $given_year - $birth_year;

    echo " I am $own_name $own_surname. I am $value years old. </br> ";

    # task 2
    echo '</br>=====================</br>Task 2 </br></br>';
    echo 'Generate two random numbers, choose bigger one and divide from smaller one, use two digits after comma format: </br></br>';

    $number_one = rand(0, 4);
    $number_two = rand(0, 4);
    if ($number_one >= 1 && $number_two >= 1) {
        if ($number_one >= $number_two) {
            $value = $number_one / $number_two;
        } else {
            $value = $number_two / $number_one;
        }
    } else {
        $value = 0;
    }
    $value = number_format($value, 2, '.', '');
    echo " ($number_one, $number_two): $value </br> ";

    # task 3
    echo '</br>=====================</br>Task 3 </br></br>';
    echo 'Generate three random numbers - choose the middle value between them: </br></br>';

    $number_one = rand(0, 25);
    $number_two = rand(0, 25);
    $number_three = rand(0, 25);

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
    } else {
        $value = 'None are completely average.';
    }

    echo " ($number_one, $number_two, $number_three): $value </br> ";

    # task 4
    echo '</br>=====================</br>Task 4 </br></br>';
    echo 'Generate three random numbers - try to make a triangle out of them: </br></br>';

    $number_one = rand(1, 10);
    $number_two = rand(1, 10);
    $number_three = rand(1, 10);

    if (
        ($number_one + $number_two > $number_three) && 
        ($number_one + $number_three > $number_two) &&
        ($number_two + $number_three > $number_one)
    ) {
        $value = 'Triangle is possible';
    } else {
        $value = 'Triangle is impossible';
    }

    echo " ($number_one, $number_two, $number_three): $value </br> ";

    # task 5
    echo '</br>=====================</br>Task 5 </br></br>';
    echo 'Generate four random numbers - list count of all value instances: </br></br>';

    $number_one = rand(0, 2);
    $number_two = rand(0, 2);
    $number_three = rand(0, 2);
    $number_four = rand(0, 2);
    $zero_count = 0;
    $one_count = 0;
    $two_count = 0;
    // ($number_one === 0) ? $zero_count++; : (($number_one === 1) ? $one_count++; : (($number_one === 2) ? $two_count++; : 'neither'));

    if ($number_one === 0) $zero_count++;
    elseif($number_one === 1) $one_count++;
    elseif($number_one === 2) $two_count++;
    if ($number_two === 0) $zero_count++;
    elseif($number_two === 1) $one_count++;
    elseif($number_two === 2) $two_count++;
    if ($number_three === 0) $zero_count++;
    elseif($number_three === 1) $one_count++;
    elseif($number_three === 2) $two_count++;
    if ($number_four === 0) $zero_count++;
    elseif($number_four === 1) $one_count++;
    elseif($number_four === 2) $two_count++;

    echo " ($number_one, $number_two, $number_three, $number_four): 0x$zero_count, 1x$one_count, 2x$two_count </br> ";

    # task 6
    echo '</br>=====================</br>Task 6 </br></br>';
    echo 'Generate a random number and create a header of that size: </br></br>';

    $value = rand(1, 6);
    echo '<h' . $value . '>' . $value . '</h' . $value . '></br>';

    # task 7
    echo '</br>=====================</br>Task 7 </br></br>';
    echo 'Generate three random numbers and color them based on value - negative (green), zero (red), positive (blue): </br></br>';

    $number_one = rand(-10, 10);
    $number_two = rand(-10, 10);
    $number_three = rand(-10, 10);

