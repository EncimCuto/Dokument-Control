<?php
session_start();
require_once '../../../config/config1.php';

if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    header('Location: ../../../login/login.php');
    exit;
}

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$bagian = $_SESSION['bagian'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-pdf(pressure)</title>

    <!-- css -->
    <link rel="stylesheet" href="../../../styles/certificate.css">
    <link rel="stylesheet" href="../../../components/bootstrap/css/bootstrap.min.css">
    <!-- /css -->
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.4/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="path/to/bootstrap-icons.css">
    <!-- /icon -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="all">
    <div class="header">
        <img src="../../../assets/BAS_logo.png" alt="">
    </div>

<!-- navbar -->
<div class="navbar">
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
        <i class="bi bi-list" style="font-size: 20px;"></i>
    </button>

<!-- profil -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasScrollingLabel">
                <i class="bi bi-person-circle" style="font-size: 25px;"></i>
                <?php echo htmlspecialchars($username); ?>
            </h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr>
            <div class="offcanvas-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Account
                                </button>
                            </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                    <hr>
                                        <table>
                                            <tr>
                                                <td>ID</td>
                                                <td>:</td>
                                                <td></td>
                                                <td><?php echo htmlspecialchars($id); ?></td>
                                            </tr>
                                            <tr>
                                                <td>USERNAME</td>
                                                <td>:</td>
                                                <td></td>
                                                <td><?php echo htmlspecialchars($username); ?></td>
                                            </tr>
                                            <tr>
                                                <td>ROLE</td>
                                                <td>:</td>
                                                <td></td>
                                                <td><?php echo htmlspecialchars($bagian); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </li>
                    <?php
                    if (isset($_GET['action']) && $_GET['action'] === 'logout') {
                        session_unset();
                        session_destroy();
                        header('Location: ../../../../index.php');
                        exit;
                    }
                    ?>
                    <li class="list-group-item"><a href="?action=logout" class="link-dark link-underline link-underline-opacity-0">Logout</a></li>
                </ul>
            </div>
    </div>
</div>

<!-- page -->
<div class="fill">
    <div class="dread">
        <div class="crumb">
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="../../../../public/indeks.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MENU</a>
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="../../kalibrasi.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">> KALIBRASI</a>
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="pressure.php">> PRESSURE</a>      
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href=" form-pdf.php">> FORM-PRESSURE</a>
        </div>
    </div>
<div class="page">
    <div class="data-sch">
    <div class="data-sch">
    <table class="table table-hover">
    <tr class="table-dark table-sm">
        <td class="top">#</td>
        <td class="top">Tanggal</td>
        <td class="top">Keterangan</td>
        <td class="top">View</td>
    </tr>
    <?php 
        include '../../../config/config2.php';

        // Menentukan jumlah data per halaman
        $limit = 50; 
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
        $offset = ($page - 1) * $limit; 

        // Mengambil data dengan limit dan offset
        $data = mysqli_query($conn, "SELECT * FROM pressure_handover LIMIT $limit OFFSET $offset");
        
        $no = $offset + 1; // Menampilkan nomor urut yang benar

        while($view = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $view['tgl_kalibrasi']; ?></td>
        <td style="text-align: left;"> 
            <a href="#file" id="file" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                <i class="bi bi-file-earmark-pdf-fill"></i>
            </a> 
            <?php echo $view['kode_alat']; ?>
        </td>
        <td>
            <a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="page-system/view-pdf.php?id=<?php echo $view['id']; ?>">
                <i class="bi bi-eye-fill"></i>
            </a> | 
            <a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="../../../system/pressure/delete-data-pdf.php?id=<?php echo $view['id']; ?>">
                <i class="bi bi-trash"></i>
            </a>
        </td>
    </tr>
    <?php } ?>
</table>

<?php
// Menghitung total data untuk pagination
$total_query = "SELECT COUNT(*) AS total FROM pressure_handover";
$total_result = mysqli_query($conn, $total_query);
$total_rows = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total_rows / $limit); // Menghitung jumlah halaman

// Menampilkan tautan pagination
echo '<ul class="pagination justify-content-center">';

// Previous button
if ($page > 1) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
} else {
    echo '<li class="page-item disabled"><a class="page-link">Previous</a></li>';
}

// Menampilkan 3 halaman (tampilkan halaman tengah)
$start_page = max(1, $page - 1); // Halaman awal
$end_page = min($total_pages, $page + 1); // Halaman akhir

// Jika total halaman lebih dari 3, atur batas
if ($total_pages > 3) {
    if ($start_page == 1) {
        $end_page = 3;
    } elseif ($end_page == $total_pages) {
        $start_page = $total_pages - 2;
    }
}

// Page numbers
for ($i = $start_page; $i <= $end_page; $i++) {
    if ($i == $page) {
        echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
    } else {
        echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
    }
}

// Next button
if ($page < $total_pages) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
} else {
    echo '<li class="page-item disabled"><a class="page-link">Next</a></li>';
}

echo '</ul>';
?>


  </div>
    </div>
</div>
</div>
</div>

<!-- js -->
<script src="../../../components/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../components/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>