<?php
session_start();
// Parameter koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$dbname = 'maintenance'; // Ganti dengan nama database Anda
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda jika ada

try {
    // Membuat koneksi PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Menyiapkan koneksi untuk mengatasi error dengan mode exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Menangani error jika koneksi gagal
    echo "Koneksi gagal: " . $e->getMessage();
    exit();
}

// Ambil data dari form
$tanggal = $_POST['date'] ?? '';
$waktu = $_POST['waktu'] ?? '';
$nama_mesin = $_POST['nama_mesin'] ?? '';
$paket = $_POST['paket'] ?? '';

// Data untuk motor
$kondisi_motor1 = $_POST['kondisi_motor1'] ?? '';
$keterangan_motor1 = $_POST['keterangan_motor1'] ?? '';
$checkbox_motor1 = isset($_POST['checkbox_motor1']) ? 1 : 0;

$kondisi_motor2 = $_POST['kondisi_motor2'] ?? '';
$keterangan_motor2 = $_POST['keterangan_motor2'] ?? '';
$checkbox_motor2 = isset($_POST['checkbox_motor2']) ? 1 : 0;

$kondisi_motor3 = $_POST['kondisi_motor3'] ?? '';
$keterangan_motor3 = $_POST['keterangan_motor3'] ?? '';
$checkbox_motor3 = isset($_POST['checkbox_motor3']) ? 1 : 0;

$kondisi_motor4 = $_POST['kondisi_motor4'] ?? '';
$keterangan_motor4 = $_POST['keterangan_motor4'] ?? '';
$checkbox_motor4 = isset($_POST['checkbox_motor4']) ? 1 : 0;

$kondisi_motor5 = $_POST['kondisi_motor5'] ?? '';
$keterangan_motor5 = $_POST['keterangan_motor5'] ?? '';
$checkbox_motor5 = isset($_POST['checkbox_motor5']) ? 1 : 0;

$kondisi_motor6 = $_POST['kondisi_motor6'] ?? '';
$keterangan_motor6 = $_POST['keterangan_motor6'] ?? '';
$checkbox_motor6 = isset($_POST['checkbox_motor6']) ? 1 : 0;

$kondisi_motor7 = $_POST['kondisi_motor7'] ?? '';
$keterangan_motor7 = $_POST['keterangan_motor7'] ?? '';
$checkbox_motor7 = isset($_POST['checkbox_motor7']) ? 1 : 0;

$kondisi_motor8 = $_POST['kondisi_motor8'] ?? '';
$keterangan_motor8 = $_POST['keterangan_motor8'] ?? '';
$checkbox_motor8 = isset($_POST['checkbox_motor8']) ? 1 : 0;

// Data untuk pompa
$kondisi_pompa1 = $_POST['kondisi_pompa1'] ?? '';
$keterangan_pompa1 = $_POST['keterangan_pompa1'] ?? '';
$checkbox_pompa1 = isset($_POST['checkbox_pompa1']) ? 1 : 0;

$kondisi_pompa2 = $_POST['kondisi_pompa2'] ?? '';
$keterangan_pompa2 = $_POST['keterangan_pompa2'] ?? '';
$checkbox_pompa2 = isset($_POST['checkbox_pompa2']) ? 1 : 0;

$kondisi_pompa3 = $_POST['kondisi_pompa3'] ?? '';
$keterangan_pompa3 = $_POST['keterangan_pompa3'] ?? '';
$checkbox_pompa3 = isset($_POST['checkbox_pompa3']) ? 1 : 0;

$kondisi_pompa4 = $_POST['kondisi_pompa4'] ?? '';
$keterangan_pompa4 = $_POST['keterangan_pompa4'] ?? '';
$checkbox_pompa4 = isset($_POST['checkbox_pompa4']) ? 1 : 0;

$kondisi_pompa5 = $_POST['kondisi_pompa5'] ?? '';
$keterangan_pompa5 = $_POST['keterangan_pompa5'] ?? '';
$checkbox_pompa5 = isset($_POST['checkbox_pompa5']) ? 1 : 0;

$kondisi_pompa6 = $_POST['kondisi_pompa6'] ?? '';
$keterangan_pompa6 = $_POST['keterangan_pompa6'] ?? '';
$checkbox_pompa6 = isset($_POST['checkbox_pompa6']) ? 1 : 0;

