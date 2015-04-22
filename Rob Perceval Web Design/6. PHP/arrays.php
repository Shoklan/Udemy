<?php

	$myarray = array("pizza", "chocolate", "coffee");
	$anotherArray[0]="pizza";
	$anotherArray[1]="yogurt";
	$thirdArray(
		"France"  => "French",
		"Germany" => "German",
		"USA"     => "English"
	);
	$name = "Rob";
	
	print_r($myarray);
	echo $myarray[2];
	echo "I'm still going!";
	print_r($anotherArray);
	print_r($thirdArray);
	print_r($anotherArray);
	
	$anotherArray[] = "Salad";
	unset($thirdArray["Germany"]);
	
	print_r($thirdArray);
	
?>