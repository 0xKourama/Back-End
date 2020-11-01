<?php 
/*

str_repeat(input, multiplier)
str_shuffle(str)
strlen( str);

*/

$str = "yasser";
$br = "<br>";

$repeat1 = str_repeat($str, 20);
$repeat2 = str_shuffle($str);

echo $repeat1;
echo $br;
echo $repeat2;
echo $br;
echo strlen($str);


?>