<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dmedic";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $room_number = $_POST['room_number'];
    $fees = $_POST['fees'];

    $stmt = $pdo->prepare("UPDATE doctorSchedules SET doctor_id = ?, date = ?, start_time = ?, end_time = ?, room_number = ?, fees = ? WHERE id = ?");
    $stmt->execute([$doctor_id, $date, $start_time, $end_time, $room_number, $fees, $id]);

    echo "Schedule updated successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

