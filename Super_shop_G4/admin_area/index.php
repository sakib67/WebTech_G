<?php
include ('includes/db.php');
session_start();
$email9="";
$password9="";

?>

<?php
   $s_name="";
   $s_email="";
   $s_temail="";
   $s_password="";
   $s_address="";
   $s_contact="";
   $s_country="";
?>



<?php 
$status=9;
  if(isset($_POST['login']))
  {
    $email9=$_POST['lemail'];

    if($email9 == "")
    {
      $error_msg1['lemail'] = "Email is required";
       $status=0;
    }
    elseif(!filter_var($email9,FILTER_VALIDATE_EMAIL))
      {
             $error_msg1['lemail'] = "Invalid email address!"; 
             $status=0; 
      }
      $password9=$_POST['lpass'];
    if($password9== "")
    {
      $error_msg2['lpass'] = "Password is required";
       $status=0;
    }elseif($status!=0){
      $status=5;

    }
  }
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin members Login and Registration Form </title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="./portal_images/coverlogin.jpg" alt="Images">
        <div class="text">
          <span class="text-1">Every new team member brings with them <br> a fresh set of challenges</span>
          <span class="text-2">Let's get in touch</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="./portal_images/super-shop-bangladesh.jpg "alt="Images" >
        <div class="text">
          <span class="text-1">Super Shop Management <br> System</span>
          <span class="text-2">Let's get in touch</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">

            <div class="title">Login to our Portal</div>
             <a href="../index.php">Or Return Home_Page</a>


          <form action="index.php" method="POST" enctype="multipart/form-data">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" name="lemail" value="<?php echo $email9;?>">
                
              </div>
              <div class="input-box">
                <?php 
                   if(isset($error_msg1['lemail']))
                   {
                     echo "<div class='error'>".$error_msg1['lemail']."</div>";
                   }
                 ?>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="lpass" value="<?php echo $password9;?>">
              </div>
              <div class="input-box">
                <?php 
                  if(isset($error_msg2['lpass']))
                  {
                    echo "<div class='error'>".$error_msg2['lpass']."</div>";
                  }
                ?>
              </div>
            
              <div class="button input-box">
                <input type="submit" value="Login" name="login">
              </div>
              
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>

<!-- Login -->
<?php 
	if($status==5)
  {
      $email = $_POST['lemail'];
      $password = $_POST['lpass'];	
      $sel_l = "select * from login where email='$email' AND password='$password'";
      $run = mysqli_query($con, $sel_l);
      $check_login = mysqli_num_rows($run); 
      if($check_login >0)
      {
        $type1="admin";
        $type2="manager";
        $type3="employee";
        $type4="customer";
        $selected_query="SELECT * FROM login WHERE email='$email' ";
        $r1=mysqli_query($con,$selected_query);
        $type="";
        $id=0;
        while($row= mysqli_fetch_assoc($r1) ){
          $type=$row['type'];
          $id=(int)$row['id'];
        }
        if( $type == $type1){
          $_SESSION['success1'] = $row['email'];
          $_SESSION['id1'] = $id;
          header('Location:dashboard1.php') ;
          return;

        }
        elseif($type==$type2){
          $_SESSION['success2'] = $row['email'];
          $_SESSION['id2'] = $id;
          header( 'Location:dashboard2.php' ) ;
          return;
          
        }
        elseif($type==$type3){
          $_SESSION['success3'] = $row['email'];
          $_SESSION['id3'] = $id;
          header( 'Location:dashboard3.php' ) ;
          return;
          
        }else{
          $_SESSION['success4'] = $row['email'];
          $_SESSION['id4'] = $id;
          header( 'Location:dashboard4.php' ) ;
          return;
          

        }
       
      }else{
          echo "<script>alert('Password or email is incorrect, plz try again!')</script>";
          exit();
      }
	}
	
	
	?>


        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your full name"  name="aname" value="<?php echo $s_name;?>" >
                <?php 
                  if(isset($error1['s_name']))
                  {
                    echo "<div class='error'>".$error1['s_name']."</div>";
                  }
                ?>
              </div>

              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your new email" name="aemail" value="<?php echo $s_email;?>" >
                 <?php 
                  if(isset($error2['s_email']))
                  {
                    echo "<div class='error'>".$error2['s_email']."</div>";
                  }
                ?>

              </div>
              
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Justify tAdmin email to access sigup" name="temail" value="<?php echo $s_temail;?>">
                 <?php 
                  if(isset($error3['s_temail']))
                  {
                    echo "<div class='error'>".$error3['s_temail']."</div>";
                  }
                ?>
               </div>
               
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="apass" value="<?php echo $s_password;?>" >
                 <?php 
                  if(isset($error4['s_password']))
                  {
                    echo "<div class='error'>".$error4['s_password']."</div>";
                  }
                ?>
              </div>
            
              <div class="input-box">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" placeholder="address" name="aaddress" value="<?php echo $s_address;?>">
                 <?php 
                  if(isset($error5['s_address']))
                  {
                    echo "<div class='error'>".$error5['s_address']."</div>";
                  }
                ?>
              </div>
             
              <div class="input-box">
                <i class="fas fa-id-card-alt"></i>
                <input type="text" placeholder="Contact 0179"  name="acontact" value="<?php echo $s_contact;?>" >
                 <?php 
                  if(isset($error6['s_contact']))
                  {
                    echo "<div class='error'>".$error6['s_contact']."</div>";
                  }
                ?>
              </div>
              
              <div class="input-box">
                 <i class="fas fa-globe-asia"></i>
                <input type="text" placeholder="Country"  name="acountry" value="<?php echo $s_country;?>" >
                 <?php 
                  if(isset($error7['s_country']))
                  {
                    echo "<div class='error'>".$error7['s_country']."</div>";
                  }
                ?>
              </div>
            
              <div class="input-box">
                <p>Type Selection: </p>
                 <select name="type2">
                    <option value="admin">admin</option>
                    <option value="manager">manager</option>
                    <option value="employee">employee</option>
                  </select>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sign Up" name="signup">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>

