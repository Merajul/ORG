<?php
//include 'admin/db_config.php';
mysql_connect('localhost','root') or die("Server Not Found");
mysql_select_db('ngo') or die("Database Not Found");

$select = mysql_query("SELECT * FROM comment");
while ($fetch = mysql_fetch_array($select)) {
    ?>
    <div style="margin-left: 50px;background: #fefefe;">
        <h4> Name : <?php echo $fetch['name'] ?> </h4>
        <h4> Comment :  </h4>
        <p> <?php echo $fetch['comment'] ?>  </p>
    </div>
<?php 
}
?>