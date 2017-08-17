<?php
session_start();
include 'db_config.php';

 $user=$_POST['user'];
 $password=$_POST['password'];

$select=  mysql_query("SELECT * FROM admin WHERE admin_name='$user' && password='$password'");
$num_row=  mysql_num_rows($select);
$row =  mysql_fetch_array($select);
if($num_row==1){
    $_SESSION['user']=$row['admin_id'];

  header("Location:index.php");
}
else{

 header("Location:index.php?=1");
}
?>