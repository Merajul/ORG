<?php
 session_start();
 include 'db_config.php';
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="form_style.css">
    </head>
    <body>
        <div class="wrapper-area">
            <div class="banner-area"><img src="photo/banner.jpg"></div>
            <div class="menu-area">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="add_category.php">Add Category</a></li>
                    <li><a href="sub_category.php">Sub Category</a></li>
                    <li><a href="add_brand.php">Add Brand</a></li>
                    <li><a href="profile.php">Add Profile</a></li>
                    <li><a href="product.php">Add Product</a></li>
                    <li><a href="admin_registion.php">Admin Registration</a></li>
                    <li><a href="index.php?id=2">Logout</a></li>
                </ul>
            </div>
            

