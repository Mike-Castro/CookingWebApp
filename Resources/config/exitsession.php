<?php

    session_unset();
    session_destroy();
    echo "<script> alert('Goodbye!! See U Soon!');window.location= '../index.php' </script>";
?>