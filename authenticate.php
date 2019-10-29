<?php
    session_start();
    $uname = $_GET["uname"];
    $pass = $_GET["pword"];

    require_once("connect.php");
    $query = "select * from users where name = '{$uname}' and pwd = '{$pass}'";
    $result = mysqli_query($dbc, $query) or die("query died ".$query);
    if($row=mysqli_fetch_assoc($result)){
        $_SESSION["name"] = $row["name"];
        $_SESSION["uid"] = $row["u_id"];
        $_SESSION["type"] = $row["type"];
        $_SESSION["pic"] = "pics/".$row["pic"];
        header("Location: mainpage.php");
    }
    else{
        $_SESSION["login_error"] = "Yeah";
        header("Location: login.php");
    }

?>