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
			<a class="navbar-brand" href="index.php" id="top_item">Home</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="view_products.php" style="background:#0020C2;">View All Ads</a></li>
				<li><a href="insert_cat.php" style="background:#C04000;">Add New Category</a></li>
				<li><a href="#" style="background:#347C17;">View All Categories</a></li>
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

	<h2 id="heading">List of all categories</h2>

<?php
$get_cat="select * from categories";
$run_cat=mysqli_query($con,$get_cat);
$i=0;
while($row_cat=mysqli_fetch_array($run_cat)) {
	$cat_id=$row_cat['cat_id'];	
	$cat_title=$row_cat['cat_title'];	
	$i++;
?>

<div id="view_cat_list">
	<div id="cat_list_serial_no"><?php echo $i;?></div>
	<div id="cat_list_title"><?php echo $cat_title;?></div>
	<a class="thumbnail" href="edit_cat.php?edit_cat=<?php echo $cat_id;?>" style="text-align:center;margin-top:107px;float:left;color:#ffffff;background:#008000;font-weight:bolder;text-decoration:none;width:70px;height:50px;padding:10px;font-family:italic;font-size:18px;">Edit</a>
	<a class="thumbnail" href="delete_cat.php?delete_cat=<?php echo $cat_id;?>" style="text-align:center;margin-top:153px;width:70px;height:50px;float:left;color:#ffffff;background:#FFA500;font-weight:bolder;text-decoration:none;padding:10px;font-family:italic;font-size:18px;">Delete</a>
</div>
<hr style="border:1px dashed #4B0082;width:350px;color:#348017;height:1px;background-color:#348017;margin-left:500px;margin-right:450px;margin-top:0px;"/>
<?php } ?>


<?php include("../includes/footer.php"); ?>

</body>
</html> 

<?php } ?>


