<?php 

/*

	Array_Push: array_push(Array, value1, value2, value3)
	Array_unshift: array_push(Array, value1, value2, value3)
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

array_push($langs, "Python", "MySQL", "Ajax", "XML");

echo "<pre>";

print_r($langs);

echo "</pre>";

array_unshift($langs, "Golang", "Ruby", "Perl", "Vue");

echo "<pre>";

print_r($langs);

echo "</pre>";


?>