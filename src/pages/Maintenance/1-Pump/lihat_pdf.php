<?php
require_once '../../../config/config5.php';

// Periksa apakah ID disediakan di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Siapkan dan jalankan query untuk mengambil file PDF berdasarkan ID
    $sql = "SELECT nama_file, pdf_file FROM pump_pdf WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($fileName, $pdfFile);
    $stmt->fetch();

    // Pastikan file PDF berhasil diambil
    if (!empty($pdfFile)) {
        // Mengirim header untuk menampilkan PDF di browser
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=\"" . $fileName . "\"");
        header("Content-Length: " . strlen($pdfFile)); // Memberikan panjang file
        echo $pdfFile;
    } else {
        echo "File PDF tidak ditemukan.";
    }

    $stmt->close();
    exit;
} else {
    echo "ID tidak valid.";
}
