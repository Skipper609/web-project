<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/appointment.css">
    <script src="js/appointment.js"></script>
    <link rel="stylesheet" href="fontawsome/css/all.css">
    <title>Select Doctor</title>
</head>
<body>
<?php
session_start();
include("functions.php");
initiate();
require_once("connect.php");

$query = "SELECT u_id,name,phone,address,pic from users u,doctor d where u.u_id = d.d_id";
$res = mysqli_query($dbc,$query);
echo "<div class='outer animx'>";
while($row = mysqli_fetch_assoc($res)){
    echo "<div class='inner'>";
    echo "<img src='pics/{$row["pic"]}'>";
    echo "Name : {$row["name"]}<br>";
    echo "Address : {$row["address"]}<br>";
    echo "Phone : {$row["phone"]}<br><br>";
    $q = "select avg(rating) as ra from doctor_rating where d_id = {$row["u_id"]}";
    $r = mysqli_query($dbc, $q);
    $rating = mysqli_fetch_assoc($r);
    for($i=1;$i<=$rating["ra"];$i++){
       echo '<i class="fas fa-star yel"></i>';
    }
    for($i=5;$i>$rating["ra"];$i--){
        echo '<i class="fas fa-star"></i>';
     }
     echo "  ".$rating["ra"];
    echo "<button class='docs' onclick='window.location.assign(\"seerating.php?id={$row["u_id"]}\");'>See Reviews";
    echo "</button>";
    echo "<button class='docs' id='{$row["u_id"]}' onclick='window.location.assign(\"bookapt.php?id={$row["u_id"]}\");'>Book Appointment";
    echo "</button></div>";
}
echo "</div>";
?>
</body>
</html>