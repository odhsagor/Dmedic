<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D_MEDIC</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Kalpurush', Arial, sans-serif;
            line-height: 1.8;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
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

        header {
            text-align: center;
            padding: 20px;
            background-color: #fff;
        }

        header img {
            max-height: 80px;
        }

        h1 {
            color: #388e3c;
            text-align: center;
            font-size: 28px;
        }

        h2 {
            color: #00796b;
            font-size: 22px;
        }

        .content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .important-box {
            border: 2px solid red;
            background-color: #ffe6e6;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .important-box h2 {
            color: red;
        }

        .note-box {
            border: 2px solid orange;
            background-color: #fff3e0;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .note-box h2 {
            color: orange;
        }

        .diet-box {
            border: 2px solid green;
            background-color: #e8f5e9;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .diet-box h2 {
            color: green;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        .important-box ul li:before {
            content: "❌"; 
            color: red;
            margin-right: 10px;
        }

        .note-box ul li:before {
            content: "✔️";
            color: green;
            margin-right: 10px;
        }

        .diet-box ul li:before {
            content: "🍽️";
            margin-right: 10px;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #00796b;
            color: white;
            margin-top: 20px;
        }

        .print-button {
            background-color: #00796b;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            display: block;
            margin: 20px auto;
        }

        .print-button:hover {
            background-color: #004d40;
        }

        @media print {
            .print-button {
                display: none;
            }

            .navbar {
                display: none;
            }
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

<header>
    <img src="../images/Dmedic.png" alt="Logo">
</header>

<div class="content">
    <div class="important-box">
        <h2>যে সব খাবার বর্জন করতে হবে(কিডনী রোগের প্রথ্য)</h2>
        <ul>
            <li>লবন এবং লবনের তৈরী সকল খাবার যেমন-আচার, চিপস, লবনাক্ত পনির, শুটকি মাছ ইত্যাদি।</li>
            <li>ডাবের পানি এবং সকল প্রকার কোমল পানীয় যেমন-কোকা-কোলা, ইউরো-কোলা, পেপসি, সেভেনআপ ইত্যাদি।</li>
            <li>কোকো ও কোকো পাউডার দ্বারা তৈরী সকল প্রকার খাবার যেমন চকলেট, পেস্ট্রি, কেক, আইসক্রিম ইত্যাদি।</li>
            <li>টিন জাতীয় খাদ্য যেমন-ক্যানফিস, সসেজ।</li>
            <li>সব ধরনের শুকনো ফল যেমন-খেজুর, কিসমিস, বাদাম, কাজুবাদাম ইত্যাদি।</li>
            <li>গরু, খাসী, ভেড়া, মহিষ, মাছের ডিম, গলদা চিংড়ি ইত্যাদি।</li>
            <li>সম্পৃক্ত ফ্যাট অধিক পরিমাণের যেমন- ঘি, মাখন, ডালডা, বনষ্পতি, পনির, নারিকেলের তেল ইত্যাদি।</li>
            <li>সকল প্রকার ডাল ও ডালের তৈরী খাবার, সীমের বীচি ইত্যাদি।</li>
            <li>পুঁইশাক, পালংশাক, ঢেঁড়শ, ফুলকপি, টমেটো, শশা ইত্যাদি।</li>
            <li>কোন ধরনের চাটনি খাবেন না।</li>
            <li>কৈ, মাগুর, শিং, সামুদ্রিক মাছ ইত্যাদি খাবেন না।</li>
        </ul>
    </div>

    <div class="note-box">
        <h2>লক্ষনীয় বিষয়</h2>
        <ul>
            <li>নিষেধের বাইরে সব শাক, সবজি ও মাছ খাওয়া যাবে।</li>
            <li>সকল প্রকার সবজি খুব ভালভাবে সিদ্ধ করে রান্না করতে হবে।</li>
            <li>সারাদিনে ৫ গ্রাম লবন (১ চা চামচ) ব্যবহার করা যাবে।</li>
            <li>২৪ ঘন্টায় ২ লিটার তরল পান করা যাবে।</li>
            <li>প্রতিদিনের খাবারে ৪ চা-চামচ পরিশোধিত তেল ব্যবহার করতে হবে।</li>
        </ul>
    </div>

    <div class="diet-box">
        <h2>দৈনিক খাদ্য তালিকা</h2>
        <ul>
            <li><strong>সকালের নাস্তা: (৮.০০ - ৮.৩০)</strong><br>
                আটার রুটি ⅔, ডিম 1 (Boiled), সবজি ½ (No Potato), চা (Without sugar)</li>
            <li><strong>মধ্য সকাল: (১০.৩০-১১.০০)</strong><br>
                ফল 100 gm (Apple, Naspati, Peyara, Tokfol, Pepe)</li>
            <li><strong>মধ্যাহ্ন ভোজ: (১:০০ - ২:০০)</strong><br>
                ভাত, মাছ অথবা মুরগির মাংস (No Fry), শাক-সবজি, সালাদ</li>
            <li><strong>বিকেলের নাস্তা: (৪.৩০ - ৫.৩০)</strong><br>
                চা, CARAMEL-RENAL (3 Scoop)</li>
            <li><strong>রাতের খাবার: (৮.০০ - ৮.৩০)</strong><br>
                আটার রুটি 3, সবজি 1 cup, মাছ অথবা মুরগির মাংস 1 pis</li>
            <li><strong>ঘুমের আগে: (১০.০০ - ১০.৩০)</strong><br>
                Marks Diabetic Milk (3 chamus)</li>
        </ul>
    </div>
</div>

<!-- Print Button -->
<button class="print-button" onclick="window.print()">Print Page</button>

<footer>
    <p>MD. Obidul Huq Sagor</p>
</footer>

</body>
</html>
