<?php 

/*
	explode(delimiter, string,limit)
*/

$str = "Hello,i,love,php";

echo $str . "<br>";

$arr = explode(",", $str,1);

echo "<pre>";

print_r($arr);

echo "</pre>";
?>