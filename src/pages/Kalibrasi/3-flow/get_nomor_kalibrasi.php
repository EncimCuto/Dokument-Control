<?php
// Koneksi ke database
include 'config/config2.php';

// Query untuk mengambil semua nomor kalibrasi
$sql = "SELECT id, nomor_kalibrasi FROM schedule_flowmeter";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Mengembalikan data dalam format JSON
echo json_encode($data);

// Tutup koneksi database
$conn->close();
?>
