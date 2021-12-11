

   <br>
        <h1>Remove requested product: </h1>
        <br>
                <!-- Delete  work -->
       <table border="1px" width="100%">
        <tr>
            <th>ID</th>
            <th>Product Image</th>
            <th>Product Title</th>
            <th>Product Description</th>
        </tr>

        
            <?php
               $id=(int) $_SESSION['id3'];
                $sql="SELECT * FROM `request_products` WHERE customer_id='$id'";
                $selected_query=mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($selected_query))
                {
                    $id=$row['id'];
                    $product_title=$row['product_title'];
                    $product_des=$row['product_des'];
                    $image=$row['image'];

            ?>
                    <tr>
                        <td><?php echo $id?></td>
                        <td><img src="./req_product_images/<?php echo $image?>" alt="Image"></td>
                        <td><?php echo $product_title?></td>
                        <td><?php echo $product_des?></td>
                         <td>
                            <a href="dashboard3.php?deleteproduct=<?php echo $id?>" class="cd">Delete</a>
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
            $dsql="DELETE FROM `request_products` WHERE id='$theId' ";
            $dquery= mysqli_query($con,$dsql);
            echo "<script>alert('Requested Product has been deleted!')</script>";
         
        }
        ?>
        <br>
        
        <br>