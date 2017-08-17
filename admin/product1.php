<?php
include 'left.php';
include 'db_config.php';
$select_category = mysql_query("SELECT * FROM category ORDER BY category_id ASC");
$select_sub_category = mysql_query("SELECT * FROM sub_category_table ORDER BY sub_category_id ASC");
$select_brand = mysql_query("SELECT * FROM brand ORDER BY brand_id ASC");

function get_image($product_id){
    $select = mysql_query("SELECT * FROM image WHERE role_id = '$product_id'");
    $fetch = mysql_fetch_array($select);
    return $fetch['image'];
}
?>
<div class="box3">
    <div class="title"> Product </div>
    <div class="box4"> 
         Add Product<hr>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="user-tb">
                <tr>
                    <td>Product Code: </td><td><input type="text" name="pro_code" placeholder="Product Code"</td>
                </tr>
                <tr>
                    <td>Product Name: </td><td><input type="text" name="pro_name" placeholder="Product Name"</td>
                </tr>
                <tr>
                    <td> Select Category </td>
                    <td>
                        <select name="category"  class="select">
                            <option value=""> Select Category </option>
                            <?php
                            while ($fetch_cat = mysql_fetch_array($select_category)) {
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
                        <select name="sub_category" class="select">
                            <option value=""> Select Sub Category </option>
                            <?php
                            while ($fetch_sub_cat = mysql_fetch_array($select_sub_category)) {
                                ?>
                                <option value="<?php echo $fetch_sub_cat['sub_category_id']; ?>">  <?php echo $fetch_sub_cat['sub_category_name']; ?> </option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td> short Description :</td><td> <textarea id="tinyeditor" style="width: 400px; height: 200px" name="short_description"></textarea></td>
                </tr>
                
                <tr>
                    <td> price (BDT):</td> <td><input type="text" name="price_bdt"></td>
                </tr>
                <tr>
                    <td> price ( $ ) :</td> <td><input type="text" name="price_dol"></td>
                </tr>
                <tr>
                    <td>Product Image :</td> <td>
                        <input type="file" name="pro_image"><br><br>
<!--                        <input type="file" name="pro_image1"><br><br>
                        <input type="file" name="pro_image2"><br>-->
                    </td>
                </tr>
                <tr>
                   
       
            <td colspan="2"> 
                <input type="submit" name="submit" value="Submit" class="btn" style="margin-left: 200px;">
              
        </form>
               <?php
    include 'db_config.php';
    if (isset($_POST['submit'])) {
        
        $product_name = $_POST['pro_name'];
        $cat_id = $_POST['category'];
        $sub_cat_id = $_POST['sub_category'];
        $brand_id = $_POST['brand'];
        $s_description = addslashes($_POST['short_description']);
        $pro_price  = $_POST['price_bdt'];
        $code  = $_POST['pro_code'];
        $pro_price_dol  = $_POST['price_dol'];
        $pro_size  = $_POST['pro_size'];
        $pro_color  = $_POST['pro_color'];
        $gender  = $_POST['gender'];
        $age  = $_POST['age'];
        

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
            $select = mysql_query("SELECT * FROM product WHERE product_name='nazmul'");
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
                        product_localion,
                        size,
                        color,
                        age,
                        gender,
                        code,
                        usd
                        ) 
                        VALUES (
                        '$cat_id',
                        '$sub_cat_id',
                        '$brand_id',
                        '$product_name',
                        '$pro_price',
                        '$s_description',
                        '$l_description',
                        '$pro_location',
                        '$pro_size',
                        '$pro_color',
                        '$age',
                        '$gender',
                        '$code',
                        '$pro_price_dol'
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
                    
                    ?>
                <script type="text/javascript">
            alert('Product Insert Successfull');    
            </script>
                        <?php
                    
                } else {
                    ?>
                <script type="text/javascript">
            alert('Product Not Insert');    
            </script>
                        <?php
                }
            }
        
    }
    ?>

            </td>
        </tr>
        </table>
    </div>
    <div class="box4"> View Product <hr> 
        <table class="category-show-tb">
            <tr>
                <td>Product Id</td>
                <td>Product Name</td>
                <td>Price</td>
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
                    <td><?php echo $fetch_category['price']; ?> TK</td>
                    <td><img src="<?php echo get_image($fetch_category['product_id']); ?>" width="100" height="100"></td>
                </tr>
            <?php } ?>
        </table>
        <!--    -------------- table --------------->

    </div>

</div>

<script>
var editor = new TINY.editor.edit('editor', {
	id: 'tinyeditor',
	width: 584,
	height: 175,
	cssclass: 'tinyeditor',
	controlclass: 'tinyeditor-control',
	rowclass: 'tinyeditor-header',
	dividerclass: 'tinyeditor-divider',
	controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
		'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
		'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
		'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
	footer: true,
	fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
	xhtml: true,
	cssfile: 'custom.css',
	bodyid: 'editor',
	footerclass: 'tinyeditor-footer',
	toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
	resize: {cssclass: 'resize'}
});
var editor1 = new TINY.editor.edit('editor1', {
	id: 'tinyeditor1',
	width: 584,
	height: 175,
	cssclass: 'tinyeditor1',
	controlclass: 'tinyeditor1-control',
	rowclass: 'tinyeditor1-header',
	dividerclass: 'tinyeditor1-divider',
	controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
		'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
		'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
		'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
	footer: true,
	fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
	xhtml: true,
	cssfile: 'custom.css',
	bodyid: 'editor1',
	footerclass: 'tinyeditor1-footer',
	toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
	resize: {cssclass: 'resize'}
});
</script>