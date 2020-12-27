<?php 

/*

fseek(handle, offset,whence)
	whence: 
		SEEK_SET
		SEEK_CUR
		SEEK_END

*/

//$filehandle = fopen("yasser.txt", "r+");
$filehandle = fopen("yasser2.txt", "r+");

//fseek($filehandle, 2, SEEK_SET); 
fseek($filehandle, 3); 

$fwrite = fwrite($filehandle, "m");

fseek($filehandle, 7, SEEK_CUR); 

$fwrite = fwrite($filehandle, "m");


 
?>