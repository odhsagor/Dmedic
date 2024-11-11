

<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Dmadic</title>


  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/icofont/icofont.min.css">
  <link rel="stylesheet" href="../plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="../plugins/slick-carousel/slick/slick-theme.css">
  <link rel="stylesheet" href="../css/doctorLogin.css">

</head>

<body id="top">

<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@dmedic.com"><i class="icofont-support-faq mr-2"></i>support@dmedic.com</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Dmadic</li>
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
		 	 <a class="navbar-brand" href="mdobidulhuqsagor/index.php">
			  	<img src="../images/Dmedic.png" alt="" class="img-fluid">
			  </a>

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="../index.php">HOME</a>
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
					<a class="nav-link" href="doctorInterpage.php"> For Doctors</a>
				</li>

				<!-- HOSPITAL -->

				  <li class="nav-item active">
					<a class="nav-link" href="#">HOSPITAL</a>
				  </li>

				<!-- SIGNIN And SIGNUP BUTTON Here -->
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SIGNIN <i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown02">
						<li><a class="dropdown-item" href="#">SIGNIN</a></li>
						<li><a class="dropdown-item" href="#">SIGNUP</a></li>
					</ul>
			  	</li>

			</ul>
		  </div>
		</div>
	</nav>
</header>

<main>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <section class="benefits-container">
            <h2>Benefits at Dmedic</h2>
            <p>You will always have the best health care from us</p>
            <ul>
              <li><i class="icon"></i> 24/7 Unlimited Video Consultations with Qualified Doctors</li>
              <li><i class="icon"></i> Medicine Delivery at Your Doorstep</li>
              <li><i class="icon"></i> Diagnostics at Your Doorstep</li>
              <li><i class="icon"></i> Appointments for Later</li>
              <li><i class="icon"></i> Follow-up Consultation Reminder</li>
              <li><i class="icon"></i> Instant Electronic Prescription</li>
              <li><i class="icon"></i> Easy Payment Options</li>
            </ul>
          </section>
        </div>

        <!-- Login Form Section -->
        <div class="col-md-6">
          <section class="form-container">
            <h2>Easy to start!</h2>
            <p>Enter your phone number. We'll send you a verification code and you will be logged in.</p>
            <form action="login.php" method="post">
              <div class="phone-input">
                <select id="country-code" name="country_code" required>
                  <option value="+88">+88</option>
                </select>
                <input type="tel" id="mobile_number" name="mobile_number" placeholder="Enter your mobile number" required>
              </div>
              <button type="submit">Next →</button>
              <p>By continuing, I hereby agree and accept the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</p>
            </form>
            <p>or, <a href="docELogin.php">login using a password</a></p>
            <p>Are you a doctor? <a href="doctorRegistration.php">Join as a doctor</a></p>
          </section>
        </div>
      </div>
    </div>
  </main>
  <script src="plugins/jquery/jquery.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>


  </body>
</html>