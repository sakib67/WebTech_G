
<!-- 
SELECT `customer_id`, `product_name`, `product_category`, `product_brand` FROM `customer_request` WHERE 1
   <br> -->
        <h1>Remove product category</h1>
        <br>
                <!-- Delete  work -->
       <table border="1px" width="100%">
        <tr>
            <th>Category id</th>
            <th>product_name</th>
            <th>product_category</th>
            <th>product_brand</th>
        </tr>

        
            <?php
               $id=(int) $_SESSION['id4'];
                $sql="SELECT * FROM `customer_request` WHERE customer_id='$id'";
                $selected_query=mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($selected_query))
                {
                    $id=$row['id'];
                    $product_name=$row['product_name'];
                    $product_category=$row['product_category'];
                    $product_brand=$row['product_brand'];

            ?>
                    <tr>
                        <td><?php echo $id?></td>
                        <td><?php echo $product_name?></td>
                        <td><?php echo $product_category?></td>
                        <td><?php echo $product_brand?></td>
                         <td>
                            <a href="dashboard4.php?deleteproduct=<?php echo $id?>" class="cd">Delete</a>
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
            $dsql="DELETE FROM `customer_request` WHERE id='$theId'  ";
            $dquery= mysqli_query($con,$dsql);
            echo "<script>alert('Requested Product Category has been deleted!')</script>";
         
        }
        ?>
        <br>
        <br>