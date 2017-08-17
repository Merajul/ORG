<?php
include 'left.php';
include 'db_config.php';
$order_id = $_GET['order_id'];
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
            </tr>
            <?php
            $select = mysql_query("SELECT * FROM order_detail where order_id = '$order_id'");
            while ($fetch_order = mysql_fetch_array($select)) {
                $product_id = $fetch_order['product_id'];
                ?>
                <tr>
                    <td><?php echo $fetch_order['order_id']; ?></td>
                    <td><?php echo $fetch_order['first_name'].' '.$fetch_order['last_name']; ?></td>
                    <td><?php echo $fetch_order['email']; ?></td>
                    <td><?php echo $fetch_order['mobile']; ?></td>
                    <td><?php echo $fetch_order['phone']; ?></td>
                    <td><?php echo $fetch_order['address'].' '.$fetch_order['address']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <table class="category-show-tb">
            <tr>
                <th>Product  Id</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity </th>
                <th>Phone </</th>
            </tr>
            <?php
                $select_pro = mysql_query("SELECT * FROM product WHERE product_id = '$product_id'");
                $fetch_product = mysql_fetch_array($select_pro);
                //                --------- have order complete
                $select_oc = mysql_query("SELECT * FROM order_compare WHERE order_id  = '$order_id' && product_id = '$product_id'");
                $num_row = mysql_num_rows($select_oc);
                ?>
                <tr>
                    <td><?php echo $fetch_product['product_id']; ?></td>
                    <td><?php echo $fetch_product['product_name']; ?></td>
                    <td><?php echo $fetch_product['price']; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td>
                        <?php
                        if(!$num_row){
                        ?>
                        <a href="order_confirm.php?order_id=<?php echo $order_id.'&pro_id='.$product_id; ?>" class="btn1" style="color: white;" >Confirm </a>
                        <?php
                        }else{
                        ?>
                        <a href="#" class="btn1" style="color: white;background: #ddd" >Confirm </a>
                        <?php } ?>
                    </td>
                </tr>
            <?php  ?>
        </table>
        <!--    -------------- table --------------->

    </div>

</div>