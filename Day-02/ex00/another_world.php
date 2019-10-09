#!/usr/bin/php
<?php

if (count($argv) != 2)
    return;

function str_epur($str){
    $ret = trim(preg_replace('/\s+/', " ", $str));
    return ($ret);
}

echo str_epur($argv[1]);

?>