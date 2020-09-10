<?php

ob_start();
require('../../assets/pdf/fpdf.php');

$pdf = new FPDF("L", "cm", "A4");

$pdf->SetMargins(2, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 12);
$pdf->Image('../../assets/pdf/logo.jpg', 1, 1, 2, 2);
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'LAPORAN HASIL PERHITUNGAN METODE SAW', 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'Telpon : 0822-8075-5676', 0, 'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'Indonesia', 0, 'L');
$pdf->SetX(4);
$pdf->Line(1, 3.1, 28.5, 3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1, 3.2, 28.5, 3.2);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 0.7, 'Laporan Hasil Perhitungan SAW', 0, 0, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(5, 0.7, "Di cetak pada : " . date("D-d/m/Y"), 0, 0, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama Outsourcing', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Biaya', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Manajemen Profesional', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Daya Dukung', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Kredibilitas', 1, 0, 'C');
$pdf->Cell(7.5, 0.8, 'Hasil', 1, 0, 'C');
$pdf->ln();

$no = 1;
include '../../src/koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM data_hasil");
while ($data = mysqli_fetch_array($query)) {
	$sql21 = mysqli_query($koneksi, "SELECT * FROM data_nilai WHERE nama_outsourcing = '$data[nama_outsourcing]'");
	$rata = mysqli_fetch_array($sql21);

	$rata2 = (($rata['k1'] * 0.4) + ($rata['k2'] * 0.2) + ($rata['k3'] * 0.2) + ($rata['k4'] * 0.2));

	if ($rata2 < 65) {
		$ket = "Tidak di rekomendasikan";
	} else {
		$ket = "Di rekomendasikan";
	}

	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(5, 0.8, $data['nama_outsourcing'], 1, 0, 'C');
	$pdf->Cell(3, 0.8, $data['k1'], 1, 0, 'C');
	$pdf->Cell(3, 0.8, $data['k2'], 1, 0, 'C');
	$pdf->Cell(2, 0.8, $data['k3'], 1, 0, 'C');
	$pdf->Cell(2, 0.8, $data['k4'], 1, 0, 'C');
	$pdf->Cell(7.5, 0.8, $ket, 1, 0, 'C');
	$pdf->ln();
	$no++;
}
$pdf->Output("laporan_hasil.pdf", "I");
