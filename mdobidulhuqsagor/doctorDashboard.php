<?php
session_start();
if (!isset($_SESSION['doctor_id'])) {
    header('Location: doctorDashboard.php');
    exit();
}
$doctor_name = $_SESSION['doctor_name'];
$doctor_id = $_SESSION['doctor_id'];
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dmadic</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/icofont/icofont.min.css">
    <link rel="stylesheet" href="../plugins/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="../plugins/slick-carousel/slick/slick-theme.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="../css/doctorDashboard.css">
</head>
<body id="top">
    <header>
        <div class="header-top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="top-bar-info list-inline-item pl-0 mb-0">
                            <li class="list-inline-item"><a href="mailto:support@dmedic.com"><i class="icofont-support-faq mr-2"></i>support@dmedic.com</a></li>
                            <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Dmadic</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                            <a href="tel:+26566">
                                <span>এখন কল করুন : </span>
                                <span class="h4"> ২৬৫৬৬</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navigation" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="doctorDashboard.php">
                    <img src="../images/Dmedic.png" alt="" class="img-fluid">
                </a>
                <div class="collapse navbar-collapse" id="navbarsExample09">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="doctorDashboard.php">ড্যাশবোর্ড</a></li>
                        <li class="nav-item"><a class="nav-link" href="patientMedicalReport.php">রিপোর্ট</a></li>
                        <li  class="nav-item last"><i style="padding:0 0.5rem;" class="fa-solid fa-user"></i><a class="nav-link" href="#"> <?php echo $doctor_name; ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="docELogin.php">লগআউট</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-5">
        <h3>স্বাগতম ডাক্তার, <?php echo $doctor_name; ?></h3>
        <p>ডাক্তার আইডি: <?php echo $doctor_id; ?></p>
        <button type="button" class="btn btn-primary" onclick="showManageSchedules()">ব্যবস্থাপনা সূচি</button>
        
        <div id="manageSchedulesSection" style="display:none;">
            <h3 class="mt-5">সূচি পরিচালনা করুন</h3>
            <form id="scheduleForm">
                <input type="hidden" id="scheduleId" value="">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="date">তারিখ (দিন, মাস, বছর)*</label>
                        <input type="date" class="form-control" id="date" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="startTime">শুরুর সময়*</label>
                        <input type="time" class="form-control" id="startTime" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="endTime">শেষ সময়*</label>
                        <input type="time" class="form-control" id="endTime" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="roomNumber">কক্ষ নম্বর*</label>
                        <input type="text" class="form-control" id="roomNumber" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fees">ডাক্তার ফি</label>
                        <input type="number" class="form-control" id="fees" placeholder="0.00" step="0.01">
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-block" onclick="saveSchedule()">সংরক্ষণ করুন</button>
                <button type="button" class="btn btn-outline-secondary btn-block" onclick="updateSchedule()">আপডেট করুন</button>
                <button type="button" class="btn btn-outline-danger btn-block" onclick="deleteSchedule()">মুছুন</button>
            </form>
            <h3 class="mt-5">বিদ্যমান সূচি</h3>
            <ul class="list-group" id="scheduleList">
                
            </ul>
        </div>

        <button type="button" class="btn btn-primary" onclick="window.location.href='doctorViewAppointments.php'">রোগীর অ্যাপয়েন্টমেন্ট</button>

    </div>
    <footer>
<div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h3>আমাদের সম্পর্কে</h3>
                    <p>শ্রেষ্ঠ চিকিৎসা সেবা প্রদানে প্রতিশ্রুতিবদ্ধ। আমাদের টিম এখানে আপনার সকল স্বাস্থ্যসেবা নিয়ে সহায়তার জন্য প্রস্তুত।</p>
                </div>
                <div class="col-lg-4">
                    <h3>দ্রুত লিঙ্কসমূহ</h3>
                    <ul>
                        <li><a href="#">হোম</a></li>
                        <li><a href="#">আমাদের সম্পর্কে</a></li>
                        <li><a href="#">সেবা</a></li>
                        <li><a href="#">যোগাযোগ</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3>যোগাযোগ করুন</h3>
                    <p><i class="icofont-location-pin"></i> ঢাকা, বাংলাদেশ</p>
                    <p><i class="icofont-phone"></i> ৮৮০ ২৬৫৬৬</p>
                    <p><i class="icofont-envelope"></i> support@dmedic.com</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                 &copy; 2024, ডিজাইন ও উন্নয়ন করেছেন <a target="_blank">সাগর</a>
                </div>
            </div>
        </div>
    </div>
</footer>

    <script>
    function showManageSchedules() {
        document.getElementById('manageSchedulesSection').style.display = 'block';
        loadSchedules();
    }

    function saveSchedule() {
        let scheduleData = {
            doctor_id: <?php echo $doctor_id; ?>,
            date: $('#date').val(),
            start_time: $('#startTime').val(),
            end_time: $('#endTime').val(),
            room_number: $('#roomNumber').val(),
            fees: $('#fees').val()
        };

        $.post('manageSchedules.php', scheduleData, function(response) {
            alert(response);
            loadSchedules();
            clearForm();
        });
    }

    function updateSchedule() {
        let scheduleData = {
            id: $('#scheduleId').val(),
            doctor_id: <?php echo $doctor_id; ?>,
            date: $('#date').val(),
            start_time: $('#startTime').val(),
            end_time: $('#endTime').val(),
            room_number: $('#roomNumber').val(),
            fees: $('#fees').val()
        };

        $.post('manageScheduleSave.php', scheduleData, function(response) {
            alert(response);
            loadSchedules();
            clearForm();
        });
    }

    function deleteSchedule(id) {
        if (!confirm('Are you sure you want to delete this schedule?')) return;

        $.post('deleteSchedules.php', { id: id }, function(response) {
            alert(response);
            loadSchedules();
        });
    }

    function editSchedule(id, date, start_time, end_time, room_number, fees) {
        $('#scheduleId').val(id);
        $('#date').val(date);
        $('#startTime').val(start_time);
        $('#endTime').val(end_time);
        $('#roomNumber').val(room_number);
        $('#fees').val(fees);
    }

    function loadSchedules() {
        $.get('get_Schedules.php', { doctor_id: <?php echo $doctor_id; ?> }, function(response) {
            $('#scheduleList').html(response);
        });
    }

    function clearForm() {
        $('#scheduleForm')[0].reset();
        $('#scheduleId').val('');
    }
    </script>
</body>
</html>
