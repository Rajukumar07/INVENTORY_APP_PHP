<?php
include("connection.php");
include("header.php");
error_reporting(0);


$query = "Select * from supplier";
$result = mysqli_query($conn, $query);
$rows = mysqli_num_rows($result);

if ($rows > 0) {
?>
    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="col-9" style="text-align: center; font-size:20px;"> <strong>SUPPLIER LIST</strong></div>
        <div class="col-2 "><a href="http://localhost/inventory/add_supplier.php" class="btn btn-primary">ADD</a></div>
    </div>
    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table table-bordered text-center">
                <tr class="table-info">

                    <th>SUPPLIER ID</th>
                    <th>SUPPLIER NAME</th>
                    <th>ADDRESS</th>
                    <th>CONTACT</th>
                    <th colspan=2>ACTION</th>
                </tr>


            <?php
            $count = 1;
            while ($data = mysqli_fetch_assoc($result)) {
                echo "
                  
            <tr>            
            <td>" . $count . "</td>
            <td>" . $data['SUPP_NAME'] . "</td>
            <td>" . $data['SUPP_ADDRESS'] . "</td>
            <td>" . $data['SUPP_CONTACT'] . "</td>
            <td><a class='btn btn-primary' href='edit_supplier.php?id=$data[ID]'>edit</a></td>
            <td><a class='btn btn-danger'  onclick ='checkDelete($data[ID]);'>delete</a></td>
            </tr> 
                     
            ";

                $count++;
            }
        }
            ?>
        </div>
        <div class="col-1"></div>
    </div>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        function checkDelete(sid) {
            if (confirm("Do you want to delete this item ?")) {
                $.ajax({
                    url: 'delete_supplier.php',
                    type: 'POST',
                    data: {
                        id: sid

                    },
                    success: function(response) {
                        if (response) {
                            alert("delete successfully");
                            location.reload();
                        }
                    }
                });
            }
        }
    </script>