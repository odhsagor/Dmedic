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
$dbname = "Dmedic";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest draft data
$sql_fetch = "SELECT * FROM patient_health_data WHERE patient_id = '$patient_id' ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($sql_fetch);
$draft_data = [];
if ($result->num_rows > 0) {
    // Get the latest record for editing
    $draft_data = $result->fetch_assoc();
} else {
    // No previous data, leave it empty
    $draft_data = [
        'blood_glucose' => '',
        'dietary_intake' => '',
        'weight' => '',
        'bmi' => '',
        'blood_pressure' => '',
        'heart_rate' => '',
        'sleep_duration' => '',
        'water_intake' => '',
        'insulin_dosage' => '',
        'symptoms' => ''
    ];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_data'])) {
        // Collect new data
        $blood_glucose = $_POST['bloodGlucoseLevel'];
        $dietary_intake = $_POST['dietary_intake'];
        $weight = $_POST['weight'];
        $bmi = $_POST['BMI'];
        $blood_pressure = $_POST['blood_pressure'];
        $heart_rate = $_POST['heart_rate'];
        $sleep_duration = $_POST['sleep_duration'];
        $water_intake = $_POST['water_intake'];
        $insulin_dosage = $_POST['insulin_dosage'];
        $symptoms = $_POST['symptoms'];

        // Save the new data into the database with timestamp
        $sql = "INSERT INTO patient_health_data 
                (patient_id, blood_glucose, weight, bmi, blood_pressure, heart_rate, sleep_duration, water_intake, insulin_dosage, symptoms, created_at)
                VALUES 
                ('$patient_id', '$blood_glucose', '$weight', '$bmi', '$blood_pressure', '$heart_rate', '$sleep_duration', '$water_intake', '$insulin_dosage', '$symptoms', NOW())";

        if ($conn->query($sql) === TRUE) {
            $message = "স্বাস্থ্য তথ্য সফলভাবে সংরক্ষণ করা হয়েছে।";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if (isset($_POST['evaluate_health'])) {
        // Evaluate health as per previous logic
        $evaluation = "";

        // Blood Glucose Evaluation
        if ($blood_glucose < 3.9) {
            $evaluation .= "Low Blood Glucose (Hypoglycemia). ";
        } elseif ($blood_glucose >= 3.9 && $blood_glucose <= 5.5) {
            $evaluation .= "Normal Blood Glucose (Fasting). ";
        } elseif ($blood_glucose >= 7.0) {
            $evaluation .= "High Blood Glucose (Diabetes). ";
        }

        // Dietary Intake Evaluation (Example logic for input calorie limit)
        $calorie_limit = 2000; // Example value
        if ($dietary_intake < $calorie_limit) {
            $evaluation .= "Dietary intake is below recommended levels. ";
        } else {
            $evaluation .= "Dietary intake is high. ";
        }

        // Blood Pressure Evaluation
        list($systolic, $diastolic) = explode("/", $blood_pressure);
        if ($systolic < 90 || $diastolic < 60) {
            $evaluation .= "Low Blood Pressure (Hypotension). ";
        } elseif ($systolic >= 90 && $systolic <= 120 && $diastolic >= 60 && $diastolic <= 80) {
            $evaluation .= "Normal Blood Pressure. ";
        } elseif ($systolic >= 140 || $diastolic >= 90) {
            $evaluation .= "High Blood Pressure (Hypertension). ";
        }

        // Heart Rate Evaluation
        if ($heart_rate < 60) {
            $evaluation .= "Bradycardia (Low Heart Rate). ";
        } elseif ($heart_rate > 100) {
            $evaluation .= "Tachycardia (High Heart Rate). ";
        } else {
            $evaluation .= "Normal Heart Rate. ";
        }

        // Display evaluation
        $message = $evaluation;
    }
}

// Fetch data for charts (Blood Glucose & BMI for example)
$sql_chart_data = "SELECT created_at, blood_glucose, bmi FROM patient_health_data WHERE patient_id = '$patient_id' ORDER BY created_at DESC";
$result_chart = $conn->query($sql_chart_data);

$chart_dates = [];
$chart_blood_glucose = [];
$chart_bmi = [];
while ($row = $result_chart->fetch_assoc()) {
    $chart_dates[] = $row['created_at'];
    $chart_blood_glucose[] = $row['blood_glucose'];
    $chart_bmi[] = $row['bmi'];
}

$chart_dates_json = json_encode($chart_dates);
$chart_blood_glucose_json = json_encode($chart_blood_glucose);
$chart_bmi_json = json_encode($chart_bmi);

// Example values for Blood Pressure and Heart Rate
$latest_data = $draft_data; // Latest health data fetched earlier

$systolic = explode('/', $latest_data['blood_pressure'])[0];
$diastolic = explode('/', $latest_data['blood_pressure'])[1];
$heart_rate = $latest_data['heart_rate'];


$conn->close();
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>রোগীর ড্যাশবোর্ড</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color:  #008080;
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
            color:  #008080;
            text-align: center;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color:  #008080;
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
            <li class="nav-item">
                <a class="nav-link" href="../Sagor/patientAppointmentForm.php">অ্যাপয়েন্টমেন্ট নিন </a>
            </li>
            <li class="nav-item active">
                    <a class="nav-link" href="patientInterface.php">স্বাস্থ্য সংক্রান্ত তথ্য দিন</a>
                </li>
            <li class="nav-item">
                <a class="nav-link" href="viewHealthData.php">আপনার স্বাস্থ্য সংক্রান্ত তথ্য দেখুন</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewPlan.php">ডায়াবেটিস নিয়ন্ত্রণ তথ্য দেখুন</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="healthGuidelines.php">খাদ্য পরিকল্পনা</a>
            </li>
            <li class="nav-item">
                <form action="../Sagor/patientLogin.php" method="post" class="d-inline">
                    <button type="submit" class="btn btn-danger">লগ আউট</button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="welcome-msg">
        <h3><?php echo htmlspecialchars($patient_name); ?>!</h3>
        <p>আপনার স্বাস্থ্য তথ্য এডিট করুন অথবা নতুন তথ্য যোগ করুন</p>
    </div>

    <!-- Success or Error Message -->
    <?php if (isset($message)) : ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>

    <!-- Health Data Entry Form -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="card">
            <div class="card-header">স্বাস্থ্য তথ্য আপডেট করুন</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="bloodGlucoseLevel">রক্তের গ্লুকোজ স্তর (mg/dL)</label>
                        <input type="number" class="form-control" id="bloodGlucoseLevel" name="bloodGlucoseLevel" value="<?php echo $draft_data['blood_glucose']; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="weight">ওজন (kg)</label>
                        <input type="number" class="form-control" id="weight" name="weight" value="<?php echo $draft_data['weight']; ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="BMI">বিএমআই</label>
                        <input type="number" step="0.1" class="form-control" id="BMI" name="BMI" value="<?php echo $draft_data['bmi']; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="blood_pressure">রক্তচাপ (mmHg)</label>
                        <input type="text" class="form-control" id="blood_pressure" name="blood_pressure" value="<?php echo $draft_data['blood_pressure']; ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="heart_rate">হার্ট রেট (bpm)</label>
                        <input type="number" class="form-control" id="heart_rate" name="heart_rate" value="<?php echo $draft_data['heart_rate']; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sleep_duration">ঘুমের সময় (ঘণ্টা)</label>
                        <input type="number" step="0.1" class="form-control" id="sleep_duration" name="sleep_duration" value="<?php echo $draft_data['sleep_duration']; ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="water_intake">জল খাওয়া (লিটার)</label>
                        <input type="number" step="0.1" class="form-control" id="water_intake" name="water_intake" value="<?php echo $draft_data['water_intake']; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="insulin_dosage">ইনসুলিন ডোজ</label>
                        <input type="number" class="form-control" id="insulin_dosage" name="insulin_dosage" value="<?php echo $draft_data['insulin_dosage']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="symptoms">অলক্ষিত উপসর্গ</label>
                    <textarea class="form-control" id="symptoms" name="symptoms" rows="3" required><?php echo $draft_data['symptoms']; ?></textarea>
                </div>
                <button type="submit" name="submit_data" class="btn btn-primary">ডাটা জমা দিন</button>
            </div>
        </div>
    </form>

    <!-- Health Evaluation -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <button type="submit" name="evaluate_health" class="btn btn-warning btn-sm">স্বাস্থ্য মূল্যায়ন</button>
    </form>

    <!-- Display Health Evaluation Result -->
    <?php if (isset($evaluation)) : ?>
        <div class="card">
            <div class="card-header">স্বাস্থ্য মূল্যায়ন</div>
            <div class="card-body">
                <p><?php echo $message; ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Chart Display Section -->
    <div class="card">
        <div class="card-header">রক্তের গ্লুকোজ স্তর</div>
        <div class="card-body">
            <canvas id="bloodGlucoseChart" width="400" height="200"></canvas>
        </div>
    </div>

    <div class="card">
        <div class="card-header">বিএমআই</div>
        <div class="card-body">
            <canvas id="bmiChart" width="400" height="200"></canvas>
        </div>
    </div>
    
        <div class="card">
        <div class="card-header">রক্তচাপ (Blood Pressure)</div>
        <div class="card-body">
            <canvas id="bloodPressureChart" width="400" height="200"></canvas>
        </div>
    </div>

    <div class="card">
        <div class="card-header">হার্ট রেট (Heart Rate)</div>
        <div class="card-body">
            <canvas id="heartRateChart" width="400" height="200"></canvas>
        </div>
    </div>

</div>

<script>
// Blood Glucose Chart with 90-Degree Lines
var dates = <?php echo $chart_dates_json; ?>;
var bloodGlucose = <?php echo $chart_blood_glucose_json; ?>;
var ctx1 = document.getElementById('bloodGlucoseChart').getContext('2d');
var bloodGlucoseChart = new Chart(ctx1, {
    type: 'bar', // Bar chart
    data: {
        labels: dates,
        datasets: [{
            label: 'Blood Glucose Level (mg/dL)',
            data: bloodGlucose,
            backgroundColor: 'rgba(54, 162, 235, 0.8)', // Solid color for clear visibility
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            barThickness: 5, // Thin bars to look like lines
        }]
    },
    options: {
        indexAxis: 'y', // Horizontal orientation
        scales: {
            x: { // Configure the x-axis
                beginAtZero: true,
                ticks: {
                    stepSize: 20 // Optional: Adjust as per your data
                }
            },
            y: {
                grid: {
                    display: false // Hide grid lines for clarity
                }
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        }
    }
});

// BMI Chart with 90-Degree Lines
var bmiData = <?php echo $chart_bmi_json; ?>;
var ctx2 = document.getElementById('bmiChart').getContext('2d');
var bmiChart = new Chart(ctx2, {
    type: 'bar', // Bar chart
    data: {
        labels: dates,
        datasets: [{
            label: 'BMI',
            data: bmiData,
            backgroundColor: 'rgba(255, 99, 132, 0.8)', // Solid color for clarity
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1,
            barThickness: 5, // Thin bars for line-like appearance
        }]
    },
    options: {
        indexAxis: 'y', // Horizontal orientation
        scales: {
            x: { // Configure the x-axis
                beginAtZero: true,
                ticks: {
                    stepSize: 1 // Optional: Adjust as per your data
                }
            },
            y: {
                grid: {
                    display: false // Hide grid lines for clarity
                }
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        }
    }
});


// Blood Pressure Donut Chart
var bloodPressureData = {
    systolic: 120, // Replace with actual systolic value
    diastolic: 80  // Replace with actual diastolic value
};

var ctx3 = document.getElementById('bloodPressureChart').getContext('2d');
var bloodPressureChart = new Chart(ctx3, {
    type: 'doughnut',
    data: {
        labels: ['Systolic (সিস্টোলিক)', 'Diastolic (ডায়াস্টোলিক)'],
        datasets: [{
            data: [bloodPressureData.systolic, bloodPressureData.diastolic],
            backgroundColor: ['rgba(75, 192, 192, 0.8)', 'rgba(255, 159, 64, 0.8)'],
            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 159, 64, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        responsive: true,
        maintainAspectRatio: false
    }
});

// Heart Rate Donut Chart
var heartRateData = {
    normal: 75, // Replace with actual normal heart rate value
    other: 25  // Replace with additional category or remaining value
};

var ctx4 = document.getElementById('heartRateChart').getContext('2d');
var heartRateChart = new Chart(ctx4, {
    type: 'doughnut',
    data: {
        labels: ['Normal (স্বাভাবিক)', 'Other (অন্যান্য)'],
        datasets: [{
            data: [heartRateData.normal, heartRateData.other],
            backgroundColor: ['rgba(153, 102, 255, 0.8)', 'rgba(255, 99, 132, 0.8)'],
            borderColor: ['rgba(153, 102, 255, 1)', 'rgba(255, 99, 132, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        responsive: true,
        maintainAspectRatio: false
    }
});



</script>

<script>
    var bloodPressureData = {
        systolic: <?php echo $systolic; ?>,
        diastolic: <?php echo $diastolic; ?>
    };
    var heartRateData = {
        normal: <?php echo $heart_rate; ?>,
        other: <?php echo (100 - $heart_rate); ?> // Example: remaining part
    };
</script>


</body>
</html>
