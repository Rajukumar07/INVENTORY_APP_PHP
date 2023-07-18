<?php
include("connection.php");

$id = $_POST['id'];
$query = "DELETE from supplier where ID = '$id' ";
$rows = mysqli_query($conn,$query);

    if($rows)
    {
        echo 1;
        ?>
        <!-- <META HTTP-EQUIV = "Refresh" CONTENT = "0; URL=http://localhost/inventory/supplierlist.php " > -->
        <?php
    }
    
    
    ?>