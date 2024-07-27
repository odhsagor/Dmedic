<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dmedic";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $doctor_id = $_GET['doctor_id'];

    $stmt = $pdo->prepare("SELECT * FROM doctorSchedules WHERE doctor_id = ?");
    $stmt->execute([$doctor_id]);
    $schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($schedules as $schedule) {
        echo '<li class="list-group-item">';
        echo 'ID: ' . $schedule['id'] . ' | Date: ' . $schedule['date'] . ' | Time: ' . $schedule['start_time'] . ' - ' . $schedule['end_time'] . ' | Room: ' . $schedule['room_number'] . ' | Fees: $' . $schedule['fees'];
        echo ' <button class="btn btn-sm btn-warning" onclick="editSchedule(' . $schedule['id'] . ', \'' . $schedule['date'] . '\', \'' . $schedule['start_time'] . '\', \'' . $schedule['end_time'] . '\', \'' . $schedule['room_number'] . '\', ' . $schedule['fees'] . ')">Edit</button>';
        echo ' <button class="btn btn-sm btn-danger" onclick="deleteSchedule(' . $schedule['id'] . ')">Delete</button>';
        echo '</li>';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>

