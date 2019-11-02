<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/common.css">
    <title>Have a day off</title>
</head>
<body>
<?php
include("functions.php");
session_start();
initiate();
require_once("connect.php");
$doc = $_SESSION["uid"];
$day = $_SESSION["day"];
if(isset($_GET["delentry"])){
    $query = "select * from appointment where d_id = {$doc} and date = '{$day}'";
    $res = mysqli_query($dbc,$query);
    $row = mysqli_fetch_assoc($res);
    $times = array("nine","ten","eleven","twelve","two","three","four","five");
    foreach($times as $time){
        if($row[$time] != ''){
            $q = "DELETE FROM `user_apt` WHERE `user_apt`.`u_id` = {$row[$time]} AND `user_apt`.`d_id` ={$doc} AND `user_apt`.`day` = '{$day}'";
            $re = mysqli_query($dbc,$q);
        }
    }
    $del =  "DELETE FROM `appointment` WHERE `appointment`.`d_id` = {$doc} AND `appointment`.`date` = '{$day}'";
    $suc = mysqli_query($dbc, $del) or die("Something went wrong".$del);
    unset($_SESSION["delentry"]);
}
echo "<h1>Nice.... Hope {$_SESSION["day"]} turn out to be great day!!!</h1>";
?>

</body>
</html>