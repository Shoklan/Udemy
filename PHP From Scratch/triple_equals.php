<?php

/*
** The triple equals will compare two values that are of
** different data types. This is like "deep comparison"
*/

$number = 10.5;
$number2 = '10.5'

if   ($number === $number2) { echo "They are the same!";}
else{ echo "Not the same!";}

?>