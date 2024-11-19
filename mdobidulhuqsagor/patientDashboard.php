<?php
session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: patientLogin.php");
    exit();
}

$patient_name = $_SESSION['patient_name'];
$patient_id = $_SESSION['patient_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmedic";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->close();
?>



<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>রোগীর ড্যাশবোর্ড</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
            color: white;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .nav-link {
            color: white !important;
        }

        .container {
            margin-top: 50px;
        }

        .welcome-msg {
            margin-bottom: 20px;
            font-size: 1.5em;
            color: #007bff;
            text-align: center;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .form-row .form-group {
            padding-right: 15px;
        }

        .form-control-sm {
            height: 30px;
            padding: 5px 10px;
        }

        .btn-sm {
            padding: 5px 10px;
        }

        .logout-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
 
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="patientDashboard.php">ডি-মেডিক</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="patientDashboard.php">ড্যাশবোর্ড</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../Sagor/patientAppointmentForm.php">রোগীর অ্যাপয়েন্টমেন্ট</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewHealthData.php">স্বাস্থ্য তথ্য দেখুন</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewPlan.php">পরিকল্পনা দেখুন</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="healthGuidelines.php">স্বাস্থ্য নির্দেশিকা</a>
                </li>
                <li class="nav-item">
                    <form action="logout.php" method="post" class="d-inline">
                        <button type="submit" class="btn btn-danger">লগ আউট</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
        <div class="welcome-msg">
            স্বাগতম, <?php echo $patient_name; ?>!
        </div>

    
</body>
</html>
