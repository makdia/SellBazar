<?php
include("../includes/db.php");
if(!isset($_SESSION['customer_email'])) {
	echo"<script>window.open('../customer_login.php','_self')</script>";
}
else {
?>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
tinymce.init({selector:'textarea'});
</script>



<div id="change_password">
	<h2 style="text-align:center;padding:10px;">Post Your Ads</h2>
	<form method="post" action="" enctype="multipart/form-data">
		<label style="float:left;">Ads Title:</label>
		<input name="product_title" placeholder="Gives a title of your Ads" type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
		<label style="float:left;">Ads Category:</label>
		<select name="product_cat" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;"> <option>Select a category</option>
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
		<select name="product_brand" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;"> <option>Select a type</option>
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
		<label style="float:left;">Ads Image:</label>
		<input type="file" name="product_image" required style="width:99.5%;margin-top:8px;font-size:15px;font-family:raleway;">
		<label style="float:left;">Ads Price:</label>
		<input name="product_price"  placeholder="Price in TK/$" type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
		<label style="float:left;">Ads Description:</label>
		<tr>
		<td  style="margin-bottom:8px;"><b style="color:#fdedec;">Ads Description:</b></td>
		<td><textarea name="product_desc" cols="20" rows="10">
		<?php echo "Add somethings like the following:"."<br>"."Brand:"."<br>"."Features:"."<br>"."Model:"."<br>"."Authenticity:"."<br>"."Others details:";?>
		</textarea></td>
		</tr>
		<tr>
		<label style="float:left;">Ads Conditions:</label>
		<input name="product_keywords" size="50"  placeholder="New or Old" type="text" required style="width:99.5%;padding:10px;margin-top:8px;padding-left:5px;font-size:20px;font-family:raleway;">
		<input id="change_pass_submit" type="submit" name="insert_post" value="Post Your Ads">
	</form>
</div>




<?php
if(isset($_POST['insert_post'])) {
	$product_title=$_POST['product_title'];	
	$product_cat=$_POST['product_cat'];
	$product_brand=$_POST['product_brand'];	
	$product_price=$_POST['product_price'];	
	$product_desc=$_POST['product_desc'];	
	$product_keywords=$_POST['product_keywords'];	
	$product_email=$_SESSION['customer_email'];
	$product_image=$_FILES['product_image']['name'];	
	$product_image_tmp=$_FILES['product_image']['tmp_name'];
	$d=date("Y/m/d");
	move_uploaded_file($product_image_tmp,"../admin_area/product_images/$product_image");
	$insert_product="insert into products(products_cat,products_brand,products_title,products_price,products_desc,products_image,products_keywords,products_email,products_date)values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords','$product_email','$d')";	
	$insert_pro=mysqli_query($con,$insert_product);
	if($insert_pro) {
		echo"<script>alert('Your Ads Has been inserted!')</script>";
		echo"<script>window.open('my_account.php','_self')</script>";
	}
}
?>

<?php } ?>

