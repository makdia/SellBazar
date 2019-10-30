<?php
session_start();
include("../includes/db.php");
if(!isset($_SESSION['user_email'])) {
	echo"<script>window.open('login.php?not_admin=This service is only for Admin!! If you are an Admin then Logged in by using your Email and Password.','_self')</script>";
}
else {
?>


<?php
if(isset($_GET['edit_pro'])) {
	$get_id=$_GET['edit_pro'];
	$get_pro="select * from products where products_id='$get_id'";
	$run_pro=mysqli_query($con,$get_pro);
	$row_pro=mysqli_fetch_array($run_pro);
	$pro_id=$row_pro['products_id'];	
	$pro_title=$row_pro['products_title'];	
	$pro_image=$row_pro['products_image'];	
	$pro_price=$row_pro['products_price'];	
	$pro_desc=$row_pro['products_desc'];	
	$pro_keywords=$row_pro['products_keywords'];	
	$pro_brand=$row_pro['products_brand'];	
	$pro_cat=$row_pro['products_cat'];	

	$get_cat = "select * from categories where cat_id='$pro_cat'";
	$run_cat = mysqli_query($con, $get_cat);
	$row_cat=mysqli_fetch_array($run_cat);
	$category_title = $row_cat['cat_title'];	
	$get_brand = "select * from brands where brand_id='$pro_brand'";		
	$run_brand = mysqli_query($con, $get_brand);
	$row_brand=mysqli_fetch_array($run_brand);		
	$brand_title = $row_brand['brand_title'];	
}
?>


<?php include("../includes/style_part.php"); ?>


<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
tinymce.init({selector:'textarea'});
</script>


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
		<h2 style="text-align:center;padding:10px;">Update Your Ads</h2>
		<form method="post" action="" enctype="multipart/form-data">
			<label>Ads Title:</label>
			<input name="product_title" value="<?php echo $pro_title; ?>" type="text" required>
			<label>Ads Category:</label>
				<!-- if user not given new category it takes ($pro_cat) which is the id of previous category--> 
				<select name="product_cat" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;"> <option value="<?php echo $pro_cat; ?>"><?php echo $category_title; ?></option>
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

			<label>Ads Type:</label>
				<!-- if user not given new type it takes ($pro_brand) which is the id of previous type--> 
				<select name="product_brand" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;"> <option value="<?php echo $pro_brand; ?>"><?php echo $brand_title; ?></option>
					<?php
					$get_brands = "select * from brands";
						$run_brands = mysqli_query($con, $get_brands);
						while($row_brands=mysqli_fetch_array($run_brands)) {
							
							
							$brand_id = $row_brands['brand_id'];
							$brand_title = $row_brands['brand_title'];
						 echo "<option value='$brand_id'>$brand_title</option>";
						}?>
				</select>

			<label>Ads Image:</label><img src="product_images/<?php echo $pro_image;?>" width="50px" height="50px" style="float:center;margin-top:8px;"/>
			<input type="file" name="product_image" style="width:99.5%;margin-top:8px;font-size:15px;font-family:raleway;">
			<label>Ads Price:</label>
			<input name="product_price"  value="<?php echo $pro_price; ?>" type="text" required style="margin-bottom:5px;">
			<label>Ads Description:</label>
			<tr>
			<td  style="margin-bottom:8px;"><b style="color:#fdedec;">Product Description:</b></td>
			<td><textarea name="product_desc" cols="20" rows="10"><?php echo $pro_desc;?></textarea></td>
			</tr>
			<tr>
			<label>Ads Conditions:</label>
			<input name="product_keywords" size="50"  value="<?php echo $pro_keywords; ?>" type="text" required>
			<input id="change_pass_submit" type="submit" name="update_product" value="Update your Ads">
		</form>
	</div>
</div>



<?php include("../includes/footer.php"); ?>


</body>
</html>



<?php
if(isset($_POST['update_product'])) {
	$update_id=$pro_id;
	$product_title=$_POST['product_title'];	
	$product_cat=$_POST['product_cat'];
	$product_brand=$_POST['product_brand'];	
	$product_price=$_POST['product_price'];	
	$product_desc=$_POST['product_desc'];	
	$product_keywords=$_POST['product_keywords'];	
	$product_image=$_FILES['product_image']['name'];	
	$product_image_tmp=$_FILES['product_image']['tmp_name'];
	//if image file is empty then doing this task
	if(empty($product_image)) {
		$product_image=$pro_image;	
		$product_image_tmp=$_FILES['$product_image']['tmp_name'];
	}
	move_uploaded_file($product_image_tmp,"product_images/$product_image");
	$update_product="update products set products_cat='$product_cat',products_brand='$product_brand',products_title='$product_title',products_price='$product_price',products_desc='$product_desc',products_image='$product_image',products_keywords='$product_keywords' where products_id='$update_id'";	
	$run_product=mysqli_query($con,$update_product);
	if($run_product) {
		echo"<script>alert('Your Ads Has been updated successfully!')</script>";
		echo"<script>window.open('view_products.php','_self')</script>";
	}
}
}
?>






















