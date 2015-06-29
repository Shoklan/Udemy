<?php
	// Connect to the database
	include 'db.inc.php';

	// variables
	$per_page = 6;

	$pages_query = mysql_query("SELECT COUNT(`name_id`) FROM `names`");
	$pages = ceil(mysql_result($pages_query, 0) / $per_pages);

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page-1) * $per_page; 



	$query = mysql_query("SELECT `name` FROM `names` LIMIT $start, $per_page" );
	while($query_row = mysql_fetch_assoc($query)){
		echo '<p>', $query_row['name']  , '</p>';
	}

	if ($pages >= 1 and $page <= $pages){
		for($x=1; $x<=$pages; x++){
			echo ($x == $page) ? '<strong><a href="?page='.$x.'">'.$x.'</a></strong> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
		}
	}
	else{
		echo '<a href="?page=1">Return to Page 1</a>';
	}
?>