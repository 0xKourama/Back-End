<?php 
/*
addslashes(str) 
strip_slashes(str)
strip_tags(str)
*/

$str = "I 'll  Go at 6 o'clock.";

echo $str . "<br>";

$skipped = addslashes($str);

echo $skipped . "<br>"; 

$clean = stripslashes($skipped);

echo $clean . "<br>"; 

$str2 = "i love <b>php</b> go to <a href='php.net'> PHP.net </a>To Learn PHP";

echo $str2 . "<br>";

$stripped = strip_tags($str2, "<b></b>");

echo $stripped;

?>