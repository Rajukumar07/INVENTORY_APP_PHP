<?php
include("connection.php");
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<style>
    #billNo {
        border: none;
    }
</style>
<script>
    function removeItem(id) {

        $.ajax({
            url: 'remove_item_pur.php',
            type: 'POST',
            data: {
                item_id: id

            },
            success: function(response) {

                if (response == 1) {
                    itemlist();
                    //location.reload();
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
                    alert(response);
                    $("#data").html(response);

                }
            }
        });
    }

    function addSaleItem() {

        var item_id = $("#itemId").val();
        var item_qty = $("#item_qty").val();
        var rate = $("#item_rate").val();
        var total_price = $("#total_price").val();

        if (!item_id || !rate) {
            alert("please add item or rate..");
        } else {

            $.ajax({
                url: "sale_temp.php",
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
    }

    //  Clicking on 'SALE' button :- Sales Add & product quantity Update in the product_tb after selling:-

    function saveItem() {
        var billNo = $("#billNo").val();
        var date = $("#date").val();
        var cust_name = $("#cust_name").val();
        var contact_No = $("#contact").val();

        if (!contact_No || !cust_name || !date) {
            alert("All fields are required..");
        } else {

            $.ajax({
                url: 'sale_backend.php',
                type: 'POST',
                data: {
                    bill_no: billNo,
                    bill_date: date,
                    cust_name: cust_name,
                    contact: contact_No
                },
                success: function(response) {
                    if (response) {
                        alert(response);
                        location.reload();
                    }
                }
            });

        }
    }

    $(document).ready(function() {
        //Calculate Total Amount
        $("#item_qty").on('keyup', function() {
            //  alert("pressed");
            var item_qty = $("#item_qty").val();
            var rate = $("#item_rate").val();
            $("#total_price").val(rate * item_qty);
        });

        //according item to fetch rate
        $("#itemId").on('change', function() {
            var item_id = $("#itemId").val();
            $.ajax({
                url: 'sale_temp.php',
                type: 'POST',
                data: {
                    id_item: item_id
                },
                success: function(response) {
                    if (response) {
                        $("#item_rate").val(response);
                    }
                }
            });
        });



    }); // closing of ready function
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<body>
    <div class="container">
        <div class="row mt-1">
            <div class="col-12">
                <center>
                    <h3 style="font-size: 20px; color:red;"><strong><u>SALE</u></strong></h3>
                </center>
            </div>
        </div>
        <table class="table table-borderless mt-3">
            <tr>
                <td>Bill No : </td>
                <td> <input type="text" id="billNo" name="billNo" value="<?php echo (rand(1, 1000));  ?>" readonly></td>

                <td> Date : </td>
                <td>
                    <input class="date" type="date" name="date" id="date" value="" />
                </td>
            </tr>
            <tr>
                <td>Customer Name: </td>
                <td> <input type="text" name="custName" id="cust_name"> </td>
                <td>Contact No : </td>
                <td>
                    <input type="text" name="phno" id="contact" value="" />
                </td>
            </tr>

        </table>
        <table class="table table-border">
            <tr>
                <td>
                    ITEM :
                    <select class="form-select" id="itemId">
                        <option value="">--Item--</option>
                        <?php
                        $sql = "SELECT * from item_master ";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<option value={$row["ITEM_ID"]}>{$row["ITEM_NAME"]}</option>";
                        }
                        ?>
                    </select>
                </td>
                <!-- <td><input type="text" id="item_id" name="item_id" value= ""></td -->
                <td>RATE :<input class="form-control " type="text" name="rate" id="item_rate" readonly></td>
                <td>QTY :<input class="form-control " type="number" name="qty" id="item_qty"></td>
                <td>TOTAL :<input class="form-control " type="text" name="amt" id="total_price" value="" readonly></td>
                <td><input type="button" class="btn btn-primary" onclick="addSaleItem();" value="ADD"></td>
            </tr>
            <hr>
        </table>

        <div class="row">
            <center>
                <p style="font-size: 20px; color:red;"><strong>INVOICE</strong></p>
            </center>
            <div class="col-12">
                <table class="table table-bordered  " style="text-align: center;">
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
            <!-- <div class="col-1"></div> -->
        </div>
        <div class="col-auto">
            <center> <input type="submit" id="sale" class="btn btn-primary" value="save" onclick="saveItem();"></center>
        </div>
    </div>



</body>

</html>



<?php

?>