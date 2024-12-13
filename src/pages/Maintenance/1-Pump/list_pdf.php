<?php
session_start();
require_once '../../../config/config1.php';

if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    header('Location: ../../../../index.php');
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
    <title>pdf pump</title>

    <!-- css -->
    <link rel="stylesheet" href="../../../styles/schedule.css">
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

            <!-- schedule -->
            <div class="menu_right">
                <!-- FILTER -->
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling2" aria-controls="offcanvasScrolling">
                    <i class="bi bi-filter-right" style="font-size: 20px;"></i>
                </button>

                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling2" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h3 class="offcanvas-title" id="offcanvasScrollingLabel">Filter Data</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Nama File
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <form style="display: flex; justify-content:right;" action="list_pdf.php" method="GET">
                                            <input class="form-control" id="nama_file" name="nama_file" placeholder="Nama File" type="text">
                                            <input class="btn btn-primary" type="submit" value="Search">
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Tanggal
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <form style="display: flex; justify-content:right;" action="list_pdf.php" method="GET">
                                            <input class="form-control" id="created_at" name="created_at" placeholder="Tanggal" type="text">
                                            <input class="btn btn-primary" type="submit" value="Search">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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

        <!-- PAGE -->

        <div class="fill">
            <div class="dread">
                <div class="crumb">
                    <div class="rumb">
                        <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="../../../../public/indeks.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">
                            MENU</a>
                        <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="../../maintenance.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">
                            >MAINTENANCE</a>
                        <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="dashboard.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">
                            > MOTOR PUMP</a>
                        <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="list_pdf.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">> FORM PDF</a>
                    </div>
                </div>
            </div>
            <div class="page">
                <div class="data-sch">

                    <!-- TABLE -->
                    <?php
                    require_once '../../../config/config5.php';

                    // departemen pemilik
                    if (isset($_GET['created_at'])) {
                        $created_at = $_GET['created_at'];
                    } else {
                        $created_at = '';
                    }

                    // nama alat
                    if (isset($_GET['nama_file'])) {
                        $nama_file = $_GET['nama_file'];
                    } else {
                        $nama_file = '';
                    }

                    $sql = "SELECT * FROM pump_pdf WHERE 1";

                    // nama alat
                    if (!empty($nama_file)) {
                        $sql .= " AND nama_file LIKE '%$nama_file%'";
                    }

                    // nama alat
                    if (!empty($created_at)) {
                        $sql .= " AND $created_at LIKE '%$created_at%'";
                    }

                    $result = $conn->query($sql);
                    echo "<table class='table table-hover'>";
                    echo "<tr class='table-dark table-sm'>";
                    echo "<th>No.</th>";
                    echo "<th>Nama File</th>";
                    echo "<th>Created At</th>";
                    echo "<th colspan='2'>OPSI</th>";
                    echo "</tr>";
                    if ($result && $result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo '<td class="table-check"><input type="checkbox" name="ids[]" class="form-check-input" value="' . htmlspecialchars($row['id']) . '"></td>';
                            echo '<td>' . $no . '</td>';
                            echo "<td>" . htmlspecialchars($row['nama_file']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                            echo '<td><a href="lihat_pdf.php?id=' . $row['id'] . '" target="_blank"><i class="bi bi-eye-fill"></i></a></td>';
                            echo '<td><a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="../../../system/pressure/delete-data-list_pdf.php?id=' . htmlspecialchars($row['id']) . '"><i class="bi bi-trash-fill"></i></a></td>';
                            echo "</tr>";
                            $no++;
                        }
                        echo "</table>";
                    }
                    $conn->close();
                    ?>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS & BOOSTRAP -->
    <script src="../../../components/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../components/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>