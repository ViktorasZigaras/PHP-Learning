<?php
session_start();

$data = json_decode(file_get_contents(__DIR__ .'/data.json'), 1);