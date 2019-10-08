#!/usr/bin/php
<?php

$ret = array();

for ($i=1; $i < count($argv); $i++) { 
    if(strpos($argv[$i], " ") == TRUE){
        $temp = explode(" ", $argv[$i]);
        $ret = array_merge($ret, $temp);
    }else{
        array_push($ret, $argv[$i]);
    }
}

sort($ret, SORT_STRING);

for ($i=0; $i < count($ret); $i++) { 
    echo "$ret[$i]\n";
}
?>