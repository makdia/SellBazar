<?php
$user=$_SESSION['customer_email'];
$get_img="select * from customers where customer_email='$user'";
$run_img=mysqli_query($con,$get_img);
$row_img=mysqli_fetch_array($run_img);
$c_name=$row_img['customer_name'];
$c_email=$row_img['customer_email'];
$c_country=$row_img['customer_country'];
$c_city=$row_img['customer_city'];
$c_contact=$row_img['customer_contact'];
$c_address=$row_img['customer_address'];?>

<div id="change_password">
	<h3 style="text-align:center;color:#FF1493;padding:10px;">Your Info</h3>  
	<ul id="about_user">              
	<label style="float:left;margin-left:3px;font-size:18px;">E-mail :</label></br>				  
	<li><?php  echo "$c_email" ?></li><hr style="color: gray; height: 1px; background-color:gray;" />
	<label style="float:left;margin-left:3px;font-size:18px;">Contact-no :</label></br>
	<li><?php echo "$c_contact" ?></li><hr style="color: gray; height: 1px; background-color:gray;" />
	<label style="float:left;margin-left:3px;font-size:18px;">City :</label></br>
	<li><?php  echo "$c_city" ?></li><hr style="color: gray; height: 1px; background-color:gray;" />
	<label style="float:left;margin-left:3px;font-size:18px;">Country :</label></br>
	<li><?php echo "$c_country" ?></li><hr style="color: gray; height: 1px; background-color:gray;" />
	<label style="float:left;margin-left:3px;font-size:18px;">Address :</label></br>
	<li><?php echo "$c_address" ?></li><hr style="color: gray; height: 1px; background-color:gray;" />
	</ul>
</div>













