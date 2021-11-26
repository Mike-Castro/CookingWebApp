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

if ($_POST["id"] && $_POST["name"] && $_POST["email"] && $_POST["isAdmin"]) {

    $user = new User($conn);
    $user->setId($_POST["id"]);
    $user->setName($_POST["name"]);
    $user->setEmail($_POST["email"]);
    $user->setIsAdmin($_POST["isAdmin"]);

    $was_updated = $user->update();

    if ($was_updated) {
        echo json_encode($user->toArray());
    } else {
        echo "Error while updating user";
    }
} else {
    echo "Parameters are missing";
}