$kondisi_pompa7 = $_POST['kondisi_pompa7'] ?? '';
$keterangan_pompa7 = $_POST['keterangan_pompa7'] ?? '';
$checkbox_pompa7 = isset($_POST['checkbox_pompa7']) ? 1 : 0;

$kondisi_pompa8 = $_POST['kondisi_pompa8'] ?? '';
$keterangan_pompa8 = $_POST['keterangan_pompa8'] ?? '';
$checkbox_pompa8 = isset($_POST['checkbox_pompa8']) ? 1 : 0;

$kondisi_pompa9 = $_POST['kondisi_pompa9'] ?? '';
$keterangan_pompa9 = $_POST['keterangan_pompa9'] ?? '';
$checkbox_pompa9 = isset($_POST['checkbox_pompa9']) ? 1 : 0;

$kondisi_pompa10 = $_POST['kondisi_pompa10'] ?? '';
$keterangan_pompa10 = $_POST['keterangan_pompa10'] ?? '';
$checkbox_pompa10 = isset($_POST['checkbox_pompa10']) ? 1 : 0;

// Aksesoris
$kondisi_aksesoris1 = $_POST['kondisi_aksesoris1'] ?? '';
$keterangan_aksesoris1 = $_POST['keterangan_aksesoris1'] ?? '';
$checkbox_aksesoris1 = isset($_POST['checkbox_aksesoris1']) ? 1 : 0;

$kondisi_aksesoris2 = $_POST['kondisi_aksesoris2'] ?? '';
$keterangan_aksesoris2 = $_POST['keterangan_aksesoris2'] ?? '';
$checkbox_aksesoris2 = isset($_POST['checkbox_aksesoris2']) ? 1 : 0;

$kondisi_aksesoris3 = $_POST['kondisi_aksesoris3'] ?? '';
$keterangan_aksesoris3 = $_POST['keterangan_aksesoris3'] ?? '';
$checkbox_aksesoris3 = isset($_POST['checkbox_aksesoris3']) ? 1 : 0;

$kondisi_aksesoris4 = $_POST['kondisi_aksesoris4'] ?? '';
$keterangan_aksesoris4 = $_POST['keterangan_aksesoris4'] ?? '';
$checkbox_aksesoris4 = isset($_POST['checkbox_aksesoris4']) ? 1 : 0;

$kondisi_aksesoris5 = $_POST['kondisi_aksesoris5'] ?? '';
$keterangan_aksesoris5 = $_POST['keterangan_aksesoris5'] ?? '';
$checkbox_aksesoris5 = isset($_POST['checkbox_aksesoris5']) ? 1 : 0;

$kondisi_aksesoris6 = $_POST['kondisi_aksesoris6'] ?? '';
$keterangan_aksesoris6 = $_POST['keterangan_aksesoris6'] ?? '';
$checkbox_aksesoris6 = isset($_POST['checkbox_aksesoris6']) ? 1 : 0;

$kondisi_aksesoris7 = $_POST['kondisi_aksesoris7'] ?? '';
$keterangan_aksesoris7 = $_POST['keterangan_aksesoris7'] ?? '';
$checkbox_aksesoris7 = isset($_POST['checkbox_aksesoris7']) ? 1 : 0;

// Gearbox
$kondisi_gearbox1 = $_POST['kondisi_gearbox1'] ?? '';
$keterangan_gearbox1 = $_POST['keterangan_gearbox1'] ?? '';
$checkbox_gearbox1 = isset($_POST['checkbox_gearbox1']) ? 1 : 0;

$kondisi_gearbox2 = $_POST['kondisi_gearbox2'] ?? '';
$keterangan_gearbox2 = $_POST['keterangan_gearbox2'] ?? '';
$checkbox_gearbox2 = isset($_POST['checkbox_gearbox2']) ? 1 : 0;

$kondisi_gearbox3 = $_POST['kondisi_gearbox3'] ?? '';
$keterangan_gearbox3 = $_POST['keterangan_gearbox3'] ?? '';
$checkbox_gearbox3 = isset($_POST['checkbox_gearbox3']) ? 1 : 0;

$kondisi_gearbox4 = $_POST['kondisi_gearbox4'] ?? '';
$keterangan_gearbox4 = $_POST['keterangan_gearbox4'] ?? '';
$checkbox_gearbox4 = isset($_POST['checkbox_gearbox4']) ? 1 : 0;

