<?php
    $servername = "localhost";
    $username = "482";
    $password = "482";
    $database = "atik";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!isset($conn)) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        echo("Success");
    }
?>