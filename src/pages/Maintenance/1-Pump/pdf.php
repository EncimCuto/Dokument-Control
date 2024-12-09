<?php
// Memanggil fpdf.php
// require('../libraries/fpdf.php'); // Sesuaikan dengan path jika diperlukan
require('../../../components/libraries/fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Membuat sel untuk gambar
        $this->Cell(43, 14, '', 1, 0, 'L'); // Ruang untuk gambar
        $this->Image('../../../assets/pdf_bas.png', 6, 6, 40); // X, Y, Width

        $this->SetFont('Arial', 'B', 12);
        // Judul di tengah
        $this->Cell(158, 7, 'LAPORAN MAINTENANCE MOTOR & POMPA UTILITY', 1, 0, 'C'); // Judul
        $this->Ln();
        $this->Cell(43, 12, '', 0, 0, 'L');
        $this->Cell(158, 7, 'PT BUMI ALAM SEGAR', 1, 0, 'C'); // Judul

        $this->Ln();
        $this->SetFont('Arial', '', 11);
        $this->Cell(108, 6, 'Tanggal    :', 'L', 0, 'L');
        $this->Cell(93, 6, 'Nama Mesin    :', 'R', 0, 'L');

        $this->Ln();
        $this->Cell(108, 5, 'Waktu       :', 'L', 0, 'L');
        $this->Cell(93, 5, 'Paket               :', 'R', 0, 'L');

        $this->Ln();
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(30, 7, 'Mesin', 'LRBT', 0, 'C');
        $this->Cell(78, 7, 'Jenis Pemeliharaan', 'RBT', 0, 'C');
        $this->Cell(20, 7, 'Kondisi', 'RBT', 0, 'C');
        $this->Cell(73, 7, 'Keterangan', 'RBT', 0, 'C');

        // MOTOR
        $this->Ln();
        $this->SetFont('Arial', '', 10);
        $this->Cell(30, 40, 'Motor', 1, 0, 'C');
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check electrical', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Cek putaran motor', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check fibrasi dan suara motor', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check bearing', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Pelumasan motor', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Kebersihan unit dan body motor', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, '', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, '', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        // POMPA
        $this->Ln();
        $this->Cell(30, 50, 'Pompa', 1, 0, 'C');
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check putaran pompa', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check shaft dan karet coupling', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check fan belt', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check pressure pompa', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check mechanical seal', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check gasket pompa', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check impeler', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Kebersihan unit dan body ', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, '', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, '', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        // AKSESORIS
        $this->Ln();
        $this->Cell(30, 35, 'Aksesoris', 1, 0, 'C');
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check Valve', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check Cek valve', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check Flow meter', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check Strainer', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check alat ukur', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check kelengkapan baut mur', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, '', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        // GEARBOX     
        $this->Ln();
        $this->Cell(30, 35, 'Gearbox', 1, 0, 'C');
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Penambahan/penggantian oli', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check unit dan area', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check oil seal', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check filter udara', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, 'Check bearing', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, '', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        $this->Cell(10, 5, '', 'RB', 0, 'L');
        $this->Cell(68, 5, '', 'RB', 0, 'L');
        $this->Cell(20, 5, '', 'RBT', 0, 'C');
        $this->Cell(73, 5, '', 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(201, 5,'', 'RBL', 0, 'L');

        $this->SetFont('Arial', 'B', 11);
        $this->Ln();
        $this->Cell(108, 5,'Tindakan Korektif :', 'RL', 0, 'L');
        $this->Cell(93, 5,'Kebutuhan Material', 'RB', 0, 'L');

        $this->Ln();
        $this->Cell(108, 85,'', 'RBL', 0, 'L');
        $this->Cell(75, 5,'Deskripsi', 'RB', 0, 'C');
        $this->Cell(18, 5,'Jumlah', 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5,'', 'RB', 0, 'C');
        $this->Cell(18, 5,'', 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5,'', 'RB', 0, 'C');
        $this->Cell(18, 5,'', 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5,'', 'RB', 0, 'C');
        $this->Cell(18, 5,'', 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5,'', 'RB', 0, 'C');
        $this->Cell(18, 5,'', 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5,'', 'RB', 0, 'C');
        $this->Cell(18, 5,'', 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5,'', 'RB', 0, 'C');
        $this->Cell(18, 5,'', 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5,'', 'RB', 0, 'C');
        $this->Cell(18, 5,'', 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5,'', 'RB', 0, 'C');
        $this->Cell(18, 5,'', 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5,'', 'RB', 0, 'C');
        $this->Cell(18, 5,'', 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5,'', 'RB', 0, 'C');
        $this->Cell(18, 5,'', 'RB', 0, 'C');

        $this->SetFont('Arial', '', 11);
        $this->Ln();
        $this->Cell(108);
        $this->Cell(67, 5,'Dibuat :', 'R', 0, 'L');
        $this->Cell(26, 5,'', 'R', 0, 'L');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(67, 5,'Teknisi', 'RB', 0, 'L');
        $this->Cell(26, 5,'', 'RB', 0, 'L');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(67, 5,'Diketahui : Reja Firmansyah', 'R', 0, 'L');
        $this->Cell(26, 5,'', 'R', 0, 'L');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(67, 5,'Staff Engineering', 'RB', 0, 'L');
        $this->Cell(26, 5,'', 'RB', 0, 'L');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(67, 5,'Diterima', 'R', 0, 'L');
        $this->Cell(26, 5,'', 'R', 0, 'L');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(67, 5,'Staff User', 'RB', 0, 'L');
        $this->Cell(26, 5,'', 'RB', 0, 'L');

        $this->SetFont('Arial', 'B', 11);
        $this->Ln();
        $this->Cell(201, 6,'FRM/EUT/01/009/009-02', 0, 0, 'R');
    }
}

// Menginisialisasi PDF
$pdf = new PDF();
$pdf->SetMargins(4, 4, 3);
$pdf->AliasNbPages();
$pdf->AddPage();

// Output the PDF to the browser
$pdf->Output();
