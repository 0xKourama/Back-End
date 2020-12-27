<?php

$admins = array("osama","hassan","sayed");


//$username = $_GET['username'];
$username = $_POST['username'];

if (in_array($username, $admins)) {
	echo "Welcome" . $username . " To Control Panel For Admins";
} else {
	echo "sorry username is not exsist in our app";
}

?>