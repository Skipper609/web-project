<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmed</title>
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

    $query = "UPDATE `appointment` SET `{$time}` = '{$user}' WHERE `appointment`.`date` = '$day' and `appointment`.`d_id` = '{$doc}';";
    $res = mysqli_query($dbc, $query);
    if($res != 1){
        echo "<h1> Ooops.....!! Something went wrong </h1>";
    }
    else{
        echo "<h1> Appointment has been made</h1>";
    }
    ?>
</body>
</html>