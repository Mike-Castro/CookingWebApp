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

if ($_GET["name"] && $_GET["email"] && $_GET["isAdmin"]) {

    $user = new User($conn);
    $user->setName($_GET["name"]);
    $user->setEmail($_GET["email"]);
    $user->setIsAdmin($_GET["isAdmin"]);

    $was_created = $user->create();

    if ($was_created) {
        echo json_encode($user->toArray());
    } else {
        echo "Error while creating user";
    }
} else {
    echo "Parameters are missing";
}
