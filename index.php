<?php include 'header.php'; ?>

<hr class="hr1">

<!--- ---------Testing Sessions----------- -->
<style>
    .mycss {
        font-family: 'Zeyada', cursive;
        color: red;
        text-align: center;
        font-size: 35px;

    }

    .mycss2 {
        font-family: 'Zeyada', cursive;

        text-align: center;
        font-size: 35px;

    }
</style>
<?php
if (isset($_SESSION['username']))
    echo "<p class='mycss2'>{$_SESSION['username']}</p>";
//echo "<p class='mycss'>Welcome</p>;<p class='mycss'>Welcome {$_SESSION['username']}</p>";
else
    echo "<p class='mycss'> Not logged in!...</p>";

?>
<?php include 'footer.php'; ?>