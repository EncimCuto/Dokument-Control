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
    <title>form-volumetrik</title>

    <!-- css -->
    <link rel="stylesheet" href="../../../styles/form.css">
    <link rel="stylesheet" href="../../../styles/pressure.css">
    <link rel="stylesheet" href="../../../components/bootstrap/css/bootstrap.min.css">
    <!-- /css -->
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.4/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="path/to/bootstrap-icons.css">
    <!-- /icon -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <style>
        .dwonbtn {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .naik {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .turun {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .btnfit {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .upper {
            border: 1px solid gray;
            background-color: white;
            box-shadow: 8px 8px 13px rgba(48, 47, 47, 0.267);
            border-radius: 25px;
            padding: 2px;
        }
        .simpan {
            display: flex;
            justify-content: center;
        }
        .email {
            border: 1px solid gray;
            width: 25%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: white;
            box-shadow: 8px 8px 13px rgba(48, 47, 47, 0.267);
            border-radius: 20px;
            padding: 2px;
        }
        .dray {
            background-color: rgb(240, 241, 242);
        }
        .vol {
            text-align: center;
        }
        .divc {
            width: 400px;
        }
        .input-h {
            width: 160px;
        }
    </style>
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

        <!-- page -->
        <div class="fill">
            <div class="dread">
                <div class="crumb">
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="../../../../public/indeks.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MENU</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="../../kalibrasi.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">> KALIBRASI</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="volumetrik.php">> VOLUMETRIK</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href=" form-pikno.php">> FORM-VOLUMETRIK</a>
                </div>
            </div>
            <div class="page">
                <br>
                <form style="margin-top: 30px;" id="inputForm" class="inputForm" action="../../../system/volumetrik/piknometer/kirim-email-pikno.php" method="POST">
                    <div class="upper">
                        <div class="up1 divc">
                            <form class="upper-tab" action="">
                                <table>
                                    <tr>
                                        <td>Departemen Pemilik</td>
                                        <td>:</td>
                                        <td><input class="input-h" id="dept2" name="dept2" type="text" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td><input class="input-h" id="lok2" name="lok2" type="text" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Kalibrasi</td>
                                        <td>:</td>
                                        <td><input class="input-h" id="kal2" name="kal2" type="text" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Alat</td>
                                        <td>:</td>
                                        <td><input class="input-h" id="nam2" name="nam2" type="text" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Merk</td>
                                        <td>:</td>
                                        <td><input class="input-h" id="mer2" name="mer2" type="text" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Tipe</td>
                                        <td>:</td>
                                        <td><input class="input-h" id="tip2" name="tip2" type="text" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Kapasitas</td>
                                        <td>:</td>
                                        <td><input class="input-h" id="kap2" name="kap2" type="text" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Resolusi</td>
                                        <td>:</td>
                                        <td><input class="input-h" id="res2" name="res2" type="text" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi Kalibrasi</td>
                                        <td>:</td>
                                        <td><input class="border input-h dray" id="lok_kal2" name="lok_kal2" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Suhu Ruangan</td>
                                        <td>:</td>
                                        <td><input class="border input-h dray" id="suh2" name="suh2" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Kelembaban</td>
                                        <td>:</td>
                                        <td><input class="border input-h dray" id="kel2" name="kel2" type="text"></td>
                                    </tr>
                                </table>
                        </div>

                        <div class="up2">
                            <table>
                                <tr>
                                    <td>Range Penggunaan Alat</td>
                                    <td>:</td>
                                    <td><input class="input-h" id="rang2" name="rang2" type="text" readonly></td>
                                </tr>
                                <tr>
                                    <td>Limits Of Permissible Error</td>
                                    <td>:</td>
                                    <td><input class="input-h" id="lim2" name="lim2" type="text" readonly></td>
                                </tr>
                                <tr>
                                    <td>Kode Alat </td>
                                    <td>:</td>
                                    <td>
                                        <input type="hidden" id="kode" name="kode">
                                        <select class="input-h" name="kode_alat2" id="kode_alat2"></select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tgl. Kalibrasi </td>
                                    <td>:</td>
                                    <td><input class="border input-h dray" id="tanggal_kalibrasi2" name="tanggal_kalibrasi2"
                                            type="date"></td>
                                </tr>
                                <tr>
                                    <td>Tgl. Kalibrasi Ulang</td>
                                    <td>:</td>
                                    <td><input class="border input-h dray" id="tanggal_kalibrasi_ulang2"
                                            name="tanggal_kalibrasi_ulang2" type="date"></td>
                                </tr>
                                <tr>
                                    <td>Metode Kalibrasi</td>
                                    <td>:</td>
                                    <td><span>Didopsi dari :  "The Expression of <br> Uncertainty and Confidence in <br> Measurement" </span></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Oleh UKAS (United Kingdom <br> Accreditation Service) M3003, Edition <br> 3, November 2012
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="btnfit">
                        <div>
                            <button type="button" class="btn btn-outline-secondary" id="Button-A" onclick="visibility1()">Piknometer</button>
                            <button type="button" class="btn btn-outline-secondary" id="Hitung"   onclick="average()">Hitung</button>
                            <button type="button" class="btn btn-outline-secondary" id="Button-C" onclick="visibility3()">Simpan</button>
                        </div>
                    </div>
                    <div class="naik" id="tekanannaik">
                    <div class="btnmenu">
                    </div>
                        <br>

                        <table id="tabelTekanannaik">
                            <tr>
                                <th width="80px" class="border bown-h">Nomor</th>
                                <th width="160px" class="border bown-h">Titik Kalibrasi</th>
                                <th width="160px" class="border bown-h">Penunjukan Standar</th>
                                <th width="160px" class="border bown-h">Penunjukan alat</th>
                                <th width="80px" class="border bown-h">Koreksi</th>
                            </tr>
                            <tr>
                                <td class="border vol">1</td>
                                <td class="border vol"><input type="text" class="vol" name="nan1" id="nan1"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan2" id="nan2"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan3" id="nan3"></td>
                                <td class="border vol"><input type="text" class="vol" name="hasil1" id="hasil1" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol">2</td>
                                <td class="border vol"><input type="text" class="vol" name="nan4" id="nan4"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan5" id="nan5"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan6" id="nan6"></td>
                                <td class="border vol"><input type="text" class="vol" name="hasil2" id="hasil2" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol">3</td>
                                <td class="border vol"><input type="text" class="vol" name="nan7" id="nan7"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan8" id="nan8"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan9" id="nan9"></td>
                                <td class="border vol"><input type="text" class="vol" name="hasil3" id="hasil3" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol">4</td>
                                <td class="border vol"><input type="text" class="vol" name="nan10" id="nan10"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan11" id="nan11"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan12" id="nan12"></td>
                                <td class="border vol"><input type="text" class="vol" name="hasil4" id="hasil4" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol">5</td>
                                <td class="border vol"><input type="text" class="vol" name="nan13" id="nan13"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan14" id="nan14"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan15" id="nan15"></td>
                                <td class="border vol"><input type="text" class="vol" name="hasil5" id="hasil5" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol">6</td>
                                <td class="border vol"><input type="text" class="vol" name="nan16" id="nan16"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan17" id="nan17"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan18" id="nan18"></td>
                                <td class="border vol"><input type="text" class="vol" name="hasil6" id="hasil6" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol">7</td>
                                <td class="border vol"><input type="text" class="vol" name="nan19" id="nan19"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan20" id="nan20"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan21" id="nan21"></td>
                                <td class="border vol"><input type="text" class="vol" name="hasil7" id="hasil7" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol">8</td>
                                <td class="border vol"><input type="text" class="vol" name="nan22" id="nan22"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan23" id="nan23"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan24" id="nan24"></td>
                                <td class="border vol"><input type="text" class="vol" name="hasil8" id="hasil8" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol">9</td>
                                <td class="border vol"><input type="text" class="vol" name="nan25" id="nan25"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan26" id="nan26"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan27" id="nan27"></td>
                                <td class="border vol"><input type="text" class="vol" name="hasil9" id="hasil9" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol">10</td>
                                <td class="border vol"><input type="text" class="vol" name="nan28" id="nan28"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan29" id="nan29"></td>
                                <td class="border vol"><input type="text" class="vol" name="nan30" id="nan30"></td>
                                <td class="border vol"><input type="text" class="vol" name="hasil10" id="hasil10" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol"></td>
                                <td class="border vol"></td>
                                <td class="border"><input type="text" name="average1" id="average1" readonly></td>
                                <td class="border vol"></td>
                                <td class="border"><input type="text" name="average2" id="average2" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol"></td>
                                <td class="border">Standar Deviasi</td>
                                <td class="border vol"></td>
                                <td class="border vol"></td>
                                <td class="border"><input type="text" name="standar" id="standar" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol"></td>
                                <td class="border">Akar 10</td>
                                <td class="border vol"></td>
                                <td class="border vol"></td>
                                <td class="border"><input type="text" name="akar" id="akar" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol"></td>
                                <td class="border">U Timbangan</td>
                                <td class="border vol"></td>
                                <td class="border vol"></td>
                                <td class="border"><input type="text" name="timbangan" id="timbangan" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol"></td>
                                <td class="border">U Total</td>
                                <td class="border vol"></td>
                                <td class="border vol"></td>
                                <td class="border"><input type="text" name="total" id="total" readonly></td>
                            </tr>
                            <tr>
                                <td class="border vol"></td>
                                <td class="border">U10</td>
                                <td class="border vol"></td>
                                <td class="border vol"></td>
                                <td class="border"><input type="text" name="u10" id="u10" readonly><input type="hidden" name="ketidakpastian" id="ketidakpastian" readonly></td>
                            </tr>
                        </table>
                    </div>
                        <br>
                    <div class="tekanan" id="simpan">
                        <div class="email">
                        <table>
                                <tr>
                                    <td>Email 1:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm" aria-label="Small select example"
                                            id="email1" name="email1" onchange="updateInfo()">
                                            <option value="">Foreman</option>
                                            <?php
                                            require_once '../../../config/config2.php';

                                            $sql = "SELECT id, username, email FROM log_users";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['email'] . "'>" . $row['username'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value=''>Tidak ada data</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email 2:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm" aria-label="Small select example"
                                            id="email2" name="email2" onchange="updateInfo()">
                                            <option value="">Supervisor</option>
                                            <?php
                                            require_once '../../../config/config2.php';

                                            $sql = "SELECT id, username, email FROM log_users";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['email'] . "'>" . $row['username'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value=''>Tidak ada data</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email 3:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm" aria-label="Small select example"
                                            id="email3" name="email3" onchange="updateInfo()">
                                            <option value="">Manager</option>
                                            <?php
                                            require_once '../../../config/config2.php';

                                            $sql = "SELECT id, username, email FROM log_users";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['email'] . "'>" . $row['username'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value=''>Tidak ada data</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email 4:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm" aria-label="Small select example"
                                            id="email4" name="email4" onchange="updateInfo()">
                                            <option value="">user</option>
                                            <?php
                                            require_once '../../../config/config2.php';

                                            $sql = "SELECT id, username, email FROM log_users";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['email'] . "'>" . $row['username'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value=''>Tidak ada data</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            </table><input type="submit" class="btn" value="Save">
                        </div><br><br>
                    </div>
                </form>
            </div><br><br><br>

            <!-- <script>
            document.getElementById("inputForm").addEventListener("submit", function(event) {
                const name = document.getElementById("kode").value.trim(); // Input teks
                const gender = document.getElementById("kode_alat2").value; // Select

                // Validasi: pastikan semua kolom terisi
                if (!name || !gender) {
                    event.preventDefault(); // Mencegah form terkirim
                    alert("Harap Untuk Mengisi Identitas Form Terlebih Dahulu !");
                }

                // Highlight input atau select yang tidak valid
                const inputs = document.querySelectorAll("#inputForm input, #inputForm select");
                inputs.forEach((input) => {
                    if (!input.value.trim()) {
                        input.style.border = "1px solid red"; // Highlight jika kosong
                    } else {
                        input.style.border = ""; // Reset jika valid
                    }
                });
            });
            </script> -->
            
            <script>
                // Mencegah semua tombol dari reload halaman
                document.addEventListener("DOMContentLoaded", function () {
                    // Dapatkan semua tombol di halaman
                    var buttons = document.querySelectorAll("button");

                    // Tambahkan event listener ke setiap tombol
                    buttons.forEach(function (button) {
                        button.addEventListener("click", function (event) {
                            event.preventDefault(); // Mencegah reload
                        });
                    });
                });
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const formFlowmeter = document.getElementById('inputForm');
                    const kodeAlat = document.getElementById('kode_alat2');
                    fetchFormData();
                    function fetchFormData() {
                        const selectedId = kodeAlat.value;
                        fetch(`get_data.php?id=${selectedId}`)
                            .then(response => response.json())
                            .then(data => {
                                formFlowmeter.dept2.value = data.departemen_pemilik;
                                formFlowmeter.lok2.value  = data.lokasi_alat;
                                formFlowmeter.kal2.value  = data.nomor_kalibrasi;
                                formFlowmeter.nam2.value  = data.nama_alat;
                                formFlowmeter.mer2.value  = data.merk_alat;
                                formFlowmeter.tip2.value  = data.tipe;
                                formFlowmeter.kap2.value  = data.kapasitas;
                                formFlowmeter.res2.value  = data.resolusi;
                                formFlowmeter.rang2.value = data.range_penggunaan_alat;
                                formFlowmeter.lim2.value  = data.limits_of_permissible_error;
                                formFlowmeter.kode.value  = data.kode_alat;
                            })
                            .catch(error => console.error('Error:', error));
                    }

                    kodeAlat.addEventListener('change', function () {
                        fetchFormData();
                    });
                    function populateDropdown() {
                        fetch('get_nomor_kalibrasi.php')
                            .then(response => response.json())
                            .then(data => {
                                kodeAlat.innerHTML = '';

                                const defaultOption = document.createElement('option');
                                defaultOption.text = 'Pilih Kode';
                                defaultOption.disabled = true;
                                defaultOption.selected = true;
                                kodeAlat.appendChild(defaultOption);

                                data.forEach(option => {
                                    const newOption = document.createElement('option');
                                    newOption.value = option.id;
                                    newOption.text = option.kode_alat;
                                    kodeAlat.appendChild(newOption);
                                });
                            })
                            .catch(error => console.error('Error:', error));
                    }
                    populateDropdown();
                });
            </script>
            <script>
                $(document).ready(function() {
                    $("#button-D").click(function() {
                        // Mengambil teks dari semua elemen dengan class 'nan'
                        var nanData = $(".nan").map(function() {
                            return $(this).text();
                        }).get().join(", ");
                        
                        // Gabungkan dan tampilkan kedua data di elemen dengan ID 'output'
                        $("#output").text(" | Data dari NAN: " + nanData);
                    });
                });
            </script>
            <script>
                function visibility1() {
                    var button = document.getElementById("switch_button");
                    var tekanannaik = document.getElementById("tekanannaik");
                    var simpan = document.getElementById("simpan");

                    if (tekanannaik.classList.contains("tekanan")) {
                        tekanannaik.classList.remove("tekanan");
                        tekanannaik.classList.add("naik");
                        simpan.classList.remove("simpan");
                        simpan.classList.add("tekanan");

                    }
                }
                function visibility3() {
                    var button = document.getElementById("switch_button");
                    var tekanannaik = document.getElementById("tekanannaik");
                    var tekananturun = document.getElementById("tekananturun");
                    var simpan = document.getElementById("simpan");

                    if (simpan.classList.contains("tekanan")) {
                        simpan.classList.remove("tekanan");
                        simpan.classList.add("simpan");
                        tekanannaik.classList.remove("naik");
                        tekanannaik.classList.add("tekanan");
                        tekananturun.classList.remove("turun");
                        tekananturun.classList.add("tekanan");
                    }
                }
            </script>
            <script>
                const nans = {};
                    for (let i = 1; i <= 30; i++) {
                        nans[`nan${i}`] = document.getElementById(`nan${i}`);
                    }
                    let hasil1 = document.getElementById('hasil1');
                    let hasil2 = document.getElementById('hasil2');
                    let hasil3 = document.getElementById('hasil3');
                    let hasil4 = document.getElementById('hasil4');
                    let hasil5 = document.getElementById('hasil5');
                    let hasil6 = document.getElementById('hasil6');
                    let hasil7 = document.getElementById('hasil7');
                    let hasil8 = document.getElementById('hasil8');
                    let hasil9 = document.getElementById('hasil9');
                    let hasil10 = document.getElementById('hasil10');
                    
                    let hitung1 = document.getElementById('hitung1');
                    let hitung2 = document.getElementById('hitung2');
                    let hitung3 = document.getElementById('hitung3');
                    let hitung4 = document.getElementById('hitung4');
                    let hitung5 = document.getElementById('hitung5');
                    let hitung6 = document.getElementById('hitung6');
                    let hitung7 = document.getElementById('hitung7');
                    let hitung8 = document.getElementById('hitung8');
                    let hitung9 = document.getElementById('hitung9');
                    let hitung10 = document.getElementById('hitung10');

                    let average1 = document.getElementById('average1');
                    let average2 = document.getElementById('average2');
                    
                    let averagei = document.getElementById('average2');

                    function formatNumber(num) {
                        return num.toFixed(3); // Format number to 3 decimal places
                    }
                    function calculateAndUpdate() {
                        let nan2 = Number(nans.nan2.value) || 0;
                        let nan3 = Number(nans.nan3.value) || 0;
                        let hitung1 = (nan2 - nan3);
                        hasil1.value = formatNumber(hitung1);

                        let nan5 = Number(nans.nan5.value) || 0;
                        let nan6 = Number(nans.nan6.value) || 0;
                        let hitung2 = (nan5 - nan6);
                        hasil2.value = formatNumber(hitung2);


                        let nan8 = Number(nans.nan8.value) || 0;
                        let nan9 = Number(nans.nan9.value) || 0;
                        let hitung3 = (nan8 - nan9);
                        hasil3.value = formatNumber(hitung3);


                        let nan11 = Number(nans.nan11.value) || 0;
                        let nan12 = Number(nans.nan12.value) || 0;
                        let hitung4 = (nan11 - nan12);
                        hasil4.value = formatNumber(hitung4);

                        
                        let nan14 = Number(nans.nan14.value) || 0;
                        let nan15 = Number(nans.nan15.value) || 0;
                        let hitung5 = (nan14 - nan15);
                        hasil5.value = formatNumber(hitung5);


                        let nan17 = Number(nans.nan17.value) || 0;
                        let nan18 = Number(nans.nan18.value) || 0;
                        let hitung6 = (nan17 - nan18);
                        hasil6.value = formatNumber(hitung6);


                        let nan20 = Number(nans.nan20.value) || 0;
                        let nan21 = Number(nans.nan21.value) || 0;
                        let hitung7 = (nan20 - nan21);
                        hasil7.value = formatNumber(hitung7);


                        let nan23 = Number(nans.nan23.value) || 0;
                        let nan24 = Number(nans.nan24.value) || 0;
                        let hitung8 = (nan23 - nan24);
                        hasil8.value = formatNumber(hitung8);


                        let nan26 = Number(nans.nan26.value) || 0;
                        let nan27 = Number(nans.nan27.value) || 0;
                        let hitung9 = (nan26 - nan27);
                        hasil9.value = formatNumber(hitung9);


                        let nan29 = Number(nans.nan29.value) || 0;
                        let nan30 = Number(nans.nan30.value) || 0;
                        let hitung10 = (nan29 - nan30);
                        hasil10.value = formatNumber(hitung10);
                    }
                    // Tambahkan event listener untuk setiap input
                    for (let i = 1; i <= 30; i++) {
                        nans[`nan${i}`].addEventListener('input', calculateAndUpdate);

                        function average() {
                        let nan2 = Number(document.getElementById('nan2').value) || 0;
                        let nan5 = Number(document.getElementById('nan5').value) || 0;
                        let nan8 = Number(document.getElementById('nan8').value) || 0;
                        let nan11 = Number(document.getElementById('nan11').value) || 0;
                        let nan14 = Number(document.getElementById('nan14').value) || 0;
                        let nan17 = Number(document.getElementById('nan17').value) || 0;
                        let nan20 = Number(document.getElementById('nan20').value) || 0;
                        let nan23 = Number(document.getElementById('nan23').value) || 0;
                        let nan26 = Number(document.getElementById('nan26').value) || 0;
                        let nan29 = Number(document.getElementById('nan29').value) || 0;
                        let values1 = nan2 + nan5 + nan8 + nan11 + nan14 + nan17 + nan20 + nan23 + nan26 + nan29;
                        let ave1 = values1 / 10;
                        
                        let dev1  = (nan2 - ave1) ** 2;
                        let dev2  = (nan5 - ave1) ** 2;
                        let dev3  = (nan8 - ave1) ** 2;
                        let dev4  = (nan11 - ave1) ** 2;
                        let dev5  = (nan14 - ave1) ** 2;
                        let dev6  = (nan17 - ave1) ** 2;
                        let dev7  = (nan20 - ave1) ** 2;
                        let dev8  = (nan23 - ave1) ** 2;
                        let dev9  = (nan26 - ave1) ** 2;
                        let dev10 = (nan29 - ave1) ** 2;
                        let deviasi = (dev1 + dev2 + dev3 + dev4 + dev5 + dev6 + dev7 + dev8 + dev9 + dev10) / 9;
                        let hasil = Math.sqrt(deviasi);
                        standar.value = hasil.toFixed(9);


                        average1.value = formatNumber(ave1);
                        let hasil1 = Number(document.getElementById('hasil1').value) || 0;
                        let hasil2 = Number(document.getElementById('hasil2').value) || 0;
                        let hasil3 = Number(document.getElementById('hasil3').value) || 0;
                        let hasil4 = Number(document.getElementById('hasil4').value) || 0;
                        let hasil5 = Number(document.getElementById('hasil5').value) || 0;
                        let hasil6 = Number(document.getElementById('hasil6').value) || 0;
                        let hasil7 = Number(document.getElementById('hasil7').value) || 0;
                        let hasil8 = Number(document.getElementById('hasil8').value) || 0;
                        let hasil9 = Number(document.getElementById('hasil9').value) || 0;
                        let hasil10 = Number(document.getElementById('hasil10').value) || 0;
                        let values2 = hasil1 + hasil2 + hasil3 + hasil4 + hasil5 + hasil6 + hasil7 + hasil8 + hasil9 + hasil10;
                        let ave2 = values2 / 10;
                        average2.value = formatNumber(ave2);
                        akar.value = Math.sqrt(10).toFixed(8);

                        
                        let std = Number(document.getElementById('standar').value) || 0;
                        let akr = Number(document.getElementById('akar').value) || 0;
                        total.value = (std / akr).toFixed(9);

                        let balance = Number(document.getElementById('total').value) || 0;
                        u10.value = (balance / 10).toFixed(9);
                        ketidakpastian.value = (balance / 10).toFixed(5);
                     }
                        document.getElementById('Hitung').addEventListener('click', function (event) {
                        event.preventDefault();
                        average();
                    });
                }
            </script>
    <script src="../../../components/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../components/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>