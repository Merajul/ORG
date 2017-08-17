<?php
include 'top_index.php';
?>
<div class="sub_category">
    <form action="" method="post">
        <table class="sub-category-tb">
            <h2>Sub category Add</h2>
            <tr>
                <td>Category</td>
                <td>

                    <select name="category" class="select-product">
                        <option value="">Category</option>
                        <?php
                        include 'db_config.php';
                        $select = mysql_query("SELECT * FROM category");
                        while ($fetch = mysql_fetch_array($select)) {
                            ?>
                            <option value="<?php echo $fetch['category_id']; ?>"><?php echo $fetch['category_name'].$fetch['category_id']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Sub Category Name:</td><td><input type="text" name="sub_name" placeholde="Sub Category Name"></td>
            </tr>
            <tr>
                <td></td><td><input type="submit" name="submit" value="Add"></td>
            </tr>
        </table>
        <div class="add-category-show-output">
                <h2>Sub Category Add Output</h2>
            <table class="category-show-tb">
                <tr>
                    <td>Sub Category Id</td>
                    <td>Category Id</td>
                    <td>Sub Category Name</td>
                </tr>
                <?php
                include 'db_config.php';
                $select = mysql_query("SELECT * FROM sub_category_table");
                while ($fetch_category = mysql_fetch_array($select)) {
                    ?>
                    <tr>
                        <td><?php echo $fetch_category['sub_category_id']; ?></td>
                        <td><?php echo $fetch_category['category_id']; ?></td>
                        <td><?php echo $fetch_category['sub_category_name']; ?></td>
                    </tr>
                <?php } ?>
            </table>


        </div>
        <div class="delivare-repot">

            <?php
            include 'db_config.php';
            if (isset($_POST['submit'])) {
                 $category_id = $_POST['category'];
                 $sub_category_name = $_POST['sub_name'];
                if (empty($category_id) or empty($sub_category_name)) {
                    echo "Place fillup this";
                } else {
                    $select = mysql_query("SELECT * FROM sub_category_table WHERE category_id='$category_id' && sub_category_name='$sub_category_name'");
                    $number = mysql_num_rows($select);
                    if ($number > 0) {
                        echo "Allready Exit IT";
                    } else {
                        $insert = mysql_query("INSERT INTO sub_category_table (sub_category_id,category_id,sub_category_name) VALUES ('','$category_id','$sub_category_name')");
                        if ($insert) {
                            echo'Inserting successful';
                        } else {
                            echo'Inserting Not Successful';
                        }
                    }
                }
            }
            ?>

    </form> 
</div>
</div>

<?php
include 'bottom_index.php';
?>