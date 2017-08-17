
<!--        -------------------------- header end----------------------------->
<?php include 'header.php'; ?>
<!--        -------------------------- slider start----------------------------->
<div class="container-fluid content">
    <div class="row">
        <div class="col-lg-12 col-md-12 padding vission-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding heading">
                <h5>ORG News</h5>
            </div>

            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box">
                <?php 
                $select_news = mysql_query("SELECT * FROM news");
                while($fetch_news = mysql_fetch_array($select_news)){
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 news">
                        <h3 class="blog_heading"><a href="org_news_detail.php?news_id=<?php echo $fetch_news['news_id']; ?>"><?php echo $fetch_news['title']; ?></a></h3>
                        <span class="date"><i class="fa fa-calendar"> 22 April 2015</i></span>
                        <P><?php  $news = $fetch_news['description']; 
             

echo limit_text($news, 80);
                        ?><b><a href="org_news_detail.php?news_id=<?php echo $fetch_news['news_id']; ?>">Details</a></b></P>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 padding">
                        <img src="admin/<?php echo $fetch_news['image']; ?>" class="img-responsive thumbnail news-image">
                    </div>
                </div>
                <?php
                }
                
                ?>
                

            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<!--        -------------------------- footer end ----------------------------->

