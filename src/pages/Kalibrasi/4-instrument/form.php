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
    <title>form-instrument</title>

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
        .counts {
            display: flex;
            gap : 10px;
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
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="instrument.php">> INSTRUMENT</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href=" form.php">> FORM-INSTRUMENT</a>
                </div>
            </div>
            <div class="page">
                <br>
                <form style="margin-top: 30px;" id="inputForm" class="inputForm" action="../../../system/instrument/send_email.php" method="POST">
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
                                    <td><input class="border input-h dray" id="tanggal_kalibrasi2" name="tanggal_kalibrasi2" type="date"></td>
                                </tr>
                                <tr>
                                    <td>Tgl. Kalibrasi Ulang</td>
                                    <td>:</td>
                                    <td><input class="border input-h dray" id="tanggal_kalibrasi_ulang2" name="tanggal_kalibrasi_ulang2" type="date"></td>
                                </tr>
                                <tr>
                                    <td>Metode Kalibrasi</td>
                                    <td>:</td>
                                    <td><span>Didopsi dari : "The Expression of <br> Uncertainty and Confidence in <br> Measurement" </span></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Oleh UKAS (United Kingdom <br> Accreditation Service) M3003, Edition <br> 3, November 2012</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="btnfit">
                        <div>
                            <button type="button" class="btn btn-outline-secondary" id="Button-A" onclick="visibility1()">Data Kalibrasi</button>
                            <button type="button" class="btn btn-outline-secondary" id="Button-C" onclick="visibility3()">Simpan</button>
                        </div>
                    </div>
                    <br>
                    <div id="forminput" class="naik">
                        <table>
                            <tr>
                                <td class="border gryn">Titik Kalibrasi</td>
                                <td></td>
                                <td class="border gryn">Master No</td>
                                <td class="border gryn">Nilai Master</td>
                                <td class="border gryn">Avg Pembacaan</td>
                                <td class="border gryn">Correction</td>
                                <td></td>
                                <td class="border gryn">Ketidakpastian</td>
                            </tr>
                            <tr>
                                <td class="border"><input type="text" name="titikKalibrasi1" id="titikKalibrasi1"></td>
                                <td><input type="text" readonly></td>
                                <td class="border">1</td>
                                <td class="border"><input type="text" name="valueMaster1" id="valueMaster1"></td>
                                <td class="border"><input type="text" name="avgPembacaan1" id="avgPembacaan1"></td>
                                <td class="border"><input type="text" name="correction1" id="correction1"></td>
                                <td><input type="text" readonly></td>
                                <td class="border"><input type="text" name="ketidakpastian1" id="ketidakpastian1"></td>
                            </tr>
                            <tr>
                                <td class="border"><input type="text" name="titikKalibrasi2" id="titikKalibrasi2"></td>
                                <td><input type="text" readonly></td>
                                <td class="border">2</td>
                                <td class="border"><input type="text" name="valueMaster2" id="valueMaster2"></td>
                                <td class="border"><input type="text" name="avgPembacaan2" id="avgPembacaan2"></td>
                                <td class="border"><input type="text" name="correction2" id="correction2"></td>
                            </tr>
                            <tr>
                                <td class="border"><input type="text" name="titikKalibrasi3" id="titikKalibrasi3"></td>
                                <td><input type="text" readonly></td>
                                <td class="border">3</td>
                                <td class="border"><input type="text" name="valueMaster3" id="valueMaster3"></td>
                                <td class="border"><input type="text" name="avgPembacaan3" id="avgPembacaan3"></td>
                                <td class="border"><input type="text" name="correction3" id="correction3"></td>
                            </tr>
                            <tr>
                                <td class="border"><input type="text" name="titikKalibrasi4" id="titikKalibrasi4"></td>
                                <td><input type="text" readonly></td>
                                <td class="border">4</td>
                                <td class="border"><input type="text" name="valueMaster4" id="valueMaster4"></td>
                                <td class="border"><input type="text" name="avgPembacaan4" id="avgPembacaan4"></td>
                                <td class="border"><input type="text" name="correction4" id="correction4"></td>
                            </tr>
                            <tr>
                                <td class="border"><input type="text" name="titikKalibrasi5" id="titikKalibrasi5"></td>
                                <td><input type="text" readonly></td>
                                <td class="border">5</td>
                                <td class="border"><input type="text" name="valueMaster5" id="valueMaster5"></td>
                                <td class="border"><input type="text" name="avgPembacaan5" id="avgPembacaan5"></td>
                                <td class="border"><input type="text" name="correction5" id="correction5"></td>
                            </tr>
                        </table>
                        <br>
                        <div class="counts">
                            <table>
                                <tr>
                                    <td class="border gryn">N</td>
                                    <td class="border gryn">Nilai Master</td>
                                    <td class="border gryn">Nilai Pembacaan</td>
                                </tr>
                                <tr>
                                    <td class="border">1</td>
                                    <td class="border"><input type="text" name="nan1" id="nan1"></td>
                                    <td class="border"><input type="text" name="nan2" id="nan2"></td>
                                </tr>
                                <tr>
                                    <td class="border">2</td>
                                    <td class="border"><input type="text" name="nan3" id="nan3"></td>
                                    <td class="border"><input type="text" name="nan4" id="nan4"></td>
                                </tr>
                                <tr>
                                    <td class="border">3</td>
                                    <td class="border"><input type="text" name="nan5" id="nan5"></td>
                                    <td class="border"><input type="text" name="nan6" id="nan6"></td>
                                </tr>
                                <tr>
                                    <td class="border">4</td>
                                    <td class="border"><input type="text" name="nan7" id="nan7"></td>
                                    <td class="border"><input type="text" name="nan8" id="nan8"></td>
                                </tr>
                                <tr>
                                    <td class="border">5</td>
                                    <td class="border"><input type="text" name="nan9" id="nan9"></td>
                                    <td class="border"><input type="text" name="nan10" id="nan10"></td>
                                </tr>
                                <tr>
                                    <td class="border" colspan="2">Average</td>
                                    <td class="border"><input type="text" name="average1" id="average1"></td>
                                </tr>
                                <tr>
                                    <td class="border" colspan="2">Stdev</td>
                                    <td class="border"><input type="text" name="stdev1" id="stdev1"></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="border gryn">N</td>
                                    <td class="border gryn">Nilai Master</td>
                                    <td class="border gryn">Nilai Pembacaan</td>
                                </tr>
                                <tr>
                                    <td class="border">1</td>
                                    <td class="border"><input type="text" name="bac1" id="bac1"></td>
                                    <td class="border"><input type="text" name="bac2" id="bac2"></td>
                                </tr>
                                <tr>
                                    <td class="border">2</td>
                                    <td class="border"><input type="text" name="bac3" id="bac3"></td>
                                    <td class="border"><input type="text" name="bac4" id="bac4"></td>
                                </tr>
                                <tr>
                                    <td class="border">3</td>
                                    <td class="border"><input type="text" name="bac5" id="bac5"></td>
                                    <td class="border"><input type="text" name="bac6" id="bac6"></td>
                                </tr>
                                <tr>
                                    <td class="border">4</td>
                                    <td class="border"><input type="text" name="bac7" id="bac7"></td>
                                    <td class="border"><input type="text" name="bac8" id="bac8"></td>
                                </tr>
                                <tr>
                                    <td class="border">5</td>
                                    <td class="border"><input type="text" name="bac9" id="bac9"></td>
                                    <td class="border"><input type="text" name="bac10" id="bac10"></td>
                                </tr>
                                <tr>
                                    <td class="border" colspan="2">Average</td>
                                    <td class="border"><input type="text" name="average2" id="average2"></td>
                                </tr>
                                <tr>
                                    <td class="border" colspan="2">Stdev</td>
                                    <td class="border"><input type="text" name="stdev2" id="stdev2"></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="border gryn">N</td>
                                    <td class="border gryn">Nilai Master</td>
                                    <td class="border gryn">Nilai Pembacaan</td>
                                </tr>
                                <tr>
                                    <td class="border">1</td>
                                    <td class="border"><input type="text" name="ves1" id="ves1"></td>
                                    <td class="border"><input type="text" name="ves2" id="ves2"></td>
                                </tr>
                                <tr>
                                    <td class="border">2</td>
                                    <td class="border"><input type="text" name="ves3" id="ves3"></td>
                                    <td class="border"><input type="text" name="ves4" id="ves4"></td>
                                </tr>
                                <tr>
                                    <td class="border">3</td>
                                    <td class="border"><input type="text" name="ves5" id="ves5"></td>
                                    <td class="border"><input type="text" name="ves6" id="ves6"></td>
                                </tr>
                                <tr>
                                    <td class="border">4</td>
                                    <td class="border"><input type="text" name="ves7" id="ves7"></td>
                                    <td class="border"><input type="text" name="ves8" id="ves8"></td>
                                </tr>
                                <tr>
                                    <td class="border">5</td>
                                    <td class="border"><input type="text" name="ves9" id="ves9"></td>
                                    <td class="border"><input type="text" name="ves10" id="ves10"></td>
                                </tr>
                                <tr>
                                    <td class="border" colspan="2">Average</td>
                                    <td class="border"><input type="text" name="average3" id="average3"></td>
                                </tr>
                                <tr>
                                    <td class="border" colspan="2">Stdev</td>
                                    <td class="border"><input type="text" name="stdev3" id="stdev3"></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="border gryn">N</td>
                                    <td class="border gryn">Nilai Master</td>
                                    <td class="border gryn">Nilai Pembacaan</td>
                                </tr>
                                <tr>
                                    <td class="border">1</td>
                                    <td class="border"><input type="text" name="fas1" id="fas1"></td>
                                    <td class="border"><input type="text" name="fas2" id="fas2"></td>
                                </tr>
                                <tr>
                                    <td class="border">2</td>
                                    <td class="border"><input type="text" name="fas3" id="fas3"></td>
                                    <td class="border"><input type="text" name="fas4" id="fas4"></td>
                                </tr>
                                <tr>
                                    <td class="border">3</td>
                                    <td class="border"><input type="text" name="fas5" id="fas5"></td>
                                    <td class="border"><input type="text" name="fas6" id="fas6"></td>
                                </tr>
                                <tr>
                                    <td class="border">4</td>
                                    <td class="border"><input type="text" name="fas7" id="fas7"></td>
                                    <td class="border"><input type="text" name="fas8" id="fas8"></td>
                                </tr>
                                <tr>
                                    <td class="border">5</td>
                                    <td class="border"><input type="text" name="fas9" id="fas9"></td>
                                    <td class="border"><input type="text" name="fas10" id="fas10"></td>
                                </tr>
                                <tr>
                                    <td class="border" colspan="2">Average</td>
                                    <td class="border"><input type="text" name="average4" id="average4"></td>
                                </tr>
                                <tr>
                                    <td class="border" colspan="2">Stdev</td>
                                    <td class="border"><input type="text" name="stdev4" id="stdev4"></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="border gryn">N</td>
                                    <td class="border gryn">Nilai Master</td>
                                    <td class="border gryn">Nilai Pembacaan</td>
                                </tr>
                                <tr>
                                    <td class="border">1</td>
                                    <td class="border"><input type="text" name="was1" id="was1"></td>
                                    <td class="border"><input type="text" name="was2" id="was2"></td>
                                </tr>
                                <tr>
                                    <td class="border">2</td>
                                    <td class="border"><input type="text" name="was3" id="was3"></td>
                                    <td class="border"><input type="text" name="was4" id="was4"></td>
                                </tr>
                                <tr>
                                    <td class="border">3</td>
                                    <td class="border"><input type="text" name="was5" id="was5"></td>
                                    <td class="border"><input type="text" name="was6" id="was6"></td>
                                </tr>
                                <tr>
                                    <td class="border">4</td>
                                    <td class="border"><input type="text" name="was7" id="was7"></td>
                                    <td class="border"><input type="text" name="was8" id="was8"></td>
                                </tr>
                                <tr>
                                    <td class="border">5</td>
                                    <td class="border"><input type="text" name="was9" id="was9"></td>
                                    <td class="border"><input type="text" name="was10" id="was10"></td>
                                </tr>
                                <tr>
                                    <td class="border" colspan="2">Average</td>
                                    <td class="border"><input type="text" name="average5" id="average5"></td>
                                </tr>
                                <tr>
                                    <td class="border" colspan="2">Stdev</td>
                                    <td class="border"><input type="text" name="stdev5" id="stdev5"></td>
                                </tr>
                            </table>
                            </div>
                    </div>
                    <br>
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
            </div>
            <br>
            <br>
            <br>

            
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
                                formFlowmeter.lok2.value = data.lokasi_alat;
                                formFlowmeter.kal2.value = data.nomor_kalibrasi;
                                formFlowmeter.nam2.value = data.nama_alat;
                                formFlowmeter.mer2.value = data.merk_alat;
                                formFlowmeter.tip2.value = data.tipe;
                                formFlowmeter.kap2.value = data.kapasitas;
                                formFlowmeter.res2.value = data.resolusi;
                                formFlowmeter.rang2.value = data.range_penggunaan_alat;
                                formFlowmeter.lim2.value = data.limits_of_permissible_error;
                                formFlowmeter.kode.value = data.kode_alat;
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
                $(document).ready(function () {
                    $("#button-D").click(function () {
                        // Mengambil teks dari semua elemen dengan class 'nac'
                        var nacData = $(".nac").map(function () {
                            return $(this).text();
                        }).get().join(", ");

                        // Mengambil teks dari semua elemen dengan class 'email'
                        var emailData = $(".email").map(function () {
                            return $(this).text();
                        }).get().join(", ");

                        // Gabungkan dan tampilkan kedua data di elemen dengan ID 'output'
                        $("#output").text("Data dari NAC: " + nacData + " | Data dari Email: " + emailData);
                    });
                });
            </script>
            <script>
                function visibility1() {
                    var form = document.getElementById("forminput");
                    var simpan = document.getElementById("simpan");

                    if (form.classList.contains("tekanan")) {
                        form.classList.remove("tekanan");
                        form.classList.add("naik");
                        simpan.classList.remove("simpan");
                        simpan.classList.add("tekanan");

                    }
                }
                function visibility3() {
                    var form = document.getElementById("forminput");
                    var simpan = document.getElementById("simpan");

                    if (simpan.classList.contains("tekanan")) {
                        simpan.classList.remove("tekanan");
                        simpan.classList.add("simpan");
                        form.classList.remove("naik");
                        form.classList.add("tekanan");
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
                function subtractValues() {
                    let master1 = parseFloat(document.getElementById("valueMaster1").value) || 0;
                    let master2 = parseFloat(document.getElementById("valueMaster2").value) || 0;
                    let master3 = parseFloat(document.getElementById("valueMaster3").value) || 0;
                    let master4 = parseFloat(document.getElementById("valueMaster4").value) || 0;
                    let master5 = parseFloat(document.getElementById("valueMaster5").value) || 0;
                    let average1 = parseFloat(document.getElementById("avgPembacaan1").value) || 0;
                    let average2 = parseFloat(document.getElementById("avgPembacaan2").value) || 0;
                    let average3 = parseFloat(document.getElementById("avgPembacaan3").value) || 0;
                    let average4 = parseFloat(document.getElementById("avgPembacaan4").value) || 0;
                    let average5 = parseFloat(document.getElementById("avgPembacaan5").value) || 0;

                    let result1 = master1 - average1;
                    let result2 = master2 - average2;
                    let result3 = master3 - average3;
                    let result4 = master4 - average4;
                    let result5 = master5 - average5;

                    document.getElementById("correction1").value = result1.toFixed(4);
                    document.getElementById("correction2").value = result2.toFixed(4);
                    document.getElementById("correction3").value = result3.toFixed(4);
                    document.getElementById("correction4").value = result4.toFixed(4);
                    document.getElementById("correction5").value = result5.toFixed(4);
                }
                document.addEventListener("input", subtractValues);


                function hitungData1() {
                    let nilai1 = parseFloat(document.getElementById("nan2").value) || 0;
                    let nilai2 = parseFloat(document.getElementById("nan4").value) || 0;
                    let nilai3 = parseFloat(document.getElementById("nan6").value) || 0;
                    let nilai4 = parseFloat(document.getElementById("nan8").value) || 0;
                    let nilai5 = parseFloat(document.getElementById("nan10").value) || 0;

                    let values1 = nilai1 + nilai2 + nilai3 + nilai4 + nilai5;
                    let count1 = values1 / 5;

                    let h1 = (nilai1 - count1)**2;
                    let h2 = (nilai2 - count1)**2;
                    let h3 = (nilai3 - count1)**2;
                    let h4 = (nilai4 - count1)**2;
                    let h5 = (nilai5 - count1)**2;
                    let stdev1 = (h1 + h2 + h3 + h4 + h5) / 4;
                    let amount = Math.sqrt(stdev1);
                    document.getElementById("stdev1").value = amount.toFixed(3);

                    document.getElementById("avgPembacaan1").value = count1.toFixed(3);
                    document.getElementById("average1").value = count1.toFixed(3);
                }
                document.addEventListener("input", hitungData1);


                function hitungData2() {
                    let nilai1 = parseFloat(document.getElementById("bac2").value) || 0;
                    let nilai2 = parseFloat(document.getElementById("bac4").value) || 0;
                    let nilai3 = parseFloat(document.getElementById("bac6").value) || 0;
                    let nilai4 = parseFloat(document.getElementById("bac8").value) || 0;
                    let nilai5 = parseFloat(document.getElementById("bac10").value) || 0;

                    let values1 = nilai1 + nilai2 + nilai3 + nilai4 + nilai5;
                    let count1 = values1 / 5;

                    let h1 = (nilai1 - count1)**2;
                    let h2 = (nilai2 - count1)**2;
                    let h3 = (nilai3 - count1)**2;
                    let h4 = (nilai4 - count1)**2;
                    let h5 = (nilai5 - count1)**2;
                    let stdev1 = (h1 + h2 + h3 + h4 + h5) / 4;
                    let amount = Math.sqrt(stdev1);
                    document.getElementById("stdev2").value = amount.toFixed(3);

                    document.getElementById("avgPembacaan2").value = count1.toFixed(3);
                    document.getElementById("average2").value = count1.toFixed(3);
                }
                document.addEventListener("input", hitungData2);


                function hitungData3() {
                    let nilai1 = parseFloat(document.getElementById("ves2").value) || 0;
                    let nilai2 = parseFloat(document.getElementById("ves4").value) || 0;
                    let nilai3 = parseFloat(document.getElementById("ves6").value) || 0;
                    let nilai4 = parseFloat(document.getElementById("ves8").value) || 0;
                    let nilai5 = parseFloat(document.getElementById("ves10").value) || 0;

                    let values1 = nilai1 + nilai2 + nilai3 + nilai4 + nilai5;
                    let count1 = values1 / 5;
                    
                    let h1 = (nilai1 - count1)**2;
                    let h2 = (nilai2 - count1)**2;
                    let h3 = (nilai3 - count1)**2;
                    let h4 = (nilai4 - count1)**2;
                    let h5 = (nilai5 - count1)**2;
                    let stdev1 = (h1 + h2 + h3 + h4 + h5) / 4;
                    let amount = Math.sqrt(stdev1);
                    document.getElementById("stdev3").value = amount.toFixed(3);

                    document.getElementById("avgPembacaan3").value = count1.toFixed(3);
                    document.getElementById("average3").value = count1.toFixed(3);
                }
                document.addEventListener("input", hitungData3);
                

                function hitungData4() {
                    let nilai1 = parseFloat(document.getElementById("fas2").value) || 0;
                    let nilai2 = parseFloat(document.getElementById("fas4").value) || 0;
                    let nilai3 = parseFloat(document.getElementById("fas6").value) || 0;
                    let nilai4 = parseFloat(document.getElementById("fas8").value) || 0;
                    let nilai5 = parseFloat(document.getElementById("fas10").value) || 0;

                    let values1 = nilai1 + nilai2 + nilai3 + nilai4 + nilai5;
                    let count1 = values1 / 5;
                    
                    let h1 = (nilai1 - count1)**2;
                    let h2 = (nilai2 - count1)**2;
                    let h3 = (nilai3 - count1)**2;
                    let h4 = (nilai4 - count1)**2;
                    let h5 = (nilai5 - count1)**2;
                    let stdev1 = (h1 + h2 + h3 + h4 + h5) / 4;
                    let amount = Math.sqrt(stdev1);
                    document.getElementById("stdev4").value = amount.toFixed(3);

                    document.getElementById("avgPembacaan4").value = count1.toFixed(3);
                    document.getElementById("average4").value = count1.toFixed(3);
                }
                document.addEventListener("input", hitungData4);
                

                function hitungData5() {
                    let nilai1 = parseFloat(document.getElementById("was2").value) || 0;
                    let nilai2 = parseFloat(document.getElementById("was4").value) || 0;
                    let nilai3 = parseFloat(document.getElementById("was6").value) || 0;
                    let nilai4 = parseFloat(document.getElementById("was8").value) || 0;
                    let nilai5 = parseFloat(document.getElementById("was10").value) || 0;

                    let values1 = nilai1 + nilai2 + nilai3 + nilai4 + nilai5;
                    let count1 = values1 / 5;
                    
                    let h1 = (nilai1 - count1)**2;
                    let h2 = (nilai2 - count1)**2;
                    let h3 = (nilai3 - count1)**2;
                    let h4 = (nilai4 - count1)**2;
                    let h5 = (nilai5 - count1)**2;
                    let stdev1 = (h1 + h2 + h3 + h4 + h5) / 4;
                    let amount = Math.sqrt(stdev1);
                    document.getElementById("stdev5").value = amount.toFixed(3);

                    document.getElementById("avgPembacaan5").value = count1.toFixed(3);
                    document.getElementById("average5").value = count1.toFixed(3);
                }
                document.addEventListener("input", hitungData5);


                function ketidakPastian() {
                    let nilai1 = parseFloat(document.getElementById("stdev1").value) || 0;
                    let nilai2 = parseFloat(document.getElementById("stdev2").value) || 0;
                    let nilai3 = parseFloat(document.getElementById("stdev3").value) || 0;
                    let nilai4 = parseFloat(document.getElementById("stdev4").value) || 0;
                    let nilai5 = parseFloat(document.getElementById("stdev5").value) || 0;

                    let akar = Math.sqrt(5);
                    let master1 = 0.02;
                    let master2 = 0.02;
                    let master3 = 0.03;

                    let stdv1 = nilai1 / akar;
                    let stdv2 = nilai2 / akar;
                    let stdv3 = nilai3 / akar;
                    let stdv4 = nilai4 / akar;
                    let stdv5 = nilai5 / akar;

                    let u1 = stdv1 * stdv1;
                    let u2 = stdv2 * stdv2;
                    let u3 = stdv3 * stdv3;
                    let u4 = stdv4 * stdv4;
                    let u5 = stdv5 * stdv5;
                    
                    let master1_2 = master1*master1;
                    let master2_2 = master2*master2;
                    let master3_2 = master3*master3;

                    let values = u1 + u2 + u3 + u4 + u5 + master1_2 + master2_2 + master3_2;
                    let amount = Math.sqrt(values);
                    document.getElementById("ketidakpastian1").value = amount.toFixed(9);
                }
                document.addEventListener("input", ketidakPastian);
            </script>
            <script src="../../../components/bootstrap/js/bootstrap.min.js"></script>
            <script src="../../../components/bootstrap/js/bootstrap.bundle.js"></script>
    </body>
</html>