$kondisi_gearbox5 = $_POST['kondisi_gearbox5'] ?? '';
$keterangan_gearbox5 = $_POST['keterangan_gearbox5'] ?? '';
$checkbox_gearbox5 = isset($_POST['checkbox_gearbox5']) ? 1 : 0;

$kondisi_gearbox6 = $_POST['kondisi_gearbox6'] ?? '';
$keterangan_gearbox6 = $_POST['keterangan_gearbox6'] ?? '';
$checkbox_gearbox6 = isset($_POST['checkbox_gearbox6']) ? 1 : 0;

$kondisi_gearbox7 = $_POST['kondisi_gearbox7'] ?? '';
$keterangan_gearbox7 = $_POST['keterangan_gearbox7'] ?? '';
$checkbox_gearbox7 = isset($_POST['checkbox_gearbox7']) ? 1 : 0;


$korektif = $_POST['korektif'] ?? '';
$kebutuhan_material = $_POST['kebutuhan_material'] ?? '';
$pemeliharaan_motor1 = $_POST['pemeliharaan_motor1'] ?? '';
$pemeliharaan_motor2 = $_POST['pemeliharaan_motor2'] ?? '';
$pemeliharaan_pompa1 = $_POST['pemeliharaan_pompa1'] ?? '';
$pemeliharaan_pompa2 = $_POST['pemeliharaan_pompa2'] ?? '';
$pemeliharaan_gearbox1 = $_POST['pemeliharaan_gearbox1'] ?? '';
$pemeliharaan_gearbox2 = $_POST['pemeliharaan_gearbox2'] ?? '';
$pemeliharaan_aksesoris = $_POST['pemeliharaan_aksesoris'] ?? '';

// Deskripsi
$deskripsi1 = $_POST['deskripsi1'] ?? '';
$deskripsi2 = $_POST['deskripsi2'] ?? '';
$deskripsi3 = $_POST['deskripsi3'] ?? '';
$deskripsi4 = $_POST['deskripsi4'] ?? '';
$deskripsi5 = $_POST['deskripsi5'] ?? '';
$deskripsi6 = $_POST['deskripsi6'] ?? '';
$deskripsi7 = $_POST['deskripsi7'] ?? '';
$deskripsi8 = $_POST['deskripsi8'] ?? '';
$deskripsi9 = $_POST['deskripsi9'] ?? '';
$deskripsi10 = $_POST['deskripsi10'] ?? '';

// Jumlah
$jumlah1 = $_POST['jumlah1'] ?? '';
$jumlah2 = $_POST['jumlah2'] ?? '';
$jumlah3 = $_POST['jumlah3'] ?? '';
$jumlah4 = $_POST['jumlah4'] ?? '';
$jumlah5 = $_POST['jumlah5'] ?? '';
$jumlah6 = $_POST['jumlah6'] ?? '';
$jumlah7 = $_POST['jumlah7'] ?? '';
$jumlah8 = $_POST['jumlah8'] ?? '';
$jumlah9 = $_POST['jumlah9'] ?? '';
$jumlah10 = $_POST['jumlah10'] ?? '';

