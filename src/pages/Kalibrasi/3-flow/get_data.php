<?php
// Koneksi ke database
include 'config/config2.php';

// Ambil ID dari parameter GET
$id = $_GET['id'];

// Query untuk mengambil data berdasarkan ID
$sql = "SELECT * FROM schedule_flowmeter WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Mengembalikan data dalam format JSON
    echo json_encode($row);
} else {
    echo json_encode(array()); // Mengembalikan array kosong jika data tidak ditemukan
}

// Tutup koneksi database
$conn->close();
?>
