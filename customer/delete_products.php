<?php
session_start();
include("../includes/db.php");
if(!isset($_SESSION['customer_email'])) {
	echo"<script>window.open('../customer_login.php','_self')</script>";
}
else {

	if(isset($_GET['delete_pro'])) {
		$delete_id=$_GET['delete_pro'];
		$delete_pro="delete from products where products_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_pro);
		if($run_delete) {
			echo"<script>alert('A Product Has been deleted!')</script>";
			echo"<script>window.open('my_account.php','_self')</script>";
		}
    }
}
?>
