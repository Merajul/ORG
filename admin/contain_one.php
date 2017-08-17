<?php
include 'left.php';
include 'db_config.php';
?>
<div class="box3">
    <div class="title"> Contain One  </div>
    <div class="box4"> 
        <form action="" method="post" enctype="multipart/form-data">
            <h2> Add Contain </h2><hr>
            <table class="user-tb">
                <tr>
                    <td>Head Name: </td><td><input type="text" name="h_name" placeholder="Head Name"</td>
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
                    $head_name = $_POST['h_name'];
                    $detail = $_POST['detail'];
                    $photo_name = $_FILES['image']['name'];
                    $dir = "image";
                    copy($_FILES['image']['tmp_name'], "$dir/$photo_name");
                    $photo = "$dir/$photo_name";


                    if (empty($head_name) or empty($detail) or empty($photo)) {
                        echo 'Please fillup text';
                    } else {

                        /*
                         * check this user exist or not
                         */
                        $select_contain_one = mysql_query("SELECT * FROM contain_one WHERE detals='$detail' && head='$head_name' && icon='$photo'");
                        $number = mysql_num_rows($select_contain_one);
                        if ($number > 0) {
                            echo"This recorde allready Exit";
                        } else {

                            /*
                             * insert user Information
                             */
                            $insert = mysql_query("INSERT INTO contain_one (id,icon,head,detals) VALUES ('','$photo','$head_name','$detail')");

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
    <div class="box4"> View Contain One <hr> 
        <table class="category-show-tb">
            <tr>
                <td>Id</td>
                <td>Title Name</td>
                <td>Detail</td>
                <td>Icon</td>
                <td>Edit</td>
                <td>Delete</td>


            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM contain_one");
            while ($fetch_contain_one = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_contain_one['id']; ?></td>
                    <td><?php echo $fetch_contain_one['head']; ?></td>
                    <td><?php echo $fetch_contain_one['detals']; ?></td>
                    <td><img src="<?php echo $fetch_contain_one['icon']; ?>" width="100px;" height="100px;"></td>
                    <td><a href="contain_one_edit.php?id_cont_edit=<?php echo $fetch_contain_one['id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="contain_one.php?ge_id=<?php echo $fetch_contain_one['id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
                </tr>
            <?php } ?>
            <tr><td colspan="6">
                    <font size="+2"color="green">
                        <?php
                        $r_id = $_GET['ge_id'];
                        $delete = mysql_query("DELETE FROM contain_one WHERE id='$r_id'");
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