<?php 
	session_start(); //Function to start a session

	// variable declaration
	$username = "";
	$number="";
	$email= "";
	$errors = array(); //array() - To get number of errors in values
	$_SESSION['success'] = "";

	define('HOST','localhost'); //Declaring the place of uploading the webpage as localhost(this computer)
	define('ROOT','root'); //Root user
	define('PASS',''); //DB Password(Currently set to NULL)
	define('DB','register'); //DB name
	$db = new mysqli(HOST,ROOT,PASS,DB); //Creating a DB with the given Credentials
	global $db; //Making it global so that it can be accessed by any users
    ?>
	