  
                <?php
                if(isset($_POST['submit'])){
//                if(1){
                    $currency = $_POST['currency'];
                    $amount = $_POST['amount'];
                    $total_amount = $currency*$amount;
                    ?>
                <div style="width: 100%;height: 100%;position: absolute;background: rgba(0,0,0,.5);z-index: 1000;">
                 <form id='payment_gw' name='payment_gw' method='POST' action=' https://www.sslcommerz.com.bd/gwprocess/'>
<!-- MANDATORY / REQUIRED PARAMETERS !-->

<input type="hidden" name="total_amount" value='<?php echo $total_amount; ?>'>

<input type="hidden" name="store_id" value='ORGFOUNDATIONBDLIVE001'>

<input type="hidden" name="tran_id" value='ORDID123456789'>

<input type="hidden" name="success_url"

value='http://orgfoundationbd.com/donate_success.php'>
<input type="hidden" name="fail_url"

value='http://orgfoundationbd.com/donate_fail.php'>

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

// $n++;

// echo "<input type='hidden' name='cart[".$n."][product]' value='Shipment Charge'>\n";

// echo "<input type='hidden' name='cart[".$n."][amount]' value='100.00'>\n";

 

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

<div style="padding: 50px;width: 400px;background: white;margin-left: 35%;margin-top:20%; ">
<input type="submit" name="submit" value='Please give your bank/card information' class="btn confirm-submit-btn" style="color: white;" >
</div>
                </form>
                </div>
                <?php
                }
                ?>
<!--        -------------------------- header end----------------------------->
<?php include 'header.php';
?>
<!--        -------------------------- slider start----------------------------->
<div class="container-fluid content">
    <div class="row">
        <div class="col-lg-12 col-md-12 padding vission-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding heading">
                <h5> Donation </h5>
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box" style="height: 450px;text-align: center;">
                <div class="col-md-4">
                    <img src="images/bkash.png">
                    <h4>Our Bkash No : 01979784455  </h4>
                 <form id='payment_gw' name='payment_gw' method='POST' action=''>
                     <table align="center" style="height: 200px;">
                    <tr>
                        <td> Name * </td>
                        <td> <input type="text" class="form-control" name="donor_name" placeholder="Enter your name " required=""> </td>
                    </tr>
                    <tr>
                        <td> Email *  </td>
                        <td> <input type="text" class="form-control"  name="donor_email" placeholder="Enter your email " required=""> </td>
                    </tr>
                    <tr>
                        <td> Mobile Number  </td>
                        <td> <input type="text" class="form-control"  name="donor_mobile" placeholder="Enter your mobile no " > </td>
                    </tr>
                    <tr>
                                 <td> Select Currency *  </td>
                                 <td> 
                                     <select name="currency" required="">
                                         <option value=""> Select Currency </option>    
                                         <option value="1"> BDT- BD Tk </option>    
                                         <option value="77"> USD - US Dollar </option>    
                                         <option value="87"> EUR - Euro </option>    
                                         <option value="121"> GBP - British Pound </option>   
                                         <option value="60"> AUD - Australian Dollar </option>    
                                         <option value="63"> CAD - Canadian Dollar </option>    
                                         <option value="57"> SGD - Singapore Dollar </option>    
                                         <option value="257"> Kuwaiti Dinar </option>    
                                         <option value="28"> Turkish Lira </option>    
                                         <option value="20"> Saudi Riyal </option>    
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                        <td> Amount *  </td>
                        <td> <input type="text" class="form-control"  name="amount" placeholder="Amount" required=""> </td>
                    </tr>
                    
                   
                </table>
          
<input class="btn confirm-submit-btn" type="submit" name="submit" value='Next'>

</form>
                </div>
                
                
                
                
                
                
                <div class="col-md-4">
                    <img src="images/payment_gateway-Copy.jpg" style="width: 300px;height:80px;">
                    <h4>Payment Method </h4>
               <form id='payment_gw' name='payment_gw' method='POST' action=''>
                     <table align="center" style="height: 200px;">
                    <tr>
                        <td> Name * </td>
                        <td> <input type="text" class="form-control" name="donor_name" placeholder="Enter your name " required=""> </td>
                    </tr>
                    <tr>
                        <td> Email *  </td>
                        <td> <input type="text" class="form-control"  name="donor_email" placeholder="Enter your email " required=""> </td>
                    </tr>
                    <tr>
                        <td> Mobile Number  </td>
                        <td> <input type="text" class="form-control"  name="donor_mobile" placeholder="Enter your mobile no " > </td>
                    </tr>
                    <tr>
                                 <td> Select Currency *  </td>
                                 <td> 
                                     <select name="currency" required="">
                                         <option value=""> Select Currency </option>    
                                         <option value="1"> BDT- BD Tk </option>    
                                         <option value="77"> USD - US Dollar </option>    
                                         <option value="87"> EUR - Euro </option>    
                                         <option value="121"> GBP - British Pound </option>   
                                         <option value="60"> AUD - Australian Dollar </option>    
                                         <option value="63"> CAD - Canadian Dollar </option>    
                                         <option value="57"> SGD - Singapore Dollar </option>    
                                         <option value="257"> Kuwaiti Dinar </option>    
                                         <option value="28"> Turkish Lira </option>    
                                         <option value="20"> Saudi Riyal </option>       
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                        <td> Amount *  </td>
                        <td> <input type="text" class="form-control"  name="amount" placeholder="Amount" required=""> </td>
                    </tr>
                    
                   
                </table>
          
<input class="btn confirm-submit-btn" type="submit" name="submit" value='Next'>

</form>
              </div>
                
                <div class="col-md-4">
                    <img src="images/prime-bank-logo.png">
                    <br>
                    <br>
                    <h4>Bank Information  </h4>
                    <h5> Acc Name : ORG FOUNDATION BANGLAGESH </h5>
                <h5> Acc Number :12711070040978 </h5>
                 <form id='payment_gw' name='payment_gw' method='POST' action=''>
                     <table align="center" style="height: 200px;">
                    <tr>
                        <td> Name * </td>
                        <td> <input type="text" class="form-control" name="donor_name" placeholder="Enter your name " required=""> </td>
                    </tr>
                    <tr>
                        <td> Email *  </td>
                        <td> <input type="text" class="form-control"  name="donor_email" placeholder="Enter your email " required=""> </td>
                    </tr>
                    <tr>
                        <td> Mobile Number  </td>
                        <td> <input type="text" class="form-control"  name="donor_mobile" placeholder="Enter your mobile no " > </td>
                    </tr>
                    <tr>
                                 <td> Select Currency *  </td>
                                 <td> 
                                     <select name="currency" required="">
                                         <option value=""> Select Currency </option>    
                                         <option value="1"> BDT- BD Tk </option>    
                                         <option value="77"> USD - US Dollar </option>    
                                         <option value="87"> EUR - Euro </option>    
                                         <option value="121"> GBP - British Pound </option>   
                                         <option value="60"> AUD - Australian Dollar </option>    
                                         <option value="63"> CAD - Canadian Dollar </option>    
                                         <option value="57"> SGD - Singapore Dollar </option>    
                                         <option value="257"> Kuwaiti Dinar </option>    
                                         <option value="28"> Turkish Lira </option>    
                                         <option value="20"> Saudi Riyal </option>      
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                        <td> Amount *  </td>
                        <td> <input type="text" class="form-control"  name="amount" placeholder="Amount" required=""> </td>
                    </tr>
                    
                   
                </table>
          
<input class="btn confirm-submit-btn" type="submit" name="submit" value='Next'>

</form>
              
                </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<!--        -------------------------- footer end ----------------------------->