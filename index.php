<?php

include("functions.php");

if(isSessionActive()){
    header("Location: mainpage.php");
}
else{
    header("Location: login.php");
}

?>