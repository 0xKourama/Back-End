<?php 
$array = array(
	"Html",
	"Css",
	"PHP",
	"JS",
	"MySQL",
	"Ruby",
	"Python",
	"10"
);

$array1 = array(
	"Eg" => "egypt",
	"Qa" => "Qatar",
	"Sa" => "Saudi",
	"Su" => "Sudan",
);
/*
	syntax: 

		indexed array: 

		in_array( Needle, Haystack , type)
		array_search(needle, haystack,type) 

		associative array: 

		array_key_exists(key, array)

	examples:
	
	if ( in_array(10, $array, true)) {
	echo "Yes Exsits";

	$lang = array_search("Css", $array, true);

	echo "Yes it's found in index: " . $lang . " And the value is " . $array[$lang];
}
*/
if (array_key_exists(2, $array)) {
	echo "Yes its Found " . $array[2] . "<br>";
}


if (array_key_exists("Su", $array1)) {
	echo "Yes its Found";
}






?>