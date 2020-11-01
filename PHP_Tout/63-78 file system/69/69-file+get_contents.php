<?php 
/*
	Syntax: 
	file_get_contents(path,include_path, cpntext,offset, max_length)
*/
echo file_get_contents('yasser.txt') . "<br>";
echo file_get_contents('yasser.txt',false,NULL,14,10) . "<br>";
var_dump(file_get_contents("yasser.txt",false,NULL,7))
//echo file_get_contents('https://elzero.org/');


?>