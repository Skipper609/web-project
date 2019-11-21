<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/seeappointment.css">
    <script src="js/cancelapp.js"></script>
    <title>See appointments</title>
</head>
<body>
<?php
session_start();
include("functions.php");
initiate();
require_once("connect.php");

$day = date("Y-m-d");
$uid = $_SESSION["uid"];

$query = "select * from user_apt where day > '{$day}' and u_id = {$uid}";
$res = mysqli_query($dbc, $query);
echo "<div class='outer animy'>";
echo "<h2>Future Appointments</h2>";
while($ro = mysqli_fetch_assoc($res)){
$qu = "SELECT u_id,name,phone,pic from users where u_id = {$ro["d_id"]}";
$re = mysqli_query($dbc, $qu);
$row = mysqli_fetch_assoc($re);
echo "<div class='inner animx'>";
echo "<img src='pics/{$row["pic"]}'>";
echo "Dr. Name : {$row["name"]}<br>";
echo "Phone : {$row["phone"]}<br>";
echo "Date : {$ro["day"]}<br>";
echo "Time :{$ro["time"]}";
echo "<button type='button' onclick='delthis({$uid},{$row["u_id"]},\"{$ro["day"]}\",\"{$ro["time"]}\")'>Delete Appointment</button>";
echo "</div>";
}
echo "</div>";


$query = "select * from user_apt where day <= '{$day}' and u_id = {$uid}";
$res = mysqli_query($dbc, $query);
echo "<div class='outer animy'>";
echo "<h2>Previous Appointments</h2>";
while($ro = mysqli_fetch_assoc($res)){
$qu = "SELECT u_id,name,phone,pic from users where u_id = {$ro["d_id"]}";
$re = mysqli_query($dbc, $qu);
$row = mysqli_fetch_assoc($re);
echo "<div class='inner animx'>";
echo "<img src='pics/{$row["pic"]}'>";
echo "Name : {$row["name"]}<br>";
echo "Phone : {$row["phone"]}<br>";
echo "Date : {$ro["day"]}<br>";
echo "Time :{$ro["time"]}";
echo "<button type='button' style='background-color: #66ff33;' onclick='window.location.assign(\"review.php?doc={$row["u_id"]}\")'>Write A Review</button>";
echo "</div>";
}

?>
</body>
</html>