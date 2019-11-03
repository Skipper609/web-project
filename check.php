<?php
session_start();

$day = $_GET["day"];
$_SESSION["day"] = $day;
$doc = $_SESSION["uid"];
require_once("connect.php");

$times = array("nine","ten","eleven","twelve","two","three","four","five");

$query = "select * from appointment where d_id = {$doc} and date = '{$day}'";
$res = mysqli_query($dbc,$query);
$row = mysqli_fetch_assoc($res);

$flag = true;
foreach($times as $time){
    
    if(!$row[$time]==''){
        $flag = false;
    }
}
if($flag == true){
    $q = "INSERT INTO `appointment` (`d_id`, `date`, `nine`, `ten`, `eleven`, `twelve`, `two`, `three`, `four`, `five`) VALUES ('{$doc}', '{$day}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
    mysqli_query($dbc,$q);
    $q = "UPDATE `appointment` SET `nine` = '0', `ten` = '0', `eleven` = '0', `twelve` = '0', `two` = '0', `three` = '0', `four` = '0', `five` = '0' WHERE `appointment`.`d_id` = {$doc} AND `appointment`.`date` = '{$day}';";
    $suc = mysqli_query($dbc,$q) or die("Error");
    if($suc == 1){
        header("Location:success.php");
    }
}else{
    
    header("location:docdeleteapp.php");
}
?>