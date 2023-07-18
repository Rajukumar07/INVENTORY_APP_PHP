<?php
include("connection.php");

if (!empty($_POST['id_item'])) {
    $itemId = $_POST['id_item'];
    $sql = "SELECT RATE from purchase_dtls where  ITEM_ID = $itemId order by ID desc";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        if (mysqli_num_rows($res) > 0) {

            $data = mysqli_fetch_assoc($res);
            echo $data['RATE'];
        }
    }
}

if (!empty($_POST['item_id']) &&  !empty($_POST['rate']) &&  !empty($_POST['item_qty']) && !empty($_POST['total_price'])) {

    $item = $_POST['item_id'];
    $rate = $_POST['rate'];
    $qty = $_POST['item_qty'];
    $total_price = $_POST['total_price'];

    $query = "select * from `temp_item` where item_id=$item";
    $res1 = mysqli_query($conn, $query);
    if (mysqli_num_rows($res1) > 0) {
        echo "Already Exist";
    } else {
        $query1 = "SELECT SUM(QTY) as qty from purchase_dtls WHERE ITEM_ID=$item";
        $pur_qty = mysqli_query($conn, $query1);
        $item_qty = mysqli_fetch_array($pur_qty);
        $pur_item_qty = $item_qty['qty'];
        $query2 = "SELECT COALESCE(SUM(QTY),0) as item_qty from sale_dtls WHERE ITEM_ID=$item";
        $sal_qty = mysqli_query($conn, $query2);
        $sal1 = mysqli_fetch_array($sal_qty);
        $sale_item_qty = $sal1['item_qty'];
        $remainQty = ($pur_item_qty - $sale_item_qty);
        if ($remainQty >= $qty) {
            $sql = "INSERT INTO `temp_item` (id ,item_id, rate, qty, total) VALUES ('0','$item', '$rate', '$qty', '$total_price')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                echo "succefully added";
            } else {
                echo "NOT INSERTED Data";
            }
        } else {
            echo "The Available quantity is '.$remainQty.' please insert below Available Quantity.";
        }
    }
}
