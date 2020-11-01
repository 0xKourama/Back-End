<?php 
/*

	syntax: 
	from the end: array_pop($langs)
	from the start: array_shift($langs)


*/

$langs = array(
	"Html",
	"Html5",
	"Css",
	"Css3",
	"JS",
	"PHP"
);

echo "<pre>";

print_r($langs);

echo "</pre>";

$last = array_pop($langs);


echo "<pre>";

print_r($langs);

echo "</pre>";

echo $last;

$start = array_shift($langs);

echo "<pre>";

print_r($langs);

echo "</pre>";

echo $start;

?>