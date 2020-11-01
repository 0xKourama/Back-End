<?php 
/*
	setcookie(name,value,expire,path,domain,secure,httponly);

*/

setcookie("Zero", "Test", time() + 3600, "/","127.0.0.1");

echo "<pre>";

print_r($_COOKIE);

echo "<pre>";


?> 