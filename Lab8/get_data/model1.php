<?php require_once("connection.php"); ?>
<?php

$limit = $_GET['id'];
$sql = "SELECT * FROM MyGuests LIMIT $limit";
$result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>";
            echo $row['firstname'];
            echo "</p>";
        }
    } else {
        echo "No Data";
    }
?>