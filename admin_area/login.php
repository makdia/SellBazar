<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="custom_css/style.css" media="all" />
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
 <script src="../bootstrap/js/jquery.js"></script>
 <script src="../bootstrap/js/bootstrap.min.js"></script>
 <title>Shop.com Admin Login</title>
</head>

<body style="background:#663399;">


<div class="container-fluid wrapper" id="admin_login_body">
	<div class="row" >
        <div class="col-sm-12">
			<div class="header_icon">
				<img src="../bootstrap/img/logo1.png"/>
			</div>
			<h1>SHOP.COM</h1>
            <h4><?php echo @$_GET['not_admin']; ?></h4>
            <h4><?php echo @$_GET['logged_out']; ?></h4>      
			<div id="admin_login">
				<h2>Admin Login</h2>
				<form method="post" action="" enctype="multipart/form-data">
					<label>Email :</label>
					<input name="email" placeholder="Enter your email" type="text" required>
					<label>Password :</label>
					<input name="password" placeholder="**********" type="password" required>
					<input id="account_login" name="login" type="submit" value=" Login ">
				</form>
			</div>
		</div> 
    </div> 
</div> 

</body>
</html> 


<?php
session_start();
include("../includes/db.php");
if(isset($_POST['login'])) {
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$sel_user="select * from admins where user_email='$email' AND user_pass='$pass'";
	$run_user=mysqli_query($con,$sel_user);
	$check_user=mysqli_num_rows($run_user);
if($check_user==0) {
	echo"<script>alert('Your Password or Email is wrong,try again!')</script>";
}
else {
	$_SESSION['user_email']=$email;
	echo"<script>alert('You have successfully Logged in!')</script>";
	echo"<script>window.open('index.php','_self')</script>";
}
}
?>
