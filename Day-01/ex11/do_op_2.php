#!/usr/bin/php
<?php

function calc($nbr1, $operator, $nbr2){
  
    if (!ctype_digit($nbr1) || !ctype_digit($nbr2)) {
        echo "Syntax Error\n";
        exit;
    }

    if ($operator == '+'){
        echo($nbr1 + $nbr2);
    }elseif ($operator == '-') {
        echo($nbr1 - $nbr2);
    }elseif ($operator == '*') {
        echo($nbr1 * $nbr2);
    }elseif ($operator == '/') {
        echo($nbr1 / $nbr2);
    }elseif ($operator == '%') {
        echo($nbr1 % $nbr2);
    }
    echo "\n";
    exit;
}

if (count($argv) != 2){
    echo"Incorrect Parameters\n";
    return;
}

$string = preg_replace('/\s+/', '', $argv[1]);

if (count($tmp = explode("+", $string)) > 1){
    print_r($tmp);
    calc($tmp[0], "+", $tmp[1]);
}elseif (count($tmp = explode("-", $string)) > 1) {
    calc($tmp[0], "-", $tmp[1]);
}elseif (count($tmp = explode("*", $string)) > 1) {
    calc($tmp[0], "*", $tmp[1]);
}elseif (count($tmp = explode("/", $string)) > 1) {
    calc($tmp[0], "/", $tmp[1]);
}elseif (count($tmp = explode("%", $string)) > 1) {
    calc($tmp[0], "%", $tmp[1]);
}

echo"Syntax Error\n";

?>