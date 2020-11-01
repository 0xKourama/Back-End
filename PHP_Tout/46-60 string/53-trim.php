<?php 
/*

	Trim: trim(str, charlist)
	\0 NULL
	\t Tab
	\n new line 
	\r carriage return 
	\xB0 Vertical tab
	" " Space

*/

$str = "I love php";

echo var_dump($str) . "<br>";

$str = "\x0B \x0B \x0B i Love Php \x0B \x0B \x0B ";

echo var_dump($str) . "<br>";

$trimmed1 = trim($str);
$trimmed2 = rtrim($str);
$trimmed3 = ltrim($str);

echo var_dump($trimmed1) . "<br>";
echo var_dump($trimmed2) . "<br>";
echo var_dump($trimmed3) . "<br>";




?>