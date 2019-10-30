<?php
include("../includes/db.php");
if(!isset($_SESSION['customer_email'])) {
	echo"<script>window.open('../customer_login.php','_self')</script>";
}
else {
?>
<!DOCTYPE html>
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



<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
tinymce.init({selector:'textarea'});
</script>




<div id="change_password">
	<h2 style="text-align:center;padding:10px;">Update Your Ads</h2>
	<form method="post" action="" enctype="multipart/form-data">
		<label style="float:left;">Ads Title:</label>
		<input name="product_title" value="<?php echo $pro_title; ?>" type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
		<label style="float:left;">Ads Category:</label>
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
		<label style="float:left;">Ads Type:</label>
		<!-- if user not given new type it takes ($pro_brand) which is the id of previous type--> 
		<select name="product_brand" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;"> <option value="<?php echo $pro_brand; ?>"><?php echo $brand_title; ?></option>
			<?php
			$get_brands = "select * from brands";
			$run_brands = mysqli_query($con, $get_brands);
				while($row_brands=mysqli_fetch_array($run_brands)) {
					$brand_id = $row_brands['brand_id'];
					$brand_title = $row_brands['brand_title'];
				 echo "<option value='$brand_id'>$brand_title</option>";
				}
			?>
		</select>
		<label style="float:left;">Ads Image:</label><img src="../admin_area/product_images/<?php echo $pro_image;?>" width="50px" height="50px" style="float:center;margin-top:8px;"/>
		<p><input type="file" name="product_image" style="width:99.5%;margin-top:8px;font-size:15px;font-family:raleway;"></p>
		<label style="float:left;">Ads Price:</label>
		<input name="product_price" value="<?php echo $pro_price; ?>" type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
		<label style="float:left;">Ads Description:</label>
		<tr>
		<td  style="margin-bottom:20px;"><b style="color:#fdedec;">Ads Description:</b></td>
		<td><textarea name="product_desc" cols="20" rows="10"><?php echo $pro_desc; ?></textarea></td>
		</tr>
		<tr>
		<label style="float:left;">Ads Conditions:</label>
		<input name="product_keywords" size="50"  value="<?php echo $pro_keywords; ?>" type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
		<input id="change_pass_submit" type="submit" name="update_product" value="Update Your Product">
	</form>
</div>



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
	move_uploaded_file($product_image_tmp,"../admin_area/product_images/$product_image");
	$update_product="update products set products_cat='$product_cat',products_brand='$product_brand',products_title='$product_title',products_price='$product_price',products_desc='$product_desc',products_image='$product_image',products_keywords='$product_keywords' where products_id='$update_id'";	
	$run_product=mysqli_query($con,$update_product);
	if($run_product) {
		echo"<script>alert('Your Ads Has been updated successfully!')</script>";
		echo"<script>window.open('my_account.php','_self')</script>";
	}
}
?>

<?php } ?>