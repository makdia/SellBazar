<?php
include("includes/db.php");
$nameE=$emailE=$passwordE=$countryE=$cityE=$contactE=$addressE="";
$c_name=$c_email=$c_pass=$c_country=$c_city=$c_contact=$c_address="";
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
				<li class="active"><a href="#">Post Your Ads</a></li>
				<li><a href="find_user.php">Find User</a></li>
			</ul>
		</div>
	</div>
</nav>







<?php
if(isset($_POST['register'])) {
	$c_name=$_POST['c_name'];	
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
	$c_country=$_POST['c_country'];	
	$c_city=$_POST['c_city'];	
	$c_contact=$_POST['c_contact'];	
	$c_address=$_POST['c_address'];
	$d=date("Y/m/d");
	$word=str_word_count($c_address);

          if (!preg_match("/^(?=.*[A-Za-z ])[A-Za-z ]{4,}$/",$c_name)) {
			  $nameE = "Name must be at least 4 character EX-Makdia,Foujia";
		  }
		  
		  else{}
		  if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$c_pass)) {
			  $passwordE = "Password minimum 8 characters with 1 letter and 1 number";
		  }
		  else{}
          if (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
             $emailE = "Invalid email format Ex-makdia@gmail.com";
              }
		  else{}
	      if (!preg_match("/^(?=.*[A-Za-z])[A-Za-z]{2,}$/",$c_country)) {
			  $countryE = "Your country name is wrong Ex-UK,USA,BANGLADESH";
		  }
		  else{}
		   if (!preg_match("/^(?=.*[A-Za-z])[A-Za-z]{4,}$/",$c_city)) {
			  $cityE = "Your city name is wrong";
		  }
		  else{}
		   if (!preg_match("/^(?=.*\d)[\d]{10,}$/",$c_contact)) {
			  $contactE = "Your contact must be at least 10";
		  }
		  else{}
		  
		 if ($word<3) {
			   $addressE = "Address must be at least 3 words";
		  }
	     else{}

           if ((preg_match("/^(?=.*[A-Za-z ])[A-Za-z ]{4,}$/",$c_name)) && (preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$c_pass))&& (filter_var($c_email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^(?=.*[A-Za-z])[A-Za-z]{2,}$/",$c_country)) && (preg_match("/^(?=.*[A-Za-z])[A-Za-z]{4,}$/",$c_city)) && (preg_match("/^(?=.*\d)[\d]{10,}$/",$c_contact))  && ($word>=3)) {
                   $check_customer_email="select * from customers where customer_email='$c_email'";
                   $run_customer_email=mysqli_query($con,$check_customer_email);
                   $count_customer_email=mysqli_num_rows($run_customer_email);
	                       if($count_customer_email==0) {
                                  $insert_c="insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_date)
                                             values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$d')";
                                  $run_c=mysqli_query($con,$insert_c);

                                  $_SESSION['customer_email']=$c_email;
                                  echo "<script>alert('Account has been created successfully!!')</script>";	
                                  echo "<script>window.open('customer/my_account.php','_self')</script>";	
		
	                        }
	                       else {
	                              echo "<script>alert('Please Enter Another Email.This Email Already have Another User!!')</script>";	
                                  //echo "<script>window.open('customer_register.php','_self')</script>";		
		
	                        }
            }
    }
?>





<div class="home_page_body" style="background:#fdedec;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<p style="float:center;text-align:center;padding:5px;font:italic bold 20px Georgia, serif;">For posting your own advertisement, please create an account in SHOP.COM.</p>
				<div id="login">
					<h2 style="text-align:center;padding:10px;">Create an account</h2>
					<form method="post" action="" enctype="multipart/form-data">
						<label style="float:left;">User Name :</label>
						<input name="c_name" value="<?php echo $c_name;?>" placeholder="Enter your name ex-Makdia" type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
						<span class="error"><?php echo $nameE;?></span><br>
						<label style="float:left;">User Email : </label>
						<input name="c_email" value="<?php echo $c_email;?>" placeholder="Enter your email ex-makdia@gmail.com" type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
						<span class="error"><?php echo $emailE;?></span><br>
						<label style="float:left;">Password :</label>
						<input name="c_pass" value="<?php echo $c_pass;?>" placeholder="**********" type="password" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
						<span class="error"><?php echo $passwordE;?></span><br>
						<label style="float:left;">User Country:</label>
						<input name="c_country" value="<?php echo $c_country;?>" placeholder="Enter your country ex-UK" type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
						<span class="error"><?php echo $countryE;?></span><br>
						<label style="float:left;">User City:</label>
						<input name="c_city" value="<?php echo $c_city;?>" placeholder="Enter your city ex-London" type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
						<span class="error"><?php echo $cityE;?></span><br>
						<label style="float:left;">User Contact:</label>
						<input name="c_contact" value="<?php echo $c_contact;?>" placeholder="Enter your contact no ex- 8801840392204" type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
						<span class="error"><?php echo $contactE;?></span><br>
						<label style="float:left;">User Address:</label>
						<input name="c_address" value="<?php echo $c_address;?>" placeholder="Enter your address ex-Road no:11,London,UK" type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
						<span class="error"><?php echo $addressE;?></span><br>
						<input id="account_login" name="register" type="submit" value="Submit">
						<b style="font-size:17px;"><p>Already have an account?</P><a href="customer_login.php" id="create_account">Login</a></b>
					</form>
				</div>
			</div> 
		</div> 
	</div>
</div>
  

<?php include("includes/footer_for_home.php"); ?>


</body>
</html> 