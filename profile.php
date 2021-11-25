<?php
    session_start();
    $r=session_id();
?>
<!DOCTYPE html>
<html lang="en">
<body>
    
    <head>
        <title>EasyCooking</title>
        <meta charset="utf-8" />
        <!-- Font of EasyCooking -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Zeyada&display=swap'); 
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="./Resources/css/cookapp.css">
        <link rel="stylesheet" type="text/css" href=".Resources/css/contact_style.css">
        <link rel="stylesheet" type="text/css" href="./Resources/css/profile.css">
    </head>

    <div class="topnav">

        <!--- Left-aligned links (default) -->
        <a href="search.html"><i class="fa fa-fw fa-search"></i>Search</a>

        <!--- Centered link -->
        <div class="topnav-centered">
            <a href="index.php" class="active">EasyCooking</a>
        </div>

        <div class="topnav-right">
            <a href="login.html">Log in</a>
            <a href="signup.html">Sign Up</a>
            <a href="profile.html"><i class="fa fa-fw fa-user"></i></a>
            <!--- <a href="./Resources/config/exitsession.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sign-Out</a>-->
            <a href='index.php?exit=true'><i class="fa fa-sign-out" aria-hidden="true"></i>Sign-Out</a>
        </div>
    </div>

    <hr class="hr1">

    <style>
        .mycss{
        font-family: 'Permanent Marker', cursive;

        text-align: center;
        font-size: 20px;

        }
        .mycss2{
        font-family: 'Permanent Marker', cursive;

        text-align: center;
        font-size: 30px;

        }

    </style>
    <?php
        echo "<p class='mycss'>Welcome: </p>";
        if(isset($_SESSION['username']))
            echo "<p class='mycss2'>{$_SESSION['username']}</p>";
            //echo "<p class='mycss'>Welcome</p>;<p class='mycss'>Welcome {$_SESSION['username']}</p>";
        else
            echo "<script> alert('Session not initialized...');window.location= 'index.php' </script>";

    ?>

    <div class="container">
        <button class="button button1">My Info</button>
        <button class="button button2">Change Password</button>
    </div>
    

    <div class="navbar">
        <a href="about-us.html">About us</a>
        <a href="contact.html">Contact us</a>
        <a href="faq.html">FAQ</a>
    </div>

    <script type="text/javascript" src="cookapp.js"></script>
</body>
</html>