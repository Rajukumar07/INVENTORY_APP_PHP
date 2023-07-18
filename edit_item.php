<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Item </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <center style="margin-top: 20px; color:red; font-weight:bold; font-size:20px;"><u>UPDATE ITEM</u></center>
        <div class="row" style="margin-top: 20px;">
            <div class="col-4  offset-4">
                <?php
                include("connection.php");

                $id = $_GET['id'];
                $query = "SELECT * FROM item_master where ITEM_ID = '$id'";
                $row = mysqli_query($conn, $query);
                if (mysqli_num_rows($row) > 0) {
                    while ($data = mysqli_fetch_assoc($row)) {
                ?>
                        <form action="edit_item_back.php" method="POST">
                            <div class="col-12 ">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">ITEM ID :</span>
                                    <input type="text" class="form-control" name="id" value="<?php echo $data['ITEM_ID'] ?>" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">ITEM CODE : </span>
                                    <input type="text" class="form-control" name="itemCode" value=<?php echo $data['ITEM_CODE'] ?>>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">ITEM NAME :</span>
                                    <input type="text" class="form-control" placeholder="Supplier name" name="itemName" value=<?php echo $data['ITEM_NAME'] ?>>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <input type="submit" value="UPDATE" name="submit" class="input-group mb-3 btn btn-primary">
                            </div>
                        </form>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>