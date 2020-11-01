<?php 
/*
	Syntax: scandir(directory,sort,context);

*/
$link = __DIR__ . "/yasser";

$files = scandir($link, SCANDIR_SORT_NONE);

echo "<pre>";

print_r($files);

echo "</pre>";

rmdir($link);


?>