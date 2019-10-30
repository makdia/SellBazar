<?php
session_start();
include("../includes/db.php"); 
include("../functions/functions.php");
if(!isset($_SESSION['customer_email'])) {
	echo"<script>window.open('../customer_login.php','_self')</script>";
}
else {
?>


<html lang="en">
<head>

<!--delete confirmation function-->
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete your account?');
}
</script>


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/style.css" media="all" />
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/jquery.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <title>SHOM DOT COM</title> 
<style>
  .error {color: red;font-size:17px;}
  .affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
    }
  .affix + .container-fluid + .jumbotron + .home_page_body{
     position: relative;
     top: 50px;
    }
  .jumbotron {
      margin-bottom: 0;
	  background:#663399;
	  color:white;
    }
  .navbar {
      margin-bottom: 0;
      border-radius: 0;
	}
  .navbar-brand {
	  font-size:18px;
	  font-family:COMIC SANS MS;	
    }
   #myNavbar {
	 font-size:18px;
	 font-family:COMIC SANS MS;	
    }
   #myNavbar a:hover{
	 color:#FF1493;
	 font-weight:bolder;	
	 font-family: "Times New Roman", Georgia, Serif;
	}
  .sidenav {
      padding:0px;
	  margin:0px;
      background:#fdedec;	
    }
  .product_area {
      padding:0px;
	  margin:0px;
      background-color:#fdedec;
	}
  
 </style>  
</head>

<body>



<div class="jumbotron">
	<div class="header_wrapper">
		<h1  style="font:italic bold 50px Georgia, serif;"><img src="../bootstrap/img/logo1.png"  style="float:center;width:55px;height:70px;margin-right:10px;padding-bottom:10px;"/>SHOP.COM</h1>
	</div>
</div>




<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <div class="container-fluid">
    <div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>    	
		  </button>
		  <a class="navbar-brand" href="../full_screen_logo.php">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
					<li><a href="../index.php">Home</a></a></li>
					<li><a href="../all_products.php">All Ads</a></li>
					<li class="active"><a href="my_account.php">My Account</a></li>
					<li> 
						<?php 
							if(!isset($_SESSION['customer_email'])) {
								echo "   "."<a href='../customer_login.php'>Post Your Ads</a>";
							}
							else {
								echo "   "."<a href='my_account.php?insert_product'>Post Your Ads</a>";
						}?>
					</li>
					<!--<li><a href="../customer_login.php">Post Your Ads</a></li>-->
					<li><a href="../find_user.php">Find User</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right" style="padding:10px">
				<?php user_profile_pic_name_login_logout(); ?>
			</ul>
    </div>
  </div>
</nav>




<div class="home_page_body" style="height:auto;background:#fdedec;">
	<div class="container-fluid wrapper">
		<div class="row">
			<div class="col-sm-2 sidenav">
					<?php
					$user=$_SESSION['customer_email'];
					$get_img="select * from customers where customer_email='$user'";
					$run_img=mysqli_query($con,$get_img);
					$row_img=mysqli_fetch_array($run_img);
					$c_image=$row_img['customer_image'];
					$c_name=$row_img['customer_name'];?>
                    <div id="title_user_name"><?php echo $c_name; ?></div>
						<ul id="about_u">
						<?php  if (empty($c_image)) {
						echo "<a href='customer_images/makdia.png' class='thumbnail' style='padding:3px;'>
					    <img src='customer_images/makdia.png' class='img-rounded' style='width:222px;height:180px;'/></a>";
					    } else {
					    echo "<a href='customer_images/$c_image' class='thumbnail' style='padding:3px;'>
					    <img src='customer_images/$c_image' class='img-rounded' style='width:222px;height:180px;'/></a>";
					    }?>
						<li><a href="my_account.php?change_profile_pic">Change Profile Picture</a></li>
						<li><a href="my_account.php?insert_product">Post Your Ads</a></li>
						<li><a href="my_account.php?edit_account">Edit Profile</a></li>
						<li><a href="my_account.php?change_pass">change Password</a></li>
						<li><a href="my_account.php?your_info">Your Info</a></li>
						<li><a href="my_account.php?delete_account" onclick="return checkDelete()">Delete Account</a></li>
						<li><a href="logout.php">Logout</a></li>
						</ul>
            </div>
			<div class="col-sm-10">
				<div class="product_area"> 
					<div id="product_box">                   
						<?php
						if ((!isset($_GET['edit_pro'])) && (!isset($_GET['change_profile_pic'])) && (!isset($_GET['insert_product'])) && (!isset($_GET['edit_account'])) && (!isset($_GET['change_pass'])) && (!isset($_GET['your_info'])) && (!isset($_GET['delete_account']))) 
							{  getUserOwnProduct(); }
						?>
					</div>
					<div id="my_account_box">
						<?php
						if(isset($_GET['change_profile_pic'])) {
							include("change_profile_pic.php");
						}
						else if(isset($_GET['insert_product'])) {
							include("insert_product.php");
						}
						else if(isset($_GET['edit_account'])) {
							include("edit_account.php");
						}
						else if(isset($_GET['change_pass'])) { 
							include("change_pass.php");
						}
						else if(isset($_GET['your_info'])) { 
							include("your_info.php");
						}
						else if(isset($_GET['delete_account'])) {
							include("delete_account.php");
						}
						else if(isset($_GET['edit_pro'])) {
							include("edit_products.php");
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include("../includes/footer.php"); ?>


</body>
</html> 

<?php } ?>







