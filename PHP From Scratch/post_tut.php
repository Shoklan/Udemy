<form action="post_tut.php" method="POST">
	Please enter your password:<br />
	<input type="password" name="password"><br /><br />
	<input type="submit" value="submit">
</form>

<?php
	$password = 'turtlebananawaffle';

	if(isset($_POST['password']) and !empty($_POST['password'])){
		if($_POST['password'] == $password){
			echo "Correct!";
		}
		else{
			echo "Incorrect!";
		}
	}

?>