<?php

include("connection.php");

$sql = "UPDATE MyGuests SET lastname='Sir' WHERE id=1";
if (mysqli_query($conn, $sql)) {
echo "Record updated successfully";
}
else {
echo "Error updating record: " . mysqli_error($conn);
}

?>