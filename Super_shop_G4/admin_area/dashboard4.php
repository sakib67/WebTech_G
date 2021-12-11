<?php
include("includes/db.php");
session_start();

if( isset($_SESSION['success4']) or isset($_SESSION['id4']) ){
    // echo $_SESSION['id4'];


}
else{
    header('location: index.php');
    return;
}
?>
<!-- common header -->
<?php
include('header.php');
?>


<!-- Dashboard content -->
<div class="tab-content">

    <div id="members" data-tab-content class="active">
        <br>
        <h1>Update your Data:</h1>
        <br>
        <!-- View  work -->
        <table border="1px" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Password</th>
            <th>customer_country</th>
            <th>customer_city</th>
            <th>customer_contact</th>
            <th>customer_address</th>
            <th>Your Task</th>
        </tr>

            <?php
                $id=$_SESSION['id4'];
                $sql="SELECT * FROM customers WHERE customer_id= $id";
                $selected_query=mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($selected_query))
                {
                    $id=$row['customer_id'];
                    $name=$row['customer_name'];
                    $password=$row['customer_pass'];
                    $customer_country=$row['customer_country'];
                    $customer_city=$row['customer_city'];
                    $customer_contact=$row['customer_contact'];
                    $customer_address=$row['customer_address'];

            ?>
                    <tr>
                        <td><?php echo $id?></td>
                        <td><?php echo $name?></td>
                        <td><?php echo $password?></td>
                        <td><?php echo $customer_country?></td>
                        <td><?php echo $customer_city?></td>
                        <td><?php echo $customer_contact?></td>
                        <td><?php echo $customer_address?></td>
                        <td>
                            <a href="updatecustomers4.php?id=<?php echo  $id?>" class="edit">Edit</a>
                        </td>
                    </tr>
            

            <?php  
            }
            ?>
            

        </table>
      <br>
      <br>
    </div>



    <div id="edit-product" data-tab-content>
        <h4>Edit Product Request category::::::::::::::::::::::::::::::</h4>
       
        
    </div>

    <div id="remove-product" data-tab-content>
       
        <?php 
           include('remove_product_category4.php');
        ?>
    </div>
    
</div>
<!--Dashboard content end -->


<!-- Common footer -->
<?php
include('footer.php');
?>