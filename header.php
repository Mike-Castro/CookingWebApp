<?php
session_start();
$r = session_id();
?>
<!DOCTYPE html>
<html lang="en">

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

<body>

    <div class="topnav">

        <!--- Left-aligned links (default) -->
        <a href="search.html"><i class="fa fa-fw fa-search"></i>Search</a>

        <!--- Centered link -->
        <div class="topnav-centered">
            <a href="index.php" class="active">EasyCooking</a>
        </div>

        <div class="topnav-right">
            <?php if (!isset($_SESSION['username'])) : ?>
                <a href="login.php">Log in</a>
                <a href="register.php">Sign Up</a>
            <?php else : ?>
                <a href="profile.php"><i class="fa fa-fw fa-user"></i></a>
                <a href='?exit=true'><i class="fa fa-sign-out" aria-hidden="true"></i>Sign-Out</a>
            <?php endif; ?>
            <!--- <a href="./Resources/config/exitsession.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sign-Out</a>-->
        </div>
    </div>

    <?php
    function signout() {
        session_unset();
        session_destroy();
        echo "<script> alert('Goodbye!! See U Soon!');window.location= 'index.php' </script>";
    }

    if (isset($_GET['exit'])) {
        signout();
    }
    ?>