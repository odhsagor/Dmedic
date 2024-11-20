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
     <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
    <!-- Slick Slider  CSS -->
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../css/style.css">
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
        <div class="welcome-msg">
            স্বাগতম, <?php echo $patient_name; ?>!
        </div>


        <!-- Slider Start -->
        <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-xl-7">
                        <div class="block">
                            <div class="divider mb-3"></div>
                            <span class="text-uppercase text-sm letter-spacing ">সম্পূর্ণ ডায়াবেটিস কেয়ার সল্যুশন</span>
                            <h1 class="mb-3 mt-3">আপনার সবচেয়ে বিশ্বাসযোগ্য ডায়াবেটিস কেয়ার পার্টনার</h1>
                            <p class="mb-4 pr-5">আস্থা নিয়ে ডায়াবেটিস পরিচালনা এবং স্বাস্থ্যকর জীবনের জন্য বিশেষজ্ঞের পরামর্শ সহ সেবা পান।</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="feature-block d-lg-flex">
                            <div class="feature-item mb-5 mb-lg-0">
                                <div class="feature-icon mb-4">
                                    <i class="icofont-surgeon-alt"></i>
                                </div>
                                <span>২৪ ঘন্টা সেবা</span>
                                <h4 class="mb-3">অনলাইন অ্যাপয়েন্টমেন্ট</h4>
                                <p class="mb-4">২৪/৭ জরুরি সহায়তা পান। আমরা পরিবারের চিকিৎসার নীতি চালু করেছি সম্পূর্ণ ডায়াবেটিস যত্নের জন্য।</p>
                            </div>
                        
                            <div class="feature-item mb-5 mb-lg-0">
                                <div class="feature-icon mb-4">
                                    <i class="icofont-ui-clock"></i>
                                </div>
                                <span>সময়সূচি</span>
                                <h4 class="mb-3">কর্মঘণ্টা</h4>
                                <ul class="w-hours list-unstyled">
                                    <li class="d-flex justify-content-between">রবি - বুধ : <span>৮:০০ - ১৭:০০</span></li>
                                    <li class="d-flex justify-content-between">বৃহস্পতি - শুক্র : <span>৯:০০ - ১৭:০০</span></li>
                                    <li class="d-flex justify-content-between">শনি - রবি : <span>১০:০০ - ১৭:০০</span></li>
                                </ul>
                            </div>
                        
                            <div class="feature-item mb-5 mb-lg-0">
                                <div class="feature-icon mb-4">
                                    <i class="icofont-support"></i>
                                </div>
                                <span>জরুরি কেস</span>
                                <h4 class="mb-3">২৬৫৬৬</h4>
                                <p>জরুরি সহায়তা ২৪/৭ পান এবং পরিবারের চিকিৎসার নীতির সাথে সংযুক্ত হন। যে কোন জরুরি ডায়াবেটিস যত্নের প্রয়োজন হলে আমাদের সাথে যোগাযোগ করুন।</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section appoinment">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="appoinment-content">
                            <img src="images/Dmadic Poster.png" alt="" class="img-fluid">
                            <div class="emergency">
                                <h2 class="text-lg"><i class="icofont-phone-circle text-lg"></i>২৬৫৬৬</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <div class="appoinment-wrap mt-5 mt-lg-0">
                            <h2 class="mb-2 title-color">আমাদের সাথে যোগাযোগ করুন</h2>
                            <p class="mb-4">অত্যন্ত যত্ন সহকারে সেবা এবং উন্নত নির্দেশনা দিয়ে ডায়াবেটিস পরিচালনা করুন।</p>
                            <form id="#" class="appoinment-form" method="post" action="form_handler.php">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                <option>বিভাগ নির্বাচন করুন</option>
                                                <option>ডাক্তারের জন্য</option>
                                                <option>ফার্মাসিস্টের জন্য</option>
                                                <option>ডায়েটিশিয়ানের জন্য</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input name="name" id="name" type="text" class="form-control" placeholder="আপনার নাম">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input name="email" id="email" type="email" class="form-control" placeholder="ইমেইল ঠিকানা">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input name="phone" id="phone" type="text" class="form-control" placeholder="ফোন নম্বর">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-2 mb-4">
                                        <textarea name="message" id="message" class="form-control" rows="6" placeholder="আপনার বার্তা"></textarea>
                                    </div>
                                    <a class="btn btn-main btn-round-full" href="#">সাবমিট করুন<i class="icofont-simple-right ml-2"></i></a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<!-- Essential Scripts -->
<!-- Main jQuery -->
<script src="plugins/jquery/jquery.js"></script>
<script src="plugins/bootstrap/js/popper.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/slick-carousel/slick/slick.min.js"></script>
<script src="plugins/shuffle/shuffle.min.js"></script>
<script src="js/script.js"></script>
            
</body>
</html>
