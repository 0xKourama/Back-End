<?php 
/*

	syntax: array_reverse($array, preserve)
			default: false
			you can use true 
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
 
$reversed = array_reverse($langs);

echo "<pre>";

print_r($reversed);

echo "</pre>"; 

shuffle($langs);

echo "<pre>";

print_r($langs);

echo "</pre>"; 



?>