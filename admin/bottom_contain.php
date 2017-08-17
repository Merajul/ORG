<?php
include 'left.php';
include 'db_config.php';
?>
<div class="box3">
    <div class="title">Bottom Contain </div>
    <div class="box4"> 
        <form action="" method="post" enctype="multipart/form-data">
            <h2> Add Bottom Contain</h2><hr>
            <table class="user-tb">
                <tr>
                    <td>Head Name: </td><td><input type="text" name="b_name" placeholder="Head Name"</td>
                </tr>

                <tr>
                    <td>Detail Information:</td><td><textarea name="detail"></textarea></td>
                </tr>
                <tr>
                    <td>Icon:</td> <td><input type="file" name="image"></td>
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
                    $head_name = $_POST['b_name'];
                    $sub = $_POST['detail'];
                    $photo_name = $_FILES['image']['name'];
                    $dir = "image";
                    copy($_FILES['image']['tmp_name'], "$dir/$photo_name");
                    $photo = "$dir/$photo_name";


                    if (empty($head_name) or empty($sub) or empty($photo)) {
                        echo 'Please fillup text';
                    } else {

                        /*
                         * check this user exist or not
                         */
                        $select_contain_one = mysql_query("SELECT * FROM bello_contain WHERE head='$head_name' && sub='$sub' && image='$photo'");
                        $number = mysql_num_rows($select_contain_one);
                        if ($number > 0) {
                            echo"This recorde allready Exit";
                        } else {

                            /*
                             * insert user Information
                             */
                            $insert = mysql_query("INSERT INTO bello_contain (id,head,sub,image) VALUES ('','$head_name','$sub','$photo')");

                            if ($insert) {

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
    <div class="box4"> View Bottom Contain <hr> 
        <table class="category-show-tb">
            <tr>
                <td>Id</td>
                <td>Title Name</td>
                <td>Sub Name</td>
                <td>Photo</td>
                <td>Edit</td>
                <td>Delete</td>


            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM bello_contain");
            while ($fetch_bello = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_bello['id']; ?></td>
                    <td><?php echo $fetch_bello['head']; ?></td>
                    <td><?php echo $fetch_bello['sub']; ?></td>
                    <td><img src="<?php echo $fetch_bello['image']; ?>" width="100px;" height="100px;"></td>
                    <td><a href="bottom_contain_edit.php?id_cont_edit=<?php echo $fetch_bello['id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="bottom_contain.php?ge_id=<?php echo $fetch_bello['id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="6">
                    <font size="+2"color="green">
                        <?php
                        $r_id = $_GET['ge_id'];
                        $delete = mysql_query("DELETE FROM bello_contain WHERE id='$r_id'");
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