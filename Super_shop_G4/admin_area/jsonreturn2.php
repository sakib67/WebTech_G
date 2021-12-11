<?php
include('includes/db.php');
$sql = "SELECT * FROM customer_request";
$result = mysqli_query($con, $sql);

//Get the data
$identifiers = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($identifiers);

?> 