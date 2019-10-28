<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/appointment.css">
    <script src="js/appointment.js"></script>
    <title>Select Doctor</title>
</head>
<body>
<?php
session_start();

$day = $_GET["day"];
$_SESSION["day"] = $day; 
include("functions.php");
initiate();
require_once("connect.php");

$query = "SELECT u_id,name,phone,address from users u,doctor d where u.u_id = d.d_id";
$res = mysqli_query($dbc,$query);
echo "<div class='outer'>";
while($row = mysqli_fetch_assoc($res)){
    echo "<button class='docs' id='{$row["u_id"]}' onclick='toggle(this.id)'>";
    echo "Name : {$row["name"]}<br>";
    echo "Address : {$row["address"]}<br>";
    echo "Phone : {$row["phone"]}<br>";
    echo "</button>";
}
echo '<br><button type="button" class="btn" id="btn" onclick="senddoc()">Book Appointment</button>';
echo "</div>";
?>
</body>
</html>