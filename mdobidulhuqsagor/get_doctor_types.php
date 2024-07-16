<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT doctor_type FROM doctorRegistrations WHERE approved = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['doctor_type'].'">'.$row['doctor_type'].'</option>';
    }
} else {
    echo '<option value="Select">No Doctor Types Available</option>';
}

$conn->close();
?>
