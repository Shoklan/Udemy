<?php
	
	$age = 18;


	/* This is the original block of code
	** that will be outdated in a moment
	*/
	$old_enough = false;
	if($age >= 18){
		$old_enough = true;
	}

	if($old_enough === true){
		echo "Old Enough!";
	}
	else{
		echo "Not old enough.";
	}

	/* This is the Ternary Operator.
	** we've reduced 11 lines to 2.
	*/
	$old_enough = ($age >= true) ? true: false;
	echo ($old_enough === true)  ? 'Old Enough!' : "Not old enough.";
?>
