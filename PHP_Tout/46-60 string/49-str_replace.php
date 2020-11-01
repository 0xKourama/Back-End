<?php 

/*
	str_replace(search, replace, subject)
*/

	$str= "I Love php too much because php is good and easy language";

	echo $str . "<br>";

	$str2 = str_replace("php","javaScript",$str, $i);
	$str3 = str_replace(array("php","is","easy"),"Replaced",$str, $j);


	echo $str2 . " count : " . $i . "<br>";
	echo $str3 . " count : " . $j . "<br>";


?>