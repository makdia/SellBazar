<?php
include("includes/db.php"); 
include("functions/functions.php");
if(!isset($_SESSION['customer_email'])) {
	echo"<script>window.open('customer_login.php','_self')</script>";
}
else {
?>
<?php include("includes/top_part.php"); ?>

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
				<li><a href="cart.php">Shopping cart</a></li>
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
					
					?>
					</div>
			    </div>
			</div> 
			<div id="top"><a href="#up"><span class="glyphicon glyphicon-chevron-up"></span></a></div> 


		</div>
	</div>
</div>


<?php include("includes/footer_for_home.php"); } ?>


</body>
</html> 















