#!/usr/bin/php
<?php

if (count($argv) < 2)
    return;

$str = trim($argv[1]);
$arr = preg_split('/\s+/', $str);
$tmp = $arr[0];
unset($arr[0]);
array_push($arr, $tmp);

for ($i=0; $i <= count($arr); $i++) { 
    echo "$arr[$i]";
    if($i != count($arr)){
        echo " ";
    }
}

echo "\n";

?>