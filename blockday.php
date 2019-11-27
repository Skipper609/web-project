<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Take a day off</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/appointment.css">
</head>
<body>
<?php
include("functions.php");
session_start();
initiate();
?>
<div class="form animy">
    <form action="check.php" method="GET" onsubmit="preventDefault();" name="dateform">
        Date :
        <input type="date" name="day" id="day" required><br>
        <button type="submit" onclick="validateDay()">Show Appointments</button>
    </form>
</div>
<script>
function validateDay(){
    var day = document.getElementById("day");
    var today = new Date();
    var d1 = new Date(day.value);
    if(today>d1){
        alert("Cannot block a day of past....please select a date of Future!!");
    }else{
        document.forms["dateform"].submit();
    }
}
</script>
</body>
</html>