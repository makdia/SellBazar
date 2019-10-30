<?php
session_start();
include("../functions/functions.php");
if(!isset($_SESSION['user_email'])) {
	echo"<script>window.open('login.php?not_admin=This service is only for Admin!! If you are an Admin then Logged in by using your Email and Password.','_self')</script>";
}
else {
?>

<?php include("../includes/style_part.php"); ?>
   

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>    	
			</button>
			<a class="navbar-brand" href="#" id="top_item">Home</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="view_products.php" style="background:#0020C2;">View All Ads</a></li>
				<li><a href="insert_cat.php" style="background:#C04000;">Add New Category</a></li>
				<li><a href="view_cats.php" style="background:#347C17;">View All Categories</a></li>
				<li><a href="insert_brand.php" style="background:#7D1B7E;">Add New Type</a></li>
				<li><a href="view_brands.php" style="background:#810541;">View All Types</a></li>
				<li><a href="view_customers.php" style="background:#935700;">View Users</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right" style="padding-top:5px;">
				<a href="logout.php?">Admin Logout</a>
			</ul>
		</div>
    </div>
</nav>

<div class="admin_home_page_body">
	<h2 id="admin_home_page_heading">WELCOME ADMIN</h2>
	<div class="admin_body_one" style="margin-left:390px;margin-bottom:40px;">
			<div class="d1"><div id="admin_home_page_t1">Total Ads</div> <div id="admin_home_page_item1"><?php total_items(); ?></div> </div>
			<div class="d2"><div id="admin_home_page_t2">Total Users</div> <div id="admin_home_page_item2"><?php total_users(); ?></div> </div>
			<div class="d3"><div id="admin_home_page_t3">Total Categories</div> <div id="admin_home_page_item3"><?php total_cats(); ?></div> </div>
			<div class="d4"><div id="admin_home_page_t4">Total Types</div> <div id="admin_home_page_item4"><?php total_brands(); ?></div> </div>
			<div class="d6"><div id="admin_home_page_t6">New Ads</div> <div id="admin_home_page_item6"><?php ads_date(); ?></div> </div>
			<div class="d7"><div id="admin_home_page_t7">New Users</div> <div id="admin_home_page_item7"><?php user_date(); ?></div> </div>
			<div class="d8"><div id="admin_home_page_t8">New Categories</div> <div id="admin_home_page_item8"><?php cat_date(); ?></div> </div>
			<div class="d9"><div id="admin_home_page_t9">New Types</div> <div id="admin_home_page_item9"><?php type_date(); ?></div> </div>
	</div>
</div>

<?php include("../includes/footer.php"); ?>

</body>
</html> 

<?php 
} 
?>
