<?php
include 'left.php';
include 'db_config.php';

?>
<div class="box3">
    <div class="title"> Slider Update </div>
    <div class="box4"> 
        <?php 
         $url_id = $_GET[id_edit];
         $select = mysql_query("SELECT * FROM slider WHERE slider_id='$url_id'");
         $fetch_slider = mysql_fetch_array($select);
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="form-tb">
                <h2>Add Slider Image </h2><hr>
                <tr>
                    <td>Slider Name:</td><td><input type="text" name="slider_name" value="<?php echo $fetch_slider['title_name'];?>"></td>

                </tr>
                <tr>
                    <td>Slider Image:</td> <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td></td> <td><input type="submit" name="submit" class="btn" value="submit"></td>
                </tr>

        </form>
        <tr>
            <td colspan="2"> 
                <?php
                if (isset($_POST['submit'])) {
                    $slider_name = $_POST['slider_name'];
                    $image_name = $_FILES['image']['name'];
                    $dir = "image";
                    copy($_FILES['image'][tmp_name], "$dir/$image_name");
                    $image = "$dir/$image_name";
                    if (empty($slider_name) or empty($image)) {
                        echo "Please fillup this text";
                    } else {
                        $select_slider = mysql_query("SELECT * FROM slider WHERE image='$image' && title_name='$slider_name'");
                        $number = mysql_num_rows($select_slider);
                        if ($number > 0) {
                            echo "Allready Exit It";
                        } else {
                            $update = mysql_query("UPDATE slider SET image='$image',title_name='$slider_name' WHERE slider_id='$url_id'");
                            if ($update) {
                                echo "<font color='green'>Slider Update Successfull</font>";
                            } else {
                                echo"<font color='red'>Slider Update is Not Sending </font>";
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
                <td>slider Id</td>
                <td>slider Name</td>
                <td>Image</td>
                <td> Edit  </td>
                <td> Delete  </td>
            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM slider");
            while ($fetch_slider = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch_slider['slider_id']; ?></td>
                    <td><?php echo $fetch_slider['title_name']; ?></td>
                    <td><img src="<?php echo $fetch_slider['image']; ?>" width="100px;" height="100px;"></td>
                    <td><a href="slide_edit.php?id_edit=<?php echo $fetch_slider['slider_id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="slider_category.php?id=<?php echo $fetch_slider['slider_id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
                </tr>
            <?php } ?>
            <tr><td colspan="5">
                    <font size="+2"color="green">
                <?php
                $r_id = $_GET['id'];
                $delete = mysql_query("DELETE FROM slider WHERE slider_id='$r_id'");
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