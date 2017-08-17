<!doctype html>
<html>
<head>

</head>
<body>
<div class="col-sm-6 col-sm-offset-1">
    <div class="comment"></div>

	<!-- OUR FORM -->
	<form action="process.php" method="POST">
		
		<!-- NAME -->
		<div id="name-group" class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" placeholder="Your name">
                        <input type="hidden" class="form-control" name="blog_id" value="<?php echo $_SESSION['blog_id'];?>">
			<!-- errors will go here -->
		</div>

		<!-- EMAIL -->
		<div id="email-group" class="form-group">
			<label for="email">Comment </label>
                        <textarea class="form-control" id="email" name="email" style="height: 200px;" placeholder="Comment"></textarea>
			<!-- errors will go here -->
		</div>

		

		<button type="submit" class="btn btn-success">Submit <span class="fa fa-arrow-right"></span></button>

	</form>

</div>
    
    	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
<!--	<script src="comment_script/magic.js"></script>  load our javascript file -->
        <script type="text/javascript">
        // magic.js
$(document).ready(function() {

    // process the form
    $('form').submit(function(event) {

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'name' 				: $('input[name=name]').val(),
            'email' 			: $('#email').val()
        };
                
        // process the form
        $.ajax({
            type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url 		: 'comment_script/process.php', // the url where we want to POST
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

                // handle errors for superhero alias ---------------
                if (data.errors.superheroAlias) {
                    $('#superhero-group').addClass('has-error'); // add the error class to show red input
                    $('#superhero-group').append('<div class="help-block">' + data.errors.superheroAlias + '</div>'); // add the actual error message under our input
                }

            } else {

                // ALL GOOD! just show the success message!
                $('form').append('<div class="alert alert-success">' + data.message + '</div>');

                // usually after form submission, you'll want to redirect
                // window.location = '/thank-you'; // redirect a user to another page
                $('.form-control').val('');
                var url = "comment.php?blog_id="+<?php echo $_SESSION['blog_id']; ?>+"";
                $('.comm').load(url);
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
</script>
</body>
</html>
