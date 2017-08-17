<?php
include 'left.php';
include 'db_config.php';
?>
<div class="box3">
    <div class="title"> Orders </div>
    
    <div class="box4"> All Order<hr> 
        <table class="category-show-tb">
            <tr>
                <th>Order  Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile </th>
                <th>Phone </th>
                <th> Address </th>
                <th> Action </th>
            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM order_detail");
            while ($fetch_order = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_order['order_id']; ?></td>
                    <td><?php echo $fetch_order['first_name'].' '.$fetch_order['last_name']; ?></td>
                    <td><?php echo $fetch_order['email']; ?></td>
                    <td><?php echo $fetch_order['mobile']; ?></td>
                    <td><?php echo $fetch_order['phone']; ?></td>
                    <td><?php echo $fetch_order['address'].' '.$fetch_order['address']; ?></td>
                    <td>
                        <a href="view_order.php?order_id=<?php echo $fetch_order['order_id']; ?>">view </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <!--    -------------- table --------------->

    </div>

</div>