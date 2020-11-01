<?php
	// resume the session

	session_start();

	// unset 

	session_unset();

	//destroy 

	session_destroy(); 

	echo "<pre>";

	print_r($_SESSION);

	echo "</pre>";

?>