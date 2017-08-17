<?php
include 'left.php';
include 'db_config.php';

?>
<div class="box3">
    <div class="title"> Add Menu Gallery Update </div>
    <div class="box4"> 
        <?php 
         $url_id = $_GET[id_cont_edit];
         $select = mysql_query("SELECT * FROM menu_gallery WHERE id='$url_id'");
         $fetch = mysql_fetch_array($select);
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="form-tb">
                <h2>Add Menu Gallery Update </h2><hr>
                   <tr>
                    <td>Title:</td><td><input type="text" name="title" value="<?php echo $fetch['title'];?>"></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>

                        <select name="category" value="<?php echo $fetch['category'];?>" class="select">
                            <?php
                            $select = mysql_query("SELECT * FROM category");
                            ?>
                            <option value=""> Select Brand </option>
                            <?php while ($fetch = mysql_fetch_array($select)) { ?>
                                <option value="<?php echo $fetch['category']; ?>">  <?php echo $fetch['category']; ?> </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Image:</td> <td><input type="file" name="image" value="<?php echo $fetch['image'];?>"></td>
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
                    $title = $_POST['title'];
                    $photo_name = $_FILES['image']['name'];
                    $dir = "image";
                    copy($_FILES['image']['tmp_name'], "$dir/$photo_name");
                    $photo = "$dir/$photo_name";
                    if (empty($category) or empty($title) or empty($photo)) {
                        echo "Please fillup this text";
                    } else {
                        $select_blog = mysql_query("SELECT * FROM menu_gallery WHERE category='$category' && title='$title' && image='$photo'");
                        $number = mysql_num_rows($select_blog);
                        if ($number > 0) {
                            echo "Allready Exit It";
                        } else {
                            $update = mysql_query("UPDATE menu_gallery SET category='$category',title='$title',image='$photo' WHERE id='$url_id'");
                            if ($update) {
                                echo "<font color='green'>Menu Gallery Update Successfull</font>";
                            } else {
                                echo"<font color='red'>Menu Gallery Update is Not Sending </font>";
                            }
                        }
                    }
                }
                ?>
            </td>
        </tr>
        </table>
    </div>
    <div class="box4"> View Menu Gallery<hr> 
        <table class="category-show-tb">
            <tr>
                <td>Id</td>
                <td>Title</td>
                <td>Category</td>
                <td>Photo</td>
                <td> Edit  </td>
                <td> Delete  </td>
            </tr>
            <?php
           include 'db_config.php';
            $select = mysql_query("SELECT * FROM menu_gallery");
            while ($fetch_menu = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_menu['news_id']; ?></td>
                    <td><?php echo $fetch_menu['title']; ?></td>
                    <td><?php echo $fetch_menu['category']; ?></td>
                    <td><img src="<?php echo $fetch_menu['image']; ?>" width="100px;" height="100px;"></td>
                    <td><a href="menu_gallery_edit.php?id_cont_edit=<?php echo $fetch_menu['id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="menu_gallery.php?ge_id=<?php echo $fetch_menu['id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
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