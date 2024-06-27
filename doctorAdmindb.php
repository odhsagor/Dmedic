<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: doctorRegistration.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";


$conn = new mysqli("$servername", "$username", "$password", "$dbname");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        $sql = "UPDATE doctorRegistrations SET approved = 1 WHERE id = ?";
    } else if ($action == 'reject') {
        $sql = "DELETE FROM doctorRegistrations WHERE id = ?";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Action completed successfully.";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
header("Location: doctorAdmin.php");
exit;
?>
