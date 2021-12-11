

<!-- FORM VALIDATION -->

<?php 
include("includes/db.php");
	$email="";
	$password="";
?>

<!-- form validation -->
<?php 
$status=9;
if(isset($_POST['login']))
	{
		$email=$_POST['email'];

		if($email == "")
		{
			$error_msg1['email'] = "Email is required";
			 $status=0;
		}
		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
	  	{
	  	       $error_msg1['email'] = "Invalid email address!"; 
	  	       $status=0; 
	  	}
	  	$password=$_POST['pass'];
		if($password== "")
		{
			$error_msg2['pass'] = "Password is required";
			 $status=0;
		}elseif($status!=0){
			$status=5;

		}
	}


?>


<div> 
	
	<form method="post" action=""> 
		
		<table width="500" align="center" bgcolor="skyblue"> 
			
			<tr align="center">
				<td colspan="3"><h2>Login or Register to Buy!</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Email:</b></td>
				<td>
					<input type="text" name="email" placeholder="enter email" value="<?php echo $email;?>"/>
				</td>
			
				
			</tr>

			<tr>
				<td align="right"><b></b></td>
				<td >
					<?php 
					  if(isset($error_msg1['email']))
					  {
					  	echo "<div class='error'>".$error_msg1['email']."</div>";
					  }
					?>
				</td>
				
			</tr>
			
			<tr>
				<td align="right"><b>Password:</b></td>
				<td><input type="password" name="pass" placeholder="enter password" value="<?php echo $password;?>"/></td>
			</tr>

			<tr>
				<td align="right"><b></b></td>
				<td >
					<?php 
					  if(isset($error_msg2['pass']))
					  {
					  	echo "<div class='error'>".$error_msg2['pass']."</div>";
					  }
					?>
				</td>
				
			</tr>
		
			
			<tr align="center">
				<td colspan="3"><input type="submit" name="login" value="Login" /></td>
			</tr>
			
		
		
		</table> 
	
			<h2 style="float:right; padding-right:20px;"><a href="customer_register.php" style="text-decoration:none;">New_SignUp</a></h2>
	
	
	</form>
	
	
	<?php 
	if($status==5){
	
		$c_email = $_POST['email'];
		$c_pass = $_POST['pass'];
		
		$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
		
		$run_c = mysqli_query($con, $sel_c);
		
		$check_customer = mysqli_num_rows($run_c); 
		
		if($check_customer==0){
		
		echo "Password or email is incorrect, plz try again!'";
		exit();
		}
		$ip = getIp(); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_customer>0 AND $check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		
		}
		else {
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
	}
	
	
	?>
	
	
	

</div>