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

require_once("connect.php");
?>
<div class="form">
    <form action="selectdoctor.php" method="GET">
        Date :
        <input type="date" name="day" required><br>
        <!-- Doctor : <select name="doctor" id="doctor">
            <?php
        // $query = "SELECT * FROM `users` WHERE type = 'd'";
        // $res = mysqli_query($dbc, $query);
        // while($row = mysqli_fetch_assoc($res)){
        //     echo "<option value='{$row["u_id"]}'>{$row["name"]}</option>";
        // }
        ?> -->
    </select>
    <button type="submit">Search</button>
</form>
</div>
    
</body>
</html>



