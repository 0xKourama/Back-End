<?php 
/*
	Syntax: 
		fopen(Handle,length);
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

$fileHandle = fopen("yasser.txt", "r");

$content = fread($fileHandle, filesize('yasser.txt'));

echo $content;

?>