<?php
include './connection.php';
if (isset($_GET['genre'])) {
$genre = $_GET['genre'];
// echo "genre: " . $genre;
}
$sql = "SELECT * FROM Book where genre='$genre'";
// echo $sql;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
echo "author : ".$row['author'].", Title : ".$title = $row['title']."</br>";
}
}
?>
