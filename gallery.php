<!--        -------------------------- header end----------------------------->
<?php include 'header.php'; ?>
<!--        -------------------------- slider start----------------------------->
<div class="container-fluid content">
    <div class="row">
        <div class="col-lg-12 col-md-12 padding vission-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding heading">
                <h5>Gallery</h5>
            </div>

            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box">
                <?php
                $gallery = $_GET['gallery'];
                if($gallery =='Presentation'){
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding gallery">
                        <h5 class="text-left">ORG Presentation</h5>               
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding gallery">
                        <div class="embed-responsive embed-responsive-16by9">
<iframe src="https://docs.google.com/presentation/d/15RzHuFqJZXDH2FU2njPsZ-UrrFy4Ry5Nf0wDEVRAlYM/embed?start=false&loop=false&delayms=3000" frameborder="0" width="1280" height="700" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                        </div>
                    </div>             
                </div>
                

                <?php 
                }
                if($gallery == 'Nepal Donation'){
                    
//                    echo $category  = $gallery;
                    $select_gallery = mysql_query("SELECT * FROM menu_gallery WHERE category = 'Nepal Donation'");
                    $num_row = mysql_num_rows($select_gallery);
                    if($num_row>0){
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12padding">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding gallery">
                        <h5 class="text-left">
                            
                            <?php echo $gallery; ?> Photo Gallery
                        
                        </h5>               
                    </div>
                    <?php 
                    
                    while($fetch_gallery = mysql_fetch_array($select_gallery)){
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 padding photo-gallery">
                        <a class="example-image-link" href="admin/<?php echo $fetch_gallery['image']; ?>" data-lightbox="example-set">
                            <img class="example-image thumbnail gallery-image" src="admin/<?php echo $fetch_gallery['image']; ?>" alt=""/></a>
                    </div>
                    <?php }  ?>
                    
                </div>
                <?php }
                } 
                
                if($gallery == 'Fild Work'){
                    
                    
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12padding">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding gallery">
                        <h5 class="text-left">Field Work Photo Gallery</h5>               
                    </div>
                    <?php 
//                    echo $category  = $gallery;
                    $select_gallery = mysql_query("SELECT * FROM menu_gallery WHERE category = 'Fild Work'");
                    $num_row = mysql_num_rows($select_gallery);
                    if($num_row>0){
                    while($fetch_gallery = mysql_fetch_array($select_gallery)){
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 padding photo-gallery">
                        <a class="example-image-link" href="admin/<?php echo $fetch_gallery['image']; ?>" data-lightbox="example-set">
                            <img class="example-image thumbnail gallery-image" src="admin/<?php echo $fetch_gallery['image']; ?>" alt=""/></a>
                    </div>
                    <?php }  ?>
                    
                </div>
                <?php }   } ?>
                
                
                

            </div> 
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="lightbox-js/jquery-1.11.0.min.js"></script>
<script src="lightbox-js/lightbox.js"></script>

        <script>
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-2196019-1']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
<!--        -------------------------- footer end ----------------------------->