// Query untuk menyimpan data
$sql = "INSERT INTO pump 
    (tanggal, waktu, nama_mesin, paket,
kondisi_motor1, keterangan_motor1, kondisi_motor2, keterangan_motor2, kondisi_motor3, keterangan_motor3, 
        kondisi_motor4, keterangan_motor4, kondisi_motor5, keterangan_motor5, kondisi_motor6, keterangan_motor6, 
        kondisi_motor7, keterangan_motor7, kondisi_motor8, keterangan_motor8, pemeliharaan_motor1, pemeliharaan_motor2,
kondisi_pompa1, keterangan_pompa1, kondisi_pompa2, keterangan_pompa2, kondisi_pompa3, keterangan_pompa3, 
        kondisi_pompa4, keterangan_pompa4, kondisi_pompa5, keterangan_pompa5, kondisi_pompa6, keterangan_pompa6, 
        kondisi_pompa7, keterangan_pompa7, kondisi_pompa8, keterangan_pompa8, kondisi_pompa9, keterangan_pompa9, kondisi_pompa10, keterangan_pompa10, pemeliharaan_pompa1, pemeliharaan_pompa2,
kondisi_aksesoris1, keterangan_aksesoris1, kondisi_aksesoris2, keterangan_aksesoris2, kondisi_aksesoris3, keterangan_aksesoris3, 
        kondisi_aksesoris4, keterangan_aksesoris4, kondisi_aksesoris5, keterangan_aksesoris5, kondisi_aksesoris6, keterangan_aksesoris6, 
        kondisi_aksesoris7, keterangan_aksesoris7, pemeliharaan_aksesoris,
kondisi_gearbox1, keterangan_gearbox1, kondisi_gearbox2, keterangan_gearbox2, kondisi_gearbox3, keterangan_gearbox3, 
        kondisi_gearbox4, keterangan_gearbox4, kondisi_gearbox5, keterangan_gearbox5, kondisi_gearbox6, keterangan_gearbox6, 
        kondisi_gearbox7, keterangan_gearbox7, pemeliharaan_gearbox1, pemeliharaan_gearbox2,
deskripsi1, deskripsi2, deskripsi3, deskripsi4, deskripsi5, deskripsi6, deskripsi7, deskripsi8, deskripsi9, deskripsi10,
        jumlah1, jumlah2, jumlah3, jumlah4, jumlah5, jumlah6, jumlah7, jumlah8, jumlah9, jumlah10,
kebutuhan_material, korektif,
        checkbox_motor1, checkbox_motor2, checkbox_motor3, checkbox_motor4, checkbox_motor5, checkbox_motor6, checkbox_motor7, checkbox_motor8,
        checkbox_pompa1, checkbox_pompa2, checkbox_pompa3, checkbox_pompa4, checkbox_pompa5, checkbox_pompa6, checkbox_pompa7, checkbox_pompa8, checkbox_pompa9, checkbox_pompa10,
        checkbox_aksesoris1, checkbox_aksesoris2, checkbox_aksesoris3, checkbox_aksesoris4, checkbox_aksesoris5, checkbox_aksesoris6, checkbox_aksesoris7,
        checkbox_gearbox1, checkbox_gearbox2, checkbox_gearbox3, checkbox_gearbox4, checkbox_gearbox5, checkbox_gearbox6, checkbox_gearbox7
    )
    VALUES (:tanggal, :waktu, :nama_mesin, :paket,
:kondisi_motor1, :keterangan_motor1, :kondisi_motor2, :keterangan_motor2, :kondisi_motor3, :keterangan_motor3, 
        :kondisi_motor4, :keterangan_motor4, :kondisi_motor5, :keterangan_motor5, :kondisi_motor6, :keterangan_motor6, 
        :kondisi_motor7, :keterangan_motor7, :kondisi_motor8, :keterangan_motor8, :pemeliharaan_motor1, :pemeliharaan_motor2,
:kondisi_pompa1, :keterangan_pompa1, :kondisi_pompa2, :keterangan_pompa2, :kondisi_pompa3, :keterangan_pompa3, 
        :kondisi_pompa4, :keterangan_pompa4, :kondisi_pompa5, :keterangan_pompa5, :kondisi_pompa6, :keterangan_pompa6, 
        :kondisi_pompa7, :keterangan_pompa7, :kondisi_pompa8, :keterangan_pompa8, :kondisi_pompa9, :keterangan_pompa9, :kondisi_pompa10, :keterangan_pompa10, :pemeliharaan_pompa1, :pemeliharaan_pompa2,
:kondisi_aksesoris1, :keterangan_aksesoris1, :kondisi_aksesoris2, :keterangan_aksesoris2, :kondisi_aksesoris3, :keterangan_aksesoris3, 
        :kondisi_aksesoris4, :keterangan_aksesoris4, :kondisi_aksesoris5, :keterangan_aksesoris5, :kondisi_aksesoris6, :keterangan_aksesoris6, 
        :kondisi_aksesoris7, :keterangan_aksesoris7, :pemeliharaan_aksesoris,
:kondisi_gearbox1, :keterangan_gearbox1, :kondisi_gearbox2, :keterangan_gearbox2, :kondisi_gearbox3, :keterangan_gearbox3, 
        :kondisi_gearbox4, :keterangan_gearbox4, :kondisi_gearbox5, :keterangan_gearbox5, :kondisi_gearbox6, :keterangan_gearbox6, 
        :kondisi_gearbox7, :keterangan_gearbox7, :pemeliharaan_gearbox1, :pemeliharaan_gearbox2,
:deskripsi1, :deskripsi2, :deskripsi3, :deskripsi4, :deskripsi5, :deskripsi6, :deskripsi7, :deskripsi8, :deskripsi9, :deskripsi10,
        :jumlah1, :jumlah2, :jumlah3, :jumlah4, :jumlah5, :jumlah6, :jumlah7, :jumlah8, :jumlah9, :jumlah10,
:kebutuhan_material ,:korektif,
        :checkbox_motor1, :checkbox_motor2, :checkbox_motor3, :checkbox_motor4, :checkbox_motor5, :checkbox_motor6, :checkbox_motor7, :checkbox_motor8,
        :checkbox_pompa1, :checkbox_pompa2, :checkbox_pompa3, :checkbox_pompa4, :checkbox_pompa5, :checkbox_pompa6, :checkbox_pompa7, :checkbox_pompa8, :checkbox_pompa9, :checkbox_pompa10,
        :checkbox_aksesoris1, :checkbox_aksesoris2, :checkbox_aksesoris3, :checkbox_aksesoris4, :checkbox_aksesoris5, :checkbox_aksesoris6, :checkbox_aksesoris7,
        :checkbox_gearbox1, :checkbox_gearbox2, :checkbox_gearbox3, :checkbox_gearbox4, :checkbox_gearbox5, :checkbox_gearbox6, :checkbox_gearbox7
    )";

