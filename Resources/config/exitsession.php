<?php

session_unset();
session_destroy();
echo "<script> alert('Goodbye!! See U Soon!');window.location= 'http://localhost/daw/CookingWebApp-main/index.php' </script>";
?>