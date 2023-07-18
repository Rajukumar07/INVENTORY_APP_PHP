<?php
include("connection.php");
include("header.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item </title>
</head>

<body>
    <div class="container">
        <center style="color: red;" class="mt-4">
            <h3>ADD ITEMS</h3>
        </center>
        <hr>
        <div class="row mt-5">
            <div class="col-md-4  offset-md-4">


                <form action="" method="GET">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">ITEM CODE :</label>
                        <input type="text" class="form-control" name="itemCode" id="formGroupExampleInput">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">ITEM NAME : </label>
                        <input type="text" class="form-control" name="itemName" id="formGroupExampleInput2">
                    </div>
                    <div class="col-auto ">
                        <button type="submit" name="submit" class="btn btn-primary input-group mb-3">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_GET['submit']) == "submit") {
    $itemCode = $_GET['itemCode'];
    $itemName = $_GET['itemName'];
    $itemPrice = $_GET['itemPrice'];

    if ($itemCode != "" && $itemName != "") {
        $query =  "insert into item_master values('0','$itemCode','$itemName')";
        $rows = mysqli_query($conn, $query);

        if ($rows > 0) {
            echo "<script>alert('Item Add  successfully..'); window.location.href='itemlist.php';</script> ";
        } else {
            echo "<script>alert('this Item already exists');</script>";
        }
    } else {
        echo "<script>alert(' All fields are  required .');</script>";
    }
}
?>