<?php

$servername = "localhost";
$username = "root"; // Your DB username
$password = ""; // Your DB password
$dbname = "Dmedic";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dmadic</title>
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
    <link rel="stylesheet" href="css/doctorDashboard.css">
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
                <a class="navbar-brand" href="doctorDashboard.php">
                    <img src="images/Dmedic.png" alt="" class="img-fluid">
                </a>
                <div class="collapse navbar-collapse" id="navbarsExample09">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="doctorDashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                        <li  class="nav-item last"><i style="padding:0 0.5rem;" class="fa-solid fa-user"></i><a class="nav-link" href="#">Profile</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-5">
        <div class="row text-center mb-4">
            <div class="col-md-3">
                <div class="info-box">
                    <div class="icon">
                        <img src="images/Appointments.png" alt="Appointments Today" />
                    </div>
                    <h4>Appointments Today</h4>
                    <p>2</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box">
                    <div class="icon">
                        <img src="images/Appointments Completed.png" alt="Appointments Completed Today" />
                    </div>
                    <h4>Appointments Completed Today</h4>
                    <p>1</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box">
                    <div class="icon">
                        <img src="images/Pending Appointments.png" alt="Pending Appointments Today" />
                    </div>
                    <h4>Pending Appointments Today</h4>
                    <p>1</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box">
                    <div class="icon">
                        <img src="images/consulting.png" alt="Total Consultation" />
                    </div>
                    <h4>Total Consultation</h4>
                    <p>10</p>
                </div>
            </div>
        </div>
        <h3 class="text-center mb-4">Your Activities</h3>
        <div class="row text-center mb-4">
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#manageSchedulesModal">Manage Schedules</button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#manageAppointmentsModal">Manage Appointments</button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#patientsConsultedTodayModal">Patients Consulted Today</button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feesCollectedTodayModal">Fees Collected Today</button>
            </div>
        </div>
        <h3 class="text-center mb-4">Appointments</h3>
        <div class="row text-center mb-4">
            <div class="col-md-3">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#todayPendingAppointmentsModal">Today-Pending</button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#allPatientsModal">All Patients</button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#pastAppointmentsModal">Past Appointments</button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#upcomingAppointmentsModal">Upcoming Appointments</button>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <!-- Manage Schedules Modal -->
    <div class="modal fade" id="manageSchedulesModal" tabindex="-1" role="dialog" aria-labelledby="manageSchedulesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manageSchedulesLabel">Manage Schedules</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container mt-5">
    <h2>Consulting Hours</h2>

    <form action="manageSchedules.php" method="POST">
        <div class="card mb-3">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="daysOfWeek">Days of the Week</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="days_of_week[]" value="sun"> Sun
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="days_of_week[]" value="mon"> Mon
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="days_of_week[]" value="tue"> Tue
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="days_of_week[]" value="wed"> Wed
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="days_of_week[]" value="thu"> Thu
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="days_of_week[]" value="fri"> Fri
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="days_of_week[]" value="sat"> Sat
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fromDate">From Date*</label>
                        <input type="date" class="form-control" name="from_date" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="toDate">To Date*</label>
                        <input type="date" class="form-control" name="to_date" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="startTime">Start Time*</label>
                        <input type="time" class="form-control" name="start_time" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="endTime">End Time*</label>
                        <input type="time" class="form-control" name="end_time" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="consultingTime">Consulting Time (min)</label>
                        <input type="number" class="form-control" name="consulting_time" placeholder="10">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>

    <h3>Existing Schedules</h3>

    <?php
    $sql = "SELECT * FROM Manage_Schedules";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $days_of_week = json_decode($row['days_of_week']);
            ?>
            <div class="card mb-3">
                <div class="card-body">
                    <form action="manageSchedules.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="daysOfWeek">Days of the Week</label><br>
                                <?php foreach (['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'] as $day) { ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="days_of_week[]" value="<?php echo $day; ?>" <?php echo in_array($day, $days_of_week) ? 'checked' : ''; ?>> <?php echo ucfirst($day); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="fromDate">From Date*</label>
                                <input type="date" class="form-control" name="from_date" value="<?php echo $row['from_date']; ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="toDate">To Date*</label>
                                <input type="date" class="form-control" name="to_date" value="<?php echo $row['to_date']; ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="startTime">Start Time*</label>
                                <input type="time" class="form-control" name="start_time" value="<?php echo $row['start_time']; ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="endTime">End Time*</label>
                                <input type="time" class="form-control" name="end_time" value="<?php echo $row['end_time']; ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="consultingTime">Consulting Time (min)</label>
                                <input type="number" class="form-control" name="consulting_time" value="<?php echo $row['consulting_time']; ?>" placeholder="10">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
            <?php
        }
    } else {
        echo "No schedules found.";
    }

    $conn->close();
    ?>
</div>





            </div>
        </div>
    </div>

    <!-- Manage Appointments Modal -->
    <div class="modal fade" id="manageAppointmentsModal" tabindex="-1" role="dialog" aria-labelledby="manageAppointmentsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manageAppointmentsLabel">Manage Appointments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Manage Appointments content goes here -->
                    <p>Manage Appointments content here...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Patients Consulted Today Modal -->
    <div class="modal fade" id="patientsConsultedTodayModal" tabindex="-1" role="dialog" aria-labelledby="patientsConsultedTodayLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="patientsConsultedTodayLabel">Patients Consulted Today</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Patients Consulted Today content goes here -->
                    <p>Patients Consulted Today content here...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Fees Collected Today Modal -->
    <div class="modal fade" id="feesCollectedTodayModal" tabindex="-1" role="dialog" aria-labelledby="feesCollectedTodayLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feesCollectedTodayLabel">Fees Collected Today</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Fees Collected Today content goes here -->
                    <p>Fees Collected Today content here...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Today-Pending Modal -->
    <div class="modal fade" id="todayPendingAppointmentsModal" tabindex="-1" role="dialog" aria-labelledby="todayPendingAppointmentsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="todayPendingAppointmentsLabel">Today-Pending</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Today-Pending content goes here -->
                    <p>Today-Pending content here...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- All Patients Modal -->
    <div class="modal fade" id="allPatientsModal" tabindex="-1" role="dialog" aria-labelledby="allPatientsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allPatientsLabel">All Patients</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- All Patients content goes here -->
                    <p>All Patients content here...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Past Appointments Modal -->
    <div class="modal fade" id="pastAppointmentsModal" tabindex="-1" role="dialog" aria-labelledby="pastAppointmentsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pastAppointmentsLabel">Past Appointments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Past Appointments content goes here -->
                    <p>Past Appointments content here...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Appointments Modal -->
    <div class="modal fade" id="upcomingAppointmentsModal" tabindex="-1" role="dialog" aria-labelledby="upcomingAppointmentsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="upcomingAppointmentsLabel">Upcoming Appointments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Upcoming Appointments content goes here -->
                    <p>Upcoming Appointments content here...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="plugins/jquery/jquery.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>
    <script src="plugins/shuffle/shuffle.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=API-KEY&callback=initMap" async defer></script>
    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>
</body>
</html>

