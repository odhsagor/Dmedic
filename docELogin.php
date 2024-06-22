

<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Dmadic</title>

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
  <link rel="stylesheet" href="css/docELogin.css">

</head>

<body id="top">

<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@dmadic.com"><i class="icofont-support-faq mr-2"></i>support@dmadic.com</a></li>
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
					<a class="nav-link" href="doctorInterpage.php"> For Doctors</a>
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
		</div>
	</nav>
</header>

<main>
    <div class="container">
      <div class="row">
        <!-- Benefits Section -->
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
            <h2>Welcome Back</h2>
            <h3>Login</h3>
            <form action="login.php" method="post">
              <div class="input-group">
                <label for="email_or_phone">Email or phone number *</label>
                <input type="text" id="email_or_phone" name="email_or_phone" required>
              </div>
              <div class="input-group">
                <label for="password">Password *</label>
                <input type="password" id="password" name="password" required>
                <i class="toggle-password"></i>
              </div>
              <div class="form-links">
                <a href="#">Forgot password?</a>
              </div>
              <button type="submit">Login</button>
            </form>
            <p>or, <a href="doctorLogin.php">Login with mobile number</a></p>
          </section>
        </div>
      </div>
    </div>
  </main>

  <!-- Include JavaScript files -->
  <script src="plugins/jquery/jquery.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>


  </body>
</html>