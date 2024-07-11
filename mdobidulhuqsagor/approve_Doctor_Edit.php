<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_id = $_POST['doctor_id'];
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

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE doctorRegistrations SET 
                title = ?, 
                first_name = ?, 
                last_name = ?, 
                dob = ?, 
                gender = ?, 
                district = ?, 
                national_id = ?, 
                registration_number = ?, 
                doctor_type = ?, 
                mobile_number = ?, 
                email = ? 
            WHERE id = ?");

    //sql
    $stmt->bind_param("sssssssssssi", $title, $first_name, $last_name, $dob, $gender, $district, $national_id, $registration_number, $doctor_type, $mobile_number, $email, $doctor_id);

    // stmt
    if ($stmt->execute()) {
        echo "Profile updated successfully.";
        header("Location: approveDoctor.php");
    } else {
        echo "Error updating record: " . $stmt->error;
        header("Location: approveDoctor.php");
    }


    $stmt->close();
}

$conn->close();
?>
