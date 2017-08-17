<?php
include 'left.php';
include 'db_config.php';

?>
<div class="box3">
    <div class="title">Category Update</div>
    <div class="box4"> 
        <?php 
         $url_id = $_GET[id_edit];
         $select = mysql_query("SELECT * FROM category WHERE id='$url_id'");
         $fetch = mysql_fetch_array($select);
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="form-tb">
                <h2>Add Update </h2><hr>
                  <tr>
                    <td>Title:</td><td><input type="text" name="category" value="<?php echo $fetch['category'];?>"></td>
                </tr>
              
                <tr>
                    <td></td> <td><input type="submit" name="submit" class="btn" value="Submit"></td>
                </tr>
        </form>
        <tr>
            <td colspan="2"> 
                <?php
                if (isset($_POST['submit'])) {
                    $category = $_POST['category'];
                   
                    if (empty($category)) {
                        echo "Please fillup this text";
                    } else {
                        $select_blog = mysql_query("SELECT * FROM category WHERE category='$category'");
                        $number = mysql_num_rows($select_blog);
                        if ($number > 0) {
                            echo "Allready Exit It";
                        } else {
                            $update = mysql_query("UPDATE category SET category='$category' WHERE id='$url_id'");
                            if ($update) {
                                echo "<font color='green'>Category Update Successfull</font>";
                            } else {
                                echo"<font color='red'>Categroy Update is Not Sending </font>";
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
            $select = mysql_query("SELECT * FROM category");
            while ($fetch_cate = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_cate['id']; ?></td>
                    <td><?php echo $fetch_cate['category']; ?></td>                  
                    <td><a href="category_edit.php?id_edit=<?php echo $fetch_cate['id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="category.php?ge_id=<?php echo $fetch_cate['id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
                </tr>
            <?php } ?>
            <tr><td colspan="6">
                    <font size="+2"color="green">
               
                    </font>
                    </td>
            </tr>

        </table>
        <!--    -------------- table --------------->

    </div>

</div> 