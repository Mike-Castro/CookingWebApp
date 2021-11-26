<?php
if (isset($_POST['txtusuario']) && $_POST['txtusuario'] && isset($_POST['txtpassword']) && $_POST['txtpassword']) {

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "test";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("No hay conexión: " . mysqli_connect_error());
    }

    $nombre = $_POST["txtusuario"];
    $pass = $_POST["txtpassword"];

    $query = mysqli_query($conn, "SELECT * FROM register WHERE username = '" . $nombre . "' and password = '" . $pass . "'");
    $nr = mysqli_num_rows($query);


    if ($nr == 1) {
        //header("Location: pagina.html")
        //echo "Login Successful";
        session_start();
        $_SESSION["username"] = $nombre;
        $_SESSION["password"] = $pass;
        echo json_encode(array('success' => 1));
    } else if ($nr == 0) {
        echo json_encode(array('success' => 0));
    }
}
