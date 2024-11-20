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
    if (isset($_POST['submit_data'])) {
        // Save data to the database
        $blood_glucose = $_POST['bloodGlucoseLevel'];
        $dietary_intake = $_POST['dietary_intake'];
        $weight = $_POST['weight'];
        $bmi = $_POST['BMI'];
        $blood_pressure = $_POST['blood_pressure'];
        $heart_rate = $_POST['heart_rate'];
        $sleep_duration = $_POST['sleep_duration'];
        $water_intake = $_POST['water_intake'];

        // Save to database
        $sql = "INSERT INTO patient_health_data 
                (patient_id, blood_glucose, dietary_intake, weight, bmi, blood_pressure, heart_rate, sleep_duration, water_intake)
                VALUES 
                ('$patient_id', '$blood_glucose', '$dietary_intake', '$weight', '$bmi', '$blood_pressure', '$heart_rate', '$sleep_duration', '$water_intake')";

        if ($conn->query($sql) === TRUE) {
            $message = "স্বাস্থ্য তথ্য সফলভাবে সংরক্ষণ করা হয়েছে।";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    

    if (isset($_POST['evaluate_health'])) {
        // Evaluate health condition
        $blood_glucose = $_POST['bloodGlucoseLevel'];
        $dietary_intake = $_POST['dietary_intake'];
        $blood_pressure = $_POST['blood_pressure'];
        $heart_rate = $_POST['heart_rate'];

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
            background-color: #008080;
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
            color: #008080;
            text-align: center;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #008080;
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
                    <a class="nav-link" href="../Sagor/patientAppointmentForm.php">অ্যাপয়েন্টমেন্ট নিন</a>
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
            স্বাগতম, <?php echo $patient_name; ?>!
        </div>

        <div class="card">
            <div class="card-header">
                আপনার স্বাস্থ্য তথ্য প্রদান করুন
            </div>
            <div class="card-body">
                <form action="patientInterface.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="bloodGlucoseLevel">রক্তের গ্লুকোজ স্তর</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" id="bloodGlucoseLevel" name="bloodGlucoseLevel" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="insulin_dosage">ইনসুলিন ডোজ</label>
                            <input type="text" class="form-control form-control-sm" id="insulin_dosage" name="insulin_dosage" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="medication_intake">ঔষধ গ্রহণ</label>
                            <select class="form-control form-control-sm" id="medication_intake" name="medication_intake">
                                <option value="Yes">হ্যাঁ</option>
                                <option value="No">না</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dietary_intake">খাদ্য গ্রহণ</label>
                            <select class="form-control form-control-sm" id="dietary_intake" name="dietary_intake">
                                <option value="Yes">হ্যাঁ</option>
                                <option value="No">না</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="weight">ওজন (কেজি)</label>
                            <input type="number" step="0.1" class="form-control form-control-sm" id="weight" name="weight" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="symptoms">লক্ষণ</label>
                            <select class="form-control form-control-sm" id="symptoms" name="symptoms">
                                <option>কোনওটি নয়</option>
                                <option>জ্বর</option>
                                <option>কাশি</option>
                                <option>ক্লান্তি</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="BMI">বিএমআই</label>
                            <input type="number" step="0.1" class="form-control form-control-sm" id="BMI" name="BMI" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="blood_pressure">রক্তচাপ</label>
                            <input type="text" class="form-control form-control-sm" id="blood_pressure" name="blood_pressure" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="heart_rate">হৃদস্পন্দন হার</label>
                            <input type="number" class="form-control form-control-sm" id="heart_rate" name="heart_rate" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sleep_duration">ঘুমের সময়কাল (ঘন্টা)</label>
                            <input type="number" step="0.1" class="form-control form-control-sm" id="sleep_duration" name="sleep_duration" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="water_intake">জলের পরিমাণ (লিটার)</label>
                            <input type="number" step="0.1" class="form-control form-control-sm" id="water_intake" name="water_intake" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">তথ্য জমা দিন</button>
                    <button type="submit" name="evaluate_health" class="btn btn-secondary btn-sm">স্বাস্থ্য অবস্থা দেখুন</button>
                </form>
            </div>
        </div>

        <?php if (!empty($message)): ?>
            <div class="alert alert-info" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
