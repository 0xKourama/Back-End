<?php 

/*
	parse_str(String, Array)
	nl2br(string)

*/
$link = "name=yasser&age=32&year=2015&skill=2";

parse_str($link,$myarray); 

echo "<pre>";

print_r($myarray);

echo "</pre>";

$str = "Hello I Love PHP \n Although \n I Love Js \n \n";

echo nl2br($str,true);

?>