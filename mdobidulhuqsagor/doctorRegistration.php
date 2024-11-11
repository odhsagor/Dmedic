<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ডিমেডিক</title>
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font CSS -->
  <link rel="stylesheet" href="../plugins/icofont/icofont.min.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="../css/drRegi.css">
</head>
<body id="top">
  <header>
    <div class="header-top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <ul class="top-bar-info list-inline-item pl-0 mb-0">
              <li class="list-inline-item"><a href="mailto:support@dmedic.com"><i class="icofont-support-faq mr-2"></i>support@dmedic.com</a></li>
              <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>ডিমেডিক</li>
            </ul>
          </div>
          <div class="col-lg-6">
            <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
              <a href="tel:+23-345-67890">
                <span>কল করুন : </span>
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
          <h2>ডিমেডিকের সুবিধাসমূহ</h2>
          <ul>
            <li>পেশাদার স্বাস্থ্যসেবা পরিষেবা</li>
            <li>ডায়াবেটিসের জন্য বিশেষায়িত চিকিৎসা</li>
            <li>বিশেষজ্ঞ পরামর্শ</li>
            <li>উন্নত চিকিৎসা প্রযুক্তি</li>
            <li>সম্প্রদায়ের সহায়তা</li>
          </ul>
          <div class="PatientImg">
				    <div class="PatientImg">
            <img src="../images/DmadicDoctor.png" alt="" class="img-fluid">
				    </div>
			    </div>
          <div class="PatientImg">
				    <div class="PatientImg">
            <img src="../images/hellodoctor.png" alt="" class="img-fluid">
				    </div>
			    </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-container">
          <h2>ডাক্তার নিবন্ধন</h2>
          <form action="doctorRegBackend.php" method="post">
            <label for="title">উপাধি *</label>
            <select id="title" name="title" required>
              <option value="Select">উপাধি নির্বাচন করুন</option>
              <option value="Dr">ডাঃ</option>
              <option value="Prof">প্রফেসর</option>
              <option value="Prof. Dr.">প্রফেসর ডাঃ</option>
            </select>
            <label for="first_name">প্রথম নাম *</label>
            <input type="text" id="first_name" name="first_name" required>
            <label for="last_name">শেষ নাম *</label>
            <input type="text" id="last_name" name="last_name" required>
            <label for="dob">জন্ম তারিখ *</label>
            <input type="date" id="dob" name="dob" required>
            <label for="gender">লিঙ্গ *</label>
            <select id="gender" name="gender" required>
              <option value="Select">লিঙ্গ নির্বাচন করুন</option>
              <option value="male">পুরুষ</option>
              <option value="female">মহিলা</option>
              <option value="other">অন্যান্য</option>
            </select>
              <label for="district">জেলা *</label>
              <select id="district" name="district" required>
                <option value="Select">জেলা নির্বাচন করুন</option>
                <option value="Bagerhat">বাগেরহাট</option>
                <option value="Bandarban">বান্দরবান</option>
                <option value="Barguna">বরগুনা</option>
                <option value="Barisal">বরিশাল</option>
                <option value="Bhola">ভোলা</option>
                <option value="Bogura">বগুড়া</option>
                <option value="Brahmanbaria">ব্রাহ্মণবাড়িয়া</option>
                <option value="Chandpur">চাঁদপুর</option>
                <option value="Chattogram">চট্টগ্রাম</option>
                <option value="Chuadanga">চুয়াডাঙ্গা</option>
                <option value="Comilla">কুমিল্লা</option>
                <option value="Cox's Bazar">কক্সবাজার</option>
                <option value="Dhaka">ঢাকা</option>
                <option value="Dinajpur">দিনাজপুর</option>
                <option value="Faridpur">ফরিদপুর</option>
                <option value="Feni">ফেনী</option>
                <option value="Gaibandha">গাইবান্ধা</option>
                <option value="Gazipur">গাজীপুর</option>
                <option value="Gopalganj">গোপালগঞ্জ</option>
                <option value="Habiganj">হবিগঞ্জ</option>
                <option value="Jamalpur">জামালপুর</option>
                <option value="Jashore">যশোর</option>
                <option value="Jhalokathi">ঝালকাঠি</option>
                <option value="Jhenaidah">ঝিনাইদহ</option>
                <option value="Joypurhat">জয়পুরহাট</option>
                <option value="Khagrachari">খাগড়াছড়ি</option>
                <option value="Khulna">খুলনা</option>
                <option value="Kishoreganj">কিশোরগঞ্জ</option>
                <option value="Kurigram">কুড়িগ্রাম</option>
                <option value="Kushtia">কুষ্টিয়া</option>
                <option value="Lakshmipur">লক্ষ্মীপুর</option>
                <option value="Lalmonirhat">লালমনিরহাট</option>
                <option value="Madaripur">মাদারীপুর</option>
                <option value="Magura">মাগুরা</option>
                <option value="Manikganj">মানিকগঞ্জ</option>
                <option value="Meherpur">মেহেরপুর</option>
                <option value="Moulvibazar">মৌলভীবাজার</option>
                <option value="Munshiganj">মুন্সীগঞ্জ</option>
                <option value="Mymensingh">ময়মনসিংহ</option>
                <option value="Naogaon">নওগাঁ</option>
                <option value="Narail">নড়াইল</option>
                <option value="Narayanganj">নারায়ণগঞ্জ</option>
                <option value="Narsingdi">নরসিংদী</option>
                <option value="Natore">নাটোর</option>
                <option value="Netrokona">নেত্রকোনা</option>
                <option value="Nilphamari">নীলফামারী</option>
                <option value="Noakhali">নোয়াখালী</option>
                <option value="Pabna">পাবনা</option>
                <option value="Panchagarh">পঞ্চগড়</option>
                <option value="Patuakhali">পটুয়াখালী</option>
                <option value="Pirojpur">পিরোজপুর</option>
                <option value="Rajbari">রাজবাড়ী</option>
                <option value="Rajshahi">রাজশাহী</option>
                <option value="Rangamati">রাঙামাটি</option>
                <option value="Rangpur">রংপুর</option>
                <option value="Satkhira">সাতক্ষীরা</option>
                <option value="Shariatpur">শরীয়তপুর</option>
                <option value="Sherpur">শেরপুর</option>
                <option value="Sirajganj">সিরাজগঞ্জ</option>
                <option value="Sunamganj">সুনামগঞ্জ</option>
                <option value="Sylhet">সিলেট</option>
                <option value="Tangail">টাঙ্গাইল</option>
                <option value="Thakurgaon">ঠাকুরগাঁও</option>
              </select>
                <label for="doctor_type">ডাক্তারের ধরন *</label>
                <select id="doctor_type" name="doctor_type" required>
                  <option value="Select">ডাক্তারের ধরন নির্বাচন করুন</option>
                  <option value="Endocrinology">এন্ডোক্রিনোলজি</option>
                  <option value="Metabolism">মেটাবলিজম</option>
                  <option value="Endocrinology & Metabolism">এন্ডোক্রিনোলজি এবং মেটাবলিজম</option>
                  <option value="fetal cardiologists">ভ্রূণ হৃদরোগ বিশেষজ্ঞ</option>
                  <option value="cardiac geneticists">হৃদরোগ বিষয়ক জেনেটিসিস্ট</option>
                  <option value="cardiac imaging specialists">হৃদ ইমেজিং বিশেষজ্ঞ</option>
                  <option value="electrophysiologists">ইলেক্ট্রোফিজিওলজিস্ট</option>
                  <option value="exercise physiologists">ব্যায়াম ফিজিওলজিস্ট</option>
                  <option value="heart transplant specialists">হৃদ প্রতিস্থাপন বিশেষজ্ঞ</option>
                  <option value="heart surgeons">হৃদরোগের সার্জন</option>
                </select>
            <label for="mobile_number">মোবাইল নম্বর *</label>
            <input type="tel" id="mobile_number" name="mobile_number" required>
            <label for="email">ইমেইল *</label>
            <input type="email" id="email" name="email" required>
            <label for="password">পাসওয়ার্ড *</label>
            <input type="password" id="password" name="password" required>
            <div class="terms">
              <input type="checkbox" id="terms" name="terms" required>
              <label for="terms">আমি <a href="#">সেবার শর্তাবলী</a> এবং <a href="#">গোপনীয়তা নীতি</a> গ্রহণ ও সম্মত।</label>
            </div>
            <div class="form-footer">
              <button type="submit">নিবন্ধন করুন</button>
              <span class="login-link">
                ইতিমধ্যেই একটি অ্যাকাউন্ট আছে? <a href="docELogin.php">লগইন</a>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript ফাইল -->
  <script src="plugins/jquery/jquery.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
