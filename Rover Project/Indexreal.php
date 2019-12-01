<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
    $msg = "You must log in first";
	echo "<script type='text/javascript'>alert('$msg');</script>";  //Session for login and logout
    header('location: login.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);          //Destroy Session(Log-Out)
    header("location: login.php");
    exit;
  }
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<link rel="icon" href="../Images/rover.png">
<title>Rover cabs:Book cabs easily</title>
</head>

<body>
<!-- Navigation Bar -->
<ol>
<link rel="stylesheet" type="text/css" href="navbar.css">
<li><a class="active" href="indexreal.php">Home</a></li>            
<li><a href="#about.php">About</a></li>                           
</ol>
<script>$('#body').css('min-height', '100%');</script>
<br>
<p> <a href="indexreal.php?logout='1'" style="color: red;">Log out</a> </p> <!--Logout Button-->
<br>
<!--CSS-->
<style>
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
    h1{
      word-spacing: 15px;
    }
    h6{
      font-style: italic;
      color:gray;
    }  
    div.a{
      padding:20px;
      margin-top:30px;
      height:150px;
      font-size: 20px;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    div.b{
      padding:20px;
      margin-top:30px;
      height:120px;
      font-size: 20px;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    div.middle2{
      font-family:georgia;
	    margin:2px 5%;
	    padding: 20px;
      font-size:15px;
	    width:10%;
	    float:left;
	    opacity:1;
    }
    div.content{
	  font-family:georgia;
   	background-repeat:no-repeat;
    background-size: 100% 100%; 
	  margin:2% 2% 2px 0% ;
  	padding: 20px;
    width:97.4%;
  }
  .container {
    position: relative;
    width: 100%;
  }

  .image {
  align: center;
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
  }
 
  .middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
  }

  .container:hover .image {
  opacity: 0.3;
  }

  .container:hover .middle {
  opacity: 1;
  }

  .text {
  color: amber;
  font-size: 16px;
  padding: 16px 32px;
  }
  
  div.footer {
  position:relative;
  display: block;
  margin:30% 2% 2px 0% ;
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  background:  rgba(231, 201, 64, 0.979);  
	width:100%;
  }

</style>
<!--Header-->
<div class="a">
<h1 align="center">ROVER</h1>
<p style="color:gray;"><h5 align="center"><i>Booking Cabs is now easier!</p></i></div>
  
<!-- Slide Show -->
<div class="container">
<img class="image" src="http://www.loveinsurance.com/uploads/9/5/0/5/95055912/taxi-2_orig.jpg" style="width:100%" >
<div class="middle">
<div class="text" align="center">
<h2><b>Feeling left out? WE are there for you!</b></h2>
<h4>We offer cabs, outstation taxis, rentals and lot more.</h4></div>
<link rel='stylesheet' type='text/css' href='submit.css'/>
<a href="book.php">
<div id="orange" align="center"><br>Book Now</div>
</div>
</div>
</a>
  
<!-- Content -->

<h1 align="center">Why choose ROVER?</h1>
<div class="middle2">
<h2 align="left">Cheap:</h2>
<img src="https://image.freepik.com/vector-gratis/icono-de-dinero-en-efectivo-de-bolsa-verde-de-dibujos-animados_24877-12962.jpg" width=55%>
<p style="color:gray">We don't punch a hole in your wallet!</p>
</div>
<div class="middle2">
<h2 align="left">Secure and Safe:</h2>
<img src="https://cms-web.olacabs.com/00000000370.jpg" width=70%>
<p style="color:gray">Well trained drivers, live tracking, instant alert button and much more to make your journey safe.</p>
</div>
<div class="middle2">
<h2 align="left">Cashless:</h2>
<img src="https://www.brainmobi.com/blog/wp-content/uploads/2017/06/Why-Mobile-Payments-Adoption-Has-Been-Slow_v3.jpg" width=70%>
<p style="color:gray">Go cashless with ROVER DIGITAL.* Exciting offers available!**</p>
</div>
<div class="middle2">
<h2 align="left">In cab entertainment:</h2>
<img src="https://cms-web.olacabs.com/00000000371.jpg" width=70%>
<p style="color:gray">Onboard Wi-Fi and music of your choice.</p>
</div>

<!--Footer-->
<div class="footer">
<h4><p align="center"><b>Social Links</p></h4>
<center><a href="https://www.facebook.com" target="_blank"><img src="http://pngimg.com/uploads/facebook_logos/facebook_logos_PNG19751.png" style="width:3%"></a>
<a href="https://www.instagram.com" target="_blank"><img src="https://instagram-brand.com/wp-content/uploads/2016/11/app-icon2.png" style="width:2%"></a>
<a href="https://www.youtube.com" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/4/4c/YouTube_icon.png" style="width:3%"></a>
<a href="https://twitter.com" target="_blank"><img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/square-twitter-256.png" style="width:2%"></a></center>
<h4><p align="center"><font color="black"><b>Check out our mobile app</font></p></h4>
<center><a href="https://play.google.com" target="_blank"><img src="../Images/playstore.png" style="width:13%"></a>
<a href="https://itunes.apple.com" target="_blank"><img src="../Images/appstore.png" style="width:13%"></a>
<a href="https://www.microsoft.com/en-in/store" target="_blank"><img src="../Images/windowstore.png" style="width:13%"></a></center>
</div>		
</body>
</html>