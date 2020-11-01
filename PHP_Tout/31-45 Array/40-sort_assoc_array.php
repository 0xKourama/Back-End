<?php 
/*

	Sort: asort(array, type of sorting)
		 arsort(array, type of sorting)
		 ksort(array, type of sorting)
		 rsort(array, type of sorting)
	type of sorting: SORT_REGULAR,

*/ 


$langs = array(
	"Html" 	=> 80,
	"Html5" => 70,
	"Css" 	=> 45,
	"Css3" 	=> 90,
	"JS" 	=> 95,
	"PHP" 	=> 30,
);


echo "<pre>";

print_r($langs);

echo "</pre>";
 
ksort($langs, SORT_REGULAR);

echo "<pre>";

print_r($langs);

echo "</pre>";

echo "reverse sorting";

krsort($langs, SORT_REGULAR);

echo "<pre>";

print_r($langs);

echo "</pre>";


?>