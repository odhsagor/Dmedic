<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ডিমেডিক</title>
  <!-- ফেভিকন -->
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
  <!-- বুটস্ট্র্যাপ CSS -->
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  <!-- আইকন ফন্ট CSS -->
  <link rel="stylesheet" href="../plugins/icofont/icofont.min.css">
  <!-- প্রধান স্টাইলশিট -->
  <link rel="stylesheet" href="../css/drRegi.css">
</head>
<body id="top">
  <header>
    <div class="header-top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <ul class="top-bar-info list-inline-item pl-0 mb-0">
              <li class="list-inline-item"><a href="mailto:support@dmadic.com"><i class="icofont-support-faq mr-2"></i>support@dmadic.com</a></li>
              <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>ডিমেডিক</li>
            </ul>
          </div>
          <div class="col-lg-6">
            <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
              <a href="tel:+23-345-67890">
                <span>এখন কল করুন : </span>
                <span class="h4">26566</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navigation" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="../index.php">
          <img src="images/Dmedic.png" alt="" class="img-fluid">
        </a>
      </div>
    </nav>
  </header>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <div class="benefits-container">
          <h2>ডমেডিকের সুবিধাসমূহ</h2>
          <ul>
            <li>পেশাদার স্বাস্থ্যসেবা পরিষেবা</li>
            <li>ডায়াবেটিসের জন্য বিশেষায়িত চিকিৎসা</li>
            <li>বিশেষজ্ঞ পরামর্শ</li>
            <li>উন্নত চিকিৎসা প্রযুক্তি</li>
            <li>কমিউনিটি সাপোর্ট</li>
          </ul>

          <div class="PatientImg">
            <img src="../images/DmadicPatient.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-container">
          <h2>রোগী নিবন্ধন</h2>
          <form action="patientRegistrationBackend.php" method="post">
            <label for="first_name">প্রথম নাম *</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">শেষ নাম *</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="houseNumber">বাড়ির নম্বর *</label>
            <input type="text" id="houseNumber" name="houseNumber" required>

            <label for="roadNumber">রাস্তার নম্বর *</label>
            <input type="text" id="roadNumber" name="roadNumber" required>

            <label for="areaName">এলাকার নাম *</label>
            <input type="text" id="areaName" name="areaName" required>

            <label for="dob">জন্ম তারিখ *</label>
            <input type="date" id="dob" name="dob" required>

            <label for="gender">লিঙ্গ *</label>
            <select id="gender" name="gender" required>
              <option value="Select">লিঙ্গ নির্বাচন করুন</option>
              <option value="male">পুরুষ</option>
              <option value="female">মহিলা</option>
              <option value="other">অন্যান্য</option>
            </select>

            <label for="PatientMail">ইমেইল *</label>
            <input type="email" id="PatientMail" name="PatientMail" required>

            <label for="ContactNumber">যোগাযোগ নম্বর *</label>
            <input type="text" id="ContactNumber" name="ContactNumber" required>

            <label for="password">পাসওয়ার্ড *</label>
            <input type="password" id="password" name="password" required>

            <div class="form-footer">
              <button type="submit">নিবন্ধন করুন</button>
              <span class="login-link">
                ইতিমধ্যেই একটি অ্যাকাউন্ট রয়েছে? <a href="patientLogin.php">লগইন</a>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="plugins/jquery/jquery.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
