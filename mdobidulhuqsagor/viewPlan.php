<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Medic Diabetes Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f7;
            color: #333;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #008080;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            color: #fff;
        }

        .navbar .navbar-brand {
            color: #fff;
            font-size: 24px;
            font-weight: 600;
            text-decoration: none;
        }

        .navbar-toggler {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: #fff;
            background: none;
            border: none;
        }

        .navbar-collapse {
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            align-items: center;
        }

        .navbar-nav {
            list-style: none;
            display: flex;
        }

        .nav-item {
            margin: 0 10px;
        }

        .nav-link {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #f0e68c;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Responsive Navbar */
        @media (max-width: 768px) {
            .navbar-collapse {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: #008080;
                position: absolute;
                top: 60px;
                left: 0;
                padding: 10px 20px;
            }

            .navbar-toggler {
                display: block;
            }

            .navbar-collapse.show {
                display: flex;
            }
        }

        /* Page Content */
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #008080;
            margin-bottom: 20px;
        }

        .card {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .metric {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .metric h2 {
            font-size: 18px;
            color: #008080;
        }

        .recommendation {
            font-size: 16px;
            color: #555;
        }

        .diabetes-note {
            font-size: 14px;
            color: #ff4d4d;
            font-weight: 600;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #aaa;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #008080;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #006666;
        }
        
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
        <a class="navbar-brand" href="patientDashboard.php">ডি-মেডিক</a>
        <button class="navbar-toggler" onclick="toggleNavbar()">☰</button>
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="patientDashboard.php">ড্যাশবোর্ড</a></li>
                <li class="nav-item"><a class="nav-link" href="../Sagor/patientAppointmentForm.php">অ্যাপয়েন্টমেন্ট নিন</a></li>
                <li class="nav-item"><a class="nav-link" href="patientInterface.php">স্বাস্থ্য সংক্রান্ত তথ্য দিন</a></li>
                <li class="nav-item"><a class="nav-link" href="viewHealthData.php">আপনার স্বাস্থ্য সংক্রান্ত তথ্য দেখুন</a></li>
                <li class="nav-item"><a class="nav-link" href="viewPlan.php">ডায়াবেটিস নিয়ন্ত্রণ তথ্য দেখুন</a></li>
                <li class="nav-item"><a class="nav-link" href="healthGuidelines.php">খাদ্য পরিকল্পনা</a></li>
                <li class="nav-item">
                    <form action="../Sagor/patientLogin.php" method="post">
                        <button type="submit" class="btn-danger">লগ আউট</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container" id="health-metrics">
        <h1>D-Medic Diabetes Management</h1>

        <div class="card">
            <div class="metric">
                <h2>Blood Glucose (Fasting)</h2>
                <p class="recommendation">Recommended: 70–100 mg/dL</p>
            </div>
            <p class="diabetes-note">For Diabetics: Aim for 80–130 mg/dL</p>
        </div>

        <div class="card">
            <div class="metric">
                <h2>Blood Glucose (Post-meal)</h2>
                <p class="recommendation">Recommended: Less than 140 mg/dL</p>
            </div>
            <p class="diabetes-note">For Diabetics: Aim for below 180 mg/dL</p>
        </div>

        <div class="card">
            <div class="metric">
                <h2>Insulin Dosage</h2>
                <p class="recommendation">Highly individualized, consult your doctor</p>
            </div>
            <p class="diabetes-note">For Diabetics: Monitor and adjust dosage based on blood sugar levels.</p>
        </div>

        <div class="card">
            <div class="metric">
                <h2>Physical Activity</h2>
                <p class="recommendation">Recommended: 150 minutes of moderate or 75 minutes of vigorous activity per week</p>
            </div>
            <p class="diabetes-note">For Diabetics: Regular activity can help lower blood glucose levels.</p>
        </div>

        <div class="card">
            <div class="metric">
                <h2>Dietary Intake</h2>
                <p class="recommendation">Balanced diet; 2,000–2,500 kcal/day</p>
            </div>
            <p class="diabetes-note">For Diabetics: Focus on low-carb and high-fiber foods.</p>
        </div>

        <div class="card">
            <div class="metric">
                <h2>Weight (BMI)</h2>
                <p class="recommendation">Recommended: BMI 18.5–24.9 kg/m²</p>
            </div>
            <p class="diabetes-note">For Diabetics: Maintaining a healthy weight can improve insulin sensitivity.</p>
        </div>

        <div class="card">
            <div class="metric">
                <h2>Blood Pressure</h2>
                <p class="recommendation">Recommended: 90/60 mmHg to 120/80 mmHg</p>
            </div>
            <p class="diabetes-note">For Diabetics: Regular monitoring is crucial to avoid complications.</p>
        </div>

        <div class="card">
            <div class="metric">
                <h2>Heart Rate</h2>
                <p class="recommendation">Recommended: 60–100 bpm</p>
            </div>
            <p class="diabetes-note">For Diabetics: Check regularly to ensure heart health.</p>
        </div>

        <div class="card">
            <div class="metric">
                <h2>Sleep Duration</h2>
                <p class="recommendation">Recommended: 7–9 hours/night</p>
            </div>
            <p class="diabetes-note">For Diabetics: Adequate sleep can help with blood sugar control.</p>
        </div>

        <div class="card">
            <div class="metric">
                <h2>Water Intake</h2>
                <p class="recommendation">Recommended: 3.7 liters/day (men), 2.7 liters/day (women)</p>
            </div>
            <p class="diabetes-note">For Diabetics: Staying hydrated can help manage blood sugar levels.</p>
        </div>
    </div>

    <div class="download-btn">
        <button class="btn" onclick="downloadPDF()">Download as PDF</button>
    </div>

    <div class="footer">
        <p>&copy; 2024, Designed & Developed by SAGOR</p>
    </div>

    <script>
        function downloadPDF() {
            var element = document.getElementById('health-metrics');
            var opt = {
                margin:       0.5,
                filename:     'D-Medic_Diabetes_Management.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(element).set(opt).save();
        }
    </script>

</body>
</html>
