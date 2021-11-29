<?php
require_once('Models/read.php');
include 'header.php';
?>

<link rel="stylesheet" type="text/css" href="./Resources/css/profile.css">
<style>
    .mycss {
        text-align: center;
        font-size: 20px;
    }

    .mycss2 {
        text-align: center;
        font-size: 30px;

    }
</style>
<?php
if (isset($_SESSION['username'])) {
    $user = getUser();
?>
    <p class='mycss2'>Username: <?php echo $user["username"] ?> </p>
    <p class='mycss2'>Email: <?php echo $user["email"] ?> </p>
    <p class='mycss2'>Name: <?php echo $user["displayname"] ?> </p>
<?php
} else {
    echo "<script> alert('Session not initialized...');window.location= 'index.php' </script>";
}
?>

<?php include 'footer.php'; ?>