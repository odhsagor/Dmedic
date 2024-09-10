

<?php
session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: patientLogin.php"); 
    exit();
}
$patient_id = $_SESSION['patient_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Appointment Form</title>
    <link rel="stylesheet" href="cssrakib/patientAppoinmentFrom.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js"></script>
</head>
<body>
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Button Example</title>
    <style>
        /* Styling the button */
        .view-appointment-btn {
            display: inline-block;
            padding: 10px 230px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        
        .view-appointment-btn:hover {
            background-color: #45a049; 
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .view-appointment-btn:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.4);
        }

        .view-appointment-btn:active {
            background-color: #3e8e41;
            transform: translateY(0);
            box-shadow: none;
        }
    </style>
</head>


<header>
    <div class="header-top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="top-bar-info list-inline-item pl-0 mb-0">
                        <li class="list-inline-item">
                            <a href="javascript:history.back()">
                                <i class="icofont-rounded-left mr-2"></i>Back
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="mailto:support@dmadic.com">
                                <i class="icofont-support-faq mr-2"></i>support@dmadic.com
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <i class="icofont-location-pin mr-2"></i>Dmadic
                        </li>
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
</header>

<div class="main-container">
    <div class="line">
        <h1>Patient Appointment Form</h1>
        <h2 id="patient-id">Patient ID: <?php echo htmlspecialchars($patient_id); ?></h2>
    </div>
    <form id="appointment_form" action="../mdobidulhuqsagor/submit_appointment.php" method="post">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="example@example.com" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
        </div>
        <div class="form-group">
            <label for="doctor_type">Which medical department do you want to make an appointment for?</label>
            <select id="doctor_type" name="doctor_type" required>
                <option value="Select">Select Doctor Type</option>
            </select>
        </div>
        <div class="form-group">
            <label for="doctor_name">Doctor Name</label>
            <select id="doctor_name" name="doctor_name" required>
                <option value="Select">Select Doctor</option>
            </select>
        </div>
        <div class="form-group">
            <label for="appointment_date">Select Your Appointment Date</label>
            <input type="text" id="appointment_date" name="appointment_date" required>
        </div>
        <div class="form-group">
            <label for="select_time">Select Your Time</label>
            <input type="text" id="select_time" name="select_time" required>
        </div>
        <button type="submit">Get Appointment</button>
    </form>
    <a href="../mdobidulhuqsagor/patientViewAppointment.php" class="btn view-appointment-btn">View Appointment</a>
</div>

<footer>
<div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h3>About Us</h3>
                    <p>Dmadic is committed to providing the best medical care. Our team of experts is here to help you with all your health needs.</p>
                </div>
                <div class="col-lg-4">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3>Contact Us</h3>
                    <p><i class="icofont-location-pin"></i> Dhaka, Bangladesh</p>
                    <p><i class="icofont-phone"></i> 880 26566</p>
                    <p><i class="icofont-envelope"></i> support@dmadic.com</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                 &copy; 2024, Designed & Developed by <a target="_blank">Sagor</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
$(document).ready(function(){
    // Populate Doctor Types
    $.ajax({
        url: '../mdobidulhuqsagor/get_doctor_types.php',
        type: 'GET',
        success: function(data) {
            $('#doctor_type').append(data);
        }
    });

    // Doctor Names 
    $('#doctor_type').change(function() {
        var doctorType = $(this).val();
        $.ajax({
            url: '../mdobidulhuqsagor/get_doctor_names.php',
            type: 'POST',
            data: {doctor_type: doctorType},
            success: function(data) {
                $('#doctor_name').html(data);
            }
        });
    });

    // Datepicker
    $('#appointment_date').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0 
    });

    // Timepicker 
    $('#select_time').timepicker({
    timeFormat: 'h:i a', 
    interval: 30,
    minTime: '9:00 AM',
    maxTime: '6:00 PM',
    defaultTime: '9:00 AM',
    startTime: '9:00 AM',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
});
</script>

</body>
</html>
