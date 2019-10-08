#!/usr/bin/php
<?php

if ($argc != 4){
    echo "Incorrect Parameters\n";
    return;
}

$nbr1 = trim($argv[1]);
$operator = trim($argv[2]);
$nbr2 = trim($argv[3]);

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

?>