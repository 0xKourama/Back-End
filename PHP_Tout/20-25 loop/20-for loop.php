<?php 

/*

	syntax: for(inital value;condition;counter) {
		//code
	}

*/
	/*

for ($i=1; $i <= 20 ; $i++) { 
		echo $i . "<br>";
	}
	<select>
	<?php 

		for ($year=1900; $year <= 2015; $year++) { 

			echo "<option>" . $year . "</option>";
		}

	?>
</select>
	*/

$langs = array("Html","Css","JavaScript", "Ajax","Python","Ruby","MySQl");

echo "<ul>";
	
		for ($i=0; $i < count($langs); $i++) { 
			echo "<li>" . $langs[$i] . "</li>";
		}
echo "</ul>";








?>
