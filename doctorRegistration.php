<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">
  <title>Dmedic</title>
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
  <link rel="stylesheet" href="drRegi.css">
</head>
<body id="top">
<header>
  <div class="header-top-bar">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <ul class="top-bar-info list-inline-item pl-0 mb-0">
            <li class="list-inline-item"><a href="mailto:support@diabetescoach.com"><i class="icofont-support-faq mr-2"></i>support@diabetescoach.com</a></li>
            <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Dmedic</li>
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
  <nav class="navbar navbar-expand-lg navigation" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="images/Dmedic.png" alt="" class="img-fluid">
      </a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icofont-navigation-menu"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarmain">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">HOME</a>
          </li>
          <!-- PHARMACIST -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PHARMACIST<i class="icofont-thin-down"></i></a>
            <ul class="dropdown-menu" aria-labelledby="dropdown02">
              <li><a class="dropdown-item" href="#">Medicine</a></li>
              <li><a class="dropdown-item" href="#">Diabetes Care</a></li>
            </ul>
          </li>
          <!-- DIETITIAN -->
          <li class="nav-item active">
            <a class="nav-link" href="#">DIETITIAN </a>
          </li>
          <!-- DOCTORS -->
          <li class="nav-item active">
            <a class="nav-link" href="doctorRegistration.php">For Doctors</a>
          </li>
          <!-- HOSPITAL -->
          <li class="nav-item active">
            <a class="nav-link" href="#">HOSPITAL</a>
          </li>
          <!-- SIGNIN And SIGNUP BUTTON -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SIGNIN <i class="icofont-thin-down"></i></a>
            <ul class="dropdown-menu" aria-labelledby="dropdown02">
              <li><a class="dropdown-item" href="#">SIGNIN</a></li>
              <li><a class="dropdown-item" href="#">SIGNUP</a></li>
            </ul>
          </li>
        </ul>
      </div>
	  </nav>
      <!-- Doctor Registration Form -->
      <div class="form-container">
        <h2>Doctor Registration</h2>
        <form action="register.php" method="post">
          <label for="title">Title *</label>
          <select id="title" name="title" required>
            <option value="Dr">Dr</option>
            <option value="Prof">Prof</option>
			<option value="Prof. Dr.">Prof. Dr.</option>
          </select>
          <label for="first_name">First Name *</label>
          <input type="text" id="first_name" name="first_name" required>
          <label for="last_name">Last Name *</label>
          <input type="text" id="last_name" name="last_name" required>
          <label for="dob">Date of Birth *</label>
          <input type="date" id="dob" name="dob" required>
          <label for="gender">Gender *</label>
          <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
			<option value="female">Others</option>
          </select>
          <label for="district">District *</label>
          <select id="district" name="district" required>
		  		<option value="Bagerhat">Bagerhat</option>
				<option value="Bandarban">Bandarban</option>
				<option value="Barguna">Barguna</option>
				<option value="Barisal">Barisal</option>
				<option value="Bhola">Bhola</option>
				<option value="Bogura">Bogura</option>
				<option value="Brahmanbaria">Brahmanbaria</option>
				<option value="Chandpur">Chandpur</option>
				<option value="Chattogram">Chattogram (Chittagong)</option>
				<option value="Chuadanga">Chuadanga</option>
				<option value="Comilla">Comilla</option>
				<option value="Cox's Bazar">Cox's Bazar</option>
				<option value="Dhaka">Dhaka</option>
				<option value="Dinajpur">Dinajpur</option>
				<option value="Faridpur">Faridpur</option>
				<option value="Feni">Feni</option>
				<option value="Gaibandha">Gaibandha</option>
				<option value="Gazipur">Gazipur</option>
				<option value="Gopalganj">Gopalganj</option>
				<option value="Habiganj">Habiganj</option>
				<option value="Jamalpur">Jamalpur</option>
				<option value="Jashore">Jashore (Jessore)</option>
				<option value="Jhalokathi">Jhalokathi</option>
				<option value="Jhenaidah">Jhenaidah</option>
				<option value="Joypurhat">Joypurhat</option>
				<option value="Khagrachari">Khagrachari</option>
				<option value="Khulna">Khulna</option>
				<option value="Kishoreganj">Kishoreganj</option>
				<option value="Kurigram">Kurigram</option>
				<option value="Kushtia">Kushtia</option>
				<option value="Lakshmipur">Lakshmipur</option>
				<option value="Lalmonirhat">Lalmonirhat</option>
				<option value="Madaripur">Madaripur</option>
				<option value="Magura">Magura</option>
				<option value="Manikganj">Manikganj</option>
				<option value="Meherpur">Meherpur</option>
				<option value="Moulvibazar">Moulvibazar</option>
				<option value="Munshiganj">Munshiganj</option>
				<option value="Mymensingh">Mymensingh</option>
				<option value="Naogaon">Naogaon</option>
				<option value="Narail">Narail</option>
				<option value="Narayanganj">Narayanganj</option>
				<option value="Narsingdi">Narsingdi</option>
				<option value="Natore">Natore</option>
				<option value="Netrokona">Netrokona</option>
				<option value="Nilphamari">Nilphamari</option>
				<option value="Noakhali">Noakhali</option>
				<option value="Pabna">Pabna</option>
				<option value="Panchagarh">Panchagarh</option>
				<option value="Patuakhali">Patuakhali</option>
				<option value="Pirojpur">Pirojpur</option>
				<option value="Rajbari">Rajbari</option>
				<option value="Rajshahi">Rajshahi</option>
				<option value="Rangamati">Rangamati</option>
				<option value="Rangpur">Rangpur</option>
				<option value="Satkhira">Satkhira</option>
				<option value="Shariatpur">Shariatpur</option>
				<option value="Sherpur">Sherpur</option>
				<option value="Sirajganj">Sirajganj</option>
				<option value="Sunamganj">Sunamganj</option>
				<option value="Sylhet">Sylhet</option>
				<option value="Tangail">Tangail</option>
				<option value="Thakurgaon">Thakurgaon</option>
          </select>
          <label for="national_id">National ID / Passport Number *</label>
          <input type="text" id="national_id" name="national_id" required>
          <label for="registration_number">Registration Number (BMDC) *</label>
          <input type="text" id="registration_number" name="registration_number" required>
          <label for="doctor_type">Doctor Type *</label>
          <select id="doctor_type" name="doctor_type" required>
            <option value="Endocrinology">Endocrinology</option>
            <option value="Metabolism">Metabolism</option>
			<option value="Endocrinology & Metabolism">Endocrinology & Metabolism</option>
          </select>
          <label for="mobile_number">Mobile Number *</label>
          <input type="tel" id="mobile_number" name="mobile_number" required>
          <label for="email">Email *</label>
          <input type="email" id="email" name="email" required>
          <label for="password">Password *</label>
          <input type="password" id="password" name="password" required>
          <div class="terms">
            <input type="checkbox" id="terms" name="terms" required>
            <label for="terms">I accept and agree <a href="#">Terms of services</a> and <a href="#">Privacy Policy</a>.</label>
          </div>
          <div class="form-footer">
			<button type="submit">Register</button>
			<span class="login-link">
				Already have an account? <a href="#">Login</a>
			</span>
		  </div>

        </form>
      </div>
      <!-- End Doctor Registration Form -->
    </div>
</header>
<!-- Include JavaScript files -->
<script src="plugins/jquery/jquery.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
