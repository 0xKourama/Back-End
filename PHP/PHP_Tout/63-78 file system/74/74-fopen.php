<?php 
/*
	Syntax: 
		fopen(filename, mode, include_path,context);

		mode: 
		r 	=> read [must be exist]
		r+ 	=> read and write [must be exist]
		w 	=> write only
		w+  =>  write and read [create file ]
		a 	=> write only
		a+  => write & rade
		x   =>	write Only
		x+  =>	write & Read

*/

$fileHandle = fopen("yasser.txt", "w+")

?>