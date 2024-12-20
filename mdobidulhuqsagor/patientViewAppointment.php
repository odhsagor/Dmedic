<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dmedic";

try {
    session_start();

    if (!isset($_SESSION['patient_id'])) {
        header("Location: patientLogin.php");
        exit();
    }

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $patient_id = $_SESSION['patient_id'];

    $sql = $pdo->prepare("SELECT * FROM appointments WHERE patient_id = :patient_id");
    $sql->bindParam(':patient_id', $patient_id, PDO::PARAM_INT);
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
    <title>View Appointments</title>
    <link rel="stylesheet" href="../Sagor/cssSagor/patientAppoinmentFrom.css">
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
                        <li class="list-inline-item">
                            <a href="javascript:history.back()">
                                <i class="icofont-rounded-left mr-2"></i>Back
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="mailto:support@dmedic.com">
                                <i class="icofont-support-faq mr-2"></i>support@dmedic.com
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <i class="icofont-location-pin mr-2"></i>Dmadic
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                        <a href="tel:+23-345-67890">
                            <span>Call Now : </span>
                            <span class="h4">26566</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


    <div class="main-container">
        <div class="line">
            <h1>Your Appointments</h1>
        </div>
        <?php if (count($appointments) > 0): ?>
            <?php foreach ($appointments as $appointment): ?>
                <div class="appointment-card">
                    <h2>Appointment with Dr. <?php echo htmlspecialchars($appointment['doctor_name']); ?></h2>
                    <p><strong>Appointment ID:</strong> <?php echo htmlspecialchars($appointment['appointment_id']); ?></p>
                    <p><strong>Doctor ID:</strong> <?php echo htmlspecialchars($appointment['doctor_id']); ?></p>
                    <p><strong>Patient Name:</strong> <?php echo htmlspecialchars($appointment['first_name'].' '.$appointment['last_name']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($appointment['email']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($appointment['phone']); ?></p>
                    <p><strong>Doctor Type:</strong> <?php echo htmlspecialchars($appointment['doctor_type']); ?></p>
                    <p><strong>Appointment Date:</strong> <?php echo htmlspecialchars($appointment['appointment_date']); ?></p>
                    <p><strong>Appointment Time:</strong> <?php echo htmlspecialchars($appointment['appointment_time']); ?></p>
                    <p><strong>Room Number:</strong> <?php echo htmlspecialchars($appointment['room_number']); ?></p>
                    <p><strong>Fees:</strong> <?php echo htmlspecialchars($appointment['fees']); ?></p>
                    <div class="buttons-container">
                        <button onclick="window.location.href='patientViewPrescriptions.php?appointment_id=<?php echo htmlspecialchars($appointment['appointment_id']); ?>'">View Prescription</button>
                        <button onclick="window.location.href='payment.php?appointment_id=<?php echo htmlspecialchars($appointment['appointment_id']); ?>'">Make Payment</button>
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
