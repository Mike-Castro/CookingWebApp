<?php

session_start();
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
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM register WHERE username = '".$nombre."' and password = '".$pass."'");
$nr = mysqli_num_rows($query);


if($nr == 1)
{
	//header("Location: pagina.html")
	//echo "Login Successful";
	// Starting session
	session_start();	
	// Storing session data
	$_SESSION["username"] = $nombre;
	$_SESSION["password"] = $pass;
	
	echo "<script> alert('Welcome: ".$nombre." Login Successful');window.location= 'http://localhost/daw/CookingWebApp-main/index.php' </script>";
	
}
else if ($nr == 0) 
{
	//header("Location: login.html");
	//echo "Login Credentials Invalid! Go back..."; 
	//echo "<script> alert('Login Credentials Invalid! Create an account');window.location= 'signup.html' </script>";
	echo("<script>if(confirm('Login Credentials Invalid! Do you want to create an account?')){
		// Use AJAX here to send Query to a PHP file
		window.location= 'http://localhost/daw/CookingWebApp-main/signup.html'
	 } else {
		window.location= 'http://localhost/daw/CookingWebApp-main/index.php'
	 };</script>");

	
}
	


?>