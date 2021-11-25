<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
		echo "<script> alert('Welcome: " . $nombre . " Login Successful');window.location= 'index.php' </script>";
	} else if ($nr == 0) {
		//header("Location: login.html");
		//echo "Login Credentials Invalid! Go back..."; 
		//echo "<script> alert('Login Credentials Invalid! Create an account');window.location= 'signup.html' </script>";
		echo ("<script>if(confirm('Login Credentials Invalid! Do you want to create an account?')){
		// Use AJAX here to send Query to a PHP file
		window.location= 'register.html'
	 } else {
		window.location= 'login.php'
	 };</script>");
	}
}
?>
<?php include 'header.php'; ?>

<hr class="hr1" />
<center>
	<form method="post" action="login.php">
		<table>
			<tr>
				<td colspan="2" style="
              text-align: center;
              background-color: #353a46;
              color: white;
              padding-bottom: 10px;
              padding-top: 10px;
            ">
					<label>Login</label>
				</td>
			</tr>
			<tr>
				<td><label>Usuario</label></td>
			</tr>
			<tr>
				<td><input type="text" name="txtusuario" /></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
			</tr>
			<tr>
				<td><input type="password" name="txtpassword" /></td>
			</tr>
			<tr>
				<td><input type="submit" value="Ingresar" /></td>
			</tr>
		</table>
	</form>
</center>
<style>
	table {
		border: 2px solid #353a46;
		background-color: #ffffff;
	}

	input[type="text"],
	input[type="password"] {
		width: 100%;
		padding: 8px 20px;
		border: 2px solid #ccc;
		box-sizing: border-box;
	}

	label {
		font-size: 14px;
		font-weight: bold;
		font-family: arial;
	}

	input[type="submit"] {
		background-color: #353a46;
		color: white;
		padding: 8px 10px;
		margin: 8px 0px;
		border: solid;
		cursor: pointer;
		width: 40%;
	}
</style>
<?php include 'footer.php'; ?>