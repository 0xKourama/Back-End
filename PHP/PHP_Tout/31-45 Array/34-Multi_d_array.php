<?php 


/*
$diet =array(
	array("Apple", "Banana", "Milk"),
	array("Meat", "Apple", "Egg"),
	array("Fish", "Apple"),
	array("Rich", "Apple"),
	array("Bread", "Apple", "Banana"),
	array(
			array(1, 2, 3)
		)
);

echo "<pre>";

print_r($diet);

echo "</pre>";

echo $diet[5][0][2];


*/

$diet = array(
	 "Day One" => array("Apple", "Banana", "Milk"),
	 "Day Two" => array("Meat", "Apple", "Egg"),
	 "Day Three" => array("Fish", "Apple"),
	 "Day Four" => array("Rich", "Apple", array(
	 	"salt"  => "10%",
	 	"sugar" => "20%"
	 )
	)

);


echo "<pre>";

print_r($diet);

echo "</pre>";

echo $diet["Day Four"][2]["salt"];

?>