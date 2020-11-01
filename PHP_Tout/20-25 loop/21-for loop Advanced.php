<?php

	/*
		for ($i=1; $i <= 20 ; $i++) { 
			echo $i . "<br>";
		}
	*/
	$i = 1; // First Expression [ Initial counter ]

	for (;;) { 
		if ( $i > 20 ) {// Second Expression [ Condition ]
			break;
		}
		echo $i . "<br>";

		$i++; // Third Expression [ Increment ]
	}
?>