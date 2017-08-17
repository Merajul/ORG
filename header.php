<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ORG Foundation</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="css/customis.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="shortcut icon"  type="image/x-icon"  href="images/icon.png">
        <!------------------------font awesome link----------------------->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/lightbox.css">
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet"> 

    </head>
    <body>
        <!--        -------------------------- header start----------------------------->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 header_top">
                    <div class="container">
                        
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Phone : <i class="fa fa-phone"></i> 9138110 , 9138109</div>
                        <div class="col-lg-4 col-md-4 col-sm-1 col-xs-12"><a href="donate" style="color: white;"><i class="fa fa-hospital-o"></i> Donate</a></div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">Fax : <i class="fa fa-fax"></i> 9129310 </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"><a href="contact" style="color:white;"><i class="fa fa-envelope-o"></i> info@orgfoundationbd.com</a></div>
                    </div>
                </div>
            </div>
            <div class="row" style="border-bottom: 2px solid #8CC63F;">
                <div class="container">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header_bottom">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 padding_left">
                            <a href="index"> <img src="images/logo.png" class="img-responsive logo-image"style="outline: none;"></a>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 padding col-lg-offset-0 col-md-offset-0 col-sm-offset-0 col-xs-offset-0 menu">

                            <div id='cssmenu'>
                                <ul style="width: 102%;">
                                    <li class="aa" style="margin-left: 2px;"><a href='index'><span>Home</span></a></li>
                                    <li class='aa last has-sub'><a href=''><span>About us</span></a>
                                        <ul class="bb">
                                            <li class=''><a href='vission'><span>Vision & Mission</span></a></li>
                                            <!--<li class=''><a href='academic_calender.php'><span>Mission</span></a></li>-->
                                            <li class=''><a href='trustee'><span>Trustee</span></a></li>
                                            <li class=''><a href='organogram'><span>Organogram</span></a></li>
                                        </ul>
                                    </li>
                                    <li class='aa has-sub'><a href='#'><span>Social Program</span></a>
                                        <ul class="bb">
                                            <li class=''><a href='Presentation for ORG Foundation_Adolscent Health final1 (1).pdf'><span>ORG presentation</span></a></li>
                                            <li class=''><a href='agriculture'><span>Agriculture</span></a></li>
                                            <li class=''><a href='education'><span>Education</span></a></li>
                                            <li class=''><a href='child_marrige'><span>Prevention of Child marriage</span></a></li>
                                            <li class=''><a href='org_member'><span>Recreation For ORG Members</span></a></li>
                                            <li class=''><a href='accidental'><span>Accidental Death Benefit </span></a></li>
                                            <li class=''><a href='animal'><span>Animal Rights</span></a></li>
                                        </ul>
                                    </li>
                                    <li class='aa has-sub'><a href='#'><span>Fashion & Crafts </span></a>
                                        <ul class="bb">
                                            <?php 
                                            include 'admin/db_config.php';
                                            $select = mysql_query("SELECT * FROM category");
                                            while($fetch = mysql_fetch_array($select)){
                                                $category= $fetch['category_id'];
                                            ?>
                                            <li class=''><a href='product.php?category_id=<?php echo $fetch['category_id']; ?>'><span><?php echo $fetch['category_name']; ?></span></a>
                                                <ul style="margin-left: -25px;">
                                                    <?php
                                                    $select_sub_category = mysql_query("SELECT * FROM sub_category_table WHERE category_id = '$category'");
                                                    while($fetch_sub_cat = mysql_fetch_array($select_sub_category)){
                                                    ?>
                                            <li class=''><a href='sub_category.php?cat_id=<?php echo $fetch['category_id']; ?>&sub_id=<?php echo $fetch_sub_cat['sub_category_id']; ?>'><span> <?php echo $fetch_sub_cat['sub_category_name']; ?> </span></a></li>
                                            <?php
                                                    }
                                            ?>
                                                </ul>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                            
                                        </ul>
                                        
                                        
<!--                                        <li class=''><a href='sub_category.php?cat_id=3&sub_id=3'><span> Tops </span></a></li>
                                                </ul>
                                            </li>
                                            <li class=''><a href='product.php?category_id=4'><span>Gift Corner</span></a></li>-->
                                        
                                    </li>
                                    <li class='aa last hidden-md hidden-sm'><a href='blog.php'><span>Blog</span></a></li>
                                    <li class='aa has-sub'><a href='#'><span> Gallery </span></a>
                                        <ul class="bb">
                                            <li class=''><a href='gallery.php?gallery=Presentation'><span>ORG Presentation </span></a></li>
                                            <li class=''><a href='gallery.php?gallery=Nepal Donation'><span>Nepal Donation</span></a></li>
                                            <li class=''><a href='gallery.php?gallery=Fild Work'><span> ORG Field Work  </span></a></li>
                                        </ul>
                                    </li>                        
                                    <li class='aa has-sub'><a href='#'><span> Services </span></a>
                                        <ul class="bb">
                                            <li class=''><a href='member_payment.php'><span>Member Payment </span></a></li>
                                            <li class=''><a href='donate.php'><span>Donation</span></a></li>
                                        </ul>
                                    </li>                        
                                    <li class='aa last hidden-md hidden-sm'><a href='org-news.php'><span>ORG News</span></a></li>                   
                                    <li class='aa last hidden-sm'><a href='contact.php'><span>Contact us</span></a></li>
                                    <li class='aa has-sub hidden-lg'><a href='#'><span>More</span></a>
                                        <ul class="bb">
                                            <li class=''><a href='product.php'><span>Blog</span></a></li>
                                            <li class=''><a href='product.php'><span>Gallery</span></a></li>
                                            <li class=''><a href='product.php'><span>ORG News</span></a></li>
                                            <li class=''><a href='product.php'><span>Contact us</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            
                            <a href="donate.php">
                            
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'function.php';
        include 'admin/db_config.php';
        ?>