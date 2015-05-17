<?php
	$levels = array(1,2,3);
	$level2 = array(
		1 => 'Level 1',
		2 => 'Level 2',
		3 => 'Level 3');

	$GLOBALS['level3'] = array(
		1 => array(
			'name' => 'Level 1',
			'desc' => 'This is level 1'),
		2 => array(
			'name' => 'Level 2',
			'desc' => 'You\'ve made it to level 2'),
		3 => array(
			'name' => 'Level 3',
			'desc' => 'The last level.'));

	/* Note that you cannot echo an array anymore.
	** if you try and do this, it will throw an error
	*/
	echo var_dump($levels);
	echo print_r($levels);


	$GLOBALS['level3'][4]['name'] = 'Level 4';
	echo $GLOBALS['level3'][2]['desc'];

	function level_data($level, $data){
		if( array_key_exists($level, $GLOBALS['level3']) === true){
			return $GLOBALS['level3'][$level][$data];
		}
		else{
			return false;
		}
	}

	echo level_data(1, 'desc');

	echo '<pre>', print_r($GLOBALS, true), '</pre>';
?>