<?php
include 'db_config.php';
$order_id = $_GET['order_id'];
$product_id = $_GET['pro_id'];
$insert = mysql_query("INSERT INTO order_compare (order_id,product_id) VALUES('$order_id','$product_id')");
//if($insert){
    header("Location:view_order.php?order_id=$order_id");
    //    echo 'feni';
    //}else{
    //    echo 'not';
    //}
?>
