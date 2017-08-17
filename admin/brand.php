<?php
include 'left.php';
include 'db_config.php';
?>
<div class="box3">
    <div class="title"> Brand </div>
    <div class="box4"> 
        <form action="" method="post">
        <h2>Add Brand </h2>
        <table class="brand">
            <tr>
                <td>Brand Name:</td> <td><input type="text" name="brand" placeholder="Brand Name"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" class="btn" value="Submit"></td>
            </tr>
        </table>

    </form>
        <tr>
            <td colspan="2"> 
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
            </td>
        </tr>
</table>
    </div>
    <div class="box4"> View Brand <hr> 
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
        <!--    -------------- table --------------->

    </div>

</div>