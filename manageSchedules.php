<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "Dmedic";


$conn = new mysqli($servername, $username, $password, $dbname);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $days_of_week = json_encode($_POST['days_of_week']);
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $consulting_time = $_POST['consulting_time'];

    $sql = "INSERT INTO Manage_Schedules (days_of_week, from_date, to_date, start_time, end_time, consulting_time)
            VALUES ('$days_of_week', '$from_date', '$to_date', '$start_time', '$end_time', '$consulting_time')";

    if ($conn->query($sql) === TRUE) {
        header('Location: doctorDashboard.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

