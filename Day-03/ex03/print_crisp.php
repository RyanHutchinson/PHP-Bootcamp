<?php

if($_GET["action"] && $_GET["name"]) //-----------------------------------------seting local variables. Setcookie & echo do not like being passed arrays.
	{
		$action = $_GET["action"];
        $name = $_GET["name"];
        if($_GET["value"]){
            $value = $_GET["value"];
        }        
    }

if($_GET["action"]){

    if($_GET["action"] == "set"){
        setcookie($name, $value, time() + (86400 * 30)); //---------------------set the cookie to expire in 30 days
    }elseif($_GET["action"] == "get"){
        echo $_COOKIE[$name] . "\n";
    }elseif($_GET["action"] == "del" && $name){
        setcookie($name, $value, time() - (86400 * 30)); //---------------------Set the cookie to expire in the past which forces to the browser to delete it.
    }
}

?>