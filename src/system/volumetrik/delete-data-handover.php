<?php
require_once '../../config/config2.php'; // Pastikan koneksi ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM volumetrik_handover WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: ../../pages/Kalibrasi/8-volumetrik/handover.php?BERHASIL");
    } else {
        header("Location: ../../pages/Kalibrasi/8-volumetrik/handover.php?GAGAL");
    }

    $stmt->close();
}
$conn->close();
?>
