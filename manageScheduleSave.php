<?php

$servername = "localhost";
$username = "root"; // Your DB username
$password = ""; // Your DB password
$dbname = "Dmedic";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $days_of_week = json_encode($_POST['days_of_week']);
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $consulting_time = $_POST['consulting_time'];

    $sql = "UPDATE Manage_Schedules
            SET days_of_week='$days_of_week', from_date='$from_date', to_date='$to_date', start_time='$start_time', end_time='$end_time', consulting_time='$consulting_time'
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: doctorDashboard.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
