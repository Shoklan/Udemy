<?php 
	if(isset($_POST['name'])){
			$name = $_POST['name'];
			if (!empty($name)){
				$sentence = $name." woke up and made a PHP tutorial.";
			}
			else{ echo 'Please enter a name.';}
	}
?>

<html>
<head>
</head>
<body>
	<b>Alex</b>
	<strong><?php echo 'Billy'; ?><strong>

	<form action="embed_php.php" method="POST">
		Type your name:<br> <input type="text" name="name"><br />
		<input type="submit" value="Submit">
	</form>

	<textarea rows="7" cols="25" placeholder="<?php if(isset($sentence)){echo $sentence;} ?>"></textarea>
</body>
</html>