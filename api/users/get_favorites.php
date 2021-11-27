<?php
function getFavorites() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "test";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("No hay conexión: " . mysqli_connect_error());
    }

    $username = $_SESSION["username"];

    $query = "SELECT * FROM user_recipie WHERE username = '" . $username . "'";
    $result = $conn->query($query);

    $rows = [];
    foreach ($result as $row) {
        $rows[] = $row['recipie'];
    }

    return $rows;
}
