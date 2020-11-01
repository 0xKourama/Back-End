<?php 
/*
	array_unique(array)
*/

$array = array("yasser","mohamed","khaled","ali","belal","yasser","mohamed","mohamed","khaled");


echo "<pre>";

print_r($array);

echo "</pre>";

$array2 = array_unique($array);

echo "<pre>";

print_r($array2);

echo "</pre>";

?>