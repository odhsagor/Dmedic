<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Appointment Form</title>
    <link rel="stylesheet" href="cssrakib/patientAppoinmentFrom.css">
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
                <option value="Endocrinology">Endocrinology</option>
                <option value="Metabolism">Metabolism</option>
                <option value="Endocrinology & Metabolism">Endocrinology & Metabolism</option>
                <option value="fetal cardiologists">Fetal Cardiologists</option>
                <option value="cardiac geneticists">Cardiac Geneticists</option>
                <option value="cardiac imaging specialists">Cardiac Imaging Specialists</option>
                <option value="electrophysiologists">Electrophysiologists</option>
                <option value="exercise physiologists">Exercise Physiologists</option>
                <option value="heart transplant specialists">Heart Transplant Specialists</option>
                <option value="heart surgeons">Heart Surgeons</option>
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
                <!-- Options for dates -->
            </select>
        </div>
        <div class="form-group">
            <label for="select-time">Select Your Time</label>
            <select id="select-time" name="select-time" required>
                <option value="12:00 PM">12:00 PM</option>
                <!-- Other options -->
            </select>
        </div>
        <div class="form-group">
            <label for="consulting-time">Consulting Time</label>
            <select id="consulting-time" name="consulting-time" required>
                <!-- Options for consulting time -->
            </select>
        </div>
        <div class="form-group">
            <label for="doctor-fees">Doctor Fees</label>
            <select id="doctor-fees" name="doctor-fees" required>
                <!-- Options for doctor fees -->
            </select>
        </div>
        <button type="submit">Schedule</button>
    </form>
</div>
</body>
</html>
