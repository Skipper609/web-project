<?php
    session_start();
    include("functions.php");
    require_once("connect.php");

    $uid= $_GET["uid"];
    $did = $_GET["did"];
    $day = $_GET["day"];
    $time = $_GET["time"];
    $query = "DELETE FROM `user_apt` WHERE `user_apt`.`u_id` = {$uid} AND `user_apt`.`d_id` = {$did} AND `user_apt`.`day` = '{$day}'";
    $res = mysqli_query($dbc, $query) or die("query died".$query);
    $query = "UPDATE `appointment` SET `{$time}` = NULL WHERE `appointment`.`date` = '{$day}' and `appointment`.`d_id`= {$did};";
    $res = mysqli_query($dbc, $query)  or die("query died".$query);
    header("Location:seeappointment.php");

?>