<?php

/*

	Sort: sort(array, type of sorting)
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
 
sort($langs, SORT_REGULAR);

echo "<pre>";

print_r($langs);

echo "</pre>";

sort($langs, SORT_STRING);

echo "<pre>";

print_r($langs);

echo "</pre>";

echo "reverse sorting";

rsort($langs, SORT_REGULAR);

echo "<pre>";

print_r($langs);

echo "</pre>";

rsort($langs, SORT_STRING);

echo "<pre>";

print_r($langs);

echo "</pre>";

?>