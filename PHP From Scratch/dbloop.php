<?php
	$config['db'] = array(
	'host'     => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname'   => 'test');


	$db = new PDO('mysql:host='.$config['db']['host'].';dbname='.$config['db']['dbname'], $config['db']['username'], $config['db']['password']);

	$db->query("SELECT  `articles`.`title` FROM `articles`");

	print_r($query);

	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		echo $row['title'], '<br />';
	}
?>