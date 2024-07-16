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

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['doctor_id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        $sql = "UPDATE doctorRegistrations SET approved = 1 WHERE doctor_id = ?";
    } else if ($action == 'reject') {
        $sql = "DELETE FROM doctorRegistrations WHERE doctor_id = ?";
    }

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Action completed successfully.";
        } else {
            $_SESSION['message'] = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $_SESSION['message'] = "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
header("Location: approve_Request_Doctor.php");
exit;
?>
