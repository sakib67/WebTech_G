        <br>
        <h1>All Admin Members data: Edit or delete :</h1>
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
                $sql="SELECT * FROM admins WHERE email!='tadmin@gmail.com'";
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
                            <a href="updateadmins1.php?id=<?php echo  $id?>" class="edit">Edit</a>
                            <a href="dashboard1.php?delete=<?php echo $id?>" class="cd">Delete</a>
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
            if ( $theId==$_SESSION['id1']) {
                echo "You can't delete yourself, Contact with tadmin";
            }else{
                $dsql="DELETE FROM admins WHERE id= '$theId' ";
                $dquery= mysqli_query($con,$dsql);
                $dsql="DELETE FROM login WHERE id= '$theId' ";
                $dquery= mysqli_query($con,$dsql);
                echo " Deleted records..";

            }
            
        }
        ?>
      <br>
      <br>