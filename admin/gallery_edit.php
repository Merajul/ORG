<?php
include 'left.php';
include 'db_config.php';

?>
<div class="box3">
    <div class="title"> Photo Gallery Update </div>
    <div class="box4"> 
        <?php 
         $url_id = $_GET[id_gadelete];
         $select = mysql_query("SELECT * FROM gallery WHERE id='$url_id'");
         $fetch = mysql_fetch_array($select);
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="form-tb">
                <h2>Add Photo In Gallery </h2><hr>
                
                <tr>
                    <td>Slider Image:</td> <td><input type="file" name="image" Value="<?php echo $fetch['image'];?>"></td>
                </tr>
                
                <tr>
                    <td></td> <td><input type="submit" name="submit" class="btn" value="submit"></td>
                </tr>

        </form>
        <tr>
            <td colspan="2"> 
                <?php
                if (isset($_POST['submit'])) {
                  
                    $image_name = $_FILES['image']['name'];
                    $dir = "image";
                    copy($_FILES['image'][tmp_name], "$dir/$image_name");
                    $image = "$dir/$image_name";
                    if (empty($image)) {
                        echo "Please fillup this text";
                    } else {
                        $select_slider = mysql_query("SELECT * FROM gallery WHERE image='$image'");
                        $number = mysql_num_rows($select_slider);
                        if ($number > 0) {
                            echo "Allready Exit It";
                        } else {
                            $update = mysql_query("UPDATE gallery SET image='$image' WHERE id='$url_id'");
                            if ($update) {
                                echo "<font color='green'>Gellery Update Successfull</font>";
                            } else {
                                echo"<font color='red'>Gellery Update is Not Sending </font>";
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
                <td>Gallery Id</td>
                <td>Gallery Name</td>
                <td>Gallery Image</td>
                <td> Edit  </td>
                <td> Delete  </td>
            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM gallery");
            while ($fetch_gallery = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_gallery['id']; ?></td>
                    <td><?php echo $fetch_gallery['name']; ?></td>
                    <td><img src="<?php echo $fetch_gallery['image']; ?>" width="100px;" height="100px;"></td>
                    <td><a href="gallery_edit.php?id_gadelete=<?php echo $fetch_gallery['id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="gallery_edit.php?ge_id=<?php echo $fetch_gallery['id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
                </tr>
            <?php } ?>
            <tr><td colspan="5">
                    <font size="+2"color="green">
                <?php
                $r_id = $_GET['ge_id'];
                $delete = mysql_query("DELETE FROM gallery WHERE id='$r_id'");
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