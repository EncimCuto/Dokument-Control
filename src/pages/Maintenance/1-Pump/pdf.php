<?php
// Hubungkan ke database menggunakan PDO
$pdo = new PDO('mysql:host=localhost;dbname=maintenance', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Query database
$sql = "SELECT * FROM pump"; // Ganti dengan nama tabel yang sesuai
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC); // Ambil semua data

// Memanggil fpdf.php
require('../../../components/libraries/fpdf.php'); // Sesuaikan dengan path jika diperlukan

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $centang = '../../../assets/centang.png';
        global $data; // Pastikan $data tersedia di dalam fungsi

        // Isi data dari database
        foreach ($data as $row) {
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
            $this->Cell(108, 6, 'Tanggal    : ' . date('d-m-Y', strtotime($row['tanggal'])), 'L', 0, 'L');
            $this->Cell(93, 6, 'Nama Mesin    : ' . $row['nama_mesin'], 'R', 0, 'L');

            $this->Ln();
            $this->Cell(108, 5, 'Waktu       : ' . date('H:i', strtotime($row['waktu'])), 'L', 0, 'L');
            $this->Cell(93, 5, 'Paket               : ' . $row['paket'], 'R', 0, 'L');

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
            // Menampilkan gambar centang jika checkbox_motor1 bernilai 1
            if ($row['checkbox_motor1'] == 1) {
                $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
            }
            $this->Cell(10, 5, '', 'RB', 0, 'C'); // Menambahkan sel untuk margin dan posisi

            $this->Cell(68, 5, 'Check electrical', 'RB', 0, 'L');
            $this->Cell(20, 5, $row['kondisi_motor1'], 'RBT', 0, 'C');
            $this->Cell(73, 5, $row['keterangan_motor1'], 'RBT', 0, 'C');

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
            $this->Cell(201, 5, '', 'RBL', 0, 'L');

            $this->SetFont('Arial', 'B', 11);
            $this->Ln();
            $this->Cell(108, 5, 'Tindakan Korektif :', 'RL', 0, 'L');
            $this->Cell(93, 5, 'Kebutuhan Material', 'RB', 0, 'L');

            $this->Ln();
            $this->Cell(108, 85, '', 'RBL', 0, 'L');
            $this->Cell(75, 5, 'Deskripsi', 'RB', 0, 'C');
            $this->Cell(18, 5, 'Jumlah', 'RB', 0, 'C');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(75, 5, '', 'RB', 0, 'C');
            $this->Cell(18, 5, '', 'RB', 0, 'C');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(75, 5, '', 'RB', 0, 'C');
            $this->Cell(18, 5, '', 'RB', 0, 'C');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(75, 5, '', 'RB', 0, 'C');
            $this->Cell(18, 5, '', 'RB', 0, 'C');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(75, 5, '', 'RB', 0, 'C');
            $this->Cell(18, 5, '', 'RB', 0, 'C');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(75, 5, '', 'RB', 0, 'C');
            $this->Cell(18, 5, '', 'RB', 0, 'C');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(75, 5, '', 'RB', 0, 'C');
            $this->Cell(18, 5, '', 'RB', 0, 'C');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(75, 5, '', 'RB', 0, 'C');
            $this->Cell(18, 5, '', 'RB', 0, 'C');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(75, 5, '', 'RB', 0, 'C');
            $this->Cell(18, 5, '', 'RB', 0, 'C');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(75, 5, '', 'RB', 0, 'C');
            $this->Cell(18, 5, '', 'RB', 0, 'C');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(75, 5, '', 'RB', 0, 'C');
            $this->Cell(18, 5, '', 'RB', 0, 'C');

            $this->SetFont('Arial', '', 11);
            $this->Ln();
            $this->Cell(108);
            $this->Cell(67, 5, 'Dibuat :', 'R', 0, 'L');
            $this->Cell(26, 5, '', 'R', 0, 'L');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(67, 5, 'Teknisi', 'RB', 0, 'L');
            $this->Cell(26, 5, '', 'RB', 0, 'L');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(67, 5, 'Diketahui : Reja Firmansyah', 'R', 0, 'L');
            $this->Cell(26, 5, '', 'R', 0, 'L');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(67, 5, 'Staff Engineering', 'RB', 0, 'L');
            $this->Cell(26, 5, '', 'RB', 0, 'L');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(67, 5, 'Diterima', 'R', 0, 'L');
            $this->Cell(26, 5, '', 'R', 0, 'L');

            $this->Ln();
            $this->Cell(108);
            $this->Cell(67, 5, 'Staff User', 'RB', 0, 'L');
            $this->Cell(26, 5, '', 'RB', 0, 'L');

            $this->SetFont('Arial', 'B', 11);
            $this->Ln();
            $this->Cell(202, 6, 'FRM/EUT/01/009/009-02', 0, 0, 'R');
            $this->Ln(50);
        }
    }
}

// Menginisialisasi PDF
$pdf = new PDF();
$pdf->SetMargins(4, 4, 3);
$pdf->AliasNbPages();
$pdf->AddPage();

// Output the PDF to the browser
$pdf->Output();
