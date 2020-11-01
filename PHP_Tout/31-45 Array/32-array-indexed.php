<?php 

/*

	syntax: array(Element, Element, Element);

*/

	$workers = array("ahmed","sayed","Osama","Hassan","Ibrahim");
		$workers[2] = "PHP";
		$workers[] = "sayed";
		$workers[] = "Osama";
		$workers[] = "Hassan";
		$workers[] = "Ibrahim";


	echo "<pre>";
	print_r($workers);	
	echo "</pre>";	
	//echo $workers[3];
	

?>