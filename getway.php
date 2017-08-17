
<form id='payment_gw' name='payment_gw' method='POST'

action='https://www.sslcommerz.com.bd/gwprocess/testbox/'>

<!-- MANDATORY / REQUIRED PARAMETERS !-->

<input type="hidden" name="total_amount" value='1150.50'>

<input type="hidden" name="store_id" value='TEST_ORGFOUNDATIONBDCOM001'>

<input type="hidden" name="tran_id" value='ORDID123456789'>

<input type="hidden" name="success_url"

value='http://orgfoundationbd.com'>
<input type="hidden" name="fail_url"

value='hhttp://orgfoundationbd.com/blog.php'>

<input type="hidden" name="cancel_url"

value='http://yoursitename.com/cancel.php'>

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

echo "<input type='hidden' name='cart[".$n."][amount]' value='100.00'>\n";

 

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

<input type="submit" name="submit" value='Pay Now'>

</form>