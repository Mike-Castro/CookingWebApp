<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "test";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) 
    {
        die("No hay conexión: ".mysqli_connect_error());
    }

    $nombre = $_POST["txtusuario"];
    $pass1 = $_POST["txtpassword1"];
    $pass2 = $_POST["txtpassword2"];

    if($pass1 == $pass2){
        
        mysqli_query($conn,"UPDATE register Set password = '$pass1' WHERE username = '$nombre'");
        //echo "Paswword Updated";
        //session_unset();
        //session_destroy();
        echo "<script> alert('Password Updated!...redirecting...');window.location= '../../index.php' </script>";
    }
    else{
        echo "Paswwords didn't match"; 
    }

?>