<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$doctor_id = $_POST['doctor_name'];
$sql = $conn->prepare("SELECT DISTINCT from_date, to_date FROM doctorSchedules WHERE doctor_id = ?");
$sql->bind_param('i', $doctor_id);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['from_date'].'">'.$row['from_date'].' - '.$row['to_date'].'</option>';
    }
} else {
    echo '<option value="Select">No Dates Available</option>';
}

$sql->close();
$conn->close();
?>
