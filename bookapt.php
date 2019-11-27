<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/appointment.css">
</head>
<body>
<?php
include("functions.php");
session_start();
initiate();
$_SESSION["doc_id"] = $_GET["id"];
require_once("connect.php");
?>
<div class="form animy">
    <form action="getappointment.php" method="GET" name="dateform">
        Date :
        <input type="date" name="day" id="day" required><br>
    <button type="button" onclick="validateName();">Search</button>
</form>
<script>
function validateName(){
    var day = document.getElementById("day");
    var today = new Date();
    var d1 = new Date(day.value);
    if(today>d1){
        alert("Cant make appointment in past .... Please select a date of Future!!!");
    }else{
        document.forms["dateform"].submit();
    }
}
</script>
</div>
    
</body>
</html>



