<?php

include("connection.php");

$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Atikur', 'Rahman',
'ar.atik1997.com')";
if (mysqli_query($conn, $sql)) {
echo "New record created successfully";
}
else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>