// Menggunakan PDO untuk menyiapkan dan mengeksekusi query
$stmt = $pdo->prepare($sql);

// Mengikat nilai untuk setiap placeholder
$stmt->bindParam(':tanggal', $tanggal);
$stmt->bindParam(':waktu', $waktu);
$stmt->bindParam(':nama_mesin', $nama_mesin);
$stmt->bindParam(':paket', $paket);

// Motor
$stmt->bindParam(':kondisi_motor1', $kondisi_motor1);
$stmt->bindParam(':keterangan_motor1', $keterangan_motor1);
$stmt->bindParam(':kondisi_motor2', $kondisi_motor2);
$stmt->bindParam(':keterangan_motor2', $keterangan_motor2);
$stmt->bindParam(':kondisi_motor3', $kondisi_motor3);
$stmt->bindParam(':keterangan_motor3', $keterangan_motor3);
$stmt->bindParam(':kondisi_motor4', $kondisi_motor4);
$stmt->bindParam(':keterangan_motor4', $keterangan_motor4);
$stmt->bindParam(':kondisi_motor5', $kondisi_motor5);
$stmt->bindParam(':keterangan_motor5', $keterangan_motor5);
$stmt->bindParam(':kondisi_motor6', $kondisi_motor6);
$stmt->bindParam(':keterangan_motor6', $keterangan_motor6);
$stmt->bindParam(':kondisi_motor7', $kondisi_motor7);
$stmt->bindParam(':keterangan_motor7', $keterangan_motor7);
$stmt->bindParam(':kondisi_motor8', $kondisi_motor8);
$stmt->bindParam(':keterangan_motor8', $keterangan_motor8);

// Pompa
$stmt->bindParam(':kondisi_pompa1', $kondisi_pompa1);
$stmt->bindParam(':keterangan_pompa1', $keterangan_pompa1);
$stmt->bindParam(':kondisi_pompa2', $kondisi_pompa2);
$stmt->bindParam(':keterangan_pompa2', $keterangan_pompa2);
$stmt->bindParam(':kondisi_pompa3', $kondisi_pompa3);
$stmt->bindParam(':keterangan_pompa3', $keterangan_pompa3);
$stmt->bindParam(':kondisi_pompa4', $kondisi_pompa4);
$stmt->bindParam(':keterangan_pompa4', $keterangan_pompa4);
$stmt->bindParam(':kondisi_pompa5', $kondisi_pompa5);
$stmt->bindParam(':keterangan_pompa5', $keterangan_pompa5);
$stmt->bindParam(':kondisi_pompa6', $kondisi_pompa6);
$stmt->bindParam(':keterangan_pompa6', $keterangan_pompa6);
$stmt->bindParam(':kondisi_pompa7', $kondisi_pompa7);
$stmt->bindParam(':keterangan_pompa7', $keterangan_pompa7);
$stmt->bindParam(':kondisi_pompa8', $kondisi_pompa8);
$stmt->bindParam(':keterangan_pompa8', $keterangan_pompa8);
$stmt->bindParam(':kondisi_pompa9', $kondisi_pompa9);
$stmt->bindParam(':keterangan_pompa9', $keterangan_pompa9);
$stmt->bindParam(':kondisi_pompa10', $kondisi_pompa10);
$stmt->bindParam(':keterangan_pompa10', $keterangan_pompa10);

