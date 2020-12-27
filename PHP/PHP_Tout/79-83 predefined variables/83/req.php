<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<input type="text" name="username">
	<input type="submit" name="Send">
</form>

<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			echo $_POST['username'];

	} else {
		echo "Error";
	}

?>
