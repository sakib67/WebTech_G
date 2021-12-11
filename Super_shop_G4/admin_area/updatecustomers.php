<!-- Session -->
<?php
include("includes/db.php");
// session_start();
?>

<?php
   if(isset($_GET['id']))
    {
        
        $theId=$_GET['id'];
        $sql="SELECT * FROM customers WHERE customer_id='$theId' ";
        $selected_query=mysqli_query($con,$sql);
        while($row = mysqli_fetch_assoc($selected_query))
        {
            $id=$row['customer_id'];
            $name=$row['customer_name'];
            $email=$row['customer_email'];
            $password=$row['customer_pass'];
            
            $customer_country=$row['customer_country'];
            $customer_city=$row['customer_city'];
            $customer_contact=$row['customer_contact'];
            $customer_address=$row['customer_address'];
        }

    }
    else{
        header('location: index.php');
        return;
    }
 ?>

<?php

if(isset($_POST['update'])){
    $theId=$_GET['id'];
    $name=$_POST['name'] ;
    $password=$_POST['password'];
    $customer_country=$_POST['customer_country'];
    $customer_city=$_POST['customer_city'];
    $customer_contact=$_POST['customer_contact'];
    $customer_address=$_POST['customer_address'];


    $email1=$_POST['hiddenemail'];

    $sql= "UPDATE customers SET `customer_name`='$name',`customer_pass`='$password' ,
             customer_country='$customer_country',customer_city='$customer_city',customer_contact='$customer_contact',customer_address='$customer_address' WHERE customer_id= $theId";
    $query=mysqli_query($con,$sql);

    $sql= "UPDATE login SET `password`= '$password' WHERE id = $theId and `email`='$email1'";
    $query=mysqli_query($con,$sql);
     echo 'Updated record';
    
    }

 ?>

<?php
    if(isset($_POST['cancel'])){
        header('location: dashboard3.php');
        return;


    }
?>

<form action="" method="POST">

    <table>
        <tr> 
            <td>Full Name:<input type="text" name="name" placeholder="Full Name" Required value="<?php echo $name;?>"> </td> 
        </tr>
        <tr> 
            <td>Password:<input type="password" name="password" placeholder="Password" Required value="<?php echo $password;?>"> </td> 
        </tr>
        <tr> 
            <td>customer_country:<input type="text" name="customer_country" placeholder="customer_country" Required value="<?php echo $customer_country;?>"> </td> 
        </tr>
        <tr> 
            <td>customer_city:<input type="text" name="customer_city" placeholder="customer_city" Required value="<?php echo $customer_city;?>"> </td> 
        </tr>
        <tr> 
            <td>customer_contact:<input type="text" name="customer_contact" placeholder="customer_contact" Required value="<?php echo $customer_contact;?>"> </td> 
        </tr>
        <tr> 
            <td>customer_address:<input type="text" name="customer_address" placeholder="Password" Required value="<?php echo $customer_address;?>"> </td> 
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

