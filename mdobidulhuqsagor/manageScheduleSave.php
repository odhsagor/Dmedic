<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "Dmedic";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['doctorSchedulesId'];
    $doctor_id = $_POST['doctor_id'];
    $days_of_week = $_POST['days_of_week'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $consulting_time = $_POST['consulting_time'];
    $fees = $_POST['fees'];

    $query = $pdo->prepare("UPDATE doctorSchedules SET days_of_week = ?, from_date = ?, to_date = ?, start_time = ?, end_time = ?, consulting_time = ?, fees = ? WHERE doctorSchedulesId = ? AND doctor_id = ?");
    $query->execute([$days_of_week, $from_date, $to_date, $start_time, $end_time, $consulting_time, $fees, $doctorSchedulesId, $doctor_id]);

    echo "Schedule updated successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
