<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Login">
    <meta name="author" content="Your Name">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/doctorAdminLogin.css">
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
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <section class="form-container">
                <h2>Welcome Back Admin</h2>
                <form action="adminpage.php" method="post">
                    <?php
                    session_start();
                    if (isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="input-group">
                        <label for="user_id">USER NAME *</label>
                        <input type="text" id="user_id" name="user_id" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password *</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit">Login</button>
                </form>
            </section>
        </div>
    </div>
    <script src="plugins/jquery/jquery.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
