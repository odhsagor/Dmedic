<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";


$conn = new mysqli("$servername", "$username", "$password", "$dbname");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_id = $_POST['doctor_id'];
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_post['dob'];
    $gender = $_POST['gender'];
    $district = $_POST['district'];
    $national_id = $_POST['national_id'];
    $registration_number = $_POST['registration_number'];
    $doctor_type = $_POST['doctor_type'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];

    $sql = "UPDATE doctorRegistrations SET 
                title = '$title', 
                first_name = '$first_name', 
                last_name = '$last_name',
                dob= '$dob',
                gender = '$gender',
                district = '$district', 
                national_id = '$national_id', 
                registration_number = '$registration_number', 
                doctor_type = '$doctor_type' 
                mobile_number = '$mobile_number' 
                email = '$email' 
            WHERE id = $doctor_id";

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