<!-- SignUp validation -->
<?php

if(isset($_POST['signup']))
{   
  $status=5;
   $s_name=$_POST['aname'] ;
   $s_email=$_POST['aemail'];
   $s_temail=$_POST['temail'];
   $s_password=$_POST['apass'];
   $s_password=strval($s_password);
   $s_address=$_POST['aaddress'];
   $s_contact=$_POST['acontact'];
   $s_country=$_POST['acountry'];


   //
   // $s_name
   // $s_email
   // $s_temail
   // $s_password
   // $s_address
   // $s_contact
   // $s_country
 
   // 

       if($s_name== ""){
        $error1['s_name'] = "Name is required";
           $status=1;
      }
      elseif(!(preg_match("/^[a-zA-Z -]*$/", $s_name)))
      {
          $error1['s_name'] = "Only latters allowed";
          $status=1;
      }
      if($s_email=="")
      {
             $error2['s_email'] = "Email address is requried"; 
             $status=1; 
      }elseif(!filter_var($s_email,FILTER_VALIDATE_EMAIL))
      {
             $error2['s_email'] = "Invalid email address!"; 
             $status=1; 
      }
       if($s_temail=="")
      {
             $error3['s_temail'] = "Email address is requried"; 
             $status=1; 
      }elseif(!filter_var($s_temail,FILTER_VALIDATE_EMAIL))
      {
             $error3['s_temail'] = "Invalid email address!"; 
             $status=1; 
      }

    if($s_password == "")
      {
        $error4['s_password'] = "Password is required";
        $status=1;
      }
      elseif(strlen(strval($s_password)) < 4)
      {
        $error4['s_password'] = "Password is must more then 3 digits";
        $status=1;
      }
    if($s_address == "")
      {
        $error5['s_address'] = "Address is required";
        $status=1;
      }
    if($s_contact == "" )
     {
      $error6['s_contact'] = "Contact number is required";
      $status=1;
     }elseif(!is_numeric($s_contact))
     {
      $error6['s_contact'] = "Contact is only Numeric";
      $status=1;
     }
    if($s_country== "")
     {
      $error7['s_country'] = "Country value is required";
      $status=1;
     }
     elseif($status!=1){
      $status=2;
     }

        if($status==2)
        {
            $name=$_POST['aname'] ;
            $email=$_POST['aemail'];
            $temail=$_POST['temail'];
            $apass=$_POST['apass'];
            $address=$_POST['aaddress'];
            $contact=$_POST['acontact'];
            $country=$_POST['acountry'];
            $type=$_POST['type2'];
            if($temail=="tadmin@gmail.com")
            {
              
              $select="SELECT * FROM login WHERE email = '$email'";
              $row1=mysqli_query($con,$select);
		          $check_admin = mysqli_num_rows($row1); 
              if($check_admin > 0)
                {
                  echo 'Email already exits';          
                }else
                {
                  $signup="INSERT INTO admins(name, email, password, address, contact, country, type) 
                            VALUES (' $name','$email','$apass','$address',' $contact',' $country','$type')";
                    $ad=mysqli_query($con,$signup);

                  $selected_query="SELECT * FROM admins WHERE email='$email' ";
                  $r1=mysqli_query($con,$selected_query);

                  while($row= mysqli_fetch_assoc($r1) ){
                    $id=$row['id'];
                    $login="INSERT INTO login(id,email, password,type) 
                    VALUES ($id,'$email','$apass','$type')";
                    $row3=mysqli_query($con,$login);
                    echo 'Inserted';
                  }

                }
              
            }else{
              echo 'Contact with technical admin or enter technical admin email properly';
            }
          

            
          
        }

    }

?>

    </div>

  </div>
  </div>
</div>
</body>
</html>
