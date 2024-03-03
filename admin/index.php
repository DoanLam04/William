<?php
	session_start();
    ob_start();

	require('../admin/Lib/coreFunction.php');
	$core = new coreFunction();
    
    if(isset($_COOKIE['ADMIN'])){
        $_SESSION['ADMIN'] = $_COOKIE['ADMIN'];
    }
    if(!isset($_SESSION['ADMIN'])){
        require("../admin/Login.php");
    }
    else{
      
        // header
        require("../admin/Layout/Header.php");

        // content here 
        require("../admin/Layout/Main.php");
        
        // footer
        require("../admin/Layout/Footer.php");
    }
?>