<?php
$host = 'sql12.freesqldatabase.com';
$dbname = 'sql12740692';
$username = 'sql12740692';
$password = 'ZBncRZJzP1';
$port = 3306;

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the user ID from the URL
if (isset($_GET['id'])) {
    $user_id = (int)$_GET['id'];

    // Delete user from the Users table
    $sql = "DELETE FROM Users WHERE id = $user_id";

    if (mysqli_query($conn, $sql)) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "No user ID provided.";
}

// Redirect back to the user list
header("Location: show_users.php");

// Close connection
mysqli_close($conn);
?>
