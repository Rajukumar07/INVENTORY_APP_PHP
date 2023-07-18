<?php
include("connection.php");
include("header.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<script type="text/javascript">
    function total() {
        var rate = eval(document.getElementById("price").value);
        var qty = eval(document.getElementById("item_qty").value);
        var amount = qty * rate;
        document.getElementById("amt").value = amount;
        //alert("amount"+amount);
    }

    function removeItem(id) {
        $.ajax({
            url: 'remove_item_pur.php',
            type: 'POST',
            data: {
                item_id: id
            },
            success: function(response) {
                if (response == 1) {
                    // location.reload();
                    itemlist();
                }
            }
        });
    }

    function itemlist() {
        $.ajax({
            url: 'temp_item.php',
            type: 'GET',
            success: function(response) {
                if (response) {
                    // alert(response);
                    $("#data").html(response);
                }
            }
        });
    }

    $("document").ready(function() {
        $("#add_item").on("click", function(e) {
            var item_id = $("#itemId").val();
            var item_qty = $("#item_qty").val();
            var rate = $("#price").val();
            var total_price = $("#amt").val();
            //   alert(total_price);
            if (!item_id || !rate) {
                alert("Please Add item or rate.");
            } else {
                $.ajax({
                    url: 'pur_temp.php',
                    type: 'POST',
                    data: {
                        item_id: item_id,
                        rate: rate,
                        item_qty: item_qty,
                        total_price: total_price
                    },
                    success: function(response) {
                        if (response) {
                            alert(response);
                            itemlist();
                            // location.reload();
                        }
                    }
                });
            }
        });

        $("document").ready(function() {
            $("#save").on("click", function(e) {
                var sid = $("#sid").val();
                var invoiceNo = $("#invoiceNo").val();
                var invoice_date = $("#invoice_date").val();
                var receivingNo = $("#receivingNo").val();
                var receiving_date = $("#receiving_date").val();

                if (!sid || !invoice_date || !receiving_date || !receivingNo) {
                    alert("All fields are required.");
                } else {
                    $.ajax({
                        url: 'pur_backend.php',
                        type: 'POST',
                        data: {
                            sid: sid,
                            invoiceNo: invoiceNo,
                            invoice_date: invoice_date,
                            receivingNo: receivingNo,
                            receiving_date: receiving_date
                        },
                        success: function(response) {
                            if (response) {
                                alert(response);
                                location.reload();
                            } 
                        }
                    });
                }
            });
        });
    });
</script>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <center>
                    <h3 style="font-size: 20px; color:red;"><strong>PURCHASE</strong></h3>
                </center>
            </div>
        </div>
        <div class="row mt-4">

            <div class="col-1">
                <p>Supplier :</p>
            </div>
            <div class="col-2"> <select name="sname" id="sid">
                    <option value="">--select--</option>
                    <?php
                    $sql = "SELECT * from supplier ";
                    $res = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {

                            echo "<option value='$row[ID]'>$row[SUPP_NAME]</option>";
                        }
                    } else {
                        echo '<div class="alert alert-primary myAlert" role="alert"> No Vendors Found!  </div> ';
                    }
                    ?>
                </select></div>
            <div class="col-1">
                <p>Invoice No : </p>
            </div>
            <div class="col-2"><input type="text" name="invoiceNo" id="invoiceNo" value="<?php if (isset($_POST['receivingNo'])) {
                                                                                                echo $_POST['receivingNo'];
                                                                                            }  ?>"></div>
            <div class="col-2">
                <p>Invoice Date :</p>
            </div>
            <div class="col-2"><input type="date" id="invoice_date" name="invoice_date" value="<?
                                                                                                if (isset($_POST['invoice_date'])) {
                                                                                                    echo $_POST['invoice_date'];
                                                                                                }  ?>"> </div>
            <div class="col-2"></div>
        </div>

        <div class="row">
            <div class="col-2">
                <p>Receiving No :</p>
            </div>
            <div class="col-2"><input type="text" name="receivingNo" id="receivingNo" value="<?php echo (rand(1, 1000)); ?>" readonly></div>
            <div class="col-2">
                <p>Receiving Date : </p>
            </div>
            <div class="col-2"><input type="date" id="receiving_date" name="receiving_date" value="<?
                                                                                                    if (isset($_POST['receiving_date'])) {
                                                                                                        echo $_POST['receiving_date'];
                                                                                                    }   ?>"> </div>
            <div class="col-4"></div>
        </div>

        <div class="row table table-bordered mt-1">
            <div class="col-12">
                <center>
                    <h3 style="font-size: 20px; color:red;"><strong>ITEMS</strong></h3>
                </center>
            </div>
            <div class="col-3">
                ITEM : <select class="form-select" id="itemId">
                    <option value="">--Item--</option>
                    <?php
                    $sql = "SELECT * from item_master ";
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<option value={$row["ITEM_ID"]}>{$row["ITEM_NAME"]}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-3">
                RATE :<input class="form-control " type="text" name="rate" id="price" value="" onchange="total();">
            </div>
            <div class="col-2">
                QTY :<input class="form-control " type="number" name="qty" id="item_qty" onkeyup="total();">
            </div>
            <div class="col-3">
                TOTAL :<input class="form-control " type="text" name="amt" id="amt" value="" readonly></td>
            </div>
            <div class="col-1"><button class="btn btn-primary" id="add_item">ADD</button></div>
        </div>

        <div class="row ">
            <div class="col-12">
                <table class="table table-bordered text-center mt-2">
                    <thead>
                        <tr class="table-info">
                            <th>Id</th>
                            <th>ITEM</th>
                            <th>RATE</th>
                            <th>QTY</th>
                            <th>TOTAL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="data">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-auto">
            <center> <input type="submit" name="save" id="save" class="btn btn-primary" value="save"></center>
        </div>
    </div>
</body>

</html>