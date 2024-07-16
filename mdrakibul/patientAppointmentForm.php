<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Appointment Form</title>
    <link rel="stylesheet" href="cssrakib/patientAppoinmentFrom.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
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
</header>
<div class="main-container">
    <div class="line">
        <h1>Patient Appointment Form</h1>
    </div>
    <form action="submit_appointment.php" method="post">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" placeholder="First Name">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="example@example.com">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Phone Number">
        </div>
        <div class="form-group">
            <label for="doctor_type">Which medical department do you want to make an appointment for?</label>
            <select id="doctor_type" name="doctor_type" required>
                <option value="Select">Select Doctor Type</option>
                <!-- Options will be populated by JavaScript -->
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
            <select id="appointment_date" name="appointment_date" required>
                <!-- Options will be populated by JavaScript -->
            </select>
        </div>
        <div class="form-group">
            <label for="select-time">Select Your Time</label>
            <select id="select-time" name="select-time" required>
                <!-- Options will be populated by JavaScript -->
            </select>
        </div>
        <div class="form-group">
            <label for="doctor-fees">Doctor Fees</label>
            <select id="doctor-fees" name="doctor-fees" required>
                <!-- Options will be populated by JavaScript -->
            </select>
        </div>
        <button type="submit">Get Appointment</button>
    </form>
</div>

<script>
$(document).ready(function(){
    // Populate Doctor Types
    $.ajax({
        url: 'get_doctor_types.php',
        type: 'GET',
        success: function(data) {
            $('#doctor_type').append(data);
        }
    });

    // Populate Doctor Names based on selected Doctor Type
    $('#doctor_type').change(function() {
        var doctorType = $(this).val();
        $.ajax({
            url: 'get_doctor_names.php',
            type: 'POST',
            data: {doctor_type: doctorType},
            success: function(data) {
                $('#doctor_name').html(data);
            }
        });
    });

    // Populate Appointment Dates based on selected Doctor
    $('#doctor_name').change(function() {
        var doctorName = $(this).val();
        $.ajax({
            url: 'get_appointment_dates.php',
            type: 'POST',
            data: {doctor_name: doctorName},
            success: function(data) {
                $('#appointment_date').html(data);
            }
        });
    });

    // Populate Time Slots based on selected Appointment Date
    $('#appointment_date').change(function() {
        var appointmentDate = $(this).val();
        $.ajax({
            url: 'get_time_slots.php',
            type: 'POST',
            data: {appointment_date: appointmentDate},
            success: function(data) {
                $('#select-time').html(data);
            }
        });
    });

    // Populate Doctor Fees based on selected Time Slot
    $('#select-time').change(function() {
        var timeSlot = $(this).val();
        $.ajax({
            url: 'get_doctor_fees.php',
            type: 'POST',
            data: {time_slot: timeSlot},
            success: function(data) {
                $('#doctor-fees').html(data);
            }
        });
    });
});
</script>
</body>
</html>
