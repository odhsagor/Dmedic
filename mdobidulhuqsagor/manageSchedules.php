<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dmedic";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $room_number = $_POST['room_number'];
    $fees = $_POST['fees'];

    $stmt = $pdo->prepare("INSERT INTO doctorSchedules (doctor_id, date, start_time, end_time, room_number, fees) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$doctor_id, $date, $start_time, $end_time, $room_number, $fees]);

    echo "Schedule saved successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
