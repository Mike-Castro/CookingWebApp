<?php
function checkFavorite($recipie) {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "test";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("No hay conexión: " . mysqli_connect_error());
    }

    $username = $_SESSION["username"];

    $query = mysqli_query($conn, "SELECT * FROM user_recipie WHERE username = '" . $username . "' and recipie = '" . $recipie . "'");
    $nr = mysqli_num_rows($query);


    if ($nr == 1) {
        return true;
    } else if ($nr == 0) {
        return false;
    }
}
