<?php
if (isset($_POST['txtpassword0']) && $_POST['txtpassword0'] && isset($_POST['txtpassword1']) && $_POST['txtpassword1']  && isset($_POST['txtpassword2']) && $_POST['txtpassword2']) {

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "test";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("No hay conexión: " . mysqli_connect_error());
    }
    session_start();
    $username = $_SESSION["username"];
    $pass0 = $_POST["txtpassword0"];
    $pass1 = $_POST["txtpassword1"];
    $pass2 = $_POST["txtpassword2"];

    $query = mysqli_query($conn, "SELECT * FROM register WHERE username = '" . $username . "' and password = '" . $pass0 . "'");
    $nr = mysqli_num_rows($query);


    if ($nr == 1) {
        if ($pass1 == $pass2) {
            mysqli_query($conn, "UPDATE register Set password = '$pass1' WHERE username = '$username'");
            $_SESSION["password"] = $pass1;
            echo json_encode(array('success' => 1));
        } else {
            echo json_encode(array('success' => 0, 'message' => 'Passwords don"t match'));
        }
    } else if ($nr == 0) {
        echo json_encode(array('success' => 0, 'message' => 'Wrong password'));
    }
}
