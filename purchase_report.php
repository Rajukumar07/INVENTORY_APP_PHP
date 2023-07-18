<?php
include("connection.php");
include("header.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        function findRecord(e) {
            var from = $("#from").val();
            var to = $("#to").val();

            if (!from || !to) {
                alert("please enter the date");
            } else {
                //   alert(total_price);
                $.ajax({
                    url: 'purchase_rep_backend.php',
                    type: 'POST',
                    data: {
                        from: from,
                        to: to

                    },
                    success: function(response) {
                        alert(response);
                        $("#data").html(response);
                    }
                });
            }
        }
    </script>
</head>

<body>
    <div class="container mt-4">

        <div class="row table table-border">
            <center>
                <h3 style="color: red;"><u>PURCHASE REPORT </u></h3>
            </center>
            <div class="col-8 offset-4  mt-4">

                <div class="row">
                    <div class="col-4">
                        FROM : &nbsp; &nbsp;
                        <input class="form-label" type="date" id="from">

                    </div>
                    <div class="col-4">
                         TO :&nbsp; &nbsp;
                        <input class="form-label" type="date" id="to">
                    </div>

                    <div class="col-4">

                        <input class="btn btn-primary" type="button" id="search" value="find" onclick="findRecord();">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <hr>
   



    <div class="row mt-3">
        <div class="col-1 "></div>
        <div class="col-10 " id="data" style="text-align: center;"> </div>
        <div class="col-1 "></div>
    </div>




</body>

</html>