<?php include 'header.php';
$tran_id = $_POST['tran_id'];
$val_id = $_POST['val_id'];
$amount = $_POST['amount'];
$card_type = $_POST['card_type'];
$store_amount = $_POST['store_amount'];
$card_no = $_POST['card_no'];
$bank_tran_id = $_POST['bank_tran_id'];

$insert = mysql_query("INSERT INTO donation VALUES('','$tran_id','$val_id','$amount','$card_type','$store_amount','$card_no','$bank_tran_id')");
?>
<!--        -------------------------- slider start----------------------------->
<div class="container-fluid content">
    <div class="row">
        <div class="col-lg-12 col-md-12 padding vission-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding heading">
                <h5> Donation </h5>
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box" style="height: 100px;text-align: center;">
                <h1 style="color:#8CC63a;"> Thank's for Donation </h1>
                <h1 style="color:#8CC63a;"> Your donation successful </h1>
              </div>
            

            

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<!--        -------------------------- footer end ----------------------------->



