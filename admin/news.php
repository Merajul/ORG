<?php
include 'left.php';
include 'db_config.php';
?>
<div class="box3">
    <div class="title"> News   </div>
    <div class="box4"> 
        <form action="" method="post" enctype="multipart/form-data">
            <h2> Add News </h2><hr>
            <table class="user-tb">  
                <tr>
                    <td>Title:</td><td><input type="text" name="title" placeholder="Title"</td>
                </tr>
                <tr>
                    <td>Description:</td><td><textarea name="description"></textarea></td>
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
                    $description = $_POST['description'];
                    $photo_name = $_FILES['image']['name'];
                    $dir = "news_image";
                    copy($_FILES['image']['tmp_name'], "$dir/$photo_name");
                    $photo = "$dir/$photo_name";


                    if (empty($description) or empty($title) or empty($photo)) {
                        echo 'Please fillup text';
                    } else {

                        /*
                         * check this user exist or not
                         */
                        $select_news = mysql_query("SELECT * FROM news WHERE description='$description' && title='$title' && image='$photo'");
                        $number = mysql_num_rows($select_news);
                        if ($number > 0) {
                            echo"This recorde allready Exit";
                        } else {

                            /*
                             * insert user Information
                             */
                            $insert_news = mysql_query("INSERT INTO news (news_id,title,description,image) VALUES ('','$title','$description','$photo')");

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
    <div class="box4"> View News <hr> 
        <table class="category-show-tb">
            <tr>
                <td>Id</td>
                <td>Title</td>
                <td>Description</td>
                <td>Image</td>
                <td>Edit</td>
                <td>Delete</td>


            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM news");
            while ($fetch_news = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_news['id']; ?></td>
                    <td><?php echo $fetch_news['title']; ?></td>
                    <td><?php echo $fetch_news['description']; ?></td>
                    <td><img src="<?php echo $fetch_news['image']; ?>" width="100px;" height="100px;"></td>
                    <td><a href="news_edit.php?id_cont_edit=<?php echo $fetch_news['news_id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="news.php?ge_id=<?php echo $fetch_news['news_id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
                </tr>
            <?php } ?>
            <tr><td colspan="6">
                    <font size="+2"color="green">
                        <?php
                        $r_id = $_GET['ge_id'];
                        $delete = mysql_query("DELETE FROM news WHERE news_id='$r_id'");
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