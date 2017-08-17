<?php
include 'left.php';
include 'db_config.php';
?>
<div class="box3">
    <div class="title">Blog </div>
    <div class="box4"> 
        <form action="" method="post" enctype="multipart/form-data">
            <h2> Add Blog </h2><hr>
            <table class="user-tb">  
                <tr>
                    <td>Title: </td><td><input type="text" name="title" placeholder="Title"</td>
                </tr>
                <tr>
                    <td>Description:</td><td><textarea name="description"></textarea></td>
                </tr>
                <tr>
                    <td>Date: </td><td><input type="date" name="date" placeholder="Date"</td>
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
                    $date = $_POST['date'];
                    $description = $_POST['description'];
                    $photo_name = $_FILES['image']['name'];
                    $dir = "image";
                    copy($_FILES['image']['tmp_name'], "$dir/$photo_name");
                    $photo = "$dir/$photo_name";


                    if (empty($description) or empty($date) or empty($photo)) {
                        echo 'Please fillup text';
                    } else {

                        /*
                         * check this user exist or not
                         */
                        $select_contain_one = mysql_query("SELECT * FROM blog WHERE description='$description' && date='$date' && image='$photo'");
                        $number = mysql_num_rows($select_contain_one);
                        if ($number > 0) {
                            echo"This recorde allready Exit";
                        } else {

                            /*
                             * insert user Information
                             */
                            $insert = mysql_query("INSERT INTO blog (title,description,date,image) VALUES ('$title','$description','$date','$photo')");

                            if ($insert) {

                                ?>
                <script type="text/javascript">
            alert('Insert Successfull');    
            </script>
                                    <?php
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
    <div class="box4"> View Blog <hr> 
        <table class="category-show-tb">
            <tr>
                <td>Id</td>
                <td>Description</td>
                <td>date</td>
                <td>Image</td>
                <td>Edit</td>
                <td>Delete</td>


            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM blog");
            while ($fetch_blog = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_blog['id']; ?></td>
                    <td><?php echo $fetch_blog['description']; ?></td>
                    <td><?php echo $fetch_blog['date']; ?></td>
                    <td><img src="<?php echo $fetch_blog['image']; ?>" width="100px;" height="100px;"></td>
                    <td><a href="blog_edit.php?id_cont_edit=<?php echo $fetch_blog['id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="blog.php?ge_id=<?php echo $fetch_blog['id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
                </tr>
            <?php } ?>
            <tr><td colspan="6">
                    <font size="+2"color="green">
                        <?php
                        $r_id = $_GET['ge_id'];
                        if(isset($r_id)){
                        $delete = mysql_query("DELETE FROM blog WHERE id='$r_id'");
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