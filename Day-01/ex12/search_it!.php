#!/usr/bin/php
<?php

if($argc < 3)
    return;

$return = "";
$key = $argv[1];

for ($i=2; $i < count($argv); $i++) { 
    $tmp = explode(":", $argv[$i]);

    if($tmp[0] == $key){
        $return = $tmp[1];
    }
}

if($return == null){
    return;
}else{
    echo"$return\n";
}

?>