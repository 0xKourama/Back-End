<?php 

// global scope

$name = "Yasser";

function testFun() {
	// function scope

	$name = "Mohamed";

	echo "Function Scope : " . $name . "<br>";
	echo "Global Scope : " .  $GLOBALS['name'] . "<br>";

		//$GLOBALS[index]
}

testFun()
?>