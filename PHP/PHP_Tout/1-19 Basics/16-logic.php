<?php 

// and => &&
echo "<br>" . "AND " . "<br>";
$var1 = true && false;
$var2 = false && false;
$var3 = true && true;
var_dump($var1,$var2,$var3);


echo "<br>" . "OR " . "<br>";
// or => ||
$var1 = true || false;
$var2 = false || false;
$var3 = true || true;
var_dump($var1,$var2,$var3);


// XOR => !
echo "<br>" . "XOR " . "<br>";
$var1 = true xor false;
$var2 = false xor false;
$var3 = true xor true;
var_dump($var1,$var2,$var3);

// diff between XOR, OR


echo "<br>" . "##############################" . "<br>";
$age = 40; 

$skillYears = 6; 

if ($age > 30 xor $skillYears > 2) {

	echo "OR is working";
}
else {
	echo "XOR is working" . "<br>";
}

$solved = "mohamed";


// NOT => !
if($solved != "yasser") {
	echo "true";

}
else {
	echo "false";
}


?>