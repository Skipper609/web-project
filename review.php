<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="fontawsome/css/all.css">
    <title>See appointments</title>
</head>
<style>
.login input{
    height:20px;
    font-size:20px;
    margin:20px;
}
.login{
    clear:both;
    font-size:20px;
    padding:10px;
    width: 25%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    text-align: center;
    margin: auto;
    padding: 20px,20px;
    background-color: black;
    color: white;
}
.st{
    padding:10px;
}
.login .cls{
    width:100px;
    height:30px;
}

</style>
<body>
<?php
session_start();
include("functions.php");
initiate();
require_once("connect.php");

if(isset($_GET["doc"])){
    $_SESSION["doc"] = $_GET["doc"];
}
if(isset($_GET["submit"])){
    $id = $_SESSION["uid"];
    $doc = $_SESSION["doc"];
    $rating = $_GET["stars"];
    $desc = $_GET["desc"];
    $query = "INSERT INTO `doctor_rating` (`u_id`, `d_id`, `rating`, `review`) VALUES ('{$id}', '{$doc}', '{$rating}', '{$desc}');";
    $res = mysqli_query($dbc,$query) or die("<script>"."alert('Duplicate Entry Found');"."window.location.assign('mainpage.php')"."</script>");
    if($res == 1){
        echo "<script>";
        echo "alert('Review added Successfully')";
        echo "window.location.assign('mainpage.php')";
        echo "</script>";
    }
    
}
?>
<div class="login">
    <form action="" method="GET">
        <div class="st">
            Rating: <br>
            <i class="fas fa-star" id="id1" onclick="updateStars(1)"></i>
            <i class="fas fa-star" id="id2" onclick="updateStars(2)"></i>
            <i class="fas fa-star" id="id3" onclick="updateStars(3)"></i>
            <i class="fas fa-star" id="id4" onclick="updateStars(4)"></i>
            <i class="fas fa-star" id="id5" onclick="updateStars(5)"></i>
        </div>
        <input type="text" name="stars" id="stars" style="display:none"><br>
        Description: <br>
        <textarea name="desc" id="desc" cols="30" rows="5"></textarea><br><br>
        <input type="submit" name="submit" value="Submit" class="cls" >
        <input type="reset" value="Reset" class="cls">
    </form>
</div>
<script>
updateStars(0);
function updateStars(id){
    for(var i=1;i<=id;i++){
        var st = document.getElementById("id"+i);
        st.style.color = "rgb(209, 209, 79)";
    }
    for(var i=5;i>id;i--){
        var st = document.getElementById("id"+i);
        st.style.color = "white";
    }
    document.getElementById("stars").value=id;
}
</script>

</body>
</html>