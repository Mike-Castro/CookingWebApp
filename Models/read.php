<?php
function getUser() {
    include("user.php");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_SESSION['username'])) {

        $user = new User($conn);
        $user->setId($_SESSION['username']);

        $was_read = $user->readOne();

        if ($was_read) {
            return $user->toArray();
        } else {
            return array('success' => 0);
        }
    } else {
        return array('success' => 0);
    }
}
