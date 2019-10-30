<?php
session_start();
include("../includes/db.php");
if(!isset($_SESSION['user_email'])) {
	echo"<script>window.open('login.php?not_admin=This service is only for Admin!! If you are an Admin then Logged in by using your Email and Password.','_self')</script>";
}
else {
	
if(isset($_GET['edit_cat'])) {
	$cat_id=$_GET['edit_cat'];
	$get_cat="select * from categories where cat_id='$cat_id'";
	$run_cat=mysqli_query($con,$get_cat);
	$row_cat=mysqli_fetch_array($run_cat);
	$cat_id=$row_cat['cat_id'];
	$cat_title=$row_cat['cat_title'];
}
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
				<li><a href="view_products.php" style="background:#0020C2;">View All Ads</a></li>
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



<div class="main_wrapper" id="edit_wrapper">
	<div id="admin_area_body">
		<h2 style="padding:10px;margin:20px;text-align:center;"  bgcolor="#187eae">Update Your Category</h2>
		<form method="post" action="" enctype="multipart/form-data" style="padding:10px;margin-top:50px;margin-bottom:50px;" align="center" border="2" bgcolor="#187eae">
			<label style="float:center;">Update Category: </label>
			<input name="new_cat" size="50" value="<?php echo $cat_title;?>"  type="text" required>
			<input id="change_pass_submit" type="submit" name="update_cat" value="Update Category">
		</form>
	</div>
</div>



<?php include("../includes/footer.php"); ?>



</body>
</html> 


<?php
if(isset($_POST['update_cat'])) {
	$update_id=$cat_id;
	$new_cat=$_POST['new_cat'];
	$update_cat="update categories set cat_title='$new_cat' where cat_id='$update_id'";
	$run_cat=mysqli_query($con,$update_cat);
	if($run_cat) {
		echo"<script>alert('Category Has been updated!')</script>";
		echo"<script>window.open('view_cats.php','_self')</script>";
	}
}
} 
?>







