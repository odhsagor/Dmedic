require('fpdf.php');

// Define Patient's Name and Logo Path
$patient_name = "John Doe"; // Retrieve from session or database
$logo_path = 'path/to/dmedic_logo.png';

// Create a new PDF document
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Add D-Medic Logo
$pdf->Image($logo_path, 10, 10, 30); // Adjust position and size as needed

// Add Patient Name
$pdf->Cell(0, 10, "Patient: $patient_name", 0, 1, 'C');

// Add Health Data
$pdf->SetFont('Arial', '', 12);
foreach ($health_data as $key => $value) {
    $pdf->Cell(0, 10, ucfirst(str_replace('_', ' ', $key)) . ": " . $value, 0, 1);
}

// Add Health Status
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, "Health Evaluation:", 0, 1);

$pdf->SetFont('Arial', '', 12);
foreach ($healthStatus as $param => $status) {
    $pdf->Cell(0, 10, ucfirst($param) . ": " . $status, 0, 1);
}

// Output the PDF to browser
$pdf->Output('D', 'Health_Report.pdf'); // 'D' forces download
