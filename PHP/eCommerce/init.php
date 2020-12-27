<?php

    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    include 'admin/connect.php';

    $sessionUser = '';
    // Routes

    if (isset($_SESSION['user'])) {
        $sessionUser = $_SESSION['user'];
    }

    $tpl    = "includes/templates/";   //Template Directory
    $lang   = 'includes/languages/';  //Language Directory
    $func   = 'includes/functions/';
    $css    = "layout/css/";          //css Directory
    $js     = "layout/js/";            // js Directory

    // important file

    include $func . 'function.php';
    include $lang . "english.php";
    include $tpl  . "header.php";    
    //include  "includes/languages/arabic.php";


    