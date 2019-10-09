#!/usr/bin/php
<?php

function scrub_images($str){

    global $host;
    $name_path = preg_replace("/http[s]{0,1}:\/\//", "", $host);
    $host = trim($host, "/") . "/";
    if(preg_match("/http[s]{0,1}:\/\//", $str[2])){
        $image_url = $str[2];
    }else{
        $image_url = $host.trim($str[2], "/");
    }

    $image_filename = $str[2];
    $image_filename = preg_replace("/\//", " ", $image_filename);

    @mkdir($name_path);
    @touch($name_path.'/'.$image_filename);

    $fd = fopen ($name_path.'/'.$image_filename, 'wb');
    $ch = curl_init($image_url);
    curl_setopt($ch, CURLOPT_FILE, $fd);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_exec($ch);
    curl_close($ch);
    fclose($fd);
}
$host = $argv[1];
$result = file_get_contents($host."/");

preg_replace_callback('/(<img.*src=\")(.*)(\".*>)/Uis', scrub_images, $result);

?>