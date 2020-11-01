<?php 	

	session_start();

	echo "Hello " . $_SESSION['username'] . ", You are in room 5<br>";

	echo "Your favourite food is " . $_SESSION['favfood'] . "<br>";

	echo "<pre>";

	print_r($_SESSION);

	echo "</pre>";

	echo "<a href='logout.php'>logout</a> <br>";




?>