<?php
session_start();
if(!$_SESSION['user']){
    header("Location:login.php");   
}

?>
<html>
    <head>
        <title>ORG Foundation Admin panel</title>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!--        ------------------ editor ---------------->

        <link rel="stylesheet" href="editor/tinyeditor.css">
        <script src="editor/tiny.editor.packed.js"></script>


        <!--        ------------------ editor ---------------->

    </head>
    <body>
        <div class="contain">
            <div class="left_contain">
                <p>ORG Foundation</p>

                <ul>
                    <li><i class="fa fa-tachometer"></i><a href="index.php">Dashboard</a></li>
                    <li><i class="fa fa-bar-chart"></i><a href="slider_category.php">Slider</a></li>
                    <li><i class="fa fa-envelope"></i><a href="product1.php"> Product </a></li>
                    <li><i class="fa fa-envelope"></i><a href="category.php"> Product Category </a></li>
                    <li><i class="fa fa-envelope"></i><a href="sub_category.php"> Product Sub Category </a></li>
                    <li><i class="fa fa-envelope"></i><a href="brand.php"> Product Brand </a></li>
                    <li><i class="fa fa-envelope"></i><a href="orders.php"> Orders </a></li>
                    <li><i class="fa fa-tasks"></i><a href="gallery.php">Photo Gallery</a></li>
                    <li><i class="fa fa-indent"></i><a href="contain_one.php">Contain One</a></li>
                    <li><i class="fa fa-indent"></i><a href="bottom_contain.php">Bottom Contain</a></li>
                    <li><i class="fa fa-chain-broken"></i><a href="orders.php">Orders</a></li>
                    <li><i class="fa fa-area-chart"></i><a href="menu_gallery.php">Menu Gallery</a></li>
                    <li><i class="fa fa-area-chart"></i><a href="blog.php"> Blog </a></li>
                    <li><i class="fa fa-area-chart"></i><a href="news.php">News</a></li>
                    <li><i class="fa fa-university"></i><a href="category.php">Category</a></li>
                    <li><i class="fa fa-university"></i><a href="login.php?logout=1">Logout</a></li>
                </ul>

            </div>
            <div class="right_contain">
                <div class="header">

                    <div class="setting">
                        <a href="#"><i class="fa fa-cogs"></i></a>
                    </div>

                    <div class="search">
                        <a href="#"><i class="fa fa-search"></i>Search</a>
                    </div>


                    <div class="email">
                        <a href="#"><i class="fa fa-envelope-o"></i></a>
                    </div>

                    <div class="bail">
                        <a href="#"><i class="fa fa-bell"></i></i></a>
                    </div>

                    <div class="Flag">
                        <a href="#"><img src="image/bangladeh.gif"></a>
                    </div>


                    <div class="profile">
                        <a href="#"><img src="image/tahsan.PNG"><span>Tahshan</span> </a>
                    </div>




                </div>