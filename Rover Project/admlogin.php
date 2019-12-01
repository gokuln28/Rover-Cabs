<?php include('server.php') 

?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="../Images/rover.png">
<title>Rover cabs:Book cabs easily</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
		<h2>Welcome Rover Admin</h2>
	</div>
	
	<form method="post" action="admlogin.php">

		<?php include('errors.php') ?>

		<div class="input-group">
			<label>Admin Name</label>
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
			Back to User Login page <a href="login.php">Click Here</a>
		</p>
	</form>
   </body>
 </html>
 <?php
  if($db->connect_error){
	  die ("connection_error");
  }
  if(isset($_POST['submit'])){

      if(isset($_SESSION['username']))
      unset($_SESSION['username']); 
         if($_SERVER["REQUEST_METHOD"] == "POST") {
     
      $admname = ($_REQUEST['username']);
      $password =  ($_REQUEST['password']);
      if (count($errors) == 0) {
        
          $query = "SELECT * FROM admin WHERE admname='$admname' and password='$password'";
          $results = $db->query($query);

          if ($results->num_rows>0) {
            $message2 = "Welcome user";
            echo "<script type='text/javascript'>alert('$message2');window.location.href='db.php';</script>";
              $_SESSION["username"] = "$username";
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