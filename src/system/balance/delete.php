<?php
require '../../config/config2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ids']) && is_array($_POST['ids'])) {
        $ids = $_POST['ids'];
        
        $escapedIds = array_map(function($id) use ($conn) {
            return $conn->real_escape_string($id);
        }, $ids);
        
        $idsString = "'" . implode("','", $escapedIds) . "'";
        
        $sql = "DELETE FROM balance_schedule WHERE id IN ($idsString)";
        
        if ($conn->query($sql) === TRUE) {
            header('Location: ../../pages/kalibrasi/1-balance/schedule.php');
        } else {
            echo "Error: " . $conn->error;
        }
    }
    $conn->close();
}
?>
