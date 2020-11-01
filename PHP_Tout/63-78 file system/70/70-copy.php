<?php 
/*
	Syntax: copy(source, dest)
	rename(oldname, newname)
*/

//copy("yasser.txt", "yasser_new.txt")

if (!copy("yasser.txt", "yasser_new.txt")) {
	echo "Sorry file not copied";
}
else {
	echo "File han been copied";

}

rename("yasser_new.txt", "yasser_new_2020.txt")

?>