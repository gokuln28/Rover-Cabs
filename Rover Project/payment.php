<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<link rel="icon" href="../Images/rover.png">
<title>Rover cabs:Book cabs easily</title>
</head>
<body>
<style>
 * {
	margin: 0px;
	padding: 0px;
}
html{
    width:100%;
    height:100%;
}
body{
    width:100%;
    min-height:100%;
    margin-left: auto;
    margin-bottom:auto;
    margin-right: auto;
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
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: rgba(231, 201, 64, 0.979);
	border: none;
	border-radius: 5px;
}
div.a{
      padding:20px;
      margin-top:30px;
      height:150px;
      font-size: 20px;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
.cc-selector input{
    margin:0;padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
}

.cc-selector-2 input{
    position:absolute;
    z-index:999;
}

.visa{background-image:url(http://i.imgur.com/lXzJ1eB.png);}
.mastercard{background-image:url(http://i.imgur.com/SJbRQF7.png);}
.cash{background-image:url(https://openclipart.org/image/2400px/svg_to_png/227246/cash.png);}

.cc-selector-2 input:active +.drinkcard-cc, .cc-selector input:active +.drinkcard-cc{opacity: .9;}
.cc-selector-2 input:checked +.drinkcard-cc, .cc-selector input:checked +.drinkcard-cc{
    -webkit-filter: none;
       -moz-filter: none;
            filter: none;
}
.drinkcard-cc{
    cursor:pointer;
    background-size:contain;
    background-repeat:no-repeat;
    display:inline-block;
    width:100px;height:70px;
    -webkit-transition: all 100ms ease-in;  
       -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
    -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
       -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
            filter: brightness(1.8) grayscale(1) opacity(.7);
}
.drinkcard-cc:hover{
    -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
       -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
            filter: brightness(1.2) grayscale(.5) opacity(.9);
}

/* Extras */
a:visited{color:#888}
a{color:#444;text-decoration:none;}
p{margin-bottom:.3em;}
* { font-family:monospace; }
.cc-selector-2 input{ margin: 5px 0 0 12px; }
.cc-selector-2 label{ margin-left: 7px; }
span.cc{ color:#6d84b4 }
</style>
<div class="header">
<p><a href="payment.php?logout='1'" style="color: red;">Log out</a></p>
	<h2>Payment Options</h2>
		<h2>Please select any one of the payment options</h2>
	</div>
	
    </head>

	<form action="payment.php" method="POST">
	<div class="input-group">
	<center><p>Select a card type:</p>
    <div class="cc-selector">
        VISA<input checked="checked" id="visa" type="radio" name="pay" value="visa" />
        <label class="drinkcard-cc visa" for="visa"></label>
        MasterCard<input id="mastercard" type="radio" name="pay" value="mastercard" />
		<label class="drinkcard-cc mastercard"for="mastercard"></label></div>
	<p>Or Pay with cash:</p>
	<div class="cc-selector">
			<input checked="checked" id="cash" type="radio" name="pay" value="cash" />
			<label class="drinkcard-cc cash" for="cash"></label>
	</div>
	</div>
	<div class="input-group">
			<center/><button type="submit" class="btn" name="confirm">Confirm Booking</button>
		</div>
	</form>
	</body>
	</html>
<?php
include('server.php');
error_reporting(0);
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
if($_SERVER["REQUEST_METHOD"]=="POST"){
$pay=$_POST['pay'];
}
$sql = "INSERT INTO `payment` VALUES ('$pay')";
$result = $db -> query($sql);
if(isset($_POST['confirm']))
{

     // Authorisation details.
	$username =  "gokulnug@gmail.com";
	$hash = "3397c3a9b4a447e3573dca2dc0593b123564d7c3ca3606e7918a12cb93620050";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers =  $_POST["number"]; // A single number or a comma-seperated list of numbers
	$message = "Hey there, thank you for booking with ROVER CABS. Your ride should be here in a few minutes. Please complete your payment with the driver.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	echo("$result");
	echo"<script type='text/javascript'>
	window.location = 'result.php';
   </script>";      
}
?>