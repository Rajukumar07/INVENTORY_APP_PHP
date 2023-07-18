<?php
include("connection.php");

$id = $_POST['id'];
print_r($id);
$query = "DELETE from item_master where ITEM_ID = '$id' ";
$rows = mysqli_query($conn,$query);

    if($rows)
    {
        echo 1;
        ?>
        <!-- <META HTTP-EQUIV = "Refresh" CONTENT = "0; URL=http://localhost/inventory/itemlist.php " > -->
        <?php
    }else{
        echo 0;
    }
    
    
    ?>
