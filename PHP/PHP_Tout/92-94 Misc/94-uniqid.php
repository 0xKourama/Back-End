<?php
/*
	syntax:
		uniqid(prefix, more_entropy);
		
*/

$random = uniqid("script_1",False);

echo $random . "<br>";

var_dump($random);

?>