<?php

include 'db_config.php';
if (isset($_POST['submit'])) {
    $reg_name = $_POST['reg_name'];
    $password = $_POST['password'];
    if (empty($reg_name) or empty($password)) {
        echo"Fillup this text bar";
    } else {
        $select_admin = mysql_query("SELECT * FROM admin WHERE admin_name='$reg_name' && password='$password'");
        $number = mysql_num_rows($select_admin);
        if ($number > 0) {
            echo"Admin Allready Exit";
        } else {
            $insert = mysql_query("INSERT INTO admin(admin_id,admin_type,admin_name,password) VALUES ('','','$reg_name','$password')");
            if ($insert) {
                echo'Registration successful';
            } else {
                echo'Registration not successful';
            }
        }
    }
}
?>