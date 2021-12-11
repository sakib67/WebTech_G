<!DOCTYPE>
<?php 
session_start();
include("functions/functions.php");

?>
<html>
	<head>
		<title>Super Shop Management System</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">

	<style >
		.error
		{
			color: #cc0000;
			padding-top: 2px;
			width: 100%;
		}
	</style>

</head>


	
<body>


	<!--Main Container starts here-->
	<div class="main_wrapper">
	
		<!--Header starts here-->
		<div class="header_wrapper">
		
			<a href="index.php"><h1>Super Shop Management System</h1></a>	
		</div>
		<!--Header ends here-->
		<!--Navigation Bar starts-->
		<div class="menubar">
			
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="./admin_area/index.php">Portal_login</a></li>
			
			</ul>
			
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a Product"/ > 
					<input type="submit" name="search" value="Search" />
				</form>
			
			</div>
		</div>
		<!--Navigation Bar ends-->
	
		<!--Content wrapper starts-->
		<div class="content_wrapper">
		
			<div id="sidebar">
			
				<div id="sidebar_title">Categories</div>
				
				<ul id="cats">
				
				<?php getCats(); ?>
				
				<ul>
					
				<div id="sidebar_title">Brands</div>
				
				<ul id="cats">
					
					<?php getBrands(); ?>
				
				<ul>
			
			
			</div>
		
			<div id="content_area">
			
			<?php cart(); ?>
			
			<div id="shopping_cart"> 
					
					<span style="float:right; font-size:17px; padding:5px; line-height:40px;">
					
					<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:#bbe0e5e3;'>Your</b>" ;
					}
					else {
					echo "<b>Welcome Viewers:</b>";
					}
					?>
					
					<b style="color:#bbe0e5e3">Shopping Cart :</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color:#bbe0e5e3">Go to Cart</a>
					
					
					<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php' style='color:#bbe0e5e3;'>Login</a>";
					
					}
					else {
					echo "<a href='logout.php' style='color:#bbe0e5e3;'>Logout</a>";
					}
					
					
					
					?>
					
					
					
					</span>
			</div>
			
				<div id="products_box">
				
				<?php getPro(); ?>
				<?php getCatPro(); ?>
				<?php getBrandPro(); ?>
				
				</div>
			
			</div>
		</div>
		<!--Content wrapper ends-->
	
		<div id="footer">
		
		<h3 style="text-align:center; padding-top:40px;">Super Shop Management system</h3>

		</div>
	
	
	
	
	
	</div> 
<!--Main Container ends here-->
</body>
</html>