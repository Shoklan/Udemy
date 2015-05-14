<form action="get_tut.php" method="GET">
	Name:<br><input type="text" name="name"><br>
	Age:<br><input type="text" name="age" size="5"><br /><br />
	<input type="submit" value="submit">
</form>

<?php

	/* When you try and use this code with the latest version of PHP,
	** it shows errors on the page because the variables don't exist with
	** the first run; it looks like PHP finally dropped the fail silently thing
	*/
	$name = $_GET['name'];
	$age  = $_GET['age'];

	if (isset($name) && isset($age)){
		if(!empty($name) && !empty($age)){
			echo "I am ".$name." and I am ".$age." years old.";
		}
		else{
			echo "Nothing Entered!";
		}
	}
?>