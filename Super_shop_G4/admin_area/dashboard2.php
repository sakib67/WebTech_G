<!-- Session -->
<?php
    include("includes/db.php");
    session_start();
    $id2=0;
    if( isset($_SESSION['success2']) or isset($_SESSION['id2']) ){

        //  cookies settings for 15sec
        $id2=$_SESSION['id2'];
        setcookie('Portal_ID','$value',time()+15);
    }else{
        header('location: index.php');
        return;
    }
?>

<?php
    include('header.php');
?>


<!-- Dashboard content -->
<div class="tab-content">

    <div id="members" data-tab-content class="active">
        <br>
        <h1>Your Info edit </h1>
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
        

            <?php
                $id=$_SESSION['id2'];
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
                        <td> <?php echo $id ?> </td>
                        <td><?php echo $name?></td>
                        <td><?php echo $password?></td>
                        <td><?php echo $address?></td>
                        <td><?php echo $contact?></td>
                        <td><?php echo $country?></td>
                        <td><?php echo $type?></td>
                        <td>
                            <a href="updateadmins2.php?id=<?php echo  $id?>" class="edit">Edit</a>

                        </td>
                    </tr>
            

            <?php  
              }
            ?>
            

        </table>

      <br>
      <br>

    </div>

    <!-- Adding Products -->

    <div id="add-product" data-tab-content>
        <br>
        <h1>Add Required Product</h1>
        <br>
        <form action="dashboard2.php" method="post" enctype="multipart/form-data"> 
            
            <table align="center" width="795" border="2" bgcolor="#187eae">
                
                <tr align="center">
                    <td colspan="7"><h2>Insert New Product!</h2></td>
                </tr>
                
                <tr>
                    <td align="right"><b>Product Title:</b></td>
                    <td><input type="text" name="product_title" size="60" required/></td>
                </tr>
                
                <tr>
                    <td align="right"><b>Product Category:</b></td>
                    <td>
                        <select name="product_cat" required>
                            <option>Select a Category</option>
                            <?php 
                            $get_cats = "select * from categories";
                        
                            $run_cats = mysqli_query($con, $get_cats);
                        
                            while ($row_cats=mysqli_fetch_array($run_cats))
                            {
                        
                            $cat_id = $row_cats['cat_id']; 
                            $cat_title = $row_cats['cat_title'];

                            echo "<option value='$cat_id'>$cat_title</option>";
                            }
                                        
                            ?>
                    </select>
                                
                    
                    </td>
                </tr>
                
                <tr>
                    <td align="right"><b>Product Brand:</b></td>
                    <td>
                        <select name="product_brand" required >
                            <option>Select a Brand</option>
                            <?php 
                            $get_brands = "select * from brands";
                            
                            $run_brands = mysqli_query($con, $get_brands);
                            
                            while ($row_brands=mysqli_fetch_array($run_brands))
                            {
                            
                                $brand_id = $row_brands['brand_id']; 
                                $brand_title = $row_brands['brand_title'];
                            
                            echo "<option value='$brand_id'>$brand_title</option>";
                            
                            
                            }
                                            
                            ?>
                        </select>
                    
                    
                    </td>
                </tr>
                
                <tr>
                    <td align="right"><b>Product Image:</b></td>
                    <td><input type="file" name="product_image" /></td>
                </tr>
                
                <tr>
                    <td align="right"><b>Product Price:</b></td>
                    <td><input type="text" name="product_price" required/></td>
                </tr>
                
                <tr>
                    <td align="right"><b>Product Description:</b></td>
                    <td><textarea name="product_desc" cols="20" rows="10" required></textarea></td>
                </tr>
                
                <tr>
                    <td align="right"><b>Product Keywords:</b></td>
                    <td><input type="text" name="product_keywords" size="50" required/></td>
                </tr>
                
                <tr align="center">
                    <td colspan="7"><input type="submit" name="insert_post2" value="Insert Product Now"/></td>
                </tr>
            
             </table>
        
        
        </form>

          <br>
    </div>
    <!--  -->
    <!--  -->

    <div id="edit-product" data-tab-content>
        <br>
        <h1>Edit or Delete Employee,Customer</h1>
        <br>
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
                $sql="SELECT * FROM admins WHERE `type`='customer' OR `type`= 'employee'";
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
                            <a href="updateadmins2.php?id=<?php echo  $id?>" class="edit">Edit</a>
                            <a href="dashboard2.php?delete=<?php echo $id?>" class="cd">Delete</a>
                        </td>
                    </tr>
            

            <?php  
            }
            ?>
            

        </table>

        <!-- Delete functionality -->
        <?php
        if(isset($_GET['delete'])){
            $theId=$_GET['delete'];
            $dsql="DELETE FROM admins WHERE id= '$theId' ";
            $dquery= mysqli_query($con,$dsql);
            $dsql="DELETE FROM login WHERE id= '$theId' ";
            $dquery= mysqli_query($con,$dsql);
        }
        ?>
      <br>
      <br>
        <br>


        
    </div>
    <!--  -->
    <!--  -->

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
                            <a href="dashboard2.php?deleteproduct=<?php echo $product_did?>" class="cd">Delete</a>
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
    </div>
    
