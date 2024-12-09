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
    <title>form-temprature</title>

    <!-- css -->
    <link rel="stylesheet" href="../../../styles/form.css">
    <link rel="stylesheet" href="../../../styles/pressure.css">
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

    <style>
        .dwonbtn {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            gap: 10px;
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
        .divc {
            width: 400px;
        }
        .input-h {
            width: 160px;
        }
        .dray {
            background-color: rgb(240, 241, 242);
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
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
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
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                        href="../../../../public/indeks.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MENU</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                        href="../../kalibrasi.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">> KALIBRASI</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="temprature.php">> TEMPRATURE</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href=" form.php">> FORM-TEMPRATURE</a>
                </div>
            </div>
            <div class="page">
                <br>

                <form style="margin-top: 30px;" id="inputForm" class="inputForm" action="../../../system/temprature/send_email.php" method="POST">

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
                            <button type="button" class="btn btn-outline-secondary" id="Button-A" onclick="visibility1()">Temprature 1</button>
                            <button type="button" class="btn btn-outline-secondary" id="Button-B" onclick="visibility2()">Temprature 2</button>
                            <button type="button" class="btn btn-outline-secondary" id="Button-C" onclick="visibility3()">Simpan</button>
                        </div>
                    </div>
                    <div class="naik" id="tekanannaik">
                    <div class="btnmenu">
                    </div>
                        <br>

                        <table id="tabelTekanannaik">
                            <tr>
                                <td><input type="hidden" name="pangkat1" id="pangkat1"></td>
                                <td><input type="hidden" name="pangkat2" id="pangkat2"></td>
                                <td><input type="hidden" name="pangkat3" id="pangkat3"></td>
                                <td><input type="hidden" name="pangkat4" id="pangkat4"></td>
                                <td><input type="hidden" name="pangkat5" id="pangkat5"></td>
                                <td><input type="hidden" name="pangkat6" id="pangkat6"></td>
                                <td><input type="hidden" name="pangkat7" id="pangkat7"></td>
                                <td><input type="hidden" name="pangkat8" id="pangkat8"></td>
                                <td><input type="hidden" name="pangkat9" id="pangkat9"></td>
                                <td><input type="hidden" name="pangkat10" id="pangkat10"></td>
                                <td><input type="hidden" name="pangkat11" id="pangkat11"></td>
                                <td><input type="hidden" name="pangkat12" id="pangkat12"></td>
                                <td><input type="hidden" name="pangkat13" id="pangkat13"></td>
                                <td><input type="hidden" name="pangkat14" id="pangkat14"></td>
                                <td><input type="hidden" name="pangkat15" id="pangkat15"></td>
                            </tr>
                            <tr>
                                <th width="80px" class="border gryn">Titik Kalibrasi</th>
                                <th width="80px" class="border gryn">Penunjuk Standar</th>
                                <th width="80px" class="border gryn">Penunjuk alat</th>
                                <th width="80px" class="border gryn">Koreksi Standar</th>
                                <th width="80px" class="border gryn">Tekanan Standar</th>
                                <th width="80px" class="border gryn">Koreksi Alat</th>
                                <th width="80px" class="border gryn">Rata rata Kor.Alat</th>
                                <th width="80px" class="border gryn">Standar Deviasi</th>
                                <th width="80px" class="border gryn">Ketidakpastian</th>
                                <th width="80px" class="border gryn">Posisi Bagian</th>
                            </tr>
                            <tr>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b"></td>
                            </tr>
                        </table>
                        <div class="dwonbtn">
                            <button class="btn btn-success" type="button" onclick="tambahBaris(), ambilNilaiBerdasarkanId()"><i class="bi bi-plus"></i></button>
                            <button class="btn btn-success" type="button" onclick="ambilNilaiBerdasarkanId()">Hitung</button>  
                            <button class="btn btn-success" type="button" onclick="hapusBaris(), ambilNilaiBerdasarkanId()"><i class="bi bi-dash"></i></button>
                        </div>
                    </div>
                    <br>
                    <div class="tekanan" id="tekananturun">
                        <div>
                        </div>
                        <table id="tabelTekananturun">
                            <tr>
                                <th width="80px" class="border gryn">Titik Kalibrasi</th>
                                <th width="80px" class="border gryn">Penunjuk Standar</th>
                                <th width="80px" class="border gryn">Penunjuk alat</th>
                                <th width="80px" class="border gryn">Koreksi Standar</th>
                                <th width="80px" class="border gryn">Tekanan Standar</th>
                                <th width="80px" class="border gryn">Koreksi Alat</th>
                                <th width="80px" class="border gryn">Rata rata Kor.Alat</th>
                                <th width="80px" class="border gryn">Standar Deviasi</th>
                                <th width="80px" class="border gryn">Ketidakpastian</th>
                                <th width="80px" class="border gryn"></th>
                            </tr>
                            <tr>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b">°C</td>
                                <td class="border bown-b"></td>
                            </tr>
                        </table>
                        <div class="dwonbtn">
                            <button class="btn btn-success" type="button" onclick="add(), getid2()"><i class="bi bi-plus"></i></button>
                            <button class="btn btn-success" type="button" onclick="getid2()">Hitung</button>
                            <button class="btn btn-success" type="button" onclick="hapusline2(), getid2()"><i class="bi bi-dash"></button>
                        </div>
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

            <script>
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
            // Mengambil teks dari semua elemen dengan class 'nac'
            var nacData = $(".nac").map(function() {
                return $(this).text();
            }).get().join(", ");

            // Mengambil teks dari semua elemen dengan class 'email'
            var emailData = $(".email").map(function() {
                return $(this).text();
            }).get().join(", ");

            // Gabungkan dan tampilkan kedua data di elemen dengan ID 'output'
            $("#output").text("Data dari NAC: " + nacData + " | Data dari Email: " + emailData);
        });
    });
