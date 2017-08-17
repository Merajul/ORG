<?php
error_reporting(0);
session_start();
include 'header.php';
//$id = $_GET['blog_id'];
//$_SESSION['blog_id']  = $id;
$fetch = full_blog($id);


?>
<!--        -------------------------- slider start----------------------------->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script> 
//    function show_comment(id){
//$(document).ready(function(){
//        $(".comment_box"+id).slideToggle("slow");
//});
//    }
</script>

<div class="container-fluid content">
    <div class="row">
        <div class="col-lg-12 col-md-12 padding vission-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding heading">
                <h5> Blog </h5>
            </div>

              <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box">
                <?php 
            $select = select_blog();
            while($fetch = mysql_fetch_array($select)){
                $id = $fetch['id']; 
                $_SESSION['blog_id']  = $id;
             
            ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blog">
                    <h3 class="blog_heading"><a href="blog_detail.php?blog_id=<?php echo $id ?>"><?php echo $fetch['title']; ?></a></h3>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 padding_left">
                        <img src="admin/<?php echo $fetch['image']; ?>" class="img-responsive thumbnail blog_image">
                    </div>
                    <P><?php echo $fetch['description']; ?><b>
                            <a href="">Details</a></b></P>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 padding">
                        <span class="date"><i class="fa fa-calendar"><?php echo $fetch['date']; ?></i></span>
<!--                        <span class="like"><a href=""><i class="fa fa-thumbs-o-up"></i>Like</a></span>
                        -->                        <span class="comment<?php echo $id; ?>" style="cursor: pointer;" title="Click to show comment" onclick="show_comment(<?php echo $id;?>)"><i class="fa fa-comments-o"></i> Comment</span>
                    </div>
                            <div class="comment_box<?php echo $id; ?>" style="width: 100%;min-height: 100px;float: left;overflow: hidden;">
                                
                
                <hr style="border: 1px solid #aaa;">
                <h3> Comment </h3>
                <hr style="border: 1px solid #aaa;">
                <div class="col-lg-12 comm">
                    <?php 
                    $select = mysql_query("SELECT * FROM comment WHERE blog_id='$id' ");
                    while($fetch = mysql_fetch_array($select)){
                    ?>
                    <div style="margin-left: 50px;background: #fefefe;padding: 20px;margin-top: 20px;">
                        <h4> Name : <?php echo $fetch['name'] ?> </h4>
                        <hr>
                        <h4> Comment :  </h4>
                        <p style="min-height: 50px;"> <?php echo $fetch['comment'] ?>  </p>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-lg-12">
                    <h1> Write your comment </h1>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php include 'comment_script/index.php'; ?>
<!--                                <form action="process.php" method="post">
                                    <input type="text" name="name">
                                    <input type="text" name="email">
                                    <input type="submit">
                                </form>-->
                            </div>
                </div>
            </div>
        </div>
                  <?php } ?>
    </div>
</div>
</div>
</div>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
// magic.js
$(document).ready(function() {

	// process the form
	$('form').submit(function(event) {
            alert('feni');

		$('.form-group').removeClass('has-error'); // remove the error class
		$('.help-block').remove(); // remove the error text

		// get the form data
		// there are many ways to get this data using jQuery (you can use the class or id also)
		var formData = {
			'name' 				: $('input[name=name]').val(),
			'email' 			: $('input[name=comment]').val()
		};
//                $('input').val()='';
		// process the form
		$.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: 'process.php', // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
		})
			// using the done promise callback
			.done(function(data) {

				// log data to the console so we can see
				console.log(data); 

				// here we will handle errors and validation messages
				if ( ! data.success) {
					
					// handle errors for name ---------------
					if (data.errors.name) {
						$('#name-group').addClass('has-error'); // add the error class to show red input
						$('#name-group').append('<div class="help-block">' + data.errors.name + '</div>'); // add the actual error message under our input
					}

					// handle errors for email ---------------
					if (data.errors.email) {
						$('#email-group').addClass('has-error'); // add the error class to show red input
						$('#email-group').append('<div class="help-block">' + data.errors.email + '</div>'); // add the actual error message under our input
					}

					

				} else {

					// ALL GOOD! just show the success message!
					$('form').append('<div class="alert alert-success">' + data.message + '</div>');

					// usually after form submission, you'll want to redirect
					// window.location = '/thank-you'; // redirect a user to another page
 $('.comm').load("comment.php");
				}
                               
			})

			// using the fail promise callback
			.fail(function(data) {

				// show any errors
				// best to remove for production
				console.log(data);
			});

		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
	});
        

});

</script>-->

<?php include 'footer.php'; ?>
<!--        -------------------------- footer end ----------------------------->

