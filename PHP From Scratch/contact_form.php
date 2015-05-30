<?php
	if(empty($_POST) === false){
		$errors = array();

		$name    = $_POST['name'];
		$email   = $_POST['email'];
		$message = $_POST['message'];

		if(empty($name) === true || or empty($email) === true || empty($message) === true){
			$errors[] = "Name, email, and message are required";
		}
		else{
			if(filter_var($email, FILTER_VALID_EMAIL) === false){
				$errors[] = 'That\'s not a vailid email address';
			}
			if(ctype_alpha($name) === false){
				$errors[] = 'Name must only contain letters';
			}
		}

		if (empty($errors) === true){
			// send email
			// redirect user
		}
	}
?>

<!doctype html>
<html>
<head>
	<title>A contact form</title>
</head>
<body>
	<?php 

		if (isset($_GET['sent']) === true) {
			echo '<p>Thanks for contacting us!</p>';
		}
		else{
			if(epmty($errors) === false){
				echo '<ul>';
				foreach($errors as $error){
				echo '<li>', $error, '</li>';
				}
				echo '</ul>';
			}
	?>
		<form action="" method="POST">
			<p>
				<label for="name">Name: </label><br />
				<input  type="text" name="name" id="name" <?php if (isset($_POST['name']) === true ){ echo 'value="', strip_tags($_POST['name']), '"';} ?> />
			</p>
			<p>
				<label for="email">Email: </label><br />
				<input  type="text" name="email" id="email" <?php if (isset($_POST['email']) === true ){ echo 'value="', strip_tags($_POST['email']), '"';} ?> />
			</p>
			<p>
				<label for="message">Message: </label><br />
				<textarea name="message" id="message" placeholder="Type your text here"><?php if (isset($_POST['message']) === true ){ echo strip_tags($_POST['message']);} ?> /></textarea>
			</p>
			<p>
				<input type="submit" value="Submit" />
			</p>
		</form>
	<?php
		}
	?>
</body>
</html>