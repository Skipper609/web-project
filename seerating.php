<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctors Ratings</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/appointment.css">
    <link rel="stylesheet" href="fontawsome/css/all.css">
    <link rel="stylesheet" href="css/rating.css">
</head>
<body>
<?php
session_start();
include("functions.php");
initiate();
require_once("connect.php");

$id = $_GET["id"];
$query = "SELECT u_id,name,phone,address,description from users u,doctor d where u.u_id = d.d_id and u.u_id={$id}";
$res = mysqli_query($dbc,$query);
$row = mysqli_fetch_assoc($res);
echo "<div class='doc animx'>";
echo "Name : {$row["name"]}<br>";
    echo "Address : {$row["address"]}<br>";
    echo "Phone : {$row["phone"]}<br>";
    echo "Description : {$row["description"]}<br><br>";
    $q = "select avg(rating) as ra from doctor_rating where d_id={$id}";
    $r = mysqli_query($dbc, $q);
    $rating = mysqli_fetch_assoc($r);
    for($i=1;$i<=$rating["ra"];$i++){
       echo '<i class="fas fa-star yel"></i>';
    }
    for($i=5;$i>$rating["ra"];$i--){
        echo '<i class="fas fa-star"></i>';
     }
     echo "  ".$rating["ra"];
     echo "</div>";
     echo "<div class='rating'>";
     $quer = "select * from doctor_rating where d_id={$id}";
     $re = mysqli_query($dbc,$quer);
     echo "<h2>User Reviews</h2>";
     while($row =mysqli_fetch_assoc($re)){
         echo "<div class='review'>";
         $query2 = "select * from users where u_id = {$row["u_id"]}";
         $result = mysqli_query($dbc, $query2);
         $r = mysqli_fetch_assoc($result);
         echo "<div class='name'>".$r["name"]."</div><br><div class='stars'>";
         for($i=1;$i<=$row["rating"];$i++){
            echo '<i class="fas fa-star yel"></i>';
         }
         for($i=5;$i>$row["rating"];$i--){
             echo '<i class="fas fa-star"></i>';
        }
        echo "</div><br><div class='dis'>{$row["review"]}</div></div>";
     }
     echo '<div>';
?>
</body>
</html>