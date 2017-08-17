<?php
session_start();
include 'header.php'; 

if(isset($_POST['order'])){
    $product_id = $_POST['product_id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $post_code = $_POST['post_code'];
    $phone = $_POST['phone'];
    $mobile = $_POST['mobile'];
    $all_product_id = $_POST['all_product'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total_amount = $quantity*$price;
    $order_date = date('Y-M-D');
     $confirm_id =  $_SESSION['confirm_id'] = rand();
    
    $insert = mysql_query("INSERT INTO order_detail 
            (product_id,order_date,first_name,last_name,email,mobile,phone,address,city,post_code,total_price,quantity,confirm_id)
            VALUES(
            '$product_id',
            '$order_date',
            '$f_name',
            '$l_name',
            '$email',
            '$mobile',
            '$phone',
            '$address',
            '$city',
            '$post_code',
            '$price',
            '$quantity',
            '$confirm_id'
            )
            ");
   if($insert){
       $flag = 1;
       $variable = "<font color='#8CC63F'> Make your payment  </font>";
   }
   else{
       $variable = "<font color='red'> Your order not complete sumthing missing. Go Back </font>";;
   }
}
?>
<!--        -------------------------- slider start----------------------------->
<div class="container-fluid content">
    <div class="row">
        <div class="col-lg-12 col-md-12 padding vission-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding heading">
                <h5> Ladiese Fashion</h5>
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box" style="height: 100px;text-align: center;">
                <?php 
                if($flag == 1){
                ?>
                <h1> <?php echo $variable;?>  </h1>
                <form id='payment_gw' name='payment_gw' method='POST'

action='https://www.sslcommerz.com.bd/gwprocess/'>

<!-- MANDATORY / REQUIRED PARAMETERS !-->

<input type="hidden" name="total_amount" value='<?php echo $total_amount; ?>'>

<input type="hidden" name="store_id" value='ORGFOUNDATIONBDLIVE001'>

<input type="hidden" name="tran_id" value='ORDID123456789'>

<input type="hidden" name="success_url"

value='http://orgfoundationbd.com/success.php'>
<input type="hidden" name="fail_url"

value='http://orgfoundationbd.com/fail.php'>

<input type="hidden" name="cancel_url"

value='http://orgfoundationbd.com/'>

<!-- OPTIONAL / SEND API VERSION !-->

<input type="hidden" name="version" value="2.00" />

<!-- OPTIONAL / SHOPPING CART LIST !-->

 

<!-- PRODUCT LIST !-->

<?php

# Guessing $cart as List of Product Names and Amounts in an Array

for($n=0; $n<count($cart); $n++)

{

 echo "<input type='hidden' name='cart[".$n."][product]' 

value='".$cart[$n]['product_name']."'>\n";

 echo "<input type='hidden' name='cart[".$n."][amount]' 

value='".$cart[$n]['product_amount']."'>\n";

}

# IF SHIPMENT CHANRE IS AVAILABLE

$n++;

echo "<input type='hidden' name='cart[".$n."][product]' value='Shipment 

Charge'>\n";

echo "<input type='hidden' name='cart[".$n."][amount]' value='00.00'>\n";

 

# IF TAX IS AVAILABLE / Suppose, $total_amount is containing Total Price

$n++;

echo "<input type='hidden' name='cart[".$n."][product]' value='TAX@%4'>\n";

echo "<input type='hidden' name='cart[".$n."][amount]' 

value='".($total_amount*(0.04))."'>\n";

?>

<!-- OPTIONAL / CHOOSE DEFAULT BANK !-->

<input type="hidden" name="card_name" value='mtbl'>

<input type="hidden" name="show_all_gw" value="0" />

<!-- SUBMIT REQUEST !-->

<input class="btn confirm-submit-btn" type="submit" name="submit" value='Make Payment'>

</form>
                <?php
                }else{
                    ?>
                <h1> <?php echo $variable; ?> </h1>
                        <?php
                }
                ?>
              </div>
            

            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box">

                
                <?php
                $select = mysql_query("SELECT * FROM sub_category_table WHERE category_id = '1' LIMIT 1");
                while($fetch = mysql_fetch_array($select)){
                    $sub_cat_id = $fetch['sub_category_id'];
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding category-heading">
                        <h4> RECOMMENDED FOR YOU </h4>
                    </div>

                    <?php
                    $select_product = mysql_query("SELECT * FROM product WHERE sub_category_id = '$sub_cat_id' LIMIT 4");
                    while($fetch_product = mysql_fetch_array($select_product)){
                    ?>
                    <a href="product-view.php?product_id=<?php echo $product_id = $fetch_product['product_id']; ?>">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding product-full-box">
                            <div class="shape"></div>
                            <?php
                            $select_image = mysql_query("SELECT * FROM image WHERE role_id = '$product_id'");
                            $fetch_image = mysql_fetch_array($select_image);
                            ?>
                            <img src="admin/<?php echo $fetch_image['image']; ?>" class="img-responsive product-image">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 Product-name-mony-details">
                                <h5 class="product-name text-center"><?php echo $fetch_product['product_name']; ?></h5>
                                <h5 class="mony text-center"><?php echo $fetch_product['price']; ?> Tk</h5>
                                <button type="button" class="btn btn-default btn-block btn-details">Details</button>
                            </div>
                        </div>
                    </div>
                    </a>
                    <?php } ?>

                    

                </div>

                <?php } ?>
                


            </div>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<!--        -------------------------- footer end ----------------------------->
