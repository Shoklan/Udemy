<?php
	$levels = array(1,2,3);
	$level2 = array(
		1 => 'Level 1',
		2 => 'Level 2',
		3 => 'Level 3');

	$level3 = array(
		1 => array(
			'name' => 'Level 1',
			'desc' => 'This is level 1'),
		2 => array(
			'name' => 'Level 2',
			'desc' => 'You\'ve made it to level 2'),
		3 => array(
			'name' => 'Level 3',
			'desc' => 'The last level.'));

	echo $levels;
	echo var_dump($levels);
	echo print_r($levels);

	echo '<pre>', print_r($level3, true), '</pre>';
?>