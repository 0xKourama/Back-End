<?php 


/*
	syntax: definde(Name, Value, case insensitive)
	by default: false
*/


// CONSTANTS
$firstName = "yasser";
echo $firstName . "<br>"; // Variable

echo "<br>";

define("FIRST_NAME", "yasser", false ); //false 
echo FIRST_NAME; // Constant

echo "<br>";

define("LAST_NAME", "elsnbary", true ); //true
echo Last_Name; // Constant

echo "<br>";

define("FIRST_NAME", "mohamed", false );
echo FIRST_NAME; // Constant

echo "<br>";

// predfined constans

echo PHP_INT_MAX;

echo "<br>"; 

echo __FILE__;

echo "<br>"; 

echo __DIR__;

echo "<br>"; 

echo __LINE__;

// const

const FNAME = "yasser mohamed elsnbary";

echo FNAME;

?>