<?php 


// echo  dirname(__FILE__);

$file = "yasser.txt";

//if(file_exists($file)) {
if(is_writable($file)) {
	echo "Good The File [ " . $file . "] Is Found and is writable";

	//file_put_contents($file, "added with php file put contents");
	file_put_contents($file, "file is writable");
}
else {
	echo "Good The File [ " . $file . "] Is Not Found But i created it with php and not writable";

	file_put_contents($file, "is not writable");
}


?>