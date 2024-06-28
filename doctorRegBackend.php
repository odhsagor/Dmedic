<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$title = htmlspecialchars($_POST['title']);
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$dob = htmlspecialchars($_POST['dob']);
$gender = htmlspecialchars($_POST['gender']);
$district = htmlspecialchars($_POST['district']);
$national_id = htmlspecialchars($_POST['national_id']);
$registration_number = htmlspecialchars($_POST['registration_number']);
$doctor_type = htmlspecialchars($_POST['doctor_type']);
$mobile_number = htmlspecialchars($_POST['mobile_number']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$approved = 0; 

$stmt = $conn->prepare("INSERT INTO doctorRegistrations (title, first_name, last_name, dob, gender, district, national_id, registration_number, doctor_type, mobile_number, email, password, approved) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}

$stmt->bind_param("ssssssssssssi", $title, $first_name, $last_name, $dob, $gender, $district, $national_id, $registration_number, $doctor_type, $mobile_number, $email, $hashed_password, $approved);

if ($stmt->execute()) {
    echo "New record created successfully";
    header("Location: doctorRegistration.php");
} else {
    echo "Error: " . $stmt->error;
    header("Location: doctorRegistration.php");
}

$stmt->close();
$conn->close();
?>
