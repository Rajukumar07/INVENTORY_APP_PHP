<?php
include("connection.php");

// $sql1 = "insert into temp table";

$item_id = $_POST['item_id'];
$rate = $_POST['rate'];
$qty = $_POST['item_qty'];
$total = $_POST['total_price'];

$query1 = "select * from `temp_item` where item_id=$item_id";
$res1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($res1) > 0) {
    echo "Already Exist";  
    
} else {
    $query2 = "INSERT INTO `temp_item` VALUES ('0','$item_id', '$rate', '$qty', '$total')";    
    $res = mysqli_query($conn, $query2);
   echo"successfully added .";
}
mysqli_close($conn);
