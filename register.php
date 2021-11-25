<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
	die("No hay conexión: ".mysqli_connect_error());
}

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];
$email = $_POST["txtemail"];
$name = $_POST["txtname"];
 
    mysqli_query($conn,"INSERT INTO register(username,email,password,displayname) VALUES ('$nombre','$email','$pass','$name')");
    //echo "User Registered";
    echo "<script> alert('User Registered! Welcome: ".$name." ');window.location= 'index.html' </script>";
?>