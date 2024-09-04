<?php
session_start();

// Check if the patient is logged in
if (!isset($_SESSION['patient_id'])) {
    header("Location: patientLogin.php");
    exit();
}

// Fetch the patient's information from the session
$patient_id = $_SESSION['patient_id'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmedic";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission to update health data
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['action'])) {
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

    // Insert or update data in the database
    $sql = "INSERT INTO patient_health_data (patient_id, blood_glucose, insulin_dosage, medication_intake, physical_activity, dietary_intake, weight, symptoms, bmi, blood_pressure, heart_rate, sleep_duration, water_intake)
            VALUES ('$patient_id', '$blood_glucose', '$insulin_dosage', '$medication_intake', '$physical_activity', '$dietary_intake', '$weight', '$symptoms', '$bmi', '$blood_pressure', '$heart_rate', '$sleep_duration', '$water_intake')
            ON DUPLICATE KEY UPDATE blood_glucose = VALUES(blood_glucose), insulin_dosage = VALUES(insulin_dosage), medication_intake = VALUES(medication_intake), 
                                    physical_activity = VALUES(physical_activity), dietary_intake = VALUES(dietary_intake), weight = VALUES(weight), symptoms = VALUES(symptoms), 
                                    bmi = VALUES(bmi), blood_pressure = VALUES(blood_pressure), heart_rate = VALUES(heart_rate), sleep_duration = VALUES(sleep_duration), 
                                    water_intake = VALUES(water_intake)";
    if ($conn->query($sql) === TRUE) {
        $message = "Health data updated successfully.";
    } else {
        $message = "Error updating health data: " . $conn->error;
    }
}

// Retrieve the latest health data for display
$sql = "SELECT * FROM patient_health_data WHERE patient_id = '$patient_id' ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($sql);
$health_data = $result->fetch_assoc();

// Function to evaluate patient's health condition
function evaluateHealth($data) {
    $healthStatus = [];

    // Check Blood Glucose Level
    if ($data['blood_glucose'] < 70 || $data['blood_glucose'] > 130) {
        $healthStatus[] = "Blood Glucose is out of healthy range (70-130 mg/dL).";
    }

    // Check BMI
    if ($data['bmi'] < 18.5 || $data['bmi'] > 24.9) {
        $healthStatus[] = "BMI is out of healthy range (18.5-24.9).";
    }

    // Check Blood Pressure
    $bloodPressureParts = explode('/', $data['blood_pressure']);
    if (count($bloodPressureParts) == 2) {
        $systolic = (int)$bloodPressureParts[0];
        $diastolic = (int)$bloodPressureParts[1];
        if ($systolic < 90 || $systolic > 120 || $diastolic < 60 || $diastolic > 80) {
            $healthStatus[] = "Blood Pressure is out of healthy range (90/60 - 120/80 mmHg).";
        }
    }

    // Check Heart Rate
    if ($data['heart_rate'] < 60 || $data['heart_rate'] > 100) {
        $healthStatus[] = "Heart Rate is out of healthy range (60-100 bpm).";
    }

    // Check Weight - Assuming a healthy weight range for simplicity, can be adjusted
    if ($data['weight'] < 50 || $data['weight'] > 100) {
        $healthStatus[] = "Weight is out of healthy range (50-100 kg).";
    }

    // Other checks can be added as needed...

    // If no health issues are found
    if (empty($healthStatus)) {
        return "All health parameters are within the healthy range.";
    }

    return implode("<br>", $healthStatus);
}

// Handle request for evaluating health condition
if (isset($_POST['action']) && $_POST['action'] == 'evaluate_health') {
    echo evaluateHealth($health_data);
    exit;
}

