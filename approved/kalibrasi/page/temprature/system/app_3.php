<?php
include '../../../src/config/config2.php';

$id = $_GET['id'];
$username = $_GET['username'];
$bagian = $_GET['bagian'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Select img from assets (tanpa WHERE karena tidak ada kolom 'id')
    $sql = "SELECT img FROM assets LIMIT 1";  // Mengambil satu gambar dari tabel assets
    $stmt_select = $conn->prepare($sql);
    
    if ($stmt_select) {
        $stmt_select->execute();
        $result = $stmt_select->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $img = $row['img'];

                if (is_null($img)) {
                    session_start();
                    session_unset();
                    session_destroy();
                
                    echo "Gambar tidak ditemukan.<br>";
                    continue;
                }

                $stmt_update = $conn->prepare("UPDATE temprature_handover SET app3 = ?, manager = ? WHERE id = ?");

                if ($stmt_update) {
                    $stmt_update->bind_param("ssi", $img, $username, $id);

                    if ($stmt_update->execute()) {
                        // Hapus session
                        session_start(); // Pastikan session sudah dimulai
                        session_unset();  // Hapus semua variabel session
                        session_destroy(); // Hancurkan session
                    
                        // Redirect ke halaman berikutnya
                        header("Location: http://10.11.11.176/dokumentcontrol/approvement/temprature/views.php?id=$id&BERHASIL✅");
                        exit();
                    } else {
                        session_start();
                        session_unset();
                        session_destroy();
                    
                        echo "<script>alert('APPROVED FAILED ❎');</script><br>"; // $id: " . $stmt_update->error . "
                    }

                    $stmt_update->close();
                } else {
                    session_start();
                    session_unset();
                    session_destroy();
                
                    echo "Gagal menyiapkan statement update: " . $conn->error . "<br>";
                }
            }
        } else {
            session_start();
            session_unset();
            session_destroy();
        
            echo "Tidak ada gambar yang ditemukan di tabel assets.";
        }

        $stmt_select->close();
    } else {
        session_start();
        session_unset();
        session_destroy();
    
        echo "Gagal menyiapkan statement select: " . $conn->error;
    }

    $conn->close();
}
?>
