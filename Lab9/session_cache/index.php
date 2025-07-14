<?php
// Memcached Server Configuration (replace with your actual settings)
$memcache_servers = array(
    array('host' => 'localhost', 'port' => 11211) // Replace with your Memcached server host and port
);

// Session Configuration
ini_set('session.save_handler', 'memcache');
ini_set('session.save_path', implode(',', array_map(function ($server) {
    return sprintf('tcp://%s:%d', $server['host'], $server['port']);
}, $memcache_servers)));

// Database Connection (replace with your actual credentials)
$db_host = 'localhost';
$db_username = 'your_username';
$db_password = 'your_password';
$db_name = 'your_database_name';

// Start the session
session_start();

// Example: Fetch user data from the database
function get_user_data($user_id) {
    global $db_host, $db_username, $db_password, $db_name;

    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Using string 's' for email, assuming $user_id is an email here
    $sql = "SELECT username, email FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $user_id);  // Use "s" for email (string)
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return null;
    }

    mysqli_close($conn);
}

// Check if user data exists in Memcached session
$user_data = null;
if (isset($_SESSION['user_data'])) {
    $user_data = $_SESSION['user_data'];
}

// If user data is not in session or expired (optional), fetch from database and store in Memcached
if (!$user_data) {
    $user_id = 'user@example.com'; // Replace with actual user email or ID
    $user_data = get_user_data($user_id);
    if ($user_data) {
        $_SESSION['user_data'] = $user_data;
    }
}


if ($user_data) {
    echo "Welcome, " . $user_data['username'] . "!";
    echo "<br>Email: " . $user_data['email'];
} else {
    echo "No user data found.";
}

// Destroy session (optional)
// session_destroy();
?>
