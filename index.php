<!--        -------------------------- header end----------------------------->
<?php include 'header.php'; ?>
<!--        -------------------------- slider start----------------------------->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 slider_wrapper padding">

            <div id="themeSlider" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#themeSlider" data-slide-to="0" class="active"></li>
                    <li data-target="#themeSlider" data-slide-to="1"></li>
                    <li data-target="#themeSlider" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <div class="imgOverlay"></div>
                        <img src="images/agriculture/_MG_3860.JPG" style="height: 500px;" class="img-responsive">



                    </div>
                    <div class="item">
                        <div class="imgOverlay"></div>
                        <img src="images/agriculture/_MG_3878.JPG" style="height: 500px;" class="img-responsive">
                        <!--                        <div class="carousel-caption">
                                                    <h3>Second slide</h3>
                                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                                </div>-->
                    </div>
                    <div class="item">
                        <div class="imgOverlay"></div>
                        <img src="images/agriculture/_MG_3956.JPG" style="height: 500px;" class="img-responsive">
                        <!--                        <div class="carousel-caption">
                                                    <h3>Third slide</h3>
                                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                                </div>-->
                    </div>
                </div>

                <a class="left carousel-control" href="#themeSlider" data-slide="prev">
                    <span class="fa fa-chevron-left"></span>
                </a>
                <a class="right carousel-control"href="#themeSlider" data-slide="next">
                    <span class="fa fa-chevron-right"></span>
                </a>

                <!--                <div class="main-text hidden-xs hidden-sm">
                                    <div class="col-md-12 text-center">
                                        <h1>Static Headline And Content</h1>
                                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                                        <div class="clearfix"></div>
                                        <div class="carousel-btns">
                                            <a class="btn btn-md btn-default" href="">Login</a>
                                            <a class="btn btn-md btn-default" href="">Registration</a>
                                        </div>
                                    </div>
                                </div>-->
            </div>




        </div>
    </div>
</div>
<!--        -------------------------- slider end----------------------------->

<!--        -------------------------- main content start----------------------------->
<!--        ------ gap --------->
<div class="row gap">
    <div class="col-lg-12 col-md-12 gap"></div>
</div>
<!--        ------ gap --------->

<div class="container-fluid">

    <div class="container">


        <div class="row db-padding-btm db-attached">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="db-wrapper">
                    <div class="db-pricing-eleven db-bk-color-one">
                        <div class="price">
                            <sup><i class="fa fa-tree" aria-hidden="true"></i>
                            </sup>

                        </div>
                        <div class="type">
                            Agricultural
                        </div>
                        <ul>

                            <li>The farmers of this country are the most essential part of the agricultural sector, they work day and night making the country GDP growth rate above 5 percent, but the paradox is they are the ones living in extreme poverty.</li>

                        </ul>
                        <div class="pricing-footer">

                            <a href="agriculture" class="btn db-button-color-square btn-lg">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="db-wrapper">
                    <div class="db-pricing-eleven db-bk-color-one">
                        <div class="price">
                            <sup><i class="fa fa-book" aria-hidden="true"></i>
                            </sup>

                        </div>
                        <div class="type">
                            Education
                        </div>
                        <ul>

                            <li>Plato was a philosopher, as well as mathematician, in Classical Greece once said "The direction in which education starts a man will determine his future in life." </li>

                        </ul>
                        <div class="pricing-footer">

                            <a href="education" class="btn db-button-color-square btn-lg">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="db-wrapper">
                    <div class="db-pricing-eleven db-bk-color-one">
                        <div class="price">
                            <sup><i class="fa fa-child" aria-hidden="true"></i>
                            </sup>

                        </div>
                        <div class="type">
                            Child Marriage
                        </div>
                        <ul>

                            <li>Child marriage is a very common social issue around the world, mostly in the developing countries. Bangladesh stands in the second highest rates of child marriage in the world.</li>

                        </ul>
                        <div class="pricing-footer">

                            <a href="child_marrige" class="btn db-button-color-square btn-lg">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="db-wrapper">
                    <div class="db-pricing-eleven db-bk-color-one">
                        <div class="price">
                            <sup><i class="fa fa-bicycle" aria-hidden="true"></i>
                            </sup>

                        </div>
                        <div class="type">
                            Animal Rights
                        </div>
                        <ul>

                            <li>In Bangladesh, to put a stop to the cruelty imposed on animals, our organization aims to adopt services and conduct programs that play direct roles in assuring their welfare.</li>

                        </ul>
                        <div class="pricing-footer">

                            <a href="animal" class="btn db-button-color-square btn-lg">More Details</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>










