#!/usr/bin/php
<?php

if (count($argv) != 2)
    return;

function str_epur($str){
    $ret = trim($str, " ");
    $ret = preg_replace('/ +/', ' ', $str);
    return ($ret);
}

echo str_epur($argv[1]) . "\n";

?>