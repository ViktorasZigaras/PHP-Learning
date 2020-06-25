<?php

require '..\vendor\autoload.php';

define('DIR', 'PHP-Learning/composer/public/');
$param = str_replace(DIR, '', $_SERVER['REQUEST_URI']);
$params = explode(' ', $param);
var_dump($param);

$test = new App\Test(5);

var_dump($test);