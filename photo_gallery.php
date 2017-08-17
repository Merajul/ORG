<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="chrome=1">
        <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="stylesheets/stylesheet_1.css" media="screen">
        <link rel="stylesheet" type="text/css" href="stylesheets/carouselTicker_1.css" media="screen">
        <link rel="stylesheet" href="css/lightbox.css">

        <title></title>
    </head>

    <body>
        <section id="main-content">
            <div id="demos">
                <div id="carouselTicker" class="carouselTicker">
                    <ul class="carouselTicker__list">
                        <?php 
                        
                        $select = select_gallery();
            while($fetch = mysql_fetch_array($select)){
             
                        
                        ?>
                        <li class="carouselTicker__item">
                            <a class="example-image-link" href="admin/<?php echo $fetch['image']; ?>" data-lightbox="example-set">
                                <img class="example-image thumbnail gallery-image" src="admin/<?php echo $fetch['image']; ?>" alt=""/>
                            </a>
                        </li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </section>
        
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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="javascripts/jquery.carouselTicker.min.js"></script>
        <script type="text/javascript" src="javascripts/start.js"></script>
    </body>
</html>
