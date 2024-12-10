<?php
include '../../../src/config/config2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {   
if (isset($_POST['ids']) && is_array($_POST['ids'])) {
    $ids = $_POST['ids'];
    
    $escapedIds = array_map(function($id) use ($conn) {
        return $conn->real_escape_string($id);
    }, $ids);
    
    $idsString = "'" . implode("','", $escapedIds) . "'";
      
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
                
                    echo "Gambar tidak ditemukan.<br>";
                    continue;
                }

                $stmt_update = $conn->prepare("UPDATE pressure_handover SET app1 = ?, foreman = ? WHERE id IN ($idsString)");

                if ($stmt_update) {
                    $stmt_update->bind_param("si", $img, $idsString);

                    if ($stmt_update->execute()) {
                    
                        header("Location: http://10.11.11.199/dokument-control/approvement/pressure/foreman/belumapprove.php?id=BERHASIL✅");
                        exit();
                    }
                     else {
                    
                        echo "<script>alert('APPROVED FAILED ❎');</script><br>"; // $id: " . $stmt_update->error . "
                    }

                    $stmt_update->close();
                } else {
                
                    echo "Gagal menyiapkan statement update: " . $conn->error . "<br>";
                }
            }
        } else {
            echo "Tidak ada gambar yang ditemukan di tabel assets.";
        }

        $stmt_select->close();
    } else {
        echo "Gagal menyiapkan statement select: " . $conn->error;
    }

    $conn->close();
}
}
?>
