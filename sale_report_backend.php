<?php
include("connection.php");
$from = $_POST['from'];
$to = $_POST['to'];


$query = "select t1.CUST_NAME,t1.CONTACT,t1.BILL_NO,t1.BILL_DATE ,t2.QTY,t2.RATE,t3.ITEM_NAME FROM  sale_mstr as t1  left join sale_dtls as t2 on  t1.ID = t2.SALE_MSTR_ID  left join item_master as t3 on t2.ITEM_ID = t3.ITEM_ID  where t1.BILL_DATE BETWEEN '$from' AND '$to' ";

$res = mysqli_query($conn, $query);
$output = "";
if (mysqli_num_rows($res) > 0) {
    $output = ' <table class="table table-bordered">
<thead>
    <tr class="table-info">
        <th scope="col">#</th>
        <th scope="col">CUST NAME</th>
        <th scope="col">CONTACT</th>
        <th scope="col">BILL_NO</th>
        <th scope="col">BILL Date</th>
        <th scope="col">ITEM</th>
        <th scope="col">RATE</th>
        <th scope="col">QTY</th>        
    </tr>
</thead>
<tbody>';
    // $sum = 0;
    $count = 1;
    while ($row = mysqli_fetch_array($res)) {
        $cname = $row['CUST_NAME'];
        $contact = $row['CONTACT'];
        $billNO = $row['BILL_NO'];
        $billDate = $row['BILL_DATE'];
        $iname = $row['ITEM_NAME'];
        $rate = $row['RATE'];
        $qty = $row['QTY'];
        // $total = $row['TOTAL'];
        // $sum += $total;
        $output .= "<tr>
      <td> $count </td>
      <td>" . $cname . "</td>
      <td>" . $contact . "</td>
      <td>" . $billNO . "</td>
      <td>" . $billDate . "</td>
      <td>" . $iname . "</td>
      <td>" . $rate . "</td>
      <td>" . $qty . "</td>
   
     
  </tr>
  </tbody> ";



        $count++;
    }

    
} else {
    $output = "No record found";
}



echo $output;
