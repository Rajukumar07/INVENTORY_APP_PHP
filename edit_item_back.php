<?php
include("connection.php");

$id = $_POST['id'];
$icode = $_POST['itemCode'];
$iname = $_POST['itemName'];


$query =  "UPDATE item_master SET ITEM_CODE ='$icode' , ITEM_NAME ='$iname' where item_master.ITEM_ID ='$id' ";
$rows = mysqli_query($conn, $query);

if ($rows > 0) {

    echo "<script>alert('Item Updated  successfully..');window.location.href='itemlist.php';</script>";
} else {
    echo "<script>alert('Item not Updated');</script>";
}
