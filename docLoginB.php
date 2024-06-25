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
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM doctorRegistrations WHERE email = '$user_id' OR mobile_number = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Login successful. Welcome " . $row['first_name'] . " " . $row['last_name'];
            session_start();
            $_SESSION['doctor_id'] = $row['id'];
            $_SESSION['doctor_name'] = $row['first_name'] . ' ' . $row['last_name'];
            header("Location: doctorDashboard.php"); 
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with this User ID";
    }

    $conn->close();
}
?>
