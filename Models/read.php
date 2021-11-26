<?php
include("user.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LAB06";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_GET["id"]) {

    $user = new User($conn);
    $user->setId($_GET["id"]);

    $was_read = $user->readOne();

    if ($was_read) {
        echo json_encode($user->toArray());
    } else {
        echo "Error while reading user";
    }
} else {
    echo "Parameters are missing";
}
