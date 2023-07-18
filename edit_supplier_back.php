<?php
include("connection.php");

$id = $_POST['id'];
$sname = $_POST['sname'];
$address = $_POST['address'];
$contact = $_POST['contact'];


$query =  "UPDATE supplier SET SUPP_NAME ='$sname' , SUPP_ADDRESS ='$address',SUPP_CONTACT='$contact' where ID ='$id' ";
$rows = mysqli_query($conn, $query);

if ($rows > 0) {

    echo "<script>alert(' Updated  successfully..');window.location.href='supplierlist.php';</script>";
} else {
    echo "<script>alert(' Not Updated');</script>";
}