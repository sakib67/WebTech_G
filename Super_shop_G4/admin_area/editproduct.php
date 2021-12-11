<!-- Session -->
<?php
include("includes/db.php");
// session_start();
?>

<?php
   if(isset($_GET['id']))
    {
        
        $theId=$_GET['id'];
        $sql="SELECT * FROM products WHERE product_id='$theId' ";
        $selected_query=mysqli_query($con,$sql);
        while($row = mysqli_fetch_assoc($selected_query))
        {
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_price=$row['product_price'];
            $product_desc=$row['product_desc'];
            $product_keywords=$row['product_keywords'];
        }

    }
    else{
        header('location: index.php');
        return;
    }
 ?>

 <!-- here after working running -->
 <?php

    if(isset($_POST['update'])){
        $theId=$_GET['id'];
        $product_title=$_POST['product_title'];
        $product_price=(int)$_POST['product_price'];
        $product_desc=$_POST['product_desc'];
        $product_keywords=$_POST['product_keywords'];
        
        // UPDATE `products` SET `product_id`=[value-1],`product_cat`=[value-2],`product_brand`=[value-3],`product_title`=[value-4],`product_price`=[value-5],`product_desc`=[value-6],`product_image`=[value-7],`product_keywords`=[value-8] WHERE 1

        $sql= "UPDATE `products` SET product_title='$product_title', product_price=$product_price, product_desc='$product_desc', product_keywords='$product_keywords' WHERE product_id= $theId";
        $query=mysqli_query($con,$sql);

        echo 'Updated record';
        
        }

?>

<?php
    // if you cancel
        if(isset($_POST['cancel'])){
            header('location: dashboard1.php');
            return;
        }
?>

<form action="" method="POST">
    <table>
        <tr> 
            <td> Product_Title:<input type="text" name="product_title" placeholder="Product Title" Required value="<?php echo $product_title;?>" ></td>
        </tr>
        <tr> 
        <tr> 
            <td> Product_Price:<input type="text" name="product_price" placeholder="product_price" Required value="<?php echo $product_price;?>" ></td>
        </tr>
            <td>Product_Description:<textarea id="" name="product_desc" ><?php echo $product_desc;?></textarea></td>
        </tr>
        <tr> 
            <td>product_keywords:<input type="text" name="product_keywords" placeholder="product_keywords" Required value="<?php echo $product_keywords;?>"> </td>
        </tr>
        <tr> 
            <td><input type="submit" name="update" value="Update" > </td>
        </tr>
        <tr> 
            <td> <input type="submit" name="cancel" value="cancel" ></td>
        </tr>
        <tr> 
            <td> <input type="hidden" name="hiddenemail" value="<?php echo $_GET['id'];?>"></td>
        </tr>
    </table>
 </form>