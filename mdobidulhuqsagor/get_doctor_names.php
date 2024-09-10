<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$doctor_type = $_POST['doctor_type'];
$sql = $conn->prepare("SELECT doctor_id, CONCAT(title, ' ', first_name, ' ', last_name) as doctor_name FROM doctorRegistrations WHERE doctor_type = ? AND approved = 1");
$sql->bind_param('s', $doctor_type);
$sql->execute();
$result = $sql->get_result();


echo '<option value="">Select Doctors</option>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['doctor_id'].'">'.$row['doctor_name'].'</option>';
    }
} else {
    echo '<option value="">No Doctors Available</option>';
}

$sql->close();
$conn->close();
?>
