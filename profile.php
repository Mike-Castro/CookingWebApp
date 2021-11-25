<?php include 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="./Resources/css/profile.css">
<hr class="hr1">
<style>
    .mycss {
        font-family: 'Permanent Marker', cursive;

        text-align: center;
        font-size: 20px;

    }

    .mycss2 {
        font-family: 'Permanent Marker', cursive;

        text-align: center;
        font-size: 30px;

    }
</style>
<?php
echo "<p class='mycss'>Welcome: </p>";
if (isset($_SESSION['username']))
    echo "<p class='mycss2'>{$_SESSION['username']}</p>";
//echo "<p class='mycss'>Welcome</p>;<p class='mycss'>Welcome {$_SESSION['username']}</p>";
else
    echo "<script> alert('Session not initialized...');window.location= 'index.php' </script>";

?>

<div class="container">
    <button class="button button1">My Info</button>
    <a class="button button2" href="reset.php">Change Password</a>
</div>


<?php include 'footer.php'; ?>