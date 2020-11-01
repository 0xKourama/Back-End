<?php 

// [ @ ] Error control operator

// $file = @fopen("yasser3.txt","r") or die("This file is not found")

//(@include("inc.php") or die ("This File Is Not Here"));

$server ="localhost";
$user = "Osama";
$pass = "p@55word";
$db = "DB";

@mysqli_connect($server,$user,$pass,$db) or die("there's something wrong with connetion")
?>