<?php
	$config['db'] = array(
	'host'     => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname'   => 'test');


	$db = new PDO('mysql:host='.$config['db']['host'].';dbname='.$config['db']['dbname'], $config['db']['username'], $config['db']['password']);
	$db->query("SELECT  `articles`.`title` FROM `articles`");


	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		echo $row['title'], '<br />';
	}

	echo '<p>Returned ', $query->rowCount(), ' results</p>';
?>