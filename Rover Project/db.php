<?php 
error_reporting(0);
 session_start();
  if (!isset($_SESSION['username'])) {
    $msg = "You must log in first";
	echo "<script type='text/javascript'>alert('$msg');</script>";
    header('location: admlogin.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: admlogin.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="../Images/rover.png">
<title>Rover: Book Cabs Easily</title>
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
	background-size:99%;
}

.header {
	width: 40%;
	margin: 50px auto 0px;
	color: white;
	background:rgba(223, 194, 67, 0.979);
	text-align: center;
	border: rgba(223, 194, 67, 0.979);
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
	font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: bold;
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

#customers {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    padding: 8px;
}

#customers tr{background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: brown;
    color: white;
}
</style>
<ol>
<link rel="stylesheet" type="text/css" href="navbar.css">
<li><a href="admlogin.php">Back</a></li>
<li><a href="about.php">About</a></li>
</ol><br>
<div class="a">
<h1 align="center">Rover Cabs</h1>
<p><a href="db.php?logout='1'" style="color: red;">Log out</a></p>
<?php 
if(isset($_GET['delete'])){
	$id = $_GET['id'];
	echo "<script>alert('$id')</script>";
	$sql = "DELETE FROM book WHERE id='$id'";  //To delete any row(Not-Working)
    $result = mysqli_query($db, $sql);
    if ($result) {
        echo "Record deleted";
    } else {
        echo "Error:Cannot " . $sql . "<br>" . mysqli_error($db);
    }
	
}
?>
</body>
</html>
<?php
include('server.php');
// Checks connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($db,"SELECT * FROM book");

echo "<table border='1' id='customers'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Journey Type</th>
<th>Pickup at</th>
<th>Drop at</th>
<th>Cab Type</th>
<th>Date</th>
<th>Time</th>
<th>Mobile Number</th>
<th>Remove</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['type'] . "</td>";
echo "<td>" . $row['start'] . "</td>";
echo "<td>" . $row['end'] . "</td>";
echo "<td>" . $row['avail'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['time'] . "</td>";
echo "<td>" . $row['number'] . "</td>";
echo "<td><a href='db.php?id=".$row[id]."'>Delete</a></td>";
echo "</tr>";
}
echo "</table>";
?>