<?php 
/*
	Syntax: 
		fopen(Handle,length);
		fread(handel, length)
		fwrite(handel, string, length)
		Modes: 
		r 	=> read [must be exist]
		r+ 	=> read and write [must be exist]
		w 	=> write only
		w+  =>  write and read [create file ]
		a 	=> write only
		a+  => write & raade
		x   =>	write Only
		x+  =>	write & Read

*/

$fileHandle = fopen("yasser.txt", "r+");

$read = fread($fileHandle, filesize('yasser.txt'));

echo 'Original Content Of The File before replacement is: <be>' . $read;

$write = fwrite($fileHandle, 'This Is The New Text');

?>