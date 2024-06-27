<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";


$conn = new mysqli("$servername", "$username", "$password", "$dbname");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$title = $_POST['title'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$district = $_POST['district'];
$national_id = $_POST['national_id'];
$registration_number = $_POST['registration_number'];
$doctor_type = $_POST['doctor_type'];
$mobile_number = $_POST['mobile_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$stmt = $conn->prepare("INSERT INTO doctorRegistrations(title, first_name, last_name, dob, gender, district, national_id, registration_number, doctor_type, mobile_number, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $title, $first_name, $last_name, $dob, $gender, $district, $national_id, $registration_number, $doctor_type, $mobile_number, $email, $hashed_password);


if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
