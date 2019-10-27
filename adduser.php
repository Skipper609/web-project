<?php 
session_start();

$name = $_GET["uname"];
$pword = $_GET["pword"];
$phno = $_GET["phno"];

if(isset($_GET["address"])){
    $addres = $_GET["address"];
    $desc = $_GET["description"];
    $doc = true;
}

require_once("connect.php");

if(isset($doc)){
    $query = "INSERT INTO `users` (`u_id`, `name`, `pwd`, `phone`, `type`) VALUES (NULL, '{$name}', '{$pword}', '{$phno}', 'd');";
    $row = mysqli_query($dbc, $query) or die("Query fucked --> ".$query);
    print_r($row);
    $query1 = "select * from users where name = '{$name}'";
    $res = mysqli_query($dbc, $query1) or die("Query fucked --> ".$query1);
    $row = mysqli_fetch_assoc($res);
    $query2 = "INSERT INTO `doctor` (`d_id`, `address`, `description`) VALUES ('{$row["u_id"]}', '{$addres}', '{$desc}');";
    $row = mysqli_query($dbc, $query2) or die("Query fucked --> ".$query2);
    print_r($row);
}
else{
    $query = "INSERT INTO `users` (`u_id`, `name`, `pwd`, `phone`, `type`) VALUES (NULL, '{$name}', '{$pword}', '{$phno}', 'p');";
    $row = mysqli_query($dbc, $query) or die("Query fucked --> ".$query);
    print_r($row);
}

if($row == 1){
    if(isset($_SESSION["login_error"])){
        unset($_SESSION["login_error"]);
    }
    header("Location: login.php");
}

?>