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
    <title>form balance</title>

    <!-- css -->
    <link rel="stylesheet" href="../../../styles/form.css">
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
        .upper {
            border: 1px solid black;
            background-color: white;
            box-shadow: 5px 5px 10px rgba(48, 47, 47, 0.267);
            border-radius: 25px;
            padding: 2px;
        }

        .vanise {
            display: none;
        }

        .normal {
            display: block;
        }

        .centered {
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
                        href="../../kalibrasi.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">>
                        KALIBRASI</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                        href="balance.php">> BALANCE</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                        href=" form.php">> FORM-BALANCE</a>
                </div>
            </div>

            <div class="page">
                <br>

                <form style="margin-top: 30px;" id="inputForm" class="inputForm"
                    action="../../../system/balance/send_email.php" method="POST">
                    <div class="upper">
                        <div class="up1 divc">
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
                                    <td><input class="border yellow input-h" id="lok_kal2" name="lok_kal2" type="text"></td>
                                </tr>
                                <tr>
                                    <td>Suhu Ruangan</td>
                                    <td>:</td>
                                    <td><input class="border yellow input-h" id="suh2" name="suh2" type="text"></td>
                                </tr>
                                <tr>
                                    <td>Kelembaban</td>
                                    <td>:</td>
                                    <td><input class="border yellow input-h" id="kel2" name="kel2" type="text"></td>
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
                                        <select class="border input-h" name="kode_alat2" id="kode_alat2"></select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tgl. Kalibrasi </td>
                                    <td>:</td>
                                    <td><input class="border yellow input-h" id="tanggal_kalibrasi2" name="tanggal_kalibrasi2"
                                            type="date"></td>
                                </tr>
                                <tr>
                                    <td>Tgl. Kalibrasi Ulang</td>
                                    <td>:</td>
                                    <td><input class="border yellow input-h" id="tanggal_kalibrasi_ulang2"
                                            name="tanggal_kalibrasi_ulang2" type="date"></td>
                                </tr>
                                <tr>
                                    <td>Metode Kalibrasi</td>
                                    <td>:</td>
                                    <td><span>Didopsi dari : "The Calibration of <br> Balance"</span></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Oleh David B. Prowse, CSIRO National <br> Measurement Laboratory, 1985,<br>
                                        dan"Assestment of Uncertainties of <br> Measurement for Calibration and Testing
                                        <br> Laboratories" oleh R.R Cook, NATA,2002.
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <br>

                    <div class="btnfit">
                        <div>
                            <button type="button" class="btn btn-outline-secondary" id="Button-A"
                                onclick="visibility1()">Perhitungan</button>
                            <button type="button" class="btn btn-outline-secondary" id="Button-C"
                                onclick="visibility2()">Simpan</button>
                        </div>
                    </div>

                    <div class="normal" id="perhituganBalance">
                        <table>
                            <tr>
                                <th align="left">Perhitungan</th>
                            </tr>
                            <tr>
                                <th>A.1 Kemampuan Ulang Pembacaan (Mendekati nol)</th>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td colspan="3">Mendekati titik nol</td>
                                <td class="border"><input type="text" id="mendekati_titik_nol"
                                        name="mendekati_titik_nol"></td>
                                <td style="text-align: center;">gram</td>
                            </tr>

                            <tr>
                                <td class="border" align="center">Ulangan</td>
                                <td class="border" align="center" colspan="2">Pembacaan</td>
                                <td class="border" align="center">Selisih</td>
                                <td class="border" align="center">Maks. Perbedaan</td>
                            </tr>
                            <tr>
                                <td class="border"></td>
                                <td class="border" align="center">Z</td>
                                <td class="border" align="center">M</td>
                                <td class="border" align="center">M-Z</td>
                                <td class="border" align="center">Pembacaan</td>
                            </tr>
                            <tr>
                                <td class="border" align="center">1</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input1" id="input1"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input2" id="input2"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input3" id="input3" readonly></td>
                                <td class="border"><input type="text" name="input4" id="input4" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" align="center">2</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input5" id="input5"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input6" id="input6"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input7" id="input7" readonly></td>
                                <td class="border"><input type="text" name="input8" id="input8" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" align="center">3</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input9" id="input9"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input10" id="input10"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input11" id="input11" readonly></td>
                                <td class="border"><input type="text" name="input12" id="input12" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" align="center">4</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input13" id="input13"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input14" id="input14"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input15" id="input15" readonly></td>
                                <td class="border"><input type="text" name="input16" id="input16" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" align="center">5</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input17" id="input17"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input18" id="input18"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input19" id="input19" readonly></td>
                                <td class="border"><input type="text" name="input20" id="input20" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" align="center">6</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input21" id="input21"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input22" id="input22"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input23" id="input23" readonly></td>
                                <td class="border"><input type="text" name="input24" id="input24" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" align="center">7</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input25" id="input25"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input26" id="input26"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input27" id="input27" readonly></td>
                                <td class="border"><input type="text" name="input28" id="input28" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" align="center">8</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input29" id="input29"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input30" id="input30"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input31" id="input31" readonly></td>
                                <td class="border"><input type="text" name="input32" id="input32" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" align="center">9</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input33" id="input33"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input34" id="input34"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input35" id="input35" readonly></td>
                                <td class="border"><input type="text" name="input36" id="input36" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" align="center">10</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input37" id="input37"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input38" id="input38"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input39" id="input39" readonly></td>
                                <td class="border"><input type="text" name="input40" id="input40" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="2">Standar Deviasi</td>
                                <td class="border"><input type="text" id="standarD1" name="standarD1"
                                        style="text-align: center;"></td>
                                <td style="text-align: center;">gram</td>
                                <td style="text-align: center;"><a href="#input19" id="hitungSD1"><-- GET SD</a></td>
                            </tr>
                            <tr>
                                <td colspan="2">Maks. Perbedaan <br> pembacaan</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">berurutan= </td>
                                <td class="border"><input type="text" id="average1" name="average1"
                                        style="text-align: center;" readonly>
                                </td>
                                <td style="text-align: center;">gram</td>
                            </tr>
                        </table><br><br>



                        <table>
                            <tr>
                                <th>A.2 Kemampuan Ulang Pembacaan (Setengah Kapasitas Maksimum)</th>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td colspan="3">Setengah Kapasitas Maks =</td>
                                <td class="border"><input type="text" id="setengah_kapasitas_max"
                                        name="setengah_kapasitas_max"></td>
                                <td style="text-align: center;">gram</td>
                            </tr>
                            <tr>
                                <td class="border" align="center">Ulangan</td>
                                <td class="border" align="center" colspan="2">Pembacaan</td>
                                <td class="border" align="center">Selisih</td>
                                <td class="border" align="center">Maks. Perbedaan</td>
                            </tr>
                            <tr>
                                <td class="border"></td>
                                <td class="border" align="center">Z</td>
                                <td class="border" align="center">M</td>
                                <td class="border" align="center"></td>
                                <td class="border" align="center">Pembacaan</td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">1</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input41" id="input41"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input42" id="input42"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input43" id="input43" readonly></td>
                                <td class="border"><input type="text" name="input44" id="input44" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">2</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input45" id="input45"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input6" id="input46"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input47" id="input47" readonly></td>
                                <td class="border"><input type="text" name="input48" id="input48" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">3</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input49" id="input49"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input50" id="input50"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input51" id="input51" readonly></td>
                                <td class="border"><input type="text" name="input52" id="input52" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">4</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input53" id="input53"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input54" id="input54"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input55" id="input55" readonly></td>
                                <td class="border"><input type="text" name="input56" id="input56" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">5</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input57" id="input57"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input58" id="input58"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input59" id="input59" readonly></td>
                                <td class="border"><input type="text" name="input60" id="input60" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">6</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input61" id="input61"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input62" id="input62"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input63" id="input63" readonly></td>
                                <td class="border"><input type="text" name="input64" id="input64" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">7</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input65" id="input65"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input66" id="input66"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input67" id="input67" readonly></td>
                                <td class="border"><input type="text" name="input68" id="input68" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">8</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input69" id="input69"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input70" id="input70"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input71" id="input71" readonly></td>
                                <td class="border"><input type="text" name="input72" id="input72" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">9</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input73" id="input73"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input74" id="input74"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input75" id="input75" readonly></td>
                                <td class="border"><input type="text" name="input76" id="input76" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">10</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input77" id="input77"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input78" id="input78"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input79" id="input79" readonly></td>
                                <td class="border"><input type="text" name="input80" id="input80" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="2">Standar Deviasi</td>
                                <td class="border"><input type="text" id="standarD2" name="standarD2"
                                        style="text-align: center;"></td>
                                <td style="text-align: center;">gram</td>
                                <td style="text-align: center;"><a href="#input19" id="hitungSD2"><-- GET SD</a></td>
                            </tr>
                            <tr>
                                <td colspan="2">Maks. Perbedaan <br> pembacaan</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">berurutan= </td>
                                <td class="border"><input type="text" id="average2" name="average2"
                                        style="text-align: center;" readonly>
                                </td>
                                <td style="text-align: center;">gram</td>
                            </tr>
                        </table><br><br>



                        <table>
                            <tr>
                                <th>A.3 Kemampuan Ulang Pembacaan (Kapasitas Maximum)</th>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td colspan="3">Kapasitas Maksimum =</td>
                                <td class="border"><input type="text" id="kapasitas_max" name="kapasitas_max"></td>
                                <td style="text-align: center;">gram</td>
                            </tr>
                            <tr>
                                <td class="border" align="center">Ulangan</td>
                                <td class="border" align="center" colspan="2">Pembacaan</td>
                                <td class="border" align="center">Selisih</td>
                                <td class="border" align="center">Maks. Perbedaan</td>
                            </tr>
                            <tr>
                                <td class="border"></td>
                                <td class="border" align="center">Z</td>
                                <td class="border" align="center">M</td>
                                <td class="border" align="center">M-Z</td>
                                <td class="border" align="center">Pembacaan</td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">1</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input81" id="input81"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input82" id="input82"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input83" id="input83" readonly></td>
                                <td class="border"><input type="text" name="input84" id="input84" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">2</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input85" id="input85"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input86" id="input86"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input87" id="input87" readonly></td>
                                <td class="border"><input type="text" name="input88" id="input88" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">3</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input89" id="input89"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input90" id="input90"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input91" id="input91" readonly></td>
                                <td class="border"><input type="text" name="input92" id="input92" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">4</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input93" id="input93"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input94" id="input94"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input95" id="input95" readonly></td>
                                <td class="border"><input type="text" name="input96" id="input96" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">5</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input97" id="input97"
                                        min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input98" id="input98"
                                        min="0"></td>
                                <td class="border"><input type="text" name="input99" id="input99" readonly></td>
                                <td class="border"><input type="text" name="input100" id="input100" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">6</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input101"
                                        id="input101" min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input102"
                                        id="input102" min="0"></td>
                                <td class="border"><input type="text" name="input103" id="input103" readonly></td>
                                <td class="border"><input type="text" name="input104" id="input104" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">7</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input105"
                                        id="input105" min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input106"
                                        id="input106" min="0"></td>
                                <td class="border"><input type="text" name="input107" id="input107" readonly></td>
                                <td class="border"><input type="text" name="input108" id="input108" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">8</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input109"
                                        id="input109" min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input110"
                                        id="input110" min="0"></td>
                                <td class="border"><input type="text" name="input111" id="input111" readonly></td>
                                <td class="border"><input type="text" name="input112" id="input112" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">9</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input113"
                                        id="input113" min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input114"
                                        id="input114" min="0"></td>
                                <td class="border"><input type="text" name="input115" id="input115" readonly></td>
                                <td class="border"><input type="text" name="input116" id="input116" readonly></td>
                            </tr>
                            <tr>
                                <td class="border" style="text-align: center;">10</td>
                                <td class="border yellow"><input class="yellow" type="text" name="input117"
                                        id="input117" min="0"></td>
                                <td class="border yellow"><input class="yellow" type="text" name="input118"
                                        id="input118" min="0"></td>
                                <td class="border"><input type="text" name="input119" id="input119" readonly></td>
                                <td class="border"><input type="text" name="input120" id="input120" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="2">Standar Deviasi</td>
                                <td class="border"><input type="text" id="standarD3" name="standarD3"
                                        style="text-align: center;"></td>
                                <td style="text-align: center;">gram</td>
                                <td style="text-align: center;"><a href="#input19" id="hitungSD3"
                                        style="text-align: center;"><-- GET SD</a></td>
                            </tr>
                            <tr>
                                <td colspan="2">Maks. Perbedaan <br> pembacaan</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">berurutan= </td>
                                <td class="border"><input type="text" id="average3" name="average3"
                                        style="text-align: center;" readonly>
                                </td>
                                <td style="text-align: center;">gram</td>
                            </tr>
                        </table>

                        <br><br>
                        <hr>
                        <br><br>

                        <table>
                            <tr>
                                <th align="left">B. Keseragaman Skala</th>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td colspan="2">Massa pengkalibrasi (M) =</td>
                                <td class="border"><input type="text"></td>
                                <td style="text-align: center;">gram</td>
                            </tr>
                            <tr>
                                <td align="center" width="110px" class="border">Beban Timbangan</td>
                                <td align="center" width="80px" class="border">Beban (gram)</td>
                                <td align="center" width="130px" class="border">Pembacaan Skala</td>
                                <td align="center" width="80px" class="border">Rata Rata</td>
                                <td align="center" width="80px" class="border">Selisih</td>
                                <td align="center" width="60px" class="border">Standar Massa</td>
                                <td align="center" width="60px" class="border">Koreksi Skala(gram)</td>
                                <td align="center" width="60px" class="border">Absolute Koreksi</td>
                                <td align="center" width="50px" class="border">U95</td>
                            </tr>
                            <!-- Row 1 -->
                            <tr>
                                <td align="center" class="border">0</td>
                                <td></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow" id="ave0"
                                        value="0" style="text-align: center;"></td>
                                <td class="border"><input type="text" style="text-align: right;" id="ave1" readonly>
                                </td>
                                <td class="border"><input type="text" style="text-align: right;" id="ave2" readonly>
                                </td>
                                <td class="border"><input type="text" style="text-align: center;" id="standar1"
                                        readonly>
                                </td>
                                <td class="border"><input type="text" style="text-align: center;" id="ave4"
                                        name="koreksi1" readonly></td>
                                <td class="border"><input type="number" style="text-align: center;" id="ave5"
                                        oninput="findLargest()" readonly></td>
                                <td class="border"><input type="text" id="u951" readonly></td>
                            </tr>
                            <!-- Row 2 -->
                            <tr>
                                <td align="center" class="border">1M</td>
                                <td class="border"><select width="60px" id="nominal_massa1"></select></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave6"></td>
                                <td class="border"><input type="text" style="text-align: right;" id="ave7" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave8" readonly></td>
                                <td class="border"><input type="text" id="ave9" readonly></td>
                                <td class="border"><input type="text" id="ave10" readonly></td>
                                <td class="border"><input type="text" id="ave11" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 3 -->
                            <tr>
                                <td align="center" class="border">1M</td>
                                <td class="border"><input type="text" id="nominal1" name="nominal1" readonly></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave12"></td>
                                <td class="border"><input type="text" id="ave13" readonly></td>
                                <td class="border"><input type="text" id="ave14" readonly></td>
                                <td class="border"><input type="text" id="ave15" readonly></td>
                                <td class="border"><input type="text" id="ave16" readonly></td>
                                <td class="border"><input type="hidden" id="ave17" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 4 -->
                            <tr>
                                <td align="center" class="border">0</td>
                                <td class="border"></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow" id="ave18"
                                        style="text-align: center;" value="0"></td>
                                <td class="border"><input type="text" id="ave19" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave20" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="standar2" style="text-align: center;"
                                        readonly>
                                </td>
                                <td class="border"><input type="text" id="ave22" style="text-align: center;"
                                        name="koreksi2" readonly></td>
                                <td class="border"><input type="number" id="ave23" style="text-align: center;"
                                        oninput="findLargest()" readonly></td>
                                <td class="border"><input type="text" id="u952" readonly></td>
                            </tr>
                            <!-- Row 5 -->
                            <tr>
                                <td align="center" class="border">2M</td>
                                <td width="80px"><select width="60px" id="nominal_massa2"></select></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave24"></td>
                                <td class="border"><input type="text" style="text-align: right;" id="ave25" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave26" readonly></td>
                                <td class="border"><input type="text" id="ave27" readonly></td>
                                <td class="border"><input type="text" id="ave28" readonly></td>
                                <td class="border"><input type="text" id="ave29" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 6 -->
                            <tr>
                                <td align="center" class="border">2M</td>
                                <td class="border"><input type="text" id="nominal2" name="nominal2" readonly></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave30"></td>
                                <td class="border"><input type="text" id="ave31" readonly></td>
                                <td class="border"><input type="text" id="ave32" readonly></td>
                                <td class="border"><input type="text" id="ave33" readonly></td>
                                <td class="border"><input type="text" id="ave34" readonly></td>
                                <td class="border"><input type="hidden" id="ave35" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 7 -->
                            <tr>
                                <td align="center" class="border">0</td>
                                <td class="border"></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow" id="ave36"
                                        style="text-align: center;" value="0"></td>
                                <td class="border"><input type="text" id="ave37" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave38" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="standar3" style="text-align: center;"
                                        readonly>
                                </td>
                                <td class="border"><input type="text" id="ave40" style="text-align: center;"
                                        name="koreksi3" readonly></td>
                                <td class="border"><input type="number" id="ave41" style="text-align: center;"
                                        oninput="findLargest()" readonly></td>
                                <td class="border"><input type="text" id="u953" readonly></td>
                            </tr>
                            <!-- Row 8 -->
                            <tr>
                                <td align="center" class="border">3M</td>
                                <td width="80px"><select width="60px" id="nominal_massa3"></select></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave42"></td>
                                <td class="border"><input type="text" style="text-align: right;" id="ave43" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave44" readonly></td>
                                <td class="border"><input type="text" id="ave45" readonly></td>
                                <td class="border"><input type="text" id="ave46" readonly></td>
                                <td class="border"><input type="text" id="ave47" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 9 -->
                            <tr>
                                <td align="center" class="border">3M</td>
                                <td class="border"><input type="text" id="nominal3" name="nominal3" readonly></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave48"></td>
                                <td class="border"><input type="text" id="ave49" readonly></td>
                                <td class="border"><input type="text" id="ave50" readonly></td>
                                <td class="border"><input type="text" id="ave51" readonly></td>
                                <td class="border"><input type="text" id="ave52" readonly></td>
                                <td class="border"><input type="hidden" id="ave53" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 10 -->
                            <tr>
                                <td align="center" class="border">0</td>
                                <td class="border"></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow" id="ave54"
                                        style="text-align: center;" value="0"></td>
                                <td class="border"><input type="text" id="ave55" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave56" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="standar4" style="text-align: center;"
                                        readonly>
                                </td>
                                <td class="border"><input type="text" id="ave58" style="text-align: center;"
                                        name="koreksi4" readonly></td>
                                <td class="border"><input type="number" id="ave59" style="text-align: center;"
                                        oninput="findLargest()" readonly></td>
                                <td class="border"><input type="text" id="u954" readonly></td>
                            </tr>
                            <!-- Row 11 -->
                            <tr>
                                <td align="center" class="border">4M</td>
                                <td width="80px"><select width="60px" id="nominal_massa4"></select></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave60"></td>
                                <td class="border"><input type="text" style="text-align: right;" id="ave61" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave62" readonly></td>
                                <td class="border"><input type="text" id="ave63" readonly></td>
                                <td class="border"><input type="text" id="ave64" readonly></td>
                                <td class="border"><input type="text" id="ave65" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 12 -->
                            <tr>
                                <td align="center" class="border">4M</td>
                                <td class="border"><input type="text" id="nominal4" name="nominal4" readonly></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave66"></td>
                                <td class="border"><input type="text" id="ave67" readonly></td>
                                <td class="border"><input type="text" id="ave68" readonly></td>
                                <td class="border"><input type="text" id="ave69" readonly></td>
                                <td class="border"><input type="text" id="ave70" readonly></td>
                                <td class="border"><input type="hidden" id="ave71" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 13 -->
                            <tr>
                                <td align="center" class="border">0</td>
                                <td class="border"></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow" id="ave72"
                                        style="text-align: center;" value="0"></td>
                                <td class="border"><input type="text" id="ave73" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave74" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="standar5" style="text-align: center;"
                                        readonly>
                                </td>
                                <td class="border"><input type="text" id="ave76" style="text-align: center;"
                                        name="koreksi5" readonly></td>
                                <td class="border"><input type="number" id="ave77" style="text-align: center;"
                                        oninput="findLargest()" readonly></td>
                                <td class="border"><input type="text" id="u955" readonly></td>
                            </tr>
                            <!-- Row 14 -->
                            <tr>
                                <td align="center" class="border">5M</td>
                                <td width="80px"><select width="60px" id="nominal_massa5"></select></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave78"></td>
                                <td class="border"><input type="text" style="text-align: right;" id="ave79" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave80" readonly></td>
                                <td class="border"><input type="text" id="ave81" readonly></td>
                                <td class="border"><input type="text" id="ave82" readonly></td>
                                <td class="border"><input type="text" id="ave83" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 15 -->
                            <tr>
                                <td align="center" class="border">5M</td>
                                <td class="border"><input type="text" id="nominal5" name="nominal5" readonly></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave84"></td>
                                <td class="border"><input type="text" id="ave85" readonly></td>
                                <td class="border"><input type="text" id="ave86" readonly></td>
                                <td class="border"><input type="text" id="ave87" readonly></td>
                                <td class="border"><input type="text" id="ave88" readonly></td>
                                <td class="border"><input type="hidden" id="ave89" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 16 -->
                            <tr>
                                <td align="center" class="border">0</td>
                                <td class="border"></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow" id="ave90"
                                        style="text-align: center;" value="0"></td>
                                <td class="border"><input type="text" id="ave91" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave92" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="standar6" style="text-align: center;"
                                        readonly>
                                </td>
                                <td class="border"><input type="text" id="ave94" style="text-align: center;"
                                        name="koreksi6" readonly></td>
                                <td class="border"><input type="number" id="ave95" style="text-align: center;"
                                        oninput="findLargest()" readonly></td>
                                <td class="border"><input type="text" id="u956" readonly></td>
                            </tr>
                            <!-- Row 17 -->
                            <tr>
                                <td align="center" class="border">6M</td>
                                <td width="80px"><select width="60px" id="nominal_massa6"></select></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave96"></td>
                                <td class="border"><input type="text" style="text-align: right;" id="ave97" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave98" readonly></td>
                                <td class="border"><input type="text" id="ave99" readonly></td>
                                <td class="border"><input type="text" id="ave100" readonly></td>
                                <td class="border"><input type="text" id="ave101" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 18 -->
                            <tr>
                                <td align="center" class="border">6M</td>
                                <td class="border"><input type="text" id="nominal6" name="nominal6" readonly></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave102"></td>
                                <td class="border"><input type="text" id="ave103" readonly></td>
                                <td class="border"><input type="text" id="ave104" readonly></td>
                                <td class="border"><input type="text" id="ave105" readonly></td>
                                <td class="border"><input type="text" id="ave106" readonly></td>
                                <td class="border"><input type="hidden" id="ave107" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 19 -->
                            <tr>
                                <td align="center" class="border">0</td>
                                <td class="border"></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow" id="ave108"
                                        style="text-align: center;" value="0"></td>
                                <td class="border"><input type="text" id="ave109" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave110" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="standar7" style="text-align: center;"
                                        readonly>
                                </td>
                                <td class="border"><input type="text" id="ave112" style="text-align: center;"
                                        name="koreksi7" readonly></td>
                                <td class="border"><input type="number" id="ave113" style="text-align: center;"
                                        oninput="findLargest()" readonly></td>
                                <td class="border"><input type="text" id="u957" readonly></td>
                            </tr>
                            <!-- Row 20 -->
                            <tr>
                                <td align="center" class="border">7M</td>
                                <td width="80px"><select width="60px" id="nominal_massa7"></select></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave114"></td>
                                <td class="border"><input type="text" style="text-align: right;" id="ave115" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave116" readonly></td>
                                <td class="border"><input type="text" id="ave117" readonly></td>
                                <td class="border"><input type="text" id="ave118" readonly></td>
                                <td class="border"><input type="text" id="ave119" readonly></td>
                                <td class="border"></td>

                            </tr>
                            <!-- Row 21 -->
                            <tr>
                                <td align="center" class="border">7M</td>
                                <td class="border"><input type="text" id="nominal7" name="nominal7" readonly></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave120"></td>
                                <td class="border"><input type="text" id="ave121" readonly></td>
                                <td class="border"><input type="text" id="ave122" readonly></td>
                                <td class="border"><input type="text" id="ave123" readonly></td>
                                <td class="border"><input type="text" id="ave124" readonly></td>
                                <td class="border"><input type="hidden" id="ave125" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 22 -->
                            <tr>
                                <td align="center" class="border">0</td>
                                <td class="border"></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow" id="ave126"
                                        style="text-align: center;" value="0"></td>
                                <td class="border"><input type="text" id="ave127" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave128" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="standar8" style="text-align: center;"
                                        readonly>
                                </td>
                                <td class="border"><input type="text" id="ave130" style="text-align: center;"
                                        name="koreksi8" readonly></td>
                                <td class="border"><input type="number" id="ave131" style="text-align: center;"
                                        oninput="findLargest()" readonly></td>
                                <td class="border"><input type="text" id="u958" readonly></td>
                            </tr>
                            <!-- Row 23 -->
                            <tr>
                                <td align="center" class="border">8M</td>
                                <td width="80px"><select width="60px" id="nominal_massa8"></select></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave132"></td>
                                <td class="border"><input type="text" style="text-align: right;" id="ave133" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave134" readonly></td>
                                <td class="border"><input type="text" id="ave135" readonly></td>
                                <td class="border"><input type="text" id="ave136" readonly></td>
                                <td class="border"><input type="text" id="ave137" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 24 -->
                            <tr>
                                <td align="center" class="border">8M</td>
                                <td class="border"><input type="text" id="nominal8" name="nominal8" readonly></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave138"></td>
                                <td class="border"><input type="text" id="ave139" readonly></td>
                                <td class="border"><input type="text" id="ave140" readonly></td>
                                <td class="border"><input type="text" id="ave141" readonly></td>
                                <td class="border"><input type="text" id="ave142" readonly></td>
                                <td class="border"><input type="hidden" id="ave143" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 25 -->
                            <tr>
                                <td align="center" class="border">0</td>
                                <td class="border"></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow" id="ave144"
                                        style="text-align: center;" value="0"></td>
                                <td class="border"><input type="text" id="ave145" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave146" style="text-align: right;" readonly>
                                </td>
                                <td class="border"><input type="text" id="standar9" style="text-align: center;"
                                        readonly>
                                </td>
                                <td class="border"><input type="text" id="ave148" style="text-align: center;"
                                        name="koreksi9" readonly></td>
                                <td class="border"><input type="number" id="ave149" style="text-align: center;"
                                        oninput="findLargest()" readonly></td>
                                <td class="border"><input type="text" id="u959" readonly></td>
                            </tr>
                            <!-- Row 23 -->
                            <tr>
                                <td align="center" class="border">9M</td>
                                <td width="80px"><select width="60px" id="nominal_massa9"></select></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave150"></td>
                                <td class="border"><input type="text" style="text-align: right;" id="ave151" readonly>
                                </td>
                                <td class="border"><input type="text" id="ave152" readonly></td>
                                <td class="border"><input type="text" id="ave153" readonly></td>
                                <td class="border"><input type="text" id="ave154" readonly></td>
                                <td class="border"><input type="text" id="ave155" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 24 -->
                            <tr>
                                <td align="center" class="border">9M</td>
                                <td class="border"><input type="text" id="nominal9" name="nominal9" readonly></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow"
                                        style="text-align: center;" id="ave156"></td>
                                <td class="border"><input type="text" id="ave157" readonly></td>
                                <td class="border"><input type="text" id="ave158" readonly></td>
                                <td class="border"><input type="text" id="ave159" readonly></td>
                                <td class="border"><input type="text" id="ave160" readonly></td>
                                <td class="border"><input type="hidden" id="ave161" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <!-- Row 25 -->
                            <tr>
                                <td align="center" class="border"></td>
                                <td class="border"></td>
                                <td align="center" class="border yellow"><input type="text" class="yellow" id="ave162"
                                        style="text-align: center;"></td>
                                <td class="border"><input type="text" id="ave163" readonly></td>
                                <td class="border"><input type="text" id="ave164" readonly></td>
                                <td class="border"><input type="text" id="ave165" readonly></td>
                                <td class="border"><input type="text" id="ave166" readonly></td>
                                <td class="border"><input type="text" id="ave167" readonly></td>
                                <td class="border"></td>
                            </tr>
                            <tr>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border yellow"><input class="yellow" type="text"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                            </tr>
                            <tr>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border yellow"><input class="yellow" type="text"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                            </tr>
                            <tr>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border yellow"><input class="yellow" type="text"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Koreksi Maksimum =</td>
                                <td class="border ders" style="text-align: center;"><input type="text" class="ders"
                                        style="text-align: center;" value="0" id="largestValue" readonly></td>
                                <td style="text-align: center;">gram</td>
                                <td style="text-align: center;"><a href="#ave126" onclick="findLargest()"
                                        class="button">GET
                                        MAX</a></td>
                                <td style="text-align: center;"><a href="#hitunganU" id="calculateButton"
                                        onclick="hitunganU()" class="button">GET U</a></td>
                            </tr>
                        </table>

                        <br><br>
                        <hr>
                        <br><br>

                        <table>
                            <tr>
                                <th>C. Pengaruh Penyimpanan Pada Pinggan</th>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>Diameter pinggan</td>
                                <td>=</td>
                                <td class="border"><input type="text" id="Pinggan" name="Pinggan"></td>
                                <td></td>
                                <td>mm</td>
                            </tr>
                            <tr>
                                <td>Massa diatas pinggan</td>
                                <td>=</td>
                                <td class="border"><input type="text" id="massa" name="massa"></td>
                                <td></td>
                                <td>gram</td>
                        </table><br><br>

                        Percobaan1
                        <div class="percobaan1">
                            <div class="tab1" style="height: 20px;">
                                <table class="border">
                                    <tr>
                                        <td class="border">tengah</td>
                                        <td class="border">depan</td>
                                        <td class="border">belakang</td>
                                        <td class="border">kiri</td>
                                        <td class="border">kanan</td>
                                    </tr>
                                    <tr>
                                        <td class="border yellow"><input id="per1" class="yellow" type="text"></td>
                                        <td class="border yellow"><input id="per2" class="yellow" type="text"></td>
                                        <td class="border yellow"><input id="per3" class="yellow" type="text"></td>
                                        <td class="border yellow"><input id="per4" class="yellow" type="text"></td>
                                        <td class="border yellow"><input id="per5" class="yellow" type="text"></td>
                                    </tr>
                                </table>
                            </div>

                            <table class="border" style="margin-left: 5%;">
                                <tr>
                                    <td class="border">tengah</td>
                                    <td class="border" width="80px"><input type="text" id="per6" name="tengah" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border">depan</td>
                                    <td class="border"><input type="text" id="per7" name="depan" readonly></td>
                                </tr>
                                <tr>
                                    <td class="border">belakang</td>
                                    <td class="border"><input type="text" id="per8" name="belakang" readonly></td>
                                </tr>
                                <tr>
                                    <td class="border">kiri</td>
                                    <td class="border"><input type="text" id="per9" name="kiri" readonly></td>
                                </tr>
                                <tr>
                                    <td class="border">kanan</td>
                                    <td class="border"><input type="text" id="per10" name="kanan" readonly></td>
                                </tr>
                                <tr>
                                    <td class="border">max</td>
                                    <td class="border"><input type="text" id="max" name="max" readonly></td>
                                </tr>
                            </table>
                        </div><br><br>

                        Percobaan2
                        <div class="percobaan2">
                            <div class="tab2" style="height: 20px;">
                                <table class="border">
                                    <tr>
                                        <td class="border">tengah</td>
                                        <td class="border">depan</td>
                                        <td class="border">belakang</td>
                                        <td class="border">kiri</td>
                                        <td class="border">kanan</td>
                                    </tr>
                                    <tr>
                                        <td class="border yellow"><input class="yellow" id="per11" type="text"></td>
                                        <td class="border yellow"><input class="yellow" id="per12" type="text"></td>
                                        <td class="border yellow"><input class="yellow" id="per13" type="text"></td>
                                        <td class="border yellow"><input class="yellow" id="per14" type="text"></td>
                                        <td class="border yellow"><input class="yellow" id="per15" type="text"></td>
                                    </tr>
                                </table>
                            </div>

                            <table class="border" style="margin-left: 5%;">
                                <tr>
                                    <td class="border">tengah</td>
                                    <td class="border" width="80px"><input type="text" id="per16" readonly></td>
                                </tr>
                                <tr>
                                    <td class="border">depan</td>
                                    <td class="border"><input type="text" id="per17" readonly></td>
                                </tr>
                                <tr>
                                    <td class="border">belakang</td>
                                    <td class="border"><input type="text" id="per18" readonly></td>
                                </tr>
                                <tr>
                                    <td class="border">kiri</td>
                                    <td class="border"><input type="text" id="per19" readonly></td>
                                </tr>
                                <tr>
                                    <td class="border">kanan</td>
                                    <td class="border"><input type="text" id="per20" readonly></td>
                                </tr>
                            </table>
                        </div><br><br>

                        Percobaan3
                        <div class="percobaan3">
                            <div class="tab3" style="height: 20px;">
                                <table class="border">
                                    <tr>
                                        <td class="border">tengah</td>
                                        <td class="border">depan</td>
                                        <td class="border">belakang</td>
                                        <td class="border">kiri</td>
                                        <td class="border">kanan</td>
                                    </tr>
                                    <tr>
                                        <td class="border yellow"><input class="yellow" id="per21" type="text"></td>
                                        <td class="border yellow"><input class="yellow" id="per22" type="text"></td>
                                        <td class="border yellow"><input class="yellow" id="per23" type="text"></td>
                                        <td class="border yellow"><input class="yellow" id="per24" type="text"></td>
                                        <td class="border yellow"><input class="yellow" id="per25" type="text"></td>
                                    </tr>
                                </table>
                            </div>

                            <table class="border" style="margin-left: 5%;">
                                <tr>
                                    <td class="border">tengah</td>
                                    <td class="border" width="80px"><input type="text" id="per26" readonly></td>
                                </tr>
                                <tr>
                                    <td class="border">depan</td>
                                    <td class="border"><input type="text" id="per27" readonly></td>
                                </tr>
                                <tr>
                                    <td class="border">belakang</td>
                                    <td class="border"><input type="text" id="per28" readonly></td>
                                </tr>
                                <tr>
                                    <td class="border">kiri</td>
                                    <td class="border"><input type="text" id="per29" readonly></td>
                                </tr>
                                <tr>
                                    <td class="border">kanan</td>
                                    <td class="border"><input type="text" id="per30" readonly></td>
                                </tr>
                            </table>
                        </div>

                        <br><br>
                        <hr>
                        <br><br>

                        <table>
                            <tr>
                                <th>D. Pengaruh Pengenolan Beban (Tare)</th>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td colspan="2">Massa diatas pinggan</td>
                                <td style="text-align: center;">=</td>
                                <td class="border"><input type="text"></td>
                                <td></td>
                                <td>gram</td>
                            </tr>
                            <tr>
                                <td class="border" colspan="2">Tanpa Pengenolan </td>
                                <td class="border" colspan="2">Memakai Pengenolan</td>
                            </tr>
                            <tr>
                                <td class="border">beban</td>
                                <td class="border">pembacaan</td>
                                <td class="border">beban</td>
                                <td class="border">pembacaan</td>
                            </tr>
                            <tr>
                                <td class="border">zero</td>
                                <td class="border yellow"><input type="text" class="yellow" id="peng1"></td>
                                <td class="border">zero</td>
                                <td class="border yellow"><input type="text" class="yellow" id="peng6"></td>
                            </tr>
                            <tr>
                                <td class="border">m</td>
                                <td class="border yellow"><input type="text" class="yellow" id="peng2"></td>
                                <td class="border">m</td>
                                <td class="border yellow"><input type="text" class="yellow" id="peng7"></td>
                            </tr>
                            <tr>
                                <td class="border">m</td>
                                <td class="border yellow"><input type="text" class="yellow" id="peng3"></td>
                                <td class="border">m</td>
                                <td class="border yellow"><input type="text" class="yellow" id="peng8"></td>
                            </tr>
                            <tr>
                                <td class="border">zero</td>
                                <td class="border yellow"><input type="text" class="yellow" id="peng4"></td>
                                <td class="border ">zero</td>
                                <td class="border yellow"><input type="text" class="yellow" id="peng9"></td>
                            </tr>
                            <tr>
                                <td class="border">M-Z</td>
                                <td class="border "><input type="text" id="peng5" style="text-align: center;" name="nol"
                                        readonly></td>
                                <td class="border">M-Z</td>
                                <td class="border"><input type="text" id="peng10" style="text-align: center;"
                                        name="maximum" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="2"> Pengaruh Pengenolan</td>
                                <td style="text-align: center;">=</td>
                                <td class="border"><input type="text" id="peng11" style="text-align: center;" readonly>
                                </td>
                                <td></td>
                                <td>gram</td>
                            </tr>
                        </table>

                        <br><br>
                        <hr>
                        <br><br>

                        <table>
                            <tr>
                                <th align="left">E. Histerisis</th>
                            </tr>
                            <tr>
                                <td>Pembacaan terkecil timbangan</td>
                                <td width="50px" style="text-align: center;">=</td>
                                <td class="border"><input type="text" style="text-align: center;" id="e1"></td>
                                <td style="text-align: center;">gram</td>
                            </tr>
                            <tr>
                                <td>M (Setengah Kapasitas Timbangan)</td>
                                <td style="text-align: center;">=</td>
                                <td class="border"><input type="text" style="text-align: center;" id="e2" name="beban">
                                </td>
                                <td style="text-align: center;">gram</td>
                            </tr>
                            <tr>
                                <td class="border" colspan="2">Beban diatas pinggan</td>
                                <td width="60px" class="border" align="center">1</td>
                                <td width="60px" class="border" align="center">2</td>
                                <td width="60px" class="border" align="center">3</td>
                                <td width="60px" class="border" rowspan="6"></td>
                            </tr>
                            <tr>
                                <td class="border">Zero</td>
                                <td class="border" align="center">Z1</td>
                                <td class="border yellow"><input type="text" class="yellow" id="his1"></td>
                                <td class="border yellow"><input type="text" class="yellow" id="his2"></td>
                                <td class="border yellow"><input type="text" class="yellow" id="his3"></td>
                            </tr>
                            <tr>
                                <td class="border">M</td>
                                <td class="border" align="center">M1</td>
                                <td class="border yellow"><input type="text" class="yellow" id="his4"></td>
                                <td class="border yellow"><input type="text" class="yellow" id="his5"></td>
                                <td class="border yellow"><input type="text" class="yellow" id="his6"></td>
                            </tr>
                            <tr>
                                <td class="border">M+M</td>
                                <td class="border"></td>
                                <td class="border yellow"><input type="text" class="yellow" id="his7"></td>
                                <td class="border yellow"><input type="text" class="yellow" id="his8"></td>
                                <td class="border yellow"><input type="text" class="yellow" id="his9"></td>
                            </tr>
                            <tr>
                                <td class="border">M</td>
                                <td class="border" align="center">M2</td>
                                <td class="border yellow"><input type="text" class="yellow" id="his10"></td>
                                <td class="border yellow"><input type="text" class="yellow" id="his11"></td>
                                <td class="border yellow"><input type="text" class="yellow" id="his12"></td>
                            </tr>
                            <tr>
                                <td class="border">Zero</td>
                                <td class="border" align="center">Z2</td>
                                <td class="border yellow"><input type="text" class="yellow" id="his13"></td>
                                <td class="border yellow"><input type="text" class="yellow" id="his14"></td>
                                <td class="border yellow"><input type="text" class="yellow" id="his15"></td>
                            </tr>
                            <tr>
                                <td class="border" align="center">M1-M2</td>
                                <td class="border"></td>
                                <td class="border"><input type="text" style="text-align: center;" id="his17" readonly>
                                </td>
                                <td class="border"><input type="text" style="text-align: center;" id="his18" readonly>
                                </td>
                                <td class="border"><input type="text" style="text-align: center;" id="his19" readonly>
                                </td>
                                <td class="border"><input type="text" style="text-align: center;" id="his20" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="border" align="center">Z1-Z2</td>
                                <td class="border"></td>
                                <td class="border"><input type="text" style="text-align: center;" id="his22" readonly>
                                </td>
                                <td class="border"><input type="text" style="text-align: center;" id="his23" readonly>
                                </td>
                                <td class="border"><input type="text" style="text-align: center;" id="his24" readonly>
                                </td>
                                <td class="border"><input type="text" style="text-align: center;" id="his25" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="border" colspan="5"></td>
                                <td class="border"><input type="text" style="text-align: center;" id="his26" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Histerisis = </td>
                                <td style="text-align: center;"><</td>
                                <td class="border"><input type="text" id="his27" name="histerisis"
                                        style="text-align: center;"></td>
                                <td style="text-align: center;">gram</td>
                                <td style="text-align: center;"><a href="#e1" id="histerisis1">Get Value</a></td>
                            </tr>
                        </table>

                        <br><br>
                        <hr>
                        <br><br>

                        <table>
                            <tr>
                                <th>Perhitungan Ketidakpastian</th>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>Kapasitas Alat</td>
                                <td style="text-align: center;">:</td>
                                <td class="border"><input type="text" id="kap" style="text-align: center;"></td>
                                <td style="text-align: center;">gram</td>
                            </tr>
                            <tr>
                                <td>Pembacaan Terkecil</td>
                                <td style="text-align: center;">:</td>
                                <td class="border"><input type="text" id="pem" style="text-align: center;"></td>
                                <td style="text-align: center;">gram</td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;"><a href="#ket1" id="update1">Reload</a></td>
                            </tr>
                            <tr>
                                <td class="border yellow" style="text-align: center;">Komponen</td>
                                <td class="border yellow" style="text-align: center;">Satuan</td>
                                <td class="border yellow" style="text-align: center;">Uexp (a)</td>
                                <td class="border yellow" style="text-align: center;">Sebaran</td>
                                <td class="border yellow" style="text-align: center;">Pembagi</td>
                                <td class="border yellow" style="text-align: center;">Ustd</td>
                                <td class="border yellow" style="text-align: center;">Ustd * Ustd</td>
                            </tr>
                            <tr>
                                <td class="border">Anak Timbangan</td>
                                <td class="border">gram</td>
                                <td class="border"><input type="text" style="text-align: center;" value="0.0000"
                                        id="hitunganU" readonly></td>
                                <td class="border">normal</td>
                                <td class="border"><input type="text" id="ket1" value="2" style="text-align: center;">
                                </td>
                                <td class="border"><input type="text" id="ket2" style="text-align: right;"></td>
                                <td class="border"><input type="text" id="ket3" style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td class="border">Standard</td>
                                <td></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                            </tr>
                            <tr>
                                <td class="border">Skala Terkecil</td>
                                <td class="border">gram</td>
                                <td class="border"><input type="text" id="ket4" style="text-align: center;" readonly>
                                </td>
                                <td class="border">rectangular</td>
                                <td class="border"><input type="text" id="ket5" value="1.73"
                                        style="text-align: center;">
                                </td>
                                <td class="border"><input type="text" id="ket6" style="text-align: right;"></td>
                                <td class="border"><input type="text" id="ket7" style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td class="border"><input type="text" readonly></td>
                                <td></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                            </tr>
                            <tr>
                                <td class="border">Kemampuan Ulang</td>
                                <td class="border">gram</td>
                                <td class="border"><input type="text" id="ket8" style="text-align: center;" readonly>
                                </td>
                                <td class="border">normal</td>
                                <td class="border"><input type="text" id="ket9" value="3.16"
                                        style="text-align: center;">
                                </td>
                                <td class="border"><input type="text" id="ket10" style="text-align: right;"></td>
                                <td class="border"><input type="text" id="ket11" style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td class="border">Pembacaan</td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                            </tr>
                            <tr>
                                <td class="border"><input type="text" readonly></td>
                                <td></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                            </tr>
                            <tr>
                                <td class="border">Drift</td>
                                <td class="border">gram</td>
                                <td class="border"><input type="text" id="ket12" style="text-align: center;" readonly>
                                </td>
                                <td class="border">rectangular</td>
                                <td class="border"><input type="text" id="ket13" value="1.73"
                                        style="text-align: center;">
                                </td>
                                <td class="border"><input type="text" id="ket14" style="text-align: right;"></td>
                                <td class="border"><input type="text" id="ket15" style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td class="border"><input type="text" readonly></td>
                                <td></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                                <td class="border"></td>
                            </tr>
                            <tr>
                                <td class="border">Bouyancy</td>
                                <td class="border">gram</td>
                                <td class="border"><input type="text" id="ket16" style="text-align: center;" readonly>
                                </td>
                                <td class="border">rectangular</td>
                                <td class="border"><input type="text" id="ket17" value="1.73"
                                        style="text-align: center;">
                                </td>
                                <td class="border"><input type="text" id="ket18" style="text-align: right;"></td>
                                <td class="border"><input type="text" id="ket19" style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td class="border" colspan="4"></td>
                                <td class="border" colspan="2">Gabungan</td>
                                <td class="border"><input type="text" id="ket20" style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td class="border" colspan="4"></td>
                                <td class="border" colspan="2">Ketidakpastian gabungan</td>
                                <td class="border"><input type="text" id="ket21" style="text-align: right;"></td>
                            </tr>
                            <tr>
                                <td class="border" colspan="4"></td>
                                <td class="border" colspan="2">Perluasan ketidakpastian (k=2)</td>
                                <td class="border"><input type="text" id="ket22" style="text-align: right;"></td>
                                <td class="border"><input type="text" id="ket25" name="perbedaan"
                                        style="text-align: right;"></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th>Catatan</th>
                                <td style="text-align: center;">:</td>
                            </tr>
                            <tr>
                                <td>Drift</td>
                                <td>=</td>
                                <td class="border"><input type="text" id="ket23" style="text-align: center;"></td>
                            </tr>
                            <tr>
                                <td>Bouyancy</td>
                                <td>=</td>
                                <td class="border"><input type="text" id="ket24" style="text-align: center;"></td>
                                <td>X Kapasitas Alat</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                    </div>

                    <br>
                    <div class="vanise" id="simpan">
                        <div class="email">
                            <table>
                                <tr>
                                    <td>Email 1:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm" aria-label="Small select example"
                                            id="email1" name="email1">
                                            <option selected>Foreman Kalibrasi</option>
                                            <option value="wexsurf070@gmail.com">wexsurf070@gmail.com</option>
                                            <option value="encimcuto@gmail.com">encimcuto@gmail.com</option>
                                            <option value="pklsmk5bisa@gmail.com">pklsmk5bisa@gmail.com</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email 2:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm" aria-label="Small select example"
                                            id="email2" name="email2">
                                            <option selected>Supervisor</option>
                                            <option value="wexsurf070@gmail.com">wexsurf070@gmail.com</option>
                                            <option value="fakhrifuadridwan@gmail.com">fakhrifuadridwan@gmail.com
                                            </option>
                                            <option value="pklsmk5bisa@gmail.com">pklsmk5bisa@gmail.com</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email 3:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm" aria-label="Small select example"
                                            id="email3" name="email3">
                                            <option selected>Manager Enginnering</option>
                                            <option value="wexsurf070@gmail.com">wexsurf070@gmail.com</option>
                                            <option value="encimcuto@gmail.com">encimcuto@gmail.com</option>
                                            <option value="pklsmk5bisa@gmail.com">pklsmk5bisa@gmail.com</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email 4:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm" aria-label="Small select example"
                                            id="email4" name="email4">
                                            <option selected>User</option>
                                            <option value="wexsurf070@gmail.com">wexsurf070@gmail.com</option>
                                            <option value="encimcuto@gmail.com">encimcuto@gmail.com</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </td>
                                </tr>
                            </table><input type="submit" class="btn" value="Save">
                        </div><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- js -->
    <script>
        function visibility1() {
            var perhituganBalance = document.getElementById("perhituganBalance");
            var simpan = document.getElementById("simpan");

            if (perhituganBalance.classList.contains("vanise")) {
                perhituganBalance.classList.remove("vanise");
                perhituganBalance.classList.add("normal");
                simpan.classList.remove("centered");
                simpan.classList.add("vanise");
            }
        }
        function visibility2() {
            var perhituganBalance = document.getElementById("perhituganBalance");
            var simpan = document.getElementById("simpan");

            if (simpan.classList.contains("vanise")) {
                simpan.classList.remove("vanise");
                simpan.classList.add("centered");
                perhituganBalance.classList.remove("normal");
                perhituganBalance.classList.add("vanise");
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputForm = document.getElementById('inputForm');
            const nominalMassa = document.getElementById('nominal_massa1');
            fetchFormData();
            function fetchFormData() {
                const selectedId = nominalMassa.value;
                fetch(`get_massa.php?id=${selectedId}`)
                    .then(response => response.json())
                    .then(data => {
                        inputForm.nominal1.value = data.nominal_massa;
                        inputForm.standar1.value = data.massa_kalibrasi;
                        inputForm.u951.value = data.u95;
                    })
                    .catch(error => console.error('Error:', error));
            }

            nominalMassa.addEventListener('change', function () {
                fetchFormData();
            });
            function populateDropdown() {
                fetch('get_massa_k.php')
                    .then(response => response.json())
                    .then(data => {
                        nominalMassa.innerHTML = '';

                        const defaultOption = document.createElement('option');
                        defaultOption.text = 'nominalMassa';
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        nominalMassa.appendChild(defaultOption);

                        data.forEach(option => {
                            const newOption = document.createElement('option');
                            newOption.value = option.id;
                            newOption.text = option.nominal_massa;
                            nominalMassa.appendChild(newOption);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
            populateDropdown();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputForm = document.getElementById('inputForm');
            const nominalMassa = document.getElementById('nominal_massa2');
            fetchFormData();
            function fetchFormData() {
                const selectedId = nominalMassa.value;
                fetch(`get_massa.php?id=${selectedId}`)
                    .then(response => response.json())
                    .then(data => {
                        inputForm.nominal2.value = data.nominal_massa;
                        inputForm.standar2.value = data.massa_kalibrasi;
                        inputForm.u952.value = data.u95;
                    })
                    .catch(error => console.error('Error:', error));
            }

            nominalMassa.addEventListener('change', function () {
                fetchFormData();
            });
            function populateDropdown() {
                fetch('get_massa_k.php')
                    .then(response => response.json())
                    .then(data => {
                        nominalMassa.innerHTML = '';

                        const defaultOption = document.createElement('option');
                        defaultOption.text = 'nominalMassa';
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        nominalMassa.appendChild(defaultOption);

                        data.forEach(option => {
                            const newOption = document.createElement('option');
                            newOption.value = option.id;
                            newOption.text = option.nominal_massa;
                            nominalMassa.appendChild(newOption);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
            populateDropdown();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputForm = document.getElementById('inputForm');
            const nominalMassa = document.getElementById('nominal_massa3');
            fetchFormData();
            function fetchFormData() {
                const selectedId = nominalMassa.value;
                fetch(`get_massa.php?id=${selectedId}`)
                    .then(response => response.json())
                    .then(data => {
                        inputForm.nominal3.value = data.nominal_massa;
                        inputForm.standar3.value = data.massa_kalibrasi;
                        inputForm.u953.value = data.u95;
                    })
                    .catch(error => console.error('Error:', error));
            }

            nominalMassa.addEventListener('change', function () {
                fetchFormData();
            });
            function populateDropdown() {
                fetch('get_massa_k.php')
                    .then(response => response.json())
                    .then(data => {
                        nominalMassa.innerHTML = '';

                        const defaultOption = document.createElement('option');
                        defaultOption.text = 'nominalMassa';
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        nominalMassa.appendChild(defaultOption);

                        data.forEach(option => {
                            const newOption = document.createElement('option');
                            newOption.value = option.id;
                            newOption.text = option.nominal_massa;
                            nominalMassa.appendChild(newOption);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
            populateDropdown();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputForm = document.getElementById('inputForm');
            const nominalMassa = document.getElementById('nominal_massa4');
            fetchFormData();
            function fetchFormData() {
                const selectedId = nominalMassa.value;
                fetch(`get_massa.php?id=${selectedId}`)
                    .then(response => response.json())
                    .then(data => {
                        inputForm.nominal4.value = data.nominal_massa;
                        inputForm.standar4.value = data.massa_kalibrasi;
                        inputForm.u954.value = data.u95;
                    })
                    .catch(error => console.error('Error:', error));
            }

            nominalMassa.addEventListener('change', function () {
                fetchFormData();
            });
            function populateDropdown() {
                fetch('get_massa_k.php')
                    .then(response => response.json())
                    .then(data => {
                        nominalMassa.innerHTML = '';

                        const defaultOption = document.createElement('option');
                        defaultOption.text = 'nominalMassa';
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        nominalMassa.appendChild(defaultOption);

                        data.forEach(option => {
                            const newOption = document.createElement('option');
                            newOption.value = option.id;
                            newOption.text = option.nominal_massa;
                            nominalMassa.appendChild(newOption);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
            populateDropdown();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputForm = document.getElementById('inputForm');
            const nominalMassa = document.getElementById('nominal_massa5');
            fetchFormData();
            function fetchFormData() {
                const selectedId = nominalMassa.value;
                fetch(`get_massa.php?id=${selectedId}`)
                    .then(response => response.json())
                    .then(data => {
                        inputForm.nominal5.value = data.nominal_massa;
                        inputForm.standar5.value = data.massa_kalibrasi;
                        inputForm.u955.value = data.u95;
                    })
                    .catch(error => console.error('Error:', error));
            }

            nominalMassa.addEventListener('change', function () {
                fetchFormData();
            });
            function populateDropdown() {
                fetch('get_massa_k.php')
                    .then(response => response.json())
                    .then(data => {
                        nominalMassa.innerHTML = '';

                        const defaultOption = document.createElement('option');
                        defaultOption.text = 'nominalMassa';
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        nominalMassa.appendChild(defaultOption);

                        data.forEach(option => {
                            const newOption = document.createElement('option');
                            newOption.value = option.id;
                            newOption.text = option.nominal_massa;
                            nominalMassa.appendChild(newOption);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
            populateDropdown();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputForm = document.getElementById('inputForm');
            const nominalMassa = document.getElementById('nominal_massa6');
            fetchFormData();
            function fetchFormData() {
                const selectedId = nominalMassa.value;
                fetch(`get_massa.php?id=${selectedId}`)
                    .then(response => response.json())
                    .then(data => {
                        inputForm.nominal6.value = data.nominal_massa;
                        inputForm.standar6.value = data.massa_kalibrasi;
                        inputForm.u956.value = data.u95;
                    })
                    .catch(error => console.error('Error:', error));
            }

            nominalMassa.addEventListener('change', function () {
                fetchFormData();
            });
            function populateDropdown() {
                fetch('get_massa_k.php')
                    .then(response => response.json())
                    .then(data => {
                        nominalMassa.innerHTML = '';

                        const defaultOption = document.createElement('option');
                        defaultOption.text = 'nominalMassa';
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        nominalMassa.appendChild(defaultOption);

                        data.forEach(option => {
                            const newOption = document.createElement('option');
                            newOption.value = option.id;
                            newOption.text = option.nominal_massa;
                            nominalMassa.appendChild(newOption);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
            populateDropdown();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputForm = document.getElementById('inputForm');
            const nominalMassa = document.getElementById('nominal_massa7');
            fetchFormData();
            function fetchFormData() {
                const selectedId = nominalMassa.value;
                fetch(`get_massa.php?id=${selectedId}`)
                    .then(response => response.json())
                    .then(data => {
                        inputForm.nominal7.value = data.nominal_massa;
                        inputForm.standar7.value = data.massa_kalibrasi;
                        inputForm.u957.value = data.u95;
                    })
                    .catch(error => console.error('Error:', error));
            }

            nominalMassa.addEventListener('change', function () {
                fetchFormData();
            });
            function populateDropdown() {
                fetch('get_massa_k.php')
                    .then(response => response.json())
                    .then(data => {
                        nominalMassa.innerHTML = '';

                        const defaultOption = document.createElement('option');
                        defaultOption.text = 'nominalMassa';
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        nominalMassa.appendChild(defaultOption);

                        data.forEach(option => {
                            const newOption = document.createElement('option');
                            newOption.value = option.id;
                            newOption.text = option.nominal_massa;
                            nominalMassa.appendChild(newOption);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
            populateDropdown();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputForm = document.getElementById('inputForm');
            const nominalMassa = document.getElementById('nominal_massa8');
            fetchFormData();
            function fetchFormData() {
                const selectedId = nominalMassa.value;
                fetch(`get_massa.php?id=${selectedId}`)
                    .then(response => response.json())
                    .then(data => {
                        inputForm.nominal8.value = data.nominal_massa;
                        inputForm.standar8.value = data.massa_kalibrasi;
                        inputForm.u958.value = data.u95;
                    })
                    .catch(error => console.error('Error:', error));
            }

            nominalMassa.addEventListener('change', function () {
                fetchFormData();
            });
            function populateDropdown() {
                fetch('get_massa_k.php')
                    .then(response => response.json())
                    .then(data => {
                        nominalMassa.innerHTML = '';

                        const defaultOption = document.createElement('option');
                        defaultOption.text = 'nominalMassa';
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        nominalMassa.appendChild(defaultOption);

                        data.forEach(option => {
                            const newOption = document.createElement('option');
                            newOption.value = option.id;
                            newOption.text = option.nominal_massa;
                            nominalMassa.appendChild(newOption);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
            populateDropdown();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputForm = document.getElementById('inputForm');
            const nominalMassa = document.getElementById('nominal_massa9');
            fetchFormData();
            function fetchFormData() {
                const selectedId = nominalMassa.value;
                fetch(`get_massa.php?id=${selectedId}`)
                    .then(response => response.json())
                    .then(data => {
                        inputForm.nominal9.value = data.nominal_massa;
                        inputForm.standar9.value = data.massa_kalibrasi;
                        inputForm.u959.value = data.u95;
                    })
                    .catch(error => console.error('Error:', error));
            }

            nominalMassa.addEventListener('change', function () {
                fetchFormData();
            });
            function populateDropdown() {
                fetch('get_massa_k.php')
                    .then(response => response.json())
                    .then(data => {
                        nominalMassa.innerHTML = '';

                        const defaultOption = document.createElement('option');
                        defaultOption.text = 'nominalMassa';
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        nominalMassa.appendChild(defaultOption);

                        data.forEach(option => {
                            const newOption = document.createElement('option');
                            newOption.value = option.id;
                            newOption.text = option.nominal_massa;
                            nominalMassa.appendChild(newOption);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
            populateDropdown();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formFlowmeter = document.getElementById('formFlowmeter');
            const kodeAlat = document.getElementById('kode_alat');
            fetchFormData();
            function fetchFormData() {
                const selectedId = kodeAlat.value;
                fetch(`get_data.php?id=${selectedId}`)
                    .then(response => response.json())
                    .then(data => {
                        formFlowmeter.departemen_pemilik.value = data.departemen_pemilik;
                        formFlowmeter.nama_alat.value = data.nama_alat;
                        formFlowmeter.kode_alat.value = data.kode_alat;
                        formFlowmeter.merk_alat.value = data.merk_alat;
                        formFlowmeter.tipe.value = data.tipe;
                        formFlowmeter.lokasi_alat.value = data.lokasi_alat;
                        formFlowmeter.kalibrasi.value = data.nomor_kalibrasi;
                        formFlowmeter.resolusi.value = data.resolusi;
                        formFlowmeter.pembacaan_terkecil.value = data.pembacaan_terkecil;
                        formFlowmeter.kapasitas.value = data.kapasitas;
                        formFlowmeter.kapasitas_alat.value = data.kapasitas_alat;
                        formFlowmeter.range_penggunaan.value = data.range_penggunaan_alat;
                        formFlowmeter.limits_of_permissible_error.value = data.limits_of_permissible_error;
                        formFlowmeter.relates_form_balances.value = data.relates_form_balances;
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
                        defaultOption.text = 'Pilih Kode Alat';
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
        const inputs = {};
        for (let i = 1; i <= 120; i++) {
            inputs[`input${i}`] = document.getElementById(`input${i}`);
        }

        function formatNumber(num) {
            return num.toFixed(3); // Format number to 2 decimal places
        }

        function calculateAndUpdate() {
            // First Table Calculations
            // 1 and 2 for input3 and input4
            let val1 = Number(inputs.input1.value) || 0;
            let val2 = Number(inputs.input2.value) || 0;
            let val7 = Number(inputs.input7.value) || 0;

            let result1 = Math.abs(val1 - val2);
            let total1 = Math.abs(result1 - val7);

            inputs.input3.value = formatNumber(result1);
            inputs.input4.value = formatNumber(total1);

            // 5 and 6 for input7 and input8
            let val5 = Number(inputs.input5.value) || 0;
            let val6 = Number(inputs.input6.value) || 0;
            let val11 = Number(inputs.input11.value) || 0;

            let result2 = Math.abs(val5 - val6);
            let total2 = Math.abs(result2 - val11);

            inputs.input7.value = formatNumber(result2);
            inputs.input8.value = formatNumber(total2);

            // 9 and 10 for input11 and input12
            let val9 = Number(inputs.input9.value) || 0;
            let val10 = Number(inputs.input10.value) || 0;
            let val15 = Number(inputs.input15.value) || 0;

            let result3 = Math.abs(val9 - val10);
            let total3 = Math.abs(result3 - val15);

            inputs.input11.value = formatNumber(result3);
            inputs.input12.value = formatNumber(total3);

            // 13 and 14 for input15 and input16
            let val13 = Number(inputs.input13.value) || 0;
            let val14 = Number(inputs.input14.value) || 0;
            let val19 = Number(inputs.input19.value) || 0;

            let result4 = Math.abs(val13 - val14);
            let total4 = Math.abs(result4 - val19);

            inputs.input15.value = formatNumber(result4);
            inputs.input16.value = formatNumber(total4);

            // 17 and 18 for input19 and input20
            let val17 = Number(inputs.input17.value) || 0;
            let val18 = Number(inputs.input18.value) || 0;
            let val23 = Number(inputs.input23.value) || 0;

            let result5 = Math.abs(val17 - val18);
            let total5 = Math.abs(result5 - val23);

            inputs.input19.value = formatNumber(result5);
            inputs.input20.value = formatNumber(total5);

            // 21 and 22 for input23 and input24
            let val21 = Number(inputs.input21.value) || 0;
            let val22 = Number(inputs.input22.value) || 0;
            let val27 = Number(inputs.input27.value) || 0;

            let result6 = Math.abs(val21 - val22);
            let total6 = Math.abs(result6 - val27);

            inputs.input23.value = formatNumber(result6);
            inputs.input24.value = formatNumber(total6);

            // 25 and 26 for input27 and input28
            let val25 = Number(inputs.input25.value) || 0;
            let val26 = Number(inputs.input26.value) || 0;
            let val31 = Number(inputs.input31.value) || 0;

            let result7 = Math.abs(val25 - val26);
            let total7 = Math.abs(result7 - val31);

            inputs.input27.value = formatNumber(result7);
            inputs.input28.value = formatNumber(total7);

            // 29 and 30 for input31 and input32
            let val29 = Number(inputs.input29.value) || 0;
            let val30 = Number(inputs.input30.value) || 0;
            let val35 = Number(inputs.input35.value) || 0;

            let result8 = Math.abs(val29 - val30);
            let total8 = Math.abs(result8 - val35);

            inputs.input31.value = formatNumber(result8);
            inputs.input32.value = formatNumber(total8);

            // 33 and 34 for input35 and input36
            let val33 = Number(inputs.input33.value) || 0;
            let val34 = Number(inputs.input34.value) || 0;
            let val39 = Number(inputs.input39.value) || 0;

            let result9 = Math.abs(val33 - val34);
            let total9 = Math.abs(result9 - val39);

            inputs.input35.value = formatNumber(result9);
            inputs.input36.value = formatNumber(total9);

            // 37 and 38 for input39
            let val37 = Number(inputs.input37.value) || 0;
            let val38 = Number(inputs.input38.value) || 0;

            let result10 = Math.abs(val37 - val38);

            inputs.input39.value = formatNumber(result10);

            // Second Table Calculations
            // 1 and 2 for input43 and input44
            let val41 = Number(inputs.input41.value) || 0;
            let val42 = Number(inputs.input42.value) || 0;
            let val47 = Number(inputs.input47.value) || 0;

            let result11 = Math.abs(val41 - val42);
            let total11 = Math.abs(result11 - val47);

            inputs.input43.value = formatNumber(result11);
            inputs.input44.value = formatNumber(total11);

            // 5 and 6 for input47 and input48
            let val45 = Number(inputs.input45.value) || 0;
            let val46 = Number(inputs.input46.value) || 0;
            let val51 = Number(inputs.input51.value) || 0;

            let result12 = Math.abs(val45 - val46);
            let total12 = Math.abs(result12 - val51);

            inputs.input47.value = formatNumber(result12);
            inputs.input48.value = formatNumber(total12);

            // 9 and 10 for input51 and input52
            let val49 = Number(inputs.input49.value) || 0;
            let val50 = Number(inputs.input50.value) || 0;
            let val55 = Number(inputs.input55.value) || 0;

            let result13 = Math.abs(val49 - val50);
            let total13 = Math.abs(result13 - val55);

            inputs.input51.value = formatNumber(result13);
            inputs.input52.value = formatNumber(total13);

            // 13 and 14 for input55 and input56
            let val53 = Number(inputs.input53.value) || 0;
            let val54 = Number(inputs.input54.value) || 0;
            let val59 = Number(inputs.input59.value) || 0;

            let result14 = Math.abs(val53 - val54);
            let total14 = Math.abs(result14 - val59);

            inputs.input55.value = formatNumber(result14);
            inputs.input56.value = formatNumber(total14);

            // 17 and 18 for input59 and input60
            let val57 = Number(inputs.input57.value) || 0;
            let val58 = Number(inputs.input58.value) || 0;
            let val63 = Number(inputs.input63.value) || 0;

            let result15 = Math.abs(val57 - val58);
            let total15 = Math.abs(result15 - val63);

            inputs.input59.value = formatNumber(result15);
            inputs.input60.value = formatNumber(total15);

            // 21 and 22 for input63 and input64
            let val61 = Number(inputs.input61.value) || 0;
            let val62 = Number(inputs.input62.value) || 0;
            let val67 = Number(inputs.input67.value) || 0;

            let result16 = Math.abs(val61 - val62);
            let total16 = Math.abs(result16 - val67);

            inputs.input63.value = formatNumber(result16);
            inputs.input64.value = formatNumber(total16);

            // 25 and 26 for input67 and input68
            let val65 = Number(inputs.input65.value) || 0;
            let val66 = Number(inputs.input66.value) || 0;
            let val71 = Number(inputs.input71.value) || 0;

            let result17 = Math.abs(val65 - val66);
            let total17 = Math.abs(result17 - val71);

            inputs.input67.value = formatNumber(result17);
            inputs.input68.value = formatNumber(total17);

            // 29 and 30 for input71 and input72
            let val69 = Number(inputs.input69.value) || 0;
            let val70 = Number(inputs.input70.value) || 0;
            let val75 = Number(inputs.input75.value) || 0;

            let result18 = Math.abs(val69 - val70);
            let total18 = Math.abs(result18 - val75);

            inputs.input71.value = formatNumber(result18);
            inputs.input72.value = formatNumber(total18);

            // 33 and 34 for input75 and input76
            let val73 = Number(inputs.input73.value) || 0;
            let val74 = Number(inputs.input74.value) || 0;
            let val79 = Number(inputs.input79.value) || 0;

            let result19 = Math.abs(val73 - val74);
            let total19 = Math.abs(result19 - val79);

            inputs.input75.value = formatNumber(result19);
            inputs.input76.value = formatNumber(total19);

            // 37 and 38 for input79
            let val77 = Number(inputs.input77.value) || 0;
            let val78 = Number(inputs.input78.value) || 0;

            let result20 = Math.abs(val77 - val78);

            inputs.input79.value = formatNumber(result20);

            // Third Table Calculations
            // 1 and 2 for input83 and input84
            let val81 = Number(inputs.input81.value) || 0;
            let val82 = Number(inputs.input82.value) || 0;
            let val87 = Number(inputs.input87.value) || 0;

            let result21 = Math.abs(val81 - val82);
            let total21 = Math.abs(result21 - val87);

            inputs.input83.value = formatNumber(result21);
            inputs.input84.value = formatNumber(total21);

            // 5 and 6 for input87 and input88
            let val85 = Number(inputs.input85.value) || 0;
            let val86 = Number(inputs.input86.value) || 0;
            let val91 = Number(inputs.input91.value) || 0;

            let result22 = Math.abs(val85 - val86);
            let total22 = Math.abs(result22 - val91);

            inputs.input87.value = formatNumber(result22);
            inputs.input88.value = formatNumber(total22);

            // 9 and 10 for input91 and input92
            let val89 = Number(inputs.input89.value) || 0;
            let val90 = Number(inputs.input90.value) || 0;
            let val95 = Number(inputs.input95.value) || 0;

            let result23 = Math.abs(val89 - val90);
            let total23 = Math.abs(result23 - val95);

            inputs.input91.value = formatNumber(result23);
            inputs.input92.value = formatNumber(total23);

            // 13 and 14 for input95 and input96
            let val93 = Number(inputs.input93.value) || 0;
            let val94 = Number(inputs.input94.value) || 0;
            let val99 = Number(inputs.input99.value) || 0;

            let result24 = Math.abs(val93 - val94);
            let total24 = Math.abs(result24 - val99);

            inputs.input95.value = formatNumber(result24);
            inputs.input96.value = formatNumber(total24);

            // 17 and 18 for input99 and input100
            let val97 = Number(inputs.input97.value) || 0;
            let val98 = Number(inputs.input98.value) || 0;
            let val103 = Number(inputs.input103.value) || 0;

            let result25 = Math.abs(val97 - val98);
            let total25 = Math.abs(result25 - val103);

            inputs.input99.value = formatNumber(result25);
            inputs.input100.value = formatNumber(total25);

            // 21 and 22 for input103 and input104
            let val101 = Number(inputs.input101.value) || 0;
            let val102 = Number(inputs.input102.value) || 0;
            let val107 = Number(inputs.input107.value) || 0;

            let result26 = Math.abs(val101 - val102);
            let total26 = Math.abs(result26 - val107);

            inputs.input103.value = formatNumber(result26);
            inputs.input104.value = formatNumber(total26);


            // 25 and 26 for input107 and input108
            let val105 = Number(inputs.input105.value) || 0;
            let val106 = Number(inputs.input106.value) || 0;
            let val111 = Number(inputs.input111.value) || 0;

            let result27 = Math.abs(val105 - val106);
            let total27 = Math.abs(result27 - val111);

            inputs.input107.value = formatNumber(result27);
            inputs.input108.value = formatNumber(total27);

            // 29 and 30 for input111 and input112
            let val109 = Number(inputs.input109.value) || 0;
            let val110 = Number(inputs.input110.value) || 0;
            let val115 = Number(inputs.input115.value) || 0;

            let result28 = Math.abs(val109 - val110);
            let total28 = Math.abs(result28 - val115);

            inputs.input111.value = formatNumber(result28);
            inputs.input112.value = formatNumber(total28);

            // 33 and 34 for input115 and input116
            let val113 = Number(inputs.input113.value) || 0;
            let val114 = Number(inputs.input114.value) || 0;
            let val119 = Number(inputs.input119.value) || 0;

            let result29 = Math.abs(val113 - val114);
            let total29 = Math.abs(result29 - val119);

            inputs.input115.value = formatNumber(result29);
            inputs.input116.value = formatNumber(total29);

            // 37 and 38 for input119
            let val117 = Number(inputs.input117.value) || 0;
            let val118 = Number(inputs.input118.value) || 0;

            let result30 = Math.abs(val117 - val118);

            inputs.input119.value = formatNumber(result30);
        }

        // Fungsi untuk menghitung standar deviasi
        function stdev1() {
            // Bagian pertama: Menghitung standar deviasi dari set pertama
            // Ambil nilai dari input dan ubah ke angka
            let val3 = Number(document.getElementById('input3').value) || 0;
            let val7 = Number(document.getElementById('input7').value) || 0;
            let val11 = Number(document.getElementById('input11').value) || 0;
            let val15 = Number(document.getElementById('input15').value) || 0;
            let val19 = Number(document.getElementById('input19').value) || 0;
            let val23 = Number(document.getElementById('input23').value) || 0;
            let val27 = Number(document.getElementById('input27').value) || 0;
            let val31 = Number(document.getElementById('input31').value) || 0;
            let val35 = Number(document.getElementById('input35').value) || 0;
            let val39 = Number(document.getElementById('input39').value) || 0;

            // hitung rata-rata 
            let val4 = Number(document.getElementById('input4').value) || 0;
            let val8 = Number(document.getElementById('input8').value) || 0;
            let val12 = Number(document.getElementById('input12').value) || 0;
            let val16 = Number(document.getElementById('input16').value) || 0;
            let val20 = Number(document.getElementById('input20').value) || 0;
            let val24 = Number(document.getElementById('input24').value) || 0;
            let val28 = Number(document.getElementById('input28').value) || 0;
            let val32 = Number(document.getElementById('input32').value) || 0;
            let val36 = Number(document.getElementById('input36').value) || 0;

            let values = [val4, val8, val12, val16, val20, val24, val28, val32, val36];

            let maxValue = Math.max(...values);

            // Hitung rata-rata untuk set pertama
            let a = (val3 + val7 + val11 + val15 + val19 + val23 + val27 + val31 + val35 + val39);
            let mean = a / 10;

            // Hitung deviasi kuadrat untuk set pertama
            let h1 = (val3 - mean) ** 2;
            let h2 = (val7 - mean) ** 2;
            let h3 = (val11 - mean) ** 2;
            let h4 = (val15 - mean) ** 2;
            let h5 = (val19 - mean) ** 2;
            let h6 = (val23 - mean) ** 2;
            let h7 = (val27 - mean) ** 2;
            let h8 = (val31 - mean) ** 2;
            let h9 = (val35 - mean) ** 2;
            let h10 = (val39 - mean) ** 2;

            let sumOfSquares = h1 + h2 + h3 + h4 + h5 + h6 + h7 + h8 + h9 + h10;
            let variance = sumOfSquares / (10 - 1); // Varians untuk sampel (N - 1)

            // Hitung standar deviasi untuk set pertama
            let stddev = Math.sqrt(variance);

            // Tampilkan hasil untuk set pertama
            document.getElementById('standarD1').value = stddev.toFixed(3);
            document.getElementById('average1').value = maxValue.toFixed(2);


            // Bagian kedua: Menghitung standar deviasi dari set kedua
            // Ambil nilai dari input dan ubah ke angka
            let val43 = Number(document.getElementById('input43').value) || 0;
            let val47 = Number(document.getElementById('input47').value) || 0;
            let val51 = Number(document.getElementById('input51').value) || 0;
            let val55 = Number(document.getElementById('input55').value) || 0;
            let val59 = Number(document.getElementById('input59').value) || 0;
            let val63 = Number(document.getElementById('input63').value) || 0;
            let val67 = Number(document.getElementById('input67').value) || 0;
            let val71 = Number(document.getElementById('input71').value) || 0;
            let val75 = Number(document.getElementById('input75').value) || 0;
            let val79 = Number(document.getElementById('input79').value) || 0;

            // hitungan rata rata 2
            let val44 = Number(document.getElementById('input44').value) || 0;
            let val48 = Number(document.getElementById('input48').value) || 0;
            let val52 = Number(document.getElementById('input52').value) || 0;
            let val56 = Number(document.getElementById('input56').value) || 0;
            let val60 = Number(document.getElementById('input60').value) || 0;
            let val64 = Number(document.getElementById('input64').value) || 0;
            let val68 = Number(document.getElementById('input68').value) || 0;
            let val72 = Number(document.getElementById('input72').value) || 0;
            let val76 = Number(document.getElementById('input76').value) || 0;

            let valuess = [val44, val48, val52, val56, val60, val64, val68, val72, val76];

            let maxValues = Math.max(...valuess);

            // Hitung rata-rata untuk set kedua
            let b = (val43 + val47 + val51 + val55 + val59 + val63 + val67 + val71 + val75 + val79);
            let means = b / 10;

            // Hitung deviasi kuadrat untuk set kedua
            let b1 = (val43 - means) ** 2;
            let b2 = (val47 - means) ** 2;
            let b3 = (val51 - means) ** 2;
            let b4 = (val55 - means) ** 2;
            let b5 = (val59 - means) ** 2;
            let b6 = (val63 - means) ** 2;
            let b7 = (val67 - means) ** 2;
            let b8 = (val71 - means) ** 2;
            let b9 = (val75 - means) ** 2;
            let b10 = (val79 - means) ** 2;

            let sum = b1 + b2 + b3 + b4 + b5 + b6 + b7 + b8 + b9 + b10;
            let varian = sum / (10 - 1); // Varians untuk sampel (N - 1)

            // Hitung standar deviasi untuk set kedua
            let sttdev = Math.sqrt(varian);

            // Tampilkan hasil untuk set kedua
            document.getElementById('standarD2').value = sttdev.toFixed(3);
            document.getElementById('average2').value = maxValues.toFixed(2);

            // Bagian ketiga: Menghitung standar deviasi dari set ketiga
            // Ambil nilai dari input dan ubah ke angka
            let val83 = Number(document.getElementById('input83').value) || 0;
            let val87 = Number(document.getElementById('input87').value) || 0;
            let val91 = Number(document.getElementById('input91').value) || 0;
            let val95 = Number(document.getElementById('input95').value) || 0;
            let val99 = Number(document.getElementById('input99').value) || 0;
            let val103 = Number(document.getElementById('input103').value) || 0;
            let val107 = Number(document.getElementById('input107').value) || 0;
            let val111 = Number(document.getElementById('input111').value) || 0;
            let val115 = Number(document.getElementById('input115').value) || 0;
            let val119 = Number(document.getElementById('input119').value) || 0;

            // hitungan rata rata 3
            let val84 = Number(document.getElementById('input84').value) || 0;
            let val88 = Number(document.getElementById('input88').value) || 0;
            let val92 = Number(document.getElementById('input92').value) || 0;
            let val96 = Number(document.getElementById('input96').value) || 0;
            let val100 = Number(document.getElementById('input100').value) || 0;
            let val104 = Number(document.getElementById('input104').value) || 0;
            let val108 = Number(document.getElementById('input108').value) || 0;
            let val112 = Number(document.getElementById('input112').value) || 0;
            let val116 = Number(document.getElementById('input116').value) || 0;

            let valuesss = [val84, val88, val92, val96, val100, val104, val108, val112, val116];

            let maxValuess = Math.max(...valuesss);

            // Hitung rata-rata untuk set kedua
            let c = (val83 + val87 + val91 + val95 + val99 + val103 + val107 + val111 + val115 + val119);
            let meanss = c / 10;

            // Hitung deviasi kuadrat untuk set kedua
            let t1 = (val83 - meanss) ** 2;
            let t2 = (val87 - meanss) ** 2;
            let t3 = (val91 - meanss) ** 2;
            let t4 = (val95 - meanss) ** 2;
            let t5 = (val99 - meanss) ** 2;
            let t6 = (val103 - meanss) ** 2;
            let t7 = (val107 - meanss) ** 2;
            let t8 = (val111 - meanss) ** 2;
            let t9 = (val115 - meanss) ** 2;
            let t10 = (val119 - meanss) ** 2;

            let sumw = t1 + t2 + t3 + t4 + t5 + t6 + t7 + t8 + t9 + t10;
            let varianw = sumw / (10 - 1); // Varians untuk sampel (N - 1)

            // Hitung standar deviasi untuk set kedua
            let sttdevw = Math.sqrt(varianw);

            // Tampilkan hasil untuk set kedua
            document.getElementById('standarD3').value = sttdevw.toFixed(3);
            document.getElementById('average3').value = maxValuess.toFixed(2);

            // max stdev
            let valuese = [stddev, sttdev, sttdevw];
            let maxStdev = Math.max(...valuese);

            document.getElementById('ket8').value = maxStdev.toFixed(2);
        }

        document.getElementById('update1').addEventListener('click', function (event) {
            event.preventDefault(); // Mencegah link dari mengikuti URL
            stdev1(); // Panggil fungsi stdev
        });

        // Event listener untuk tombol pertama
        document.getElementById('hitungSD1').addEventListener('click', function (event) {
            event.preventDefault(); // Mencegah link dari mengikuti URL
            stdev1(); // Panggil fungsi stdev
        });

        // Event listener untuk tombol kedua
        document.getElementById('hitungSD2').addEventListener('click', function (event) {
            event.preventDefault(); // Mencegah link dari mengikuti URL
            stdev1(); // Panggil fungsi stdev
        });

        // Event listener untuk tombol tiga
        document.getElementById('hitungSD3').addEventListener('click', function (event) {
            event.preventDefault(); // Mencegah link dari mengikuti URL
            stdev1(); // Panggil fungsi stdevw
        });

        document.addEventListener("input", calculateAndUpdate);
    </script>
    <script>
        const inputd = {};
        // Mengumpulkan semua elemen input dengan ID ave0 hingga ave59
        for (let i = 0; i <= 167; i++) {
            inputd[`ave${i}`] = document.getElementById(`ave${i}`);
        }

        inputd.standar1 = document.getElementById('standar1');
        inputd.standar2 = document.getElementById('standar2');
        inputd.standar3 = document.getElementById('standar3');
        inputd.standar4 = document.getElementById('standar4');
        inputd.standar5 = document.getElementById('standar5');
        inputd.standar6 = document.getElementById('standar6');
        inputd.standar7 = document.getElementById('standar7');
        inputd.standar8 = document.getElementById('standar8');
        inputd.standar9 = document.getElementById('standar9');

        function calculateAndUpdate() {
            // Tab 1
            let val1Tab1 = Number(inputd.ave0.value) || 0;
            let val2Tab1 = Number(inputd.ave18.value) || 0;
            let standar1 = parseFloat(inputd.standar1.value.replace(/,/g, '')) || 0;

            let result1Tab1 = Math.abs(val1Tab1 - val2Tab1);
            inputd.ave1.value = formatNumber(result1Tab1);

            let val3Tab1 = Number(inputd.ave6.value) || 0;
            let val4Tab1 = Number(inputd.ave12.value) || 0;

            let result2Tab1 = Math.abs(val3Tab1 + val4Tab1) / 2;
            let totalTab1 = Math.abs(result1Tab1 - result2Tab1);
            let hasilTab1 = Math.abs(totalTab1 - standar1);

            inputd.ave7.value = formatNumber(result2Tab1);
            inputd.ave2.value = formatNumber(totalTab1);
            inputd.ave4.value = formatNumber(hasilTab1);
            inputd.ave5.value = formatNumber(hasilTab1);

            // Tab 2
            let val1Tab2 = Number(inputd.ave18.value) || 0;
            let val2Tab2 = Number(inputd.ave36.value) || 0;
            let standar2 = parseFloat(inputd.standar2.value.replace(/,/g, '')) || 0;

            let result1Tab2 = Math.abs(val1Tab2 - val2Tab2);
            inputd.ave19.value = formatNumber(result1Tab2);

            let val3Tab2 = Number(inputd.ave24.value) || 0;
            let val4Tab2 = Number(inputd.ave30.value) || 0;

            let result2Tab2 = Math.abs(val3Tab2 + val4Tab2) / 2;
            let totalTab2 = Math.abs(result1Tab2 - result2Tab2);
            let hasilTab2 = Math.abs(totalTab2 - standar2);

            inputd.ave25.value = formatNumber(result2Tab2);
            inputd.ave20.value = formatNumber(totalTab2);
            inputd.ave22.value = formatNumber(hasilTab2);
            inputd.ave23.value = formatNumber(hasilTab2);

            // Tab 3
            let val1tab3 = Number(inputd.ave36.value) || 0;
            let val2tab3 = Number(inputd.ave54.value) || 0;
            let standar3 = parseFloat(inputd.standar3.value.replace(/,/g, '')) || 0;

            let result1tab3 = Math.abs(val1tab3 - val2tab3);
            inputd.ave37.value = formatNumber(result1tab3);

            let val3tab3 = Number(inputd.ave42.value) || 0;
            let val4tab3 = Number(inputd.ave48.value) || 0;

            let result2tab3 = Math.abs(val3tab3 + val4tab3) / 2;
            let totaltab3 = Math.abs(result1tab3 - result2tab3);
            let hasiltab3 = Math.abs(totaltab3 - standar3);

            inputd.ave43.value = formatNumber(result2tab3);
            inputd.ave38.value = formatNumber(totaltab3);
            inputd.ave40.value = formatNumber(hasiltab3);
            inputd.ave41.value = formatNumber(hasiltab3);

            // Tab 4
            let val1tab4 = Number(inputd.ave54.value) || 0;
            let val2tab4 = Number(inputd.ave72.value) || 0;
            let standar4 = parseFloat(inputd.standar4.value.replace(/,/g, '')) || 0;

            let result1tab4 = Math.abs(val1tab4 - val2tab4);
            inputd.ave55.value = formatNumber(result1tab4);

            let val3tab4 = Number(inputd.ave60.value);
            let val4tab4 = Number(inputd.ave66.value);

            let result2tab4 = Math.abs(val3tab4 + val4tab4) / 2;
            let totaltab4 = Math.abs(result1tab4 - result2tab4);
            let hasiltab4 = Math.abs(totaltab4 - standar4);

            inputd.ave61.value = formatNumber(result2tab4);
            inputd.ave56.value = formatNumber(totaltab4);
            inputd.ave58.value = formatNumber(hasiltab4);
            inputd.ave59.value = formatNumber(hasiltab4);

            // Tab 5
            let val1tab5 = Number(inputd.ave72.value) || 0;
            let val2tab5 = Number(inputd.ave90.value) || 0;
            let standar5 = parseFloat(inputd.standar5.value.replace(/,/g, '')) || 0;

            let result1tab5 = Math.abs(val1tab5 - val2tab5);
            inputd.ave73.value = formatNumber(result1tab5);

            let val3tab5 = Number(inputd.ave78.value) || 0;
            let val4tab5 = Number(inputd.ave84.value) || 0;

            let result2tab5 = Math.abs(val3tab5 + val4tab5) / 2;
            let totaltab5 = Math.abs(result1tab5 - result2tab5);
            let hasiltab5 = Math.abs(totaltab5 - standar5);

            inputd.ave79.value = formatNumber(result2tab5);
            inputd.ave74.value = formatNumber(totaltab5)
            inputd.ave76.value = formatNumber(hasiltab5);
            inputd.ave77.value = formatNumber(hasiltab5);

            // Tab 6
            let val1tab6 = Number(inputd.ave90.value) || 0;
            let val2tab6 = Number(inputd.ave108.value) || 0;
            let standar6 = parseFloat(inputd.standar6.value.replace(/,/g, '')) || 0;

            let result1tab6 = Math.abs(val1tab6 - val2tab6);
            inputd.ave91.value = formatNumber(result1tab6);

            let val3tab6 = Number(inputd.ave96.value) || 0;
            let val4tab6 = Number(inputd.ave102.value) || 0;

            let result2tab6 = Math.abs(val3tab6 + val4tab6) / 2;
            let totaltab6 = Math.abs(result1tab6 - result2tab6);
            let hasiltab6 = Math.abs(totaltab6 - standar6);

            inputd.ave97.value = formatNumber(result2tab6);
            inputd.ave92.value = formatNumber(totaltab6);
            inputd.ave94.value = formatNumber(hasiltab6);
            inputd.ave95.value = formatNumber(hasiltab6);

            // Tab 7
            let val1tab7 = Number(inputd.ave108.value) || 0;
            let val2tab7 = Number(inputd.ave126.value) || 0;
            let standar7 = parseFloat(inputd.standar7.value.replace(/,/g, '')) || 0;

            let result1tab7 = Math.abs(val1tab7 - val2tab7);
            inputd.ave109.value = formatNumber(result1tab7);

            let val3tab7 = Number(inputd.ave114.value) || 0;
            let val4tab7 = Number(inputd.ave120.value) || 0;

            let result2tab7 = Math.abs(val3tab7 + val4tab7) / 2;
            let totaltab7 = Math.abs(result1tab7 - result2tab7);
            let hasiltab7 = Math.abs(totaltab7 - standar7);

            inputd.ave115.value = formatNumber(result2tab7);
            inputd.ave110.value = formatNumber(totaltab7);
            inputd.ave112.value = formatNumber(hasiltab7);
            inputd.ave113.value = formatNumber(hasiltab7);

            // Tab 8
            let val1tab8 = Number(inputd.ave126.value) || 0;
            let val2tab8 = Number(inputd.ave144.value) || 0;
            let standar8 = parseFloat(inputd.standar8.value.replace(/,/g, '')) || 0;

            let result1tab8 = Math.abs(val1tab8 - val2tab8);
            inputd.ave127.value = formatNumber(result1tab8);

            let val3tab8 = Number(inputd.ave132.value) || 0;
            let val4tab8 = Number(inputd.ave138.value) || 0;

            let result2tab8 = Math.abs(val3tab8 + val4tab8) / 2;
            let totaltab8 = Math.abs(result1tab8 - result2tab8);
            let hasiltab8 = Math.abs(totaltab8 - standar8);

            inputd.ave133.value = formatNumber(result2tab8);
            inputd.ave128.value = formatNumber(totaltab8);
            inputd.ave130.value = formatNumber(hasiltab8);
            inputd.ave131.value = formatNumber(hasiltab8);

            // Tab 9
            let val1tab9 = Number(inputd.ave144.value) || 0;
            let val2tab9 = Number(inputd.ave162.value) || 0;
            let standar9 = parseFloat(inputd.standar9.value.replace(/,/g, '')) || 0;

            let result1tab9 = Math.abs(val1tab9 - val2tab9);
            inputd.ave145.value = formatNumber(result1tab9);

            let val3tab9 = Number(inputd.ave150.value) || 0;
            let val4tab9 = Number(inputd.ave156.value) || 0;

            let result2tab9 = Math.abs(val3tab9 + val4tab9) / 2;
            let totaltab9 = Math.abs(result1tab9 - result2tab9);
            let hasiltab9 = Math.abs(totaltab9 - standar9);

            inputd.ave151.value = formatNumber(result2tab9);
            inputd.ave146.value = formatNumber(totaltab9);
            inputd.ave148.value = formatNumber(hasiltab9);
            inputd.ave149.value = formatNumber(hasiltab9);
        }

        function formatNumber(num) {
            return num.toFixed(4); // Format angka dengan 4 desimal
        }

        // Tambahkan event listener untuk input yang relevan
        for (let i = 0; i <= 167; i++) {
            if (inputd[`ave${i}`]) {
                inputd[`ave${i}`].addEventListener('input', calculateAndUpdate);
            }
        }
    </script>
    <script>
        function findLargest() {
            // Select all input fields of type 'number' within the table
            const inputs = document.querySelectorAll('table input[type="number"]');
            let largest = -Infinity; // Initialize with the smallest possible value

            inputs.forEach(input => {
                // Get the value of the input, convert to a number and check if it's the largest
                const value = parseFloat(input.value);
                if (!isNaN(value) && value > largest) {
                    largest = value;
                }
            });

            // Format the largest value to 4 decimal places
            const formattedLargest = largest === -Infinity ? 'No numbers' : largest.toFixed(4);

            // Display the largest value in the input field
            document.getElementById('largestValue').value = formattedLargest;
        }
    </script>
    <script>
        function hitungU() {
            // Ambil elemen input
            const inputd = [
                document.getElementById('u951'),
                document.getElementById('u952'),
                document.getElementById('u953'),
                document.getElementById('u954'),
                document.getElementById('u955'),
                document.getElementById('u956'),
                document.getElementById('u957'),
                document.getElementById('u958'),
                document.getElementById('u959')
            ];
            const hitunganU = document.getElementById('hitunganU'); // Elemen untuk menampilkan hasil

            let total = 0;

            inputd.forEach(input => {
                const value = parseFloat(input.value);
                if (!isNaN(value)) {
                    total += value;
                }
            });

            // Format hasil penjumlahan hingga 4 decimal
            const formattedTotal = total.toFixed(4);

            // Tampilkan hasil di elemen 'hitunganU'
            hitunganU.value = formattedTotal;
        }

        // Tambahkan event listener untuk tombol
        document.getElementById('calculateButton').addEventListener('click', hitungU);
    </script>
    <script>
        const pers = {};
        for (let i = 1; i <= 30; i++) {
            pers[`per${i}`] = document.getElementById(`per${i}`);
        }

        let max = document.getElementById('max');

        function formatNumber(num) {
            return num.toFixed(3); // Format number to 2 decimal places
        }

        function perhitungan() {
            // perhitungan 1
            let val1 = Number(pers.per1.value) || 0;
            let val2 = Number(pers.per2.value) || 0;
            let val3 = Number(pers.per3.value) || 0;
            let val4 = Number(pers.per4.value) || 0;
            let val5 = Number(pers.per5.value) || 0;
            let val6 = Number(pers.per6.value) || 0;

            let hitung1 = Math.abs(val1 - val1); // This will always be 0
            let hitung2 = Math.abs(val1 - val2);
            let hitung3 = Math.abs(val1 - val3);
            let hitung4 = Math.abs(val1 - val4);
            let hitung5 = Math.abs(val1 - val5);

            pers.per6.value = formatNumber(hitung1);
            pers.per7.value = formatNumber(hitung2);
            pers.per8.value = formatNumber(hitung3);
            pers.per9.value = formatNumber(hitung4);
            pers.per10.value = formatNumber(hitung5);

            let values = [
                Number(pers.per6.value),
                Number(pers.per7.value),
                Number(pers.per8.value),
                Number(pers.per9.value),
                Number(pers.per10.value)
            ];

            // Cari nilai maksimum
            let mxValues = Math.max(...values);
            max.value = formatNumber(mxValues);

            // perhitungan 2
            let val11 = Number(pers.per11.value) || 0;
            let val12 = Number(pers.per12.value) || 0;
            let val13 = Number(pers.per13.value) || 0;
            let val14 = Number(pers.per14.value) || 0;
            let val15 = Number(pers.per15.value) || 0;

            let hitung11 = Math.abs(val11 - val11);
            let hitung12 = Math.abs(val11 - val12);
            let hitung13 = Math.abs(val11 - val13);
            let hitung14 = Math.abs(val11 - val14);
            let hitung15 = Math.abs(val11 - val15);

            pers.per16.value = formatNumber(hitung11);
            pers.per17.value = formatNumber(hitung12);
            pers.per18.value = formatNumber(hitung13);
            pers.per19.value = formatNumber(hitung14);
            pers.per20.value = formatNumber(hitung15);

            // perhitungan 3
            let val21 = Number(pers.per21.value) || 0;
            let val22 = Number(pers.per22.value) || 0;
            let val23 = Number(pers.per23.value) || 0;
            let val24 = Number(pers.per24.value) || 0;
            let val25 = Number(pers.per25.value) || 0;

            let hitung21 = Math.abs(val21 - val21);
            let hitung22 = Math.abs(val21 - val22);
            let hitung23 = Math.abs(val21 - val23);
            let hitung24 = Math.abs(val21 - val24);
            let hitung25 = Math.abs(val21 - val25);

            pers.per26.value = formatNumber(hitung21);
            pers.per27.value = formatNumber(hitung22);
            pers.per28.value = formatNumber(hitung23);
            pers.per29.value = formatNumber(hitung24);
            pers.per30.value = formatNumber(hitung25);
        }

        // Use 'input' event to trigger perhitungan when any input changes
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', perhitungan);
        });

    </script>
    <script>
        const pengs = {};
        for (let i = 1; i <= 11; i++) {
            pengs[`peng${i}`] = document.getElementById(`peng${i}`);
        }

        function formatNumber(num) {
            return num.toFixed(3); // Format number to 3 decimal places
        }

        function perhitungan() {
            // Retrieve values from inputs and convert to numbers
            let val1 = Number(pengs.peng1.value) || 0;
            let val2 = Number(pengs.peng2.value) || 0;
            let val3 = Number(pengs.peng3.value) || 0;
            let val4 = Number(pengs.peng4.value) || 0;
            let val5 = Number(pengs.peng5.value) || 0;

            // Perform calculations
            let hitung1 = Math.abs(val2 + val3) / 2;
            let hitung2 = Math.abs(val1 + val4) / 2;
            let total1 = Math.abs(hitung1 - hitung2);

            // Update input value with formatted result
            pengs.peng5.value = formatNumber(total1);

            let val6 = Number(pengs.peng6.value) || 0;
            let val7 = Number(pengs.peng7.value) || 0;
            let val8 = Number(pengs.peng8.value) || 0;
            let val9 = Number(pengs.peng9.value) || 0;
            let val10 = Number(pengs.peng10.value) || 0;

            // Perform calculations
            let hitung3 = Math.abs(val7 + val8) / 2;
            let hitung4 = Math.abs(val6 + val9) / 2;
            let total2 = Math.abs(hitung3 - hitung4);
            let total = Math.abs(total1 - total2);

            // Update input value with formatted result
            pengs.peng10.value = formatNumber(total2);
            pengs.peng11.value = formatNumber(total);
        }

        // Use 'input' event to trigger perhitungan when any input changes
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', perhitungan);
        });
    </script>
    <script>
        // Initialize hist and ets objects
        const hist = {};
        for (let i = 1; i <= 27; i++) {
            hist[`his${i}`] = document.getElementById(`his${i}`);
        }
        const ets = {};
        for (let i = 1; i <= 2; i++) {
            ets[`e${i}`] = document.getElementById(`e${i}`);
        }

        function formatNumber(num) {
            return num.toFixed(2); // Format number to two decimal places
        }

        function histerisis() {
            // Retrieve values
            let val1 = Number(hist.his1.value) || 0;
            let val2 = Number(hist.his2.value) || 0;
            let val3 = Number(hist.his3.value) || 0;
            let val4 = Number(hist.his4.value) || 0;
            let val5 = Number(hist.his5.value) || 0;
            let val6 = Number(hist.his6.value) || 0;
            let val7 = Number(hist.his7.value) || 0;
            let val8 = Number(hist.his8.value) || 0;
            let val9 = Number(hist.his9.value) || 0;
            let val10 = Number(hist.his10.value) || 0;
            let val11 = Number(hist.his11.value) || 0;
            let val12 = Number(hist.his12.value) || 0;
            let val13 = Number(hist.his13.value) || 0;
            let val14 = Number(hist.his14.value) || 0;
            let val15 = Number(hist.his15.value) || 0;

            // Calculations
            let hitung1 = Math.abs(val1 - val13);
            let hitung2 = Math.abs(val4 - val10);
            let hitung3 = Math.abs(val2 - val14);
            let hitung4 = Math.abs(val5 - val11);
            let hitung5 = Math.abs(val3 - val15);
            let hitung6 = Math.abs(val6 - val12);
            let hitung7 = Math.abs(val4 + val10);
            let hitung8 = Math.abs(val5 + val11);
            let hitung9 = Math.abs(val6 + val12);

            let average1 = (hitung2 + hitung4 + hitung6) / 3;
            let average2 = (hitung1 + hitung3 + hitung5) / 3;

            let total = Math.abs(average1 - average2);

            // Output results
            hist.his17.value = formatNumber(hitung2);
            hist.his18.value = formatNumber(hitung4);
            hist.his19.value = formatNumber(hitung6);

            hist.his7.value = formatNumber(hitung7);
            hist.his8.value = formatNumber(hitung8);
            hist.his9.value = formatNumber(hitung9);

            hist.his22.value = formatNumber(hitung1);
            hist.his23.value = formatNumber(hitung3);
            hist.his24.value = formatNumber(hitung5);

            hist.his20.value = formatNumber(average1);
            hist.his25.value = formatNumber(average2);

            hist.his26.value = formatNumber(total);
        }

        // Function to handle the calculation and display
        function handleCalculation() {
            let h1 = Number(ets.e1.value) || 0;
            let h2 = Number(hist.his26.value) || 0;

            let h3 = (h1 * 0.5);
            let data = [h3, h2];

            let maxValues = Math.max(...data);

            if (h2 < maxValues) {
                document.getElementById('his27').value = h1;
            } else {
                document.getElementById('his27').value = h2;
            }
        }

        document.getElementById('histerisis1').addEventListener('click', function (event) {
            event.preventDefault(); // Mencegah link dari mengikuti URL
            handleCalculation(); // Panggil fungsi stdev
        });

        // Add event listener to inputs to trigger recalculation
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', () => {
                histerisis();
            });
        });
    </script>
    <script>
        const kets = {};
        for (let i = 1; i <= 25; i++) {
            kets[`ket${i}`] = document.getElementById(`ket${i}`);
        }

        kets.kap = document.getElementById('kap');
        kets.pem = document.getElementById('pem');
        kets.hitunganU = document.getElementById('hitunganU');

        function ketidakpastian() {
            // Ambil nilai dari input 'pem'
            let pem = Number(kets.pem.value) || 0;

            // Hitung pem dibagi 2 dan tulis hasilnya ke ket4
            let bagipem = pem / 2;
            kets['ket4'].value = bagipem;

            let kap = Number(kets.kap.value) || 0;

            let ket24 = Number(kets['ket24'].value) || 0;

            let kapXbou = kap * ket24;
            kets['ket16'].value = kapXbou;
        }
        kets.pem.addEventListener("input", ketidakpastian);
        kets.kap.addEventListener("input", ketidakpastian);
        kets.ket24.addEventListener("input", ketidakpastian);

        function pembagianketidakpastian() {
            let hitunganU = Number(kets.hitunganU.value) || 0;
            let ket4 = Number(kets.ket4.value) || 0;
            let ket8 = Number(kets.ket8.value) || 0;
            let ket12 = Number(kets.ket12.value) || 0;
            let ket16 = Number(kets.ket16.value) || 0;

            let ket1 = Number(kets.ket1.value) || 0;
            let ket5 = Number(kets.ket5.value) || 0;
            let ket9 = Number(kets.ket9.value) || 0;
            let ket13 = Number(kets.ket13.value) || 0;
            let ket17 = Number(kets.ket17.value) || 0;

            let bagi1 = (hitunganU / ket1);
            let bagi2 = (ket4 / ket5);
            let bagi3 = (ket8 / ket9);
            let bagi4 = (ket12 / ket13);
            let bagi5 = (ket16 / ket17);

            kets['ket2'].value = bagi1.toFixed(7);
            kets['ket6'].value = bagi2.toFixed(7);
            kets['ket10'].value = bagi3.toFixed(7);
            kets['ket14'].value = bagi4.toFixed(7);
            kets['ket18'].value = bagi5.toFixed(7);

            let ket2 = Number(kets.ket2.value) || 0;
            let ket6 = Number(kets.ket6.value) || 0;
            let ket10 = Number(kets.ket10.value) || 0;
            let ket14 = Number(kets.ket14.value) || 0;
            let ket18 = Number(kets.ket18.value) || 0;

            let kali1 = (ket2 * ket2);
            let kali2 = (ket6 * ket6);
            let kali3 = (ket10 * ket10);
            let kali4 = (ket14 * ket14);
            let kali5 = (ket18 * ket18);

            kets['ket3'].value = kali1.toFixed(7);
            kets['ket7'].value = kali2.toFixed(7);
            kets['ket11'].value = kali3.toFixed(7);
            kets['ket15'].value = kali4.toFixed(7);
            kets['ket19'].value = kali5.toFixed(7);

            let ket3 = Number(kets.ket3.value) || 0;
            let ket7 = Number(kets.ket7.value) || 0;
            let ket11 = Number(kets.ket11.value) || 0;
            let ket15 = Number(kets.ket15.value) || 0;
            let ket19 = Number(kets.ket19.value) || 0;

            let total = (ket3 + ket7 + ket11 + ket15 + ket19);
            kets['ket20'].value = total.toFixed(7);

            let ket20 = Number(kets.ket20.value) || 0;
            let akar = Math.sqrt(total);
            kets['ket21'].value = akar.toFixed(7);

            let ket21 = Number(kets.ket21.value) || 0;
            let hasil = (2 * ket21);
            kets['ket22'].value = hasil.toFixed(7);
            kets['ket25'].value = hasil.toFixed(2);

        }
        document.getElementById('update1').addEventListener('click', function (event) {
            event.preventDefault();
            pembagianketidakpastian();
        });

        document.getElementById('ket23').addEventListener('input', function () {
            // Ambil nilai dari ket23
            let inputValue = this.value;
            // Tulis nilai tersebut ke ket12
            document.getElementById('ket12').value = inputValue;
        });
    </script>
    <script src="../../../components/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../components/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>