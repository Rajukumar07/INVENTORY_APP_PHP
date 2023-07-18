<?php
include("connection.php");

$bill_no = $_POST['bill_no'];
$bill_date = $_POST['bill_date'];
$cust_name = $_POST['cust_name'];
$contact = $_POST['contact'];

$sql = "INSERT INTO `sale_mstr` (CUST_NAME,CONTACT,BILL_NO,BILL_DATE) VALUES ('$cust_name','$contact', '$bill_no','$bill_date')";
$res = mysqli_query($conn, $sql);
if ($res) {
    $sale_master_id = mysqli_insert_id($conn);  //to get last inserted id from db.
    $sql = "SELECT * FROM temp_item ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {          
            $item_id = $row['item_id'];
            $rate = $row['rate'];
            $qty = $row['qty'];            
            $query = "INSERT INTO `sale_dtls` (ITEM_ID,RATE, QTY, SALE_MSTR_ID) VALUES ('$item_id', '$rate', '$qty','$sale_master_id')";
            $res1 = mysqli_query($conn, $query);

            if ($res1) {
                // temp Delete
                $query2 = "DELETE FROM `temp_item` ORDER BY id DESC LIMIT 1";
                $res2 = mysqli_query($conn, $query2);
                if ($res2) {
                    echo "Data Save Successfully.";
                } else {
                    echo "ERROR !";
                }
            }
        }
    } else {
        echo "NOT INSERTED";
    }
}
