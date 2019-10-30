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
					<div id="product_box">
						<?php
						//check query by using product_titles
						if(isset($_GET['search'])) {
							$search_query=$_GET['user_query'];
							$get_pro = "select * from products where products_title like '%$search_query%'";
							$run_pro = mysqli_query($con, $get_pro);
							$count_pro=mysqli_num_rows($run_pro);
							if($count_pro==0) {
								//check query by using product types
								$get_type_pro = "select * from brands where brand_title like '%$search_query%'";
								$run_type_pro = mysqli_query($con, $get_type_pro);
								$row_type=mysqli_fetch_array($run_type_pro);		
								$type_id = $row_type['brand_id'];
								$type_pro = "select * from products where products_brand='$type_id'";	
								$run_type = mysqli_query($con, $type_pro);		
								$count__type_pro=mysqli_num_rows($run_type);
								if($count__type_pro==0) {
									echo "<h2 style='padding:20px'>No ads available in this type!!!</h2>";
								}
								else {
								   while($row_pro=mysqli_fetch_array($run_type)) {
									   $pro_id=$row_pro['products_id'];	
									   $pro_cat=$row_pro['products_cat'];
									   $pro_brand=$row_pro['products_brand'];	
									   $pro_title=$row_pro['products_title'];
									   $pro_price=$row_pro['products_price'];	
									   $pro_image=$row_pro['products_image'];
									   echo "<div id='single_product'  class='well well-lg'>
									   <h4>$pro_title</h4>
									   <a href='admin_area/product_images/$pro_image' class='thumbnail'>
									   <img src='admin_area/product_images/$pro_image' class='img-rounded' style='width:220px;height:180px;'/></a>
									   <p><b>Price:$pro_price</b></p>
									   <a class='thumbnail' href='details.php?pro_id=$pro_id' style='float:center;color:#FFA62F;font-weight:bolder;text-decoration:none;'>See Details</a>
									  </div>";	
									}
								}
							}
							while($row_pro=mysqli_fetch_array($run_pro)) {
								$pro_id=$row_pro['products_id'];	
								$pro_cat=$row_pro['products_cat'];
								$pro_brand=$row_pro['products_brand'];	
								$pro_title=$row_pro['products_title'];
								$pro_price=$row_pro['products_price'];	
								$pro_image=$row_pro['products_image'];
								echo "<div id='single_product'  class='well well-lg'>
								<h4>$pro_title</h4>
								 <a href='admin_area/product_images/$pro_image' class='thumbnail'>
								<img src='admin_area/product_images/$pro_image' class='img-rounded' style='width:220px;height:180px;'/></a>
								<p><b>Price:$pro_price</b></p>
								<a class='thumbnail' href='details.php?pro_id=$pro_id' style='float:center;color:#FFA62F;font-weight:bolder;text-decoration:none;'>See Details</a>
								</div>";	
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








