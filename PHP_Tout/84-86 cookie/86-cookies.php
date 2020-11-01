<?php 

	setcookie('Background', "", time() - 3600,'/');

	$mainColor = '#FFF';

	if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$mainColor = $_POST['color'];

		setcookie('Background', $mainColor, time() + 3600,'/');
	}
	if (isset($_COOKIE['Background'])) {
		$body = $_COOKIE['Background'];
	} else {
		$body = $mainColor;
	}
	echo "<pre>";

	print_r($_COOKIE);

	echo "</pre>";


?>
<!DOCTYPE html>
<html>
<head>
	<title>Modify Cooke</title>
</head>
	<body style="background-color: <?php echo $body;?>">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="color" name="color">
			<input type="submit" name="choose">
		</form>
	</body>
</html>