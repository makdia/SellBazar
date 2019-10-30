<?php
$c_email=$c_pass="";
include("includes/top_part.php");
?>



<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>    	
			</button>
			<a class="navbar-brand" href="full_screen_logo.php">Logo</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></a></li>
				<li><a href="all_products.php">All Ads</a></li>
				<li><a href="customer/my_account.php">My Account</a></li>
				<li class="active"><a href="customer_login.php">Post Your Ads</a></li>
				<li><a href="find_user.php">Find User</a></li>
			</ul>
		</div>
	</div>
</nav>


<?php
if(isset($_GET['add_cart'])) {


if(isset($_POST['add_cart_login'])) {
	$c_email=$_POST['email'];
	$c_pass=$_POST['pass'];	
	$sel_c="select * from customers where customer_email='$c_email' AND customer_pass='$c_pass'";
	$run_c=mysqli_query($con,$sel_c);
	$check_customer=mysqli_num_rows($run_c);
	if($check_customer==0) {
		echo "<script>alert('Your Email or Password is incorrect,please try again!!')</script>";	
		//exit();
	}
	else
	if($check_customer>0) {
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('You logged in successfully!!')</script>";	
		echo "<script>window.open('cart.php','_self')</script>";	
	}
}
?>



<div class="home_page_body" style="background:#fdedec;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<p style="float:center;text-align:center;padding:5px;font:italic bold 20px Georgia, serif;margin-top:5px;">To view your advertisement and account details, please login to your SHOP.COM account.</p>
				<div id="login">
					<h2 style="text-align:center;padding:10px;">Login to your account</h2>
					<form method="post" action="" enctype="multipart/form-data">
						<label style="float:left;">User Email :</label>
						<input name="email" value="<?php echo $c_email;?>" placeholder="Enter your email" required type="text" style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
						<label style="float:left;">Password :</label>
						<input name="pass" value="<?php echo $c_pass;?>"  placeholder="**********" type="password" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
						<input id="account_login" name="add_cart_login" type="submit" value=" Login ">
						<b style="font-size:17px;"><p>If you have no account then please</P><a href="customer_register.php" id="create_account">Create an account</a></b>
					</form>
				</div>
			</div> 
		</div> 
	</div>
</div>
  


	
<?php }?>


<?php
if(!isset($_GET['add_cart'])) {


if(isset($_POST['login'])) {
	$c_email=$_POST['email'];
	$c_pass=$_POST['pass'];	
	$sel_c="select * from customers where customer_email='$c_email' AND customer_pass='$c_pass'";
	$run_c=mysqli_query($con,$sel_c);
	$check_customer=mysqli_num_rows($run_c);
	if($check_customer==0) {
		echo "<script>alert('Your Email or Password is incorrect,please try again!!')</script>";	
		//exit();
	}
	else
	if($check_customer>0) {
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('You logged in successfully!!')</script>";	
		echo "<script>window.open('customer/my_account.php','_self')</script>";	
	}
}
?>


<div class="home_page_body" style="background:#fdedec;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<p style="float:center;text-align:center;padding:5px;font:italic bold 20px Georgia, serif;margin-top:5px;">To view your advertisement and account details, please login to your SHOP.COM account.</p>
				<div id="login">
					<h2 style="text-align:center;padding:10px;">Login to your account</h2>
					<form method="post" action="" enctype="multipart/form-data">
						<label style="float:left;">User Email :</label>
						<input name="email" value="<?php echo $c_email;?>" placeholder="Enter your email" required type="text" style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
						<label style="float:left;">Password :</label>
						<input name="pass" value="<?php echo $c_pass;?>"  placeholder="**********" type="password" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
						<input id="account_login" name="login" type="submit" value=" Login ">
						<b style="font-size:17px;"><p>If you have no account then please</P><a href="customer_register.php" id="create_account">Create an account</a></b>
					</form>
				</div>
			</div> 
		</div> 
	</div>
</div>
  
<?php } ?>

<?php include("includes/footer_for_home.php"); ?>


</body>
</html> 








