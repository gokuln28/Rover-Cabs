<?php include('server.php') //Including the php file that contains code to create DB ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="../Images/rover.png">
<title>Rover cabs:Book cabs easily</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="http://www.loveinsurance.com/uploads/9/5/0/5/95055912/taxi-2_orig.jpg">
	<style>
  * {
	margin: 0px;
	padding: 0px;
}
body {
	font-size: 120%;
	background-image:url('https://c.pxhere.com/photos/c6/e5/city_taxi_public_transport_inside_drive_traffic_jam-734324.jpg!d');
}

.header {
	width: 40%;
	margin: 50px auto 0px;
	color: white;
	background:rgba(231, 201, 64, 0.979);
	text-align: center;
	border: 1px solid rgba(231, 201, 64, 0.979);
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
	font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: bold;
}
form, .content {
	width: 40%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
}
.input-group {
	margin: 10px 0px 10px 0px;
}

.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: rgba(231, 201, 64, 0.979);
	border: none;
	border-radius: 5px;
	
}
.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}
div.a{
      padding:20px;
      margin-top:30px;
      height:150px;
      font-size: 25px;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

	</style>
<!--Header-->
<div class="a">
<h1 align="center"><strong>ROVER</h1>
<p><h5 align="center"><i>Booking Cabs is now easier!</p></i></strong></div>

	<div class="header">
		<h2>Login</h2>
	</div>

	<!--Login Form-->
	<form method="post" action="login.php">

		<?php include('errors.php') ?>

		<div class="input-group">
			<label>username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a><br>
		</p>
	</form>
   </body>
 </html>

 <?php
  if($db->connect_error){
	  die ("connection_error");
  }
  if(isset($_POST['submit'])){ //isset - button clicking moment

      if(isset($_SESSION['username']))
      unset($_SESSION['username']); 
         if($_SERVER["REQUEST_METHOD"] == "POST") {  //Requesting the details from the form
     
      $username = ($_REQUEST['username']);
      $password =  ($_REQUEST['password']);
      if (count($errors) == 0) {
        
          $query = "SELECT * FROM user WHERE username='$username' and password='$password'";  //Checking the DB for the given username and password where 'user' is a table in DB
          $results = $db->query($query);

          if ($results->num_rows>0) {
            echo "<script type='text/javascript'>window.location.href='indexreal.php';</script>";
              session_start();
              $_SESSION["username"] = "$username";   //Goes to next page if user details are found and session starts
              $_SESSION["success"] = "You are now logged in";
          }
          else {
             $message = "Enter the Correct Username or password";
             echo "<script type='text/javascript'>alert('$message');</script>";
 
          }
      }
    }
}
?>