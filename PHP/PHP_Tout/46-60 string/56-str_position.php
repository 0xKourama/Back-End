<?php 
/*
	strpos(haystack, needle)
	stripos(haystack, needle)
	strrpos(haystack, needle)
	strripos(haystack, needle)
*/
$str = "I Love PHP So much beacuse php is Famous and cook language";

$pos = stripos($str,"PHP",15);

echo $pos;

?>