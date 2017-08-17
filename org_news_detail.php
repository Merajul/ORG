
<!--        -------------------------- header end----------------------------->
<?php include 'header.php';
$id = $_GET['news_id'];
$fetch = org_news($id);

?>
<!--        -------------------------- slider start----------------------------->
<div class="container-fluid content">
    <div class="row">
        <div class="col-lg-12 col-md-12 padding vission-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding heading">
                <h5>Org News </h5>
            </div>

            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marrige">
                    <img src="admin/<?php echo $fetch['image']; ?>" class="img-responsive thumbnail marrige-image">
                    <h4> <?php echo $fetch['date']; ?></h4>
                    <h3><?php echo $fetch['title']; ?></h3>
                    <P><?php echo $fetch['description']; ?></P>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<!--        -------------------------- footer end ----------------------------->

