#!/usr/bin/php
<?php

date_default_timezone_set("Africa/Johannesburg");

$fd = fopen("/var/run/utmpx", "r");
while($raw = fread($fd, 628)){

    //var_dump($raw);
    $parsed = unpack("a256user/a4id/a32line/ipid/itype/I2time", $raw);
    //var_dump($parsed);
    if	($parsed["type"] == 7)
			$ret[] = $parsed;
}
fclose($fd);


$i = 0;
foreach ($ret as $value) {

    echo($ret[$i][user] . " ");
    echo($ret[$i][line] . "  ");
    echo date("M  j h:i", $ret[$i][time1])." \n";
    $i++;
}

?>