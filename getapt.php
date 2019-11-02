<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Appointments</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/appointment.css">
    <script src="js/appointment.js"></script>
</head>
<body>
<?php
include("functions.php");
session_start();
initiate();
require_once("connect.php");


$day = $_GET["day"];
$doc = $_SESSION["uid"];
$_SESSION["day"] = $day;


$query = "select * from appointment where d_id = {$doc} and date = '{$day}'";
$res = mysqli_query($dbc,$query) or die("Query dead");
if(mysqli_num_rows($res)==0){
    $q = "INSERT INTO `appointment` (`d_id`, `date`, `nine`, `ten`, `eleven`, `twelve`, `two`, `three`, `four`, `five`) VALUES ('{$doc}', '{$day}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
    mysqli_query($dbc,$q);
    $res = mysqli_query($dbc,$query) or die("Query dead");
}

function generateButton($text, $value, $id){
    if($value != ''){
       //echo "<div class='avail'>";
        echo "<button type='button' onclick='show(\"{$id}\")'>";
    }
    else{
        //echo "<div class='disable'>";
        echo "<button type='button' disabled>";
    }
    
    echo $text."</button>";
}
function showInfo($dbc,$userid,$id){
    if($userid != ""){

        $user = "SELECT * from users where u_id = {$userid}";
        $result = mysqli_query($dbc,$user) or die ($user);
        $info = mysqli_fetch_assoc($result);
        echo "<div class='info' id='{$id}' style='display:none'>";
        echo "Name : {$info['name']}<br>";
        echo "Phone No : {$info["phone"]}";
        echo "</div>";
    }
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

showInfo($dbc,$row["nine"],"nine");
showInfo($dbc,$row["ten"],"ten");
showInfo($dbc,$row["eleven"],"eleven");
showInfo($dbc,$row["twelve"],"twelve");
showInfo($dbc,$row["two"],"two");
showInfo($dbc,$row["three"],"three");
showInfo($dbc,$row["four"],"four");
showInfo($dbc,$row["five"],"five");
echo "</div>";
?>
</body>
</html>