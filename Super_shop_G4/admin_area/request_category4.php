

        <h1>Add Your Product Category Request</h1>
        <br>
        <form action="dashboard4.php" method="post" enctype="multipart/form-data"> 
            
            <table align="center" width="795" border="2" bgcolor="#187eae">
                
                <tr align="center">
                    <td colspan="7"><h2>Insert New Product Category Request!</h2></td>
                </tr>
                
                <tr>
                    <td align="right"><b>Product Name:</b></td>
                    <td><input type="text" name="product_name" size="60" required/></td>
                </tr>
                 <tr>
                    <td align="right"><b>Product Category:</b></td>
                    <td><input type="text" name="product_category" size="60" required/></td>
                </tr>
                 <tr>
                    <td align="right"><b>Product Brand:</b></td>
                    <td><input type="text" name="product_brand" size="60" required/></td>
                </tr>
                <tr align="center">
                    <td colspan="7"><input type="submit" name="insert_product_cate_req" value="Insert Product Now"/></td>
                </tr>
            
             </table>
        
        
        </form>

          <br>


<!-- SELECT `customer_id`, `product_name`, `product_category`, `product_brand` FROM `customer_request` WHERE 1 -->
<!-- Add request products -->
<?php 

    if(isset($_POST['insert_product_cate_req'])){
    
        //getting the text data from the fields
        $customer_id=(int) $_SESSION['id4'];
        $product_name = $_POST['product_name'];
        $product_category = $_POST['product_category'];
        $product_brand=$_POST['product_brand'];

    
         $insert_product = "INSERT INTO `customer_request`( `customer_id`, `product_name`, `product_category`,product_brand) 
                           VALUES ($customer_id,'$product_name','$product_category','$product_brand')";
         
         $insert_pro = mysqli_query($con, $insert_product);
         
         if($insert_pro){
         
            echo "<script>alert('Product Category request has been inserted!')</script>";

         }
    }



?>