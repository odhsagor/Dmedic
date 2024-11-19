<?php
// Database connection script

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dmedic";

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Set charset to utf8 for better compatibility
    if (!$conn->set_charset("utf8")) {
        throw new Exception("Error setting charset: " . $conn->error);
    }
} catch (Exception $e) {
    // Log error and exit script if there is a connection issue
    error_log($e->getMessage());
    die("An error occurred while connecting to the database.");
}
?>
