<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $css ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $css ?>front.css">
    <title><?php echo getTitle() ?></title>
    <style>
        /* Start Main Rulez */

body {
	background-color: #F4F4F4;
	font-size: 16px;
	height: 3000px;
}

h1 {
	font-size: 55px;
	margin: 40px 0;
	font-weight: bold;
	color: #666;
}

.input-container {
	position: relative;
}

.asterisk {
    font-size: 20px;
    position: absolute;
    right: 10px;
    top: 7px;
    color: #D20707;
}

.main-form .asterisk {
    font-size: 30px;
    position: absolute;
    right: 30px;
    top: 8px;
    color: #D20707;
}

.nice-message {
	padding: 10px;
	background-color: #FFF;
	margin: 10px 0;
	border-left: 5px solid #080;
}

/* End Main Rulez */

/* Start Bootstrap Edits */

.navbar {
	border-radius: 0;
	margin-bottom: 0;
}

.nav > li > a,
.navbar-brand {
	padding: 15px 12px;
}

.navbar-brand {
	font-size: 1em;
}

.navbar-inverse .navbar-nav > .open>a,
.navbar-inverse .navbar-nav > .open>a:focus,
.navbar-inverse .navbar-nav > .open>a:hover,
.dropdown-menu {
    background-color: #3498db;
}

.dropdown-menu {
	min-width: 180px;
	padding: 0;
	font-size: 1em;
	border: none;
	border-radius: 0;
}

.dropdown-menu > li > a {
	color: #FFF;
	padding: 10px 15px;
}

.dropdown-menu > li > a:focus,
.dropdown-menu > li > a:hover {
    color: #FFF;
    background-color: #8e44ad;
}

.form-control {
	position: relative;
}

/* End Bootstrap Edits */

/* Start Header */

.upper-bar {
	padding: 10px;
	background-color: #FFF
}

.my-image {
	width: 32px;
	height: 32px;
}

/* End Header */

/* Start Login Page */

.login-page form {
	max-width: 380px;
	margin: auto;
}

.login-page form input {
	margin-bottom: 10px;
}

.login-page [data-class="login"].selected {
	color: #337AB7;
}

.login-page [data-class="signup"].selected {
	color: #5cb85c;
}

.login-page h1 {
	color: #C0C0C0;
}

.login-page h1 span {
	cursor: pointer;
}	

/*
.login-page .signup {
	display: none;
}
*/

.the-errors .msg {
    padding: 10px;
    text-align: left;
    background-color: #fff;
    margin-bottom: 8px;
    border-right: 1px solid #e0e0e0;
    border-top: 1px solid #e0e0e0;
    border-bottom: 1px solid #e0e0e0;
    color: #919191;
}

.the-errors .error {
    border-left: 5px solid #cd6858
}

/* End Login Page */

/* Start Categories Page */

.item-box {
	position: relative;
}

.item-box .price-tag {
    background-color: #B4B4B4;
    padding: 2px 10px;
    position: absolute;
    left: 0;
    top: 10px;
    font-weight: bold;
    color: #FFF;
}

.item-box .approve-status {
    position: absolute;
    top: 40px;
    left: 0;
    background-color: #b85a5a;
    color: #FFF;
    padding: 3px 5px;
}

.item-box .caption p {
	height: 44px;
	max-height: 44px;
}

/* End Categories Page */

/* Start Profile Page */

.information {
	margin-top: 20px
}

.information ul {
	padding: 0;
	margin: 0;
}

.information ul li {
	padding: 10px;
}

.information ul li:nth-child(odd) {
	background-color: #EEE;
}

.information ul li span {
	display: inline-block;
	width: 120px;
}

.thumbnail .date {
	text-align: right;
	font-size: 13px;
	color: #AAA;
	font-weight: bold;
}

.information .btn {
	margin-top: 10px;
}

/* End Profile Page */

/* Start Show Item Page */

.item-info h2 {
	padding: 10px;
	margin: 0;
}

.item-info p {
	padding: 10px;
}

.item-info ul li { 
	padding: 10px;
}

.item-info ul li:nth-child(odd) {
	background-color: #e8e8e8;
}

.item-info ul li span {
	display: inline-block;
	width: 120px;
}

.tags-items a {
    display: inline-block;
    background-color: #e2e2e2;
    padding: 2px 10px;
    border-radius: 5px;
    color: #666;
    margin-right: 5px;
}

.add-comment h3 {
	margin: 0 0 10px;
}

.add-comment textarea {
	display: block;
	margin-bottom: 10px;
	width: 500px;
	height: 120px;
}

.comment-box {
	margin-bottom: 20px;
}

.comment-box img {
	max-width: 100px;
	margin-bottom: 10px;
}

.comment-box .lead {
	background-color: #e0e0e0;
	position: relative;
	padding: 10px;
	margin-top: 25px;
}

.comment-box .lead:before {
    content: "";
    width: 0;
    height: 0;
    border-width: 15px;
    border-style: solid;
    border-color: transparent #e0e0e0 transparent transparent;
    position: absolute;
    left: -28px;
    top: 10px;
}

/* End Show Item Page */

/* Start Our Custom */

.custom-hr {
	border-top: 1px solid #c9c9c9;
}

/* End Our Custom */
    </style>
</head>

<body>
    <div class="upper-bar">
        <div class="container">
            <?php
                if (isset($_SESSION['user'])) { ?>

                <img src="img.png" class="my-image img-thumbnail img-circle">
                <div class="btn-group my-infio">
                    <span class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo $_SESSION['user'] ?>
                        <span class="caret"></span>
                    </span>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php">My Profile</a></li>
                        <li><a href="newad.php">New Item</a></li>
                        <li><a href="profile.php#my-ads">My Items</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>

                <?php

                } else {
            ?>
                <a href="login.php">
                    <span class="pull-right">Login / Signup</span>
                </a>
            <?php } ?>
        </div>
    </div>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Homepage</a>
            </div>
            <div class="collapse navbar-collapse " id="app-nav">
                <ul class="nav navbar-nav navbar-right">
                <?php
                    // includes\functions\function.php
                    foreach(getCat() as $cat) 
                    {
                    echo '<li><a  href="categories.php?pageid=' . $cat['ID'] . ' ">' 
                                    . $cat['Name'] . 
                                '</a></li>';
                    }
                ?>
                </ul>
            </div>
        </div>
    </nav>