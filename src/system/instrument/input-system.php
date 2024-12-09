<?php
require_once '../../config/config2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $departemen_pemilik = mysqli_real_escape_string($conn, $_POST['departemen_pemilik']);
    $nama_alat = mysqli_real_escape_string($conn, $_POST['nama_alat']);
    $kode_alat = mysqli_real_escape_string($conn, $_POST['kode_alat']);
    $merk_alat = mysqli_real_escape_string($conn, $_POST['merk_alat']);
    $tipe = mysqli_real_escape_string($conn, $_POST['tipe']);
    $lokasi_alat = mysqli_real_escape_string($conn, $_POST['lokasi_alat']);
    $nomor_kalibrasi = mysqli_real_escape_string($conn, $_POST['nomor_kalibrasi']);
    $resolusi = mysqli_real_escape_string($conn, $_POST['resolusi']);
    $pembacaan_terkecil = mysqli_real_escape_string($conn, $_POST['pembacaan_terkecil']);
    $kapasitas = mysqli_real_escape_string($conn, $_POST['kapasitas']);
    $kapasitas_alat = mysqli_real_escape_string($conn, $_POST['kapasitas_alat']);
    $range_penggunaan_alat = mysqli_real_escape_string($conn, $_POST['range_penggunaan_alat']);
    $limits_of_permissible_error = mysqli_real_escape_string($conn, $_POST['limits_of_permissible_error']);
    $relates_form_balances = mysqli_real_escape_string($conn, $_POST['relates_form_balances']);

    $sql = "INSERT INTO instrument_schedule (departemen_pemilik, nama_alat, kode_alat, merk_alat, tipe, lokasi_alat, nomor_kalibrasi, resolusi, pembacaan_terkecil, kapasitas, kapasitas_alat, range_penggunaan_alat, limits_of_permissible_error, relates_form_balances) 
            VALUES ('$departemen_pemilik', '$nama_alat', '$kode_alat', '$merk_alat', '$tipe', '$lokasi_alat', '$nomor_kalibrasi', '$resolusi', '$pembacaan_terkecil', '$kapasitas', '$kapasitas_alat', '$range_penggunaan_alat', '$limits_of_permissible_error', '$relates_form_balances')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../../pages/Kalibrasi/4-instrument/schedule.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
