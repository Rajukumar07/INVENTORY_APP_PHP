<?php
include("connection.php");


$query = "SELECT temp_item.*,item_master.item_name FROM temp_item left join item_master on temp_item.item_id=item_master.item_id";
$result = mysqli_query($conn, $query);
if ($result) {
    $sum = 0;
    $count = 1;
    $output = "";
    while ($row = mysqli_fetch_assoc($result)) {

        $iname = $row["item_name"];
        $rate = $row["rate"];
        $iqty = $row["qty"];
        $total = $row["total"];

        $output .= "  <tr>
                            <td>$count </td>
                            <td>$iname</td>
                            <td>$rate</td>
                            <td>$iqty</td>
                            <td>$total</td>
                            <td> <a id='removeItem' class='btn btn-danger' onclick='removeItem( $row[item_id]);'>X</a></td>
                        </tr>";
        $sum += $row["total"];
        $count++;
    }
}
$output .= "
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total ::</strong></td>
                    <td><strong> $sum </strong></td>
                    <td></td>
                </tr>";

echo $output;
