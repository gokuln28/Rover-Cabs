<?php include('server.php') ?>
<?php 
error_reporting(0); //PHP function. Set it to 0, so it does not report any errors
session_start();
$rate = 2;
$extra = 50;  //Variables used in calculating the taxi fare
$fix = 65;
$above = 110;
$next=55;
$min=3;
$cons = 4;
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
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">                  <!--Making the website easy to view in all devices-->
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="jquery-timepicker/jquery.timepicker.min.css">
    <script src="jquery-timepicker/jquery.timepicker.min.js"></script>                <!--JQuery timepicker-->
    <link rel="icon" href="C:/Users/Gokul/Desktop/College/RoverProject/Images/rover.png">
    <title>Rover cabs:Book cabs easily</title>
    <script>
    function validateForm() {
    var x = document.forms["book"]["start"].value;
    var y = document.forms["book"]["end"].value;
    var z = document.forms["book"]["number"].value;
    var q = document.forms["book"]["number"].value;
    var a = document.forms["book"]["avail"].value;
    if (x == "") {
        alert("Pickup location must be filled out");
        return false;
    }
    if (y == "") {
        alert("Drop location must be filled out");
        return false;
    }
    if (z == "") {
        alert("Mobile Number must be filled out");
        return false;
    }
    if (q.length!= 10) {
        alert("Mobile Number must be exactly 10-digits");
        return false;
    }
    if (a == "") {
        alert("Ride type must be filled out");
        return false;
    }
}

