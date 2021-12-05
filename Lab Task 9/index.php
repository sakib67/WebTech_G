<?php
include("includes/db.php");

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


<!-- json using -->
<br>

<div id="customer_product_req1" style="margin:15px">
    <h4>Displaying all Products Reuest:</h4>
    <button type="button" id="grab" >All Product requests</button>

</div>
<div id="customer_product_req2" style="margin:15px">
</div>
<script>
         document.getElementById('grab').addEventListener('click', showValues);
         function showValues() {
             var req = new XMLHttpRequest();
             req.open('GET','jsonreturn.php',true );
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

</body>
</html>