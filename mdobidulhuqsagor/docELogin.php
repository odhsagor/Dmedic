<!DOCTYPE html>
<html lang="bn">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>ডমেডিক</title>

  <!-- ফেভিকন -->
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  <!-- আইকন ফন্ট সিএসএস -->
  <link rel="stylesheet" href="../plugins/icofont/icofont.min.css">
  <!-- Slick Slider CSS -->
  <link rel="stylesheet" href="../plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="../plugins/slick-carousel/slick/slick-theme.css">

  <!-- প্রধান স্টাইলশিট -->
  <link rel="stylesheet" href="../css/docELogin.css">

</head>

<body id="top">

<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@dmadic.com"><i class="icofont-support-faq mr-2"></i>support@dmadic.com</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>ডমেডিক</li>
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
			  	<img src="../images/Dmedic.png" alt="" class="img-fluid">
			  </a>

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="../index.php">প্রথম পাতা</a>
			  </li>
			  <!-- ফার্মাসিস্ট -->
			    <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ফার্মাসিস্ট<i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown02">
						<li><a class="dropdown-item" href="#">ঔষধ</a></li>
						<li><a class="dropdown-item" href="#">ডায়াবেটিস কেয়ার</a></li>
					</ul>
			  	</li>

				<!-- ডায়েটিশিয়ান -->

				<li class="nav-item active">
					<a class="nav-link" href="#">ডায়েটিশিয়ান</a>
				</li>

				<!-- ডাক্তার -->
                <li class="nav-item active">
					<a class="nav-link" href="doctorInterpage.php">ডাক্তারের জন্য</a>
				</li>

				<!-- হাসপাতাল -->

				  <li class="nav-item active">
					<a class="nav-link" href="#">হাসপাতাল</a>
				  </li>

				<!-- সাইন ইন এবং সাইন আপ বাটন -->
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">রোগীর জন্য<i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown02">
						<li><a class="dropdown-item" href="../mdrakibul/patientLogin.php">লগইন</a></li>
						<li><a class="dropdown-item" href="../mdrakibul/patientRegistration.php">রোগীর রেজিস্ট্রেশন</a></li>
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
        <!-- সুবিধা বিভাগ -->
        <div class="col-md-6">
          <section class="benefits-container">
            <h2>ডমেডিকের সুবিধাসমূহ</h2>
            <p>আপনি সবসময় আমাদের কাছ থেকে সর্বোত্তম স্বাস্থ্যসেবা পাবেন</p>
            <ul>
              <li><i class="icon"></i> ২৪/৭ যোগ্য ডাক্তারের সাথে সীমাহীন ভিডিও পরামর্শ</li>
              <li><i class="icon"></i> আপনার ঠিকানায় ঔষধ সরবরাহ</li>
              <li><i class="icon"></i> আপনার ঠিকানায় ডায়াগনস্টিকস</li>
              <li><i class="icon"></i> পরবর্তী সময়ে অ্যাপয়েন্টমেন্ট</li>
              <li><i class="icon"></i> ফলো-আপ পরামর্শের রিমাইন্ডার</li>
              <li><i class="icon"></i> তাৎক্ষণিক ইলেকট্রনিক প্রেসক্রিপশন</li>
              <li><i class="icon"></i> সহজ পেমেন্ট পদ্ধতি</li>
            </ul>
          </section>
        </div>

        <div class="col-md-6">
          <section class="form-container">
            <h2>পুনরায় স্বাগতম</h2>
            <h3>ডাক্তার</h3>
            <form action="docLoginB.php" method="post">
			      <?php
                    session_start();
                    if (isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                        unset($_SESSION['error']);
                    }
            ?>
              <div class="input-group">
                <label for="user_id">ইমেইল অথবা নম্বর *</label>
                <input type="text" id="user_id" name="user_id" required>
              </div>
              <div class="input-group">
                <label for="password">পাসওয়ার্ড *</label>
                <input type="password" id="password" name="password" required>
                <i class="toggle-password"></i>
              </div>
              <div class="form-links">
                <a href="#">পাসওয়ার্ড ভুলে গেছেন?</a>
              </div>
              <button type="submit">লগইন</button>
              
            </form>
            <p>অথবা, <a href="doctorLogin.php">মোবাইল নম্বর দিয়ে লগইন করুন</a></p>
          </section>
        </div>
      </div>
    </div>
  </main>

  <script src="plugins/jquery/jquery.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
