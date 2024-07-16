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

$sql = "SELECT * FROM doctorRegistrations WHERE approved = 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header-top-bar {
            background-color: #004d40;
            padding: 10px 0;
            color: #fff;
        }
        .header-top-bar a {
            color: #fff;
            margin-right: 15px;
        }
        .navbar {
            background-color: #fff;
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav .nav-link {
            color: #000 !important;
        }
        .navbar-nav .nav-item .nav-link i {
            margin-right: 5px;
        }
        .h3{
          margin: 20px;
        }
        .doctor-box {
        border: 2px solid green;
        padding: 20px;
        margin: 30px;
    }
    .h3 {
        background-color: #004d40;
        border: 4px solid black;
        padding: 20px;
        margin: 30px;
    }
    .text{
      color: #fff;
      text-align: center;

    }
    </style>
</head>
<body>
    <header>
        <div class="header-top-bar text-center">
            <div class="container">
                <a href="mailto:support@dmadic.com"><i class="icofont-support-faq mr-2"></i>support@dmadic.com</a>
                <span><i class="icofont-location-pin mr-2"></i>Dmadic</span>
                <span class="float-right">Call Now: <span class="h4">26566</span></span>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="admin_Dashboard.php"><img src="../images/Dmedic.png" alt="Dmedic"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="approve_Request_Doctor.php">Approve Request Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="approveDoctor.php">Approve Doctors</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
    </header>
    <div class="h3">
    <h3 class="text">Approved Doctors</h3>
    </div>
   

    <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="doctor-box">';
                echo '<form action="approve_Doctor_Edit.php" method="post">';
                echo '<input type="hidden" name="doctor_id" value="' . $row["doctor_id"] . '">';
                echo '<p><strong>Doctor ID:</strong> ' . $row["doctor_id"] . '</p>';
                echo '<p><strong>Title:</strong> <input type="text" name="title" value="' . $row["title"] . '"></p>';
                echo '<p><strong>First Name:</strong> <input type="text" name="first_name" value="' . $row["first_name"] . '"></p>';
                echo '<p><strong>Last Name:</strong> <input type="text" name="last_name" value="' . $row["last_name"] . '"></p>';
                echo '<p><strong>DOB:</strong> <input type="text" name="dob" value="' . $row["dob"] . '"></p>';
                echo '<p><strong>Gender:</strong> <input type="text" name="gender" value="' . $row["gender"] . '"></p>';
                echo '<p><strong>District:</strong> <input type="text" name="district" value="' . $row["district"] . '"></p>';
                echo '<p><strong>National ID:</strong> <input type="text" name="national_id" value="' . $row["national_id"] . '"></p>';
                echo '<p><strong>Registration Number:</strong> <input type="text" name="registration_number" value="' . $row["registration_number"] . '"></p>';
                echo '<p><strong>Doctor Type:</strong> <input type="text" name="doctor_type" value="' . $row["doctor_type"] . '"></p>';
                echo '<p><strong>Mobile Number:</strong> <input type="text" name="mobile_number" value="' . $row["mobile_number"] . '"></p>';
                echo '<p><strong>Email:</strong> <input type="text" name="email" value="' . $row["email"] . '"></p>';
                echo '<button type="submit">Save Changes</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo "No approved doctors found.";
        }
        $conn->close();
        ?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>