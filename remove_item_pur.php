<?php
include("connection.php");

// $sql1 = "insert into temp table";
$tid = $_POST['item_id'];

$query1 = "delete from temp_item where item_id = $tid ";
$res = mysqli_query($conn, $query1);
if($res > 0)  {
   
    mysqli_close($conn);
    echo 1;       
    } 

