<?php 
/*
strtolower(str);
strtoupper(string);
lcfirst(str);
ucfirst(str);
*/
$str = "heLLO i love phP so mucH";

$lower = strtolower($str);
$upper = strtoupper($str);
$first = lcfirst($str);
$first2 = ucfirst($str);
$first3 = ucwords($str);

echo $lower . "<br>";
echo $upper . "<br>";
echo $first . "<br>";
echo $first2 . "<br>";
echo $first3 . "<br>";




?>