</script>

            <script>
                function visibility1() {
                    var button = document.getElementById("switch_button");
                    var tekanannaik = document.getElementById("tekanannaik");
                    var tekananturun = document.getElementById("tekananturun");
                    var simpan = document.getElementById("simpan");

                    if (tekanannaik.classList.contains("tekanan")) {
                        tekanannaik.classList.remove("tekanan");
                        tekanannaik.classList.add("naik");
                        tekananturun.classList.remove("turun");
                        tekananturun.classList.add("tekanan");
                        simpan.classList.remove("simpan");
                        simpan.classList.add("tekanan");

                    }
                }
                function visibility2() {
                    var button = document.getElementById("switch_button");
                    var tekanannaik = document.getElementById("tekanannaik");
                    var tekananturun = document.getElementById("tekananturun");
                    var simpan = document.getElementById("simpan");

                    if (tekananturun.classList.contains("tekanan")) {
                        tekananturun.classList.remove("tekanan");
                        tekananturun.classList.add("turun");
                        tekanannaik.classList.remove("naik");
                        tekanannaik.classList.add("tekanan");
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
                function hapusBaris() {
                    var table = document.getElementById("tabelTekanannaik");
                    var rowCount = table.rows.length;

                    if (rowCount <= 2) {
                        // Jika tidak ada baris yang dapat dihapus
                        alert("Tidak ada baris yang bisa dihapus.");
                        return;
                    }

                    // Hapus 4 baris terakhir
                    for (var i = 0; i < 4; i++) {
                        if (rowCount > 1) {
                            // Pastikan masih ada baris yang bisa dihapus
                            table.deleteRow(rowCount - 1);
                            rowCount--;
                            baris--; // Kurangi counter baris
                        }
                    }

                    // Update nextInputId dan hasilId sesuai permintaan
                    nextInputId = Math.max(1, nextInputId - 20); // Pastikan nextInputId tidak kurang dari 1
                    hasilId = Math.max(1, hasilId - 1); // Pastikan hasilId tidak kurang dari 1
                }

                var baris = 1; // Counter untuk baris
                var maxBaris = 64; // Limit maksimal baris
                var nextInputId = 1; // ID input berikutnya, dimulai dari nan1
                var hasilId = 1; // ID untuk hasil
                var inlineid = 1; // ID untuk hasil

                function tambahBaris() {
                    var table = document.getElementById("tabelTekanannaik");
                    var currentRows = table.rows.length - 1; // Menghitung jumlah baris saat ini (mengurangi header)

                    if (currentRows + 4 > maxBaris) {
                        alert("Maksimal \"64 baris\" atau \"15 Perhitungan\" yang dapat ditambahkan.");
                        return;
                    }

                    for (var j = 0; j < 4; j++) {
                        // Tambah 4 baris
                        var row = table.insertRow(-1);

                        for (var i = 0; i < 10; i++) {
                            // Setiap baris memiliki 9 kolom
                            var cell = row.insertCell(i);
                            cell.className = "border"; // Tambahkan class border pada setiap cell

                            if (baris % 4 === 0 && (i === 0 || i === 1 || i === 3 || i === 5)) {
                                if (i === 0) cell.className = "border dray"
                                if (i === 1) cell.innerHTML = "Rata Rata";
                                if (i === 3 || i === 5) cell.className = "border dray"
                                continue;
                            }

                            if (baris % 4 === 1 && (i === 6 || i === 7 || i === 8 || i === 9)) {
                                cell.className = "border dray"
                                continue; }
                            if (baris % 4 === 2 && (i === 0 || i === 6 || i === 7 || i === 8 || i === 9)) {
                                cell.className = "border dray"
                                continue; }
                            if (baris % 4 === 3 && (i === 0 || i === 6 || i === 7 || i === 8 || i === 9)) {
                                cell.className = "border dray"
                                continue; }
                            if (baris % 4 === 4 && (i === 0 || i === 3 || i === 5)) {
                                cell.className = "border dray"
                                continue; }


                            // Kosongkan cell tertentu pada baris ke-2 dan ke-3
                            if ((baris % 4 === 2 || baris % 4 === 3) && i === 0) {
                                cell.innerHTML = "";
                                continue;
                            }

                            // Kosongkan cell ke-7, ke-8, dan ke-9 pada baris ke-1, ke-2, dan ke-3
                            if (baris % 4 !== 0 && i >= 6) {
                                cell.innerHTML = "";
                                continue;
                            }

                            
                            // Jika cell tidak dikosongkan, tambahkan input dengan ID dan name
                            var input = document.createElement("input");
                            input.type = "text";
                            input.style.textAlign = "center";

                            if (baris % 4 === 0 && i === 8) {
                                input.id = "hasil" + hasilId;
                                input.name = "hasil" + hasilId;
                                hasilId++;
                            } else if (baris % 4 === 0 && (i === 9)) {
                                input.id = "inline" + inlineid;
                                input.name = "inline" + inlineid;
                                inlineid++;
                            } else {
                                input.id = "nan" + nextInputId;
                                input.name = "nan" + nextInputId;

                                if (!(baris % 4 === 0 && i === 8 || i === 9)) {
                                    nextInputId++;
                                }
                            }

                            // Kolom keempat dan keenam adalah readonly untuk semua baris
                            if (i === 3 || i === 5) {
                                input.setAttribute("readonly", true);
                            }

                            // Kolom lebih dari keenam juga readonly untuk baris ke-4
                            if (baris % 4 === 0 && i === 6 || i === 7 || i === 8) {
                                input.setAttribute("readonly", true);
                            }

                            cell.appendChild(input);
                        }

                        baris++; // Tingkatkan nomor baris
                    }
                }

                let nilai = 0.20;
                let tstd = 0.400;
                let opertor = 0.05;
                let normal1 = 1;
                let normal2 = 1.00;
                let retangular = Math.sqrt(3);
                let vi1 = 10.000000000;
                let vi2 = 2;
                let vi3 = 10.000000000;
                let ci1 = 1;
                let ci2 = 1;
                let ci3 = 1;
                let faktor = 1.96;

                function ambilNilaiBerdasarkanId() {
                    let ids = [];

                    // Mengumpulkan ID untuk input nan dan hasil
                    for (let i = 1; i < nextInputId; i++) {
                        ids.push("nan" + i);
                    }
                    for (let i = 1; i < hasilId; i++) {
                        ids.push("hasil" + i);
                    }

                    console.log("ID yang tersedia:\n" + ids.join("\n"));

                    // Mengambil nilai berdasarkan ID dan menyimpannya dalam objek
                    let nilaiBerdasarkanId = {};

                    ids.forEach((id) => {
                        let inputElement = document.getElementById(id);
                        if (inputElement) {
                            // Ambil nilai dan convert ke Number, jika tidak ada, gunakan 0
                            let nilai = Number(inputElement.value) || 0;
                            nilaiBerdasarkanId[id] = nilai; // Simpan dalam objek berdasarkan ID
                        }
                    });

                    console.log("Nilai berdasarkan ID:", nilaiBerdasarkanId);

                    let hasil = {}; // Objek untuk menyimpan nilai nan

                    for (let i = 1; i <= 300; i++) {
                        const nanInput = document.getElementById(`nan${i}`);
                        hasil[`nan${i}`] = nanInput ? Number(nanInput.value) || 0 : 0; // Ambil nilai dari input
                    }


                    // hitungan 1
                    nan4.value = nilai.toFixed(2);
                    nan9.value = nilai.toFixed(2);
                    nan14.value = nilai.toFixed(2);

                    let h1 = hasil.nan2 + hasil.nan4;
                    let h2 = hasil.nan7 + hasil.nan9;
                    let h3 = hasil.nan12 + hasil.nan14;
                    nan5.value = h1.toFixed(2);
                    nan10.value = h2.toFixed(2);
                    nan15.value = h3.toFixed(2);
                    let h4 = hasil.nan5 - hasil.nan3;
                    let h5 = hasil.nan10 - hasil.nan8;
                    let h6 = hasil.nan15 - hasil.nan13;
                    nan6.value = h4.toFixed(2);
                    nan11.value = h5.toFixed(2);
                    nan16.value = h6.toFixed(2);
                    let values1 = hasil.nan3 + hasil.nan8 + hasil.nan13;
                    let mean1 = (values1 / 3);
                    nan17.value = mean1.toFixed(1);
                    let values2 = hasil.nan5 + hasil.nan10 + hasil.nan15;
                    let mean2 = (values2 / 3);
                    nan18.value = mean2.toFixed(2);
                    let rataRata1 = hasil.nan18 - hasil.nan17;
                    nan19.value = rataRata1.toFixed(2);
                    let values3 = hasil.nan5 + hasil.nan10 + hasil.nan15;
                    let mean3 = (values2 / 3);
                    let dev1 = (hasil.nan5 - mean3) ** 2;
                    let dev2 = (hasil.nan10 - mean3) ** 2;
                    let dev3 = (hasil.nan15 - mean3) ** 2;
                    let total1 = (dev1 + dev2 + dev3) / 2;
                    let totals1 = Math.sqrt(total1);
                    nan20.value = totals1.toFixed(2);

                    let ubaku1 = tstd/normal1;
                    let ubaku2 = totals1/normal2;
                    let ubaku3 = opertor/retangular;
                    let ubakuxci1 = ubaku1*ci1;
                    let ubakuxci2 = ubaku2*ci2;
                    let ubakuxci3 = ubaku3*ci3;
                    let pangkat1 = ubakuxci1**2;
                    let pangkat2 = ubakuxci2**2;
                    let pangkat3 = ubakuxci3**2;
                    let kuadrat1 = (ubakuxci1**4)/vi1;
                    let kuadrat2 = (ubakuxci2**4)/vi2;
                    let kuadrat3 = (ubakuxci3**4)/vi3;

                    let summary1 = (pangkat1 + pangkat2 + pangkat3);
                    let summary2 = (kuadrat1 + kuadrat2 + kuadrat3);
                    let derajat = Math.sqrt(summary1);
                    let fourth = (derajat**4) / summary2;
                    let hasils1 = (derajat * faktor);
                    hasil1.value = hasils1.toFixed(3);


                    // hitungan 2
                    nan24.value = nilai.toFixed(2);
                    nan29.value = nilai.toFixed(2);
                    nan34.value = nilai.toFixed(2);

                    let h7 = hasil.nan22 + hasil.nan24;
                    let h8 = hasil.nan27 + hasil.nan29;
                    let h9 = hasil.nan32 + hasil.nan34;
                    nan25.value = h7.toFixed(2);
                    nan30.value = h8.toFixed(2);
                    nan35.value = h9.toFixed(2);
                    let h10 = hasil.nan25 - hasil.nan23;
                    let h11 = hasil.nan30 - hasil.nan28;
                    let h12 = hasil.nan35 - hasil.nan33;
                    nan26.value = h10.toFixed(2);
                    nan31.value = h11.toFixed(2);
                    nan36.value = h12.toFixed(2);
                    let values4 = hasil.nan23 + hasil.nan28 + hasil.nan33;
                    let mean4 = (values4 / 3);
                    nan37.value = mean4.toFixed(1);
                    let values5 = hasil.nan25 + hasil.nan30 + hasil.nan35;
                    let mean5 = (values5 / 3);
                    nan38.value = mean5.toFixed(2);
                    let rataRata2 = hasil.nan38 - hasil.nan37;
                    nan39.value = rataRata2.toFixed(2);
                    let values6 = hasil.nan25 + hasil.nan30 + hasil.nan35;
                    let mean6 = (values6 / 3);
                    let dev4 = (hasil.nan25 - mean6) ** 2;
                    let dev5 = (hasil.nan30 - mean6) ** 2;
                    let dev6 = (hasil.nan35 - mean6) ** 2;
                    let total2 = (dev4 + dev5 + dev6) / 2;
                    let totals2 = Math.sqrt(total2);
                    nan40.value = totals2.toFixed(2);

                    let ubaku4 = tstd/normal1;
                    let ubaku5 = totals2/normal2;
                    let ubaku6 = opertor/retangular;
                    let ubakuxci4 = ubaku4*ci1;
                    let ubakuxci5 = ubaku5*ci2;
                    let ubakuxci6 = ubaku6*ci3;
                    let pangkat4 = ubakuxci4**2;
                    let pangkat5 = ubakuxci5**2;
                    let pangkat6 = ubakuxci6**2;
                    let kuadrat4 = (ubakuxci4**4)/vi1;
                    let kuadrat5 = (ubakuxci5**4)/vi2;
                    let kuadrat6 = (ubakuxci6**4)/vi3;

                    let summary3 = (pangkat4 + pangkat5 + pangkat6);
                    let summary4 = (kuadrat4 + kuadrat5 + kuadrat6);
                    let derajat2 = Math.sqrt(summary3);
                    let fourth2 = (derajat2**4) / summary4;
                    let hasils2 = (derajat2 * faktor);
                    hasil2.value = hasils2.toFixed(3);


                    // hitung 3 
                    nan44.value = nilai.toFixed(2);
                    nan49.value = nilai.toFixed(2);
                    nan54.value = nilai.toFixed(2);

                    let h13 = hasil.nan42 + hasil.nan44;
                    let h14 = hasil.nan47 + hasil.nan49;
                    let h15 = hasil.nan52 + hasil.nan54;
                    nan45.value = h13.toFixed(2);
                    nan50.value = h14.toFixed(2);
                    nan55.value = h15.toFixed(2);
                    let h16 = hasil.nan45 - hasil.nan43;
                    let h17 = hasil.nan50 - hasil.nan48;
                    let h18 = hasil.nan55 - hasil.nan53;
                    nan46.value = h16.toFixed(2);
                    nan51.value = h17.toFixed(2);
                    nan56.value = h18.toFixed(2);
                    let values7 = hasil.nan43 + hasil.nan48 + hasil.nan53;
                    let mean7 = (values7 / 3);
                    nan57.value = mean7.toFixed(1);
                    let values8 = hasil.nan45 + hasil.nan50 + hasil.nan55;
                    let mean8 = (values8 / 3);
                    nan58.value = mean8.toFixed(2);
                    let rataRata3 = hasil.nan58 - hasil.nan57;
                    nan59.value = rataRata3.toFixed(2);
                    let values9 = hasil.nan45 + hasil.nan50 + hasil.nan55;
                    let mean9 = (values9 / 3);
                    let dev7 = (hasil.nan45 - mean9) ** 2;
                    let dev8 = (hasil.nan50 - mean9) ** 2;
                    let dev9 = (hasil.nan55 - mean9) ** 2;
                    let total3 = (dev7 + dev8 + dev9) / 2;
                    let totals3 = Math.sqrt(total3);
                    nan60.value = totals3.toFixed(2);

                    let ubaku7 = tstd/normal1;
                    let ubaku8 = totals3/normal2;
                    let ubaku9 = opertor/retangular;
                    let ubakuxci7 = ubaku7*ci1;
                    let ubakuxci8 = ubaku8*ci2;
                    let ubakuxci9 = ubaku9*ci3;
                    let pangkat7 = ubakuxci7**2;
                    let pangkat8 = ubakuxci8**2;
                    let pangkat9 = ubakuxci9**2;
                    let kuadrat7 = (ubakuxci7**4)/vi1;
                    let kuadrat8 = (ubakuxci8**4)/vi2;
                    let kuadrat9 = (ubakuxci9**4)/vi3;

                    let summary5 = (pangkat7 + pangkat8 + pangkat9);
                    let summary6 = (kuadrat7 + kuadrat8 + kuadrat9);
                    let derajat3 = Math.sqrt(summary5);
                    let fourth3 = (derajat3**4) / summary6;
                    let hasils3 = (derajat3 * faktor);
                    hasil3.value = hasils3.toFixed(3);


                    // hitung 4
                    nan64.value = nilai.toFixed(2);
                    nan69.value = nilai.toFixed(2);
                    nan74.value = nilai.toFixed(2);

                    let h19 = hasil.nan62 + hasil.nan64;
                    let h20 = hasil.nan67 + hasil.nan69;
                    let h21 = hasil.nan72 + hasil.nan74;
                    nan65.value = h19.toFixed(2);
                    nan70.value = h20.toFixed(2);
                    nan75.value = h21.toFixed(2);
                    let h22 = hasil.nan65 - hasil.nan63;
                    let h23 = hasil.nan70 - hasil.nan68;
                    let h24 = hasil.nan75 - hasil.nan73;
                    nan66.value = h22.toFixed(2);
                    nan71.value = h23.toFixed(2);
                    nan76.value = h24.toFixed(2);
                    let values10 = hasil.nan63 + hasil.nan68 + hasil.nan73;
                    let mean10 = (values10 / 3);
                    nan77.value = mean10.toFixed(1);
                    let values11 = hasil.nan65 + hasil.nan70 + hasil.nan75;
                    let mean11 = (values11 / 3);
                    nan78.value = mean11.toFixed(2);
                    let rataRata4 = hasil.nan78 - hasil.nan77;
                    nan79.value = rataRata4.toFixed(2);
                    let values12 = hasil.nan65 + hasil.nan70 + hasil.nan75;
                    let mean12 = (values12 / 3);
                    let dev10 = (hasil.nan65 - mean12) ** 2;
                    let dev11 = (hasil.nan70 - mean12) ** 2;
                    let dev12 = (hasil.nan75 - mean12) ** 2;
                    let total4 = (dev10 + dev11 + dev12) / 2;
                    let totals4 = Math.sqrt(total4);
                    nan80.value = totals4.toFixed(2);

                    let ubaku10 = tstd/normal1;
                    let ubaku11 = totals4/normal2;
                    let ubaku12 = opertor/retangular;
                    let ubakuxci10 = ubaku10*ci1;
                    let ubakuxci11 = ubaku11*ci2;
                    let ubakuxci12 = ubaku12*ci3;
                    let pangkat10 = ubakuxci10**2;
                    let pangkat11 = ubakuxci11**2;
                    let pangkat12 = ubakuxci12**2;
                    let kuadrat10 = (ubakuxci10**4)/vi1;
                    let kuadrat11 = (ubakuxci11**4)/vi2;
                    let kuadrat12 = (ubakuxci12**4)/vi3;

                    let summary7 = (pangkat10 + pangkat11 + pangkat12);
                    let summary8 = (kuadrat10 + kuadrat11 + kuadrat12);
                    let derajat4 = Math.sqrt(summary7);
                    let fourth4 = (derajat4**4) / summary8;
                    let hasils4 = (derajat4 * faktor);
                    hasil4.value = hasils4.toFixed(3);


                    // hitung 5
                    nan84.value = nilai.toFixed(2);
                    nan89.value = nilai.toFixed(2);
                    nan94.value = nilai.toFixed(2);

                    let h25 = hasil.nan82 + hasil.nan84;
                    let h26 = hasil.nan87 + hasil.nan89;
                    let h27 = hasil.nan92 + hasil.nan94;
                    nan85.value = h25.toFixed(2);
                    nan90.value = h26.toFixed(2);
                    nan95.value = h27.toFixed(2);
                    let h28 = hasil.nan85 - hasil.nan83;
                    let h29 = hasil.nan90 - hasil.nan88;
                    let h30 = hasil.nan95 - hasil.nan93;
                    nan86.value = h28.toFixed(2);
                    nan91.value = h29.toFixed(2);
                    nan96.value = h30.toFixed(2);
                    let values13 = hasil.nan83 + hasil.nan88 + hasil.nan93;
                    let mean13 = (values13 / 3);
                    nan97.value = mean13.toFixed(1);
                    let values14 = hasil.nan85 + hasil.nan90 + hasil.nan95;
                    let mean14 = (values14 / 3);
                    nan98.value = mean14.toFixed(2);
                    let rataRata5 = hasil.nan98 - hasil.nan97;
                    nan99.value = rataRata5.toFixed(2);
                    let values15 = hasil.nan85 + hasil.nan90 + hasil.nan95;
                    let mean15 = (values15 / 3);
                    let dev13 = (hasil.nan85 - mean15) ** 2;
                    let dev14 = (hasil.nan90 - mean15) ** 2;
                    let dev15 = (hasil.nan95 - mean15) ** 2;
                    let total5 = (dev13 + dev14 + dev15) / 2;
                    let totals5 = Math.sqrt(total5);
                    nan100.value = totals5.toFixed(2);

                    let ubaku13 = tstd/normal1;
                    let ubaku14 = totals5/normal2;
                    let ubaku15 = opertor/retangular;
                    let ubakuxci13 = ubaku13*ci1;
                    let ubakuxci14 = ubaku14*ci2;
                    let ubakuxci15 = ubaku15*ci3;
                    let pangkat13 = ubakuxci13**2;
                    let pangkat14 = ubakuxci14**2;
                    let pangkat15 = ubakuxci15**2;
                    let kuadrat13 = (ubakuxci13**4)/vi1;
                    let kuadrat14 = (ubakuxci14**4)/vi2;
                    let kuadrat15 = (ubakuxci15**4)/vi3;

                    let summary9 = (pangkat13 + pangkat14 + pangkat15);
                    let summary10 = (kuadrat13 + kuadrat14 + kuadrat15);
                    let derajat5 = Math.sqrt(summary9);
                    let fourth5 = (derajat5**4) / summary10;
                    let hasils5 = (derajat5 * faktor);
                    hasil5.value = hasils5.toFixed(3);


                    // hitungan 6
                    nan104.value = nilai.toFixed(2);
                    nan109.value = nilai.toFixed(2);
                    nan114.value = nilai.toFixed(2);

                    let h31 = hasil.nan102 + hasil.nan104;
                    let h32 = hasil.nan107 + hasil.nan109;
                    let h33 = hasil.nan112 + hasil.nan114;
                    nan105.value = h31.toFixed(2);
                    nan110.value = h32.toFixed(2);
                    nan115.value = h33.toFixed(2);
                    let h34 = hasil.nan105 - hasil.nan103;
                    let h35 = hasil.nan110 - hasil.nan108;
                    let h36 = hasil.nan115 - hasil.nan113;
                    nan106.value = h34.toFixed(2);
                    nan111.value = h35.toFixed(2);
                    nan116.value = h36.toFixed(2);
                    let values16 = hasil.nan103 + hasil.nan108 + hasil.nan113;
                    let mean16 = (values16 / 3);
                    nan117.value = mean16.toFixed(1);
                    let values17 = hasil.nan105 + hasil.nan110 + hasil.nan115;
                    let mean17 = (values17 / 3);
                    nan118.value = mean17.toFixed(2);
                    let rataRata6 = hasil.nan118 - hasil.nan117;
                    nan119.value = rataRata6.toFixed(2);
                    let values18 = hasil.nan105 + hasil.nan110 + hasil.nan115;
                    let mean18 = (values18 / 3);
                    let dev16 = (hasil.nan105 - mean18) ** 2;
                    let dev17 = (hasil.nan110 - mean18) ** 2;
                    let dev18 = (hasil.nan115 - mean18) ** 2;
                    let total6 = (dev16 + dev17 + dev18) / 2;
                    let totals6 = Math.sqrt(total6);
                    nan120.value = totals6.toFixed(2);

                    let ubaku16 = tstd/normal1;
                    let ubaku17 = totals6/normal2;
                    let ubaku18 = opertor/retangular;
                    let ubakuxci16 = ubaku16*ci1;
                    let ubakuxci17 = ubaku17*ci2;
                    let ubakuxci18 = ubaku18*ci3;
                    let pangkat16 = ubakuxci16**2;
                    let pangkat17 = ubakuxci17**2;
                    let pangkat18 = ubakuxci18**2;
                    let kuadrat16 = (ubakuxci16**4)/vi1;
                    let kuadrat17 = (ubakuxci17**4)/vi2;
                    let kuadrat18 = (ubakuxci18**4)/vi3;

                    let summary11 = (pangkat16 + pangkat17 + pangkat18);
                    let summary12 = (kuadrat16 + kuadrat17 + kuadrat18);
                    let derajat6 = Math.sqrt(summary11);
                    let fourth6 = (derajat6**4) / summary12;
                    let hasils6 = (derajat6 * faktor);
                    hasil6.value = hasils6.toFixed(3);


                    // hitungan 7
                    nan124.value = nilai.toFixed(2);
                    nan129.value = nilai.toFixed(2);
                    nan134.value = nilai.toFixed(2);

                    let h37 = hasil.nan122 + hasil.nan124;
                    let h38 = hasil.nan127 + hasil.nan129;
                    let h39 = hasil.nan132 + hasil.nan134;
                    nan125.value = h37.toFixed(2);
                    nan130.value = h38.toFixed(2);
                    nan135.value = h39.toFixed(2);
                    let h40 = hasil.nan125 - hasil.nan123;
                    let h41 = hasil.nan130 - hasil.nan128;
                    let h42 = hasil.nan135 - hasil.nan133;
                    nan126.value = h40.toFixed(2);
                    nan131.value = h41.toFixed(2);
                    nan136.value = h42.toFixed(2);
                    let values19 = hasil.nan123 + hasil.nan128 + hasil.nan133;
                    let mean19 = (values19 / 3);
                    nan137.value = mean19.toFixed(1);
                    let values20 = hasil.nan125 + hasil.nan130 + hasil.nan135;
                    let mean20 = (values20 / 3);
                    nan138.value = mean20.toFixed(2);
                    let rataRata7 = hasil.nan138 - hasil.nan137;
                    nan139.value = rataRata7.toFixed(2);
                    let values21 = hasil.nan125 + hasil.nan130 + hasil.nan135;
                    let mean21 = (values21 / 3);
                    let dev19 = (hasil.nan125 - mean21) ** 2;
                    let dev20 = (hasil.nan130 - mean21) ** 2;
                    let dev21 = (hasil.nan135 - mean21) ** 2;
                    let total7 = (dev19 + dev20 + dev21) / 2;
                    let totals7 = Math.sqrt(total7);
                    nan140.value = totals7.toFixed(2);

                    let ubaku19 = tstd/normal1;
                    let ubaku20 = totals7/normal2;
                    let ubaku21 = opertor/retangular;
                    let ubakuxci19 = ubaku19*ci1;
                    let ubakuxci20 = ubaku20*ci2;
                    let ubakuxci21 = ubaku21*ci3;
                    let pangkat19 = ubakuxci19**2;
                    let pangkat20 = ubakuxci20**2;
                    let pangkat21 = ubakuxci21**2;
                    let kuadrat19 = (ubakuxci19**4)/vi1;
                    let kuadrat20 = (ubakuxci20**4)/vi2;
                    let kuadrat21 = (ubakuxci21**4)/vi3;

                    let summary13 = (pangkat19 + pangkat20 + pangkat21);
                    let summary14 = (kuadrat19 + kuadrat20 + kuadrat21);
                    let derajat7 = Math.sqrt(summary13);
                    let fourth7 = (derajat7**4) / summary14;
                    let hasils7 = (derajat7 * faktor);
                    hasil7.value = hasils7.toFixed(3);


                    // hitung 8
                    nan144.value = nilai.toFixed(2);
                    nan149.value = nilai.toFixed(2);
                    nan154.value = nilai.toFixed(2);

                    let h43 = hasil.nan142 + hasil.nan144;
                    let h44 = hasil.nan147 + hasil.nan149;
                    let h45 = hasil.nan152 + hasil.nan154;
                    nan145.value = h43.toFixed(2);
                    nan150.value = h44.toFixed(2);
                    nan155.value = h45.toFixed(2);
                    let h46 = hasil.nan145 - hasil.nan143;
                    let h47 = hasil.nan150 - hasil.nan148;
                    let h48 = hasil.nan155 - hasil.nan153;
                    nan146.value = h46.toFixed(2);
                    nan151.value = h47.toFixed(2);
                    nan156.value = h48.toFixed(2);
                    let values22 = hasil.nan143 + hasil.nan148 + hasil.nan153;
                    let mean22 = (values22 / 3);
                    nan157.value = mean22.toFixed(1);
                    let values23 = hasil.nan145 + hasil.nan150 + hasil.nan155;
                    let mean23 = (values23 / 3);
                    nan158.value = mean23.toFixed(2);
                    let rataRata8 = hasil.nan158 - hasil.nan157;
                    nan159.value = rataRata8.toFixed(2);
                    let values24 = hasil.nan145 + hasil.nan150 + hasil.nan155;
                    let mean24 = (values24 / 3);
                    let dev22 = (hasil.nan145 - mean24) ** 2;
                    let dev23 = (hasil.nan150 - mean24) ** 2;
                    let dev24 = (hasil.nan155 - mean24) ** 2;
                    let total8 = (dev22 + dev23 + dev24) / 2;
                    let totals8 = Math.sqrt(total8);
                    nan160.value = totals8.toFixed(2);

                    let ubaku22 = tstd/normal1;
                    let ubaku23 = totals8/normal2;
                    let ubaku24 = opertor/retangular;
                    let ubakuxci22 = ubaku22*ci1;
                    let ubakuxci23 = ubaku23*ci2;
                    let ubakuxci24 = ubaku24*ci3;
                    let pangkat22 = ubakuxci22**2;
                    let pangkat23 = ubakuxci23**2;
                    let pangkat24 = ubakuxci24**2;
                    let kuadrat22 = (ubakuxci22**4)/vi1;
                    let kuadrat23 = (ubakuxci23**4)/vi2;
                    let kuadrat24 = (ubakuxci24**4)/vi3;

                    let summary15 = (pangkat22 + pangkat23 + pangkat24);
                    let summary16 = (kuadrat22 + kuadrat23 + kuadrat24);
                    let derajat8 = Math.sqrt(summary15);
                    let fourth8 = (derajat8**4) / summary16;
                    let hasils8 = (derajat8 * faktor);
                    hasil8.value = hasils8.toFixed(3);


                    // hitung 9
                    nan164.value = nilai.toFixed(2);
                    nan169.value = nilai.toFixed(2);
                    nan174.value = nilai.toFixed(2);

                    let h49 = hasil.nan162 + hasil.nan164;
                    let h50 = hasil.nan167 + hasil.nan169;
                    let h51 = hasil.nan172 + hasil.nan174;
                    nan165.value = h49.toFixed(2);
                    nan170.value = h50.toFixed(2);
                    nan175.value = h51.toFixed(2);
                    let h52 = hasil.nan165 - hasil.nan163;
                    let h53 = hasil.nan170 - hasil.nan168;
                    let h54 = hasil.nan175 - hasil.nan173;
                    nan166.value = h52.toFixed(2);
                    nan171.value = h53.toFixed(2);
                    nan176.value = h54.toFixed(2);
                    let values25 = hasil.nan163 + hasil.nan168 + hasil.nan173;
                    let mean25 = (values25 / 3);
                    nan177.value = mean25.toFixed(1);
                    let values26 = hasil.nan165 + hasil.nan170 + hasil.nan175;
                    let mean26 = (values26 / 3);
                    nan178.value = mean26.toFixed(2);
                    let rataRata9 = hasil.nan178 - hasil.nan177;
                    nan179.value = rataRata9.toFixed(2);
                    let values27 = hasil.nan165 + hasil.nan170 + hasil.nan175;
                    let mean27 = (values27 / 3);
                    let dev25 = (hasil.nan165 - mean27) ** 2;
                    let dev26 = (hasil.nan170 - mean27) ** 2;
                    let dev27 = (hasil.nan175 - mean27) ** 2;
                    let total9 = (dev25 + dev26 + dev27) / 2;
                    let totals9 = Math.sqrt(total9);
                    nan180.value = totals9.toFixed(2);

                    let ubaku25 = tstd/normal1;
                    let ubaku26 = totals9/normal2;
                    let ubaku27 = opertor/retangular;
                    let ubakuxci25 = ubaku25*ci1;
                    let ubakuxci26 = ubaku26*ci2;
                    let ubakuxci27 = ubaku27*ci3;
                    let pangkat25 = ubakuxci25**2;
                    let pangkat26 = ubakuxci26**2;
                    let pangkat27 = ubakuxci27**2;
                    let kuadrat25 = (ubakuxci25**4)/vi1;
                    let kuadrat26 = (ubakuxci26**4)/vi2;
                    let kuadrat27 = (ubakuxci27**4)/vi3;

                    let summary17 = (pangkat25 + pangkat26 + pangkat27);
                    let summary18 = (kuadrat25 + kuadrat26 + kuadrat27);
                    let derajat9 = Math.sqrt(summary17);
                    let fourth9 = (derajat9**4) / summary18;
                    let hasils9 = (derajat9 * faktor);
                    hasil9.value = hasils9.toFixed(3);


                    // hitung 10
                    nan184.value = nilai.toFixed(2);
                    nan189.value = nilai.toFixed(2);
                    nan194.value = nilai.toFixed(2);

                    let h55 = hasil.nan182 + hasil.nan184;
                    let h56 = hasil.nan187 + hasil.nan189;
                    let h57 = hasil.nan192 + hasil.nan194;
                    nan185.value = h55.toFixed(2);
                    nan190.value = h56.toFixed(2);
                    nan195.value = h57.toFixed(2);
                    let h58 = hasil.nan185 - hasil.nan183;
                    let h59 = hasil.nan190 - hasil.nan188;
                    let h60 = hasil.nan195 - hasil.nan193;
                    nan186.value = h58.toFixed(2);
                    nan191.value = h59.toFixed(2);
                    nan196.value = h60.toFixed(2);
                    let values28 = hasil.nan183 + hasil.nan188 + hasil.nan193;
                    let mean28 = (values28 / 3);
                    nan197.value = mean28.toFixed(1);
                    let values29 = hasil.nan185 + hasil.nan190 + hasil.nan195;
                    let mean29 = (values29 / 3);
                    nan198.value = mean29.toFixed(2);
                    let rataRata10 = hasil.nan198 - hasil.nan197;
                    nan199.value = rataRata10.toFixed(2);
                    let values30 = hasil.nan185 + hasil.nan190 + hasil.nan195;
                    let mean30 = (values30 / 3);
                    let dev28 = (hasil.nan185 - mean30) ** 2;
                    let dev29 = (hasil.nan190 - mean30) ** 2;
                    let dev30 = (hasil.nan195 - mean30) ** 2;
                    let total10 = (dev28 + dev29 + dev30) / 2;
                    let totals10 = Math.sqrt(total10);
                    nan200.value = totals10.toFixed(2);

                    let ubaku28 = tstd/normal1;
                    let ubaku29 = totals10/normal2;
                    let ubaku30 = opertor/retangular;
                    let ubakuxci28 = ubaku28*ci1;
                    let ubakuxci29 = ubaku29*ci2;
                    let ubakuxci30 = ubaku30*ci3;
                    let pangkat28 = ubakuxci28**2;
                    let pangkat29 = ubakuxci29**2;
                    let pangkat30 = ubakuxci30**2;
                    let kuadrat28 = (ubakuxci28**4)/vi1;
                    let kuadrat29 = (ubakuxci29**4)/vi2;
                    let kuadrat30 = (ubakuxci30**4)/vi3;

                    let summary19 = (pangkat28 + pangkat29 + pangkat30);
                    let summary20 = (kuadrat28 + kuadrat29 + kuadrat30);
                    let derajat10 = Math.sqrt(summary19);
                    let fourth10 = (derajat10**4) / summary20;
                    let hasils10 = (derajat10 * faktor);
                    hasil10.value = hasils10.toFixed(3);


                    // hitungan 11
                    nan204.value = nilai.toFixed(2);
                    nan209.value = nilai.toFixed(2);
                    nan214.value = nilai.toFixed(2);

                    let h61 = hasil.nan202 + hasil.nan204;
                    let h62 = hasil.nan207 + hasil.nan209;
                    let h63 = hasil.nan212 + hasil.nan214;
                    nan205.value = h61.toFixed(2);
                    nan210.value = h62.toFixed(2);
                    nan215.value = h63.toFixed(2);
                    let h64 = hasil.nan205 - hasil.nan203;
                    let h65 = hasil.nan210 - hasil.nan208;
                    let h66 = hasil.nan215 - hasil.nan213;
                    nan206.value = h64.toFixed(2);
                    nan211.value = h65.toFixed(2);
                    nan216.value = h66.toFixed(2);
                    let values31 = hasil.nan203 + hasil.nan208 + hasil.nan213;
                    let mean31 = (values31 / 3);
                    nan217.value = mean31.toFixed(1);
                    let values32 = hasil.nan205 + hasil.nan210 + hasil.nan215;
                    let mean32 = (values32 / 3);
                    nan218.value = mean32.toFixed(2);
                    let rataRata11 = hasil.nan218 - hasil.nan217;
                    nan219.value = rataRata11.toFixed(2);
                    let values33 = hasil.nan205 + hasil.nan210 + hasil.nan215;
                    let mean33 = (values33 / 3);
                    let dev31 = (hasil.nan205 - mean33) ** 2;
                    let dev32 = (hasil.nan210 - mean33) ** 2;
                    let dev33 = (hasil.nan215 - mean33) ** 2;
                    let total11 = (dev31 + dev32 + dev33) / 2;
                    let totals11 = Math.sqrt(total11);
                    nan220.value = totals11.toFixed(2);

                    let ubaku31 = tstd/normal1;
                    let ubaku32 = totals11/normal2;
                    let ubaku33 = opertor/retangular;
                    let ubakuxci31 = ubaku31*ci1;
                    let ubakuxci32 = ubaku32*ci2;
                    let ubakuxci33 = ubaku33*ci3;
                    let pangkat31 = ubakuxci31**2;
                    let pangkat32 = ubakuxci32**2;
                    let pangkat33 = ubakuxci33**2;
                    let kuadrat31 = (ubakuxci31**4)/vi1;
                    let kuadrat32 = (ubakuxci32**4)/vi2;
                    let kuadrat33 = (ubakuxci33**4)/vi3;

                    let summary21 = (pangkat31 + pangkat32 + pangkat33);
                    let summary22 = (kuadrat31 + kuadrat32 + kuadrat33);
                    let derajat11 = Math.sqrt(summary21);
                    let fourth11 = (derajat11**4) / summary22;
                    let hasils11 = (derajat11 * faktor);
                    hasil11.value = hasils11.toFixed(3);


                    // hitungan 12
                    nan224.value = nilai.toFixed(2);
                    nan229.value = nilai.toFixed(2);
                    nan234.value = nilai.toFixed(2);

                    let h67 = hasil.nan222 + hasil.nan224;
                    let h68 = hasil.nan227 + hasil.nan229;
                    let h69 = hasil.nan232 + hasil.nan234;
                    nan225.value = h67.toFixed(2);
                    nan230.value = h68.toFixed(2);
                    nan235.value = h69.toFixed(2);
                    let h70 = hasil.nan225 - hasil.nan223;
                    let h71 = hasil.nan230 - hasil.nan228;
                    let h72 = hasil.nan235 - hasil.nan233;
                    nan226.value = h70.toFixed(2);
                    nan231.value = h71.toFixed(2);
                    nan236.value = h72.toFixed(2);
                    let values34 = hasil.nan223 + hasil.nan228 + hasil.nan233;
                    let mean34 = (values34 / 3);
                    nan237.value = mean34.toFixed(1);
                    let values35 = hasil.nan225 + hasil.nan230 + hasil.nan235;
                    let mean35 = (values35 / 3);
                    nan238.value = mean35.toFixed(2);
                    let rataRata12 = hasil.nan238 - hasil.nan237;
                    nan239.value = rataRata12.toFixed(2);
                    let values36 = hasil.nan225 + hasil.nan230 + hasil.nan235;
                    let mean36 = (values36 / 3);
                    let dev34 = (hasil.nan225 - mean36) ** 2;
                    let dev35 = (hasil.nan230 - mean36) ** 2;
                    let dev36 = (hasil.nan235 - mean36) ** 2;
                    let total12 = (dev34 + dev35 + dev36) / 2;
                    let totals12 = Math.sqrt(total12);
                    nan240.value = totals12.toFixed(2);

                    let ubaku34 = tstd/normal1;
                    let ubaku35 = totals12/normal2;
                    let ubaku36 = opertor/retangular;
                    let ubakuxci34 = ubaku34*ci1;
                    let ubakuxci35 = ubaku35*ci2;
                    let ubakuxci36 = ubaku36*ci3;
                    let pangkat34 = ubakuxci34**2;
                    let pangkat35 = ubakuxci35**2;
                    let pangkat36 = ubakuxci36**2;
                    let kuadrat34 = (ubakuxci34**4)/vi1;
                    let kuadrat35 = (ubakuxci35**4)/vi2;
                    let kuadrat36 = (ubakuxci36**4)/vi3;

                    let summary23 = (pangkat34 + pangkat35 + pangkat36);
                    let summary24 = (kuadrat34 + kuadrat35 + kuadrat36);
                    let derajat12 = Math.sqrt(summary23);
                    let fourth12 = (derajat12**4) / summary24;
                    let hasils12 = (derajat12 * faktor);
                    hasil12.value = hasils12.toFixed(3);


                    // hitung 13
                    nan244.value = nilai.toFixed(2);
                    nan249.value = nilai.toFixed(2);
                    nan254.value = nilai.toFixed(2);

                    let h73 = hasil.nan242 + hasil.nan244;
                    let h74 = hasil.nan247 + hasil.nan249;
                    let h75 = hasil.nan252 + hasil.nan254;
                    nan245.value = h73.toFixed(2);
                    nan250.value = h74.toFixed(2);
                    nan255.value = h75.toFixed(2);
                    let h76 = hasil.nan245 - hasil.nan243;
                    let h77 = hasil.nan250 - hasil.nan248;
                    let h78 = hasil.nan255 - hasil.nan253;
                    nan246.value = h76.toFixed(2);
                    nan251.value = h77.toFixed(2);
                    nan256.value = h78.toFixed(2);
                    let values37 = hasil.nan243 + hasil.nan248 + hasil.nan253;
                    let mean37 = (values37 / 3);
                    nan257.value = mean37.toFixed(1);
                    let values38 = hasil.nan245 + hasil.nan250 + hasil.nan255;
                    let mean38 = (values38 / 3);
                    nan258.value = mean38.toFixed(2);
                    let rataRata13 = hasil.nan258 - hasil.nan257;
                    nan259.value = rataRata13.toFixed(2);
                    let values39 = hasil.nan245 + hasil.nan250 + hasil.nan255;
                    let mean39 = (values39 / 3);
                    let dev37 = (hasil.nan245 - mean39) ** 2;
                    let dev38 = (hasil.nan250 - mean39) ** 2;
                    let dev39 = (hasil.nan255 - mean39) ** 2;
                    let total13 = (dev37 + dev38 + dev39) / 2;
                    let totals13 = Math.sqrt(total13);
                    nan260.value = totals13.toFixed(2);
                    
                    let ubaku37 = tstd/normal1;
                    let ubaku38 = totals13/normal2;
                    let ubaku39 = opertor/retangular;
                    let ubakuxci37 = ubaku37*ci1;
                    let ubakuxci38 = ubaku38*ci2;
                    let ubakuxci39 = ubaku39*ci3;
                    let pangkat37 = ubakuxci37**2;
                    let pangkat38 = ubakuxci38**2;
                    let pangkat39 = ubakuxci39**2;
                    let kuadrat37 = (ubakuxci37**4)/vi1;
                    let kuadrat38 = (ubakuxci38**4)/vi2;
                    let kuadrat39 = (ubakuxci39**4)/vi3;

                    let summary25 = (pangkat37 + pangkat38 + pangkat39);
                    let summary26 = (kuadrat37 + kuadrat38 + kuadrat39);
                    let derajat13 = Math.sqrt(summary25);
                    let fourth13 = (derajat13**4) / summary26;
                    let hasils13 = (derajat13 * faktor);
                    hasil13.value = hasils13.toFixed(3);


                    // hitung 14
                    nan264.value = nilai.toFixed(2);
                    nan269.value = nilai.toFixed(2);
                    nan274.value = nilai.toFixed(2);

                    let h79 = hasil.nan262 + hasil.nan264;
                    let h80 = hasil.nan267 + hasil.nan269;
                    let h81 = hasil.nan272 + hasil.nan274;
                    nan265.value = h79.toFixed(2);
                    nan270.value = h80.toFixed(2);
                    nan275.value = h81.toFixed(2);
                    let h82 = hasil.nan265 - hasil.nan263;
                    let h83 = hasil.nan270 - hasil.nan268;
                    let h84 = hasil.nan275 - hasil.nan273;
                    nan266.value = h82.toFixed(2);
                    nan271.value = h83.toFixed(2);
                    nan276.value = h84.toFixed(2);
                    let values40 = hasil.nan263 + hasil.nan268 + hasil.nan273;
                    let mean40 = (values40 / 3);
                    nan277.value = mean40.toFixed(1);
                    let values41 = hasil.nan265 + hasil.nan270 + hasil.nan275;
                    let mean41 = (values41 / 3);
                    nan278.value = mean41.toFixed(2);
                    let rataRata14 = hasil.nan278 - hasil.nan277;
                    nan279.value = rataRata14.toFixed(2);
                    let values42 = hasil.nan265 + hasil.nan270 + hasil.nan275;
                    let mean42 = (values42 / 3);
                    let dev40 = (hasil.nan265 - mean42) ** 2;
                    let dev41 = (hasil.nan270 - mean42) ** 2;
                    let dev42 = (hasil.nan275 - mean42) ** 2;
                    let total14 = (dev40 + dev41 + dev42) / 2;
                    let totals14 = Math.sqrt(total14);
                    nan280.value = totals14.toFixed(2);

                    let ubaku40 = tstd/normal1;
                    let ubaku41 = totals14/normal2;
                    let ubaku42 = opertor/retangular;
                    let ubakuxci40 = ubaku40*ci1;
                    let ubakuxci41 = ubaku41*ci2;
                    let ubakuxci42 = ubaku42*ci3;
                    let pangkat40 = ubakuxci40**2;
                    let pangkat41 = ubakuxci41**2;
                    let pangkat42 = ubakuxci42**2;
                    let kuadrat40 = (ubakuxci40**4)/vi1;
                    let kuadrat41 = (ubakuxci41**4)/vi2;
                    let kuadrat42 = (ubakuxci42**4)/vi3;

                    let summary27 = (pangkat40 + pangkat41 + pangkat42);
                    let summary28 = (kuadrat40 + kuadrat41 + kuadrat42);
                    let derajat14 = Math.sqrt(summary27);
                    let fourth14 = (derajat14**4) / summary28;
                    let hasils14 = (derajat14 * faktor);
                    hasil14.value = hasils14.toFixed(3);


                    // hitung 15
                    nan284.value = nilai.toFixed(2);
                    nan289.value = nilai.toFixed(2);
                    nan294.value = nilai.toFixed(2);

                    let h85 = hasil.nan282 + hasil.nan284;
                    let h86 = hasil.nan287 + hasil.nan289;
                    let h87 = hasil.nan292 + hasil.nan294;
                    nan285.value = h85.toFixed(2);
                    nan290.value = h86.toFixed(2);
                    nan295.value = h87.toFixed(2);
                    let h88 = hasil.nan285 - hasil.nan283;
                    let h89 = hasil.nan290 - hasil.nan288;
                    let h90 = hasil.nan295 - hasil.nan293;
                    nan286.value = h88.toFixed(2);
                    nan291.value = h89.toFixed(2);
                    nan296.value = h90.toFixed(2);
                    let values43 = hasil.nan283 + hasil.nan288 + hasil.nan293;
                    let mean43 = (values43 / 3);
                    nan297.value = mean43.toFixed(1);
                    let values44 = hasil.nan285 + hasil.nan290 + hasil.nan295;
                    let mean44 = (values44 / 3);
                    nan298.value = mean44.toFixed(2);
                    let rataRata15 = hasil.nan298 - hasil.nan297;
                    nan299.value = rataRata15.toFixed(2);
                    let values45 = hasil.nan285 + hasil.nan290 + hasil.nan295;
                    let mean45 = (values45 / 3);
                    let dev43 = (hasil.nan285 - mean45) ** 2;
                    let dev44 = (hasil.nan290 - mean45) ** 2;
                    let dev45 = (hasil.nan295 - mean45) ** 2;
                    let total15 = (dev43 + dev44 + dev45) / 2;
                    let totals15 = Math.sqrt(total15);
                    nan300.value = totals15.toFixed(2);
                    
                    let ubaku43 = tstd/normal1;
                    let ubaku44 = totals15/normal2;
                    let ubaku45 = opertor/retangular;
                    let ubakuxci43 = ubaku43*ci1;
                    let ubakuxci44 = ubaku44*ci2;
                    let ubakuxci45 = ubaku45*ci3;
                    let pangkat43 = ubakuxci43**2;
                    let pangkat44 = ubakuxci44**2;
                    let pangkat45 = ubakuxci45**2;
                    let kuadrat43 = (ubakuxci43**4)/vi1;
                    let kuadrat44 = (ubakuxci44**4)/vi2;
                    let kuadrat45 = (ubakuxci45**4)/vi3;

                    let summary29 = (pangkat43 + pangkat44 + pangkat45);
                    let summary30 = (kuadrat43 + kuadrat44 + kuadrat45);
                    let derajat15 = Math.sqrt(summary29);
                    let fourth15 = (derajat15**4) / summary30;
                    let hasils15 = (derajat15 * faktor);
                    hasil15.value = hasils15.toFixed(3);
                }
                
                function hapusline2() {
                    var table = document.getElementById("tabelTekananturun");
                    var rowCount = table.rows.length;

                    if (rowCount <= 2) {
                        // Jika tidak ada line yang dapat dihapus
                        alert("Tidak ada line yang bisa dihapus.");
                        return;
                    }

                    // Hapus 4 line terakhir
                    for (var i = 0; i < 4; i++) {
                        if (rowCount > 1) {
                            // Pastikan masih ada line yang bisa dihapus
                            table.deleteRow(rowCount - 1);
                            rowCount--;
                            line--; // Kurangi counter line
                        }
                    }

                    // Update miid dan hslId sesuai permintaan
                    miid = Math.max(1, miid - 20); // Pastikan miid tidak kurang dari 1
                    hslId = Math.max(1, hslId - 1); // Pastikan hslId tidak kurang dari 1
                }


                var line = 1; // Counter untuk line
                var maxline = 64; // Limit maksimal line
                var miid = 1; // ID input berikutnya, dimulai dari bac1
                var hslId = 1;
                var inlId = 1;

                function add() {
                    var table = document.getElementById("tabelTekananturun");
                    var currentRows = table.rows.length - 1; // Menghitung jumlah line saat ini (mengurangi header)

                    if (currentRows + 4 > maxline) {
                        alert("Maksimal \"64 line\" atau \"15 Perhitungan\" yang dapat ditambahkan.");
                        return;
                    }

                    for (var j = 0; j < 4; j++) {
                        // Tambah 4 line
                        var row = table.insertRow(-1);

                        for (var i = 0; i < 10; i++) {
                            // Setiap line memiliki 9 kolom
                            var cell = row.insertCell(i);
                            cell.className = "border"; // Tambahkan class border pada setiap cell

                            if (line % 4 === 0 && (i === 0 || i === 1 || i === 3 || i === 5)) {
                                // Kosongkan cell tertentu pada line ke-4
                                if (i === 0) cell.innerHTML = "";
                                if (i === 1) cell.innerHTML = "Rata Rata";
                                if (i === 3 || i === 5) cell.innerHTML = "";
                                continue;
                            }

                            // Kosongkan cell tertentu pada line ke-2 dan ke-3
                            if ((line % 4 === 2 || line % 4 === 3) && i === 0) {
                                cell.innerHTML = "";
                                continue;
                            }

                            // Kosongkan cell ke-7, ke-8, dan ke-9 pada line ke-1, ke-2, dan ke-3
                            if (line % 4 !== 0 && i >= 6) {
                                cell.innerHTML = "";
                                continue;
                            }

                            // Jika cell tidak dikosongkan, tambahkan input dengan ID dan name
                            var input = document.createElement("input");
                            input.type = "text";
                            input.style.textAlign = "center";

                            // Penyesuaian ID dan name untuk kolom ke-9 pada line ke-4
                            if (line % 4 === 0 && i === 8) {
                                input.id = "hsl" + hslId;
                                input.name = "hsl" + hslId;
                                hslId++; // Update hslId untuk line ke-4 berikutnya
                            } else if (line % 4 === 0 && (i === 9)) {
                                input.id = "inl" + inlId;
                                input.name = "inl" + inlId;
                                inlId++;
                            } else {
                                input.id = "bac" + miid;
                                input.name = "bac" + miid;

                                // Update miid hanya jika bukan kolom ke-9 pada line ke-4
                                if (!(line % 4 === 0 && i === 8 || i === 9)) {
                                    miid++;
                                }
                            }

                            // Kolom keempat dan keenam adalah readonly untuk semua line
                            if (i === 3 || i === 5) {
                                input.setAttribute("readonly", true);
                            }

                            // Kolom lebih dari keenam juga readonly untuk line ke-4
                            if (line % 4 === 0 && i >= 6) {
                                input.setAttribute("readonly", true);
                            }

                            cell.appendChild(input);
                        }

                        line++; // Tingkatkan nomor line
                    }
                }

                let nli =1.40;
                function getid2() {
                    let ids = [];

                    // Mengumpulkan ID untuk input bac dan hsl
                    for (let i = 1; i < miid; i++) {
                        ids.push("bac" + i);
                    }
                    for (let i = 1; i < hslId; i++) {
                        ids.push("hsl" + i);
                    }
                    for (let i = 1; i < inlId; i++) {
                        ids.push("inl" + i);
                    }

                    console.log("ID yang tersedia:\n" + ids.join("\n"));

                    // Mengambil nilai berdasarkan ID dan menyimpannya dalam objek
                    let nilaiBerdasarkanId = {};

                    ids.forEach((id) => {
                        let inputElement = document.getElementById(id);
                        if (inputElement) {

                            let nilai = Number(inputElement.value) || 0;
                            nilaiBerdasarkanId[id] = nilai;
                        }
                    });
                    let hsl = {}; // Objek untuk menyimpan nilai bac

                    for (let i = 1; i <= 300; i++) {
                        const bacInput = document.getElementById(`bac${i}`);
                        hsl[`bac${i}`] = bacInput ? Number(bacInput.value) || 0 : 0; // Ambil nilai dari input
                    }

                    // hitungan 1
                    bac4.value = nli.toFixed(2);
                    bac9.value = nli.toFixed(2);
                    bac14.value = nli.toFixed(2);

                    let h1 = hsl.bac2 + hsl.bac4;
                    let h2 = hsl.bac7 + hsl.bac9;
                    let h3 = hsl.bac12 + hsl.bac14;

                    bac5.value = h1.toFixed(2);
                    bac10.value = h2.toFixed(2);
                    bac15.value = h3.toFixed(2);

                    let h4 = hsl.bac5 - hsl.bac3;
                    let h5 = hsl.bac10 - hsl.bac8;
                    let h6 = hsl.bac15 - hsl.bac13;

                    bac6.value = h4.toFixed(2);
                    bac11.value = h5.toFixed(2);
                    bac16.value = h6.toFixed(2);

                    let val1 = hsl.bac3 + hsl.bac8 + hsl.bac13;
                    let main1 = (val1 / 3);
                    bac17.value = main1.toFixed(1);

                    let val2 = hsl.bac5 + hsl.bac10 + hsl.bac15;
                    let main2 = (val2 / 3);
                    bac18.value = main2.toFixed(2);

                    let ave1 = hsl.bac18 - hsl.bac17;
                    bac19.value = ave1.toFixed(2);

                    let val3 = hsl.bac5 + hsl.bac10 + hsl.bac15;
                    let main3 = (val2 / 3);

                    let set1 = (hsl.bac5 - main3) ** 2;
                    let set2 = (hsl.bac10 - main3) ** 2;
                    let set3 = (hsl.bac15 - main3) ** 2;

                    let ttl1 = (set1 + set2 + set3) / 2;
                    let ttls1 = Math.sqrt(ttl1);
                    bac20.value = ttls1.toFixed(2);

                    let ubaku1 = tstd/normal1;
                    let ubaku2 = ttls1/normal2;
                    let ubaku3 = opertor/retangular;
                    let ubakuxci1 = ubaku1*ci1;
                    let ubakuxci2 = ubaku2*ci2;
                    let ubakuxci3 = ubaku3*ci3;
                    let pangkat1 = ubakuxci1**2;
                    let pangkat2 = ubakuxci2**2;
                    let pangkat3 = ubakuxci3**2;
                    let kuadrat1 = (ubakuxci1**4)/vi1;
                    let kuadrat2 = (ubakuxci2**4)/vi2;
                    let kuadrat3 = (ubakuxci3**4)/vi3;

                    let summary1 = (pangkat1 + pangkat2 + pangkat3);
                    let summary2 = (kuadrat1 + kuadrat2 + kuadrat3);
                    let derajat = Math.sqrt(summary1);
                    let fourth = (derajat**4) / summary2;
                    let hasils1 = (derajat * faktor);
                    hsl1.value = hasils1.toFixed(3);

                    let line1 = "T1";
                    inl1.value = line1;


                    // hitungan 2
                    bac24.value = nli.toFixed(2);
                    bac29.value = nli.toFixed(2);
                    bac34.value = nli.toFixed(2);

                    let h7 = hsl.bac22 + hsl.bac24;
                    let h8 = hsl.bac27 + hsl.bac29;
                    let h9 = hsl.bac32 + hsl.bac34;

                    bac25.value = h7.toFixed(2);
                    bac30.value = h8.toFixed(2);
                    bac35.value = h9.toFixed(2);

                    let h10 = hsl.bac25 - hsl.bac23;
                    let h11 = hsl.bac30 - hsl.bac28;
                    let h12 = hsl.bac35 - hsl.bac33;

                    bac26.value = h10.toFixed(2);
                    bac31.value = h11.toFixed(2);
                    bac36.value = h12.toFixed(2);

                    let val4 = hsl.bac23 + hsl.bac28 + hsl.bac33;
                    let main4 = (val4 / 3);
                    bac37.value = main4.toFixed(1);

                    let val5 = hsl.bac25 + hsl.bac30 + hsl.bac35;
                    let main5 = (val5 / 3);
                    bac38.value = main5.toFixed(2);

                    let ave2 = hsl.bac38 - hsl.bac37;
                    bac39.value = ave2.toFixed(2);

                    let val6 = hsl.bac25 + hsl.bac30 + hsl.bac35;
                    let main6 = (val6 / 3);

                    let set4 = (hsl.bac25 - main6) ** 2;
                    let set5 = (hsl.bac30 - main6) ** 2;
                    let set6 = (hsl.bac35 - main6) ** 2;

                    let ttl2 = (set4 + set5 + set6) / 2;
                    let hsl2 = Math.sqrt(ttl2);
                    bac40.value = hsl2.toFixed(2);

                    let line2 = "T2";
                    inl2.value = line2;


                    // hitung 3 
                    bac44.value = nli.toFixed(2);
                    bac49.value = nli.toFixed(2);
                    bac54.value = nli.toFixed(2);

                    let h13 = hsl.bac42 + hsl.bac44;
                    let h14 = hsl.bac47 + hsl.bac49;
                    let h15 = hsl.bac52 + hsl.bac54;

                    bac45.value = h13.toFixed(2);
                    bac50.value = h14.toFixed(2);
                    bac55.value = h15.toFixed(2);

                    let h16 = hsl.bac45 - hsl.bac43;
                    let h17 = hsl.bac50 - hsl.bac48;
                    let h18 = hsl.bac55 - hsl.bac53;

                    bac46.value = h16.toFixed(2);
                    bac51.value = h17.toFixed(2);
                    bac56.value = h18.toFixed(2);

                    let val7 = hsl.bac43 + hsl.bac48 + hsl.bac53;
                    let main7 = (val7 / 3);
                    bac57.value = main7.toFixed(1);

                    let val8 = hsl.bac45 + hsl.bac50 + hsl.bac55;
                    let main8 = (val8 / 3);
                    bac58.value = main8.toFixed(2);

                    let ave3 = hsl.bac58 - hsl.bac57;
                    bac59.value = ave3.toFixed(2);

                    let val9 = hsl.bac45 + hsl.bac50 + hsl.bac55;
                    let main9 = (val9 / 3);

                    let set7 = (hsl.bac45 - main9) ** 2;
                    let set8 = (hsl.bac50 - main9) ** 2;
                    let set9 = (hsl.bac55 - main9) ** 2;

                    let ttl3 = (set7 + set8 + set9) / 2;
                    let hsl3 = Math.sqrt(ttl3);
                    bac60.value = hsl3.toFixed(2);

                    let line3 = "T3";
                    inl3.value = line3;


                    // hitung 4
                    bac64.value = nli.toFixed(2);
                    bac69.value = nli.toFixed(2);
                    bac74.value = nli.toFixed(2);

                    let h19 = hsl.bac62 + hsl.bac64;
                    let h20 = hsl.bac67 + hsl.bac69;
                    let h21 = hsl.bac72 + hsl.bac74;

                    bac65.value = h19.toFixed(2);
                    bac70.value = h20.toFixed(2);
                    bac75.value = h21.toFixed(2);

                    let h22 = hsl.bac65 - hsl.bac63;
                    let h23 = hsl.bac70 - hsl.bac68;
                    let h24 = hsl.bac75 - hsl.bac73;

                    bac66.value = h22.toFixed(2);
                    bac71.value = h23.toFixed(2);
                    bac76.value = h24.toFixed(2);

                    let val10 = hsl.bac63 + hsl.bac68 + hsl.bac73;
                    let main10 = (val10 / 3);
                    bac77.value = main10.toFixed(1);

                    let val11 = hsl.bac65 + hsl.bac70 + hsl.bac75;
                    let main11 = (val11 / 3);
                    bac78.value = main11.toFixed(2);

                    let ave4 = hsl.bac78 - hsl.bac77;
                    bac79.value = ave4.toFixed(2);

                    let val12 = hsl.bac65 + hsl.bac70 + hsl.bac75;
                    let main12 = (val12 / 3);

                    let set10 = (hsl.bac65 - main12) ** 2;
                    let set11 = (hsl.bac70 - main12) ** 2;
                    let set12 = (hsl.bac75 - main12) ** 2;

                    let ttl4 = (set10 + set11 + set12) / 2;
                    let hsl4 = Math.sqrt(ttl4);
                    bac80.value = hsl4.toFixed(2);

                    let line4 = "T4";
                    inl4.value = line4;


                    // hitung 5
                    bac84.value = nli.toFixed(2);
                    bac89.value = nli.toFixed(2);
                    bac94.value = nli.toFixed(2);

                    let h25 = hsl.bac82 + hsl.bac84;
                    let h26 = hsl.bac87 + hsl.bac89;
                    let h27 = hsl.bac92 + hsl.bac94;

                    bac85.value = h25.toFixed(2);
                    bac90.value = h26.toFixed(2);
                    bac95.value = h27.toFixed(2);

                    let h28 = hsl.bac85 - hsl.bac83;
                    let h29 = hsl.bac90 - hsl.bac88;
                    let h30 = hsl.bac95 - hsl.bac93;

                    bac86.value = h28.toFixed(2);
                    bac91.value = h29.toFixed(2);
                    bac96.value = h30.toFixed(2);

                    let val13 = hsl.bac83 + hsl.bac88 + hsl.bac93;
                    let main13 = (val13 / 3);
                    bac97.value = main13.toFixed(1);

                    let val14 = hsl.bac85 + hsl.bac90 + hsl.bac95;
                    let main14 = (val14 / 3);
                    bac98.value = main14.toFixed(2);

                    let ave5 = hsl.bac98 - hsl.bac97;
                    bac99.value = ave5.toFixed(2);

                    let val15 = hsl.bac85 + hsl.bac90 + hsl.bac95;
                    let main15 = (val15 / 3);

                    let set13 = (hsl.bac85 - main15) ** 2;
                    let set14 = (hsl.bac90 - main15) ** 2;
                    let set15 = (hsl.bac95 - main15) ** 2;

                    let ttl5 = (set13 + set14 + set15) / 2;
                    let hsl5 = Math.sqrt(ttl5);
                    bac100.value = hsl5.toFixed(2);

                    let line5 = "T5";
                    inl5.value = line5;


                    // hitungan 6
                    bac104.value = nli.toFixed(2);
                    bac109.value = nli.toFixed(2);
                    bac114.value = nli.toFixed(2);

                    let h31 = hsl.bac102 + hsl.bac104;
                    let h32 = hsl.bac107 + hsl.bac109;
                    let h33 = hsl.bac112 + hsl.bac114;

                    bac105.value = h31.toFixed(2);
                    bac110.value = h32.toFixed(2);
                    bac115.value = h33.toFixed(2);

                    let h34 = hsl.bac105 - hsl.bac103;
                    let h35 = hsl.bac110 - hsl.bac108;
                    let h36 = hsl.bac115 - hsl.bac113;

                    bac106.value = h34.toFixed(2);
                    bac111.value = h35.toFixed(2);
                    bac116.value = h36.toFixed(2);

                    let val16 = hsl.bac103 + hsl.bac108 + hsl.bac113;
                    let main16 = (val16 / 3);
                    bac117.value = main16.toFixed(1);

                    let val17 = hsl.bac105 + hsl.bac110 + hsl.bac115;
                    let main17 = (val17 / 3);
                    bac118.value = main17.toFixed(2);

                    let ave6 = hsl.bac118 - hsl.bac117;
                    bac119.value = ave6.toFixed(2);

                    let val18 = hsl.bac105 + hsl.bac110 + hsl.bac115;
                    let main18 = (val18 / 3);

                    let set16 = (hsl.bac105 - main18) ** 2;
                    let set17 = (hsl.bac110 - main18) ** 2;
                    let set18 = (hsl.bac115 - main18) ** 2;

                    let ttl6 = (set16 + set17 + set18) / 2;
                    let hsl6 = Math.sqrt(ttl6);
                    bac120.value = hsl6.toFixed(2);

                    let line6 = "T6";
                    inl6.value = line6;


                    // hitungan 7
                    bac124.value = nli.toFixed(2);
                    bac129.value = nli.toFixed(2);
                    bac134.value = nli.toFixed(2);

                    let h37 = hsl.bac122 + hsl.bac124;
                    let h38 = hsl.bac127 + hsl.bac129;
                    let h39 = hsl.bac132 + hsl.bac134;

                    bac125.value = h37.toFixed(2);
                    bac130.value = h38.toFixed(2);
                    bac135.value = h39.toFixed(2);

                    let h40 = hsl.bac125 - hsl.bac123;
                    let h41 = hsl.bac130 - hsl.bac128;
                    let h42 = hsl.bac135 - hsl.bac133;

                    bac126.value = h40.toFixed(2);
                    bac131.value = h41.toFixed(2);
                    bac136.value = h42.toFixed(2);

                    let val19 = hsl.bac123 + hsl.bac128 + hsl.bac133;
                    let main19 = (val19 / 3);
                    bac137.value = main19.toFixed(1);

                    let val20 = hsl.bac125 + hsl.bac130 + hsl.bac135;
                    let main20 = (val20 / 3);
                    bac138.value = main20.toFixed(2);

                    let ave7 = hsl.bac138 - hsl.bac137;
                    bac139.value = ave7.toFixed(2);

                    let val21 = hsl.bac125 + hsl.bac130 + hsl.bac135;
                    let main21 = (val21 / 3);

                    let set19 = (hsl.bac125 - main21) ** 2;
                    let set20 = (hsl.bac130 - main21) ** 2;
                    let set21 = (hsl.bac135 - main21) ** 2;

                    let ttl7 = (set19 + set20 + set21) / 2;
                    let hsl7 = Math.sqrt(ttl7);
                    bac140.value = hsl7.toFixed(2);

                    let line7 = "T7";
                    inl7.value = line7;


                    // hitung 8
                    bac144.value = nli.toFixed(2);
                    bac149.value = nli.toFixed(2);
                    bac154.value = nli.toFixed(2);

                    let h43 = hsl.bac142 + hsl.bac144;
                    let h44 = hsl.bac147 + hsl.bac149;
                    let h45 = hsl.bac152 + hsl.bac154;

                    bac145.value = h43.toFixed(2);
                    bac150.value = h44.toFixed(2);
                    bac155.value = h45.toFixed(2);

                    let h46 = hsl.bac145 - hsl.bac143;
                    let h47 = hsl.bac150 - hsl.bac148;
                    let h48 = hsl.bac155 - hsl.bac153;

                    bac146.value = h46.toFixed(2);
                    bac151.value = h47.toFixed(2);
                    bac156.value = h48.toFixed(2);

                    let val22 = hsl.bac143 + hsl.bac148 + hsl.bac153;
                    let main22 = (val22 / 3);
                    bac157.value = main22.toFixed(1);

                    let val23 = hsl.bac145 + hsl.bac150 + hsl.bac155;
                    let main23 = (val23 / 3);
                    bac158.value = main23.toFixed(2);

                    let ave8 = hsl.bac158 - hsl.bac157;
                    bac159.value = ave8.toFixed(2);

                    let val24 = hsl.bac145 + hsl.bac150 + hsl.bac155;
                    let main24 = (val24 / 3);

                    let set22 = (hsl.bac145 - main24) ** 2;
                    let set23 = (hsl.bac150 - main24) ** 2;
                    let set24 = (hsl.bac155 - main24) ** 2;

                    let ttl8 = (set22 + set23 + set24) / 2;
                    let hsl8 = Math.sqrt(ttl8);
                    bac160.value = hsl8.toFixed(2);

                    let line8 = "T8";
                    inl8.value = line8;


                    // hitung 9
                    bac164.value = nli.toFixed(2);
                    bac169.value = nli.toFixed(2);
                    bac174.value = nli.toFixed(2);

                    let h49 = hsl.bac162 + hsl.bac164;
                    let h50 = hsl.bac167 + hsl.bac169;
                    let h51 = hsl.bac172 + hsl.bac174;

                    bac165.value = h49.toFixed(2);
                    bac170.value = h50.toFixed(2);
                    bac175.value = h51.toFixed(2);

                    let h52 = hsl.bac165 - hsl.bac163;
                    let h53 = hsl.bac170 - hsl.bac168;
                    let h54 = hsl.bac175 - hsl.bac173;

                    bac166.value = h52.toFixed(2);
                    bac171.value = h53.toFixed(2);
                    bac176.value = h54.toFixed(2);

                    let val25 = hsl.bac163 + hsl.bac168 + hsl.bac173;
                    let main25 = (val25 / 3);
                    bac177.value = main25.toFixed(1);

                    let val26 = hsl.bac165 + hsl.bac170 + hsl.bac175;
                    let main26 = (val26 / 3);
                    bac178.value = main26.toFixed(2);

                    let ave9 = hsl.bac178 - hsl.bac177;
                    bac179.value = ave9.toFixed(2);

                    let val27 = hsl.bac165 + hsl.bac170 + hsl.bac175;
                    let main27 = (val27 / 3);

                    let set25 = (hsl.bac165 - main27) ** 2;
                    let set26 = (hsl.bac170 - main27) ** 2;
                    let set27 = (hsl.bac175 - main27) ** 2;

                    let ttl9 = (set25 + set26 + set27) / 2;
                    let hsl9 = Math.sqrt(ttl9);
                    bac180.value = hsl9.toFixed(2);

                    let line9 = "T9";
                    inl9.value = line9;


                    // hitung 10
                    bac184.value = nli.toFixed(2);
                    bac189.value = nli.toFixed(2);
                    bac194.value = nli.toFixed(2);

                    let h55 = hsl.bac182 + hsl.bac184;
                    let h56 = hsl.bac187 + hsl.bac189;
                    let h57 = hsl.bac192 + hsl.bac194;

                    bac185.value = h55.toFixed(2);
                    bac190.value = h56.toFixed(2);
                    bac195.value = h57.toFixed(2);

                    let h58 = hsl.bac185 - hsl.bac183;
                    let h59 = hsl.bac190 - hsl.bac188;
                    let h60 = hsl.bac195 - hsl.bac193;

                    bac186.value = h58.toFixed(2);
                    bac191.value = h59.toFixed(2);
                    bac196.value = h60.toFixed(2);

                    let val28 = hsl.bac183 + hsl.bac188 + hsl.bac193;
                    let main28 = (val28 / 3);
                    bac197.value = main28.toFixed(1);

                    let val29 = hsl.bac185 + hsl.bac190 + hsl.bac195;
                    let main29 = (val29 / 3);
                    bac198.value = main29.toFixed(2);

                    let ave10 = hsl.bac198 - hsl.bac197;
                    bac199.value = ave10.toFixed(2);

                    let val30 = hsl.bac185 + hsl.bac190 + hsl.bac195;
                    let main30 = (val30 / 3);

                    let set28 = (hsl.bac185 - main30) ** 2;
                    let set29 = (hsl.bac190 - main30) ** 2;
                    let set30 = (hsl.bac195 - main30) ** 2;

                    let ttl10 = (set28 + set29 + set30) / 2;
                    let hsl10 = Math.sqrt(ttl10);
                    bac200.value = hsl10.toFixed(2);

                    let line10 = "T10";
                    inl10.value = line10;


                    // hitungan 11
                    bac204.value = nli.toFixed(2);
                    bac209.value = nli.toFixed(2);
                    bac214.value = nli.toFixed(2);

                    let h61 = hsl.bac202 + hsl.bac204;
                    let h62 = hsl.bac207 + hsl.bac209;
                    let h63 = hsl.bac212 + hsl.bac214;

                    bac205.value = h61.toFixed(2);
                    bac210.value = h62.toFixed(2);
                    bac215.value = h63.toFixed(2);

                    let h64 = hsl.bac205 - hsl.bac203;
                    let h65 = hsl.bac210 - hsl.bac208;
                    let h66 = hsl.bac215 - hsl.bac213;

                    bac206.value = h64.toFixed(2);
                    bac211.value = h65.toFixed(2);
                    bac216.value = h66.toFixed(2);

                    let val31 = hsl.bac203 + hsl.bac208 + hsl.bac213;
                    let main31 = (val31 / 3);
                    bac217.value = main31.toFixed(1);

                    let val32 = hsl.bac205 + hsl.bac210 + hsl.bac215;
                    let main32 = (val32 / 3);
                    bac218.value = main32.toFixed(2);

                    let ave11 = hsl.bac218 - hsl.bac217;
                    bac219.value = ave11.toFixed(2);

                    let val33 = hsl.bac205 + hsl.bac210 + hsl.bac215;
                    let main33 = (val33 / 3);

                    let set31 = (hsl.bac205 - main33) ** 2;
                    let set32 = (hsl.bac210 - main33) ** 2;
                    let set33 = (hsl.bac215 - main33) ** 2;

                    let ttl11 = (set31 + set32 + set33) / 2;
                    let hsl11 = Math.sqrt(ttl11);
                    bac220.value = hsl11.toFixed(2);

                    let line11 = "T11";
                    inl11.value = line11;


                    // hitungan 12
                    bac224.value = nli.toFixed(2);
                    bac229.value = nli.toFixed(2);
                    bac234.value = nli.toFixed(2);

                    let h67 = hsl.bac222 + hsl.bac224;
                    let h68 = hsl.bac227 + hsl.bac229;
                    let h69 = hsl.bac232 + hsl.bac234;

                    bac225.value = h67.toFixed(2);
                    bac230.value = h68.toFixed(2);
                    bac235.value = h69.toFixed(2);

                    let h70 = hsl.bac225 - hsl.bac223;
                    let h71 = hsl.bac230 - hsl.bac228;
                    let h72 = hsl.bac235 - hsl.bac233;

                    bac226.value = h70.toFixed(2);
                    bac231.value = h71.toFixed(2);
                    bac236.value = h72.toFixed(2);

                    let val34 = hsl.bac223 + hsl.bac228 + hsl.bac233;
                    let main34 = (val34 / 3);
                    bac237.value = main34.toFixed(1);

                    let val35 = hsl.bac225 + hsl.bac230 + hsl.bac235;
                    let main35 = (val35 / 3);
                    bac238.value = main35.toFixed(2);

                    let ave12 = hsl.bac238 - hsl.bac237;
                    bac239.value = ave12.toFixed(2);

                    let val36 = hsl.bac225 + hsl.bac230 + hsl.bac235;
                    let main36 = (val36 / 3);

                    let set34 = (hsl.bac225 - main36) ** 2;
                    let set35 = (hsl.bac230 - main36) ** 2;
                    let set36 = (hsl.bac235 - main36) ** 2;

                    let ttl12 = (set34 + set35 + set36) / 2;
                    let hsl12 = Math.sqrt(ttl12);
                    bac240.value = hsl12.toFixed(2);

                    let line12 = "T12";
                    inl12.value = line12;


                    // hitung 13
                    bac244.value = nli.toFixed(2);
                    bac249.value = nli.toFixed(2);
                    bac254.value = nli.toFixed(2);

                    let h73 = hsl.bac242 + hsl.bac244;
                    let h74 = hsl.bac247 + hsl.bac249;
                    let h75 = hsl.bac252 + hsl.bac254;

                    bac245.value = h73.toFixed(2);
                    bac250.value = h74.toFixed(2);
                    bac255.value = h75.toFixed(2);

                    let h76 = hsl.bac245 - hsl.bac243;
                    let h77 = hsl.bac250 - hsl.bac248;
                    let h78 = hsl.bac255 - hsl.bac253;

                    bac246.value = h76.toFixed(2);
                    bac251.value = h77.toFixed(2);
                    bac256.value = h78.toFixed(2);

                    let val37 = hsl.bac243 + hsl.bac248 + hsl.bac253;
                    let main37 = (val37 / 3);
                    bac257.value = main37.toFixed(1);

                    let val38 = hsl.bac245 + hsl.bac250 + hsl.bac255;
                    let main38 = (val38 / 3);
                    bac258.value = main38.toFixed(2);

                    let ave13 = hsl.bac258 - hsl.bac257;
                    bac259.value = ave13.toFixed(2);

                    let val39 = hsl.bac245 + hsl.bac250 + hsl.bac255;
                    let main39 = (val39 / 3);

                    let set37 = (hsl.bac245 - main39) ** 2;
                    let set38 = (hsl.bac250 - main39) ** 2;
                    let set39 = (hsl.bac255 - main39) ** 2;

                    let ttl13 = (set37 + set38 + set39) / 2;
                    let hsl13 = Math.sqrt(ttl13);
                    bac260.value = hsl13.toFixed(2);

                    let line13 = "T13";
                    inl13.value = line13;


                    // hitung 14
                    bac264.value = nli.toFixed(2);
                    bac269.value = nli.toFixed(2);
                    bac274.value = nli.toFixed(2);

                    let h79 = hsl.bac262 + hsl.bac264;
                    let h80 = hsl.bac267 + hsl.bac269;
                    let h81 = hsl.bac272 + hsl.bac274;

                    bac265.value = h79.toFixed(2);
                    bac270.value = h80.toFixed(2);
                    bac275.value = h81.toFixed(2);

                    let h82 = hsl.bac265 - hsl.bac263;
                    let h83 = hsl.bac270 - hsl.bac268;
                    let h84 = hsl.bac275 - hsl.bac273;

                    bac266.value = h82.toFixed(2);
                    bac271.value = h83.toFixed(2);
                    bac276.value = h84.toFixed(2);

                    let val40 = hsl.bac263 + hsl.bac268 + hsl.bac273;
                    let main40 = (val40 / 3);
                    bac277.value = main40.toFixed(1);

                    let val41 = hsl.bac265 + hsl.bac270 + hsl.bac275;
                    let main41 = (val41 / 3);
                    bac278.value = main41.toFixed(2);

                    let ave14 = hsl.bac278 - hsl.bac277;
                    bac279.value = ave14.toFixed(2);

                    let val42 = hsl.bac265 + hsl.bac270 + hsl.bac275;
                    let main42 = (val42 / 3);

                    let set40 = (hsl.bac265 - main42) ** 2;
                    let set41 = (hsl.bac270 - main42) ** 2;
                    let set42 = (hsl.bac275 - main42) ** 2;

                    let ttl14 = (set40 + set41 + set42) / 2;
                    let hsl14 = Math.sqrt(ttl14);
                    bac280.value = hsl14.toFixed(2);

                    let line14 = "T14";
                    inl14.value = line14;


                    // hitung 15
                    bac284.value = nli.toFixed(2);
                    bac289.value = nli.toFixed(2);
                    bac294.value = nli.toFixed(2);

                    let h85 = hsl.bac282 + hsl.bac284;
                    let h86 = hsl.bac287 + hsl.bac289;
                    let h87 = hsl.bac292 + hsl.bac294;

                    bac285.value = h85.toFixed(2);
                    bac290.value = h86.toFixed(2);
                    bac295.value = h87.toFixed(2);

                    let h88 = hsl.bac285 - hsl.bac283;
                    let h89 = hsl.bac290 - hsl.bac288;
                    let h90 = hsl.bac295 - hsl.bac293;

                    bac286.value = h88.toFixed(2);
                    bac291.value = h89.toFixed(2);
                    bac296.value = h90.toFixed(2);

                    let val43 = hsl.bac283 + hsl.bac288 + hsl.bac293;
                    let main43 = (val43 / 3);
                    bac297.value = main43.toFixed(1);

                    let val44 = hsl.bac285 + hsl.bac290 + hsl.bac295;
                    let main44 = (val44 / 3);
                    bac298.value = main44.toFixed(2);

                    let ave15 = hsl.bac298 - hsl.bac297;
                    bac299.value = ave15.toFixed(2);

                    let val45 = hsl.bac285 + hsl.bac290 + hsl.bac295;
                    let main45 = (val45 / 3);

                    let set43 = (hsl.bac285 - main45) ** 2;
                    let set44 = (hsl.bac290 - main45) ** 2;
                    let set45 = (hsl.bac295 - main45) ** 2;

                    let ttl15 = (set43 + set44 + set45) / 2;
                    let hsl15 = Math.sqrt(ttl15);
                    bac300.value = hsl15.toFixed(2);

                    let line15 = "T15";
                    inl15.value = line15;

                }
            </script>
            <script src="../../../components/bootstrap/js/bootstrap.min.js"></script>
            <script src="../../../components/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>