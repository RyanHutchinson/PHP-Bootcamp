#!/usr/bin/php
<?php
while(1){
	echo "Enter a number: ";
	$line = trim(fgets(STDIN));

	if($line == null){
		echo "\n";
		break;
	}elseif(is_numeric($line) != TRUE){
		echo "'$line' is not a Number\n"; 
	}elseif ($line % 2 == 0) {
		echo "The number $line is even\n";
	}else{
		echo "The number $line is odd\n";
	}
}
?>