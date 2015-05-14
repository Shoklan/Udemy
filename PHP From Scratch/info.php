<?php
	// Define a Constant
	define("TITLE", "Variables and Constants")

	//Your Variables
	$my_name    = "Collin Mitchell";
	$fav_color  = "Black";
	$birth_year = 1989;

	date_default_timezone_set("America/New_York");

	$today      = date('F j, Y');
	$this_year  = year('Y');

	/*
	Use PHP to calculate the difference
	between your birth year and this year
	to show your age dynamically
	*/

	$my_age     = $this_year - $birth_year;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Get Your Hands Dirty: <?php echo TITLE ?></h3>
</head>
<body>
	<h1>Get Your Hands Dirty: <?php echo TITLE ?></h1>
	
	<h3>Today's Date:</h3>
	<p><?php echo $today ?></p>

	<h3>My Name:</h3>
	<p><?php echo $my_name ?></p>

	<h3>My Favorite Color:</h3>
	<p><?php echo $fav_color ?></p>

	<h3>My Age:</h3>
	<p><?php echo $my_age ?></p>

	<h3><?php echo $this_year ?> - <?php echo $my_name ?></h3>
</body>
</html>