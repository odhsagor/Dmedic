
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
    <title>প্রেসক্রিপশন দেখুন</title>
    <link rel="stylesheet" href="../css/patientMedicalReport.css">
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
                                <span>কল করুন: </span>
                                <span class="h4">২৬৫৬৬</span>
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
                        <li class="nav-item"><a class="nav-link" href="doctorDashboard.php">ড্যাশবোর্ড</a></li>
                        <li class="nav-item"><a class="nav-link" href="patientMedicalReport.php">রিপোর্ট</a></li>
                        <li class="nav-item"><a class="nav-link" href="docELogin.php">লগ আউট</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>প্রেসক্রিপশন দেখুন</h1>
        <form method="get" class="search-bar">
            <input type="text" name="search_patient_id" placeholder="রোগীর আইডি দ্বারা অনুসন্ধান করুন" value="<?php echo htmlspecialchars($search_patient_id); ?>">
            <button type="submit">অনুসন্ধান</button>
        </form>
        <?php if (empty($prescriptions)): ?>
            <p>কোনো প্রেসক্রিপশন পাওয়া যায়নি।</p>
        <?php else: ?>
            <?php foreach ($prescriptions as $prescription): ?>
                <div class="prescription">
                    <div class="prescription-header">
                        <div class="left">
                            <p><strong>তারিখ:</strong> <?= htmlspecialchars($prescription['created_at']) ?></p>
                            <p><strong>ডাক্তার নাম:</strong> ডাঃ <?= htmlspecialchars($prescription['doctor_name']) ?></p>
                            <p><strong>ডাক্তার প্রকার:</strong> <?= htmlspecialchars($prescription['doctor_type']) ?></p>
                            <p><strong>ডাক্তার আইডি:</strong> <?= htmlspecialchars($doctor_id) ?></p>
                        </div>
                        <div class="right">
                            <p><strong>রোগীর নাম:</strong> <?= htmlspecialchars($prescription['patient_name']) ?></p>
                            <p><strong>অ্যাপয়েন্টমেন্ট আইডি:</strong> <?= htmlspecialchars($prescription['appointment_id']) ?></p>
                            <p><strong>রোগীর আইডি:</strong> <?= htmlspecialchars($prescription['patient_id']) ?></p>
                        </div>
                    </div>
                    <p><strong>প্রেসক্রিপশন:</strong> <?= htmlspecialchars($prescription['prescription_text']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>


    <footer>
        <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <h3>আমাদের সম্পর্কে</h3>
                            <p>ডিমেডিক সর্বোচ্চ মানের চিকিৎসা সেবা প্রদানে প্রতিশ্রুতিবদ্ধ। আমাদের অভিজ্ঞ দল আপনার স্বাস্থ্য চাহিদা পূরণে সদা প্রস্তুত।</p>
                        </div>
                        <div class="col-lg-4">
                            <h3>দ্রুত লিংক</h3>
                            <ul>
                                <li><a href="#">হোম</a></li>
                                <li><a href="#">আমাদের সম্পর্কে</a></li>
                                <li><a href="#">সেবা</a></li>
                                <li><a href="#">যোগাযোগ করুন</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <h3>যোগাযোগ করুন</h3>
                            <p><i class="icofont-location-pin"></i> ঢাকা, বাংলাদেশ</p>
                            <p><i class="icofont-phone"></i> ৮৮০ ২৬৫৬৬</p>
                            <p><i class="icofont-envelope"></i> support@dmedic.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                        &copy; ২০২৪, ডিজাইন ও উন্নয়ন করেছেন  <a target="_blank">সাগর</a>
                        </div>
                    </div>
                </div>
            </div>
</footer>

</body>
</html>
