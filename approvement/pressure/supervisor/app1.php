
<?php
include '../../../src/config/config2.php';
$username = $_SESSION['username'];
$bagian = $_SESSION['bagian'];

$username = $_GET['username'];
$bagian = $_GET['bagian'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ids']) && is_array($_POST['ids'])) {
        $ids = $_POST['ids'];
        
        $escapedIds = array_map(function($id) use ($conn) {
            return $conn->real_escape_string($id);
        }, $ids);
        
        $idsString = "'" . implode("','", $escapedIds) . "'";
        $name = $username;
        
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
        
                $stmt_update = $conn->prepare("UPDATE pressure_handover SET app2 = ?, supervisor = ? WHERE id IN ($idsString)");

                if ($stmt_update) {
                    $stmt_update->bind_param("ss", $img, $name);

                    if ($stmt_update->execute()) {
                    
                        header("Location: http://10.11.11.199/dokument-control/approvement/pressure/supervisor/belumapprove.php?username=" . urlencode($username) . "&bagian=" . urlencode($bagian));
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