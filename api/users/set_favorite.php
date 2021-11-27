<?php
if (isset($_POST['id']) && $_POST['id']) {

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "test";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("No hay conexión: " . mysqli_connect_error());
    }

    session_start();
    $username = $_SESSION['username'];
    $id = $_POST['id'];

    $query = mysqli_query($conn, "SELECT * FROM user_recipie WHERE username = '" . $username . "' and recipie = '" . $id . "'");
    $nr = mysqli_num_rows($query);


    if ($nr == 1) {
        $query = "DELETE FROM user_recipie 
                    WHERE username = '" . $username . "' AND recipie = '" . $id . "'";

        // execute query
        if ($conn->query($query)) {
            echo json_encode(array('success' => 1, 'favorite' => 0));
        } else {
            echo json_encode(array('success' => 0));
        }
    } else if ($nr == 0) {
        $query = "INSERT INTO user_recipie (username, recipie)
                  VALUES ('" . $username . "', '" . $id . "')";

        // execute query
        if ($conn->query($query)) {
            echo json_encode(array('success' => 1, 'favorite' => 1));
        } else {
            echo json_encode(array('success' => 0));
        }
    }
}
