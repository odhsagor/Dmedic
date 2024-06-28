<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: doctorRegistration.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM doctorRegistrations WHERE approved = 0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Approve Doctors</title>
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/doctorAdmin.css">
    <style>
        .doctor-box {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .doctor-box h4 {
            margin-bottom: 15px;
        }
        .doctor-box p {
            margin-bottom: 5px;
        }
        .action-buttons {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Doctor Registrations</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='doctor-box'>
                    <h4>Doctor ID: {$row['id']}</h4>
                    <p><strong>Title:</strong> {$row['title']}</p>
                    <p><strong>First Name:</strong> {$row['first_name']}</p>
                    <p><strong>Last Name:</strong> {$row['last_name']}</p>
                    <p><strong>DOB:</strong> {$row['dob']}</p>
                    <p><strong>Gender:</strong> {$row['gender']}</p>
                    <p><strong>District:</strong> {$row['district']}</p>
                    <p><strong>National ID:</strong> {$row['national_id']}</p>
                    <p><strong>Registration Number:</strong> {$row['registration_number']}</p>
                    <p><strong>Doctor Type:</strong> {$row['doctor_type']}</p>
                    <p><strong>Mobile Number:</strong> {$row['mobile_number']}</p>
                    <p><strong>Email:</strong> {$row['email']}</p>
                    <div class='action-buttons'>
                        <form action='approve_Request_Doctor_Db.php' method='post' style='display:inline;'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <button type='submit' name='action' value='approve' class='btn btn-success'>Approve</button>
                        </form>
                        <form action='approve_Request_Doctor_Db.php' method='post' style='display:inline;'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <button type='submit' name='action' value='reject' class='btn btn-danger'>Reject</button>
                        </form>
                    </div>
                </div>";
            }
        } else {
            echo "<div class='alert alert-info'>No pending registrations</div>";
        }
        ?>
    </div>

</body>
</html>

<?php
$conn->close();
?>
