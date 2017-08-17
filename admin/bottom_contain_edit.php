<?php
include 'left.php';
include 'db_config.php';

?>
<div class="box3">
    <div class="title"> Slider Update </div>
    <div class="box4"> 
        <?php 
         $url_id = $_GET[id_cont_edit];
         $select = mysql_query("SELECT * FROM bello_contain WHERE id='$url_id'");
         $fetch = mysql_fetch_array($select);
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="form-tb">
                <h2>Add Slider Image </h2><hr>
                <tr>
                    <td>Head Name: </td><td><input type="text" name="h_name" value="<?php echo $fetch['head'];?>"></td>
                </tr>

                <tr>
                    <td>Detail Information:</td><td> <textarea name="sub" value="<?php echo $fetch['sub'];?>"></textarea></td>
                </tr>
                <tr>
                    <td>Icon:</td> <td><input type="file" name="image" value="<?php echo $fetch['image']?>"></td>
                </tr>
                <tr>
                    <td></td> <td><input type="submit" name="submit" class="btn" value="Submit"></td>
                </tr>

        </form>
        <tr>
            <td colspan="2"> 
                <?php
                if (isset($_POST['submit'])) {
                    $head_name = $_POST['h_name'];
                    $sub = $_POST['sub'];
                    $photo_name = $_FILES['image']['name'];
                    $dir = "image";
                    copy($_FILES['image']['tmp_name'], "$dir/$photo_name");
                    $photo = "$dir/$photo_name";
                    if (empty($head_name) or empty($sub) or empty($photo)) {
                        echo "Please fillup this text";
                    } else {
                        $select_slider = mysql_query("SELECT * FROM bello_contain WHERE image='$photo' && head='$head_name' && sub='$sub'");
                        $number = mysql_num_rows($select_slider);
                        if ($number > 0) {
                            echo "Allready Exit It";
                        } else {
                            $update = mysql_query("UPDATE bello_contain SET head='$head_name', sub='$sub',image='$photo' WHERE id='$url_id'");
                            if ($update) {
                                echo "<font color='green'>Bottom Contain Update Successfull</font>";
                            } else {
                                echo"<font color='red'>Bottom Contain Update is Not Sending </font>";
                            }
                        }
                    }
                }
                ?>
            </td>
        </tr>
        </table>
    </div>
    <div class="box4"> View Bottom contain<hr> 
        <table class="category-show-tb">
            <tr>
                <td>Id</td>
                <td>Head Name</td>
                <td>Sub Name</td>
                <td>Photo</td>
                <td> Edit  </td>
                <td> Delete  </td>
            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM bello_contain");
            while ($fetch_bottom = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_bottom['id']; ?></td>
                    <td><?php echo $fetch_bottom['head']; ?></td>
                    <td><?php echo $fetch_bottom['sub']; ?></td>
                    <td><img src="<?php echo $fetch_bottom['image']; ?>" width="100px;" height="100px;"></td>
                    <td><a href="bottom_contain_edit.php?id_cont_edit=<?php echo $fetch_bottom['id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="bottom_contain.php?ge_id=<?php echo $fetch_bottom['id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
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