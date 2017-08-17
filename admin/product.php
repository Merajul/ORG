<?php
include 'top_index.php';
$select_category = mysql_query("SELECT * FROM category ORDER BY category_id ASC");
$select_sub_category = mysql_query("SELECT * FROM sub_category_table ORDER BY sub_category_id ASC");
$select_brand = mysql_query("SELECT * FROM brand ORDER BY brand_id ASC");
?>
<div class="profile-form">
    <h2>Product Information </h2>
    <form action="" method="post" enctype="multipart/form-data">
        <table class="user-tb">
            <tr>
                <td>Product Name: </td><td><input type="text" name="pro_name" placeholder="Product Name"</td>
            </tr>
            <tr>
                <td> Select Category </td>
                <td>
                    <select name="category">
                        <option value=""> Select Category </option>
                        <?php
                        while($fetch_cat = mysql_fetch_array($select_category)){
                        ?>
                        <option value="<?php echo $fetch_cat['category_id']; ?>">  <?php echo $fetch_cat['category_name']; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td> Select Sub Category </td>
                <td>
                    <select name="sub_category">
                        <option value=""> Select Sub Category </option>
                             <?php
                        while($fetch_sub_cat = mysql_fetch_array($select_sub_category)){
                        ?>
                        <option value="<?php echo $fetch_sub_cat['sub_category_id']; ?>">  <?php echo $fetch_sub_cat['sub_category_name']; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td> Brand  </td>
                <td>
                    <select name="brand">
                        <option value=""> Select Brand </option>
                             <?php
                        while($fetch_brand = mysql_fetch_array($select_brand)){
                        ?>
                        <option value="<?php echo $fetch_brand['brand_id']; ?>">  <?php echo $fetch_brand['brand_name']; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>short Description :</td><td><textarea name="short_description"></textarea></td>
            </tr>
            <tr>
                <td>Long Description :</td><td><textarea name="long_description"></textarea></td>
            </tr>
            <tr>
                <td>Product price :</td> <td><input type="text" name="pro_price"></td>
            </tr>
            <tr>
                <td>Product location :</td> <td><input type="text" name="pro_loc"></td>
            </tr>
            <tr>
                <td>Product Image :</td> <td><input type="file" name="pro_image"></td>
            </tr>
            <tr>
                <td></td> <td><input type="submit" name="submit" value="Submit"></td><td></td>
            </tr>


        </table>
    </form>


    <div class="add-category-show-output">
        <h2>Add Profile Output</h2>
        <table class="category-show-tb">
            <tr>
                <td>Product Id</td>
                <td>Product Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Password</td>
                <td>Date of birth</td>
                <td>address</td>
                <td>Image</td>

            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM product ORDER BY product_id DESC");
            while ($fetch_category = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_category['product_id']; ?></td>
                    <td><?php echo $fetch_category['product_name']; ?></td>
                    <td><?php echo $fetch_category['email']; ?></td>
                    <td><?php echo $fetch_category['phone']; ?></td>
                    <td><?php echo $fetch_category['password']; ?></td>
                    <td><?php echo $fetch_category['date_of_birth']; ?></td>
                    <td><?php echo $fetch_category['address']; ?></td>
                </tr>
            <?php } ?>
        </table>


    </div>

    <?php
    include 'db_config.php';
    if (isset($_POST['submit'])) {
        
        $product_name = $_POST['pro_name'];
        $cat_id = $_POST['category'];
        $sub_cat_id = $_POST['sub_category'];
        $brand_id = $_POST['brand'];
        $s_description = addslashes($_POST['short_description']);
        $l_description = addslashes($_POST['long_description']);
        $pro_location  = $_POST['pro_loc'];
        $pro_price  = $_POST['pro_price'];

//        check image choice 
        if (!$_FILES['pro_image']['error']) {
            $photo_name = $_FILES['pro_image']['name'];
            $dir = "image";
            copy($_FILES['pro_image']['tmp_name'], "$dir/$photo_name");
            $photo = "$dir/$photo_name";
        } else {
            $photo = 'image/default.png';
        }
        
        
        $type = 'product';

        

            /*
             * check this user exist or not
             */
            $select = mysql_query("SELECT * FROM product WHERE product_name='$product_name'");
            $number = mysql_num_rows($select);
            if ($number > 0) {
                echo"This recorde allready Exit";
            } else {

                /*
                 * insert product Information
                 */
                echo $insert_product = mysql_query("INSERT INTO product 
                        (category_id,
                        sub_category_id,
                        brand_id,
                        product_name,
                        price,
                        pro_short_description,
                        pro_long_description,
                        product_localion
                        ) 
                        VALUES (
                        '$cat_id',
                        '$sub_cat_id',
                        '$brand_id',
                        '$product_name',
                        '$pro_price',
                        '$s_description',
                        '$l_description',
                        '$pro_location'
                        )");

                if ($insert_product) {

                    /*
                     * Select Product Id
                     * for use other table
                     */
                    $select_product_id = mysql_query("SELECT * FROM product ORDER BY product_id DESC");
                    $fetch_product_id = mysql_fetch_array($select_product_id);
                    $product_id = $fetch_product_id['product_id'];

                    /*
                     * Insert Product image
                     * there role id mean's product id
                     */
                    mysql_query("INSERT INTO image (image_type,role_id,image) VALUES('$type','$product_id','$photo')");
                    
                    
                    echo'Information Inserting successfull';
                } else {
                    echo'Information Not Inserting';
                }
            }
        
    }
    ?>



</div>
</div>

</body>
</html>

