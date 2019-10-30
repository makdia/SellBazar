<?php
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
			<div class="col-sm-12">
                <div class="product_area">
					<div id="find_user_search_box">
						<form  method="get" action="search_user.php" enctype="multipart/form-data">
						<input id="searching_user" type="text" name="user_query" placeholder="Search an user"/>
						<input id="search__user_submit" type="submit" name="search" value="Search"/>
						</form>
					</div>
					<div id="search_box">
						<?php
						global $con;
						if(isset($_GET['search'])) {
						//if user logged in then doing this task
							if(isset($_SESSION['customer_email'])) {
								//here i add ($user) and (where customer_email!='$user') for not showing current login user
								$user=$_SESSION['customer_email'];
								$search_query=$_GET['user_query'];
								$get_user = "select * from customers where customer_email!='$user' AND customer_name like '$search_query%' or customer_city like '$search_query%' or customer_country like '$search_query%'";
								$run_pro = mysqli_query($con, $get_user);
								//if no user found then doing this task
								$count_user=mysqli_num_rows($run_pro);
								if($count_user==0) {
										echo "<h2 style='padding:20px;text-align:left;margin-top:55px;margin-bottom:96px;'>No Users found!!!Please give correct user name....</h2>";
								}
								while($row_pro=mysqli_fetch_array($run_pro)) {
									$c_id=$row_pro['customer_id'];	
									$c_name=$row_pro['customer_name'];
									$c_email=$row_pro['customer_email'];	
									$c_image=$row_pro['customer_image'];
									$c_address=$row_pro['customer_address'];
									echo "</br>";
									//if user profile pic is empty then doing this task
									if (empty($c_image)) {
										echo "<div id='find_user' class='well well-lg'>
										<a style='float:left;' href='user_profile.php?user_email=$c_email'' class='thumbnail'><img src='customer/customer_images/makdia.png' class='img-rounded' style='width:150px;height:150px;'/></a>
										<a class='thumbnail' href='user_profile.php?user_email=$c_email' style='margin-top:20px;margin-left:170px;color:#1E90FF;font-weight:bolder;text-decoration:none;'>$c_name</a>
										<p style='margin-top:30px;margin-left:150px;'><b>From : $c_address</b></p>
										</div>";		
									}
									//if user profile pic is not empty then doing this task
									else {
										echo "<div id='find_user' class='well well-lg'>
										<a style='float:left;' href='user_profile.php?user_email=$c_email'' class='thumbnail'><img src='customer/customer_images/$c_image' class='img-rounded' style='width:150px;height:150px;'/></a>
										<a class='thumbnail' href='user_profile.php?user_email=$c_email' style='margin-top:20px;margin-left:170px;color:#1E90FF;font-weight:bolder;text-decoration:none;'>$c_name</a>
										<p style='margin-top:30px;margin-left:150px;'><b>From : $c_address</b></p>
										</div>";	
									}
								}
							}
							//if user not logged in then doing this task
							else if(!isset($_SESSION['customer_email'])) {
								$search_query=$_GET['user_query'];
								$get_user = "select * from customers where customer_name like '$search_query%' or customer_city like '$search_query%' or customer_country like '$search_query%'";
								$run_pro = mysqli_query($con, $get_user);
								//if no user found then doing this task
								$count_user=mysqli_num_rows($run_pro);
								if($count_user==0) {
										echo "<h2 style='padding:20px;text-align:left;margin-top:55px;margin-bottom:96px;'>No Users found!!!Please give correct user name....</h2>";
								}
								while($row_pro=mysqli_fetch_array($run_pro)) {
									$c_id=$row_pro['customer_id'];	
									$c_name=$row_pro['customer_name'];
									$c_email=$row_pro['customer_email'];	
									$c_image=$row_pro['customer_image'];
									$c_address=$row_pro['customer_address'];
									echo "</br>";
									//if user profile pic is empty then doing this task
									if (empty($c_image)) {
										echo "<div id='find_user' class='well well-lg'>
										<a style='float:left;' href='user_profile.php?user_email=$c_email'' class='thumbnail'><img src='customer/customer_images/makdia.png' class='img-rounded' style='width:150px;height:150px;'/></a>
										<a class='thumbnail' href='user_profile.php?user_email=$c_email' style='margin-top:20px;margin-left:170px;color:#1E90FF;font-weight:bolder;text-decoration:none;'>$c_name</a>
										<p style='margin-top:30px;margin-left:150px;'><b>From : $c_address</b></p>
										</div>";		
									}
									//if user profile pic is not empty then doing this task
									else {
										echo "<div id='find_user' class='well well-lg'>
										<a style='float:left;' href='user_profile.php?user_email=$c_email'' class='thumbnail'><img src='customer/customer_images/$c_image' class='img-rounded' style='width:150px;height:150px;'/></a>
										<a class='thumbnail' href='user_profile.php?user_email=$c_email' style='margin-top:20px;margin-left:170px;color:#1E90FF;font-weight:bolder;text-decoration:none;'>$c_name</a>
										<p style='margin-top:30px;margin-left:150px;'><b>From : $c_address</b></p>
										</div>";	
									}
								}	
							}
						}
						?>
					</div>
				</div>
			</div>
		</div> 
	</div> 
</div>
  

<?php include("includes/footer_for_home.php"); ?>



</body>
</html> 
















