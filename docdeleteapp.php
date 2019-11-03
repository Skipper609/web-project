<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Are You sure?</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/message.css">
</head>
<body>
    <?php
    include("functions.php");
    session_start();
    initiate();
    require_once("connect.php");

    $doc = $_SESSION["uid"];
    $day = $_SESSION["day"];
    echo "<div class='container'>";
    echo "<h1>It seems that some appointments has already been made.... <br>
    Are you sure want to cancel them?
    </h1>";

    $query = "select * from appointment where d_id = {$doc} and date = '{$day}'";
    $res = mysqli_query($dbc,$query);
    $row = mysqli_fetch_assoc($res);
    $times = array("nine","ten","eleven","twelve","two","three","four","five");
    foreach($times as $time){
        if($row[$time] != ''){
            $q = "select * from users where u_id = {$row[$time]}";
            $re = mysqli_query($dbc,$q);
            $r = mysqli_fetch_assoc($re);
            echo "<div class='person'>";
            echo "Name : {$r["name"]}<br>";
            echo "Phone No : {$r["phone"]}<br>";
            echo "</div>";
        }
    }
    echo "</div>";
?>

<button type="button" onclick="window.location.assign('mainpage.php')">No</button>
<button type="bitton" onclick="window.location.assign('success.php?delentry=yes')">Yes</button>

</body>
</html>