<?php
session_start();
include("../includes/db.php");
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
			<a class="navbar-brand" id="top_item" href="index.php" >Home</a>
		</div>
        <div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="#" style="background:#0020C2;">View All Ads</a></li>
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

<div class="home_page_body" style="height:auto;margin-left:20px;">         
<?php 	
$get_pro="select * from products";
$run_pro=mysqli_query($con,$get_pro);
$i=0;
while($row_pro=mysqli_fetch_array($run_pro)) {
	$pro_id=$row_pro['products_id'];	
	$pro_title=$row_pro['products_title'];	
	$pro_image=$row_pro['products_image'];	
	$pro_price=$row_pro['products_price'];	
	$i++;
 
	echo "<div id='single_product'  class='well well-lg'>
	<b style='color:black;'>Ads No:$i</b>
	<h4 style='margin-bottom:3px;'>$pro_title</h4>
	<a href='product_images/$pro_image' class='thumbnail'>
	<img src='product_images/$pro_image' class='img-rounded' style='width:220px;height:180px;'/></a>
	<p style='padding:0px;margin:0px;'><b>Price:$pro_price</b></p>
	<a class='thumbnail' href='edit_pro.php?edit_pro=$pro_id;' style='float:left;color:#1E90FF;font-weight:bolder;text-decoration:none;'>Edit</a>
	<a class='thumbnail' href='delete_pro.php?delete_pro=$pro_id;' style='float:right;color:#1E90FF;font-weight:bolder;text-decoration:none;'>Delete</a>
	</div>";
}  
} 
?>
</div>

<?php include("../includes/footer.php"); ?>

</body>
</html> 





