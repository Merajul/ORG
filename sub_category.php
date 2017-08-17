<?php include 'header.php';
$cat_id = $_GET['cat_id'];
$sub_id = $_GET['sub_id'];

?>
<!--        -------------------------- slider start----------------------------->
<div class="container-fluid content">
    <div class="row">
        <div class="col-lg-12 col-md-12 padding vission-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding heading">
                <h5> <?php echo $page;?> </h5>
            </div>

            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box">

                
                <?php
                $select = mysql_query("SELECT * FROM sub_category_table WHERE sub_category_id = '$sub_id'  and category_id = '$cat_id' ORDER BY sub_category_id DESC");
                $num = mysql_num_rows($select);
                $fetch = mysql_fetch_array($select);
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding category-heading">
                        <h4> <?php echo $fetch['sub_category_name']; ?> </h4>
                    </div>

                    <?php
                    $select_product = mysql_query("SELECT * FROM product WHERE sub_category_id = '$sub_id'");
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
                                <h5 class="mony text-center"> BDT <?php echo $fetch_product['price']; ?> </h5>
                                <h5 class="mony text-center"> USD $<?php echo $fetch_product['usd']; ?></h5>
<!--                                <button type="button" class="btn btn-default btn-block btn-details">Details</button>-->
                            </div>
                        </div>
                    </div>
                    </a>
                    <?php } ?>

                    

                </div>
                <?php ?>

                


            </div>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<!--        -------------------------- footer end ----------------------------->