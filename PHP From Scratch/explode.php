<?php
	$likes = 'eating, drinking, the gym, nothing';
	$likesArray = explode(',', $likes);

	print_r($likesArray);
	foreach($likesArray as $key => $like){
		echo $like, ' at position ', $key;
	}
?>