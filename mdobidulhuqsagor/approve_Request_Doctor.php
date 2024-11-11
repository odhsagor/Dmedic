<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: doctorRegistration.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM doctorRegistrations WHERE approved = 0";
$result = $conn->query($sql);
?>

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
        .h3{
          margin: 20px;
        }
        .doctor-box {
        border: 2px solid green;
        padding: 20px;
        margin: 30px;
    }
    .h3 {
        background-color: #004d40;
        border: 4px solid black;
        padding: 20px;
        margin: 30px;
    }
    .text{
      color: #fff;
      text-align: center;

    }
    </style>
</head>
<body>
    <header>
        <div class="header-top-bar text-center">
            <div class="container">
                <a href="mailto:support@dmedic.com"><i class="icofont-support-faq mr-2"></i>support@dmedic.com</a>
                <span><i class="icofont-location-pin mr-2"></i>Dmadic</span>
                <span class="float-right">Call Now: <span class="h4">26566</span></span>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="admin_Dashboard.php"><img src="../images/Dmedic.png" alt="Dmedic"></a>
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
                    </ul>
                </div>
            </div>
        </nav>
        
    </header>
    <div class="h3">
    <h3 class="text">Doctor Registrations Request For Approve</h3>
    </div>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='doctor-box'>
                    <h4>Doctor ID: {$row['doctor_id']}</h4>
                    <p><strong>Title:</strong> {$row['title']}</p>
                    <p><strong>First Name:</strong> {$row['first_name']}</p>
                    <p><strong>Last Name:</strong> {$row['last_name']}</p>
                    <p><strong>DOB:</strong> {$row['dob']}</p>
                    <p><strong>Gender:</strong> {$row['gender']}</p>
                    <p><strong>District:</strong> {$row['district']}</p>
                    <p><strong>National ID:</strong> {$row['national_id']}</p>
                    <p><strong>Registration Number:</strong> {$row['registration_number']}</p>
                    <p><strong>Doctor Type:</strong> {$row['doctor_type']}</p>
                    <p><strong>Mobile Number:</strong> {$row['mobile_number']}</p>
                    <p><strong>Email:</strong> {$row['email']}</p>
                    <div class='action-buttons'>
                        <form action='approve_Request_Doctor_Db.php' method='post' style='display:inline;'>
                            <input type='hidden' name='doctor_id' value='{$row['doctor_id']}'>
                            <button type='submit' name='action' value='approve' class='btn btn-success'>Approve</button>
                        </form>
                        <form action='approve_Request_Doctor_Db.php' method='post' style='display:inline;'>
                            <input type='hidden' name='doctor_id' value='{$row['doctor_id']}'>
                            <button type='submit' name='action' value='reject' class='btn btn-danger'>Reject</button>
                        </form>
                    </div>
                </div>";
            }
        } else {
            echo "<div class='alert alert-info'>No pending registrations</div>";
        }
        ?>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
