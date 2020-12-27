<?php 

/*
$num1 = 100;
$num2 = 200;

	if($num1 < $num2) {
		echo "Yes " . $num2 . " Is Larger Than " . $num1;
	}
	elseif ($num2 > $num1) {
		echo "Yes " . $num1 . " Is Larger Than " . $num2;
	}
	else {
		echo "No " . $num1 . " Is equal " . $num2;
	}

*/

	$ticketPrice = 1500;

	
	if ($ticketPrice > 400 && $ticketPrice < 500) {
		echo "Your Ticket Price Is " . $ticketPrice . "$ USD You Have 5% Discount";
	}
	elseif ($ticketPrice > 500) {
		echo "Your Ticket Price Is " . $ticketPrice . "$ USD You Have 15% Discount";
	}
	else {
		echo "Sorry Your Ticket Price Is " . $ticketPrice . "$ USD You No Discount";
	}

?>