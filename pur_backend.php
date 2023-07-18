<?php
include("connection.php");

$sid =$_POST['sid'];
$invoiceNo=$_POST['invoiceNo'];
$invoice_date=$_POST['invoice_date'];
$receivingNo=$_POST['receivingNo'];
$receiving_date=$_POST['receiving_date'];

echo $query = "INSERT INTO  purchase_mstr (INVOICE_NO, INVOICE_DATE, RECEIVING_NO,RECIEVING_DATE ,SUPP_ID) values('$invoiceNo','$invoice_date','$receivingNo','$receiving_date','$sid')";
$res = mysqli_query($conn,$query);

if($res)
{
  $pur_id = mysqli_insert_id($conn);  //to get last inserted id from db.
  $sql = "SELECT * FROM temp_item ";
  $result = mysqli_query($conn,$sql);
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          
        $item_id= $row['item_id'];
        $rate= $row['rate'];
        $qty= $row['qty'];  
        $sql3 = "INSERT INTO `purchase_dtls` (item_id, rate, qty, PURCHASE_ID) VALUES ('$item_id', $rate, $qty, $pur_id)";
        $res3 = mysqli_query($conn, $sql3);

        if($res3)
        {  
          // temp  Delete    
          $sql4 = "DELETE FROM `temp_item` ORDER BY id DESC LIMIT 1";
          $res4 = mysqli_query($conn,$sql4);
          if($res4)
          {              
              echo "Data Save Successfully.";
            }
          else
           {
            echo " error ! something missing on items";
          }     
        }
      }
    }else
    {
      echo "error";
  }
}
