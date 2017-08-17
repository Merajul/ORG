<?php
include 'top_index.php';
?>
<div class="add-brand-form">
    <form action="" method="post">
        <h2>Add Brand </h2>
        <table class="brand">
            <tr>
                <td>Brand Name:</td> <td><input type="text" name="brand" placeholder="Brand Name"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>

    </form>


    <div class="add-category-show-output">
        <h2>Add Brand Output</h2>
        <table class="category-show-tb">
            <tr>
                <td>Brand Id</td>
                <td>Brand Name</td>
            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM brand");
            while ($fetch_category = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_category['brand_id']; ?></td>
                    <td><?php echo $fetch_category['brand_name']; ?></td>
                </tr>
            <?php } ?>
        </table>


    </div>
    <div class="delivare-repot">

        <?php
        include 'db_config.php';
        if (isset($_POST['submit'])){
            $brand = $_POST['brand'];
        if (empty($brand)) {
            echo'Please fillup this text';
        } else {
            $select_brand = mysql_query("SELECT * FROM brand WHERE brand_name='$brand'");
            $number = mysql_num_rows($select_brand);
            if ($number > 0) {
                echo "Allready Exit It";
            } else {
                $inser_brand = mysql_query("INSERT INTO brand (brand_id,brand_name) VALUES ('','$brand')");
                if ($inser_brand) {
                    echo "<font color='green'>Category Add Successfull</font>";
            } else {
                echo"<font color='red'>Category is Not Sending </font>";
            }
            }
        }
        }
        ?>
    </div>
</div>
<?php
include 'bottom_index.php';
?>