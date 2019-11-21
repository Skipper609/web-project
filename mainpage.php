<?php
session_start();
include("functions.php");
initiate();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/slides.css">
    <link rel="stylesheet" href="fontawsome/css/all.css">
    
</head>

<body>
    <div class="content animx">
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
        <img src="pics/slide1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
        <img src="pics/slide2.jpg" style="width:100%">

        </div>

        <div class="mySlides fade">
        <img src="pics/slide3.jpg" style="width:100%">
        </div>
        </div>
        <br>
    </div>
    <div class="review animx">
        <p> Customer's Review </p>
        <ul>
            <li>
                <div class="card">
                    <div class="container">
                        <p class="bigger">John Wick</p>
                        <p>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                        </p>
                        <p class="small">This website really helped me with my depression. Thank you:)</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="card">
                    <div class="container">
                            <p class="bigger">Morgan Freeman</p>
                        <p>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="far fa-star"></i>
                        </p>
                        <p class="small">Amazing website. I wish I knew about this before. Thank you</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="card">
                    <div class="container">
                            <p class="bigger">John Stanford</p>
                        <p>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="far fa-star"></i>
                        </p>
                        <p class="small">Amazing service and fast Customer service. Will recommend for someone.</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="review animx">
        <p> Doctor's Reviews </p>
        <ul>
            <li>
                <div class="card">
                    <div class="container">
                            <p class="bigger">Dr. John Doe</p>
                        <p>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                        </p>
                        <p class="small">This Website has been really helpful in connecting with patients</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="card">
                    <div class="container">
                            <p class="bigger">Dr.Peter</p>
                        <p>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                        </p>
                        <p class="small">Its amezing how incredibally responsive this website is</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="card">
                    <div class="container">
                            <p class="bigger">Dr. Stewart</p>
                        <p>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="fas fa-star yel"></i>
                            <i class="far fa-star"></i>
                        </p>
                        <p class="small">This made my days easy and better</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</body>
<script src="js/slide.js"></script>
</html>