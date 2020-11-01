<?php 

	session_start(); //start or resume session

	$_SESSION['username'] = 'Yasser';

	$_SESSION['favfood'] = 'apple';

	echo "<a href='page2.php'>Room Number 2</a>";

?>
