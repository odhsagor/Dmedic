<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "Dmedic";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $doctor_id = $_GET['doctor_id'];

    $query = $pdo->prepare("SELECT * FROM doctorSchedules WHERE doctor_id = ?");
    $query->execute([$doctor_id]);
    $doctorSchedules = $query->fetchAll();

    foreach ($doctorSchedules as $schedule) {
        echo '<li class="list-group-item">';
        echo 'Days: ' . $schedule['days_of_week'] . ' | From: ' . $schedule['from_date'] . ' | To: ' . $schedule['to_date'];
        echo ' | Start: ' . $schedule['start_time'] . ' | End: ' . $schedule['end_time'];
        echo ' | Consulting Time: ' . $schedule['consulting_time'] . ' mins | Fees: ৳' . $schedule['fees'];
        echo ' <button class="btn btn-warning btn-sm" onclick="editSchedule(' . $schedule['id'] . ', \'' . $schedule['days_of_week'] . '\', \'' . $schedule['from_date'] . '\', \'' . $schedule['to_date'] . '\', \'' . $schedule['start_time'] . '\', \'' . $schedule['end_time'] . '\', \'' . $schedule['consulting_time'] . '\', \'' . $schedule['fees'] . '\')">Edit</button>';
        echo ' <button class="btn btn-danger btn-sm" onclick="deleteSchedule(' . $schedule['id'] . ')">Delete</button>';
        echo '</li>';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
