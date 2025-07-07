<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ajax";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!isset($conn)) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>