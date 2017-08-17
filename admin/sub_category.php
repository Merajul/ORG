<?php
include 'left.php';
include 'db_config.php';
if($_GET['cat_id']){
   $cat_id = $_GET['cat_id'];
   $select_category = mysql_query("SELECT * FROM category WHERE category_id='$cat_id'");
}
?>
<div class="box3">
    <div class="title"> Sub Category </div>
    <div class="box4"> 
        <form action="" method="post">
        <table class="sub-category-tb">
            <h2>Sub category Add</h2>
            <tr>
                <td>Category</td>
                <td>

                    <select name="category" class="select">
                        <option value="">Category</option>
                        <?php
                        include 'db_config.php';
                        $select = mysql_query("SELECT * FROM category");
                        while ($fetch = mysql_fetch_array($select)) {
                            ?>
                            <option value="<?php echo $fetch['category_id']; ?>"><?php echo $fetch['category_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Sub Category Name:</td><td><input type="text" name="sub_name" placeholde="Sub Category Name"></td>
            </tr>
            <tr>
                <td></td><td><input type="submit" class="btn" name="submit" value="Add"></td>
            </tr>
            
        </form>
        <tr>
            <td colspan="2"> 
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
            </td>
        </tr>
</table>
    </div>
    <div class="box4"> View Sub Category<hr>
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
        <!--    -------------- table --------------->

    </div>

</div>

