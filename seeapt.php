<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>See Today's appointments</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/appointment.css">
</head>
<body>
<?php
include("functions.php");
session_start();
initiate();
require_once("connect.php");
?>
<div class="form animy">
    <form action="getapt.php" method="GET" name="dateform">
        Date :
        <input type="date" name="day" id="day" required><br>
        <button type="submit">Show Appointments</button>
    </form>
</div>
</body>
</html>