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
            <a href="profile.php"><i class="fa fa-fw fa-user"></i></a>
            <!--- <a href="./Resources/config/exitsession.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sign-Out</a>-->
            <a href='index.php?exit=true'><i class="fa fa-sign-out" aria-hidden="true"></i>Sign-Out</a>
        </div>
    </div>

    <?php
        function signout() {
            session_unset();
            session_destroy();
            echo "<script> alert('Goodbye!! See U Soon!');window.location= 'http://localhost/daw/CookingWebApp-main/index.php' </script>";
        }

        if (isset($_GET['exit'])) {
            signout();
        }
    ?>

    <hr class="hr1">
    
    <!--- ---------Testing Sessions----------- -->
    <style>
        .mycss{
        font-family: 'Zeyada', cursive;
        color: red;    
        text-align: center;
        font-size: 35px;

        }
        .mycss2{
        font-family: 'Zeyada', cursive;

        text-align: center;
        font-size: 35px;

        }

    </style>
    <?php
        if(isset($_SESSION['username']))
            echo "<p class='mycss2'>{$_SESSION['username']}</p>";
            //echo "<p class='mycss'>Welcome</p>;<p class='mycss'>Welcome {$_SESSION['username']}</p>";
        else
            echo "<p class='mycss'> Not logged in!...</p>";

    ?>
    <!--- ------------------------------------- -->
    <div class="navbar">
        <a href="about-us.html">About us</a>
        <a href="contact.html">Contact us</a>
        <a href="faq.html">FAQ</a>
    </div>

    <script type="text/javascript" src="cookapp.js"></script>
</body>
</html>