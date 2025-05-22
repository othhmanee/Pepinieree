<?php
session_start();
require('fpdf/fpdf.php');

ob_start();

if (!isset($_SESSION['user']) || !isset($_SESSION['last_order'])) {
    echo "Session data missing or expired. Please log in again.";
    exit;
}

$user = $_SESSION['user'];
$order = $_SESSION['last_order'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, 'Facture', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Nom: ' . $user['Nom'] . ' ' . $user['Prenom'], 0, 1);
$pdf->Cell(0, 10, 'Email: ' . $user['email'], 0, 1);
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Resume de la commande:', 0, 1);
$pdf->SetFont('Arial', '', 12);

foreach ($order['items'] as $item) {
    $line = $item['name'] . ' x' . $item['quantity'] . ' - ' . number_format($item['price'], 2,',','') . ' MAD';
    $pdf->Cell(0, 10, $line, 0, 1);
}

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Total: ' . number_format($order['total'], 2) . ' MAD', 0, 1);

ob_end_clean();
$pdf->Output('D', 'facture.pdf');
exit;
?>
