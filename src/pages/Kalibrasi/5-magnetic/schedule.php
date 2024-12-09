<?php
session_start();
require_once 'config/config1.php';

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
    <title>schedule balance</title>

    <!-- css -->
    <link rel="stylesheet" href="style/schedule.css">
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <!-- /css -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="all">
    <div class="header">
        <img src="../../../asset/BAS_logo.png" alt="">
    </div>

    <!-- navbar -->

    <div class="navbar">

    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
    </svg>
    </button>

<div class="menu_right">
      
<!-- TAMBAH SCHEDULE -->
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
    </svg>
</button>

<div class="offcanvas offcanvas-end custom-offcanvas" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title" id="offcanvasRightLabel">ADD DATA</h3>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
                <form class="input-sistem" action="system/input-system.php" method="post">
                    <label for="departemen_pemilik">DEPARTEMEN_PEMILIK</label><br>
                    <input class="form-control" type="text" name="departemen_pemilik" id="departemen_pemilik"><br>

                    <label for="nama_alat">NAMA ALAT</label><br>
                    <input class="form-control" type="text" name="nama_alat" id="nama_alat"><br>

                    <label for="kode_alat">KODE ALAT</label><br>
                    <input class="form-control" type="text" name="kode_alat" id="kode_alat"><br>

                    <label for="merk_alat">MERK ALAT</label><br>
                    <input class="form-control" type="text" name="merk_alat" id="merk_alat"><br>

                    <label for="tipe">TIPE</label><br>
                    <input class="form-control" type="text" name="tipe" id="tipe"><br>

                    <label for="lokasi_alat">LOKASI ALAT</label><br>
                    <input class="form-control" type="text" name="lokasi_alat" id="lokasi_alat"><br>

                    <label for="nomor_kalibrasi">NOMOR KALIBRASI</label><br>
                    <input class="form-control" type="text" name="nomor_kalibrasi" id="nomor_kalibrasi"><br>

                    <label for="resolusi">RESOLUSI</label><br>
                    <input class="form-control" type="text" name="resolusi" id="resolusi"><br>

                    <label for="pembacaan_terkecil">PEMBACAAN TERKECIL</label><br>
                    <input class="form-control" type="text" name="pembacaan_terkecil" id="pembacaan_terkecil"><br>

                    <label for="kapasitas">KAPASITAS</label><br>
                    <input class="form-control" type="text" name="kapasitas" id="kapasitas"><br>

                    <label for="kapasitas_alat">KAPASITAS ALAT(gram)</label><br>
                    <input class="form-control" type="text" name="kapasitas_alat" id="kapasitas_alat"><br>

                    <label for="range_penggunaan">RANGE PENGGUNAAN ALAT</label><br>
                    <input class="form-control" type="text" name="range_penggunaan" id="range_penggunaan"><br>

                    <label for="limits_of_permissible_error">LIMITS_OF_PESSIBLE_ERROR</label><br>
                    <input class="form-control" type="text" name="limits_of_permissible_error" id="limits_of_permissible_error"><br>

                    <label for="relates_form_balances">RELATED_FORM_BALANCEs</label><br>
                    <input class="form-control" type="text" name="relates_form_balances" id="relates_form_balances"><br>

                    <input class="btn btn-primary" type="submit" value="SAVE">
                </form>
            </table>
    </div>
</div>

<!-- FILTER -->

<button class="btn btn-primary" type="button" >
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
        <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
    </svg>
</button>

<!-- SELECT DATA -->

<button class="btn btn-primary" type="button" >
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0"/>
        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708"/>
    </svg>
</button>
</div> 

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasScrollingLabel">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
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
                            <td>DEPARTEMEN</td>
                            <td>:</td>
                            <td></td>
                            <td><?php echo htmlspecialchars($bagian); ?></td>
                        </tr>
                    </table>
                    </div>
                    </div>
            </div>
            </li>
            <li class="list-group-item"><a href="system/logout-system.php" class="link-dark link-underline link-underline-opacity-0">Logout</a></li>
        </ul>
        </div>
    </div>
    </div>

    <!-- page -->

<div class="fill">
<div class="dread">
        <div class="crumb">
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="../../../login/indeks.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MENU</a>
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="../kalibrasi.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">> KALIBRASI</a>
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="magnetic.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">> MAGNETIC-TRAP</a>            
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="schedule.php">> SCHEDULE-MAGNETIC-TRAP</a>
        </div>
        <hr>
</div>
<div class="page">

<!-- table -->

<table class="table table-striped table-hover">
    <tr>
        <th>NO</th>
        <th>KODE_ALAT</th>
        <th>DEPARTEMEN_PEMILIK</th>
        <th>NAMA_ALAT</th>
        <th>MERK_ALAT</th>
        <th>TIPE</th>
        <th>LOKASI</th>
        <th>NOMOR_KALIBRASI</th>
        <th>RESOLUSI</th>
        <th>PEMBACAAN_TERKECIL</th>
        <th>KAPASITAS</th>
        <th>KAPASITAS_ALAT(gram)</th>
        <th>RANGE_PENGGUNAAN_ALAT</th>
        <th>LIMITS_OF_PESSIBLE_ERROR</th>
        <th>RELATED_FORM_BALANCEs</th>
    </tr>
    <?php
    require_once 'config/config2.php';

     $sql = "SELECT * FROM schedule_balance";
     $result = $conn->query($sql);
 
     if ($result) {
         if ($result->num_rows > 0) {
             $counter = 1;
             while ($row = $result->fetch_assoc()) {
    echo '<tr>';
                echo '<td>' . $counter . '</td>';
                echo '<td>' . (htmlspecialchars($row['kode_alat'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['departemen_pemilik'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['nama_alat'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['merk_alat'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['tipe'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['lokasi_alat'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['nomor_kalibrasi'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['resolusi'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['pembacaan_terkecil'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['kapasitas'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['kapasitas_alat'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['range_penggunaan_alat'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['limits_of_permissible_error'])) . '</td>';
                echo '<td>' . (htmlspecialchars($row['relates_form_balances'])) . '</td>';
    echo '</tr>';
    $counter++;
    }
     }
    echo '</table>';
      }
    ?>
<!-- /table -->

</div>
</div>
</div>

<!-- js -->
<script src="script.js"></script>
<script src="../../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../../bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>