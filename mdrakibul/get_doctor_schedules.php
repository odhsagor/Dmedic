<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$doctorSchedulesId = $_POST['doctorSchedulesId'];
$sql = $conn->prepare("SELECT date, start_time, end_time, room_number, fees FROM doctorSchedules WHERE doctorSchedulesId = ?");
$sql->bind_param('i', $doctorSchedulesId);
$sql->execute();
$result = $sql->get_result();

$schedules = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $schedules[] = $row;
    }
    echo json_encode($schedules);
} else {
    echo json_encode(array());
}

$sql->close();
$conn->close();
?>
