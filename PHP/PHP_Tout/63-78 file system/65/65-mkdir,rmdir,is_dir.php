<?php 

$name = "Osama";

//mkdir($name);
rmdir($name);

//echo "The Directory " . $name . " Is Created";
//echo "The Directory " . $name . " Is Deleted";

if (is_dir($name)) {
	rmdir($name); 

	echo "The Directory " . $name . " Is Deleted";
}
else {

	mkdir($name);
	//echo "There\'s No Directory with this name  ". $name;
	echo "There\'s Directory Is Created  ". $name;
}
?>