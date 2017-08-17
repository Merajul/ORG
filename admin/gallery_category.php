<?php
include 'left.php';
include 'db_config.php';
?>
<div class="box3">
    <div class="title">Category</div>
    <div class="box4"> 
        <form action="" method="post" enctype="multipart/form-data">
            <table class="form-tb">
                <h2>Add Category</h2><hr>
                <tr>
                    <td>Category Name:</td><td><input type="text" name="category_name" placeholder="Category Name"></td>

                </tr>
                
                <tr>
                    <td></td> <td><input type="submit" name="submit" class="btn" value="submit"></td>
                </tr>

        </form>
        <tr>
            <td colspan="2"> 
                <?php
                if (isset($_POST['submit'])) {
                $category_name = $_POST['category_name'];
                    
                    if (empty($category_name)) {
                        echo "Please fillup this text";
                    } else {
                        $select_category = mysql_query("SELECT * FROM gallery_category WHERE category='$category_name'");
                        $number = mysql_num_rows($select_category);
                        if ($number > 0) {
                            echo "Allready Exit It";
                        } else {
                            $insert = mysql_query("INSERT INTO gallery_category (id,category) VALUES ('','$category_name')");
                            if ($insert) {
                                echo "<font color='green'>Category Inserting Successfull</font>";
                            } else {
                                echo"<font color='red'>Category Inserting is Not Sending </font>";
                            }
                }
                }
                    
                }
                ?>
            </td>
        </tr>
        </table>
    </div>
    <div class="box4"> View Category<hr> 
        <table class="category-show-tb">
            <tr>
                <td>Id</td>
                <td>Category Name</td>
                <td> Edit  </td>
                <td> Delete  </td>
            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM gallery_category");
            while ($fetch_categroy = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_categroy['id']; ?></td>
                    <td><?php echo $fetch_categroy['category']; ?></td>
                    <td><a href="category_edit.php?id_edit=<?php echo $fetch_categroy['id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="category.php?id=<?php echo $fetch_categroy['id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
                </tr>
            <?php } ?>
            <tr><td colspan="4">
                    <font size="+2"color="green">
                <?php
                $r_id = $_GET['id'];
                if(isset($r_id)){
                $delete = mysql_query("DELETE FROM gallery_category WHERE id='$r_id'");
                if ($delete) {
                    echo'Delete is successful';
                } else {
                    echo 'Not successful';
             
                }
                }
                ?>
                    </font>
                    </td>
            </tr>

        </table>
        <!--    -------------- table --------------->

    </div>

</div>