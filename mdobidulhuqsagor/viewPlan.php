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
                <li class="nav-item"><a class="nav-link" href="patientHealthCheck.html">আপনি কেমন আছেন?</a></li>
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
    <h1>ডি-মেডিক ডায়াবেটিস ম্যানেজমেন্ট</h1>

    <div class="card">
        <div class="metric">
            <h2>রক্তের গ্লুকোজ (খালি পেটে)</h2>
            <p class="recommendation">প্রস্তাবিত: ৭০–১০০ মিগ্রা/ডেসি লিটার</p>
        </div>
        <p class="diabetes-note">ডায়াবেটিকদের জন্য: লক্ষ্য রাখুন ৮০–১৩০ মিগ্রা/ডেসি লিটার</p>
    </div>

    <div class="card">
        <div class="metric">
            <h2>রক্তের গ্লুকোজ (খাওয়ার পরে)</h2>
            <p class="recommendation">প্রস্তাবিত: ১৪০ মিগ্রা/ডেসি লিটারের নিচে</p>
        </div>
        <p class="diabetes-note">ডায়াবেটিকদের জন্য: লক্ষ্য রাখুন ১৮০ মিগ্রা/ডেসি লিটারের নিচে</p>
    </div>

    <div class="card">
        <div class="metric">
            <h2>ইনসুলিন ডোজ</h2>
            <p class="recommendation">ব্যক্তিগতভাবে নির্ধারিত, ডাক্তারের পরামর্শ নিন</p>
        </div>
        <p class="diabetes-note">ডায়াবেটিকদের জন্য: রক্তের চিনির মাত্রা অনুযায়ী ডোজ নিয়ন্ত্রণ করুন।</p>
    </div>

    <div class="card">
        <div class="metric">
            <h2>শারীরিক কার্যকলাপ</h2>
            <p class="recommendation">প্রস্তাবিত: প্রতি সপ্তাহে ১৫০ মিনিট মাঝারি বা ৭৫ মিনিট জোরালো কার্যকলাপ</p>
        </div>
        <p class="diabetes-note">ডায়াবেটিকদের জন্য: নিয়মিত ব্যায়াম রক্তের গ্লুকোজ কমাতে সহায়ক।</p>
    </div>

    <div class="card">
        <div class="metric">
            <h2>খাদ্য গ্রহণ</h2>
            <p class="recommendation">প্রস্তাবিত: সুষম খাদ্য; ২,০০০–২,৫০০ ক্যালোরি/দিন</p>
        </div>
        <p class="diabetes-note">ডায়াবেটিকদের জন্য: নিম্ন কার্বোহাইড্রেট ও উচ্চ ফাইবার খাবার বেছে নিন।</p>
    </div>

    <div class="card">
        <div class="metric">
            <h2>ওজন (বিএমআই)</h2>
            <p class="recommendation">প্রস্তাবিত: বিএমআই ১৮.৫–২৪.৯ কেজি/মি²</p>
        </div>
        <p class="diabetes-note">ডায়াবেটিকদের জন্য: স্বাস্থ্যকর ওজন বজায় রাখলে ইনসুলিন সংবেদনশীলতা উন্নত হয়।</p>
    </div>

    <div class="card">
        <div class="metric">
            <h2>রক্তচাপ</h2>
            <p class="recommendation">প্রস্তাবিত: ৯০/৬০ মিমি পারদ থেকে ১২০/৮০ মিমি পারদ</p>
        </div>
        <p class="diabetes-note">ডায়াবেটিকদের জন্য: জটিলতা এড়াতে নিয়মিত পরিমাপ করুন।</p>
    </div>

    <div class="card">
        <div class="metric">
            <h2>হার্ট রেট</h2>
            <p class="recommendation">প্রস্তাবিত: ৬০–১০০ বিট প্রতি মিনিট</p>
        </div>
        <p class="diabetes-note">ডায়াবেটিকদের জন্য: হৃদযন্ত্রের সুস্থতার জন্য নিয়মিত পরীক্ষা করুন।</p>
    </div>

    <div class="card">
        <div class="metric">
            <h2>ঘুমের সময়কাল</h2>
            <p class="recommendation">প্রস্তাবিত: প্রতি রাতে ৭–৯ ঘন্টা</p>
        </div>
        <p class="diabetes-note">ডায়াবেটিকদের জন্য: পর্যাপ্ত ঘুম রক্তের চিনির নিয়ন্ত্রণে সহায়ক।</p>
    </div>

    <div class="card">
        <div class="metric">
            <h2>পানীয় জল গ্রহণ</h2>
            <p class="recommendation">প্রস্তাবিত: পুরুষদের জন্য ৩.৭ লিটার/দিন, নারীদের জন্য ২.৭ লিটার/দিন</p>
        </div>
        <p class="diabetes-note">ডায়াবেটিকদের জন্য: পানি পান রক্তের চিনির মাত্রা নিয়ন্ত্রণে সহায়ক।</p>
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
