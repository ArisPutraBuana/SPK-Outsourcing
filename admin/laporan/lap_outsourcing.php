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
$pdf->MultiCell(19.5, 0.5, 'LAPORAN DATA PERUSAHAAN OUTSOURCING', 0, 'L');
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
$pdf->Cell(0, 0.7, 'Laporan Data Perusahaan Outsourcing', 0, 0, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(5, 0.7, "Di cetak pada : " . date("D-d/m/Y"), 0, 0, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(1.5, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Nama Outsourcing', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Alamat', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'No HP', 1, 0, 'C');
$pdf->ln();

$no = 1;
include '../../src/koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM data_outsourcing");
while ($data = mysqli_fetch_array($query)) {
	$pdf->Cell(1.5, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(6, 0.8, $data['nama_outsourcing'], 1, 0, 'C');
	$pdf->Cell(6, 0.8, $data['alamat'], 1, 0, 'C');
	$pdf->Cell(5, 0.8, $data['no_tlp'], 1, 0, 'C');
	$pdf->ln();
	$no++;
}
$pdf->Output("laporan_outsourcing.pdf", "I");
