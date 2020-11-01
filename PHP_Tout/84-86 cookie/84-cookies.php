<?php 
/*
	setcookie(name,value,expire,path,domain,secure,httponly);

*/

setcookie("zero","test",time()+3600,"/");

if (count($_COOKIE) > 0) {
	echo "good the cookies are enables for this website";
} else {
	echo "sorry cookies are not enabled please enable it for best browsing";
}
?> 