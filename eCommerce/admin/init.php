<?php

    include 'connect.php';

    // Routes

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

    // Navbar

    if (!isset($noNavbar)) {

        include  $tpl . "navbar.php";
    
    }

    