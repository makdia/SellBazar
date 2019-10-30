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
				<li><a href="view_cats.php" style="background:#347C17;">View All Categories</a></li>
				<li><a href="insert_brand.php" style="background:#7D1B7E;">Add New Type</a></li>
				<li><a href="view_brands.php" style="background:#810541;">View All Types</a></li>
				<li><a href="#" style="background:#935700;">View Users</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right" style="padding-top:5px;">
				<a href="logout.php?">Admin Logout</a>
			</ul>
		</div>
    </div>
</nav>
	
	<h2 id="heading">List of all users</h2>

<?php
$get_c="select * from customers";
$run_c=mysqli_query($con,$get_c);
	
while($row_c=mysqli_fetch_array($run_c)) {
		$c_id=$row_c['customer_id'];	
		$c_name=$row_c['customer_name'];	
		$c_email=$row_c['customer_email'];	
		$c_image=$row_c['customer_image'];	
		
?>
<div id="view_all_user" class="well well-lg">
	<?php
		//if user profile pic is empty then doing this task
			if (empty($c_image)) {	?>
				<a style="float:left;" href="../customer/customer_images/<?php echo 'makdia.png;'?>" class="circle">
				<img src="../customer/customer_images/<?php echo 'makdia.png';?>" class="img-circle" style="width:150px;height:150px;margin-top:10px;margin-left:5px;"/></a>
			<?php }
		//if user profile pic is not empty then doing this task
			else { ?>
				<a style="float:left;" href="../customer/customer_images/<?php echo $c_image;?>" class="circle">
				<img src="../customer/customer_images/<?php echo $c_image;?>" class="img-circle" style="width:150px;height:150px;margin-top:10px;margin-left:5px;"/></a>
			<?php } ?>
	<p style="margin-top:20px;margin-left:170px;color:black;font-weight:bolder;text-decoration:none;text-align:center;"><?php echo $c_name;?></p>
	<p style="margin-top:30px;margin-left:170px;text-align:center;color:black;"><b><?php echo $c_email;?></b></p>
	<a class="thumbnail" href="delete_c.php?delete_c=<?php echo $c_id;?>" style="text-align:center;width:70px;height:30px;float:right;color:#1E90FF;font-weight:bolder;text-decoration:none;padding:2px;font-family:italic;font-size:18px;margin-top:30px;margin-right:80px;">Delete</a>
</div>
<?php } ?>
	


<?php include("../includes/footer.php"); ?>


</body>
</html> 

<?php } ?>
