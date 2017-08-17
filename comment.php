<?php
include 'admin/db_config.php';
$blog_id = $_GET['blog_id'];
    $select = mysql_query("SELECT * FROM comment WHERE blog_id='$blog_id'");
    while ($fetch = mysql_fetch_array($select)) {
        ?>
        <div style="margin-left: 50px;background: #fefefe;padding: 20px;margin-top: 20px;">
            <h4> Name : <?php echo $fetch['name'] ?> </h4>
            <hr>
            <h4> Comment :  </h4>
            <p> <?php echo $fetch['comment'] ?>  </p>
        </div>
    <?php

}
?>