// aksesoris
$stmt->bindParam(':kondisi_aksesoris1', $kondisi_aksesoris1);
$stmt->bindParam(':keterangan_aksesoris1', $keterangan_aksesoris1);
$stmt->bindParam(':kondisi_aksesoris2', $kondisi_aksesoris2);
$stmt->bindParam(':keterangan_aksesoris2', $keterangan_aksesoris2);
$stmt->bindParam(':kondisi_aksesoris3', $kondisi_aksesoris3);
$stmt->bindParam(':keterangan_aksesoris3', $keterangan_aksesoris3);
$stmt->bindParam(':kondisi_aksesoris4', $kondisi_aksesoris4);
$stmt->bindParam(':keterangan_aksesoris4', $keterangan_aksesoris4);
$stmt->bindParam(':kondisi_aksesoris5', $kondisi_aksesoris5);
$stmt->bindParam(':keterangan_aksesoris5', $keterangan_aksesoris5);
$stmt->bindParam(':kondisi_aksesoris6', $kondisi_aksesoris6);
$stmt->bindParam(':keterangan_aksesoris6', $keterangan_aksesoris6);
$stmt->bindParam(':kondisi_aksesoris7', $kondisi_aksesoris7);
$stmt->bindParam(':keterangan_aksesoris7', $keterangan_aksesoris7);

// gearbox
$stmt->bindParam(':kondisi_gearbox1', $kondisi_gearbox1);
$stmt->bindParam(':keterangan_gearbox1', $keterangan_gearbox1);
$stmt->bindParam(':kondisi_gearbox2', $kondisi_gearbox2);
$stmt->bindParam(':keterangan_gearbox2', $keterangan_gearbox2);
$stmt->bindParam(':kondisi_gearbox3', $kondisi_gearbox3);
$stmt->bindParam(':keterangan_gearbox3', $keterangan_gearbox3);
$stmt->bindParam(':kondisi_gearbox4', $kondisi_gearbox4);
$stmt->bindParam(':keterangan_gearbox4', $keterangan_gearbox4);
$stmt->bindParam(':kondisi_gearbox5', $kondisi_gearbox5);
$stmt->bindParam(':keterangan_gearbox5', $keterangan_gearbox5);
$stmt->bindParam(':kondisi_gearbox6', $kondisi_gearbox6);
$stmt->bindParam(':keterangan_gearbox6', $keterangan_gearbox6);
$stmt->bindParam(':kondisi_gearbox7', $kondisi_gearbox7);
$stmt->bindParam(':keterangan_gearbox7', $keterangan_gearbox7);

// deskripsi
$stmt->bindParam(':deskripsi1', $deskripsi1);
$stmt->bindParam(':deskripsi2', $deskripsi2);
$stmt->bindParam(':deskripsi3', $deskripsi3);
$stmt->bindParam(':deskripsi4', $deskripsi4);
$stmt->bindParam(':deskripsi5', $deskripsi5);
$stmt->bindParam(':deskripsi6', $deskripsi6);
$stmt->bindParam(':deskripsi7', $deskripsi7);
$stmt->bindParam(':deskripsi8', $deskripsi8);
$stmt->bindParam(':deskripsi9', $deskripsi9);
$stmt->bindParam(':deskripsi10', $deskripsi10);

// jumlah
$stmt->bindParam(':jumlah1', $jumlah1);
$stmt->bindParam(':jumlah2', $jumlah2);
$stmt->bindParam(':jumlah3', $jumlah3);
$stmt->bindParam(':jumlah4', $jumlah4);
$stmt->bindParam(':jumlah5', $jumlah5);
$stmt->bindParam(':jumlah6', $jumlah6);
$stmt->bindParam(':jumlah7', $jumlah7);
$stmt->bindParam(':jumlah8', $jumlah8);
$stmt->bindParam(':jumlah9', $jumlah9);
$stmt->bindParam(':jumlah10', $jumlah10);

