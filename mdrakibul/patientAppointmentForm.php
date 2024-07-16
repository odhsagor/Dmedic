<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Appointment Form</title>
    <link rel="stylesheet" href="css_rakib/patientAppoinmentFrom.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Patient Appointment Form</h1>
        <form action="submit_appointment.php" method="post">
            <div class="form-group">
                <label for="first_name">Name</label>
                <input type="text" id="first_name" name="first_name" placeholder="First Name">
                <input type="text" id="last_name" name="last_name" placeholder="Last Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="example@example.com">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="phone number">
            </div>
            
            <div class="form-group">
                <label>Which medical department do you want to make an appointment for?</label>
                <div class="department-options">
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

            <div class="doctor-name"> 
            <label>Doctor Name</label>
            <select id="doctor_name" name="doctor_name" required>
            <option value="Select">Select Doctor </option>
            </div>

            </div>
            <div class="appointment-date">
                <label>Select Your Appointment Date</label>
                <select id="appointment_date" name="appointment_date" required>
                
            </div>
            <div class="select-time">
            <label>Select Your Time</label>
            <select id="select-time" name="select-time" required>  
            
                    <option value="12:00 PM">12:00 PM</option>
                    <!-- Repeat for other times -->
                </select>
            </div>
            <div class="consulting-time">
            <label>Consulting Time</label>
            <select id="consulting-time" name="consulting-time" required>       
            </div>

            <div class="doctor-fees">
            <label>Doctor Fees</label>
            <select id="doctor-fees" name="doctor-fees" required>       
            </div>
            <button type="submit">Schedule</button>
        </form>
    </div>
</body>
</html>
