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

    if (!$was_read) {
        die("Reading failed ");
    }

    $was_updated = $user->delete();

    if ($was_updated) {
        echo json_encode($user->toArray());
        echo "User deleted";
    } else {
        echo "Error while updating user";
    }
} else {
    echo "Parameters are missing";
}
