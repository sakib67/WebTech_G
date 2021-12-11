<?php 

include("includes/db.php");
ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="./js/script.js" defer></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="stylesheet" href="./css/pricing_plan.css">
     <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Admin Dashboard</title>
    <!-- add product -->
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
            tinymce.init({selector:'textarea'});
    </script>
    
    <style>
        .edit{
            background-color:green;
            color: #fff;
            font-size:20px;
        }
        .cd{
            background-color:red;
            color: #fff;
            font-size:20px;
        }
        .customer_product_req1{
          margin-left: 15px;
        }
    </style>
</head>
<body>

<nav>
  <div class="navbar">
    <div class="logo"><a href="#">SMS Portal</a></div>
      <ul class="tabs">
        
          <li data-tab-target="#members"  class="active tab">Members</li>
          <li data-tab-target="#add-product" class="tab">ADD</li>
          <li data-tab-target="#edit-product" class="tab">Edit</li>
          <li data-tab-target="#remove-product" class="tab">Remove</li>
          
      </ul>
    <div class="media-icons">
      <a href="alogout.php" >Logout <i class="fas fa-sign-out-alt"></i></i></a>
    </div>
  </div>
</nav>

