<?php
	$config['db'] = array(
	'host'     => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname'   => 'test');


	$db = new PDO('mysql:host='.$config['db']['host'].';dbname='.$config['db']['dbname'], $config['db']['username'], $config['db']['password']);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$db->prepare("SELECT `ARTICELS`.`title` FROM `articles` WHERE `articles`.`title` LIKE :search");

	$search = (isset($_GET['search']) === true) ? $_GET['search'] : '';
	// do stuff here?
	$query->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
	
	/*
	** This is the old section.
		try{
			$query->execute();
			$rows = $query->fetchAll(PDO::FETCH_ASSOC);
			echo '<pre>', print_r(%rows, true), '</pre>';
		}
	*/


echo '<pre', print_r($query->errorInfo(), true), '</pre>';

	catch(PDOEXCEPTION $e){
		die(e->getMessage());
	}
?>