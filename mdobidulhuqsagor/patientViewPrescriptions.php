<?php
require('../FPDF/fpdf.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dmedic";

session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: patientLogin.php");
    exit();
}

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$patient_id = $_SESSION['patient_id'];
$patient_name = $_SESSION['patient_name'];

$sql = $pdo->prepare("SELECT p.prescription_id, p.prescription_text, p.created_at, a.doctor_id, a.appointment_id, d.first_name AS doctor_first_name, d.last_name AS doctor_last_name, d.doctor_type
                      FROM prescriptions p
                      JOIN appointments a ON p.appointment_id = a.appointment_id
                      JOIN doctorRegistrations d ON a.doctor_id = d.doctor_id
                      WHERE p.patient_id = :patient_id");
$sql->bindParam(':patient_id', $patient_id, PDO::PARAM_INT);
$sql->execute();
$prescriptions = $sql->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['generate_pdf']) && $_GET['generate_pdf'] == 1) {
    class PDF extends FPDF
    {
        function Header()
        {
            
        }

        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
        }
    }

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    
    foreach ($prescriptions as $prescription) {
        $pdf->SetFont('Arial', 'B', 12);
        
        
        $pdf->Cell(0, 10, 'Doctor Name: Dr. ' . htmlspecialchars($prescription['doctor_first_name'] . ' ' . $prescription['doctor_last_name']), 0, 1, 'L');
        $pdf->Cell(0, 10, 'Doctor Type: ' . htmlspecialchars($prescription['doctor_type']), 0, 1, 'L');
        $pdf->Cell(0, 10, 'Doctor ID: ' . htmlspecialchars($prescription['doctor_id']), 0, 1, 'L');
        
        
        $pdf->SetXY(130, 10);
        $pdf->Cell(0, 10, 'Patient Name: ' . htmlspecialchars($patient_name), 0, 1, 'R');
        $pdf->SetXY(130, 20);
        $pdf->Cell(0, 10, 'Appointment ID: ' . htmlspecialchars($prescription['appointment_id']), 0, 1, 'R');
        $pdf->SetXY(130, 30);
        $pdf->Cell(0, 10, 'Patient ID: ' . htmlspecialchars($patient_id), 0, 1, 'R');
        
        
        $pdf->SetXY(10, 40);
       
        $pdf->Cell(0, 10, '', 'T', 1, 'L');
        $pdf->Ln(5);

        
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, 'Prescription Text: ' . htmlspecialchars($prescription['prescription_text']));
        $pdf->Ln(10);
    }

    $pdf->Output('I', 'prescriptions.pdf');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Prescriptions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .prescription {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            position: relative;
        }
        .prescription:last-child {
            border-bottom: none;
        }
        .prescription-header {
            display: flex;
            justify-content: space-between;
        }
        .prescription-header .left, .prescription-header .right {
            width: 45%;
        }
        .prescription-header p {
            margin: 5px 0;
        }
        .prescription h3 {
            margin: 0;
            font-size: 18px;
            color: #007bff;
        }
        .prescription p {
            margin: 5px 0;
        }
        .buttons-container {
            text-align: center;
            margin-top: 20px;
        }
        .buttons-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .buttons-container button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function printPrescription(prescriptionId) {
            var printContents = document.getElementById('prescription-' + prescriptionId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = '<div class="container">' + printContents + '</div>';

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</head>

<body>

    <div class="container">
        <h1>My Prescriptions</h1>
        <?php if (empty($prescriptions)) : ?>
            <p>No prescriptions found.</p>
        <?php else : ?>
            <?php foreach ($prescriptions as $prescription) : ?>
                <div class="prescription" id="prescription-<?php echo htmlspecialchars($prescription['prescription_id']); ?>">
                    <h3>Prescription ID: <?php echo htmlspecialchars($prescription['prescription_id']); ?></h3>
                    <p><strong>Date:</strong> <?php echo htmlspecialchars($prescription['created_at']); ?></p>
                    <div class="prescription-header">
                        <div class="left">
                            <p><strong>Doctor Name:</strong> Dr. <?php echo htmlspecialchars($prescription['doctor_first_name'] . ' ' . $prescription['doctor_last_name']); ?></p>
                            <p><strong>Doctor Type:</strong> <?php echo htmlspecialchars($prescription['doctor_type']); ?></p>
                            <p><strong>Doctor ID:</strong> <?php echo htmlspecialchars($prescription['doctor_id']); ?></p>
                        </div>
                        <div class="right">
                            <p><strong>Patient Name:</strong> <?php echo htmlspecialchars($patient_name); ?></p>
                            <p><strong>Appointment ID:</strong> <?php echo htmlspecialchars($prescription['appointment_id']); ?></p>
                            <p><strong>Patient ID:</strong> <?php echo htmlspecialchars($patient_id); ?></p>
                        </div>
                    </div>
                    <hr>
                    <p><strong>Medicines:</strong></p>
                    <p><?php echo htmlspecialchars($prescription['prescription_text']); ?></p>
                    <div class="buttons-container">
                        <button onclick="printPrescription(<?php echo htmlspecialchars($prescription['prescription_id']); ?>)">Print Prescription</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
