<?php
session_start();
include 'header.php'; 
?>
<!--        -------------------------- slider start----------------------------->
<div class="container-fluid content">
    <div class="row">
        <div class="col-lg-12 col-md-12 padding vission-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding heading">
                <h5> Ladiese Fashion</h5>
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box" style="height: 100px;text-align: center;">
                <h1> <?php echo $variable;?>  </h1>
                <h1> Thank you from shoping with us  </h1>
                <h3> We send your product very soon....   </h3>
                <a href="index.php">
                    <input class="btn confirm-submit-btn " type="button" name="order" value="Shopping Continue">
                </a>
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

