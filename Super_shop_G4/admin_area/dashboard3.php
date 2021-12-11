<?php
include("includes/db.php");
session_start();
$id3=0;
if( isset($_SESSION['success3']) or isset($_SESSION['id3']) ){
    $id3= $_SESSION['id3'];
    // echo $id3;

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
        <h1>Your Employee Portal Info: Edit or Delete </h1>
        <br>
        <!-- View  work -->
        <table border="1px" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Password</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Country</th>
            <th>Type</th>
            <th>Your Task</th>
        </tr>
       <!--   SELECT `id`, `name`, `email`, `password`, `address`, `contact`, `country`, `type` FROM `admins` WHERE 1 -->

            <?php
                $id=$_SESSION['id3'];
                $sql=" SELECT * FROM admins WHERE id ='$id' ";
                $selected_query=mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($selected_query))
                {
                    $id=$row['id'];
                    $name=$row['name'];
                    $password=$row['password'];
                    $address=$row['address'];
                    $contact=$row['contact'];
                    $country=$row['country'];
                    $type=$row['type'];

            ?>
                    <tr>
                        <td><?php echo $id?></td>
                        <td><?php echo $name?></td>
                        <td><?php echo $password?></td>
                        <td><?php echo $address?></td>
                        <td><?php echo $contact?></td>
                        <td><?php echo $country?></td>
                        <td><?php echo $type?></td>
                        <td>
                            <a href="updateadmins3.php?id=<?php echo  $id?>" class="edit">Edit</a>

                        </td>
                    </tr>
            

            <?php  
            }
            ?>
            

        </table>

      <br>
      <br>

    </div>

    <div id="add-product" data-tab-content>
        <br>
           <!-- Request Product -->
        <?php 
           include('request_product3.php');
        ?>

    </div>

<!--  -->
    <div id="edit-product" data-tab-content>
        <br>
        <H1>Edit or delete only(Buying products) Customers Info:</H1>
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
                $sql="SELECT * FROM customers";
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
                            <a href="updatecustomers.php?id=<?php echo  $id?>" class="edit">Edit</a>
                            <a href="dashboard3.php?deletec=<?php echo $id?>" class="cd">Delete</a>
                        </td>
                    </tr>
            

            <?php  
            }
            ?>
            

        </table>

        <!-- Delete functionality -->
        <?php
        if(isset($_GET['deletec'])){
            $theId=$_GET['deletec'];
            $dsql="DELETE FROM `customers` WHERE `customer_id`= '$theId'";
            $dquery= mysqli_query($con,$dsql);
            // $dsql="DELETE FROM login WHERE id= '$theId' ";
            // $dquery= mysqli_query($con,$dsql);
            echo "<script>alert('Customer has been deleted!')</script>";
        }
        ?>
      <br>
      <br>
        
    </div>
<!-- Remove products -->
    <div id="remove-product" data-tab-content>
        <br>
        <h1>Remove product</h1>
        <br>
                <!-- Delete  work -->
       <table border="1px" width="100%">
        <tr>
            <th>ID</th>
            <th>Product Image</th>
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Product Description</th>
            <th>Product Keywords</th>
        </tr>

        
            <?php
                $sql="SELECT * FROM `products`";
                $selected_query=mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($selected_query))
                {
                    $product_did=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_price=$row['product_price'];
                    $product_desc=$row['product_desc'];
                    $product_keywords=$row['product_keywords'];
                    $product_image=$row['product_image'];

            ?>
                    <tr>
                        <td><?php echo $product_did?></td>
                        <td><img src="./product_images/<?php echo $product_image?>" alt="Image"></td>
                        <td><?php echo $product_title?></td>
                        <td><?php echo $product_price?></td>
                        <td><?php echo $product_desc?></td>
                        <td><?php echo $product_keywords?></td>
                         <td>
                            <a href="dashboard3.php?deleteproduct=<?php echo $product_did?>" class="cd">Delete</a>
                        </td>
                    </tr>
            

            <?php  
            }
            ?>

        </table>

        <!-- Delete functionality -->
        <?php
        if(isset($_GET['deleteproduct'])){
            $theId=$_GET['deleteproduct'];
            $dsql="DELETE FROM `products` WHERE product_id='$theId' ";
            $dquery= mysqli_query($con,$dsql);
            echo "<script>alert('Product has been deleted!')</script>";
         
        }
        ?>
        <br>
        <br>

        <?php 
           include('remove_product3.php');
        ?>
        <br>  <br>
        
    </div>
    
</div>
<!--Dashboard content end -->


<!-- AJAX -->
<!-- json using -->
<br>

<div id="customer_product_req1" style="margin:15px">
    <h4>Displaying all Customer Reuests:</h4>
    <button type="button" id="grab" >All Customers requests</button>

</div>
<div id="customer_product_req2" style="margin:15px">
</div>
<script>
         document.getElementById('grab').addEventListener('click', showValues);
         function showValues() {
             var req = new XMLHttpRequest();
             req.open('GET','jsonreturn3.php',true );
             req.onload = function(){
                 if(req.status==200){
                 var namez = JSON.parse(req.responseText);
                 var display = '';
     
                 for (var i in namez){
                     display += '<ul style="list-style:none;">'+
                         '<li>Customer Id: '+namez[i].customer_id+'</li>'+
                         '<li>Product Name: '+namez[i].product_name+'</li>'+
                         '<li>Product Category:'+namez[i].product_category+' </li>'+ 
                         '<li>Product Brand:'+namez[i].product_brand+'</li>'+'</ul>';
                 }
                 document.getElementById('customer_product_req2').innerHTML=display;
             }
         }
             req.send();
         }
</script>


<!-- Common footer -->
<?php
include('footer.php');
?>