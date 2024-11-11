<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dmedic";

try {
    session_start();

    if (!isset($_SESSION['doctor_id'])) {
        header("Location: doctorLogin.php");
        exit();
    }

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $doctor_id = $_SESSION['doctor_id'];

   
    $sql = $pdo->prepare("SELECT * FROM appointments WHERE doctor_id = :doctor_id");
    $sql->bindParam(':doctor_id', $doctor_id, PDO::PARAM_INT);
    $sql->execute();
    $appointments = $sql->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/patientMedicalReport.css">
    <title>View Patient Appointments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .line h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .appointment-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .appointment-card h2 {
            margin-top: 0;
        }

        .appointment-card p {
            margin: 5px 0;
        }

        .buttons-container {
            text-align: center;
            margin-top: 20px;
        }

        .buttons-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .buttons-container button:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 768px) {
            .appointment-card {
                display: block;
                width: 100%;
            }

            .buttons-container button {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
<header>
        <div class="header-top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="top-bar-info list-inline-item pl-0 mb-0">
                            <li class="list-inline-item"><a href="mailto:support@dmedic.com"><i class="icofont-support-faq mr-2"></i>support@dmedic.com</a></li>
                            <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Dmadic</li>
                            <a href="tel:+26566">
                                <span>Call Now : </span>
                                <span class="h4">26566</span>
                            </a>
                        </ul>
                    </div>    
                    </div>
                </div>
            </div>
        <nav class="navbar navbar-expand-lg navigation" id="navbar">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarsExample09">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="doctorDashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="patientMedicalReport.php">Reports</a></li>
                        <li class="nav-item"><a class="nav-link" href="docELogin.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="main-container">
        <div class="line">
            <h1>Patient Appointments</h1>
        </div>
        <?php if (count($appointments) > 0): ?>
            <?php foreach ($appointments as $appointment): ?>
                <div class="appointment-card">
                    <h2>Appointment with Patient: <?php echo htmlspecialchars($appointment['first_name'] . ' ' . $appointment['last_name']); ?></h2>
                    <p><strong>Appointment ID:</strong> <?php echo htmlspecialchars($appointment['appointment_id']); ?></p>
                    <p><strong>Patient ID:</strong> <?php echo htmlspecialchars($appointment['patient_id']); ?></p>
                    <p><strong>Patient Name:</strong> <?php echo htmlspecialchars($appointment['first_name'] . ' ' . $appointment['last_name']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($appointment['email']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($appointment['phone']); ?></p>
                    <p><strong>Appointment Date:</strong> <?php echo htmlspecialchars($appointment['appointment_date']); ?></p>
                    <p><strong>Appointment Time:</strong> <?php echo htmlspecialchars($appointment['appointment_time']); ?></p>
                    <div class="buttons-container">
                        <button onclick="window.location.href='submitPrescriptionForm.php?appointment_id=<?php echo htmlspecialchars($appointment['appointment_id']); ?>'">Submit Prescription</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No appointments found.</p>
        <?php endif; ?>
    </div>

    <footer>
       
    </footer>
</body>
</html>
