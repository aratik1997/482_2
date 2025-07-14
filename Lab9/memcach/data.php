<?php
// Get the selected genre from the form
$choice = $_POST['genre'];

$memcached_host = "localhost";
$memcached_port = 11213;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create Memcached connection
$memcache = new Memcached();
$memcache->addServer($memcached_host, $memcached_port);

// Function to retrieve data (checks Memcached first, then database)
function get_data($key) {
    global $memcache, $servername, $username, $password, $dbname;

    // Check Memcached for data
    $data = $memcache->get($key);

    if (!$data) {
        // Data not found in Memcached, fetch from database
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Sanitize the input to prevent SQL injection
        $key = mysqli_real_escape_string($conn, $key);

        // SQL query to fetch books by genre
        $sql = "SELECT * FROM book WHERE genre='$key'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $data = ''; // Initialize the data variable

            while ($row = mysqli_fetch_assoc($result)) {
                $data .= $row["title"] . " by " . $row['author'] . "<br>";
            }

            // Cache data for 1 hour (3600 seconds)
            $memcache->set($key, $data, 3600);
        } else {
            $data = "No data found";
        }

        mysqli_close($conn);
    }

    return $data;
}

// Get data using the function
$data = get_data($choice);

// Display the data
echo $data;
?>
