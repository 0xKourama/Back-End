<?php 

$var1 = "I Love PHP"; //string
$var2 = 100; //Number int 
$var3 = 100.5; //Number float
$var4 = TRUE; //Boolean
$var5 = array(

	"A" => "val1",
	"B" => "val2",
	"C" => "val3",
); //Array
$var6 = Null; //null => empty data type

class Book {
	function Book() {
		$this->genre = "Adventure";
	}
}

$var7 = new Book;  //object

$var8 = mysqli_connect("localhost","yasser","p@$$word","mydb");

$var9 = fopen("yasser.txt", "r");

echo "<h2>Get Type String</h2>";

echo gettype($var1) . "<br>";
echo gettype($var2) . " " . gettype($var3) . "<br>";
echo gettype($var4) . "<br>";
echo gettype($var5) . "<br>";
echo gettype($var6) . "<br>";
echo gettype($var7) . "<br>";
echo gettype($var8) . "<br>";
echo gettype($var9) . "<br>";

echo "<h2>variable dump</h2>";

var_dump($var1); echo "<br>";
var_dump($var2); echo "<br>";
var_dump($var3); echo "<br>";
var_dump($var4); echo "<br>";
var_dump($var5); echo "<br>";
var_dump($var6); echo "<br>";
var_dump($var7); echo "<br>";
var_dump($var8); echo "<br>";
var_dump($var9); echo "<br>";


?>