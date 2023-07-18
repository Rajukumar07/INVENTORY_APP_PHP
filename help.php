<?php
                        $sql = "SELECT temp_item.*,item_master.item_name FROM temp_item left join item_master on temp_item.item_id=item_master.item_id";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $sum = 0;
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row['rate']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td><?php echo $row['total'];
                                        $sum += $row['total']; ?></td>
                                    <td> <a id='removeItem' class="btn btn-danger" onclick="removeItem(<?php echo $row['item_id']; ?>);">X</a></td>
                                </tr>
                        <?php $count++;
                            }
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total ::</strong></td>
                            <td><strong><?php echo $sum ?></strong></td>
                            <td></td>
                        </tr>





                        <!-- purchase .php ka  -->


                        <?php
                        $sql = "SELECT temp_item.*,item_master.item_name FROM temp_item left join item_master on temp_item.item_id=item_master.item_id";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $sum = 0;
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row['rate']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td><?php echo $row['total'];
                                        $sum += $row['total']; ?></td>
                                    <td> <a id='removeItem' class="btn btn-danger" onclick="removeItem(<?php echo $row['item_id']; ?>);">X</a></td>
                                </tr>
                        <?php $count++;
                            }
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total ::</strong></td>
                            <td><strong><?php echo $sum ?></strong></td>
                            <td></td>
                        </tr>