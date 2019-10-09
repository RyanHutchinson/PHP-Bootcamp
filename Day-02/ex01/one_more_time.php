#!/usr/bin/php
<?php

$month = array(
    1 => "janvier",
    2 => "février",
    3 => "mars",
    4 => "avril",
    5 => "mai",
    6 => "juin",
    7 => "juillet",
    8 => "août",
    9 => "septembre",
    10 => "octobre",
    11 => "novembre",
    12 => "décembre");
    
$week = array(
    1 => "lundi",
    2 => "mardi",
    3 => "mercredi",
    4 => "jeudi",
    5 => "vendredi",
    6 => "samedi",
    7 => "dimanche");

$argument_array = preg_split('/\s+/', trim($argv[1], " "));

if ($argc == 2){
    if(count($argument_array) != 5){
        echo "Wrong Format\n";
        exit;
    }elseif(!preg_match('/^(?:[2][0-4]|[01][1-9]|10):([0-5][0-9]):([0-5][0-9])$/', $argument_array[4])){
        echo "Wrong Format\n";
        exit;
    }

    $argument_array[0] = array_search(lcfirst($argument_array[0]), $week);
    $argument_array[2] = array_search(lcfirst($argument_array[2]), $month);

    if ($argument_array[0] == FALSE || $argument_array[2] == FALSE || count($argument_array[4] = preg_split("/:/", $argument_array[4])) != 3){
        echo "Wrong Format\n";
        exit;
    }

    date_default_timezone_set("Europe/Paris");
    echo mktime($argument_array[4][0], $argument_array[4][1], $argument_array[4][2], $argument_array[2], $argument_array[1], $argument_array[3]) . "\n";
}

?>