<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select time</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/appointment.css">
    <script src="js/appointment.js"></script>
</head>
<body>
<?php
session_start();

$day = $_GET["day"];
$doc = $_SESSION["doc_id"];
$_SESSION["day"] = $day;
include("functions.php");
initiate();
require_once("connect.php");

$query = "select * from appointment where d_id = {$doc} and date = '{$day}'";
$res = mysqli_query($dbc,$query) or die("Query dead");
if(mysqli_num_rows($res)==0){
    $q = "INSERT INTO `appointment` (`d_id`, `date`, `nine`, `ten`, `eleven`, `twelve`, `two`, `three`, `four`, `five`) VALUES ('{$doc}', '{$day}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
    mysqli_query($dbc,$q);
    $res = mysqli_query($dbc,$query) or die("Query dead");
}

function generateButton($text, $value, $id){
    if($value == ''){
       //echo "<div class='avail'>";
        echo "<button type='button' id='{$id}' onclick='toggle(this.id)'>";
    }
    else{
        //echo "<div class='disable'>";
        echo "<button type='button' disabled>";
    }
    
    echo $text."</button>";
}
$q = "SELECT * from users where u_id = {$doc}";
$r = mysqli_query($dbc,$q);
$re = mysqli_fetch_assoc($r);
echo "<div class='schedule animy'>";
echo "Doctor Name : {$re["name"]}<br>Phone Number: {$re["phone"]}<br>";
$q = "SELECT * from doctor where d_id = {$doc}";
$r = mysqli_query($dbc,$q);
$re = mysqli_fetch_assoc($r);
echo "Address : {$re["address"]}<br>";
$row = mysqli_fetch_assoc($res);
generateButton("Nine<br>(9:00 AM)",$row["nine"],"nine");
generateButton("Ten<br>(10:00 AM)",$row["ten"],"ten");
generateButton("Eleven<br>(11:00 AM)",$row["eleven"],"eleven");
generateButton("Twelve<br>(12:00 PM)",$row["twelve"],"twelve");
generateButton("Two<br>(2:00 PM)",$row["two"],"two");
generateButton("Three<br>(3:00 PM)",$row["three"],"three");
generateButton("Four<br>(4:00 PM)",$row["four"],"four");
generateButton("Five<br>(5:00 PM)",$row["five"],"five");
echo '<br><button type="button" class="btn" id="btn" onclick="sendtime()">Book Appointment</button>';
echo "</div>";
?>

    
</body>
</html>