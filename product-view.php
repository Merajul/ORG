<!--        -------------------------- header end----------------------------->
<?php include 'header.php'; 
$product_id = $_GET['product_id'];
$select_product = mysql_query("SELECT * FROM product WHERE product_id = '$product_id' ");
$fetch_product = mysql_fetch_array($select_product);
?>
<!--        -------------------------- slider start----------------------------->

<script src='zoom/jquery-1.8.3.min.js'></script>
<script src='zoom/jquery.elevateZoom-2.2.3.min.js'></script>
<div class="container-fluid content">
    <div class="row">
        <div class="col-lg-12 col-md-12 padding vission-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding heading">
                <h5>Product View</h5>
            </div>

            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box">
                <div class="col-lg-9">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-view">
                        <h3 class="view_product_name"><?php echo $fetch_product['product_name']; ?></h3>
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12 ">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-view-image-box">
                             <?php
                            $select_image = mysql_query("SELECT * FROM image WHERE role_id = '$product_id'");
                            $fetch_image = mysql_fetch_array($select_image);
                            ?>
                            <img id="zoom_01" src='admin/<?php echo $fetch_image['image']; ?>' data-zoom-image="admin/<?php echo $fetch_image['image']; ?>" class="img-responsive image-zoom product-view-image"/>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-8 col-sm-8 col-xs-12" style="">
                        <h5 class="product-mony"><b>Price :</b> BDT <?php echo $price = $fetch_product['price']; ?>  | USD $<?php echo $fetch_product['usd'];?></h5>
                        <h5 class="code"><b>Product-code :</b> <?php echo $fetch_product['code']; ?></h5>
                        <h5 class="available"><b>Available :</b> <?php echo $fetch_product['option_id']; ?> </h5>
                        <h5 class="available">Color can be change as per availability </h5>
<!--                        ------------------- size ------------------------->
<?php if($fetch_product['size']){ ?>
                            <h5 class="available"><b>Size :</b> 
                                        <?php
                                        $size = $fetch_product['size'];
                                        $ex = explode(',',$size);
//                                        print_r($ex);
                                        $i =1;
                                        foreach($ex as $val){
                                        ?>
                                    <input type="radio"  id="size<?php echo $i;?>" name="size" value="<?php echo $val; ?>"  required="1">
                                    <label for="size<?php echo $i;?>"><?php echo $val;?></label>
                                        <?php $i++; } ?>
                                    </h5>
<!--                        ------------------- size ------------------------->
                        <?php } ?>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 padding quantity-buy-now" style="">
                        <div class="col-lg-12 col-md-4 col-sm-5 col-xs-12 padding quantity-quantity-select">
                            <div class="col-lg-3 col-md-6 col-sm-7 col-xs-12 quantity">
                                <h3>Quantity:</h3>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-5 col-xs-12 quantity-select">
                                <form action="order2.php" method="post">
                                <input type="number" class="form-control" name="quantity" min="1" max="50" value="1">
                                <input type="hidden" class="form-control" name="product_id"  value="<?php echo $product_id;?>">
                                <input type="hidden" class="form-control" name="price"  value="<?php echo $price;?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-4 col-sm-7 col-xs-12 col-lg-offset-0 buy-now">
                            <button type="submit" class="btn btn-default btn-block btn-buy-this-now" name="buy" value="Buy this now">Buy this now</button>
                        </form>
                        </div>

                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs- product-description">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding short-discription">
                            <h5><i class="fa fa-caret-right"></i>Short Discription</h5>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding discription-details">
                            <p><?php echo $fetch_product['pro_short_description']; ?></p>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="col-lg-3 padding" style="background: white;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding" style=" border: 1px solid lightgray;min-height: 1000px;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 related-heading">
                            <h4 class="related-product-heading text-center">Related Product</h4>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <?php 
                            $sub_category_id = $fetch_product['sub_category_id'];
                            $select_rel_pro = mysql_query("SELECT * FROM product WHERE sub_category_id = '$sub_category_id' && product_id NOT LIKE '$product_id' LIMIT 4");
                            while($fetch_rel_pro = mysql_fetch_array($select_rel_pro)){
                                $product_id = $fetch_rel_pro['product_id'];
                            ?>
                            <?php
                            $select_image = mysql_query("SELECT * FROM image WHERE role_id = '$product_id'");
                            $fetch_image = mysql_fetch_array($select_image);
                            ?>
                            <div class="col-lg-12 col-md-3 col-sm-3 col-xs-6">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding related-product-full-box">
                                    <a href="product-view.php?product_id=<?php echo $product_id;?>">
                                        <div class="shape"></div>
                                        <img src="admin/<?php echo $fetch_image['image']; ?>" class="img-responsive related-product-image">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding Product-name-mony-details">
                                            <h5 class="product-view-name text-center"><?php echo $fetch_rel_pro['product_name']?></h5>
                                            <h5 class="product-view-mony text-center">BDT <?php echo $fetch_rel_pro['price']?> </h5>
                                            <h5 class="product-view-mony text-center">USD $<?php echo $fetch_rel_pro['usd']?></h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                            

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<script>
    $('#zoom_01').elevateZoom();
</script>
<?php include 'footer.php'; ?>
<!--        -------------------------- footer end ----------------------------->