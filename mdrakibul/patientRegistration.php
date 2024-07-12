<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Orbitor, business, company, agency, modern, bootstrap4, tech, software">
  <meta name="author" content="themefisher.com">

  <title>Dmedic</title>
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
              <li class="list-inline-item"><a href="mailto:support@dmadic.com"><i class="icofont-support-faq mr-2"></i>support@dmadic.com</a></li>
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
          <h2>Benefits of Dmedic</h2>
          <ul>
            <li>Professional healthcare services</li>
            <li>Specialized treatments for diabetes</li>
            <li>Expert consultations</li>
            <li>Advanced medical technologies</li>
            <li>Community support</li>
          </ul>

        <div class="PatientImg">
				  <div class="PatientImg">
          <img src="../images/DmadicPatient.png" alt="" class="img-fluid">
				  </div>
			 </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-container">
          <h2>Patient Registration</h2>
          <form action="patientRegistrationBackend.php" method="post">
            <label for="first_name">First Name *</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name *</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="houseNumber">House Number *</label>
            <input type="houseNumber" id="houseNumber" name="houseNumber" required>

            <label for="roadNumber">Road Number *</label>
            <input type="roadNumber" id="roadNumber" name="roadNumber" required>

            <label for="areaName">Area Name *</label>
            <input type="areaName" id="areaName" name="areaName" required>


            <label for="dob">Date of Birth *</label>
            <input type="date" id="dob" name="dob" required>

            <label for="gender">Gender *</label>
            <select id="gender" name="gender" required>
              <option value="Select">Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>

            <label for="PatientMail">Email *</label>
            <input type="PatientMail" id="PatientMail" name="PatientMail" required>

            <label for="ContactNumber">Contact Number *</label>
            <input type="ContactNumber" id="ContactNumber" name="ContactNumber" required>

            <label for="password">Password *</label>
            <input type="password" id="password" name="password" required>

            <div class="form-footer">
              <button type="submit">Register</button>
              <span class="login-link">
                Already have an account? <a href="patientLogin.php">Login</a>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript files -->
  <script src="plugins/jquery/jquery.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>