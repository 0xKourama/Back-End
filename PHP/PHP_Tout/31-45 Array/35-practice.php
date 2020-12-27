<?php 

$diet = array(
	 "Day1" => array("Apple", "Banana", "Milk"),
	 "Day2" => array("Meat", "Apple", "Egg"),
	 "Day3" => array("Fish", "Apple"),	 
);

echo "<pre>";

print_r($diet);

echo "</pre>";

foreach ($diet as $day => $food) {
	echo "<h3>In" . $day . " I will Eat:</h3>";
 
	foreach ($food as $item) {
		echo "- " . $item . "<br>";
	}
}



?>
