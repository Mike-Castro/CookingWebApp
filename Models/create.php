<?php
include("user.php");
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (
    isset($_POST['username']) && $_POST["username"] && isset($_POST['email'])
    && $_POST["email"] && isset($_POST['password']) && $_POST["password"]
    && isset($_POST['displayname']) && $_POST["displayname"]
) {

    $user = new User($conn);
    $user->setId($_POST['username']);
    $user->setName($_POST['displayname']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);

    $was_created = $user->create();

    if ($was_created) {
        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('success' => 0));
    }
} else {
    echo json_encode(array('success' => 0));;
}
