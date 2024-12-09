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

<?php
require_once '../../../config/config2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the IDs from the POST request
  $ids = isset($_POST['ids']) ? json_decode($_POST['ids'], true) : [];

  if (!empty($ids)) {
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
    }

    // Create a prepared statement to prevent SQL injection
    $stmt = $conn->prepare('DELETE FROM your_table WHERE id = ?');

    foreach ($ids as $id) {
      $stmt->bind_param('i', $id);
      $stmt->execute();
    }

    $stmt->close();
    $conn->close();
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>schedule balance</title>

  <!-- css -->
  <link rel="stylesheet" href="../../../styles/schedule.css">
  <link rel="stylesheet" href="../../../components/bootstrap/css/bootstrap.min.css">
  <!-- /css -->
  <!-- icon -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.4/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="path/to/bootstrap-icons.css">
  <!-- /icon -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet">
</head>

<body>
  <div class="all">
    <div class="header">
      <img src="../../../assets/BAS_logo.png" alt="">
    </div>

    <!-- navbar -->
    <div class="navbar">
      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
        aria-controls="offcanvasScrolling">
        <i class="bi bi-list" style="font-size: 20px;"></i>
      </button>

      <!-- schedule -->
      <div class="menu_right">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="bi bi-plus-lg" style="font-size: 20px;"></i>
        </button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                  <table>
                    <tr>
                      <td><img src="../../../assets/BAS_logo.png" alt=""></td>
                    </tr>
                  </table>
                </h1>
              </div>
              <div class="modal-body">
                <form id="formFlowmeter" method="post" action="../../../system/balance/input-system.php">
                  <label for="departemen_pemilik">DEPARTEMEN PEMILIK</label><br>
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
                  <input class="form-control" type="text" name="nomor_kalibrasi" id="nomor_kalibrasi">

                  <label for="resolusi">RESOLUSI</label><br>
                  <input class="form-control" type="text" name="resolusi" id="resolusi"><br>

                  <label for="pembacaan_terkecil">PEMBACAAN TERKECIL</label><br>
                  <input class="form-control" type="text" name="pembacaan_terkecil" id="pembacaan_terkecil"><br>

                  <label for="kapasitas">KAPASITAS</label><br>
                  <input class="form-control" type="text" name="kapasitas" id="kapasitas"><br>

                  <label for="kapasitas_alat">KAPASITAS ALAT(gram)</label><br>
                  <input class="form-control" type="text" name="kapasitas_alat" id="kapasitas_alat"><br>

                  <label for="range_penggunaan">RANGE PENGGUNAAN ALAT</label><br>
                  <input class="form-control" type="text" name="range_penggunaan_alat" id="range_penggunaan_alat"><br>

                  <label for="limits_of_permissible_error">LIMITS OF PESSIBLE ERROR</label><br>
                  <input class="form-control" type="text" name="limits_of_permissible_error"
                    id="limits_of_permissible_error"><br>

                  <label for="relates_form_balances">RELATED FORM BALANCEs</label><br>
                  <input class="form-control" type="text" name="relates_form_balances" id="relates_form_balances"><br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input class="btn btn-primary" type="submit" value="Save">
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- SELECT DATA -->
        <button id="toggleButton" class="btn btn-primary" type="button">
          <i class="bi bi-check2-all" style="font-size: 20px;"></i>
        </button>

        <!-- FILTER -->
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling2"
          aria-controls="offcanvasScrolling">
          <i class="bi bi-filter-right" style="font-size: 20px;"></i>
        </button>

        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
          id="offcanvasScrolling2" aria-labelledby="offcanvasScrollingLabel">
          <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasScrollingLabel">Filter Data</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">

            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Departemen Pemilik
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="departemen_pemilik" name="departemen_pemilik"
                        placeholder="Departemen" type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Nama Alat
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="nama_alat" name="nama_alat" placeholder="Nama Alat" type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapseTwo">
                    Kode Alat
                  </button>
                </h2>
                <div id="collapse14" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="kode_alat" name="kode_alat" placeholder="Kode Alat" type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Merk Alat
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="merk_alat" name="merk_alat" placeholder="Merk Alat" type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapseThree">
                    Tipe
                  </button>
                </h2>
                <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="tipe" name="tipe" placeholder="Tipe" type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                    Lokasi alat
                  </button>
                </h2>
                <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="lokasi_alat" name="lokasi_alat" placeholder="Lokasi Alat"
                        type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapseThree">
                    Nomor Kalibrasi
                  </button>
                </h2>
                <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="nomor_kalibrasi" name="nomor_kalibrasi"
                        placeholder="Nomor Kalibrasi" type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapseThree">
                    Resolusi
                  </button>
                </h2>
                <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="resolusi" name="resolusi" placeholder="Resolusi" type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapseThree">
                    Pembacaan Terkecil
                  </button>
                </h2>
                <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="pembacaan_terkecil" name="pembacaan_terkecil"
                        placeholder="Pembacaan Terkecil" type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapseThree">
                    Kapasitas
                  </button>
                </h2>
                <div id="collapse9" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas" type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapseThree">
                    Kapasitas Alat
                  </button>
                </h2>
                <div id="collapse10" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="kapasitas_alat" name="kapasitas_alat" placeholder="Kapasitas Alat"
                        type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapseThree">
                    Range Penggunaan Alat
                  </button>
                </h2>
                <div id="collapse11" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="range_penggunaan_alat" name="range_penggunaan_alat"
                        placeholder="Range Penggunaan Alat" type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapseThree">
                    Limits Of Permissible Error
                  </button>
                </h2>
                <div id="collapse12" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="limits_of_permissible_error" name="limits_of_permissible_error"
                        placeholder="limits of permissible error" type="text">
                      <input class="btn btn-primary" type="submit" value="Search">
                    </form>

                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapseThree">
                    Related Form Balance
                  </button>
                </h2>
                <div id="collapse13" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <form style="display: flex; justify-content:right;" action="schedule.php" method="GET">
                      <input class="form-control" id="relates_form_balances" name="relates_form_balances"
                        placeholder=" Related Form Balance" type="text">
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
      <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
        id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
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
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseTwo">
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
            <li class="list-group-item"><a href="?action=logout"
                class="link-dark link-underline link-underline-opacity-0">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- PAGE -->

    <div class="fill">
      <div class="dread">
        <div class="crumb">
          <div class="rumb">
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
              href="../../../../public/indeks.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MENU</a>
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
              href="../../kalibrasi.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">> KALIBRASI</a>
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
              href="balance.php">> BALANCE</a>
            <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
              href="schedule.php">> SCHEDULE-BALANCE</a>
          </div>
          <div class="delet">
            <button id="selectedall" class="btn btn-warning btn-sm">Check Al</button>
            <form method="post" action="../../../system/balance/delete.php" id="form-delete">
              <button class="btn btn-danger btn-sm" type="submit"
                onclick="return confirm('Apakah Anda yakin ingin menghapus data yang tercentang?')">Delete</button>
          </div>
        </div>
      </div>
      <div class="page">
        <div class="data-sch">

          <!-- TABLE -->
          <?php
          require_once '../../../config/config2.php';

          // departemen pemilik
          if (isset($_GET['departemen_pemilik'])) {
            $departemen_pemilik = $_GET['departemen_pemilik'];
          } else {
            $departemen_pemilik = '';
          }

          // nama alat
          if (isset($_GET['nama_alat'])) {
            $nama_alat = $_GET['nama_alat'];
          } else {
            $nama_alat = '';
          }

          // kode alat
          if (isset($_GET['kode_alat'])) {
            $kode_alat = $_GET['kode_alat'];
          } else {
            $kode_alat = '';
          }

          // merk alat
          if (isset($_GET['merk_alat'])) {
            $merk_alat = $_GET['merk_alat'];
          } else {
            $merk_alat = '';
          }

          // tipe
          if (isset($_GET['tipe'])) {
            $tipe = $_GET['tipe'];
          } else {
            $tipe = '';
          }

          // lokasi alat
          if (isset($_GET['lokasi_alat'])) {
            $lokasi_alat = $_GET['lokasi_alat'];
          } else {
            $lokasi_alat = '';
          }

          // nomor kalibrasi
          if (isset($_GET['nomor_kalibrasi'])) {
            $nomor_kalibrasi = $_GET['nomor_kalibrasi'];
          } else {
            $nomor_kalibrasi = '';
          }

          // resolusi
          if (isset($_GET['resolusi'])) {
            $resolusi = $_GET['resolusi'];
          } else {
            $resolusi = '';
          }

          // pembacaan terkecil
          if (isset($_GET['pembacaan_terkecil'])) {
            $pembacaan_terkecil = $_GET['pembacaan_terkecil'];
          } else {
            $pembacaan_terkecil = '';
          }

          // kapasitas
          if (isset($_GET['kapasitas'])) {
            $kapasitas = $_GET['kapasitas'];
          } else {
            $kapasitas = '';
          }

          // kapasitas alat
          if (isset($_GET['kapasitas_alat'])) {
            $kapasitas_alat = $_GET['kapasitas_alat'];
          } else {
            $kapasitas_alat = '';
          }

          // range penggunaan alat
          if (isset($_GET['range_penggunaan_alat'])) {
            $range_penggunaan_alat = $_GET['range_penggunaan_alat'];
          } else {
            $range_penggunaan_alat = '';
          }

          // limits of pesibble error
          if (isset($_GET['limits_of_permissible_error'])) {
            $limits_of_permissible_error = $_GET['limits_of_permissible_error'];
          } else {
            $limits_of_permissible_error = '';
          }

          // related form balance
          if (isset($_GET['relates_form_balances'])) {
            $relates_form_balances = $_GET['relates_form_balances'];
          } else {
            $relates_form_balances = '';
          }

          $sql = "SELECT * FROM balance_schedule WHERE 1";

          // departemen pemilik
          if (!empty($departemen_pemilik)) {
            $sql .= " AND departemen_pemilik LIKE '%$departemen_pemilik%'";
          }

          // nama alat
          if (!empty($nama_alat)) {
            $sql .= " AND nama_alat LIKE '%$nama_alat%'";
          }

          // kode alat
          if (!empty($kode_alat)) {
            $sql .= " AND kode_alat LIKE '%$kode_alat%'";
          }

          // merk alat
          if (!empty($merk_alat)) {
            $sql .= " AND merk_alat LIKE '%$merk_alat%'";
          }

          // tipe
          if (!empty($tipe)) {
            $sql .= " AND tipe LIKE '%$tipe%'";
          }


          // lokasi alat
          if (!empty($lokasi_alat)) {
            $sql .= " AND lokasi_alat LIKE '%$lokasi_alat%'";
          }

          // nomor kalibrasi
          if (!empty($nomor_kalibrasi)) {
            $sql .= " AND nomor_kalibrasi LIKE '%$nomor_kalibrasi%'";
          }

          // resolusi
          if (!empty($resolusi)) {
            $sql .= " AND resolusi LIKE '%$resolusi%'";
          }

          // pembacaan
          if (!empty($pembacaan_terkecil)) {
            $sql .= " AND pembacaan_terkecil LIKE '%$pembacaan_terkecil%'";
          }

          // kapasitas
          if (!empty($kapasitas)) {
            $sql .= " AND kapasitas LIKE '%$kapasitas%'";
          }

          // kapasitas alat
          if (!empty($kapasitas_alat)) {
            $sql .= " AND kapasitas_alat LIKE '%$kapasitas_alat%'";
          }

          // range penggunaan alat
          if (!empty($range_penggunaan_alat)) {
            $sql .= " AND range_penggunaan_alat LIKE '%$range_penggunaan_alat%'";
          }

          // limits of pemissible error
          if (!empty($limits_of_permissible_error)) {
            $sql .= " AND limits_of_permissible_error	 LIKE '%$limits_of_permissible_error%'";
          }

          //relates form balances
          if (!empty($relates_form_balances)) {
            $sql .= " AND relates_form_balances LIKE '%$relates_form_balances%'";
          }

          $result = $conn->query($sql);
          echo "<table class='table table-light table-striped table-sm table-hover'>";
          echo "<tr>";
          echo "<th class='title-check'></th>";
          echo "<th>NO</th>";
          echo "<th>KODE_ALAT</th>";
          echo "<th>DEPARTEMEN_PEMILIK</th>";
          echo "<th>NAMA_ALAT</th>";
          echo "<th>MERK_ALAT</th>";
          echo "<th>TIPE</th>";
          echo "<th>LOKASI</th>";
          echo "<th>NOMOR_KALIBRASI</th>";
          echo "<th>RESOLUSI</th>";
          echo "<th>PEMBACAAN_TERKECIL</th>";
          echo "<th>KAPASITAS</th>";
          echo "<th>KAPASITAS_ALAT(gram)</th>";
          echo "<th>RANGE_PENGGUNAAN_ALAT</th>";
          echo "<th>LIMITS_OF_PESSIBLE_ERROR</th>";
          echo "<th>RELATED_FORM_BALANCEs</th>";
          echo "</tr>";
          if ($result && $result->num_rows > 0) {
            $counter = 1;
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo '<td class="table-check"><input type="checkbox" name="ids[]" class="form-check-input" value="' . htmlspecialchars($row['id']) . '"></td>';
              echo '<td>' . $counter . '</td>';
              echo "<td>" . htmlspecialchars($row['kode_alat']) . "</td>";
              echo "<td>" . htmlspecialchars($row['departemen_pemilik']) . "</td>";
              echo "<td>" . htmlspecialchars($row['nama_alat']) . "</td>";
              echo "<td>" . htmlspecialchars($row['merk_alat']) . "</td>";
              echo "<td>" . htmlspecialchars($row['tipe']) . "</td>";
              echo "<td>" . htmlspecialchars($row['lokasi_alat']) . "</td>";
              echo "<td>" . htmlspecialchars($row['nomor_kalibrasi']) . "</td>";
              echo "<td>" . htmlspecialchars($row['resolusi']) . "</td>";
              echo "<td>" . htmlspecialchars($row['pembacaan_terkecil']) . "</td>";
              echo "<td>" . htmlspecialchars($row['kapasitas']) . "</td>";
              echo "<td>" . htmlspecialchars($row['kapasitas_alat']) . "</td>";
              echo "<td>" . htmlspecialchars($row['range_penggunaan_alat']) . "</td>";
              echo "<td>" . htmlspecialchars($row['limits_of_permissible_error']) . "</td>";
              echo "<td>" . htmlspecialchars($row['relates_form_balances']) . "</td>";
              echo "</tr>";
              $counter++;
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
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var toggleButton = document.getElementById('selectedall');
      var checkboxes = document.querySelectorAll('.form-check-input');
      var allChecked = false;
      toggleButton.addEventListener('click', function () {
        allChecked = !allChecked;
        checkboxes.forEach(function (checkbox) {
          checkbox.checked = allChecked;
        });
        toggleButton.textContent = allChecked ? 'Uncheck' : 'Check All';
      });
    });

    var button = document.getElementById('toggleButton');
    button.addEventListener('click', function () {
      var element = document.querySelector('.delet');
      if (element) {
        element.classList.toggle('active');
      }
    });

    document.getElementById('toggleButton').addEventListener('click', function () {
      document.querySelectorAll('.form-check-input').forEach(function (element) {
        element.classList.toggle('active');
      });

      document.querySelectorAll('.title-check').forEach(function (element) {
        element.classList.toggle('active');
      });

      document.querySelectorAll('.table-check').forEach(function (element) {
        element.classList.toggle('active');
      });
    });
  </script>
  <script src="../../../components/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../../components/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>