// Retrieve historical data for chart
$sql_chart = "SELECT * FROM patient_health_data WHERE patient_id = '$patient_id' ORDER BY created_at ASC";
$result_chart = $conn->query($sql_chart);
$chart_data = [];
while ($row = $result_chart->fetch_assoc()) {
    $chart_data[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Health Data</title>
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

        .chart-container {
            position: relative;
            height: 400px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="patientInterface.php">D-Medic</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="patientInterface.php">Dashboard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="viewHealthData.php">View Health Data</a>
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
        <div class="card">
            <div class="card-header">
                Edit Your Health Data
            </div>
            <div class="card-body">
                <form action="viewHealthData.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="bloodGlucoseLevel">Blood Glucose Level</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" id="bloodGlucoseLevel" name="bloodGlucoseLevel" value="<?php echo $health_data['blood_glucose'] ?? ''; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="insulin_dosage">Insulin Dosage</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" id="insulin_dosage" name="insulin_dosage" value="<?php echo $health_data['insulin_dosage'] ?? ''; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="medication_intake">Medication Intake</label>
                            <input type="text" class="form-control form-control-sm" id="medication_intake" name="medication_intake" value="<?php echo $health_data['medication_intake'] ?? ''; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="physical_activity">Physical Activity</label>
                            <input type="text" class="form-control form-control-sm" id="physical_activity" name="physical_activity" value="<?php echo $health_data['physical_activity'] ?? ''; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="dietary_intake">Dietary Intake</label>
                            <input type="text" class="form-control form-control-sm" id="dietary_intake" name="dietary_intake" value="<?php echo $health_data['dietary_intake'] ?? ''; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="weight">Weight (kg)</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" id="weight" name="weight" value="<?php echo $health_data['weight'] ?? ''; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="symptoms">Symptoms</label>
                            <input type="text" class="form-control form-control-sm" id="symptoms" name="symptoms" value="<?php echo $health_data['symptoms'] ?? ''; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="BMI">BMI</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" id="BMI" name="BMI" value="<?php echo $health_data['bmi'] ?? ''; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="blood_pressure">Blood Pressure (Systolic/Diastolic)</label>
                            <input type="text" class="form-control form-control-sm" id="blood_pressure" name="blood_pressure" value="<?php echo $health_data['blood_pressure'] ?? ''; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="heart_rate">Heart Rate (bpm)</label>
                            <input type="number" step="1" class="form-control form-control-sm" id="heart_rate" name="heart_rate" value="<?php echo $health_data['heart_rate'] ?? ''; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sleep_duration">Sleep Duration (hours)</label>
                            <input type="number" step="0.1" class="form-control form-control-sm" id="sleep_duration" name="sleep_duration" value="<?php echo $health_data['sleep_duration'] ?? ''; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="water_intake">Water Intake (liters)</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" id="water_intake" name="water_intake" value="<?php echo $health_data['water_intake'] ?? ''; ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-info" id="healthConditionButton">Health Condition</button>
                </form>
                <div id="healthConditionResult" class="mt-3"></div>
                <?php if (isset($message)) { echo "<div class='alert alert-success mt-3'>$message</div>"; } ?>
            </div>
        </div>

        <!-- Health Data Trends Section -->
        <div class="card">
            <div class="card-header">
                Health Data Trends
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="healthTrendsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // Handle Health Condition button click
    document.getElementById('healthConditionButton').addEventListener('click', function() {
        // AJAX request to fetch health condition
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "viewHealthData.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Display the health condition result
                document.getElementById('healthConditionResult').innerHTML = `<div class="alert alert-info">${xhr.responseText}</div>`;
            }
        };
        xhr.send("action=evaluate_health");
    });

    // Data for chart visualization
    const chartData = <?php echo json_encode($chart_data); ?>;
    const dates = chartData.map(item => new Date(item.created_at).toLocaleDateString());
    const bloodGlucoseLevels = chartData.map(item => item.blood_glucose);

    // Create a chart
    const ctx = document.getElementById('healthTrendsChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Blood Glucose Level',
                data: bloodGlucoseLevels,
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Blood Glucose (mg/dL)'
                    },
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</body>
</html>
