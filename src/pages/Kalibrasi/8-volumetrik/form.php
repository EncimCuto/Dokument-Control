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
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="volumetrik.php">> VOLUMETRIK</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href=" form.php">> FORM-VOLUMETRIK</a>
                </div>
            </div>
            <div class="page">
                <br>

                <form style="margin-top: 30px;" id="inputForm" class="inputForm" action="../../../system/volumetrik/send_email.php" method="POST">

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
                                        <input type="hidden" id="kode" name="kode" required>
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
                            <button type="button" class="btn btn-outline-secondary" id="Button-A" onclick="visibility1()">Pipet</button>
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
                                <th width="80px" class="border bown-h">standar</th>
                                <th width="80px" class="border bown-h">koreksi</th>
                                <th width="80px" class="border bown-h">stdv</th>
                                <th width="80px" class="border bown-h">akar5</th>
                                <th width="80px" class="border bown-h">u</th>
                                <th width="80px" class="border bown-h">u^2</th>
                                <th width="80px" class="border bown-h">u std^2</th>
                                <th width="80px" class="border bown-h">u gab</th>
                            </tr>
                        </table>
                        <div class="dwonbtn">
                            <button class="btn btn-danger" type="button" onclick="tambahBaris(), ambilNilaiBerdasarkanId()"><i class="bi bi-plus"></i></button>
                            <button class="btn btn-danger" type="button" onclick="ambilNilaiBerdasarkanId()">Hitung</button>
                            <button class="btn btn-danger" type="button" onclick="hapusBaris(), ambilNilaiBerdasarkanId()"><i class="bi bi-dash"></i></button>
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
                        
                        // Mengambil teks dari semua elemen dengan class 'nomor'
                        var nomorData = $(".nomor").map(function() {
                            return $(this).text();
                        }).get().join(", ");

                        var standarData = $(".standar").map(function() {
                            return $(this).text();
                        }).get().join(", ");

                        // Mengambil teks dari semua elemen dengan class 'email'
                        var emailData = $(".email").map(function() {
                            return $(this).text();
                        }).get().join(", ");

                        // Gabungkan dan tampilkan kedua data di elemen dengan ID 'output'
                        $("#output").text("Data dari standar: " + standarData +" | Data dari NAN: " + nanData + " | Data dari Nomor: " + nomorData + " | Data dari Email: " + emailData);
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
                function hapusBaris() {
                    var table = document.getElementById("tabelTekanannaik");
                    var rowCount = table.rows.length;

                    if (rowCount <= 1) {
                        // Jika tidak ada baris yang dapat dihapus
                        alert("Tidak ada baris yang bisa dihapus.");
                        return;
                    }

                    // Hapus 5 baris terakhir
                    for (var i = 0; i < 5; i++) {
                        if (rowCount > 1) { // Harus menyisakan setidaknya 2 baris
                            table.deleteRow(rowCount - 1);
                            rowCount--;
                            baris--; // Kurangi counter baris
                        }
                    }

                    // Update nextInputId, nomorid, standarid, koreksiid, stdvid, akarid, uid, upangkatid, gabid
                    nextInputId = Math.max(1, nextInputId - 15); // Mengurangi 100 sesuai kebutuhan
                    nomorid = Math.max(1, nomorid - 1);
                    standarid = Math.max(1, standarid - 1);
                    koreksiid = Math.max(1, koreksiid - 1);
                    stdvid = Math.max(1, stdvid - 1);
                    akarid = Math.max(1, akarid - 1);
                    uid = Math.max(1, uid - 1);
                    upankatid = Math.max(1, upankatid - 1);
                    ustdid = Math.max(1, ustdid - 1);
                    gabid = Math.max(1, gabid - 1);
                }

                var baris = 1; // Counter untuk baris
                var maxBaris = 100; // Limit maksimal baris
                var nextInputId = 1; // ID input berikutnya, dimulai dari nan1
                var nomorid = 1; // ID untuk hasil
                var standarid = 1;
                var koreksiid = 1;
                var stdvid = 1;
                var akarid = 1;
                var uid = 1;
                var upankatid = 1;
                var ustdid = 1;
                var gabid = 1;

                function tambahBaris() {
                    var table = document.getElementById("tabelTekanannaik");
                    var currentRows = table.rows.length - 1; // Menghitung jumlah baris saat ini (mengurangi header)

                    if (currentRows + 5 > maxBaris) {
                        alert("Maksimal \"100 baris\" atau \"20 Perhitungan\" yang dapat ditambahkan.");
                        return;
                    }

                    for (var j = 0; j < 5; j++) {
                        // Tambah 5 baris
                        var row = table.insertRow(-1);
                        for (var i = 0; i < 13; i++) {
                            
                            var cell = row.insertCell(i);
                            cell.className = "border vol";

                            if (baris % 5 === 0 && (i === 0 || i === 1 || i === 5 || i === 6 || i === 7 || i === 8 || i === 9 || i === 10 || i === 11 || i === 12)) {
                                cell.className = "border dray"
                                continue; }
                            if (baris % 5 === 2 && (i === 0 || i === 1 || i === 5 || i === 6 || i === 7 || i === 8 || i === 9 || i === 10 || i === 11 || i === 12)) {
                                cell.className = "border dray"
                                continue; }
                            if (baris % 5 === 3 && (i === 0 || i === 1 || i === 5 || i === 6 || i === 7 || i === 8 || i === 9 || i === 10 || i === 11 || i === 12)) {
                                cell.className = "border dray"
                                continue; }
                            if (baris % 5 === 4 && (i === 0 || i === 1 || i === 5 || i === 6 || i === 7 || i === 8 || i === 9 || i === 10 || i === 11 || i === 12)) {
                                cell.className = "border dray"
                                continue; }
                            
                            var input = document.createElement("input");
                            input.type = "text";
                            input.style.textAlign = "center";

                            if (baris % 5 === 1 && (i === 0 || i === 1)) {
                                input.id = "nomor" + nomorid;
                                input.name = "nomor" + nomorid;
                                nomorid++;
                            } else if (baris % 5 === 1 && (i === 5)) {
                                input.id = "standar" + standarid;
                                input.name = "standar" + standarid;
                                standarid++;
                            } else if (baris % 5 === 1 && (i === 6)) {
                                input.id = "koreksi" + koreksiid;
                                input.name = "koreksi" + koreksiid;
                                koreksiid++;
                            } else if (baris % 5 === 1 && (i === 7)) {
                                input.id = "stdv" + stdvid;
                                input.name = "stdv" + stdvid;
                                stdvid++;
                            } else if (baris % 5 === 1 && (i === 8)) {
                                input.id = "akar" + akarid;
                                input.name = "akar" + akarid;
                                akarid++;
                            } else if (baris % 5 === 1 && (i === 9)) {
                                input.id = "u" + uid;
                                input.name = "u" + uid;
                                uid++;
                            } else if (baris % 5 === 1 && (i === 10)) {
                                input.id = "upangkat" + upankatid;
                                input.name = "upangkat" + upankatid;
                                upankatid++;
                            } else if (baris % 5 === 1 && (i === 11)) {
                                input.id = "ustd" + ustdid;
                                input.name = "ustd" + ustdid;
                                ustdid++;
                            } else if (baris % 5 === 1 && (i === 12)) {
                                input.id = "ugab" + gabid;
                                input.name = "ugab" + gabid;
                                gabid++;
                            } else {
                                input.id = "nan" + nextInputId;
                                input.name = "nan" + nextInputId;

                                // Update nextInputId hanya jika bukan kolom ke-9 pada baris ke-4
                                if (!(baris % 5 === 1 && (i === 0 || i === 1 || i === 5 || i === 6 || i === 7 || i === 8 || i === 9 || i === 10 || i === 11 || i === 12))) {
                                    nextInputId++;
                                }
                            }
                            if (i === 4) {
                                input.setAttribute("readonly", true);
                            }
                            
                            if (baris % 5 === 1 && i >= 5) {
                                input.setAttribute("readonly", true);
                            }
                            cell.appendChild(input);
                        }

                        baris++; // Tingkatkan nomor baris
                    }
                }
                function ambilNilaiBerdasarkanId() {
                    let ids = [];

                    // Mengumpulkan ID untuk input nan dan hasil
                    for (let i = 1; i < nextInputId; i++) {
                        ids.push("nan" + i);
                    }
                    for (let i = 1; i < nomorid; i++) {
                        ids.push("nomor" + i);
                    }
                    for (let i = 1; i < koreksiid; i++) {
                        ids.push("koreksi" + i);
                    }
                    for (let i = 1; i < standarid; i++) {
                        ids.push("standar" + i);
                    }
                    for (let i = 1; i < stdvid; i++) {
                        ids.push("stdv" + i);
                    }
                    for (let i = 1; i < uid; i++) {
                        ids.push("u" + i);
                    }
                    for (let i = 1; i < upankatid; i++) {
                        ids.push("upangkat" + i);
                    }
                    for (let i = 1; i < akarid; i++) {
                        ids.push("akar" + i);
                    }
                    for (let i = 1; i < ustdid; i++) {
                        ids.push("ustd" + i);
                    }
                    for (let i = 1; i < gabid; i++) {
                        ids.push("ugab" + i);
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
                    let h1 = hasil.nan1 - hasil.nan2;
                    let h2 = hasil.nan4 - hasil.nan5;
                    let h3 = hasil.nan7 - hasil.nan8;
                    let h4 = hasil.nan10 - hasil.nan11;
                    let h5 = hasil.nan13 - hasil.nan14;
                    nan3.value = h1.toFixed(2);
                    nan6.value = h2.toFixed(2);
                    nan9.value = h3.toFixed(2);
                    nan12.value = h4.toFixed(2);
                    nan15.value = h5.toFixed(2);
                    // standar & koreksi
                    let value1 = hasil.nan1 + hasil.nan4 + hasil.nan7 + hasil.nan10 + hasil.nan13;
                    let mean1 = (value1 / 5);
                    standar1.value = mean1.toFixed(3);
                    let value2 = hasil.nan3 + hasil.nan6 + hasil.nan9 + hasil.nan12 + hasil.nan15;
                    let mean2 = (value2 / 5);
                    koreksi1.value = mean2.toFixed(3);
                    // stdv
                    let dev1 = (hasil.nan1 - mean1) ** 2;
                    let dev2 = (hasil.nan4 - mean1) ** 2;
                    let dev3 = (hasil.nan7 - mean1) ** 2;
                    let dev4 = (hasil.nan10 - mean1) ** 2;
                    let dev5 = (hasil.nan13 - mean1) ** 2;
                    let total1 = (dev1 + dev2 + dev3 + dev4 + dev5) / 4;
                    let hasil1 = Math.sqrt(total1);
                    stdv1.value = hasil1.toFixed(9);
                    // akar 5
                    let a1 = 5;
                    let b1 = Math.sqrt(a1);
                    akar1.value = b1.toFixed(9);
                    // u
                    let uid1 = parseFloat(stdv1.value) / parseFloat(akar1.value);
                    u1.value = uid1.toFixed(3);
                    // u^
                    let ukuadrat1 = parseFloat(u1.value) ** 2;
                    upangkat1.value = ukuadrat1.toFixed(2);
                    // u std 
                    let c1 = 0.12 ** 2;
                    ustd1.value = c1.toFixed(4);
                    // gab 
                    let gab1 = parseFloat(upangkat1.value) + parseFloat(ustd1.value);
                    let ug1 = Math.sqrt(gab1);
                    ugab1.value = ug1.toFixed(2);


                    // hitungan 2
                    let h6 = hasil.nan16 - hasil.nan17;
                    let h7 = hasil.nan19 - hasil.nan20;
                    let h8 = hasil.nan22 - hasil.nan23;
                    let h9 = hasil.nan25 - hasil.nan26;
                    let h10 = hasil.nan28 - hasil.nan29;
                    nan18.value = h6.toFixed(2);
                    nan21.value = h7.toFixed(2);
                    nan24.value = h8.toFixed(2);
                    nan27.value = h9.toFixed(2);
                    nan30.value = h10.toFixed(2);
                    // standar & koreksi
                    let value3 = hasil.nan16 + hasil.nan19 + hasil.nan22 + hasil.nan25 + hasil.nan28;
                    let mean3 = (value3 / 5);
                    standar2.value = mean3.toFixed(3);
                    let value4 = hasil.nan18 + hasil.nan21 + hasil.nan24 + hasil.nan27 + hasil.nan30;
                    let mean4 = (value4 / 5);
                    koreksi2.value = mean4.toFixed(3);
                    // stdv
                    let dev6 = (hasil.nan16 - mean3) ** 2;
                    let dev7 = (hasil.nan19 - mean3) ** 2;
                    let dev8 = (hasil.nan22 - mean3) ** 2;
                    let dev9 = (hasil.nan25 - mean3) ** 2;
                    let dev10 = (hasil.nan28 - mean3) ** 2;
                    let total2 = (dev6 + dev7 + dev8 + dev9 + dev10) / 4;
                    let hasil2 = Math.sqrt(total2);
                    stdv2.value = hasil2.toFixed(9);
                    // akar 5
                    let a2 = 5;
                    let b2 = Math.sqrt(a2);
                    akar2.value = b2.toFixed(9);
                    // u
                    let uid2 = parseFloat(stdv2.value) / parseFloat(akar2.value);
                    u2.value = uid1.toFixed(3);
                    // u^
                    let ukuadrat2 = parseFloat(u2.value) ** 2;
                    upangkat2.value = ukuadrat2.toFixed(2);
                    // u std 
                    let c2 = 0.12 ** 2;
                    ustd2.value = c2.toFixed(4);
                    // gab 
                    let gab2 = parseFloat(upangkat2.value) + parseFloat(ustd2.value);
                    let ug2 = Math.sqrt(gab2);
                    ugab2.value = ug2.toFixed(2);


                    // hitungan 3
                    let h11 = hasil.nan31 - hasil.nan32;
                    let h12 = hasil.nan34 - hasil.nan35;
                    let h13 = hasil.nan37 - hasil.nan38;
                    let h14 = hasil.nan40 - hasil.nan41;
                    let h15 = hasil.nan43 - hasil.nan44;
                    nan33.value = h11.toFixed(2);
                    nan36.value = h12.toFixed(2);
                    nan39.value = h13.toFixed(2);
                    nan42.value = h14.toFixed(2);
                    nan45.value = h15.toFixed(2);
                    // standar & koreksi
                    let value5 = hasil.nan31 + hasil.nan34 + hasil.nan37 + hasil.nan40 + hasil.nan43;
                    let mean5 = (value5 / 5);
                    standar3.value = mean5.toFixed(3);
                    let value6 = hasil.nan33 + hasil.nan36 + hasil.nan39 + hasil.nan42 + hasil.nan45;
                    let mean6 = (value6 / 5);
                    koreksi3.value = mean6.toFixed(3);
                    // stdv
                    let dev11 = (hasil.nan31 - mean5) ** 2;
                    let dev12 = (hasil.nan34 - mean5) ** 2;
                    let dev13 = (hasil.nan37 - mean5) ** 2;
                    let dev14 = (hasil.nan40 - mean5) ** 2;
                    let dev15 = (hasil.nan43 - mean5) ** 2;
                    let total3 = (dev11 + dev12 + dev13 + dev14 + dev15) / 4;
                    let hasil3 = Math.sqrt(total3);
                    stdv3.value = hasil3.toFixed(9);
                    // akar 5
                    let a3 = 5;
                    let b3 = Math.sqrt(a3);
                    akar3.value = b3.toFixed(9);
                    // u
                    let uid3 = parseFloat(stdv3.value) / parseFloat(akar3.value);
                    u3.value = uid3.toFixed(3);
                    // u^
                    let ukuadrat3 = parseFloat(u3.value) ** 2;
                    upangkat3.value = ukuadrat3.toFixed(2);
                    // u std 
                    let c3 = 0.12 ** 2;
                    ustd3.value = c3.toFixed(4);
                    // gab 
                    let gab3 = parseFloat(upangkat3.value) + parseFloat(ustd3.value);
                    let ug3 = Math.sqrt(gab3);
                    ugab3.value = ug3.toFixed(2);


                    // hitungan 4
                    let h16 = hasil.nan46 - hasil.nan47;
                    let h17 = hasil.nan49 - hasil.nan50;
                    let h18 = hasil.nan52 - hasil.nan53;
                    let h19 = hasil.nan55 - hasil.nan56;
                    let h20 = hasil.nan58 - hasil.nan59;
                    nan48.value = h16.toFixed(2);
                    nan51.value = h17.toFixed(2);
                    nan54.value = h18.toFixed(2);
                    nan57.value = h19.toFixed(2);
                    nan60.value = h20.toFixed(2);
                    // standar & koreksi
                    let value7 = hasil.nan46 + hasil.nan49 + hasil.nan52 + hasil.nan55 + hasil.nan58;
                    let mean7 = (value7 / 5);
                    standar4.value = mean7.toFixed(3);
                    let value8 = hasil.nan48 + hasil.nan51 + hasil.nan54 + hasil.nan57 + hasil.nan60;
                    let mean8 = (value8 / 5);
                    koreksi4.value = mean8.toFixed(3);
                    // stdv
                    let dev16 = (hasil.nan46 - mean7) ** 2;
                    let dev17 = (hasil.nan49 - mean7) ** 2;
                    let dev18 = (hasil.nan52 - mean7) ** 2;
                    let dev19 = (hasil.nan55 - mean7) ** 2;
                    let dev20 = (hasil.nan58 - mean7) ** 2;
                    let total4 = (dev16 + dev17 + dev18 + dev19 + dev20) / 4;
                    let hasil4 = Math.sqrt(total4);
                    stdv4.value = hasil4.toFixed(9);
                    // akar 5
                    let a4 = 5;
                    let b4 = Math.sqrt(a4);
                    akar4.value = b4.toFixed(9);
                    // u
                    let uid4 = parseFloat(stdv4.value) / parseFloat(akar4.value);
                    u4.value = uid4.toFixed(3);
                    // u^
                    let ukuadrat4 = parseFloat(u4.value) ** 2;
                    upangkat4.value = ukuadrat4.toFixed(2);
                    // u std 
                    let c4 = 0.12 ** 2;
                    ustd4.value = c4.toFixed(4);
                    // gab 
                    let gab4 = parseFloat(upangkat4.value) + parseFloat(ustd4.value);
                    let ug4 = Math.sqrt(gab4);
                    ugab4.value = ug4.toFixed(2);


                    // hitungan 5
                    let h21 = hasil.nan61 - hasil.nan62;
                    let h22 = hasil.nan64 - hasil.nan65;
                    let h23 = hasil.nan67 - hasil.nan68;
                    let h24 = hasil.nan70 - hasil.nan71;
                    let h25 = hasil.nan73 - hasil.nan74;
                    nan63.value = h21.toFixed(2);
                    nan66.value = h22.toFixed(2);
                    nan69.value = h23.toFixed(2);
                    nan72.value = h24.toFixed(2);
                    nan75.value = h25.toFixed(2);
                    // standar & koreksi
                    let value9 = hasil.nan61 + hasil.nan64 + hasil.nan67 + hasil.nan70 + hasil.nan73;
                    let mean9 = (value9 / 5);
                    standar5.value = mean9.toFixed(3);
                    let value10 = hasil.nan63 + hasil.nan66 + hasil.nan69 + hasil.nan72 + hasil.nan75;
                    let mean10 = (value10 / 5);
                    koreksi5.value = mean10.toFixed(3);
                    // stdv
                    let dev21 = (hasil.nan61 - mean9) ** 2;
                    let dev22 = (hasil.nan64 - mean9) ** 2;
                    let dev23 = (hasil.nan67 - mean9) ** 2;
                    let dev24 = (hasil.nan70 - mean9) ** 2;
                    let dev25 = (hasil.nan73 - mean9) ** 2;
                    let total5 = (dev21 + dev22 + dev23 + dev24 + dev25) / 4;
                    let hasil5 = Math.sqrt(total5);
                    stdv5.value = hasil5.toFixed(9);
                    // akar 5
                    let a5 = 5;
                    let b5 = Math.sqrt(a5);
                    akar5.value = b5.toFixed(9);
                    // u
                    let uid5 = parseFloat(stdv5.value) / parseFloat(akar5.value);
                    u5.value = uid5.toFixed(3);
                    // u^
                    let ukuadrat5 = parseFloat(u5.value) ** 2;
                    upangkat5.value = ukuadrat5.toFixed(2);
                    // u std 
                    let c5 = 0.12 ** 2;
                    ustd5.value = c5.toFixed(4);
                    // gab 
                    let gab5 = parseFloat(upangkat5.value) + parseFloat(ustd5.value);
                    let ug5 = Math.sqrt(gab5);
                    ugab5.value = ug5.toFixed(2);


                    // hitungan 6
                    let h36 = hasil.nan76 - hasil.nan77;
                    let h37 = hasil.nan79 - hasil.nan80;
                    let h38 = hasil.nan82 - hasil.nan83;
                    let h39 = hasil.nan85 - hasil.nan86;
                    let h40 = hasil.nan88 - hasil.nan89;
                    nan78.value = h36.toFixed(2);
                    nan81.value = h37.toFixed(2);
                    nan84.value = h38.toFixed(2);
                    nan87.value = h39.toFixed(2);
                    nan90.value = h40.toFixed(2);
                    // standar & koreksi
                    let value11 = hasil.nan76 + hasil.nan79 + hasil.nan82 + hasil.nan85 + hasil.nan88;
                    let mean11 = (value11 / 5);
                    standar6.value = mean11.toFixed(3);
                    let value12 = hasil.nan78 + hasil.nan81 + hasil.nan84 + hasil.nan87 + hasil.nan90;
                    let mean12 = (value12 / 5);
                    koreksi6.value = mean12.toFixed(3);
                    // stdv
                    let dev26 = (hasil.nan76 - mean11) ** 2;
                    let dev27 = (hasil.nan79 - mean11) ** 2;
                    let dev28 = (hasil.nan82 - mean11) ** 2;
                    let dev29 = (hasil.nan85 - mean11) ** 2;
                    let dev30 = (hasil.nan88 - mean11) ** 2;
                    let total6 = (dev26 + dev27 + dev28 + dev29 + dev30) / 4;
                    let hasil6 = Math.sqrt(total6);
                    stdv6.value = hasil6.toFixed(9);
                    // akar 5
                    let a6 = 5;
                    let b6 = Math.sqrt(a6);
                    akar6.value = b6.toFixed(9);
                    // u
                    let uid6 = parseFloat(stdv6.value) / parseFloat(akar6.value);
                    u6.value = uid6.toFixed(3);
                    // u^
                    let ukuadrat6 = parseFloat(u6.value) ** 2;
                    upangkat6.value = ukuadrat6.toFixed(2);
                    // u std 
                    let c6 = 0.12 ** 2;
                    ustd6.value = c6.toFixed(4);
                    // gab 
                    let gab6 = parseFloat(upangkat6.value) + parseFloat(ustd6.value);
                    let ug6 = Math.sqrt(gab6);
                    ugab6.value = ug6.toFixed(2);


                    // hitungan 7
                    let h41 = hasil.nan91 - hasil.nan92;
                    let h42 = hasil.nan94 - hasil.nan95;
                    let h43 = hasil.nan97 - hasil.nan98;
                    let h44 = hasil.nan100 - hasil.nan101;
                    let h45 = hasil.nan103 - hasil.nan104;
                    nan93.value = h41.toFixed(2);
                    nan96.value = h42.toFixed(2);
                    nan99.value = h43.toFixed(2);
                    nan102.value = h44.toFixed(2);
                    nan105.value = h45.toFixed(2);
                    // standar & koreksi
                    let value13 = hasil.nan91 + hasil.nan94 + hasil.nan97 + hasil.nan100 + hasil.nan103;
                    let mean13 = (value13 / 5);
                    standar7.value = mean13.toFixed(3);
                    let value14 = hasil.nan93 + hasil.nan96 + hasil.nan99 + hasil.nan102 + hasil.nan105;
                    let mean14 = (value14 / 5);
                    koreksi7.value = mean14.toFixed(3);
                    // stdv
                    let dev31 = (hasil.nan91 - mean13) ** 2;
                    let dev32 = (hasil.nan94 - mean13) ** 2;
                    let dev33 = (hasil.nan97 - mean13) ** 2;
                    let dev34 = (hasil.nan100 - mean13) ** 2;
                    let dev35 = (hasil.nan103 - mean13) ** 2;
                    let total7 = (dev31 + dev32 + dev33 + dev34 + dev35) / 4;
                    let hasil7 = Math.sqrt(total7);
                    stdv7.value = hasil7.toFixed(9);
                    // akar 5
                    let a7 = 5;
                    let b7 = Math.sqrt(a7);
                    akar7.value = b7.toFixed(9);
                    // u
                    let uid7 = parseFloat(stdv7.value) / parseFloat(akar7.value);
                    u7.value = uid7.toFixed(3);
                    // u^
                    let ukuadrat7 = parseFloat(u7.value) ** 2;
                    upangkat7.value = ukuadrat7.toFixed(2);
                    // u std 
                    let c7 = 0.12 ** 2;
                    ustd7.value = c7.toFixed(4);
                    // gab 
                    let gab7 = parseFloat(upangkat7.value) + parseFloat(ustd7.value);
                    let ug7 = Math.sqrt(gab7);
                    ugab7.value = ug7.toFixed(2);


                    // hitungan 8
                    let h46 = hasil.nan106 - hasil.nan107;
                    let h47 = hasil.nan109 - hasil.nan110;
                    let h48 = hasil.nan112 - hasil.nan113;
                    let h49 = hasil.nan115 - hasil.nan116;
                    let h50 = hasil.nan118 - hasil.nan119;
                    nan108.value = h46.toFixed(2);
                    nan111.value = h47.toFixed(2);
                    nan114.value = h48.toFixed(2);
                    nan117.value = h49.toFixed(2);
                    nan120.value = h50.toFixed(2);
                    // standar & koreksi
                    let value15 = hasil.nan106 + hasil.nan109 + hasil.nan112 + hasil.nan115 + hasil.nan118;
                    let mean15 = (value15 / 5);
                    standar8.value = mean15.toFixed(3);
                    let value16 = hasil.nan108 + hasil.nan111 + hasil.nan114 + hasil.nan117 + hasil.nan120;
                    let mean16 = (value16 / 5);
                    koreksi8.value = mean16.toFixed(3);
                    // stdv
                    let dev36 = (hasil.nan106 - mean15) ** 2;
                    let dev37 = (hasil.nan109 - mean15) ** 2;
                    let dev38 = (hasil.nan112 - mean15) ** 2;
                    let dev39 = (hasil.nan115 - mean15) ** 2;
                    let dev40 = (hasil.nan118 - mean15) ** 2;
                    let total8 = (dev36 + dev37 + dev38 + dev39 + dev40) / 4;
                    let hasil8 = Math.sqrt(total8);
                    stdv8.value = hasil8.toFixed(9);
                    // akar 5
                    let a8 = 5;
                    let b8 = Math.sqrt(a8);
                    akar8.value = b8.toFixed(9);
                    // u
                    let uid8 = parseFloat(stdv8.value) / parseFloat(akar8.value);
                    u8.value = uid8.toFixed(3);
                    // u^
                    let ukuadrat8 = parseFloat(u8.value) ** 2;
                    upangkat8.value = ukuadrat8.toFixed(2);
                    // u std 
                    let c8 = 0.12 ** 2;
                    ustd8.value = c8.toFixed(4);
                    // gab 
                    let gab8 = parseFloat(upangkat8.value) + parseFloat(ustd8.value);
                    let ug8 = Math.sqrt(gab8);
                    ugab8.value = ug8.toFixed(2);


                    // hitungan 9
                    let h51 = hasil.nan121 - hasil.nan122;
                    let h52 = hasil.nan124 - hasil.nan125;
                    let h53 = hasil.nan127 - hasil.nan128;
                    let h54 = hasil.nan130 - hasil.nan131;
                    let h55 = hasil.nan133 - hasil.nan134;
                    nan123.value = h51.toFixed(2);
                    nan126.value = h52.toFixed(2);
                    nan129.value = h53.toFixed(2);
                    nan132.value = h54.toFixed(2);
                    nan135.value = h55.toFixed(2);
                    // standar & koreksi
                    let value17 = hasil.nan121 + hasil.nan124 + hasil.nan127 + hasil.nan130 + hasil.nan133;
                    let mean17 = (value17 / 5);
                    standar9.value = mean17.toFixed(3);
                    let value18 = hasil.nan123 + hasil.nan126 + hasil.nan129 + hasil.nan132 + hasil.nan135;
                    let mean18 = (value18 / 5);
                    koreksi9.value = mean18.toFixed(3);
                    // stdv
                    let dev41 = (hasil.nan121 - mean17) ** 2;
                    let dev42 = (hasil.nan124 - mean17) ** 2;
                    let dev43 = (hasil.nan127 - mean17) ** 2;
                    let dev44 = (hasil.nan130 - mean17) ** 2;
                    let dev45 = (hasil.nan133 - mean17) ** 2;
                    let total9 = (dev41 + dev42 + dev43 + dev44 + dev45) / 4;
                    let hasil9 = Math.sqrt(total9);
                    stdv9.value = hasil9.toFixed(9);
                    // akar 5
                    let a9 = 5;
                    let b9 = Math.sqrt(a9);
                    akar9.value = b9.toFixed(9);
                    // u
                    let uid9 = parseFloat(stdv9.value) / parseFloat(akar9.value);
                    u9.value = uid9.toFixed(3);
                    // u^
                    let ukuadrat9 = parseFloat(u9.value) ** 2;
                    upangkat9.value = ukuadrat9.toFixed(2);
                    // u std 
                    let c9 = 0.12 ** 2;
                    ustd9.value = c9.toFixed(4);
                    // gab 
                    let gab9 = parseFloat(upangkat9.value) + parseFloat(ustd9.value);
                    let ug9 = Math.sqrt(gab9);
                    ugab9.value = ug9.toFixed(2);


                    // hitungan 10
                    let h56 = hasil.nan136 - hasil.nan137;
                    let h57 = hasil.nan139 - hasil.nan140;
                    let h58 = hasil.nan142 - hasil.nan143;
                    let h59 = hasil.nan145 - hasil.nan146;
                    let h60 = hasil.nan148 - hasil.nan149;
                    nan138.value = h56.toFixed(2);
                    nan141.value = h57.toFixed(2);
                    nan144.value = h58.toFixed(2);
                    nan147.value = h59.toFixed(2);
                    nan150.value = h60.toFixed(2);
                    // standar & koreksi
                    let value19 = hasil.nan136 + hasil.nan139 + hasil.nan142 + hasil.nan145 + hasil.nan148;
                    let mean19 = (value19 / 5);
                    standar10.value = mean19.toFixed(3);
                    let value20 = hasil.nan138 + hasil.nan141 + hasil.nan144 + hasil.nan147 + hasil.nan150;
                    let mean20 = (value20 / 5);
                    koreksi10.value = mean20.toFixed(3);
                    // stdv
                    let dev46 = (hasil.nan136 - mean19) ** 2;
                    let dev47 = (hasil.nan139 - mean19) ** 2;
                    let dev48 = (hasil.nan142 - mean19) ** 2;
                    let dev49 = (hasil.nan145 - mean19) ** 2;
                    let dev50 = (hasil.nan148 - mean19) ** 2;
                    let total10 = (dev46 + dev47 + dev48 + dev49 + dev50) / 4;
                    let hasil10 = Math.sqrt(total10);
                    stdv10.value = hasil10.toFixed(9);
                    // akar 5
                    let a10 = 5;
                    let b10 = Math.sqrt(a10);
                    akar10.value = b10.toFixed(9);
                    // u
                    let uid10 = parseFloat(stdv10.value) / parseFloat(akar10.value);
                    u10.value = uid10.toFixed(3);
                    // u^
                    let ukuadrat10 = parseFloat(u10.value) ** 2;
                    upangkat10.value = ukuadrat10.toFixed(2);
                    // u std 
                    let c10 = 0.12 ** 2;
                    ustd10.value = c10.toFixed(4);
                    // gab 
                    let gab10 = parseFloat(upangkat10.value) + parseFloat(ustd10.value);
                    let ug10 = Math.sqrt(gab10);
                    ugab10.value = ug10.toFixed(2);


                    // hitungan 11
                    let h61 = hasil.nan151 - hasil.nan152;
                    let h62 = hasil.nan154 - hasil.nan155;
                    let h63 = hasil.nan157 - hasil.nan158;
                    let h64 = hasil.nan160 - hasil.nan161;
                    let h65 = hasil.nan163 - hasil.nan164;
                    nan153.value = h61.toFixed(2);
                    nan156.value = h62.toFixed(2);
                    nan159.value = h63.toFixed(2);
                    nan162.value = h64.toFixed(2);
                    nan165.value = h65.toFixed(2);
                    // standar & koreksi
                    let value21 = hasil.nan151 + hasil.nan154 + hasil.nan157 + hasil.nan160 + hasil.nan163;
                    let mean21 = (value21 / 5);
                    standar11.value = mean21.toFixed(3);
                    let value22 = hasil.nan153 + hasil.nan156 + hasil.nan159 + hasil.nan162 + hasil.nan165;
                    let mean22 = (value22 / 5);
                    koreksi11.value = mean22.toFixed(3);
                    // stdv
                    let dev51 = (hasil.nan151 - mean21) ** 2;
                    let dev52 = (hasil.nan154 - mean21) ** 2;
                    let dev53 = (hasil.nan157 - mean21) ** 2;
                    let dev54 = (hasil.nan160 - mean21) ** 2;
                    let dev55 = (hasil.nan163 - mean21) ** 2;
                    let total11 = (dev51 + dev52 + dev53 + dev54 + dev55) / 4;
                    let hasil11 = Math.sqrt(total11);
                    stdv11.value = hasil11.toFixed(9);
                    // akar 5
                    let a11 = 5;
                    let b11 = Math.sqrt(a11);
                    akar11.value = b11.toFixed(9);
                    // u
                    let uid11 = parseFloat(stdv11.value) / parseFloat(akar11.value);
                    u11.value = uid11.toFixed(3);
                    // u^
                    let ukuadrat11 = parseFloat(u11.value) ** 2;
                    upangkat11.value = ukuadrat11.toFixed(2);
                    // u std 
                    let c11 = 0.12 ** 2;
                    ustd11.value = c11.toFixed(4);
                    // gab 
                    let gab11 = parseFloat(upangkat11.value) + parseFloat(ustd11.value);
                    let ug11 = Math.sqrt(gab11);
                    ugab11.value = ug11.toFixed(2);


                    // hitungan 12
                    let h66 = hasil.nan166 - hasil.nan167;
                    let h67 = hasil.nan169 - hasil.nan170;
                    let h68 = hasil.nan172 - hasil.nan173;
                    let h69 = hasil.nan175 - hasil.nan176;
                    let h70 = hasil.nan178 - hasil.nan179;
                    nan168.value = h66.toFixed(2);
                    nan171.value = h67.toFixed(2);
                    nan174.value = h68.toFixed(2);
                    nan177.value = h69.toFixed(2);
                    nan180.value = h70.toFixed(2);
                    // standar & koreksi
                    let value23 = hasil.nan166 + hasil.nan169 + hasil.nan172 + hasil.nan175 + hasil.nan178;
                    let mean23 = (value23 / 5);
                    standar12.value = mean23.toFixed(3);
                    let value24 = hasil.nan168 + hasil.nan171 + hasil.nan174 + hasil.nan177 + hasil.nan180;
                    let mean24 = (value24 / 5);
                    koreksi12.value = mean24.toFixed(3);
                    // stdv
                    let dev56 = (hasil.nan166 - mean23) ** 2;
                    let dev57 = (hasil.nan169 - mean23) ** 2;
                    let dev58 = (hasil.nan172 - mean23) ** 2;
                    let dev59 = (hasil.nan175 - mean23) ** 2;
                    let dev60 = (hasil.nan178 - mean23) ** 2;
                    let total12 = (dev56 + dev57 + dev58 + dev59 + dev60) / 4;
                    let hasil12 = Math.sqrt(total12);
                    stdv12.value = hasil12.toFixed(9);
                    // akar 5
                    let a12 = 5;
                    let b12 = Math.sqrt(a12);
                    akar12.value = b12.toFixed(9);
                    // u
                    let uid12 = parseFloat(stdv12.value) / parseFloat(akar12.value);
                    u12.value = uid12.toFixed(3);
                    // u^
                    let ukuadrat12 = parseFloat(u12.value) ** 2;
                    upangkat12.value = ukuadrat12.toFixed(2);
                    // u std 
                    let c12 = 0.12 ** 2;
                    ustd12.value = c12.toFixed(4);
                    // gab 
                    let gab12 = parseFloat(upangkat12.value) + parseFloat(ustd12.value);
                    let ug12 = Math.sqrt(gab12);
                    ugab12.value = ug12.toFixed(2);


                    // hitungan 13
                    let h71 = hasil.nan181 - hasil.nan182;
                    let h72 = hasil.nan184 - hasil.nan185;
                    let h73 = hasil.nan187 - hasil.nan188;
                    let h74 = hasil.nan190 - hasil.nan191;
                    let h75 = hasil.nan193 - hasil.nan194;
                    nan183.value = h71.toFixed(2);
                    nan186.value = h72.toFixed(2);
                    nan189.value = h73.toFixed(2);
                    nan192.value = h74.toFixed(2);
                    nan195.value = h75.toFixed(2);
                    // standar & koreksi
                    let value25 = hasil.nan181 + hasil.nan184 + hasil.nan187 + hasil.nan190 + hasil.nan193;
                    let mean25 = (value25 / 5);
                    standar13.value = mean25.toFixed(3);
                    let value26 = hasil.nan183 + hasil.nan186 + hasil.nan189 + hasil.nan192 + hasil.nan195;
                    let mean26 = (value26 / 5);
                    koreksi13.value = mean26.toFixed(3);
                    // stdv
                    let dev61 = (hasil.nan181 - mean25) ** 2;
                    let dev62 = (hasil.nan184 - mean25) ** 2;
                    let dev63 = (hasil.nan187 - mean25) ** 2;
                    let dev64 = (hasil.nan190 - mean25) ** 2;
                    let dev65 = (hasil.nan193 - mean25) ** 2;
                    let total13 = (dev61 + dev62 + dev63 + dev64 + dev65) / 4;
                    let hasil13 = Math.sqrt(total13);
                    stdv13.value = hasil13.toFixed(9);
                    // akar 5
                    let a13 = 5;
                    let b13 = Math.sqrt(a13);
                    akar13.value = b13.toFixed(9);
                    // u
                    let uid13 = parseFloat(stdv13.value) / parseFloat(akar13.value);
                    u13.value = uid13.toFixed(3);
                    // u^
                    let ukuadrat13 = parseFloat(u13.value) ** 2;
                    upangkat13.value = ukuadrat13.toFixed(2);
                    // u std 
                    let c13 = 0.12 ** 2;
                    ustd13.value = c13.toFixed(4);
                    // gab 
                    let gab13 = parseFloat(upangkat13.value) + parseFloat(ustd13.value);
                    let ug13 = Math.sqrt(gab13);
                    ugab13.value = ug13.toFixed(2);


                    // hitungan 14
                    let h76 = hasil.nan196 - hasil.nan197;
                    let h77 = hasil.nan199 - hasil.nan200;
                    let h78 = hasil.nan202 - hasil.nan203;
                    let h79 = hasil.nan205 - hasil.nan206;
                    let h80 = hasil.nan208 - hasil.nan209;
                    nan198.value = h76.toFixed(2);
                    nan201.value = h77.toFixed(2);
                    nan204.value = h78.toFixed(2);
                    nan207.value = h79.toFixed(2);
                    nan210.value = h80.toFixed(2);
                    // standar & koreksi
                    let value27 = hasil.nan196 + hasil.nan199 + hasil.nan202 + hasil.nan205 + hasil.nan208;
                    let mean27 = (value27 / 5);
                    standar14.value = mean27.toFixed(3);
                    let value28 = hasil.nan198 + hasil.nan201 + hasil.nan204 + hasil.nan207 + hasil.nan210;
                    let mean28 = (value28 / 5);
                    koreksi14.value = mean28.toFixed(3);
                    // stdv
                    let dev66 = (hasil.nan196 - mean27) ** 2;
                    let dev67 = (hasil.nan199 - mean27) ** 2;
                    let dev68 = (hasil.nan202 - mean27) ** 2;
                    let dev69 = (hasil.nan205 - mean27) ** 2;
                    let dev70 = (hasil.nan208 - mean27) ** 2;
                    let total14 = (dev66 + dev67 + dev68 + dev69 + dev70) / 4;
                    let hasil14 = Math.sqrt(total14);
                    stdv14.value = hasil14.toFixed(9);
                    // akar 5
                    let a14 = 5;
                    let b14 = Math.sqrt(a14);
                    akar14.value = b14.toFixed(9);
                    // u
                    let uid14 = parseFloat(stdv14.value) / parseFloat(akar14.value);
                    u14.value = uid14.toFixed(3);
                    // u^
                    let ukuadrat14 = parseFloat(u14.value) ** 2;
                    upangkat14.value = ukuadrat14.toFixed(2);
                    // u std 
                    let c14 = 0.12 ** 2;
                    ustd14.value = c14.toFixed(4);
                    // gab 
                    let gab14 = parseFloat(upangkat14.value) + parseFloat(ustd14.value);
                    let ug14 = Math.sqrt(gab14);
                    ugab14.value = ug14.toFixed(2);


                    // hitungan 15
                    let h81 = hasil.nan211 - hasil.nan212;
                    let h82 = hasil.nan214 - hasil.nan215;
                    let h83 = hasil.nan217 - hasil.nan218;
                    let h84 = hasil.nan220 - hasil.nan221;
                    let h85 = hasil.nan223 - hasil.nan224;
                    nan213.value = h81.toFixed(2);
                    nan216.value = h82.toFixed(2);
                    nan219.value = h83.toFixed(2);
                    nan222.value = h84.toFixed(2);
                    nan225.value = h85.toFixed(2);
                    // standar & koreksi
                    let value29 = hasil.nan211 + hasil.nan214 + hasil.nan217 + hasil.nan220 + hasil.nan223;
                    let mean29 = (value29 / 5);
                    standar15.value = mean29.toFixed(3);
                    let value30 = hasil.nan213 + hasil.nan216 + hasil.nan219 + hasil.nan222 + hasil.nan225;
                    let mean30 = (value30 / 5);
                    koreksi15.value = mean30.toFixed(3);
                    // stdv
                    let dev71 = (hasil.nan211 - mean29) ** 2;
                    let dev72 = (hasil.nan214 - mean29) ** 2;
                    let dev73 = (hasil.nan217 - mean29) ** 2;
                    let dev74 = (hasil.nan220 - mean29) ** 2;
                    let dev75 = (hasil.nan223 - mean29) ** 2;
                    let total15 = (dev71 + dev72 + dev73 + dev74 + dev75) / 4;
                    let hasil15 = Math.sqrt(total15);
                    stdv15.value = hasil15.toFixed(9);
                    // akar 5
                    let a15 = 5;
                    let b15 = Math.sqrt(a15);
                    akar15.value = b15.toFixed(9);
                    // u
                    let uid15 = parseFloat(stdv15.value) / parseFloat(akar15.value);
                    u15.value = uid15.toFixed(3);
                    // u^
                    let ukuadrat15 = parseFloat(u15.value) ** 2;
                    upangkat15.value = ukuadrat15.toFixed(2);
                    // u std 
                    let c15 = 0.12 ** 2;
                    ustd15.value = c15.toFixed(4);
                    // gab 
                    let gab15 = parseFloat(upangkat15.value) + parseFloat(ustd15.value);
                    let ug15 = Math.sqrt(gab15);
                    ugab15.value = ug15.toFixed(2);


                    // hitungan 16
                    let h86 = hasil.nan226 - hasil.nan227;
                    let h87 = hasil.nan229 - hasil.nan230;
                    let h88 = hasil.nan232 - hasil.nan233;
                    let h89 = hasil.nan235 - hasil.nan236;
                    let h90 = hasil.nan238 - hasil.nan239;
                    nan228.value = h86.toFixed(2);
                    nan231.value = h87.toFixed(2);
                    nan234.value = h88.toFixed(2);
                    nan237.value = h89.toFixed(2);
                    nan240.value = h90.toFixed(2);
                    // standar & koreksi
                    let value31 = hasil.nan226 + hasil.nan229 + hasil.nan232 + hasil.nan235 + hasil.nan238;
                    let mean31 = (value31 / 5);
                    standar16.value = mean31.toFixed(3);
                    let value32 = hasil.nan228 + hasil.nan231 + hasil.nan234 + hasil.nan237 + hasil.nan240;
                    let mean32 = (value32 / 5);
                    koreksi16.value = mean32.toFixed(3);
                    // stdv
                    let dev76 = (hasil.nan226 - mean31) ** 2;
                    let dev77 = (hasil.nan229 - mean31) ** 2;
                    let dev78 = (hasil.nan232 - mean31) ** 2;
                    let dev79 = (hasil.nan235 - mean31) ** 2;
                    let dev80 = (hasil.nan238 - mean31) ** 2;
                    let total16 = (dev76 + dev77 + dev78 + dev79 + dev80) / 4;
                    let hasil16 = Math.sqrt(total16);
                    stdv16.value = hasil16.toFixed(9);
                    // akar 5
                    let a16 = 5;
                    let b16 = Math.sqrt(a16);
                    akar16.value = b16.toFixed(9);
                    // u
                    let uid16 = parseFloat(stdv16.value) / parseFloat(akar16.value);
                    u16.value = uid16.toFixed(3);
                    // u^
                    let ukuadrat16 = parseFloat(u16.value) ** 2;
                    upangkat16.value = ukuadrat16.toFixed(2);
                    // u std 
                    let c16 = 0.12 ** 2;
                    ustd16.value = c16.toFixed(4);
                    // gab 
                    let gab16 = parseFloat(upangkat16.value) + parseFloat(ustd16.value);
                    let ug16 = Math.sqrt(gab16);
                    ugab16.value = ug16.toFixed(2);


                    // hitungan 17
                    let h91 = hasil.nan241 - hasil.nan242;
                    let h92 = hasil.nan244 - hasil.nan245;
                    let h93 = hasil.nan247 - hasil.nan248;
                    let h94 = hasil.nan250 - hasil.nan251;
                    let h95 = hasil.nan253 - hasil.nan254;
                    nan243.value = h91.toFixed(2);
                    nan246.value = h92.toFixed(2);
                    nan249.value = h93.toFixed(2);
                    nan252.value = h94.toFixed(2);
                    nan255.value = h95.toFixed(2);
                    // standar & koreksi
                    let value33 = hasil.nan241 + hasil.nan244 + hasil.nan247 + hasil.nan250 + hasil.nan253;
                    let mean33 = (value33 / 5);
                    standar17.value = mean33.toFixed(3);
                    let value34 = hasil.nan243 + hasil.nan246 + hasil.nan249 + hasil.nan252 + hasil.nan255;
                    let mean34 = (value34 / 5);
                    koreksi17.value = mean34.toFixed(3);
                    // stdv
                    let dev81 = (hasil.nan241 - mean33) ** 2;
                    let dev82 = (hasil.nan244 - mean33) ** 2;
                    let dev83 = (hasil.nan247 - mean33) ** 2;
                    let dev84 = (hasil.nan250 - mean33) ** 2;
                    let dev85 = (hasil.nan253 - mean33) ** 2;
                    let total17 = (dev81 + dev82 + dev83 + dev84 + dev85) / 4;
                    let hasil17 = Math.sqrt(total17);
                    stdv17.value = hasil17.toFixed(9);
                    // akar 5
                    let a17 = 5;
                    let b17 = Math.sqrt(a17);
                    akar17.value = b17.toFixed(9);
                    // u
                    let uid17 = parseFloat(stdv17.value) / parseFloat(akar17.value);
                    u17.value = uid17.toFixed(3);
                    // u^
                    let ukuadrat17 = parseFloat(u17.value) ** 2;
                    upangkat17.value = ukuadrat17.toFixed(2);
                    // u std 
                    let c17 = 0.12 ** 2;
                    ustd17.value = c17.toFixed(4);
                    // gab 
                    let gab17 = parseFloat(upangkat17.value) + parseFloat(ustd17.value);
                    let ug17 = Math.sqrt(gab17);
                    ugab17.value = ug17.toFixed(2);


                    // hitungan 18
                    let h96 = hasil.nan256 - hasil.nan257;
                    let h97 = hasil.nan259 - hasil.nan260;
                    let h98 = hasil.nan262 - hasil.nan263;
                    let h99 = hasil.nan265 - hasil.nan266;
                    let h100 = hasil.nan268 - hasil.nan269;
                    nan258.value = h96.toFixed(2);
                    nan261.value = h97.toFixed(2);
                    nan264.value = h98.toFixed(2);
                    nan267.value = h99.toFixed(2);
                    nan270.value = h100.toFixed(2);
                    // standar & koreksi
                    let value35 = hasil.nan256 + hasil.nan259 + hasil.nan262 + hasil.nan265 + hasil.nan268;
                    let mean35 = (value35 / 5);
                    standar18.value = mean35.toFixed(3);
                    let value36 = hasil.nan258 + hasil.nan261 + hasil.nan264 + hasil.nan267 + hasil.nan270;
                    let mean36 = (value36 / 5);
                    koreksi18.value = mean36.toFixed(3);
                    // stdv
                    let dev86 = (hasil.nan256 - mean35) ** 2;
                    let dev87 = (hasil.nan259 - mean35) ** 2;
                    let dev88 = (hasil.nan262 - mean35) ** 2;
                    let dev89 = (hasil.nan265 - mean35) ** 2;
                    let dev90 = (hasil.nan268 - mean35) ** 2;
                    let total18 = (dev86 + dev87 + dev88 + dev89 + dev90) / 4;
                    let hasil18 = Math.sqrt(total18);
                    stdv18.value = hasil18.toFixed(9);
                    // akar 5
                    let a18 = 5;
                    let b18 = Math.sqrt(a18);
                    akar18.value = b18.toFixed(9);
                    // u
                    let uid18 = parseFloat(stdv18.value) / parseFloat(akar18.value);
                    u18.value = uid18.toFixed(3);
                    // u^
                    let ukuadrat18 = parseFloat(u18.value) ** 2;
                    upangkat18.value = ukuadrat18.toFixed(2);
                    // u std 
                    let c18 = 0.12 ** 2;
                    ustd18.value = c18.toFixed(4);
                    // gab 
                    let gab18 = parseFloat(upangkat18.value) + parseFloat(ustd18.value);
                    let ug18 = Math.sqrt(gab18);
                    ugab18.value = ug18.toFixed(2);


                    // hitungan 19
                    let h101 = hasil.nan271 - hasil.nan272;
                    let h102 = hasil.nan274 - hasil.nan275;
                    let h103 = hasil.nan277 - hasil.nan278;
                    let h104 = hasil.nan280 - hasil.nan281;
                    let h105 = hasil.nan283 - hasil.nan284;
                    nan273.value = h101.toFixed(2);
                    nan276.value = h102.toFixed(2);
                    nan279.value = h103.toFixed(2);
                    nan282.value = h104.toFixed(2);
                    nan285.value = h105.toFixed(2);
                    // standar & koreksi
                    let value37 = hasil.nan271 + hasil.nan274 + hasil.nan277 + hasil.nan280 + hasil.nan283;
                    let mean37 = (value37 / 5);
                    standar19.value = mean37.toFixed(3);
                    let value38 = hasil.nan273 + hasil.nan276 + hasil.nan279 + hasil.nan282 + hasil.nan285;
                    let mean38 = (value38 / 5);
                    koreksi19.value = mean38.toFixed(3);
                    // stdv
                    let dev91 = (hasil.nan271 - mean37) ** 2;
                    let dev92 = (hasil.nan274 - mean37) ** 2;
                    let dev93 = (hasil.nan277 - mean37) ** 2;
                    let dev94 = (hasil.nan280 - mean37) ** 2;
                    let dev95 = (hasil.nan283 - mean37) ** 2;
                    let total19 = (dev91 + dev92 + dev93 + dev94 + dev95) / 4;
                    let hasil19 = Math.sqrt(total19);
                    stdv19.value = hasil19.toFixed(9);
                    // akar 5
                    let a19 = 5;
                    let b19 = Math.sqrt(a19);
                    akar19.value = b19.toFixed(9);
                    // u
                    let uid19 = parseFloat(stdv19.value) / parseFloat(akar19.value);
                    u19.value = uid19.toFixed(3);
                    // u^
                    let ukuadrat19 = parseFloat(u19.value) ** 2;
                    upangkat19.value = ukuadrat19.toFixed(2);
                    // u std 
                    let c19 = 0.12 ** 2;
                    ustd19.value = c19.toFixed(4);
                    // gab 
                    let gab19 = parseFloat(upangkat19.value) + parseFloat(ustd19.value);
                    let ug19 = Math.sqrt(gab19);
                    ugab19.value = ug19.toFixed(2);

                    
                    // hitungan 20
                    let h106 = hasil.nan286 - hasil.nan287;
                    let h107 = hasil.nan289 - hasil.nan290;
                    let h108 = hasil.nan292 - hasil.nan293;
                    let h109 = hasil.nan295 - hasil.nan296;
                    let h110 = hasil.nan298 - hasil.nan299;
                    nan288.value = h106.toFixed(2);
                    nan291.value = h107.toFixed(2);
                    nan294.value = h108.toFixed(2);
                    nan297.value = h109.toFixed(2);
                    nan300.value = h110.toFixed(2);
                    // standar & koreksi
                    let value39 = hasil.nan286 + hasil.nan289 + hasil.nan292 + hasil.nan295 + hasil.nan298;
                    let mean39 = (value39 / 5);
                    standar20.value = mean39.toFixed(3);
                    let value40 = hasil.nan288 + hasil.nan291 + hasil.nan294 + hasil.nan297 + hasil.nan300;
                    let mean40 = (value40 / 5);
                    koreksi20.value = mean40.toFixed(3);
                    // stdv
                    let dev96 = (hasil.nan286 - mean39) ** 2;
                    let dev97 = (hasil.nan289 - mean39) ** 2;
                    let dev98 = (hasil.nan292 - mean39) ** 2;
                    let dev99 = (hasil.nan295 - mean39) ** 2;
                    let dev100 = (hasil.nan298 - mean39) ** 2;
                    let total20 = (dev96 + dev97 + dev98 + dev99 + dev100) / 4;
                    let hasil20 = Math.sqrt(total20);
                    stdv20.value = hasil20.toFixed(9);
                    // akar 5
                    let a20 = 5;
                    let b20 = Math.sqrt(a20);
                    akar20.value = b20.toFixed(9);
                    // u
                    let uid20 = parseFloat(stdv20.value) / parseFloat(akar20.value);
                    u20.value = uid20.toFixed(3);
                    // u^
                    let ukuadrat20 = parseFloat(u20.value) ** 2;
                    upangkat20.value = ukuadrat20.toFixed(2);
                    // u std 
                    let c20 = 0.12 ** 2;
                    ustd20.value = c20.toFixed(4);
                    // gab 
                    let gab20 = parseFloat(upangkat20.value) + parseFloat(ustd20.value);
                    let ug20 = Math.sqrt(gab20);
                    ugab20.value = ug20.toFixed(2);
                }
            </script>
    <script src="../../../components/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../components/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>