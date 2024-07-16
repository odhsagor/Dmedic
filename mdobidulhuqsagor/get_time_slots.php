<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$appointment_date = $_POST['appointment_date'];
$sql = $conn->prepare("SELECT time_slot FROM doctorSchedules WHERE from_date = ?");
$sql->bind_param('s', $appointment_date);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['time_slot'].'">'.$row['time_slot'].'</option>';
    }
} else {
    echo '<option value="Select">No Time Slots Available</option>';
}

$sql->close();
$conn->close();
?>
