<?php
function isSessionActive(){
    if(isset($_SESSION["userid"])){
        return true;
    }
    else{
        return false;
    }
}
?>