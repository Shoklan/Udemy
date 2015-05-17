<?php
	$name = 'alex';

	if($name == 'alex'){
		echo 'Hi, Alex.';
	}
	else{

	?>
		You're not Alex? Please type youre name: <br />
		<form action="htmldisplay.php" method="POST">
			<input type="text" name="name">
			<input type="submit" value="Submit">
		</form>

<?php
	}
?>