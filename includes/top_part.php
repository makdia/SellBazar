<?php
session_start();
include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/style.css" media="all" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <title>SHOM DOT COM</title> 
<style>
 .affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }
  
  .affix + .container-fluid + .jumbotron + .home_page_body{
     position: relative;
     top: 50px;
  }
  .jumbotron {
      margin-bottom: 0;
	  background:#663399;
	  color:white;
    }
	
  .navbar {
      margin-bottom: 0;
      border-radius: 0;
	 
	 
    }

	.navbar-brand {
		font-size:18px;
		font-family:COMIC SANS MS;	
   }
	#myNavbar {
		font-size:18px;
		font-family:COMIC SANS MS;	
   }
	#myNavbar a:hover{
		color:#FF1493;
		font-weight:bolder;	
		font-family: "Times New Roman", Georgia, Serif;
	}

	.sidenav {
		  padding:0px;
		  margin:0px;
		  background:white;
		  border:1px dashed #008B8B;
			  
	}
	.product_area {
		  padding:0px;
		  margin:0px;
		  background-color:#fdedec;
	}

</style>  
</head>

<body id="up"> 

<div class="jumbotron">
	<div class="header_wrapper">
		<h1  style="font:italic bold 50px Georgia, serif;"><img src="bootstrap/img/logo1.png"  style="float:center;width:55px;height:70px;margin-right:10px;padding-bottom:10px;"/>SHOP.COM</h1>
	</div>
</div>

