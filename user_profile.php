<?php include("includes/top_part.php");
$user=$_GET['user_email'];
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
				<li> 
						<?php 
							if(!isset($_SESSION['customer_email'])) {
								echo "   "."<a href='customer_login.php'>Post Your Ads</a>";
							}
							else {
								echo "   "."<a href='customer/my_account.php?insert_product'>Post Your Ads</a>";
						}?>
				</li>
				<!--<li><a href="customer_login.php">Post Your Ads</a></li>-->
				<li class="active"><a href="find_user.php">Find User</a></li>
			</ul>
	        <ul class="nav navbar-nav navbar-right" style="padding:10px">
            <?php if(isset($_SESSION['customer_email'])) {
				user_profile_pic_name();
				}else { }
				if(!isset($_SESSION['customer_email'])) {
					echo "   "."<a href='customer_login.php'>Login</a>";
				}
				else {
					echo "   "."<a href='customer/logout.php'>Logout</a>";
				}?>
			</ul>
		</div>
	</div>
</nav>


<div class="home_page_body" style="height:auto;background:#fdedec;">
	<div class="container-fluid wrapper">
		<div class="row">
			<div class="col-sm-2 sidenav" style="padding:0px;margin:0px;background:#fdedec;border:none;">
				<?php
					$user=$_GET['user_email'];
					$get_img="select * from customers where customer_email='$user'";
					$run_img=mysqli_query($con,$get_img);
					$row_img=mysqli_fetch_array($run_img);
					$c_image=$row_img['customer_image'];
					$c_name=$row_img['customer_name'];
					$c_email=$row_img['customer_email'];
					$c_country=$row_img['customer_country'];
					$c_city=$row_img['customer_city'];
					$c_contact=$row_img['customer_contact'];
					$c_address=$row_img['customer_address'];?>
					<div id="title_user_name"><?php echo $c_name; ?></div>
					<ul id="about_user">
						<?php
						//if user profile pic is empty then doing this task
						if (empty($c_image)) {	
							echo "<a href='customer/customer_images/makdia.png' class='thumbnail' style='padding:3px;'>
							<img src='customer/customer_images/makdia.png' class='img-rounded' style='width:222px;height:180px;'/></a>";
						}
						//if user profile pic is not empty then doing this task
						else {
							echo "<a href='customer/customer_images/$c_image' class='thumbnail' style='padding:3px;'>
							<img src='customer/customer_images/$c_image' class='img-rounded' style='width:222px;height:180px;'/></a>";	
						}
						?>
						<h4 style="text-align:center;color:#FF1493;">User Info</h4>                 
						<label style="float:left;margin-left:3px;">E-mail :</label></br>				  
						<li><?php  echo "$c_email" ?></li><hr style="color: gray; height: 1px; background-color:gray;" />
						<label style="float:left;margin-left:3px;">Contact-no :</label></br>
						<li><?php echo "$c_contact" ?></li><hr style="color: gray; height: 1px; background-color:gray;" />
						<label style="float:left;margin-left:3px;">City :</label></br>
						<li><?php  echo "$c_city" ?></li><hr style="color: gray; height: 1px; background-color:gray;" />
						<label style="float:left;margin-left:3px;">Country :</label></br>
						<li><?php echo "$c_country" ?></li><hr style="color: gray; height: 1px; background-color:gray;" />
						<label style="float:left;margin-left:3px;">Address :</label></br>
						<li><?php echo "$c_address" ?></li><hr style="color: gray; height: 1px; background-color:gray;" />
					</ul>
				</div>
				<div class="col-sm-10">
					<div class="product_area">
						<div id="product_box">
							<?php getUser(); ?>
						</div>
					</div>
				</div>
			</div> 
		</div> 
</div>
  



<?php include("includes/footer_for_home.php"); ?>



</body>
</html> 
