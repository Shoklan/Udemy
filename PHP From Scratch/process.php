<?php
	if(isset($_POST['agree']) and $_POST['agree'] == 'true'){
		echo 'Set, and Correct value';
	}
	else { echo "You must agree to the terms and conditions";}

?>