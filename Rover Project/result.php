<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <link rel="icon" href="C:\Users\Gokul\Desktop\College\RoverProject\Images\rover.png">
    <title>Rover cabs:Book cabs easily</title>
</script>
</head>
<style>
    body {
    margin-left: auto;
    margin-bottom:auto;
    margin-right: auto;
	background-image:url('https://c.pxhere.com/photos/c6/e5/city_taxi_public_transport_inside_drive_traffic_jam-734324.jpg!d');
  }
  .header {
	width: 796px;
	margin: 80px auto 0px;
	color: white;
	background:rgba(231, 201, 64, 0.979);
	text-align: center;
	border: 1px solid rgba(231, 201, 64, 0.979);
	padding: 25px;
	font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: bold;
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: rgba(231, 201, 64, 0.979);
	border: none;
	border-radius: 5px;
	
}
div, .content {
	width: 804px;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
}
 strong{
	font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: bold;
	font-size: 20px;
 }
</style>
<body>
<!-- Navigation -->
<ol>
    <link rel="stylesheet" type="text/css" href="navbar.css">
    <li><a href="indexreal.php">Home</a></li>
    <li><a href="about.php">About</a></li>
 </ol>
<div class="header">
<p><a href="result.php?logout='1'" style="color: red;">Log out</a></p>
<h1 align="center">Thank you for booking with us!</h1>
<h1 align="center">Your Booking Details</h1></div>
<?php include('server.php');
if (!isset($_SESSION['username'])) {
	$msg = "You must log in first";
	echo "<script type='text/javascript'>alert('$msg');</script>";
	header('location: login.php');
  }
  
  if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
	exit;
  }
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($db,"SELECT * FROM book ORDER BY id DESC LIMIT 1");  //Selects only the last given form values
$row = mysqli_fetch_array($result);
echo "<div><center>";
echo "<strong><h3>Name:</h3></strong>".$row['name']."<br>";
echo "<strong><h3>Journey Type:</h3></strong>" .$row['type']."<br>";
echo "<strong><h3>Pickup Location:</h3></strong>" .$row['start']."<br>";
echo "<strong><h3>Drop Location:</h3></strong><br>" .$row['end']."<br>";   //Prints all the inputted details
echo "<strong><h3>Cab type:</h3></strong><br>" .$row['avail']."<br>";
echo "<strong><h3>Date of journey:</h3></strong><br>" .$row['date']."<br>";
echo "<strong><h3>Time of journey:</h3></strong><br>" .$row['time']."<br>";
echo "<strong><h3>Mobile Number:</h3></strong>" .$row['number']."<br>";
echo "</center><br>";
?>
<center><form action="indexreal.php"><button type="submit" class="btn" name="submit">Back to main menu</button></form>&nbsp;
<form action="book.php"><button type="submit" class="btn" name="submit">Book again</button></form></div>
</body>
</html>
