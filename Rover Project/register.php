<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="../Images/rover.png">
<title>Rover cabs:Book cabs easily</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
function validate()
{
	var a = document.forms["register"]["password"].value;  
	var q = document.forms["register"]["number"].value;
	if(q.length!= 10)                                           //Javascript function for form validation
	{
		window.alert("Mobile number must be exactly 10 digits.");
		return false;
	}
	if(a.length!>8)
	{
		alert("Password must have atleast 8 characters");
		return false;
	}
	
}
</script>
</head>
<style>
	* {
	margin: 0px;
	padding: 0px;
}
body {
	font-size: 120%;
	background: #F8F8FF;
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
	font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
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
	<body>
<!--Header-->
<div class="a">
<h1 align="center"><strong>ROVER</h1>
<p><h5 align="center"><i>Booking Cabs is now easier!</p></i></strong></div>

	<div class="header">
		<h2>Register now to experience the best of us!</h2>
	</div>
	<?php
	if(isset($_POST['reg_user']))
	{
		$username=$_POST['username'];
		$number=$_POST['number'];
		$email=$_POST['email'];                   
		$password=$_POST['password'];

	    if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($number)) { array_push($errors, "Mobile Number is required"); } //Checking whether any fields are empty. Here $errors is a user variable
		if (empty($email)) { array_push($errors, "E-mail is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }

	if(count($errors)==0){
		$query = "INSERT INTO user(username,number,email,password)VALUES('$username','$number','$email','$password')"; //Insert DB query 
		$result=mysqli_query($db, $query); //mysqli_query - built-in function to execute given query
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now registered to us!";
		header('location: indexreal.php'); 
	}
}
	?>
	<form method="post" action="register.php" name="register" onsubmit="return validate()">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Name</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Mobile no</label>
			<input type="number" name="number" value="<?php echo $number?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>