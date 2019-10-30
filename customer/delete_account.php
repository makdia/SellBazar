<?php
session_start();
include("../includes/db.php");
if(!isset($_SESSION['customer_email'])) {
	echo"<script>window.open('../customer_login.php','_self')</script>";
}
else {
	
	$user=$_SESSION['customer_email'];
	$delete_customer="delete from customers where customer_email='$user'";
	$run_customer=mysqli_query($con,$delete_customer);
	echo "<script>alert('Your account has been deleted!!!')</script>";
	echo "<script>window.open('logout.php','_self')</script>";	
}
?>


