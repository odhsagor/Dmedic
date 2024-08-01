
<?php
session_start();

if (!isset($_SESSION['doctor_id'])) {
    header("Location: doctorLogin.php");
    exit();
}

$doctor_id = $_SESSION['doctor_id'];
$search_patient_id = isset($_GET['search_patient_id']) ? $_GET['search_patient_id'] : '';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dmedic";

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM prescriptions WHERE doctor_id = :doctor_id";
if (!empty($search_patient_id)) {
    $sql .= " AND patient_id = :patient_id";
}

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':doctor_id', $doctor_id, PDO::PARAM_INT);
if (!empty($search_patient_id)) {
    $stmt->bindParam(':patient_id', $search_patient_id, PDO::PARAM_INT);
}
$stmt->execute();
$prescriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Prescriptions</title>
    <link rel="stylesheet" href="../css/patientMedicalReport.css">
</head>
<body>
<header>
        <div class="header-top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="top-bar-info list-inline-item pl-0 mb-0">
                            <li class="list-inline-item"><a href="mailto:support@dmadic.com"><i class="icofont-support-faq mr-2"></i>support@dmadic.com</a></li>
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
    <div class="container">
        <h1>View Prescriptions</h1>
        <form method="get" class="search-bar">
            <input type="text" name="search_patient_id" placeholder="Search by Patient ID" value="<?php echo htmlspecialchars($search_patient_id); ?>">
            <button type="submit">Search</button>
        </form>
        <?php if (empty($prescriptions)): ?>
            <p>No prescriptions found.</p>
        <?php else: ?>
            <?php foreach ($prescriptions as $prescription): ?>
                <div class="prescription">
                    <div class="prescription-header">
                        <div class="left">
                            <p><strong>Date:</strong> <?= htmlspecialchars($prescription['created_at']) ?></p>
                            <p><strong>Doctor Name:</strong> Dr. <?= htmlspecialchars($prescription['doctor_name']) ?></p>
                            <p><strong>Doctor Type:</strong> <?= htmlspecialchars($prescription['doctor_type']) ?></p>
                            <p><strong>Doctor ID:</strong> <?= htmlspecialchars($doctor_id) ?></p>
                        </div>
                        <div class="right">
                            <p><strong>Patient Name:</strong> <?= htmlspecialchars($prescription['patient_name']) ?></p>
                            <p><strong>Appointment ID:</strong> <?= htmlspecialchars($prescription['appointment_id']) ?></p>
                            <p><strong>Patient ID:</strong> <?= htmlspecialchars($prescription['patient_id']) ?></p>
                        </div>
                    </div>
                    <p><strong>Prescription:</strong> <?= htmlspecialchars($prescription['prescription_text']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>


    <footer>
        <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <h3>About Us</h3>
                            <p>Dmadic is committed to providing the best medical care. Our team of experts is here to help you with all your health needs.</p>
                        </div>
                        <div class="col-lg-4">
                            <h3>Quick Links</h3>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <h3>Contact Us</h3>
                            <p><i class="icofont-location-pin"></i> Dhaka, Bangladesh</p>
                            <p><i class="icofont-phone"></i> 880 26566</p>
                            <p><i class="icofont-envelope"></i> support@dmadic.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                        &copy; 2024, Designed & Developed by <a target="_blank">Sagor</a>
                        </div>
                    </div>
                </div>
            </div>
</footer>

</body>
</html>
