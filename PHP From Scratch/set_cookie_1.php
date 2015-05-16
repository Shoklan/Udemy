<?php
	
	$expire = time() + 86400;
	
	/*
	** The cookie needs to have the time section
	** be in seconds
	*/
	setcookie("name", "Alex", $expire );
	setcookie('age', '19', $expire);

	echo $_COOKIE['name'];

	print_r($_COOKIE);

?>