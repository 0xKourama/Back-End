<?php 
/*
	str_word_count(string, format, charlist)
	0 => number of words
	1 => array
	2 => assoc array
*/

$str= "I Love PHP So mush and althought Javascript";

echo "$str" . "<br>";

$count = str_word_count($str,2);

echo "<pre>";

print_r($count);

echo "</pre>";





?>