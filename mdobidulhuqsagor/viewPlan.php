<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Medic Diabetes Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f7;
            color: #333;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #008080;
            margin-bottom: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }
        .metric {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .metric:last-child {
            border-bottom: none;
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
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #aaa;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #008080;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
        }
        .download-btn {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

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
