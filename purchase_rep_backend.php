<?php
include("connection.php");

 $from = $_POST['from'];
 $to = $_POST['to'];
    $query = "select t1.RECIEVING_DATE,t1.RECEIVING_NO,t1.INVOICE_NO,t1.INVOICE_DATE ,t2.QTY,t2.RATE,t3.ITEM_NAME ,t4.SUPP_NAME,t4.SUPP_ADDRESS,t4.SUPP_CONTACT FROM  purchase_mstr as t1  left join purchase_dtls as t2 on  t1.ID = t2.PURCHASE_ID  left join item_master as t3 on t2.ITEM_ID = t3.ITEM_ID  left join supplier as t4 on t1.SUPP_ID = t4.ID  where t1.INVOICE_DATE BETWEEN '$from' AND '$to' ";

    $res = mysqli_query($conn, $query);
    $output = "";
    if (mysqli_num_rows($res) > 0) {
        $output = ' <table class="table table-bordered">
<thead>
    <tr class="table-info">
        <th scope="col">#</th>
        <th scope="col">SUPP_NAME</th>
        <th scope="col">SUPP_CONTACT</th>
        <th scope="col">SUPP_ADDRESS</th>
        <th scope="col">INVOICE_NO</th>
        <th scope="col">INVOICE_DATE</th>
        <th scope="col">RECEIVING_NO</th>
        <th scope="col">RECIEVING_DATE</th>        
        <th scope="col">ITEM</th>
        <th scope="col">RATE</th>
        <th scope="col">QTY</th>       
    </tr>
</thead>
<tbody>';
        $sum = 0;
        $count = 1;
        // $totalAmt = 0;
        while ($row = mysqli_fetch_assoc($res)) {
            $sname = $row['SUPP_NAME'];
            $contact = $row['SUPP_CONTACT'];
            $address = $row['SUPP_ADDRESS'];
            $invoiceNo = $row['INVOICE_NO'];
            $invoiceDate = $row['INVOICE_DATE'];
            $recNo = $row['RECEIVING_NO'];
            $recDate = $row['RECIEVING_DATE'];
            $iname = $row['ITEM_NAME'];
            $rate = $row['RATE'];
            $qty = $row['QTY'];            
           
            $output .= "<tr>
                            <td> $count</td>
                            <td>" . $sname . "</td>
                            <td>" . $contact . "</td>
                            <td>" . $address . "</td>
                            <td>" . $invoiceNo . "</td>
                            <td>" . $invoiceDate . "</td>
                            <td>" . $recNo . "</td>
                            <td>" . $recDate . "</td>
                            <td>" . $iname . "</td>
                            <td>" . $rate . "</td>
                            <td>" . $qty . "</td>    
                        </tr>
  </tbody> ";
            $count++;
        }        
    }else{
        $output = "No Record Found";  
    }

echo $output;
