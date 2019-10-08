<?php

function    ft_is_sort($arr){

    $check = array_merge(array(), $arr);
    sort($check);

    for ($i=0; $i < count($arr); $i++) { 
        if(strcmp($arr[$i], $check[$i]) != 0)
            return (0);
    }
    return (1);
}

?>