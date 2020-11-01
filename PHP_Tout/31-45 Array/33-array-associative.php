 <?php 

$langs = array(
	"Html"  	=> "60%",
	"Html5"  	=> "70%",
	"Css"  		=> "65%",
	"Css3"  	=> "60%",
	"Js"  		=> "65%",
	"PHP"  		=> "80%",
	"Python"  	=> "90%",
	"Ruby"  	=> "40%"
);

$langs["MySQL"] = "75%";

echo "<ul>";
	foreach ($langs as $lang => $progrss) {
		echo "<li>" . $lang . " => " . $progrss . "</li>";
	}
echo "</ul>";


 ?>