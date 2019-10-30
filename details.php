<?php
include("includes/top_part.php");
include("includes/db.php");
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
				<li class="active"><a href="index.php">Home</a></a></li>
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
				<li><a href="find_user.php">Find User</a></li>
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
		   <div class="col-sm-2 sidenav">
				<?php get_cat_get_type(); ?>
		   </div>
		   <div class="col-sm-10">
				<div class="product_area">
					<div id="shopping_cart">
						<p style="float:left;margin-left:15px;color:white;font:italic bold 20px Georgia, serif;"><b>Our available products are: <?php total_items();?></b></p>
						<form  method="get" action="result.php" enctype="multipart/form-data">
							<input id="searching_product" type="text" name="user_query" placeholder="Search a product" />
							<input id="search_submit" type="submit" name="search" value="Search"/>
						</form>
					</div>
					<div id="details_box">
						<?php
						if(isset($_GET['pro_id'])) {
							$product_id=$_GET['pro_id'];
							$get_pro = "select * from products where products_id='$product_id'";
							$run_pro = mysqli_query($con, $get_pro);
							while($row_pro=mysqli_fetch_array($run_pro)) {
								$pro_id=$row_pro['products_id'];	
								$pro_title=$row_pro['products_title'];
								$pro_price=$row_pro['products_price'];	
								$pro_image=$row_pro['products_image'];
								$pro_desc=$row_pro['products_desc'];
								$pro_condition=$row_pro['products_keywords'];
								$pro_email=$row_pro['products_email'];
								$pro_seen=$row_pro['products_seen'];
								$seen_no=$pro_seen+1;
								echo "<p style='float:right;margin-right:15px;color:#1E90FF;font:italic bold 20px Georgia, serif;'><b>No of views: $seen_no</b></p>";
								$update_product="update products set products_seen='$seen_no' where products_id='$product_id'";	
								$run_product=mysqli_query($con,$update_product);
								echo "<div id='view_single_product'  class='well well-lg'>
								<h4>$pro_title</h4>
								 <a href='admin_area/product_images/$pro_image' class='thumbnail'>
								<img src='admin_area/product_images/$pro_image' class='img-rounded' style='width:450px;height:300px;'/></a>
								<p><b>Price:$pro_price</b></p>
								<p><b>$pro_desc</b></p>
								<p><b>Condition:$pro_condition</b></p>
								<p><b>Seller-email: $pro_email</b>
								</p><a class='thumbnail' href='user_profile.php?user_email=$pro_email' style='float:center;color:#c15852;font-weight:bolder;text-decoration:none;'>Visit User Profile</a>
								</div>";
							}
						}
						//getBrandPro();
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

