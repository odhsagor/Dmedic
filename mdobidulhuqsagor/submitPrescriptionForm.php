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
    $appointment_id = $_GET['appointment_id'];

    // Fetch appointment details
    $sql = $pdo->prepare("SELECT a.appointment_id, a.patient_id, a.first_name AS patient_first_name, a.last_name AS patient_last_name,
                          d.first_name AS doctor_first_name, d.last_name AS doctor_last_name, d.doctor_type, d.doctor_id
                          FROM appointments a
                          JOIN doctorRegistrations d ON a.doctor_id = d.doctor_id
                          WHERE a.appointment_id = :appointment_id");
    $sql->bindParam(':appointment_id', $appointment_id, PDO::PARAM_INT);
    $sql->execute();
    $appointment = $sql->fetch(PDO::FETCH_ASSOC);

    if (!$appointment) {
        throw new Exception("Appointment not found.");
    }

    // Fetch doctor and patient details
    $doctor_name = $appointment['doctor_first_name'] . ' ' . $appointment['doctor_last_name'];
    $doctor_type = $appointment['doctor_type'];
    $patient_name = $appointment['patient_first_name'] . ' ' . $appointment['patient_last_name'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $prescriptions = $_POST['prescription'];

        foreach ($prescriptions as $prescription) {
            $sql = $pdo->prepare("INSERT INTO prescriptions (appointment_id, doctor_id, patient_id, doctor_name, doctor_type, patient_name, prescription_text)
                                  VALUES (:appointment_id, :doctor_id, :patient_id, :doctor_name, :doctor_type, :patient_name, :prescription_text)");
            $sql->bindParam(':appointment_id', $appointment_id, PDO::PARAM_INT);
            $sql->bindParam(':doctor_id', $doctor_id, PDO::PARAM_INT);
            $sql->bindParam(':patient_id', $appointment['patient_id'], PDO::PARAM_INT);
            $sql->bindParam(':doctor_name', $doctor_name, PDO::PARAM_STR);
            $sql->bindParam(':doctor_type', $doctor_type, PDO::PARAM_STR);
            $sql->bindParam(':patient_name', $patient_name, PDO::PARAM_STR);
            $sql->bindParam(':prescription_text', $prescription, PDO::PARAM_STR);
            $sql->execute();
        }

        echo "Prescriptions successfully submitted!";
        header("Location: doctorDashboard.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header .header-top-bar {
            background-color: #007bff;
            padding: 10px 0;
            color: white;
        }

        .header-top-bar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-top-bar .top-bar-info {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .header-top-bar .top-bar-info li {
            display: inline;
            margin-right: 20px;
        }

        .header-top-bar .top-bar-info li a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .header-top-bar .top-bar-info li a:hover {
            text-decoration: underline;
        }

        .header-top-bar .top-bar-info li i {
            margin-right: 5px;
        }

        .header-top-bar .top-right-bar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .header-top-bar .top-right-bar a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .header-top-bar .top-right-bar a span {
            margin-right: 5px;
        }

        .header-top-bar .top-right-bar a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .prescription-form {
            max-width: 800px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .header div {
            width: 48%;
        }

        .header div p {
            margin: 5px 0;
            font-size: 16px;
        }

        .prescription-box {
            margin-bottom: 15px;
        }

        .prescription-box textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
            min-height: 100px;
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
            transition: background-color 0.3s;
        }

        .buttons-container button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function addPrescriptionBox() {
            const container = document.getElementById('prescription-container');
            const newBox = document.createElement('div');
            newBox.classList.add('prescription-box');
            newBox.innerHTML = '<textarea name="prescription[]" rows="4" placeholder="Type your prescription here"></textarea>';
            container.appendChild(newBox);
        }
    </script>
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
                                <a href="mailto:support@dmadic.com">
                                    <i class="icofont-support-faq mr-2"></i>support@dmadic.com
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

    <div class="prescription-form">
        <div class="header">
            <div>
                <p><strong>Doctor Name:</strong> Dr. <?php echo htmlspecialchars($appointment['doctor_first_name'] . ' ' . $appointment['doctor_last_name']); ?></p>
                <p><strong>Doctor Type:</strong> <?php echo htmlspecialchars($appointment['doctor_type']); ?></p>
                <p><strong>Doctor ID:</strong> <?php echo htmlspecialchars($appointment['doctor_id']); ?></p>
            </div>
            <div>
                <p><strong>Patient ID:</strong> <?php echo htmlspecialchars($appointment['patient_id']); ?></p>
                <p><strong>Appointment ID:</strong> <?php echo htmlspecialchars($appointment['appointment_id']); ?></p>
                <p><strong>Patient Name:</strong> <?php echo htmlspecialchars($appointment['patient_first_name'] . ' ' . $appointment['patient_last_name']); ?></p>
            </div>
        </div>
        <form method="post">
            <div id="prescription-container">
                <div class="prescription-box">
                    <textarea name="prescription[]" rows="4" placeholder="Type your prescription here"></textarea>
                </div>
            </div>
            <div class="buttons-container">
                <button type="submit">Submit Prescription</button>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Dmadic. All rights reserved.</p>
    </footer>
</body>
</html>
