<!-- Session -->
<?php
include("includes/db.php");
// session_start();
?>


<?php
   if(isset($_GET['id']))
    {
        
        $theId=$_GET['id'];
        $sql="SELECT * FROM admins WHERE id='$theId' ";
        $selected_query=mysqli_query($con,$sql);
        while($row = mysqli_fetch_assoc($selected_query))
        {
            $id=$row['id'];
            $name=$row['name'];
            $email=$row['email'];
            $password=$row['password'];
            
            $address=$row['address'];
            $contact=$row['contact'];
            $country=$row['country'];
            
        }

    }
    else{
        header('location: index.php');
        return;
    }
 ?>
<!--   SELECT `name`, `password`, `address`, `contact`, `country` FROM `admins` WHERE id= -->

<?php

if(isset($_POST['update'])){
    $theId=$_GET['id'];
    $name=$_POST['name'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $country=$_POST['country'];
    $email1=$_POST['hiddenemail'];

    $sql= "UPDATE admins SET `name`='$name',`password`='$password' ,
             address='$address',contact='$contact',country='$country' WHERE id= $theId";
    $query=mysqli_query($con,$sql);

    $sql= "UPDATE login SET `password`= '$password' WHERE id = $theId and `email`='$email1'";
    $query=mysqli_query($con,$sql);
     echo 'Updated record';
    
    }

 ?>

<?php
    if(isset($_POST['cancel'])){
        header('location: dashboard2.php');
        return;


    }
?>
 
<form action="" method="POST">

    <table>
        <tr> 
            <td>Full Name:<input type="text" name="name" placeholder="Full Name" Required value="<?php echo $name;?>" > </td> 
        </tr>
        <tr> 
            <td>Password:<input type="password" name="password" placeholder="Password" Required value="<?php echo $password;?>"> </td> 
        </tr>
        <tr> 
            <td>address:<input type="text" name="address" placeholder="address" Required value="<?php echo $address;?>"> </td> 
        </tr>
        <tr> 
            <td>contact:<input type="text" name="contact" placeholder="contact" Required value="<?php echo $contact;?>"> </td> 
        </tr>
        <tr> 
            <td>country:<input type="text" name="country" placeholder="country" Required value="<?php echo $country;?>"> </td> 
        </tr>
        <tr> 
            <td> <input type="submit" name="update" value="Update" ></td> 
        </tr>
        <tr> 
            <td> <input type="submit" name="cancel" value="cancel" ></td> 
        </tr>
        
        <tr> 
            <td> </td> 
        </tr>

        <tr> 
            <td><input type="hidden" name="hiddenemail" value="<?php echo $email;?>"> </td> 
        </tr>
    </table>

 </form>

