<?php 

/*
	function sayHello($name,$age) {
		
		$result = "Hello " . $name . " Your age is : " . $age . "<br>";
		return $result;
	}
	echo sayHello("yasser",21);
*/
	function getTicket ($user,$age) {
		$ticket = rand(5000,1000000);
		if ( $age >= 30) {
			
			$msg = "Hello " . $user . "Your Age Is " . $age . "<br>";
			$msg .= "You are qualified to get a ticket congratz :)";
			$msg .= "Your ticket ID is [ <span>" . $ticket . "</span> ]";


		}
		else {
			$msg = "Hello" . $user . "Your Age Is " . $age . "<br>";
			$msg .= "You are not qualified to get a ticket sorry :(";
	}
	return $msg;
}
	echo 	$id = getTicket("osama",21);

?>