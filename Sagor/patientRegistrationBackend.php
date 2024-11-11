<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $house_number = $_POST['houseNumber'];
    $road_number = $_POST['roadNumber'];
    $area_name = $_POST['areaName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['PatientMail'];
    $contact_number = $_POST['ContactNumber'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO patientRegistrations (first_name, last_name, house_number, road_number, area_name, dob, gender, email, contact_number, password)
            VALUES ('$first_name', '$last_name', '$house_number', '$road_number', '$area_name', '$dob', '$gender', '$email', '$contact_number', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully with Patient ID: " . str_pad($conn->insert_id, 6, "0", STR_PAD_LEFT);
        header("Location: patientRegistration.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

$conn->close();
?>
