<?php
require_once('environment.php');
session_start();
$r = session_id();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title key="title">EasyCooking</title>
    <meta name="description" content="EasyCcooking is a website where you can lookup ingredients to find recipies and save them." />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta httpEquiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <link rel="apple-touch-icon" sizes="180x180" href="Resources/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Resources/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Resources/favicon-16x16.png">
    <link rel="manifest" href="Resources/site.webmanifest">
    <!-- Font of EasyCooking -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Zeyada&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="Resources/css/cookapp.css">
    <link rel="stylesheet" type="text/css" href="Resources/css/contact_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="topnav">
        <div class="topnav-centered">
            <a href="index.php">EasyCooking</a>
            <form action="search.php">
                <div class="searchInputContainer">
                    <i class="fa fa-fw fa-search"></i>
                    <?php if (isset($_GET["search"])) { ?>
                        <input class="searchInput" type="text" name="search" id="" placeholder="Search Ingredients" value="<?php echo htmlspecialchars($_GET["search"]); ?>">
                    <?php } else { ?>
                        <input class="searchInput" type="text" name="search" id="" placeholder="Search Ingredients">
                    <?php } ?>
                </div>
            </form>
        </div>
        <!--- Left-aligned links (default) -->
        <!--- Centered link -->
        <div class="topnav-right">
            <?php if (!isset($_SESSION['username'])) : ?>
                <a href="login.php">Log in</a>
                <a href="register.php">Sign Up</a>
            <?php else : ?>
                <a href="favorites.php"><i class="fa fa-heart"></i></a>
                <a href="profile.php"><i class="fa fa-fw fa-user"></i></a>
                <a href='?exit=true'><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            <?php endif; ?>
            <!--- <a href="./Resources/config/exitsession.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sign-Out</a>-->
        </div>
    </div>
    <style>
        .searchInputContainer {
            display: flex;
            background-color: #f2f2f2;
            width: 12rem;
            align-content: center;
            align-items: center;
            padding: 0.5rem 0.8rem;
            border-radius: 1rem;
        }

        .searchInputContainer i {
            margin-right: 0.6rem;
        }

        .searchInput {
            border: 0;
            background-color: #f2f2f200;
            border-radius: 1rem;
            width: 10rem;
        }

        .searchInput:focus {
            border: 0;
            outline: 0;
        }

        @media only screen and (max-width: 700px) {
            .topnav-centered {
                flex-flow: column;
                align-items: flex-start;
            }

            .topnav a,
            .topnav-right {
                display: flex;
                flex-flow: column;
                align-items: end;
            }

        }
    </style>
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