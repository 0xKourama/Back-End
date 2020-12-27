<?php 


/*
	Syntax [1] For indexed arrays

	foreach ( $array as $value ) {

	 //code

	}

	Syntax [2] For Associative arrays

	foreach ( $array as $keys => $value ) {

	 //code

	}

*/ 

	/*
		$countries = array("Egypt","Saudia","Qatar","Bahrin","Syria","Sudan","Pelastien");

	foreach ($countries as $value) {
		echo $value . "<br>";
	}


	*/
	$countries = array(
		"EG" => "Egypt",
		"SA" => "Saudia",
		"QA" => "Qatar",
		"BA" => "Bahrin",
		"SY" => "Syria",
		"SU" => "Sudan",
		"PA" => "Pelastien"
	);

	foreach ($countries as $key => $value) {
		echo $key . " => " . $value . "<br>";
	}

 
?>