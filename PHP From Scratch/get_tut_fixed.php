<!-- This is the fixed version of the get_tut normal page.
	  it's not good enough for me to just let something
	  like this be broken anymore.
-->

<form action="get_tut_fixed.php" method="GET">
	Name:<br><input type="text" name="name"><br>
	Age:<br><input type="text" name="age" size="5"><br /><br />
	<input type="submit" value="submit">
</form>

<?php
	$nameExists = false;
	$ageExists = false;
	
	if(isset($_GET['name']) and !empty($_GET['name'])){
		$name = $_GET['name'];
		$nameExists = true;
	}

	if(isset($_GET['age']) and !empty($_GET['age'])){
		$age = $_GET['age'];
		$ageExists = true;
	}

	if($nameExists and $ageExists){
		echo "I am ".$name." and I am ".$age." years old.";	
	}
?>