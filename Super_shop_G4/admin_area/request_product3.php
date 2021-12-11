


 <br>
        <h1>Add Your Product Request</h1>
        <br>
        <form action="dashboard3.php" method="post" enctype="multipart/form-data"> 
            
            <table align="center" width="795" border="2" bgcolor="#187eae">
                
                <tr align="center">
                    <td colspan="7"><h2>Insert New Product Request!</h2></td>
                </tr>
                
                <tr>
                    <td align="right"><b>Product Title:</b></td>
                    <td><input type="text" name="product_title" size="60" required/></td>
                </tr>

                <tr>
                    <td align="right"><b>Product Description:</b></td>
                    <td><textarea name="product_des" cols="20" rows="10" required></textarea></td>
                </tr>
                <tr>
                    <td align="right"><b>Product Image:</b></td>
                    <td><input type="file" name="image" /></td>
                </tr>    
                <tr align="center">
                    <td colspan="7"><input type="submit" name="insert_product_request" value="Insert Product Now"/></td>
                </tr>
            
             </table>
        
        
        </form>

          <br>


<!-- Add request products -->
<?php 

    if(isset($_POST['insert_product_request'])){
    
        //getting the text data from the fields
        $customer_id=(int) $_SESSION['id3'];
        $product_title = $_POST['product_title'];
        $product_des = $_POST['product_des'];
    
        //Images upload
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp,"req_product_images/$image");
    
         $insert_product = "INSERT INTO `request_products`( `customer_id`, `product_title`, `product_des`, `image`) VALUES ('$customer_id','$product_title','$product_des','$image')";
         
         $insert_pro = mysqli_query($con, $insert_product);
         
         if($insert_pro){
         
            echo "<script>alert('Product request has been inserted!')</script>";

         }
    }



?>