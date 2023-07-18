<?php
include("connection.php");
include("header.php");

$query = "Select * from item_master";
$result = mysqli_query($conn, $query);
$rows = mysqli_num_rows($result);

if ($rows > 0) {
?>

    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="col-9" style="text-align: center; font-size:20px;"> <strong>ITEM LIST</strong></div>
        <div class="col-2 "><a href="http://localhost/inventory/add_item.php" class="btn btn-primary">ADD</a></div>
    </div>

    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="col-10">

            <table class="table table-bordered table-hover text-center">
                <tr class="table-info">
                    <th>ID</th>
                    <th>ITEM_CODE</th>
                    <th>ITEM_NAME</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>


            <?php
            while ($data = mysqli_fetch_assoc($result)) {

                echo "            
            <tr>            
            <td>" . $data['ITEM_ID'] . "</td>
            <td>" . $data['ITEM_CODE'] . "</td>
            <td>" . $data['ITEM_NAME'] . "</td>
            <td><a class='btn btn-primary' href='edit_item.php?id=$data[ITEM_ID]'>edit</a></td>
            <td><a class='btn btn-danger'  onclick = 'checkDelete($data[ITEM_ID]);'>delete</a></td>            
            </tr>           
            ";
            }
        }
            ?>

            </table>
            <div class="col-1"></div>


        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        
        function checkDelete(item_id) {
            if (confirm("Do you want to delete this item ?")) {
                $.ajax({
                    url: 'delete_item.php',
                    type: 'POST',
                    data: {
                        id: item_id

                    },
                    success: function(response) {

                        if (response) {
                            alert("delete successfully");
                            //window.location.href("itemlist.php");
                            location.reload();
                        }
                    }
                });
            }
        }

        function editItem(id, code, iname) {
            $.ajax({
                url: 'edit_item.php',
                type: 'POST',
                data: {
                    id: id,
                    icode: code,
                    iname: iname

                },
                success: function(response) {

                    if (response) {
                        alert("update successfully");
                        window.location.href("itemlist.php");
                    }
                }
            });
        }
    </script>