// checkbox_motor
$stmt->bindParam(':checkbox_motor1', $checkbox_motor1);
$stmt->bindParam(':checkbox_motor2', $checkbox_motor2);
$stmt->bindParam(':checkbox_motor3', $checkbox_motor3);
$stmt->bindParam(':checkbox_motor4', $checkbox_motor4);
$stmt->bindParam(':checkbox_motor5', $checkbox_motor5);
$stmt->bindParam(':checkbox_motor6', $checkbox_motor6);
$stmt->bindParam(':checkbox_motor7', $checkbox_motor7);
$stmt->bindParam(':checkbox_motor8', $checkbox_motor8);

// checkbox_pompa
$stmt->bindParam(':checkbox_pompa1', $checkbox_pompa1);
$stmt->bindParam(':checkbox_pompa2', $checkbox_pompa2);
$stmt->bindParam(':checkbox_pompa3', $checkbox_pompa3);
$stmt->bindParam(':checkbox_pompa4', $checkbox_pompa4);
$stmt->bindParam(':checkbox_pompa5', $checkbox_pompa5);
$stmt->bindParam(':checkbox_pompa6', $checkbox_pompa6);
$stmt->bindParam(':checkbox_pompa7', $checkbox_pompa7);
$stmt->bindParam(':checkbox_pompa8', $checkbox_pompa8);
$stmt->bindParam(':checkbox_pompa9', $checkbox_pompa9);
$stmt->bindParam(':checkbox_pompa10', $checkbox_pompa10);

// checkbox_aksesoris
$stmt->bindParam(':checkbox_aksesoris1', $checkbox_aksesoris1);
$stmt->bindParam(':checkbox_aksesoris2', $checkbox_aksesoris2);
$stmt->bindParam(':checkbox_aksesoris3', $checkbox_aksesoris3);
$stmt->bindParam(':checkbox_aksesoris4', $checkbox_aksesoris4);
$stmt->bindParam(':checkbox_aksesoris5', $checkbox_aksesoris5);
$stmt->bindParam(':checkbox_aksesoris6', $checkbox_aksesoris6);
$stmt->bindParam(':checkbox_aksesoris7', $checkbox_aksesoris7);

// checkbox_gearbox
$stmt->bindParam(':checkbox_gearbox1', $checkbox_gearbox1);
$stmt->bindParam(':checkbox_gearbox2', $checkbox_gearbox2);
$stmt->bindParam(':checkbox_gearbox3', $checkbox_gearbox3);
$stmt->bindParam(':checkbox_gearbox4', $checkbox_gearbox4);
$stmt->bindParam(':checkbox_gearbox5', $checkbox_gearbox5);
$stmt->bindParam(':checkbox_gearbox6', $checkbox_gearbox6);
$stmt->bindParam(':checkbox_gearbox7', $checkbox_gearbox7);

$stmt->bindParam(':kebutuhan_material', $kebutuhan_material);
$stmt->bindParam(':korektif', $korektif);

$stmt->bindParam(':pemeliharaan_motor1', $pemeliharaan_motor1);
$stmt->bindParam(':pemeliharaan_motor2', $pemeliharaan_motor2);

$stmt->bindParam(':pemeliharaan_pompa1', $pemeliharaan_pompa1);
$stmt->bindParam(':pemeliharaan_pompa2', $pemeliharaan_pompa2);

$stmt->bindParam(':pemeliharaan_gearbox1', $pemeliharaan_gearbox1);
$stmt->bindParam(':pemeliharaan_gearbox2', $pemeliharaan_gearbox2);

$stmt->bindParam(':pemeliharaan_aksesoris', $pemeliharaan_aksesoris);

// Cek apakah data berhasil disimpan
if ($stmt->execute()) {
    // Menampilkan alert menggunakan JavaScript setelah data disimpan
    echo "<script>
            alert('Data berhasil disimpan.');
            window.location.href = 'pump.php?token=" . urlencode($_SESSION['token']) . "';
          </script>";
    exit; // Pastikan tidak ada output lainnya setelah header
} else {
    echo "Gagal menyimpan data: " . $stmt->errorInfo()[2];
}
