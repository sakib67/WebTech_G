<!DOCTYPE>
<?php 
include("includes/db.php"); 
?>
<?php
	$name="";
	$email="";
	$password="";
	$city="";
	$contact="";
	$address="";
?>


<!-- -->
<?php 
$status=5;
if(isset($_POST['register']))
{        
	    $name=$_POST['c_name'];
	    $email=$_POST['c_email'];
		$password=$_POST['c_pass'];
		$password=strval($password);
        $city=$_POST['c_city'];
        $contact=$_POST['c_contact'];
        $address=$_POST['c_address'] ;

       if($name == ""){
       	$error_msg['c_name'] = "Name is required";
           $status=1;
	  	}
	    elseif(!(preg_match("/^[a-zA-Z -]*$/", $name)))
	  	{
	  	    $error_msg['c_name'] = "Only latters allowed";
	  	    $status=1;
	  	}
	  	if($email=="")
	  	{
	  	       $error_msg1['c_email'] = "Email address is requried"; 
	  	       $status=1; 
	  	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
	  	{
	  	       $error_msg1['c_email'] = "Invalid email address!"; 
	  	       $status=1; 
	  	}

		if($password == "")
		  {
		  	$error_msg2['c_pass'] = "Password is required";
		  	$status=1;
		  }
		  elseif(strlen(strval($password)) < 4)
		  {
		  	$error_msg2['c_pass'] = "Password is must more then 3 digits";
		  	$status=1;
		  }
		if($city == "")
		  {
		  	$error_msg4['c_city'] = "City is required";
		  	$status=1;
		  }
		if($contact == "" )
		 {
		  $error_msg5['c_contact'] = "Contact number is required";
		  $status=1;
		 }elseif(!is_numeric($contact))
		 {
		  $error_msg5['c_contact'] = "Contact is only Numeric";
		  $status=1;
		 }
		if($address== "")
		 {
		 	$error_msg6['c_address'] = "Address is required";
		 	$status=1;
		 }
		 elseif($status!=1){
		 	$status=2;
		 }

	if($status == 2 )
	{
	
	 		$ip = 1;
			$c_name = $_POST['c_name'];
			$c_email = $_POST['c_email'];
			$c_pass = $_POST['c_pass'];
			$c_country = $_POST['c_country'];
			$c_city = $_POST['c_city'];
			$c_contact = $_POST['c_contact'];
			$c_address = $_POST['c_address'];

	        $selected_query="SELECT * FROM login WHERE email='$c_email' ";



	        $row15=mysqli_query($con,$selected_query);
			$num_customer1=mysqli_num_rows($row15);


		
	     $selected_query1="SELECT * FROM `customers` WHERE `customer_email`='$c_email'";

	        $row16=mysqli_query($con,$selected_query1);
			$num_customer2=mysqli_num_rows($row16);


	 if($num_customer1 > 0|| $num_customer2 > 0)
	            {
	          	  echo "Email already exist";
					
			    }else
				{
					   $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address')";
			        
						$run_c = mysqli_query($con, $insert_c);
						
						$sql="SELECT * FROM customers  WHERE customer_email='$c_email'";
			            $rr2=mysqli_query($con,$sql);
					    while($rc = mysqli_fetch_assoc($rr2)  )
						    {
						  	  $type="customer";
						      $id1=(int)$rc['customer_id'];
						      $login="INSERT INTO login(id,email, password,type) 
						               VALUES ($id1,'$c_email','$c_pass','$type')";
						      $lg=mysqli_query($con,$login);
						
						    }

						
			    }

   }


}



?>


<html>
	<head>
		<title>Super Shop</title>
		
		
	<link rel="stylesheet" href="style/style.css" media="all" /> 
	</head>

	<style >
		.error
		{
			color: #cc0000;
			padding-top: 2px;
			width: 100%;
		}
	</style>
	
<body>
       <div class="main_wrapper">
<div class="content_wrapper">
	
	<div id="content_area">
				<form action="customer_register.php" method="POST" enctype="multipart/form-data">
					
					<table align="center" width="750">
						
						<tr align="center">
							<td colspan="6"><h2>Create an Account</h2></td>
						</tr>
						<tr>
							<td align="right">Customer Name:</td>
							<td><input type="text" name="c_name" value="<?php echo $name;?>" /></td>
						</tr>
						<tr>
							<td align="right"><b></b></td>
							<td >
								<?php 
								  if(isset($error_msg['c_name']))
								  {
								  	echo "<div class='error'>".$error_msg['c_name']."</div>";
								  }
								?>
							</td>
							
						</tr>
						
						<tr>
							<td align="right">Customer Email:</td>
							<td><input type="text" name="c_email" value="<?php echo $email;?>" /></td>
						</tr>
						<tr>
							<td align="right"><b></b></td>
							<td >
								<?php 
								  if(isset($error_msg1['c_email']))
								  {
								  	echo "<div class='error'>".$error_msg1['c_email']."</div>";
								  }
								?>
							</td>
							
						</tr>
						
						<tr>
							<td align="right">Customer Password:</td>
							<td><input type="password" name="c_pass" value="<?php echo $password;?>" />
								
							</td>
						</tr>

						<tr>
							<td align="right"><b></b></td>
							<td >
								<?php 
								  if(isset($error_msg2['c_pass']))
								  {
								  	echo "<div class='error'>".$error_msg2['c_pass']."</div>";
								  }
								?>
							</td>
							
						</tr>
						
						
						<tr>
							<td align="right">Customer Country:</td>
							<td>
								<select name="c_country">
									<option>Bangladesh</option>
									<option>India</option>
									<option>USA</option>
									<option>Italy</option>
									<option>UK</option>
									<option>Others</option>
								</select>
								
							</td>
						</tr>
						
						<tr>
							<td align="right">Customer City:</td>
							<td><input type="text" name="c_city" value="<?php echo $city;?>" /></td>
						</tr>

						<tr>
							<td align="right"><b></b></td>
							<td >
								<?php 
								  if(isset($error_msg4['c_city']))
								  {
								  	echo "<div class='error'>".$error_msg4['c_city']."</div>";
								  }
								?>
							</td>
							
						</tr>
						
						<tr>
							<td align="right">Customer Contact:</td>
							<td><input type="text" name="c_contact" value="<?php echo $contact;?>" /></td>
						</tr>
						<tr>
							<td align="right"><b></b></td>
							<td >
								<?php 
								  if(isset($error_msg5['c_contact']))
								  {
								  	echo "<div class='error'>".$error_msg5['c_contact']."</div>";
								  }
								?>
							</td>
							
						</tr>
						
						<tr>
							<td align="right">Customer Address</td>
							<td><input type="text" name="c_address" value="<?php echo $address; ?>" /></td>
						</tr>
						<tr>
							<td align="right"><b></b></td>
							<td >
								<?php 
								  if(isset($error_msg6['c_address']))
								  {
								  	echo "<div class='error'>".$error_msg6['c_address']."</div>";
								  }
								?>
							</td>
							
						</tr>
						
						
					<tr align="center">
						<td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
					</tr>
					
					
					
					</table>
				
				</form>
			
			
		
		</div>
           </div>
	
	</div> 



</body>
</html>









