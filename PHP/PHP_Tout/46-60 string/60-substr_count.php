<?php
/*
substr_count(haystack, needle,start,length);
*/
$str = "i love php so much beacuse php is famous and cool And Easy Thats why php is the best";

$count = substr_count($str, "php", 5, 70);

echo $count;
?>