<?php 

/*
	implode(glue, array)
*/

$arr = array("yasser","mohamed","elsnbary","ali","belal");

$str = implode(" & ", $arr);
$str1 = join(" & ", $arr);

echo "Hello Our Moderators Is: " . $str1;


?>