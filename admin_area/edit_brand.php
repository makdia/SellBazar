<?php
session_start();
include("../includes/db.php");
if(!isset($_SESSION['user_email'])) {
	echo"<script>window.open('login.php?not_admin=This service is only for Admin!! If you are an Admin then Logged in by using your Email and Password.','_self')</script>";
}
else {

if(isset($_GET['edit_brand'])) {
	$brand_id=$_GET['edit_brand'];
	$get_brand="select * from brands where brand_id='$brand_id'";
	$run_brand=mysqli_query($con,$get_brand);
	$row_brand=mysqli_fetch_array($run_brand);
	$brand_id=$row_brand['brand_id'];
	$brand_title=$row_brand['brand_title'];
	$brand_cat=$row_brand['cat_id'];


	$get_cat = "select * from categories where cat_id='$brand_cat'";
	$run_cat = mysqli_query($con, $get_cat);
	$row_cat=mysqli_fetch_array($run_cat);
	$category_title = $row_cat['cat_title'];	
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
		<h2 style="padding:10px;margin:20px;text-align:center;"  bgcolor="#187eae">Update Your Type</h2>
		<form method="post" action="" enctype="multipart/form-data" style="padding:10px;margin-top:50px;margin-bottom:50px;" align="center" border="2" bgcolor="#187eae">
			<label>Select Category:</label>
				<select name="edit_categories_of_type" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;"> <option value="<?php echo $brand_cat;?>"><?php echo $category_title; ?></option>
					<?php
						$get_cats = "select * from categories";
						$run_cats = mysqli_query($con, $get_cats);
						while($row_cats=mysqli_fetch_array($run_cats)) {
							$cat_id = $row_cats['cat_id'];
							$cat_title = $row_cats['cat_title'];
						 echo "<option value='$cat_id'>$cat_title</option>";
						}
					?>
				</select>
			<label>Update Type: </label>
			<input name="new_brand" size="50" value="<?php echo $brand_title;?>"  type="text" required>
			<input id="change_pass_submit" type="submit" name="update_brand" value="Update Type">
		</form>
	</div>
</div>

<?php include("../includes/footer.php"); ?>

</body>
</html> 


<?php
if(isset($_POST['update_brand'])) {
	$update_id=$brand_id;
	$new_brand=$_POST['new_brand'];
	$edit_brand_cat=$_POST['edit_categories_of_type'];
	$update_brand="update brands set brand_title='$new_brand',cat_id='$edit_brand_cat' where brand_id='$update_id'";
	$run_brand=mysqli_query($con,$update_brand);
	if($run_brand) {
		echo"<script>alert('A Type Has been updated!')</script>";
		echo"<script>window.open('view_brands.php','_self')</script>";
	}
}
?>
<?php } ?>









 