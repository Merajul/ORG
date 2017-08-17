<?php
include 'left.php';
include 'db_config.php';
?>
<div class="box3">
    <div class="title"> Photo Gallery </div>
    <div class="box4"> 
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Add Photo In Album </h2>
            <table class="brand">
                <tr>
                    <td>Photo:</td> <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" class="btn" value="Submit"></td>
                </tr>
            </table>

        </form>
        
        
        <tr>
            <td colspan="2"> 
                <?php
                include 'db_config.php';
                if (isset($_POST['submit'])) {
                    $photo_name = $_FILES['image']['name'];
                    $dir = "gallery/";
                    copy($_FILES['image']['tmp_name'], "$dir/$photo_name");
                    $image = "$dir/$photo_name";
                    if (empty($image)) {
                        echo'Please fillup this text';
                    } else {
                        $select_gallery = mysql_query("SELECT * FROM gallery WHERE image ='$image'");
                        $number = mysql_num_rows($select_gallery);
                        if ($number > 0) {
                            echo "Allready Exit It";
                        } else {
                            $inser_gallery = mysql_query("INSERT INTO gallery (id,name,image) VALUES ('','','$image')");
                            if ($inser_gallery) {
                                echo "<font color='green'>Photo Gallery Add Successfull</font>";
                            } else {
                                echo"<font color='red'>Photo Gallery is Not Sending </font>";
                            }
                        }
                    }
                }
                ?>
            </td>
        </tr>
        </table>
    </div>
    
    
    <div class="box4"> View Photo <hr> 
        <table class="category-show-tb">
            <tr>
                <td>Gallery Id</td>
                <td>Brand Name</td>
                <td>Gallery Photo</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            <?php
            include 'db_config.php';
            $select = mysql_query("SELECT * FROM gallery");
            while ($fetch = mysql_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch['id']; ?></td>
                    <td></td>
                    <td><img src="<?php echo $fetch['image']; ?>" width="100px;" height="100px;"></td>
                    <td><a href="gallery_edit.php?ge_id=<?php echo $fetch['id']; ?>"><img src="image/file_edit.png" style="width: 20px;height: 20px;"></a></td>
                    <td><a href="gallery.php?g_id=<?php echo $fetch['id']; ?>"><img src="image/file_delete.png" style="width: 20px;height: 20px;"></a></td>
                </tr>
            <?php } ?>
                
                <tr><td colspan="5">
                    <font size="+2"color="green">
                <?php
                $g_id = $_GET['g_id'];
                if(isset($_GET['g_id'])){
                $delete = mysql_query("DELETE FROM gallery WHERE id='$g_id'");
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