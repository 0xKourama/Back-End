<?php 

	session_start();

	echo "Hello " . $_SESSION['username'] . ", How are you ? <br>";

	echo "Your favourite food is " . $_SESSION['favfood'] . "<br>";

	echo "<a href='page3.php'>Room Number 3</a>";

?>