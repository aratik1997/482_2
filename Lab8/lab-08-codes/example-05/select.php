<?php 
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$limit = $_POST['my_limit'];

$sql = "SELECT * FROM users LIMIT $limit";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['user_name'].'    '.$row['user_email'].'<br>';
}
} else {
echo "No Data";
}

}else {
    echo "Invalid Request";
}
?>