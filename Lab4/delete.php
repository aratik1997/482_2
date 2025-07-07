<?php

include("connection.php");

$sql = "DELETE FROM MyGuests WHERE id=1";
if (mysqli_query($conn, $sql)) {
echo "Record deleted successfully";
}
else {
echo "Error deleting record: " . mysqli_error($conn);
}

?>