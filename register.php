<?php
if (isset($_POST["txtusuario"])) {
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
    $email = $_POST["txtemail"];
    $name = $_POST["txtname"];

    mysqli_query($conn, "INSERT INTO register(username,email,password,displayname) VALUES ('$nombre','$email','$pass','$name')");
    //echo "User Registered";
    echo "<script> alert('User Registered! Welcome: " . $name . " ');window.location= 'index.php' </script>";
}
?>
<?php include 'header.php'; ?>

<hr class="hr1">
<center>
    <form method="post" action="register.php">
        <table>
            <tr>
                <td colspan="2" style="text-align: center;background-color:#353A46;color:white; padding-bottom:10px; padding-top:10px;">
                    <label>Register</label>
                </td>
            </tr>
            <tr>
                <td><label>Usuario</label></td>
            </tr>
            <tr>
                <td><input type="text" name="txtusuario" /></td>
            </tr>
            <tr>
                <td><label>Email</label></td>
            </tr>
            <tr>
                <td><input type="text" name="txtemail" /> </td>
            </tr>
            <tr>
                <td><label>Password</label></td>
            </tr>
            <tr>
                <td><input type="password" name="txtpassword" /> </td>
            </tr>
            <tr>
                <td><label>Display Name</label></td>
            </tr>
            <tr>
                <td><input type="text" name="txtname" /> </td>
            </tr>
            <tr>
                <td><input type="submit" value="Ingresar" /> </td>
            </tr>
        </table>
    </form>
</center>
<style>
    table {
        border: 2px solid #353A46;
        background-color: white;
    }

    input[type=text],
    input[type=password] {
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

    input[type=submit] {
        background-color: #353A46;
        color: white;
        padding: 8px 10px;
        margin: 8px 0px;
        border: solid;
        cursor: pointer;
        width: 40%;
    }
</style>

<?php include 'footer.php'; ?>