<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$time_slot = $_POST['time_slot'];
$sql = $conn->prepare("SELECT fees FROM doctorSchedules WHERE time_slot = ?");
$sql->bind_param('s', $time_slot);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['fees'].'">'.$row['fees'].'</option>';
    }
} else {
    echo '<option value="Select">No Fees Available</option>';
}

$sql->close();
$conn->close();
?>
