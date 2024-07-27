<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['PatientMail'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM patientRegistrations WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
       
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['patient_id'] = $row['patient_id'];  
            $_SESSION['patient_name'] = $row['first_name'] . ' ' . $row['last_name'];
            echo "Login successful";
            header("Location: patientAppointmentForm.php"); 
            exit();
        } else {
            echo "Invalid password";
            header("Location: patientLogin.php"); 
        }
    } else {
        echo "No user found with this email";
        header("Location: patientLogin.php"); 
    }

    $conn->close();
}
?>
