<?php
include 'top_index.php';
?>
<div class="add-category-area">
    <form action="" method="post">
        <table class="form-tb">
            <h2>Add Category</h2>
            <tr>
                <td>Category Name:</td><td><input type="text" name="category" placeholder="Category Name"></td>

            </tr>
            <tr>
                <td></td> <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>

    <div class="add-category-show-output">
        <h2>Category Add Output</h2>
        <table class="category-show-tb">
            <tr>
                <td>Category Id</td>
                <td>Category Name</td>
            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM category");
            while ($fetch_category = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_category['category_id']; ?></td>
                    <td><?php echo $fetch_category['category_name']; ?></td>
                </tr>
            <?php } ?>
        </table>


    </div>
    <div class="delivare-repot">
        <?php
        include 'db_config.php';
        if(isset($_POST['submit'])){
            $category = $_POST['category'];
        if (empty($category)) {
            echo'Please fillup this text';
        } else {
            $select_category = mysql_query("SELECT * FROM category WHERE category_name='$category'");
            $number = mysql_num_rows($select_category);
            if ($number > 0) {
                echo "Allready Exit It";
            } else {
                $insert = mysql_query("INSERT INTO category (category_id,category_name) VALUES ('','$category')");
                if ($insert) {
                    echo 'Category is Sending';
                } else {
                    echo'Category is Not Sending ';
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

