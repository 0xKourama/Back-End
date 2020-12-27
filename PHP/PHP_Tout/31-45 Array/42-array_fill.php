<?php 
/*

	syntax: 
			array_fill(start_index, num, value)
*/ 




$array = array_fill(2, 10, "yasser");


echo "<pre>";

print_r($array);

echo "</pre>";

$array1 = array_fill(-3, 10, "yasser");

echo "<pre>";

print_r($array1);

echo "</pre>";

$array2 = array_fill(-3, 10, array("yasser","mohamed","elsnbary"));

echo "<pre>";

print_r($array2);

echo "</pre>";


?>