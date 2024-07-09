<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header-top-bar {
            background-color: #004d40;
            padding: 10px 0;
            color: #fff;
        }
        .header-top-bar a {
            color: #fff;
            margin-right: 15px;
        }
        .navbar {
            background-color: #fff;
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav .nav-link {
            color: #000 !important;
        }
        .navbar-nav .nav-item .nav-link i {
            margin-right: 5px;
        }
        .profile-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .profile-card h4 {
            margin-bottom: 15px;
        }
        .profile-card p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-top-bar text-center">
            <div class="container">
                <a href="mailto:support@dmadic.com"><i class="icofont-support-faq mr-2"></i>support@dmadic.com</a>
                <span><i class="icofont-location-pin mr-2"></i>Dmadic</span>
                <span class="float-right">Call Now: <span class="h4">26566</span></span>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="admin_Dashboard.php"><img src="images/Dmedic.png" alt="Dmedic"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="approve_Request_Doctor.php">Approve Request Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="approveDoctor.php">Approve Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="doctorAdminLogin.php">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-user"></i>ODH SAGOR</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="profile-card">
            <div class="row">
                <div class="col-md-3 text-center">
                    <img src="images/ObidulHuqSagor.png" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 150px;">
                </div>
                <div class="col-md-9">
                    <h4>Name: MD. OBIDUL HUQ SAGOR</h4>
                    <p><strong>Role:</strong> ADMIN</p>
                    <p><strong>Room No:</strong> 3984</p>
                    <p><strong>Mobile No:</strong> 01312304166</p>
                    <p><strong>Email:</strong> OdhSagor@gmail.com</p>
                    <p><strong>Website:</strong> odhsagor.com</p>
                    <p><strong>Education:</strong> Independent University, Bangladesh</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
