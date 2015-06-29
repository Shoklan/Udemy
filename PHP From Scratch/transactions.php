<?php
	$config['db'] = array(
	'host'     => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname'   => 'test');


	$db = new PDO('mysql:host='.$config['db']['host'].';dbname='.$config['db']['dbname'], $config['db']['username'], $config['db']['password']);
	$db-> setAttributes(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try{
		// start transaction
		$db->beginTransation();

		$db->query("INSERT into `articles` (`articles`.`title`) VALUES ('Another PDO Tutorial')");
		$db->query("UPDATE `articles` SET `articles`.`view` = 1 WHERE `articles`.`id` = " . $db->lastinsertId());

		$db->commit();

	} catch(PDOException $e){
		//output error
		$db->rollBack();
		die($e->getMessage());
	}