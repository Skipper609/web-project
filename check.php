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
    $del =  "DELETE FROM `appointment` WHERE `appointment`.`d_id` = {$doc} AND `appointment`.`date` = '{$day}'";
    $suc = mysqli_query($dbc, $del) or die("Something went wrong".$del);
    if($suc == 1){
        header("Location:success.php");
    }
}else{
    
    header("location:docdeleteapp.php");
}
?>