</div>
<!--Dashboard content end -->
<!-- Inserted products -->
<?php 

    if(isset($_POST['insert_post2'])){
    
        //getting the text data from the fields
        $product_title = $_POST['product_title'];
        $product_cat= $_POST['product_cat'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];
    
        //getting the image from the field
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];
        move_uploaded_file($product_image_tmp,"product_images/$product_image");
    
         $insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
         
         $insert_pro = mysqli_query($con, $insert_product);
         
         if($insert_pro){
         
            echo "<script>alert('Product Has been inserted!')</script>";

         }
    }



?>

<table>
   <input type="hidden" name="s2id"  value="<?php echo $_SESSION['id2'];?>">
    <input type="hidden" name="s2email" value="<?php echo $_SESSION['success2'];?>">
</table>

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
             req.open('GET','jsonreturn2.php',true );
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


<!--  -->
<!-- 7th start Our Pricing plan -->

<section class="our-pricing-plan">
    <div class="container">
        <div class="row text-center justify-content-center cus-mod">
            <div class="col-md-7 col-sm-12">
                <h1>Our Pricing Plan</h1>
                <i class="fas fa-dna"></i>
                <p>Consectetuer adipiscing elit diam an nonummy laoreet dolore magna aliquam erat volutpat.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4">
                <div class="pricing-content">
                    <h2>business plan</h2>
                    <p>for super professional</p>
                    <div class="value">
                        <h1>Tk19.99</h1>
                        <h6>per month</h6>
                    </div>
                    <p>unlimited pizza</p>
                    <p>daft punk every evenings</p>
                    <p>full access pizza</p>
                    <p>2 free farks every month</p>
                    <p>unlimited burger</p>
                    <a href="#" class="btn">sing up</a>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="pricing-content">
                    <h2>business plan</h2>
                    <p>for super professional</p>
                    <div class="value">
                        <h1>Tk19.99</h1>
                        <h6>per month</h6>
                    </div>
                    <p>unlimited pizza</p>
                    <p>daft punk every evenings</p>
                    <p>full access pizza</p>
                    <p>2 free farks every month</p>
                    <p>unlimited burger</p>
                    <a href="#" class="btn">sing up</a>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="pricing-content">
                    <h2>business plan</h2>
                    <p>for super professional</p>
                    <div class="value">
                        <h1>Tk19.99</h1>
                        <h6>per month</h6>
                    </div>
                    <p>unlimited pizza</p>
                    <p>daft punk every evenings</p>
                    <p>full access pizza</p>
                    <p>2 free farks every month</p>
                    <p>unlimited burger</p>
                    <a href="#" class="btn">sing up</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7th End Our Pricing plan -->
<!--  -->
<!-- Common footer -->
<?php
include('footer.php');
?>