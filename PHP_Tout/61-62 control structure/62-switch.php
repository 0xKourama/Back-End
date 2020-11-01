<?php 
/*
	Syntax: 
	switch(Expression) {
	
	case:
	// code
	break;
	}
*/
	$browser = "Mozilla Firefox";

	switch ($browser) {
		case 'Firefox':
		case 'Mozilla Firefox':
			echo "Your favourite browser is firefox";
			break;

		case 'Google Chrome':
			echo "Your favourite browser is Google Chrome";
			break;

		case 'opera':
			echo "Your favourite browser is opera";
			break;

		default:
			echo "Your favourite browser is Not Here";
			break;
	}

?>