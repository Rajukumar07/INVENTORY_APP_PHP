<?php
include("header.php");
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier </title>
    <style>


    </style>


</head>

<body>


    <div class="container">
        <center class="mt-4">
            <h3 style="color: red;">ADD SUPPLIER</h3>
            <hr>
        </center>
        <div class="row ">
            <div class="col-md-4  mt-4  offset-md-4">                
                <form action="add_supplier.php" method="POST">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">SUPPLIER NAME : </label>
                        <input type="text" class="form-control" name="supplierName" id="formGroupExampleInput">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">ADDRESS : </label>
                        <input type="text" class="form-control" name="address" id="formGroupExampleInput2">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">CONTACT : </label>
                        <input type="text" class="form-control" name="contact" id="formGroupExampleInput2">
                    </div>

                    <div class="col-auto">
                       <button type="submit" name="submit" class="btn btn-primary input-group mb-3">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>


<?php

if (isset($_POST['submit']) == "submit") {
    $sname = $_POST['supplierName'];
    $add = $_POST['address'];
    $contact = $_POST['contact'];

    if ($sname != "" && $add != "" && $contact != "") {


        $query =  "INSERT into supplier values('0','$sname','$add','$contact')";
        $rows = mysqli_query($conn, $query);

        if ($rows > 0) {
            echo "<script>alert('Supplier Add  successfully..'); window.location.href='supplierlist.php';</script> ";
        } else {
            echo "<script>alert(' already exists');</script>";
        }
    } else {
        echo "<script>alert(' All fields are  required .');</script>";
    }
}
?>