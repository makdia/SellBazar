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
			<a class="navbar-brand" href="#" id="top_item">Home</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="view_products.php" style="background:#0020C2;">View All Ads</a></li>
				<li><a href="insert_cat.php" style="background:#C04000;">Add New Category</a></li>
				<li><a href="view_cats.php" style="background:#347C17;">View All Categories</a></li>
				<li><a href="#" style="background:#7D1B7E;">Add New Type</a></li>
				<li><a href="view_brands.php" style="background:#810541;">View All Types</a></li>
				<li><a href="view_customers.php" style="background:#935700;">View Users</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right" style="padding-top:5px;">
				<a href="logout.php?">Admin Logout</a>
			</ul>
		</div>
    </div>
</nav>



<div class="main_wrapper" style="margin-left:180px;">
	<div id="admin_area_body" style="margin-bottom:50px;">
		<h2 style="padding:10px;margin:20px;text-align:center;"  bgcolor="#187eae">Add a new Type</h2>
		<form method="post" action="" enctype="multipart/form-data" style="padding:10px;margin-top:50px;margin-bottom:50px;" align="center" border="2" bgcolor="#187eae">
			<label style="float:left;">Select Category:</label>
				<select name="categories_of_type" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;"> <option>Select the category of this type</option>
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
			<label style="float:left;">Add new Type: </label>
			<input name="new_brand" size="50" placeholder="Enter a new Type"  type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
			<input id="change_pass_submit" type="submit" name="add_brand" value="Add Type">
		</form>

	</div>
</div>


<?php include("../includes/footer.php"); ?>


</body>
</html> 


<?php
if(isset($_POST['add_brand'])) {
	$type_cat=$_POST['categories_of_type'];
	$new_brand=$_POST['new_brand'];
	$d=date("Y/m/d");
	$insert_brand="insert into brands (brand_title,cat_id,type_date) values ('$new_brand','$type_cat','$d')";
	$run_brand=mysqli_query($con,$insert_brand);
	if($run_brand) {
		echo"<script>alert('A New Type Has been inserted!')</script>";
		echo"<script>window.open('view_brands.php','_self')</script>";
	}
}
} 
?>