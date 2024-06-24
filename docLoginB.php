<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";

$conn = new mysqli("$servername", "$username", "$password", "$dbname");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input from form
$id = $_POST['id'];
$password = $_POST['password'];

// SQL query to fetch user details based on id
$stmt = $conn->prepare("SELECT id FROM doctorRegistrations, password FROM doctorRegistrations ");
$stmt->bind_param("s", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($db_id, $db_password);
    $stmt->fetch();

    // Verify hashed password
    if (password_verify($password, $db_password)) {
        // Password correct, redirect to doctor dashboard
        $_SESSION['id'] = $db_id; // Store id in session
        header("Location: doctorDashboard.php"); // Redirect to dashboard
        exit();
    } else {
        // Password incorrect
        echo "Incorrect password. <a href='javascript:history.go(-1)'>Go back</a>";
    }
} else {
    // User not found
    echo "User not found. <a href='javascript:history.go(-1)'>Go back</a>";
}

$stmt->close();
$conn->close();
?>
