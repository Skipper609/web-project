<?php
function initiate(){
    if(!isset($_SESSION["type"])){
        header("Location:login.php");
    }
    if($_SESSION["type"] == "d"){
        doctornav();
    }
    else{
        usernav();
    }
}
function doctornav(){
    echo '<div class="navBar">
        <ul>
            <li><a href="mainpage.php">Home</a></li>
            <li><a href="seeappointment.php">See Appointments</a></li>
            <li><a href="docreview.php">Reviews</a></li>
            <li><a href="previousapp.php">Previous Appointments</a></li>
            <li><a href="about.php">About</a></li>
            <li class="ri"><img src="'.$_SESSION["pic"].'"</li>
            <li class="ri">Hi '.$_SESSION["name"].'</li>
            <li style="float: right;">
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a>
            </li>
        </ul>
    </div>';
}

function usernav(){
    echo '<div class="navBar">
        <ul>
            <li><a href="mainpage.php">Home</a></li>
            <li><a href="selectdoctor.php">Book Appointment</a></li>
            <li><a href="seeappointment.php">See Appointment</a></li>
            <li><a href="about.php">About</a></li>
            <li class="ri"><img src="'.$_SESSION["pic"].'"</li>
            <li class="ri">Hi '.$_SESSION["name"].'</li>
            <li style="float: right;">
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a>
            </li>
        </ul>
    </div>';
}
?>