</script>
</head>
<style>
    body {
    margin-left: auto;
    margin-bottom:auto;
    margin-right: auto;
    background-image:url('https://c.pxhere.com/photos/c6/e5/city_taxi_public_transport_inside_drive_traffic_jam-734324.jpg!d');
  }
    input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
    input[type=date], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
    input[type=time], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
    input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

    div {
    border-radius: 5px;
    padding: 20px;
    padding:20px;
      margin-top:30px;
      height:150px;
      font-size: 20px;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
.input-group {
	margin: 10px 0px 10px 0px;
    text-align:center;
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
form, .content {
    float:center;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 10px 10px 10px 10px;
    width: 50%;
    margin: 0 auto;
}
div.middle2{
	    margin:1px 45% 25px 45%;
	    padding: 20px;
        clear:right;
	    width:60%;
	    opacity:1;
        position:absolute;
        top:37%;
        z-index:-1;
    }
</style>

<body  onLoad="initialize()">
<!-- Navigation -->
<ol>
    <link rel="stylesheet" type="text/css" href="navbar.css">
    <li><a href="indexreal.php">Home</a></li>
    <li><a class="active" href="#book">Book Now</a></li>
    <li><a href="about.php">About</a></li>
 </ol>
 <br>
<p> <a href="book.php?logout='1'" style="color: red;">Log out</a> </p>
<br>
<div style="padding:20px;margin-top:30px;height:110px;">
<h1 align="center">Book your cabs now</h1>
<h3 align="center" style="color:gray">Please fill out all the fields</h3>
</div>
<div id="map_canvas" style="width: 1477px; height: 375px;"></div>
<div>
<form method="POST" action="book.php" onsubmit="return validateForm()" name="book">
        Name<input type="text" name="name" placeholder="Enter your name.." required>
        <label align>Select journey type</label>
        <select id="type" name="type" onChange="disable();">
          <option disabled selected value>Select an option</option>
          <option value="Outstation">Outstation</option>
          <option value="Riding Now">Ride Now</option>
        </select>
        <script type="text/javascript">
           function disable()
              {
                if (document.getElementById("type").value == "Riding Now") {
                 document.getElementById("time").disabled='true';  //Function to diasable Date and Time field when user opts Ride-Now option
                 document.getElementById("date").disabled='true';
                } 
                else {
                 document.getElementById("time").disabled='';
                 document.getElementById("date").disabled='';
                }
              }
        </script>
                    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOnuZB4jqxpf9PptGR_oKHDKBPQGkQogI&sensor=false&libraries=places"></script><!--Script to invoke Google Maps API with API Key-->
    <script type="text/javascript">
        //<![CDATA[
          var map = null;
          var directionDisplay;
          var directionsService = new google.maps.DirectionsService();

          function initialize() {
            directionsDisplay = new google.maps.DirectionsRenderer();

            var Australia = new google.maps.LatLng(13.08784, 80.27847); //Latitude and Longitude of Chennai, so that the maps shows Chennai to user on first load(Variable name Australia)

            var mapOptions = {  
                        center              : Australia,
                        zoom                : 4,
                        minZoom             : 3,
                        streetViewControl   : false,
                        mapTypeId           : google.maps.MapTypeId.ROADMAP,
                        zoomControlOptions  : {style:google.maps.ZoomControlStyle.MEDIUM}
                    };


            map = new google.maps.Map(document.getElementById('map_canvas'),  //Function to load map
                mapOptions);

             //Find From location    
        var fromText = document.getElementById('start');
        var fromAuto = new google.maps.places.Autocomplete(fromText);
        fromAuto.bindTo('bounds', map);
        //Find To location
        var toText = document.getElementById('end');
        var toAuto = new google.maps.places.Autocomplete(toText);
        toAuto.bindTo('bounds', map);
        //  
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('directions-panel'));

            /*var control = document.getElementById('control');
            control.style.display = 'block';
            map.controls[google.maps.ControlPosition.TOP].push(control);*/
          }

          function calcRoute() {
            var start = document.getElementById('start').value;
            var end = document.getElementById('end').value;
            var request = {                         //Function to calculate the route b/w two points
              origin: start,
              destination: end,
              travelMode: google.maps.DirectionsTravelMode.DRIVING
            };
            directionsService.route(request, function(response, status) {
              if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                computeTotalDistance(response);          
              }
            });                                                //Distance calculator
          }
          function computeTotalDistance(result) {
          var total = 0;
          var myroute = result.routes[0];
          for (i = 0; i < myroute.legs.length; i++) {
            total += myroute.legs[i].distance.value;
          }
          total = total / 1000;
          //Start Calculating Distance Fare
              if (10>total){
              var cost = <?php echo $fix; ?>;
              }
              else if (10<total && 20>total)
                {
                var cost = ((total * <?php echo $rate; ?>) + (<?php echo $extra; ?>));
                }
                else if (20<total && 30>total)
                {
                    var cost = ((total * <?php echo $rate; ?>) + (<?php echo $next; ?>));
                }
                else if (30<total && 50>total)
                {
                    var cost = (((total - 30) * <?php echo $cons; ?>) + (<?php echo $above; ?>));
                }
                else
                {
                    var cost = (((total - 50) * <?php echo $min; ?>) + 130);
                }

              var fare = cost * 0.11 + cost;
              var fare = Math.round(fare*100)/100;
          //Distance Fare Calculation Ends

          document.getElementById("total").innerHTML = "Total Distance = " + total + " km <br/> Fare = Rs." + fare; //Prints fare and distance in divide tag with id as total
          
          }

        function auto() {
        var input = document.getElementById[('start'), ('end')];
        var types
        var options = {
           types: [],
           componentRestrictions: {country: ["AUS"]}  //Autocomplete location function
            };
            var autocomplete = new google.maps.places.Autocomplete(input, options);
         }

          google.maps.event.addDomListener(window, 'load', initialize);
        </script>
   
                  From:
                    <input type="text" id="start" size="60px" name="start" placeholder="Enter Pickup">
                    <br />
                    To:
                    <input size="60px" type="text" id="end" name="end" placeholder="Enter Destination ">
                    <div class="input-group">
                    <button class="btn" onClick="calcRoute();">Check Fare</button></div>
                 <div id="total">
                 </div>

        <label>Select available rides</label>
        <select id="avail" name="avail">
          <option disabled selected value> -- select an option -- </option>
          <option value="Hatchback">Hatchback</option>
          <option value="Sedan">Sedan</option>
          <option value="SUV">SUV</option>
          <option value="Luxury">Luxury</option>
          <option value="Auto">Auto</option>
        </select>
        Date of Journey<input type="date" name="date" id="date" placeholder="Enter date..">
        <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("date")[0].setAttribute('min', today);</script> <!--Script to select only current and future dates-->
        Time of Journey
        <input type="text" id="time" name="time" placeholder="Enter time.."/>
        <script>
           $(document).ready(function(){
           $('#time').timepicker({ 'timeFormat': 'H:i:s' });  //JQuery timepicker function
           });
        </script>
        Mobile Number<input type="number" name="number" placeholder="Enter Mobile Number..">
        <div class="input-group">
			<button type="submit" class="btn" name="submit">Proceed to Payment</button>
		</div>
</form> 
</div>

</body>
</html>
<!--PHP-->
<?php
$name=$type=$start=$end=$avail=$date=$time=$number="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $type = $_POST["type"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    $avail = $_POST["avail"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $number = $_POST["number"];
}
$date = date('Y-m-d H:i:s');
$sql = "INSERT INTO `book`(`name`,`type`, `start`, `end`, `avail`, `date`, `time`, `number`) VALUES ('$name','$type','$start','$end','$avail','$date','$time','$number')";
$result = $db -> query($sql);
if (isset($_POST['submit']))
{   
  
    echo"<script type='text/javascript'>
   window.location = 'payment.php';
   </script>";      
}
?>