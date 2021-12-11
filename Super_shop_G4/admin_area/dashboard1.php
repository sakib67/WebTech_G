<!-- Session -->
<?php
include("includes/db.php");
session_start();
if( isset($_SESSION['success1']) or isset($_SESSION['id1']) ){

    //  cookies settings for 15sec
    $value=$_SESSION['id1'];
    setcookie('Portal_ID','$value',time()+15);
}else{
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
        <?php 
           include('adminedit1.php');
        ?>
   </div>  

    <!-- //////////////////////////////////////////// -->
    <div id="add-product" data-tab-content>
        <br>
        <h1>Add Product</h1>
        <br>
        <form action="dashboard1.php" method="post" enctype="multipart/form-data"> 
            
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
                            
                            while ($row_brands=mysqli_fetch_array($run_brands)){
                            
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
                    <td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
                </tr>
            
             </table>
        
        
        </form>

    </div>

    <div id="edit-product" data-tab-content>
        <br>
        <h1>Edit product</h1>
        <br>
                <!-- edit product work -->
       <table border="1px" width="100%">
        <tr>
            <th>ID</th>
            <th>Product Image</th>
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Product Description</th>
            <th>Product Keywords</th>
        </tr>
           <!-- `product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`  -->
           <?php
                $sql="SELECT * FROM `products`";
                $selected_query=mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($selected_query))
                {
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_price=$row['product_price'];
                    $product_desc=$row['product_desc'];
                    $product_keywords=$row['product_keywords'];
                    $product_image=$row['product_image'];

            ?>
                    <tr>
                        <td><?php echo $product_id?></td>
                        <td><img src="./product_images/<?php echo $product_image?>" alt="Image"></td>
                        <td><?php echo $product_title?></td>
                        <td><?php echo $product_price?></td>
                        <td><?php echo $product_desc?></td>
                        <td><?php echo $product_keywords?></td>
                        <td>
                          <a href="editproduct.php?id=<?php echo $product_id?>" class="edit">Edit</a>
                        </td>
                    </tr>
            

            <?php  
            }
            ?>

        </table>
    <br>
    <br>
    </div>

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
                        <!-- <td>
                            <input type="hidden" name="deleteid" value="<?php echo $product_did?>">
                            <input type="submit" name="deleteproduct" value="Delete" class="cd">
                        </td> -->
                         <td>
                            <a href="dashboard1.php?deleteproduct=<?php echo $product_did?>" class="cd">Delete</a>
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

	if(isset($_POST['insert_post'])){
	
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

<!-- json using -->
<br>

<div id="customer_product_req1" style="margin:15px">
    <h4>Displaying all Products Reuest:</h4>
    <button type="button" id="grab" >All Product requests</button>

</div>

<!-- Ajax -->
<div id="customer_product_req2" style="margin:15px">
</div>
<script>
         document.getElementById('grab').addEventListener('click', showValues);
         function showValues() {
             var req = new XMLHttpRequest();
             req.open('GET','jsonreturn1.php',true );
             req.onload = function(){
                 if(req.status==200){
                 var namez = JSON.parse(req.responseText);
                 var display = '';
     
                 for (var i in namez){
                     display += '<ul style="list-style:none;">'+
                         '<li>Customer Id: '+namez[i].customer_id+'</li>'+
                         '<li>Product Title: '+namez[i].product_title+'</li>'+
                         '<img src="req_product_images/'+namez[i].image+'" alt="Product request Image">'+ 
                         '<li>Product Description:'+namez[i].product_des+'</li>'+'</ul>';
                 }
                 document.getElementById('customer_product_req2').innerHTML=display;
             }
         }
             req.send();
         }
</script>

<table>
   <input type="hidden" name="sid"  value="<?php echo $_SESSION['id1'];?>">
    <input type="hidden" name="semail" value="<?php echo $_SESSION['success1'];?>">
</table>
<!-- Common footer -->

<!-- contact form -->
<section class="form-part">
    <div class="contact-info">
         <div class="contac2-header">
                <h1>Stay with us</h1>
                <p>We ensure quality and support</p>
         </div>
        <form action="">
            <input type="text" placeholder="Full Name">
            <input type="email" placeholder="Email Address">
            <textarea cols="30" rows="10" placeholder="Message"></textarea>
            <ul>
                <li><input type="checkbox"><span style="color: #fff;">Subscribe Us</span></li>
                <li><input type="button" value="Send"></li>
            </ul>
         </form>
    </div>
</section>

<!--  -->
<!-- Contact section end -->

<!-- end of contact form -->

<?php
include('footer.php');
?>