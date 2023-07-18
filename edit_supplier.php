<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> supplier </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>

<body>
    <div class="container mt-4">
        <center style="color: red; font: size 20px;">
            <h3>Edit Supplier</h3>
        </center>
        <div class="row">
            <div class="col-4 offset-4 mt-4">
                <?php
                include("connection.php");
                $id = $_GET['id'];
                $query = "SELECT * FROM supplier where ID = '$id'";
                $row = mysqli_query($conn, $query);
                if (mysqli_num_rows($row) > 0) {
                    while ($data = mysqli_fetch_assoc($row)) {
                ?>
                        <div class="row">

                            <form action="edit_supplier_back.php" method="POST">
                                <div class="col-12 ">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" >SUPPLIER ID :</span>
                                        <input type="text" class="form-control" placeholder="Supplier name" name="id" value="<?php echo $data['ID'] ?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" >SUPPLIER NAME :</span>
                                        <input type="text" class="form-control" placeholder="Supplier name" name="sname" value="<?php echo $data['SUPP_NAME'] ?>" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" >ADDRESS:</span>
                                        <input type="text" class="form-control" placeholder="Supplier name" name="address" value="<?php echo $data['SUPP_ADDRESS'] ?>" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" >CONTACT :</span>
                                        <input type="text" class="form-control" placeholder="Supplier name" name="contact" value="<?php echo $data['SUPP_CONTACT'] ?> " >
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <center><input type="submit" value="UPDATE" name="submit" class="input-group mb-3 btn btn-primary"></center>
                                </div>
                            </form>
                        </div>

                <?php
                    }
                } ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>