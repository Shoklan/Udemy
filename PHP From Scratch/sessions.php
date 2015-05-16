<?php
	session_start();

	$_SESSION['name'] = 'Alex';

	/*
	** unset($_SESSION['name']);
	** session_destroy();
	**
	** Unset removes on session, and s_destory removes them all.
	*/

?>