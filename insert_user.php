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

// Get form data
$user_name = mysqli_real_escape_string($conn, $_POST['username']);
$user_email = mysqli_real_escape_string($conn, $_POST['email']);

// Insert data into the Users table
$sql = "INSERT INTO Users (username, email) VALUES ('$user_name', '$user_email')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully. <br>";
    echo "<a href='index.html'>Go back to form</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
