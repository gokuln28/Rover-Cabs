<?php include('server.php') 
$type=$start=$end=$avail=$date=$time=$number="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $type = test_input($_POST["type"]);
    $start = test_input($_POST["start"]);
    $end = test_input($_POST["end"]);
    $avail = test_input($_POST["avail"]);
    $date = test_input($_POST["date"]);
    $time = test_input($_POST["time"]);
    $number = test_input($_POST["number"]);
}
$sql = "INSERT INTO `book`(`type`, `start`, `end`, `avail`, `date`, `time`, `number`) VALUES ('$type','$start','$end','$avail','$date','$time','$number')";
$result = $mysqli -> query($sql);
if($result)
{
 echo "Your booking has been confirmed. OTP has been sent to your mobile. Show it to the driver when asked.";
}