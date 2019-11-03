<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/message.css">
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
    if(mysqli_num_rows($res) == 0){
        $q = "INSERT INTO `appointment` (`d_id`, `date`, `nine`, `ten`, `eleven`, `twelve`, `two`, `three`, `four`, `five`) VALUES ('{$doc}', '{$day}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
        mysqli_query($dbc,$q);
    }
    $times = array("nine","ten","eleven","twelve","two","three","four","five");
    foreach($times as $time){
        if($row[$time] != ''){
            $q = "DELETE FROM `user_apt` WHERE `user_apt`.`u_id` = {$row[$time]} AND `user_apt`.`d_id` ={$doc} AND `user_apt`.`day` = '{$day}'";
            $re = mysqli_query($dbc,$q);
        }
    }
    $q = "UPDATE `appointment` SET `nine` = '0', `ten` = '0', `eleven` = '0', `twelve` = '0', `two` = '0', `three` = '0', `four` = '0', `five` = '0' WHERE `appointment`.`d_id` = {$doc} AND `appointment`.`date` = '{$day}';";
    mysqli_query($dbc,$q) or die("Error");
    $res = mysqli_query($dbc,$query) or die("Query dead");
    unset($_SESSION["delentry"]);
}
echo "<h1>Nice.... Hope {$_SESSION["day"]} turn out to be great day!!!</h1>";
?>

</body>
</html>