<!--            ------- top content start ------->
<!--    <div class="container">


        <div class="row">
            <div class="col-lg-12 col-md-12">

<?php
$select = select_top_content();
$i = 1;
while ($fetch = mysql_fetch_array($select)) {
    ?>
                                                                                                        <div class="col-lg-3 col-md-3 top_content1 ">
    <?php
    if ($i == 1) {
        $link = 'agriculture';
    } else if ($i == 2) {
        $link = 'education';
    } else if ($i == 3) {
        $link = 'child_marrige';
    } else if ($i == 4) {
        $link = 'animal';
    }
    ?>
                                                                                                            <a href="<?php echo $link; ?>.php">
                                                                                                                <div class="col-lg-12 col-md-12"> <div class="icon" style="background: url(admin/<?php echo $fetch['icon']; ?>);background-size: 100% 100%;"></div> </div>
                                                                                                                <div class="col-lg-12 col-md-12"> <h3> <?php echo $fetch['head']; ?> </h3> </div>
                                                                                                                <div class="col-lg-12 col-md-12"> <p> <?php echo $fetch['detals']; ?></p> </div>
                                                                                                            </a>
                                                                                                        </div>
    <?php
    $i++;
}
?>


            </div>
        </div>
    </div>-->

<!--            ------- top content end ------->

<!--            ------- center content start ------->
<div class="row">
    <div class="col-lg-12 col-md-12 center_content padding">
        <div class="row">
            <div class="col-lg-12 col-md-12 center_title"> 
                <h4 class="text-center">ORG Foundation Bangladesh Photo Gallery </h4> 
            </div>
        </div>

        <!--                    -------- mid box start --------->
        <div class="row">
            <div class="col-lg-12 col-md-12 padding photo_gallery">




                <?php include 'photo_gallery.php' ?>



            </div>
        </div>
        <!--                    -------- mid box end ------->
    </div>
</div>
<!--        -------------------------- main content end ----------------------------->
<!--        -------------------------- president speech start ----------------------------->


<!--        ------ gap --------->

<div class="row gap">

    <div class="col-md-12 gap"></div>

</div>
<!--        ------ gap --------->


<div class="container-fluid padding">

    <div class="row">


        <div class="col-lg-12 col-md-12 speech">

            <div class="col-lg-7  msg">
                <h4 style="color: white; margin-top: 100px;">Inspired by the famous quote</h4>
                <h1>“United we stand divided we fall”</h1>
                <h4  style="margin-left:10px; color: white;"> is the main motto of ORG</h4><br>
                <p><b style="padding: 0;">Focus:</b> To protect the Low income people of Bangladesh by taking baby steps to Shine the light of technology and transform each village to a self-sufficient entity and to provide them with a stronger step to a better life.</p>
            </div>
            <div class="col-lg-5  msg1">
              
                    <object style="margin-left: 12px; margin-top: 35px;" type="application/x-shockwave-flash" width="500" height="400" data="video/ORG_FOUNDATION_ACTIVITIES.swf"></object>
             
            </div>
        </div>


    </div>
</div>
<div class="row gap1">
    <div class="col-md-12 gap1"></div>
</div>

<div class="container-fluid padding">
    <div class="row">


        <div class="intro-header padding"> 
            <div class="container1"  align="center">

                <div class="tab-content custom-tab-content" align="center">
                    <div class="subscribe-panel">
                        <h1>Newsletter!!!</h1>
                        <p>Subscribe to our weekly & Monthly Newsletter and stay tuned.</p>

                        <form action="" method="post">

                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control input-lg" name="email" id="email"  placeholder="Enter your Email"/>
                                </div>
                            </div>

                            <br/><br/><br/>
                            <button class="btn btn-success btn-lg">Subscribe Now!</button>
                        </form>

                    </div>
                </div>
            </div> 
        </div>
    </div>

</div>










<!--        ------ gap --------->
<div class="row gap1">
    <div class="col-md-12 gap1"></div>
</div>
</div>
<!--        ------ gap --------->

<!--        -------------------------- president speech end ----------------------------->


<!--        -------------------------- footer start ----------------------------->
<?php include 'footer.php'; ?>
<!--        -------------------------- footer end ----------------------------->





<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<script src="js/bootstrap.min.js"></script>

<!--------------------- menu lkink-------------------->

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="js/script.js"></script>

</body>
</html>