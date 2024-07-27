<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dmedic";

try {
    session_start();

    if (!isset($_SESSION['patient_id'])) {
        throw new Exception("User not logged in.");
    }

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $patient_id = $_SESSION['patient_id'];
    $doctor_id = $_POST['doctor_name'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $doctor_type = $_POST['doctor_type'];
    $doctor_name = $_POST['doctor_name'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['select_time'];

    
    $appointment_time_24 = date('H:i', strtotime($appointment_time));

    
    if (!preg_match('/^([01]\d|2[0-3]):([0-5]\d)$/', $appointment_time_24)) {
        throw new Exception("Invalid time format. Please enter time in HH:mm format.");
    }

    
    $sql = $pdo->prepare("INSERT INTO appointments (patient_id, doctor_id, first_name, last_name, email, phone, doctor_type, doctor_name, appointment_date, appointment_time)
                           VALUES (:patient_id, :doctor_id, :first_name, :last_name, :email, :phone, :doctor_type, :doctor_name, :appointment_date, :appointment_time)");

    
    $sql->bindParam(':patient_id', $patient_id, PDO::PARAM_INT);
    $sql->bindParam(':doctor_id', $doctor_id, PDO::PARAM_INT);
    $sql->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $sql->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->bindParam(':phone', $phone, PDO::PARAM_STR);
    $sql->bindParam(':doctor_type', $doctor_type, PDO::PARAM_STR);
    $sql->bindParam(':doctor_name', $doctor_name, PDO::PARAM_STR);
    $sql->bindParam(':appointment_date', $appointment_date, PDO::PARAM_STR);
    $sql->bindParam(':appointment_time', $appointment_time_24, PDO::PARAM_STR);

    
    $sql->execute();
    echo "Appointment successfully booked!";
    header("Location: ../mdrakibul/patientAppointmentForm.php");
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
