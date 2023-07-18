<?php

include("connection.php");
include("header.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>ITEM REPORT PAGE</title>
</head>



<body>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 form-des">
            <h2 style="margin:auto; margin-top: 2%; text-align:center; color:red; font-weight: bold; margin-bottom: 3%;">CURRENT STOCK</h2>           
            <div class="row">
                <table class="table  table-hover table-bordered " style="text-align: center;">
                    <thead class="thead">
                        <tr class="table-info">
                            <th>S.no</th>
                            <th>item Name</th>
                            <th>Purchase Quantity</th>
                            <th>Sale Quantity</th>
                            <th>Availabe Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // fetch data from purchase details and
                        //$sql1 = "SELECT ITEM_NAME, SUM(QTY) AS TOTAL_PURCHASE FROM purchase_dtls left join purchase_dtls.ITEM_ID = item_master.ITEM_ID GROUP BY ITEM_NAME ";
                        // fetch data from sale details and
                        //$sql2 = "SELECT ITEM_NAME, SUM(QTY) AS TOTAL_SALE FROM sale_dtls left join sale_dtls.ITEM_ID = item_master.ITEM_ID GROUP BY ITEM_NAME ";
                        $query = "SELECT P.ITEM_NAME ,P.TOTAL_PURCHASE,S.TOTAL_SALE, COALESCE(P.TOTAL_PURCHASE,0) - COALESCE(S.TOTAL_SALE,0) AS CUR_STOCK 
                        FROM (SELECT ITEM_NAME, SUM(QTY) AS TOTAL_PURCHASE FROM purchase_dtls left join item_master on
                         purchase_dtls.ITEM_ID = item_master.ITEM_ID GROUP BY ITEM_NAME ) AS P JOIN 
                         (SELECT ITEM_NAME, COALESCE(SUM(QTY),0) AS TOTAL_SALE FROM sale_dtls right
                          join  item_master on sale_dtls.ITEM_ID = item_master.ITEM_ID GROUP BY ITEM_NAME) AS S 
                          ON P.ITEM_NAME = S.ITEM_NAME";
                        $rows = mysqli_query($conn, $query);
                        $sn = 1;
                        while ($res = mysqli_fetch_array($rows)) {
                        ?>
                            <tr class="text-left">
                                <td><?= $sn; ?></td>
                                <td><?php echo $res['ITEM_NAME']; ?></td>
                                <td><?php echo $res['TOTAL_PURCHASE']; ?></td>
                                <td><?php echo $res['TOTAL_SALE']; ?></td>
                                <td><?php echo $res['CUR_STOCK']; ?></td>
                            </tr>

                        <?php
                            $sn++;
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
    </div>

</body>

</html>