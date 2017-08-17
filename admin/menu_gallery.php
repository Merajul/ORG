<?php
include 'left.php';
include 'db_config.php';
?>
<div class="box3">
    <div class="title">Menu Gallery </div>
    <div class="box4"> 
        <form action="" method="post" enctype="multipart/form-data">
            <h2> Add Menu Gallery </h2><hr>
            <table class="user-tb">  
                <tr>
                    <td>Title:</td><td><input type="text" name="title" placeholder="Title"</td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>

                        <select name="category"  class="select">
                            <?php
                            $select = mysql_query("SELECT * FROM gallery_category");
                            ?>
                            <option value=""> Select Brand </option>
                            <?php while ($fetch = mysql_fetch_array($select)) { ?>
                                <option value="<?php echo $fetch['category']; ?>">  <?php echo $fetch['category']; ?> </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Image:</td> <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td></td> <td><input type="submit" name="submit" class="btn" value="Submit"></td>
                </tr>


            </table>
        </form>
        <tr>
            <td colspan="2"> 
                <?php
                include 'db_config.php';
                if (isset($_POST['submit'])) {
                    $title = $_POST['title'];
                    $category = $_POST['category'];
                    $photo_name = $_FILES['image']['name'];
                    $dir = "menu_gallery";
                    copy($_FILES['image']['tmp_name'], "$dir/$photo_name");
                    $photo = "$dir/$photo_name";


                    if (empty($title) or empty($category) or empty($photo)) {
                        echo 'Please fillup text';
                    } else {

                        /*
                         * check this user exist or not
                         */
                        $select_news = mysql_query("SELECT * FROM menu_gallery WHERE title='$title' && category='$category' && image='$photo'");
                        $number = mysql_num_rows($select_news);
                        if ($number > 0) {
                            echo"This recorde allready Exit";
                        } else {

                            /*
                             * insert user Information
                             */
                            $insert_news = mysql_query("INSERT INTO menu_gallery (id,category,title,image) VALUES ('','$category','$title','$photo')");

                            if ($insert_news) {

                                echo'Information Inserting successfull';
                            } else {
                                echo'Information Not Inserting';
                            }
                        }
                    }
                }
                ?>

            </td>
        </tr>
        </table>
    </div>
    <div class="box4"> View Menu Gallery <hr> 
        <table class="category-show-tb">
            <tr>
                <td>Id</td>
                <td>Title</td>
                <td>Category</td>
                <td>Image</td>
                <td>Edit</td>
                <td>Delete</td>


            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM menu_gallery");
            while ($fetch_gallery = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_gallery['id']; ?></td>
                    <td><?php echo $fetch_gallery['title']; ?></td>
                    <td><?php echo $fetch_gallery['category']; ?></td>
                    <td><img src="<?php echo $fetch_gallery['image']; ?>" width="100px;" height="100px;"></td>
                    <td><a href="menu_gallery_edit.php?id_cont_edit=<?php echo $fetch_gallery['id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="menu_gallery.php?ge_id=<?php echo $fetch_gallery['id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
                </tr>
            <?php } ?>
            <tr><td colspan="6">
                    <font size="+2"color="green">
                        <?php
                        $r_id = $_GET['ge_id'];
                        $delete = mysql_query("DELETE FROM menu_gallery WHERE id='$r_id'");
                        if ($delete) {
                            echo'Delete is successful';
                        } else {
                            echo 'Not successful';
                        }
                        ?>
                    </font>
                </td>
            </tr>
        </table>
        <!--    -------------- table --------------->

    </div>

</div>