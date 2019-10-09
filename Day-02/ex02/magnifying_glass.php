#!/usr/bin/php
<?php
function replace($str){
	return ($str[1].strtoupper($str[2]).$str[3]);
}
function replace2($str){
    return ($str[1].change($str[2]).$str[3]);
}
function change($str){
    $inside = TRUE;
    for ($i = 0; $str[$i]; $i++)
    {
        if ($str[$i] == ">")
            $inside = TRUE;
        if ($str[$i] == "<")
            $inside = FALSE;
        if ($inside)
            $ret .= ucfirst($str[$i]);
        else
            $ret .= $str[$i];
    }
    return $ret;
}

if ($argc == 2){
    if(!is_readable($fd = $argv[1])){
        echo "What you tryna gimme... Incorrect file type\n";
        exit;
    }
    $data = file_get_contents($fd);
    $data = preg_replace_callback('/(<.*title=\")(.*)(\".*>)/Uis', replace, $data);
    $data = preg_replace_callback('/(<a.*>)(.*)(<\/a>)/Uis', replace2, $data);
    echo"$data";
}else{
    echo"Not a damn clue what went wrong here...";
}
?>