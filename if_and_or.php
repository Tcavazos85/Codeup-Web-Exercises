<?php

$x = 0;
 $y = 5;
 $z = 10;

// if $x < $y < $z then echo "{$x} < {$y} < {$z}\n";

if ($x < $y && $y < $z) {
	echo "{$x} < {$y} < {$z}". PHP_EOL;
}

// if $x is greater than 0 OR less than 10, echo the result as a sentence "$x is greater than 0 OR less than 10".
if ($x > 0 || $x < 10){
	echo "$x is greater than 0 or less than 10.". PHP_EOL;
}

 // repeat the if statement for $y and $z.
if ($y > 0 || $y < 10){
	echo "$y is greater than 0 or less than 10.". PHP_EOL;
}

if ($z > 0 || $z < 10){
	echo "$z is greater than 0 or less than 10.". PHP_EOL;
}

// If $x is greater than 0 AND less than 10, echo the result as a sentence "$x is greater than 0 AND less than 10".
if ($x > 0 && $x < 10){
	echo "$x is greater than 0 and less than 10.". PHP_EOL;
}

 // repeat the if statement for $y and $z.
if ($y > 0 && $y < 10){
	echo "$y is greater than 0 and less than 10.". PHP_EOL;
}
if ($z > 0 && $z < 10){
	echo "$z is greater than 0 and less than 10.". PHP_EOL;
}
?>