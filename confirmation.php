<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmed</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/appointment.css">
</head>
<body>
    <?php
    session_start();

    $day = $_SESSION["day"];
    $doc = $_SESSION["doc_id"];
    $time = $_GET["time"];
    $user = $_SESSION["uid"];
    include("functions.php");
    initiate();
    require_once("connect.php");

    
    $que = "INSERT INTO `user_apt` (`u_id`, `d_id`, `day`, `time`) VALUES ('{$user}', '{$doc}', '{$day}', '$time')";
    $res = mysqli_query($dbc,$que);
    if($res != 1){
        echo "<h1 class='animy'> Ooops.....!! Looks like you already made an appointment on {$day}....try different day </h1>";
    }
    else{
        $query = "UPDATE `appointment` SET `{$time}` = '{$user}' WHERE `appointment`.`date` = '$day' and `appointment`.`d_id` = '{$doc}';";
    $res = mysqli_query($dbc, $query);
    if($res != 1){
        echo "<h1> Ooops.....!! Something went wrong </h1>";
    }
        echo "<h1> Appointment has been made</h1><br><div id='count'></div><br>";
    }
    ?>
    <script>
    var count = 5;
    var countdown = window.setInterval(function(){
        document.getElementById("count").innerHTML = "Redirecting To Home Page in "+count;
        count--;
        if(count == 0){
            window.location.assign("mainpage.php");
        }
    },1000);
    </script>
</body>
</html>