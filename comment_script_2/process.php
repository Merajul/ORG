<?php
session_start();

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array

	if (empty($_POST['name']))
		$errors['name'] = 'Name is required.';

	if (empty($_POST['email']))
		$errors['email'] = 'Email is required.';


// return a response ===========================================================

	// if there are any errors in our errors array, return a success boolean of false
	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

		// if there are no errors process our form, then return a message

		// DO ALL YOUR FORM PROCESSING HERE
		// THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

		// show a message of success and provide a true success variable
//            mysql_connect('localhost','root') or die("Server Not Found");
//mysql_select_db('ngo') or die("Database Not Found");
    include '../admin/db_config.php';
    $name = $_POST['name'];
    $comment = addslashes($_POST['email']);
    $blog_id = $_SESSION['blog_id'];
mysql_query("INSERT INTO comment VALUES('','$blog_id','$name','$comment')");
unset($_SESSION['blog_id']);
		$data['success'] = true;
		$data['message'] = 'Success!';
	}

//        $data['message'] = "<h2> Successfull</h2>";
	// return all our data to an AJAX call
	echo json_encode($data);