<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate inputs
$first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$doctor_id = filter_input(INPUT_POST, 'doctor_name', FILTER_SANITIZE_NUMBER_INT);
$appointment_date = filter_input(INPUT_POST, 'appointment_date', FILTER_SANITIZE_STRING);
$select_time = filter_input(INPUT_POST, 'select-time', FILTER_SANITIZE_STRING);
$consulting_time = filter_input(INPUT_POST, 'consulting-time', FILTER_SANITIZE_STRING);
$doctor_fees = filter_input(INPUT_POST, 'doctor-fees', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

if (!$email) {
    die("Invalid email format.");
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO appointments (first_name, last_name, email, phone, doctor_id, appointment_date, select_time, consulting_time, doctor_fees) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("ssssisssi", $first_name, $last_name, $email, $phone, $doctor_id, $appointment_date, $select_time, $consulting_time, $doctor_fees);

// Execute the statement
if ($stmt->execute()) {
    echo "Appointment scheduled successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
