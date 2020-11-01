<?php 

$do = '';

if(isset($_GET['do'])) {

    $do=  $_GET['do'];

}
else {
    $do = 'Manage';
}

if ($do == 'Manage') {
    
    echo "Welcome we are in Manage Category Page";
    echo "<a href='?do=Insert'>Add New Category +</a>";

}
elseif ($do == 'Add') {
    echo "Welcome we are in Add Category Page";
}
elseif ($do == 'Insert') {
    echo "Welcome we are in Insert Category Page";
}
else {
    echo "Error There's No page with this name";
}

?>