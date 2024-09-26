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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood_glucose = $_POST['bloodGlucoseLevel'];
    $insulin_dosage = $_POST['insulin_dosage'];
    $medication_intake = $_POST['medication_intake'];
    $physical_activity = $_POST['physical_activity'];
    $dietary_intake = $_POST['dietary_intake'];
    $weight = $_POST['weight'];
    $symptoms = $_POST['symptoms'];
    $bmi = $_POST['BMI'];
    $blood_pressure = $_POST['blood_pressure'];
    $heart_rate = $_POST['heart_rate'];
    $sleep_duration = $_POST['sleep_duration'];
    $water_intake = $_POST['water_intake'];

   
    $sql = "INSERT INTO patient_health_data (patient_id, blood_glucose, insulin_dosage, medication_intake, physical_activity, dietary_intake, weight, symptoms, bmi, blood_pressure, heart_rate, sleep_duration, water_intake)
            VALUES ('$patient_id', '$blood_glucose', '$insulin_dosage', '$medication_intake', '$physical_activity', '$dietary_intake', '$weight', '$symptoms', '$bmi', '$blood_pressure', '$heart_rate', '$sleep_duration', '$water_intake')";
    if ($conn->query($sql) === TRUE) {
        $message = "Health data saved successfully.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
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
        <a class="navbar-brand" href="#">D-Medic</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../mdrakibul/patientAppointmentForm.php">Patient Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewHealthData.php">View Health Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewPlan.php">View Plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="healthGuidelines.php">Health Guidelines</a>
                </li>
                <li class="nav-item">
                    <form action="logout.php" method="post" class="d-inline">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-msg">
            Welcome, <?php echo $patient_name; ?>!
        </div>

        <div class="card">
            <div class="card-header">
                Enter Your Health Data
            </div>
            <div class="card-body">
                <form action="patientInterface.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="bloodGlucoseLevel">Blood Glucose Level</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" id="bloodGlucoseLevel" name="bloodGlucoseLevel" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="insulin_dosage">Insulin Dosage</label>
                            <input type="text" class="form-control form-control-sm" id="insulin_dosage" name="insulin_dosage" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="medication_intake">Medication Intake</label>
                            <input type="text" class="form-control form-control-sm" id="medication_intake" name="medication_intake" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="physicalmemo_activity">Physical Activity</label>
                            <input type="text" class="form-control form-control-sm" id="physical_activity" name="physical_activity" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="dietary_intake">Dietary Intake</label>
                            <input type="text" class="form-control form-control-sm" id="dietary_intake" name="dietary_intake" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="weight">Weight (kg)</label>
                            <input type="number" step="0.1" class="form-control form-control-sm" id="weight" name="weight" required>
                        </div>
                    </div>
                    <Imports <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="symptoms">Symptoms</label>
                            <select class="form-control form-control-sm" id="symptoms" name="symptoms">
                                <option>None</option>
                                <option>Fever</option>
                                <option>Cough</option>
                                <option>Fatigue</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="BMI">BMI</label>
                            <input type="number" step="0.1" class="form-control form-control-sm" id="BMI" name="BMI" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="blood_pressure">Blood Pressure</label>
                            <input type="text" class="form-control form-control-sm" id="blood_pressure" name="blood_pressure" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="heart_rate">Heart Rate</label>
                            <input type="number" class="form-control form-control-sm" id="heart_rate" name="heart_rate" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sleep_duration">Sleep Duration (hours)</label>
                            <input type="number" step="0.1" class="form-control form-control-sm" id="sleep_duration" name="sleep_duration" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="water_intake">Water Intake (liters)</label>
                            <input type="number" step="0.1" class="form-control form-control-sm" id="water_intake" name="water_intake" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Save Data</button>
                </form>

                <?php if (isset($message)) { ?>
                    <div class="alert alert-info mt-3"><?php echo $message; ?></div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
