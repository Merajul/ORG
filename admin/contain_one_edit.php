<?php
include 'left.php';
include 'db_config.php';

?>
<div class="box3">
    <div class="title"> Slider Update </div>
    <div class="box4"> 
        <?php 
         $url_id = $_GET[id_cont_edit];
         $select = mysql_query("SELECT * FROM contain_one WHERE id='$url_id'");
         $fetch = mysql_fetch_array($select);
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="form-tb">
                <h2>Add Slider Image </h2><hr>
                <tr>
                    <td>Head Name: </td><td><input type="text" name="h_name" value="<?php echo $fetch['head'];?>"></td>
                </tr>

                <tr>
                    <td>Detail Information:</td><td> <textarea name="detail" value="<?php echo $fetch['detals'];?>"></textarea></td>
                </tr>
                <tr>
                    <td>Icon:</td> <td><input type="file" name="image" value="<?php echo $fetch['icon']?>"></td>
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
                    $detail = $_POST['detail'];
                    $photo_name = $_FILES['image']['name'];
                    $dir = "image";
                    copy($_FILES['image']['tmp_name'], "$dir/$photo_name");
                    $photo = "$dir/$photo_name";
                    if (empty($head_name) or empty($detail)) {
                        echo "Please fillup this text";
                    } else {
                        $select_slider = mysql_query("SELECT * FROM contain_one WHERE icon='$photo' && head='$head_name' && detals='$detail'");
                        $number = mysql_num_rows($select_slider);
                        if ($number > 0) {
                            echo "Allready Exit It";
                        } else {
                            $update = mysql_query("UPDATE Contain_one SET icon='$photo',head='$head_name',detals='$detail' WHERE id='$url_id'");
                            if ($update) {
                                echo "<font color='green'>Contain One Update Successfull</font>";
                            } else {
                                echo"<font color='red'>Contain One Update is Not Sending </font>";
                            }
                        }
                    }
                }
                ?>
            </td>
        </tr>
        </table>
    </div>
    <div class="box4"> View slider<hr> 
        <table class="category-show-tb">
            <tr>
                <td>Id</td>
                <td>Head Name</td>
                <td>Detail</td>
                <td>Icon</td>
                <td> Edit  </td>
                <td> Delete  </td>
            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM contain_one");
            while ($fetch_contain = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_contain['id']; ?></td>
                    <td><?php echo $fetch_contain['head']; ?></td>
                    <td><?php echo $fetch_contain['detals']; ?></td>
                    <td><img src="<?php echo $fetch_contain['icon']; ?>" width="100px;" height="100px;"></td>
                    <td><a href="contain_one_edit.php?id_cont_edit=<?php echo $fetch_contain['id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="contain_one.php?ge_id=<?php echo $fetch_contain['id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
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