<?php
// Hubungkan ke database menggunakan PDO
$pdo = new PDO('mysql:host=localhost;dbname=maintenance', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Query database untuk mendapatkan data terbaru
$sql = "SELECT * FROM pump ORDER BY id DESC LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC); // Ambil satu baris data

// Validasi data
if (!$row) {
    die("Error: Tidak ada data yang ditemukan di database.");
}

// Ambil tanggal dan nama_mesin dari data yang diambil dari database
$tanggal = $row['tanggal']; // Pastikan $row berisi data dari database
$nama_mesin = $row['nama_mesin'];

// Format tanggal menjadi format yang diinginkan untuk nama file
$tanggal_terformat = date('d-m-Y', strtotime($row['tanggal'])); // Sesuaikan format tanggal
$nama_file = $nama_mesin . " " . $tanggal_terformat; // Gabungkan nama mesin dan tanggal


// Memanggil fpdf.php
require('../../../components/libraries/fpdf.php'); // Sesuaikan dengan path jika diperlukan

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $centang = '../../../assets/centang.png';
        global $row; // Pastikan $data tersedia di dalam fungsi

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
        if ($row['checkbox_motor2'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C'); // Menambahkan sel untuk margin dan posisi           
        $this->Cell(68, 5, 'Cek putaran motor', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_motor2'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_motor2'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_motor3'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C'); // Menambahkan sel untuk margin dan posisi  
        $this->Cell(68, 5, 'Check fibrasi dan suara motor', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_motor3'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_motor3'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_motor4'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C'); // Menambahkan sel untuk margin dan posisi  
        $this->Cell(68, 5, 'Check bearing', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_motor4'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_motor4'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_motor5'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C'); // Menambahkan sel untuk margin dan posisi  
        $this->Cell(68, 5, 'Pelumasan motor', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_motor5'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_motor5'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_motor6'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Kebersihan unit dan body motor', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_motor6'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_motor6'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_motor7'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, $row['pemeliharaan_motor1'], 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_motor7'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_motor7'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_motor8'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, $row['pemeliharaan_motor2'], 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_motor8'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_motor8'], 'RBT', 0, 'C');

        // POMPA
        $this->Ln();
        $this->Cell(30, 50, 'Pompa', 1, 0, 'C');
        if ($row['checkbox_pompa1'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check putaran pompa', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_pompa1'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_pompa1'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_pompa2'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check shaft dan karet coupling', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_pompa2'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_pompa2'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_pompa3'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check fan belt', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_pompa3'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_pompa3'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_pompa4'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check pressure pompa', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_pompa4'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_pompa4'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_pompa5'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check mechanical seal', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_pompa5'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_pompa5'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_pompa6'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check gasket pompa', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_pompa6'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_pompa6'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_pompa7'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check impeler', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_pompa7'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_pompa7'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_pompa8'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Kebersihan unit dan body ', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_pompa8'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_pompa8'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_pompa9'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, $row['pemeliharaan_pompa1'], 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_pompa9'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_pompa9'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_pompa10'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, $row['pemeliharaan_pompa2'], 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_pompa10'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_pompa10'], 'RBT', 0, 'C');

        // AKSESORIS
        $this->Ln();
        $this->Cell(30, 35, 'Aksesoris', 1, 0, 'C');
        if ($row['checkbox_aksesoris1'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check Valve', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_aksesoris1'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_aksesoris1'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_aksesoris2'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check Cek valve', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_aksesoris2'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_aksesoris2'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_aksesoris3'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check Flow meter', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_aksesoris3'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_aksesoris3'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_aksesoris4'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check Strainer', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_aksesoris4'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_aksesoris4'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_aksesoris5'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check alat ukur', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_aksesoris5'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_aksesoris5'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_aksesoris6'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check kelengkapan baut mur', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_aksesoris6'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_aksesoris6'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_aksesoris7'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, $row['pemeliharaan_aksesoris'], 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_aksesoris7'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_aksesoris7'], 'RBT', 0, 'C');

        // GEARBOX     
        $this->Ln();
        $this->Cell(30, 35, 'Gearbox', 1, 0, 'C');
        if ($row['checkbox_gearbox1'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Penambahan/penggantian oli', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_gearbox1'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_gearbox1'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_gearbox2'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check unit dan area', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_gearbox2'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_gearbox2'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_gearbox3'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check oil seal', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_gearbox3'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_gearbox3'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_gearbox4'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check filter udara', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_gearbox4'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_gearbox4'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_gearbox5'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, 'Check bearing', 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_gearbox5'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_gearbox5'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_gearbox6'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, $row['pemeliharaan_gearbox1'], 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_gearbox6'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_gearbox6'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(30);
        if ($row['checkbox_gearbox7'] == 1) {
            $this->Image($centang, $this->GetX() + 2.5, $this->GetY(), 5, 5); // Menampilkan gambar dengan ukuran 5x5
        }
        $this->Cell(10, 5, '', 'RB', 0, 'C');
        $this->Cell(68, 5, $row['pemeliharaan_gearbox2'], 'RB', 0, 'L');
        $this->Cell(20, 5, $row['kondisi_gearbox7'], 'RBT', 0, 'C');
        $this->Cell(73, 5, $row['keterangan_gearbox7'], 'RBT', 0, 'C');

        $this->Ln();
        $this->Cell(201, 5, '', 'RBL', 0, 'L');

        $this->SetFont('Arial', 'B', 11);
        $this->Ln();
        $this->Cell(108, 5, 'Tindakan Korektif :', 'RL', 0, 'L');
        $this->Cell(93, 5, 'Kebutuhan Material', 'RB', 0, 'L');

        $this->Ln();
        $this->SetFont('Arial', '', 11);
        $this->Cell(108, 85, $row['korektif'], 'RBL', 0, 'C');
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(75, 5, 'Deskripsi', 'RB', 0, 'C');
        $this->Cell(18, 5, 'Jumlah', 'RB', 0, 'C');

        $this->SetFont('Arial', '', 11);
        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5, $row['deskripsi1'], 'RB', 0, 'C');
        $this->Cell(18, 5, $row['jumlah1'], 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5, $row['deskripsi2'], 'RB', 0, 'C');
        $this->Cell(18, 5, $row['jumlah2'], 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5, $row['deskripsi3'], 'RB', 0, 'C');
        $this->Cell(18, 5, $row['jumlah3'], 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5, $row['deskripsi4'], 'RB', 0, 'C');
        $this->Cell(18, 5, $row['jumlah4'], 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5, $row['deskripsi5'], 'RB', 0, 'C');
        $this->Cell(18, 5, $row['jumlah5'], 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5, $row['deskripsi6'], 'RB', 0, 'C');
        $this->Cell(18, 5, $row['jumlah6'], 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5, $row['deskripsi7'], 'RB', 0, 'C');
        $this->Cell(18, 5, $row['jumlah7'], 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5, $row['deskripsi8'], 'RB', 0, 'C');
        $this->Cell(18, 5, $row['jumlah8'], 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5, $row['deskripsi9'], 'RB', 0, 'C');
        $this->Cell(18, 5, $row['jumlah9'], 'RB', 0, 'C');

        $this->Ln();
        $this->Cell(108);
        $this->Cell(75, 5, $row['deskripsi10'], 'RB', 0, 'C');
        $this->Cell(18, 5, $row['jumlah10'], 'RB', 0, 'C');

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
    }
}

// Menginisialisasi PDF
$pdf = new PDF();
$pdf->SetMargins(4, 4, 3);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdfContent = $pdf->Output('S'); // Simpan PDF ke string

try {
    // Periksa apakah file dengan nama yang sama sudah ada
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM pump_pdf WHERE nama_file = :nama_file");
    $stmt->bindParam(':nama_file', $nama_file, PDO::PARAM_STR);
    $stmt->execute();
    $exists = $stmt->fetchColumn(); // Mengembalikan jumlah baris yang cocok

    if ($exists) {
        // Jika sudah ada, lakukan update
        $stmt = $pdo->prepare("UPDATE pump_pdf SET pdf_file = :pdf, updated_at = NOW() WHERE nama_file = :nama_file");
        $stmt->bindParam(':nama_file', $nama_file, PDO::PARAM_STR);
        $stmt->bindParam(':pdf', $pdfContent, PDO::PARAM_LOB);
        $stmt->execute();
        echo "PDF berhasil diperbarui di database dengan nama: $nama_file";
    } else {
        // Jika belum ada, lakukan insert
        $stmt = $pdo->prepare("INSERT INTO pump_pdf (nama_file, pdf_file, created_at) VALUES (:nama_file, :pdf, NOW())");
        $stmt->bindParam(':nama_file', $nama_file, PDO::PARAM_STR);
        $stmt->bindParam(':pdf', $pdfContent, PDO::PARAM_LOB);
        $stmt->execute();
        echo "PDF berhasil disimpan ke database dengan nama: $nama_file";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
