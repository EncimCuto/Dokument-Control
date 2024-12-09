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
if (isset($_GET['alert'])) {
    $alert = htmlspecialchars($_GET['alert']); // Sanitasi data
    $message = '';

    // Tentukan pesan berdasarkan parameter
    if ($alert === 'Berhasil') {
        $message = 'Data Berhasil Disimpan!';
    } elseif ($alert === 'Beberapa') {
        $message = 'Berhasil Menyimpan Data! Namun Data Tidak Lengkap';
    } elseif ($alert === 'gagal') {
        $message = 'Terjadi Kesalahan Saat Memproses Data!';
    }

    // Gunakan JavaScript alert untuk menampilkan pesan
    if (!empty($message)) {
        echo "<script>alert('$message');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-pressure</title>

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

        .comment {
            border: 1px solid gray;
            width: 25%;
            display: flex;
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
                        href="../../kalibrasi.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">>
                        KALIBRASI</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                        href="pressure.php">> PRESSURE</a>
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                        href=" form.php">> FORM-PRESSURE</a>
                </div>
            </div>
            <div class="page">
                <br>

                <form style="margin-top: 30px;" id="inputForm" class="inputForm"
                    action="../../../system/pressure/send_email.php" method="POST">

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
                                        <td><input class="border dray input-h" id="lok_kal2" name="lok_kal2"
                                                type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Suhu Ruangan</td>
                                        <td>:</td>
                                        <td><input class="border dray input-h" id="suh2" name="suh2" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Kelembaban</td>
                                        <td>:</td>
                                        <td><input class="border dray input-h" id="kel2" name="kel2" type="text"></td>
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
                                    <td><input class="dray input-h" id="tanggal_kalibrasi2" name="tanggal_kalibrasi2"
                                            type="date"></td>
                                </tr>
                                <tr>
                                    <td>Tgl. Kalibrasi Ulang</td>
                                    <td>:</td>
                                    <td><input class="dray input-h" id="tanggal_kalibrasi_ulang2"
                                            name="tanggal_kalibrasi_ulang2" type="date"></td>
                                </tr>
                                <tr>
                                    <td>Metode Kalibrasi</td>
                                    <td>:</td>
                                    <td><span>Didopsi dari : "The Expression of <br> Uncertainty and Confidence in <br>
                                            Measurement" </span></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Oleh UKAS (United Kingdom <br> Accreditation Service) M3003, Edition <br> 3,
                                        November 2012
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="btnfit">
                        <div>
                            <button type="button" class="btn btn-outline-secondary" id="Button-A"
                                onclick="visibility1(), copyValue()">Tekanan Naik</button>
                            <button type="button" class="btn btn-outline-secondary" id="Button-A"
                                onclick="visibility2(), copyValue()">Tekanan Turun</button>
                            <button type="button" class="btn btn-outline-secondary" id="Button-C"
                                onclick="ugabungan(), copyValue()">Hitung U Gabungan</button>
                            <button type="button" class="btn btn-outline-secondary" id="Button-C"
                                onclick="komentar(), copyValue()">Komentar</button>
                            <button type="button" class="btn btn-outline-secondary" id="Button-C"
                                onclick="visibility3(), copyValue()">Simpan</button>
                        </div>
                    </div>
                    <div class="naik" id="tekanannaik">
                        <div class="btnmenu">
                        </div>
                        <br>
                        <table id="tabelTekanannaik">
                            <tr>
                                <td><input class="border" type="hidden" name="percenCalibration1" id="percenCalibration1">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration2" id="percenCalibration2">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration3" id="percenCalibration3">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration4" id="percenCalibration4">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration5" id="percenCalibration5">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration6" id="percenCalibration6">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration7" id="percenCalibration7">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration8" id="percenCalibration8">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration9" id="percenCalibration9">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration10" id="percenCalibration10">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration11" id="percenCalibration11">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration12" id="percenCalibration12">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration13" id="percenCalibration13">
                                </td>
                                <td><input class="border" type="hidden" name="percenCalibration14" id="percenCalibration14">
                                </td>
                            </tr>
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
                                <td class="border bown-b"><input type="text" name="nominal" id="nominal"></td>
                                <td class="bown-b"> = </td>
                                <td colspan="3">Titik-Kalibrasi(%)</td>
                            </tr>
                            <tr>
                                <th width="80px" class="border bown-h">Titik Kalibrasi</th>
                                <th width="80px" class="border bown-h">Penunjuk Standar</th>
                                <th width="80px" class="border bown-h">Penunjuk alat</th>
                                <th width="80px" class="border bown-h">Koreksi Standar</th>
                                <th width="80px" class="border bown-h">Tekanan Standar</th>
                                <th width="80px" class="border bown-h">Koreksi Alat</th>
                                <th width="80px" class="border bown-h">Rata rata Kor.Alat</th>
                                <th width="80px" class="border bown-h">Standar Deviasi</th>
                                <th width="80px" class="border bown-h">Ketidakpastian</th>
                            </tr>
                            <tr>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                            </tr>
                        </table>
                        <div class="dwonbtn">
                            <button class="btn btn-danger" type="button"
                                onclick="tambahBaris(), ambilNilaiBerdasarkanId()"><i class="bi bi-plus"></i></button>
                            <button class="btn btn-danger" type="button"
                                onclick="hitungKalibrasi(), ambilNilaiBerdasarkanId();">Hitung</button>
                            <button class="btn btn-danger" type="button"
                                onclick="hapusBaris(), ambilNilaiBerdasarkanId()"><i class="bi bi-dash"></i></button>
                        </div>
                    </div>

                    <div class="tekanan" id="tekananturun">
                        <div>
                        </div>
                        <table id="tabelTekananturun">
                            <tr>
                                <td><input type="hidden" name="kuadrat1" id="kuadrat1"></td>
                                <td><input type="hidden" name="kuadrat2" id="kuadrat2"></td>
                                <td><input type="hidden" name="kuadrat3" id="kuadrat3"></td>
                                <td><input type="hidden" name="kuadrat4" id="kuadrat4"></td>
                                <td><input type="hidden" name="kuadrat5" id="kuadrat5"></td>
                                <td><input type="hidden" name="kuadrat6" id="kuadrat6"></td>
                                <td><input type="hidden" name="kuadrat7" id="kuadrat7"></td>
                                <td><input type="hidden" name="kuadrat8" id="kuadrat8"></td>
                                <td><input type="hidden" name="kuadrat9" id="kuadrat9"></td>
                                <td><input type="hidden" name="kuadrat10" id="kuadrat10"></td>
                                <td><input type="hidden" name="kuadrat11" id="kuadrat11"></td>
                                <td><input type="hidden" name="kuadrat12" id="kuadrat12"></td>
                                <td><input type="hidden" name="kuadrat13" id="kuadrat13"></td>
                                <td><input type="hidden" name="kuadrat14" id="kuadrat14"></td>
                                <td><input type="hidden" name="kuadrat15" id="kuadrat15"></td>
                            </tr>
                            <tr>
                                <th width="80px" class="border bown-h">Titik Kalibrasi</th>
                                <th width="80px" class="border bown-h">Penunjuk Standar</th>
                                <th width="80px" class="border bown-h">Penunjuk alat</th>
                                <th width="80px" class="border bown-h">Koreksi Standar</th>
                                <th width="80px" class="border bown-h">Tekanan Standar</th>
                                <th width="80px" class="border bown-h">Koreksi Alat</th>
                                <th width="80px" class="border bown-h">Rata rata Kor.Alat</th>
                                <th width="80px" class="border bown-h">Standar Deviasi</th>
                                <th width="80px" class="border bown-h">Ketidakpastian</th>
                            </tr>
                            <tr>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                                <td class="border bown-b">Bar</td>
                            </tr>
                        </table>
                        <div class="dwonbtn">
                            <button class="btn btn-danger" type="button" onclick="add(), getid2()"><i
                                    class="bi bi-plus"></i></button>
                            <button class="btn btn-danger" type="button" onclick="getid2()">Hitung</button>
                            <button class="btn btn-danger" type="button" onclick="hapusline2(), getid2()"><i
                                    class="bi bi-dash"></i></button>
                        </div>
                    </div>

                    <div class="tekanan" id="ugabungan">
                        <table id="tabelugabungan">
                            <tr>
                                <td><input type="hidden" name="uhasil1" id="uhasil1"></td>
                                <td><input type="hidden" name="uhasil2" id="uhasil2"></td>
                                <td><input type="hidden" name="uhasil3" id="uhasil3"></td>
                                <td><input type="hidden" name="uhasil4" id="uhasil4"></td>
                                <td><input type="hidden" name="uhasil5" id="uhasil5"></td>
                                <td><input type="hidden" name="uhasil6" id="uhasil6"></td>
                                <td><input type="hidden" name="uhasil7" id="uhasil7"></td>
                                <td><input type="hidden" name="uhasil8" id="uhasil8"></td>
                                <td><input type="hidden" name="uhasil9" id="uhasil9"></td>
                                <td><input type="hidden" name="uhasil10" id="uhasil10"></td>
                                <td><input type="hidden" name="uhasil11" id="uhasil11"></td>
                                <td><input type="hidden" name="uhasil12" id="uhasil12"></td>
                                <td><input type="hidden" name="uhasil13" id="uhasil13"></td>
                                <td><input type="hidden" name="uhasil14" id="uhasil14"></td>
                                <td><input type="hidden" name="uhasil15" id="uhasil15"></td>
                            </tr>
                            <tr>
                                <th width="80px" class="border bown-h">U Naik</th>
                                <th width="80px" class="border bown-h">U Turun</th>
                                <th width="80px" class="border bown-h">U Naik^2</th>
                                <th width="80px" class="border bown-h">U Turun^2</th>
                                <th width="80px" class="border bown-h">U Gabungan</th>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik1" id="Unaik1"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun1" id="Uturun1"></td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt1" id="Unaikt1"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt1" id="Uturunt1">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan1" id="Ugabungan1">
                                </td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik2" id="Unaik2"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun2" id="Uturun2"></td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt2" id="Unaikt2"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt2" id="Uturunt2">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan2" id="Ugabungan2">
                                </td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik3" id="Unaik3"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun3" id="Uturun3"></td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt3" id="Unaikt3"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt3" id="Uturunt3">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan3" id="Ugabungan3">
                                </td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik4" id="Unaik4"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun4" id="Uturun4"></td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt4" id="Unaikt4"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt4" id="Uturunt4">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan4" id="Ugabungan4">
                                </td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik5" id="Unaik5"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun5" id="Uturun5"></td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt5" id="Unaikt5"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt5" id="Uturunt5">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan5" id="Ugabungan5">
                                </td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik6" id="Unaik6"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun6" id="Uturun6"></td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt6" id="Unaikt6"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt6" id="Uturunt6">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan6" id="Ugabungan6">
                                </td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik7" id="Unaik7"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun7" id="Uturun7"></td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt7" id="Unaikt7"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt7" id="Uturunt7">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan7" id="Ugabungan7">
                                </td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik8" id="Unaik8"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun8" id="Uturun8"></td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt8" id="Unaikt8"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt8" id="Uturunt8">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan8" id="Ugabungan8">
                                </td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik9" id="Unaik9"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun9" id="Uturun9"></td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt9" id="Unaikt9"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt9" id="Uturunt9">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan9" id="Ugabungan9">
                                </td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik10" id="Unaik10"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun10" id="Uturun10">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt10" id="Unaikt10">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt10" id="Uturunt10">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan10"
                                        id="Ugabungan10"></td>
                            </tr>
                            <tr>
                                <td class="border bown-b"></td><input type="text" readonly name="Unaik11" id="Unaik11"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun11" id="Uturun11">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt11" id="Unaikt11">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt11" id="Uturunt11">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan11"
                                        id="Ugabungan11"></td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik12" id="Unaik12"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun12" id="Uturun12">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt12" id="Unaikt12">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt12" id="Uturunt12">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan12"
                                        id="Ugabungan12"></td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik13" id="Unaik13"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun13" id="Uturun13">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt13" id="Unaikt13">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt13" id="Uturunt13">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan13"
                                        id="Ugabungan13"></td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik14" id="Unaik14"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun14" id="Uturun14">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt14" id="Unaikt14">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt14" id="Uturunt14">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan14"
                                        id="Ugabungan14"></td>
                            </tr>
                            <tr>
                                <td class="border bown-b"><input type="text" readonly name="Unaik15" id="Unaik15"></td>
                                <td class="border bown-b"><input type="text" readonly name="Uturun15" id="Uturun15">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Unaikt15" id="Unaikt15">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Uturunt15" id="Uturunt15">
                                </td>
                                <td class="border bown-b"><input type="text" readonly name="Ugabungan15"
                                        id="Ugabungan15"></td>
                            </tr>
                        </table>
                        <div class="dwonbtn">
                            <button class="btn btn-danger" type="button" onclick="copyValue()">Hitung</button>
                        </div>
                    </div>
                    
                    <br>
                    <div class="tekanan" id="komentar">
                        <div class="comment" style="width: fit-content; height: 100px;">
                            <table>
                                <tr>
                                    <td>Layak</td>
                                    <td><input type="radio" name="layak" id="layak"></td>
                                    <td>Tidak Layak</td>
                                    <td><input type="radio" name="tidakLayak" id="tidakLayak"></td>
                                </tr>
                            </table>
                        </div>
                        <input type="hidden" name="catatan" id="catatan">
                    </div>

                    <br>
                    <div class="tekanan" id="simpan">
                        <div class="email">
                            <table>
                                <tr>
                                    <td>Foreman :</td>
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
                                    <td>Supervisor :</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm" aria-label="Small select example" id="email2" name="email2" onchange="updateInfo()">
                                            <option value="">Supervisor</option>
                                            <?php
                                            require_once '../../../config/config2.php';

                                            $sql = "SELECT id, username, email FROM log_users WHERE bagian = 'Supervisor'";
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
                                    <td>Manager :</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm" aria-label="Small select example" id="email2" name="email2" onchange="updateInfo()">
                                            <option value="">Manager</option>
                                            <?php
                                            require_once '../../../config/config2.php';

                                            $sql = "SELECT id, username, email FROM log_users WHERE bagian = 'Manager'";
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
                                    <td>User 4:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm" aria-label="Small select example"
                                            id="email4" name="email4" onchange="updateInfo()">
                                            <option value="">User</option>
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
                    const name = document.getElementById("kode").value.trim();
                    const gender = document.getElementById("kode_alat2").value;

                    if (!name || !gender) {
                        event.preventDefault();
                        alert("Harap Untuk Mengisi Identitas Form Terlebih Dahulu !");
                    }

                    const inputs = document.querySelectorAll("#inputForm input, #inputForm select");
                    inputs.forEach((input) => {
                        if (!input.value.trim()) {
                            input.style.border = "1px solid red";
                        } else {
                            input.style.border = "";
                        }
                    });
                });
            </script>

            <script>
                layak = document.getElementById('layak');
                tlayak = document.getElementById('tidakLayak');
                komentar = document.getElementById('komentar');
                
                function koment() {

                }
            </script>

            <script>
                document.getElementById("hitungs").addEventListener("click", function () {
                    ambilNilaiBerdasarkanId();
                    getid2();
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
                        var nacData = $(".nac").map(function () {
                            return $(this).text();
                        }).get().join(", ");

                        var emailData = $(".email").map(function () {
                            return $(this).text();
                        }).get().join(", ");

                        $("#output").text("Data dari NAC: " + nacData + " | Data dari Email: " + emailData);
                    });
                });
            </script>

            <script>
                function visibility1() {
                    var tekanannaik = document.getElementById("tekanannaik");
                    var tekananturun = document.getElementById("tekananturun");
                    var ugabungan = document.getElementById("ugabungan");
                    var komentar = document.getElementById("komentar");
                    var simpan = document.getElementById("simpan");

                    if (tekanannaik.classList.contains("tekanan")) {
                        tekanannaik.classList.remove("tekanan");
                        tekanannaik.classList.add("naik");
                        tekananturun.classList.remove("turun");
                        tekananturun.classList.add("tekanan");
                        ugabungan.classList.remove("naik");
                        ugabungan.classList.add("tekanan");
                        komentar.classList.remove("simpan");
                        komentar.classList.add("tekanan");
                        simpan.classList.remove("simpan");
                        simpan.classList.add("tekanan");
                    }
                }
                function visibility2() {
                    var tekanannaik = document.getElementById("tekanannaik");
                    var tekananturun = document.getElementById("tekananturun");
                    var ugabungan = document.getElementById("ugabungan");
                    var komentar = document.getElementById("komentar");
                    var simpan = document.getElementById("simpan");

                    if (tekananturun.classList.contains("tekanan")) {
                        tekananturun.classList.remove("tekanan");
                        tekananturun.classList.add("turun");
                        tekanannaik.classList.remove("naik");
                        tekanannaik.classList.add("tekanan");
                        ugabungan.classList.remove("naik");
                        ugabungan.classList.add("tekanan");
                        komentar.classList.remove("simpan");
                        komentar.classList.add("tekanan");
                        simpan.classList.remove("simpan");
                        simpan.classList.add("tekanan");
                    }
                }

                function ugabungan() {
                    var tekanannaik = document.getElementById("tekanannaik");
                    var tekananturun = document.getElementById("tekananturun");
                    var ugabungan = document.getElementById("ugabungan");
                    var komentar = document.getElementById("komentar");
                    var simpan = document.getElementById("simpan");

                    if (ugabungan.classList.contains("tekanan")) {
                        ugabungan.classList.remove("tekanan");
                        ugabungan.classList.add("naik");
                        tekanannaik.classList.remove("naik");
                        tekanannaik.classList.add("tekanan");
                        tekananturun.classList.remove("turun");
                        tekananturun.classList.add("tekanan");;
                        komentar.classList.remove("simpan");
                        komentar.classList.add("tekanan");
                        simpan.classList.remove("simpan");
                        simpan.classList.add("tekanan");
                    }
                }
                
                function komentar() {
                    var tekanannaik = document.getElementById("tekanannaik");
                    var tekananturun = document.getElementById("tekananturun");
                    var ugabungan = document.getElementById("ugabungan");
                    var komentar = document.getElementById("komentar");
                    var simpan = document.getElementById("simpan");

                    if (komentar.classList.contains("tekanan")) {
                        komentar.classList.remove("tekanan");
                        komentar.classList.add("simpan");
                        tekanannaik.classList.remove("naik");
                        tekanannaik.classList.add("tekanan");
                        tekananturun.classList.remove("turun");
                        tekananturun.classList.add("tekanan");;
                        ugabungan.classList.remove("naik");
                        ugabungan.classList.add("tekanan");
                        simpan.classList.remove("simpan");
                        simpan.classList.add("tekanan");
                    }
                }

                function visibility3() {
                    var button = document.getElementById("switch_button");
                    var tekanannaik = document.getElementById("tekanannaik");
                    var tekananturun = document.getElementById("tekananturun");
                    var ugabungan = document.getElementById("ugabungan");
                    var komentar = document.getElementById("komentar");
                    var simpan = document.getElementById("simpan");

                    if (simpan.classList.contains("tekanan")) {
                        simpan.classList.remove("tekanan");
                        simpan.classList.add("simpan");
                        tekanannaik.classList.remove("naik");
                        tekanannaik.classList.add("tekanan");
                        ugabungan.classList.remove("naik");
                        ugabungan.classList.add("tekanan");
                        komentar.classList.remove("simpan");
                        komentar.classList.add("tekanan");
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

                    if (rowCount <= 3) {
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

                function tambahBaris() {
                    var table = document.getElementById("tabelTekanannaik");
                    var currentRows = table.rows.length - 1; // Menghitung jumlah baris saat ini (mengurangi header)

                    if (currentRows + 4 > maxBaris) {
                        alert("Maksimal \"64 baris\" atau \"15 Perhitungan\" yang dapat ditambahkan.");
                        return false;
                    }

                    for (var j = 0; j < 4; j++) {
                        var row = table.insertRow(-1);

                        for (var i = 0; i < 9; i++) {
                            var cell = row.insertCell(i);
                            cell.className = "border";

                            if (baris % 4 === 0 && (i === 0 || i === 1 || i === 3 || i === 5)) {
                                if (i === 0) cell.className = "border dray"
                                if (i === 1) cell.innerHTML = "Rata Rata";
                                if (i === 3 || i === 5) cell.className = "border dray"
                                continue;
                            }

                            if (baris % 4 === 1 && (i === 6 || i === 7 || i === 8)) {
                                cell.className = "border dray"
                                continue;
                            }
                            if (baris % 4 === 2 && (i === 0 || i === 6 || i === 7 || i === 8)) {
                                cell.className = "border dray"
                                continue;
                            }
                            if (baris % 4 === 3 && (i === 0 || i === 6 || i === 7 || i === 8)) {
                                cell.className = "border dray"
                                continue;
                            }
                            if (baris % 4 === 4 && (i === 0 || i === 3 || i === 5)) {
                                cell.className = "border dray"
                                continue;
                            }


                            if ((baris % 4 === 2 || baris % 4 === 3) && i === 0) {
                                cell.innerHTML = "";
                                continue;
                            }

                            if (baris % 4 !== 0 && i >= 6) {
                                cell.innerHTML = "";
                                continue;
                            }

                            var input = document.createElement("input");
                            input.type = "text";
                            input.style.textAlign = "center";

                            if (baris % 4 === 0 && i === 8) {
                                input.id = "hasil" + hasilId;
                                input.name = "hasil" + hasilId;
                                hasilId++;
                            } else {
                                input.id = "nan" + nextInputId;
                                input.name = "nan" + nextInputId;

                                if (!(baris % 4 === 0 && i === 8)) {
                                    nextInputId++;
                                }
                            }

                            if (i === 3 || i === 5) {
                                input.setAttribute("readonly", true);
                            }

                            if (baris % 4 === 0 && i >= 6) {
                                input.setAttribute("readonly", true);
                            }

                            cell.appendChild(input);
                        }

                        baris++;
                    }
                }

                let L84 = 0.29 * 0.0689;
                let operator = 0.05;
                let normal1 = 2;
                let normal2 = 1.00;
                let retangular = Math.sqrt(3);
                let vi1 = 10000000000;
                let vi2 = 3 - 1;
                let vi3 = 10000000000;
                let ci = 1;
                function ambilNilaiBerdasarkanId() {
                    let ids = [];

                    // Mengumpulkan ID untuk input nan dan hasil
                    for (let i = 1; i < nextInputId; i++) {
                        ids.push("nan" + i);
                    }
                    for (let i = 1; i < hasilId; i++) {
                        ids.push("hasil" + i);
                    }

                    // console.log("ID yang tersedia:\n" + ids.join("\n"));

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

                    // console.log("Nilai berdasarkan ID:", nilaiBerdasarkanId);

                    let hasil = {}; // Objek untuk menyimpan nilai nan

                    for (let i = 1; i <= 300; i++) {
                        const nanInput = document.getElementById(`nan${i}`);
                        hasil[`nan${i}`] = nanInput ? Number(nanInput.value) || 0 : 0; // Ambil nilai dari input
                    }
                    
                    // hitungan 1
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

                    let ubaku1 = L84 / normal1;
                    let ubaku2 = totals1 / normal2;
                    let ubaku3 = operator / retangular;
                    let ubakuc1 = ubaku1 / ci;
                    let ubakuc2 = ubaku2 / ci;
                    let ubakuc3 = ubaku3 / ci;

                    let ubakuci1 = (ubakuc1 ** 2);
                    let bakus1 = parseFloat(ubakuci1.toFixed(19));
                    let ubakuci2 = (ubakuc2 ** 2);
                    let bakus2 = parseFloat(ubakuci2.toFixed(19));
                    let ubakuci3 = (ubakuc3 ** 2);
                    let bakus3 = parseFloat(ubakuci3.toFixed(19));
                    let tambah1 = bakus1 + bakus2 + bakus3 + 0 + 0;
                    let tidakpasti = Math.sqrt(tambah1).toFixed(10);

                    let ubakucis1 = (ubakuc1 ** 4) / vi1;
                    let baku1 = parseFloat(ubakucis1.toFixed(19));
                    let ubakucis2 = (ubakuc2 ** 4) / vi2;
                    let baku2 = parseFloat(ubakucis2.toFixed(19));
                    let ubakucis3 = (ubakuc3 ** 4) / vi3;
                    let baku3 = parseFloat(ubakucis3.toFixed(19));
                    let tambah2 = baku1 + baku2 + baku3 + 0 + 0;

                    let derajat = (tidakpasti ** 4) / tambah2;
                    let n100, n101, n102, n103, n104;

                    if (derajat > 124) {
                        n100 = 1.96;
                    } else if (derajat > 104) {
                        n100 = 1.98;
                    } else if (derajat > 74) {
                        n100 = 1.99;
                    } else if (derajat > 54) {
                        n100 = 2;
                    } else if (derajat > 47.5) {
                        n100 = 2.01;
                    } else if (derajat > 37.5) {
                        n100 = 2.02;
                    } else if (derajat > 32.5) {
                        n100 = 2.03;
                    } else if (derajat > 27.5) {
                        n100 = 2.04;
                    } else {
                        n100 = null;
                    }

                    // Set nilai n101
                    if (derajat > 22.5) {
                        n101 = 2.06;
                    } else if (derajat > 18.4) {
                        n101 = 2.09;
                    } else if (derajat > 17.4) {
                        n101 = 2.1;
                    } else if (derajat > 16.4) {
                        n101 = 2.11;
                    } else if (derajat > 15.4) {
                        n101 = 2.12;
                    } else if (derajat > 14.4) {
                        n101 = 2.13;
                    } else if (derajat > 13.4) {
                        n101 = 2.15;
                    } else if (derajat > 12.4) {
                        n101 = 2.16;
                    } else {
                        n101 = null;
                    }

                    // Set nilai n102
                    if (derajat > 11.4) {
                        n102 = 2.18;
                    } else if (derajat > 10.4) {
                        n102 = 2.2;
                    } else if (derajat > 9.4) {
                        n102 = 2.23;
                    } else if (derajat > 8.4) {
                        n102 = 2.26;
                    } else if (derajat > 7.4) {
                        n102 = 2.31;
                    } else if (derajat > 6.4) {
                        n102 = 2.37;
                    } else if (derajat > 5.4) {
                        n102 = 2.45;
                    } else if (derajat > 4.4) {
                        n102 = 2.57;
                    } else {
                        n102 = null;
                    }

                    // Set nilai n103
                    if (derajat > 3.4) {
                        n103 = 2.78;
                    } else if (derajat > 2.4) {
                        n103 = 3.18;
                    } else if (derajat > 1.4) {
                        n103 = 4.3;
                    } else if (derajat <= 1.4) {
                        n103 = 12.7;
                    } else {
                        n103 = null;
                    }

                    // Set nilai n104 berdasarkan n100-n103
                    if (derajat > 27.5) {
                        n104 = n100;
                    } else if (derajat > 12.4) {
                        n104 = n101;
                    } else if (derajat > 4.4) {
                        n104 = n102;
                    } else if (derajat <= 4.4) {
                        n104 = n103;
                    } else {
                        n104 = null;
                    }

                    let ketidakpastian = tidakpasti * n104;
                    pangkat1.value = ketidakpastian.toFixed(9);
                    hasil1.value = ketidakpastian.toFixed(3);
                    // hitungan 2
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

                    let ubaku4 = L84 / normal1;
                    let ubaku5 = totals2 / normal2;
                    let ubaku6 = operator / retangular;
                    let ubakuc4 = ubaku4 / ci;
                    let ubakuc5 = ubaku5 / ci;
                    let ubakuc6 = ubaku6 / ci;

                    let ubakuci4 = (ubakuc4 ** 2);
                    let bakus4 = parseFloat(ubakuci4.toFixed(19));
                    let ubakuci5 = (ubakuc5 ** 2);
                    let bakus5 = parseFloat(ubakuci5.toFixed(19));
                    let ubakuci6 = (ubakuc6 ** 2);
                    let bakus6 = parseFloat(ubakuci6.toFixed(19));
                    let tambah3 = bakus4 + bakus5 + bakus6 + 0 + 0;
                    let tidakpasti1 = Math.sqrt(tambah3).toFixed(10);

                    let ubakucis4 = (ubakuc4 ** 4) / vi1;
                    let baku4 = parseFloat(ubakucis4.toFixed(19));
                    let ubakucis5 = (ubakuc5 ** 4) / vi2;
                    let baku5 = parseFloat(ubakucis5.toFixed(19));
                    let ubakucis6 = (ubakuc6 ** 4) / vi3;
                    let baku6 = parseFloat(ubakucis6.toFixed(19));
                    let tambah4 = baku4 + baku5 + baku6 + 0 + 0;

                    let derajat1 = (tidakpasti1 ** 4) / tambah4;
                    let m100, m101, m102, m103, m104;

                    if (derajat1 > 124) {
                        m100 = 1.96;
                    } else if (derajat1 > 104) {
                        m100 = 1.98;
                    } else if (derajat1 > 74) {
                        m100 = 1.99;
                    } else if (derajat1 > 54) {
                        m100 = 2;
                    } else if (derajat1 > 47.5) {
                        m100 = 2.01;
                    } else if (derajat1 > 37.5) {
                        m100 = 2.02;
                    } else if (derajat1 > 32.5) {
                        m100 = 2.03;
                    } else if (derajat1 > 27.5) {
                        m100 = 2.04;
                    } else {
                        m100 = null;
                    }

                    // Set nilai m101
                    if (derajat1 > 22.5) {
                        m101 = 2.06;
                    } else if (derajat1 > 18.4) {
                        m101 = 2.09;
                    } else if (derajat1 > 17.4) {
                        m101 = 2.1;
                    } else if (derajat1 > 16.4) {
                        m101 = 2.11;
                    } else if (derajat1 > 15.4) {
                        m101 = 2.12;
                    } else if (derajat1 > 14.4) {
                        m101 = 2.13;
                    } else if (derajat1 > 13.4) {
                        m101 = 2.15;
                    } else if (derajat1 > 12.4) {
                        m101 = 2.16;
                    } else {
                        m101 = null;
                    }

                    // Set nilai m102
                    if (derajat1 > 11.4) {
                        m102 = 2.18;
                    } else if (derajat1 > 10.4) {
                        m102 = 2.2;
                    } else if (derajat1 > 9.4) {
                        m102 = 2.23;
                    } else if (derajat1 > 8.4) {
                        m102 = 2.26;
                    } else if (derajat1 > 7.4) {
                        m102 = 2.31;
                    } else if (derajat1 > 6.4) {
                        m102 = 2.37;
                    } else if (derajat1 > 5.4) {
                        m102 = 2.45;
                    } else if (derajat1 > 4.4) {
                        m102 = 2.57;
                    } else {
                        m102 = null;
                    }

                    // Set nilai m103
                    if (derajat1 > 3.4) {
                        m103 = 2.78;
                    } else if (derajat1 > 2.4) {
                        m103 = 3.18;
                    } else if (derajat1 > 1.4) {
                        m103 = 4.3;
                    } else if (derajat1 <= 1.4) {
                        m103 = 12.7;
                    } else {
                        m103 = null;
                    }

                    // Set nilai m104 berdasarkan m100-m103
                    if (derajat1 > 27.5) {
                        m104 = m100;
                    } else if (derajat1 > 12.4) {
                        m104 = m101;
                    } else if (derajat1 > 4.4) {
                        m104 = m102;
                    } else if (derajat1 <= 4.4) {
                        m104 = m103;
                    } else {
                        m104 = null;
                    }

                    let ketidakpastian1 = tidakpasti1 * m104;
                    pangkat2.value = ketidakpastian1.toFixed(9);
                    hasil2.value = ketidakpastian1.toFixed(3);
                    // hitung 3 
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

                    let ubaku7 = L84 / normal1;
                    let ubaku8 = totals3 / normal2;
                    let ubaku9 = operator / retangular;
                    let ubakuc7 = ubaku7 / ci;
                    let ubakuc8 = ubaku8 / ci;
                    let ubakuc9 = ubaku9 / ci;

                    let ubakuci7 = (ubakuc7 ** 2);
                    let bakus7 = parseFloat(ubakuci7.toFixed(19));
                    let ubakuci8 = (ubakuc8 ** 2);
                    let bakus8 = parseFloat(ubakuci8.toFixed(19));
                    let ubakuci9 = (ubakuc9 ** 2);
                    let bakus9 = parseFloat(ubakuci9.toFixed(19));
                    let tambah5 = bakus7 + bakus8 + bakus9 + 0 + 0;
                    let tidakpasti2 = Math.sqrt(tambah5).toFixed(10);

                    let ubakucis7 = (ubakuc7 ** 4) / vi1;
                    let baku7 = parseFloat(ubakucis7.toFixed(19));
                    let ubakucis8 = (ubakuc8 ** 4) / vi2;
                    let baku8 = parseFloat(ubakucis8.toFixed(19));
                    let ubakucis9 = (ubakuc9 ** 4) / vi3;
                    let baku9 = parseFloat(ubakucis9.toFixed(19));
                    let tambah6 = baku7 + baku8 + baku9 + 0 + 0;

                    let derajat2 = (tidakpasti2 ** 4) / tambah6;
                    let b100, b101, b102, b103, b104;

                    if (derajat2 > 124) {
                        b100 = 1.96;
                    } else if (derajat2 > 104) {
                        b100 = 1.98;
                    } else if (derajat2 > 74) {
                        b100 = 1.99;
                    } else if (derajat2 > 54) {
                        b100 = 2;
                    } else if (derajat2 > 47.5) {
                        b100 = 2.01;
                    } else if (derajat2 > 37.5) {
                        b100 = 2.02;
                    } else if (derajat2 > 32.5) {
                        b100 = 2.03;
                    } else if (derajat2 > 27.5) {
                        b100 = 2.04;
                    } else {
                        b100 = null;
                    }

                    // Set nilai b101
                    if (derajat2 > 22.5) {
                        b101 = 2.06;
                    } else if (derajat2 > 18.4) {
                        b101 = 2.09;
                    } else if (derajat2 > 17.4) {
                        b101 = 2.1;
                    } else if (derajat2 > 16.4) {
                        b101 = 2.11;
                    } else if (derajat2 > 15.4) {
                        b101 = 2.12;
                    } else if (derajat2 > 14.4) {
                        b101 = 2.13;
                    } else if (derajat2 > 13.4) {
                        b101 = 2.15;
                    } else if (derajat2 > 12.4) {
                        b101 = 2.16;
                    } else {
                        b101 = null;
                    }

                    // Set nilai b102
                    if (derajat2 > 11.4) {
                        b102 = 2.18;
                    } else if (derajat2 > 10.4) {
                        b102 = 2.2;
                    } else if (derajat2 > 9.4) {
                        b102 = 2.23;
                    } else if (derajat2 > 8.4) {
                        b102 = 2.26;
                    } else if (derajat2 > 7.4) {
                        b102 = 2.31;
                    } else if (derajat2 > 6.4) {
                        b102 = 2.37;
                    } else if (derajat2 > 5.4) {
                        b102 = 2.45;
                    } else if (derajat2 > 4.4) {
                        b102 = 2.57;
                    } else {
                        b102 = null;
                    }

                    // Set nilai b103
                    if (derajat2 > 3.4) {
                        b103 = 2.78;
                    } else if (derajat2 > 2.4) {
                        b103 = 3.18;
                    } else if (derajat2 > 1.4) {
                        b103 = 4.3;
                    } else if (derajat2 <= 1.4) {
                        b103 = 12.7;
                    } else {
                        b103 = null;
                    }

                    // Set nilai b104 berdasarkan b100-b103
                    if (derajat2 > 27.5) {
                        b104 = b100;
                    } else if (derajat2 > 12.4) {
                        b104 = b101;
                    } else if (derajat2 > 4.4) {
                        b104 = b102;
                    } else if (derajat2 <= 4.4) {
                        b104 = b103;
                    } else {
                        b104 = null;
                    }

                    let ketidakpastian2 = tidakpasti2 * b104;
                    pangkat3.value = ketidakpastian2.toFixed(9);
                    hasil3.value = ketidakpastian2.toFixed(3);
                    // hitung 4
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

                    let ubaku10 = L84 / normal1;
                    let ubaku11 = totals4 / normal2;
                    let ubaku12 = operator / retangular;
                    let ubakuc10 = ubaku10 / ci;
                    let ubakuc11 = ubaku11 / ci;
                    let ubakuc12 = ubaku12 / ci;

                    let ubakuci10 = (ubakuc10 ** 2);
                    let bakus10 = parseFloat(ubakuci10.toFixed(19));
                    let ubakuci11 = (ubakuc11 ** 2);
                    let bakus11 = parseFloat(ubakuci11.toFixed(19));
                    let ubakuci12 = (ubakuc12 ** 2);
                    let bakus12 = parseFloat(ubakuci12.toFixed(19));
                    let tambah7 = bakus10 + bakus11 + bakus12 + 0 + 0;
                    let tidakpasti3 = Math.sqrt(tambah7).toFixed(10);

                    let ubakucis10 = (ubakuc10 ** 4) / vi1;
                    let baku10 = parseFloat(ubakucis10.toFixed(19));
                    let ubakucis11 = (ubakuc11 ** 4) / vi2;
                    let baku11 = parseFloat(ubakucis11.toFixed(19));
                    let ubakucis12 = (ubakuc12 ** 4) / vi3;
                    let baku12 = parseFloat(ubakucis12.toFixed(19));
                    let tambah8 = baku10 + baku11 + baku12 + 0 + 0;

                    let derajat3 = (tidakpasti3 ** 4) / tambah8;
                    let v100, v101, v102, v103, v104;

                    if (derajat3 > 124) {
                        v100 = 1.96;
                    } else if (derajat3 > 104) {
                        v100 = 1.98;
                    } else if (derajat3 > 74) {
                        v100 = 1.99;
                    } else if (derajat3 > 54) {
                        v100 = 2;
                    } else if (derajat3 > 47.5) {
                        v100 = 2.01;
                    } else if (derajat3 > 37.5) {
                        v100 = 2.02;
                    } else if (derajat3 > 32.5) {
                        v100 = 2.03;
                    } else if (derajat3 > 27.5) {
                        v100 = 2.04;
                    } else {
                        v100 = null;
                    }

                    // Set nilai v101
                    if (derajat3 > 22.5) {
                        v101 = 2.06;
                    } else if (derajat3 > 18.4) {
                        v101 = 2.09;
                    } else if (derajat3 > 17.4) {
                        v101 = 2.1;
                    } else if (derajat3 > 16.4) {
                        v101 = 2.11;
                    } else if (derajat3 > 15.4) {
                        v101 = 2.12;
                    } else if (derajat3 > 14.4) {
                        v101 = 2.13;
                    } else if (derajat3 > 13.4) {
                        v101 = 2.15;
                    } else if (derajat3 > 12.4) {
                        v101 = 2.16;
                    } else {
                        v101 = null;
                    }

                    // Set nilai v102
                    if (derajat3 > 11.4) {
                        v102 = 2.18;
                    } else if (derajat3 > 10.4) {
                        v102 = 2.2;
                    } else if (derajat3 > 9.4) {
                        v102 = 2.23;
                    } else if (derajat3 > 8.4) {
                        v102 = 2.26;
                    } else if (derajat3 > 7.4) {
                        v102 = 2.31;
                    } else if (derajat3 > 6.4) {
                        v102 = 2.37;
                    } else if (derajat3 > 5.4) {
                        v102 = 2.45;
                    } else if (derajat3 > 4.4) {
                        v102 = 2.57;
                    } else {
                        v102 = null;
                    }

                    // Set nilai v103
                    if (derajat3 > 3.4) {
                        v103 = 2.78;
                    } else if (derajat3 > 2.4) {
                        v103 = 3.18;
                    } else if (derajat3 > 1.4) {
                        v103 = 4.3;
                    } else if (derajat3 <= 1.4) {
                        v103 = 12.7;
                    } else {
                        v103 = null;
                    }

                    // Set nilai v104 berdasarkan v100-v103
                    if (derajat3 > 27.5) {
                        v104 = v100;
                    } else if (derajat3 > 12.4) {
                        v104 = v101;
                    } else if (derajat3 > 4.4) {
                        v104 = v102;
                    } else if (derajat3 <= 4.4) {
                        v104 = v103;
                    } else {
                        v104 = null;
                    }

                    let ketidakpastian3 = tidakpasti1 * v104;
                    pangkat4.value = ketidakpastian3.toFixed(9);
                    hasil4.value = ketidakpastian3.toFixed(3);
                    // hitung 5
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

                    let ubaku13 = L84 / normal1;
                    let ubaku14 = totals5 / normal2;
                    let ubaku15 = operator / retangular;
                    let ubakuc13 = ubaku13 / ci;
                    let ubakuc14 = ubaku14 / ci;
                    let ubakuc15 = ubaku15 / ci;

                    let ubakuci13 = (ubakuc13 ** 2);
                    let bakus13 = parseFloat(ubakuci13.toFixed(19));
                    let ubakuci14 = (ubakuc14 ** 2);
                    let bakus14 = parseFloat(ubakuci14.toFixed(19));
                    let ubakuci15 = (ubakuc15 ** 2);
                    let bakus15 = parseFloat(ubakuci15.toFixed(19));
                    let tambah9 = bakus13 + bakus14 + bakus15 + 0 + 0;
                    let tidakpasti4 = Math.sqrt(tambah9).toFixed(10);

                    let ubakucis13 = (ubakuc13 ** 4) / vi1;
                    let baku13 = parseFloat(ubakucis13.toFixed(19));
                    let ubakucis14 = (ubakuc14 ** 4) / vi2;
                    let baku14 = parseFloat(ubakucis14.toFixed(19));
                    let ubakucis15 = (ubakuc15 ** 4) / vi3;
                    let baku15 = parseFloat(ubakucis15.toFixed(19));
                    let tambah10 = baku13 + baku14 + baku15 + 0 + 0;

                    let derajat4 = (tidakpasti4 ** 4) / tambah10;
                    let p100, p101, p102, p103, p104;

                    if (derajat4 > 124) {
                        p100 = 1.96;
                    } else if (derajat4 > 104) {
                        p100 = 1.98;
                    } else if (derajat4 > 74) {
                        p100 = 1.99;
                    } else if (derajat4 > 54) {
                        p100 = 2;
                    } else if (derajat4 > 47.5) {
                        p100 = 2.01;
                    } else if (derajat4 > 37.5) {
                        p100 = 2.02;
                    } else if (derajat4 > 32.5) {
                        p100 = 2.03;
                    } else if (derajat4 > 27.5) {
                        p100 = 2.04;
                    } else {
                        p100 = null;
                    }

                    // Set nilai p101
                    if (derajat4 > 22.5) {
                        p101 = 2.06;
                    } else if (derajat4 > 18.4) {
                        p101 = 2.09;
                    } else if (derajat4 > 17.4) {
                        p101 = 2.1;
                    } else if (derajat4 > 16.4) {
                        p101 = 2.11;
                    } else if (derajat4 > 15.4) {
                        p101 = 2.12;
                    } else if (derajat4 > 14.4) {
                        p101 = 2.13;
                    } else if (derajat4 > 13.4) {
                        p101 = 2.15;
                    } else if (derajat4 > 12.4) {
                        p101 = 2.16;
                    } else {
                        p101 = null;
                    }

                    // Set nilai p102
                    if (derajat4 > 11.4) {
                        p102 = 2.18;
                    } else if (derajat4 > 10.4) {
                        p102 = 2.2;
                    } else if (derajat4 > 9.4) {
                        p102 = 2.23;
                    } else if (derajat4 > 8.4) {
                        p102 = 2.26;
                    } else if (derajat4 > 7.4) {
                        p102 = 2.31;
                    } else if (derajat4 > 6.4) {
                        p102 = 2.37;
                    } else if (derajat4 > 5.4) {
                        p102 = 2.45;
                    } else if (derajat4 > 4.4) {
                        p102 = 2.57;
                    } else {
                        p102 = null;
                    }

                    // Set nilai p103
                    if (derajat4 > 3.4) {
                        p103 = 2.78;
                    } else if (derajat4 > 2.4) {
                        p103 = 3.18;
                    } else if (derajat4 > 1.4) {
                        p103 = 4.3;
                    } else if (derajat4 <= 1.4) {
                        p103 = 12.7;
                    } else {
                        p103 = null;
                    }

                    // Set nilai p104 berdasarkan p100-p103
                    if (derajat4 > 27.5) {
                        p104 = p100;
                    } else if (derajat4 > 12.4) {
                        p104 = p101;
                    } else if (derajat4 > 4.4) {
                        p104 = p102;
                    } else if (derajat4 <= 4.4) {
                        p104 = p103;
                    } else {
                        p104 = null;
                    }

                    let ketidakpastian4 = tidakpasti4 * p104;
                    pangkat5.value = ketidakpastian4.toFixed(9);
                    hasil5.value = ketidakpastian4.toFixed(3);
                    // hitungan 6
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

                    let ubaku16 = L84 / normal1;
                    let ubaku17 = totals6 / normal2;
                    let ubaku18 = operator / retangular;
                    let ubakuc16 = ubaku16 / ci;
                    let ubakuc17 = ubaku17 / ci;
                    let ubakuc18 = ubaku18 / ci;

                    let ubakuci16 = (ubakuc16 ** 2);
                    let bakus16 = parseFloat(ubakuci16.toFixed(19));
                    let ubakuci17 = (ubakuc17 ** 2);
                    let bakus17 = parseFloat(ubakuci17.toFixed(19));
                    let ubakuci18 = (ubakuc18 ** 2);
                    let bakus18 = parseFloat(ubakuci18.toFixed(19));
                    let tambah11 = bakus16 + bakus17 + bakus18 + 0 + 0;
                    let tidakpasti5 = Math.sqrt(tambah11).toFixed(10);

                    let ubakucis16 = (ubakuc16 ** 4) / vi1;
                    let baku16 = parseFloat(ubakucis16.toFixed(19));
                    let ubakucis17 = (ubakuc17 ** 4) / vi2;
                    let baku17 = parseFloat(ubakucis17.toFixed(19));
                    let ubakucis18 = (ubakuc18 ** 4) / vi3;
                    let baku18 = parseFloat(ubakucis18.toFixed(19));
                    let tambah12 = baku16 + baku17 + baku18 + 0 + 0;

                    let derajat5 = (tidakpasti5 ** 4) / tambah12;
                    let l100, l101, l102, l103, l104;

                    if (derajat5 > 124) {
                        l100 = 1.96;
                    } else if (derajat5 > 104) {
                        l100 = 1.98;
                    } else if (derajat5 > 74) {
                        l100 = 1.99;
                    } else if (derajat5 > 54) {
                        l100 = 2;
                    } else if (derajat5 > 47.5) {
                        l100 = 2.01;
                    } else if (derajat5 > 37.5) {
                        l100 = 2.02;
                    } else if (derajat5 > 32.5) {
                        l100 = 2.03;
                    } else if (derajat5 > 27.5) {
                        l100 = 2.04;
                    } else {
                        l100 = null;
                    }

                    // Set nilai l101
                    if (derajat5 > 22.5) {
                        l101 = 2.06;
                    } else if (derajat5 > 18.4) {
                        l101 = 2.09;
                    } else if (derajat5 > 17.4) {
                        l101 = 2.1;
                    } else if (derajat5 > 16.4) {
                        l101 = 2.11;
                    } else if (derajat5 > 15.4) {
                        l101 = 2.12;
                    } else if (derajat5 > 14.4) {
                        l101 = 2.13;
                    } else if (derajat5 > 13.4) {
                        l101 = 2.15;
                    } else if (derajat5 > 12.4) {
                        l101 = 2.16;
                    } else {
                        l101 = null;
                    }

                    // Set nilai l102
                    if (derajat5 > 11.4) {
                        l102 = 2.18;
                    } else if (derajat5 > 10.4) {
                        l102 = 2.2;
                    } else if (derajat5 > 9.4) {
                        l102 = 2.23;
                    } else if (derajat5 > 8.4) {
                        l102 = 2.26;
                    } else if (derajat5 > 7.4) {
                        l102 = 2.31;
                    } else if (derajat5 > 6.4) {
                        l102 = 2.37;
                    } else if (derajat5 > 5.4) {
                        l102 = 2.45;
                    } else if (derajat5 > 4.4) {
                        l102 = 2.57;
                    } else {
                        l102 = null;
                    }

                    // Set nilai l103
                    if (derajat5 > 3.4) {
                        l103 = 2.78;
                    } else if (derajat5 > 2.4) {
                        l103 = 3.18;
                    } else if (derajat5 > 1.4) {
                        l103 = 4.3;
                    } else if (derajat5 <= 1.4) {
                        l103 = 12.7;
                    } else {
                        l103 = null;
                    }

                    // Set nilai l104 berdasarkan l100-l103
                    if (derajat5 > 27.5) {
                        l104 = l100;
                    } else if (derajat5 > 12.4) {
                        l104 = l101;
                    } else if (derajat5 > 4.4) {
                        l104 = l102;
                    } else if (derajat5 <= 4.4) {
                        l104 = l103;
                    } else {
                        l104 = null;
                    }

                    let ketidakpastian5 = tidakpasti5 * l104;
                    pangkat6.value = ketidakpastian5.toFixed(9);
                    hasil6.value = ketidakpastian5.toFixed(3);
                    // hitungan 7
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

                    let ubaku19 = L84 / normal1;
                    let ubaku20 = totals7 / normal2;
                    let ubaku21 = operator / retangular;
                    let ubakuc19 = ubaku19 / ci;
                    let ubakuc20 = ubaku20 / ci;
                    let ubakuc21 = ubaku21 / ci;

                    let ubakuci19 = (ubakuc19 ** 2);
                    let bakus19 = parseFloat(ubakuci19.toFixed(19));
                    let ubakuci20 = (ubakuc20 ** 2);
                    let bakus20 = parseFloat(ubakuci20.toFixed(19));
                    let ubakuci21 = (ubakuc21 ** 2);
                    let bakus21 = parseFloat(ubakuci21.toFixed(19));
                    let tambah13 = bakus19 + bakus20 + bakus21 + 0 + 0;
                    let tidakpasti6 = Math.sqrt(tambah13).toFixed(10);

                    let ubakucis19 = (ubakuc19 ** 4) / vi1;
                    let baku19 = parseFloat(ubakucis19.toFixed(19));
                    let ubakucis20 = (ubakuc20 ** 4) / vi2;
                    let baku20 = parseFloat(ubakucis20.toFixed(19));
                    let ubakucis21 = (ubakuc21 ** 4) / vi3;
                    let baku21 = parseFloat(ubakucis21.toFixed(19));
                    let tambah14 = baku19 + baku20 + baku21 + 0 + 0;

                    let derajat6 = (tidakpasti6 ** 4) / tambah14;
                    let y100, y101, y102, y103, y104;

                    if (derajat6 > 124) {
                        y100 = 1.96;
                    } else if (derajat6 > 104) {
                        y100 = 1.98;
                    } else if (derajat6 > 74) {
                        y100 = 1.99;
                    } else if (derajat6 > 54) {
                        y100 = 2;
                    } else if (derajat6 > 47.5) {
                        y100 = 2.01;
                    } else if (derajat6 > 37.5) {
                        y100 = 2.02;
                    } else if (derajat6 > 32.5) {
                        y100 = 2.03;
                    } else if (derajat6 > 27.5) {
                        y100 = 2.04;
                    } else {
                        y100 = null;
                    }

                    // Set nilai y101
                    if (derajat6 > 22.5) {
                        y101 = 2.06;
                    } else if (derajat6 > 18.4) {
                        y101 = 2.09;
                    } else if (derajat6 > 17.4) {
                        y101 = 2.1;
                    } else if (derajat6 > 16.4) {
                        y101 = 2.11;
                    } else if (derajat6 > 15.4) {
                        y101 = 2.12;
                    } else if (derajat6 > 14.4) {
                        y101 = 2.13;
                    } else if (derajat6 > 13.4) {
                        y101 = 2.15;
                    } else if (derajat6 > 12.4) {
                        y101 = 2.16;
                    } else {
                        y101 = null;
                    }

                    // Set nilai y102
                    if (derajat6 > 11.4) {
                        y102 = 2.18;
                    } else if (derajat6 > 10.4) {
                        y102 = 2.2;
                    } else if (derajat6 > 9.4) {
                        y102 = 2.23;
                    } else if (derajat6 > 8.4) {
                        y102 = 2.26;
                    } else if (derajat6 > 7.4) {
                        y102 = 2.31;
                    } else if (derajat6 > 6.4) {
                        y102 = 2.37;
                    } else if (derajat6 > 5.4) {
                        y102 = 2.45;
                    } else if (derajat6 > 4.4) {
                        y102 = 2.57;
                    } else {
                        y102 = null;
                    }

                    // Set nilai y103
                    if (derajat6 > 3.4) {
                        y103 = 2.78;
                    } else if (derajat6 > 2.4) {
                        y103 = 3.18;
                    } else if (derajat6 > 1.4) {
                        y103 = 4.3;
                    } else if (derajat6 <= 1.4) {
                        y103 = 12.7;
                    } else {
                        y103 = null;
                    }

                    // Set nilai y104 berdasarkan y100-y103
                    if (derajat6 > 27.5) {
                        y104 = y100;
                    } else if (derajat6 > 12.4) {
                        y104 = y101;
                    } else if (derajat6 > 4.4) {
                        y104 = y102;
                    } else if (derajat6 <= 4.4) {
                        y104 = y103;
                    } else {
                        y104 = null;
                    }

                    let ketidakpastian6 = tidakpasti6 * y104;
                    pangkat7.value = ketidakpastian6.toFixed(9);
                    hasil7.value = ketidakpastian6.toFixed(3);
                    // hitung 8
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

                    let ubaku22 = L84 / normal1;
                    let ubaku23 = totals8 / normal2;
                    let ubaku24 = operator / retangular;
                    let ubakuc22 = ubaku22 / ci;
                    let ubakuc23 = ubaku23 / ci;
                    let ubakuc24 = ubaku24 / ci;

                    let ubakuci22 = (ubakuc22 ** 2);
                    let bakus22 = parseFloat(ubakuci22.toFixed(19));
                    let ubakuci23 = (ubakuc23 ** 2);
                    let bakus23 = parseFloat(ubakuci23.toFixed(19));
                    let ubakuci24 = (ubakuc24 ** 2);
                    let bakus24 = parseFloat(ubakuci24.toFixed(19));
                    let tambah15 = bakus22 + bakus23 + bakus24 + 0 + 0;
                    let tidakpasti7 = Math.sqrt(tambah15).toFixed(10);

                    let ubakucis22 = (ubakuc22 ** 4) / vi1;
                    let baku22 = parseFloat(ubakucis22.toFixed(19));
                    let ubakucis23 = (ubakuc23 ** 4) / vi2;
                    let baku23 = parseFloat(ubakucis23.toFixed(19));
                    let ubakucis24 = (ubakuc24 ** 4) / vi3;
                    let baku24 = parseFloat(ubakucis24.toFixed(19));
                    let tambah16 = baku22 + baku23 + baku24 + 0 + 0;

                    let derajat7 = (tidakpasti7 ** 4) / tambah16;
                    let x100, x101, x102, x103, x104;

                    if (derajat7 > 124) {
                        x100 = 1.96;
                    } else if (derajat7 > 104) {
                        x100 = 1.98;
                    } else if (derajat7 > 74) {
                        x100 = 1.99;
                    } else if (derajat7 > 54) {
                        x100 = 2;
                    } else if (derajat7 > 47.5) {
                        x100 = 2.01;
                    } else if (derajat7 > 37.5) {
                        x100 = 2.02;
                    } else if (derajat7 > 32.5) {
                        x100 = 2.03;
                    } else if (derajat7 > 27.5) {
                        x100 = 2.04;
                    } else {
                        x100 = null;
                    }

                    // Set nilai x101
                    if (derajat7 > 22.5) {
                        x101 = 2.06;
                    } else if (derajat7 > 18.4) {
                        x101 = 2.09;
                    } else if (derajat7 > 17.4) {
                        x101 = 2.1;
                    } else if (derajat7 > 16.4) {
                        x101 = 2.11;
                    } else if (derajat7 > 15.4) {
                        x101 = 2.12;
                    } else if (derajat7 > 14.4) {
                        x101 = 2.13;
                    } else if (derajat7 > 13.4) {
                        x101 = 2.15;
                    } else if (derajat7 > 12.4) {
                        x101 = 2.16;
                    } else {
                        x101 = null;
                    }

                    // Set nilai x102
                    if (derajat7 > 11.4) {
                        x102 = 2.18;
                    } else if (derajat7 > 10.4) {
                        x102 = 2.2;
                    } else if (derajat7 > 9.4) {
                        x102 = 2.23;
                    } else if (derajat7 > 8.4) {
                        x102 = 2.26;
                    } else if (derajat7 > 7.4) {
                        x102 = 2.31;
                    } else if (derajat7 > 6.4) {
                        x102 = 2.37;
                    } else if (derajat7 > 5.4) {
                        x102 = 2.45;
                    } else if (derajat7 > 4.4) {
                        x102 = 2.57;
                    } else {
                        x102 = null;
                    }

                    // Set nilai x103
                    if (derajat7 > 3.4) {
                        x103 = 2.78;
                    } else if (derajat7 > 2.4) {
                        x103 = 3.18;
                    } else if (derajat7 > 1.4) {
                        x103 = 4.3;
                    } else if (derajat7 <= 1.4) {
                        x103 = 12.7;
                    } else {
                        x103 = null;
                    }

                    // Set nilai x104 berdasarkan x100-x103
                    if (derajat7 > 27.5) {
                        x104 = x100;
                    } else if (derajat7 > 12.4) {
                        x104 = x101;
                    } else if (derajat7 > 4.4) {
                        x104 = x102;
                    } else if (derajat7 <= 4.4) {
                        x104 = x103;
                    } else {
                        x104 = null;
                    }

                    let ketidakpastian7 = tidakpasti7 * x104;
                    pangkat8.value = ketidakpastian7.toFixed(9);
                    hasil8.value = ketidakpastian7.toFixed(3);
                    // hitung 9
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

                    let ubaku25 = L84 / normal1;
                    let ubaku26 = totals9 / normal2;
                    let ubaku27 = operator / retangular;
                    let ubakuc25 = ubaku25 / ci;
                    let ubakuc26 = ubaku26 / ci;
                    let ubakuc27 = ubaku27 / ci;

                    let ubakuci25 = (ubakuc25 ** 2);
                    let bakus25 = parseFloat(ubakuci25.toFixed(19));
                    let ubakuci26 = (ubakuc26 ** 2);
                    let bakus26 = parseFloat(ubakuci26.toFixed(19));
                    let ubakuci27 = (ubakuc27 ** 2);
                    let bakus27 = parseFloat(ubakuci27.toFixed(19));
                    let tambah17 = bakus25 + bakus26 + bakus27 + 0 + 0;
                    let tidakpasti8 = Math.sqrt(tambah17).toFixed(10);

                    let ubakucis25 = (ubakuc25 ** 4) / vi1;
                    let baku25 = parseFloat(ubakucis25.toFixed(19));
                    let ubakucis26 = (ubakuc26 ** 4) / vi2;
                    let baku26 = parseFloat(ubakucis26.toFixed(19));
                    let ubakucis27 = (ubakuc27 ** 4) / vi3;
                    let baku27 = parseFloat(ubakucis27.toFixed(19));
                    let tambah18 = baku25 + baku26 + baku27 + 0 + 0;

                    let derajat8 = (tidakpasti8 ** 4) / tambah18;
                    let z100, z101, z102, z103, z104;

                    if (derajat8 > 124) {
                        z100 = 1.96;
                    } else if (derajat8 > 104) {
                        z100 = 1.98;
                    } else if (derajat8 > 74) {
                        z100 = 1.99;
                    } else if (derajat8 > 54) {
                        z100 = 2;
                    } else if (derajat8 > 47.5) {
                        z100 = 2.01;
                    } else if (derajat8 > 37.5) {
                        z100 = 2.02;
                    } else if (derajat8 > 32.5) {
                        z100 = 2.03;
                    } else if (derajat8 > 27.5) {
                        z100 = 2.04;
                    } else {
                        z100 = null;
                    }

                    // Set nilai z101
                    if (derajat8 > 22.5) {
                        z101 = 2.06;
                    } else if (derajat8 > 18.4) {
                        z101 = 2.09;
                    } else if (derajat8 > 17.4) {
                        z101 = 2.1;
                    } else if (derajat8 > 16.4) {
                        z101 = 2.11;
                    } else if (derajat8 > 15.4) {
                        z101 = 2.12;
                    } else if (derajat8 > 14.4) {
                        z101 = 2.13;
                    } else if (derajat8 > 13.4) {
                        z101 = 2.15;
                    } else if (derajat8 > 12.4) {
                        z101 = 2.16;
                    } else {
                        z101 = null;
                    }

                    // Set nilai z102
                    if (derajat8 > 11.4) {
                        z102 = 2.18;
                    } else if (derajat8 > 10.4) {
                        z102 = 2.2;
                    } else if (derajat8 > 9.4) {
                        z102 = 2.23;
                    } else if (derajat8 > 8.4) {
                        z102 = 2.26;
                    } else if (derajat8 > 7.4) {
                        z102 = 2.31;
                    } else if (derajat8 > 6.4) {
                        z102 = 2.37;
                    } else if (derajat8 > 5.4) {
                        z102 = 2.45;
                    } else if (derajat8 > 4.4) {
                        z102 = 2.57;
                    } else {
                        z102 = null;
                    }

                    // Set nilai z103
                    if (derajat8 > 3.4) {
                        z103 = 2.78;
                    } else if (derajat8 > 2.4) {
                        z103 = 3.18;
                    } else if (derajat8 > 1.4) {
                        z103 = 4.3;
                    } else if (derajat8 <= 1.4) {
                        z103 = 12.7;
                    } else {
                        z103 = null;
                    }

                    // Set nilai z104 berdasarkan z100-z103
                    if (derajat8 > 27.5) {
                        z104 = z100;
                    } else if (derajat8 > 12.4) {
                        z104 = z101;
                    } else if (derajat8 > 4.4) {
                        z104 = z102;
                    } else if (derajat8 <= 4.4) {
                        z104 = z103;
                    } else {
                        z104 = null;
                    }

                    let ketidakpastian8 = tidakpasti8 * z104;
                    pangkat9.value = ketidakpastian8.toFixed(9);
                    hasil9.value = ketidakpastian8.toFixed(3);
                    // hitung 10
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

                    let ubaku28 = L84 / normal1;
                    let ubaku29 = totals10 / normal2;
                    let ubaku30 = operator / retangular;
                    let ubakuc28 = ubaku28 / ci;
                    let ubakuc29 = ubaku29 / ci;
                    let ubakuc30 = ubaku30 / ci;

                    let ubakuci28 = (ubakuc28 ** 2);
                    let bakus28 = parseFloat(ubakuci28.toFixed(19));
                    let ubakuci29 = (ubakuc29 ** 2);
                    let bakus29 = parseFloat(ubakuci29.toFixed(19));
                    let ubakuci30 = (ubakuc30 ** 2);
                    let bakus30 = parseFloat(ubakuci30.toFixed(19));
                    let tambah19 = bakus28 + bakus29 + bakus30 + 0 + 0;
                    let tidakpasti9 = Math.sqrt(tambah19).toFixed(10);

                    let ubakucis28 = (ubakuc28 ** 4) / vi1;
                    let baku28 = parseFloat(ubakucis28.toFixed(19));
                    let ubakucis29 = (ubakuc29 ** 4) / vi2;
                    let baku29 = parseFloat(ubakucis29.toFixed(19));
                    let ubakucis30 = (ubakuc30 ** 4) / vi3;
                    let baku30 = parseFloat(ubakucis30.toFixed(19));
                    let tambah20 = baku28 + baku29 + baku30 + 0 + 0;

                    let derajat9 = (tidakpasti9 ** 4) / tambah20;
                    let q100, q101, q102, q103, q104;

                    if (derajat9 > 124) {
                        q100 = 1.96;
                    } else if (derajat9 > 104) {
                        q100 = 1.98;
                    } else if (derajat9 > 74) {
                        q100 = 1.99;
                    } else if (derajat9 > 54) {
                        q100 = 2;
                    } else if (derajat9 > 47.5) {
                        q100 = 2.01;
                    } else if (derajat9 > 37.5) {
                        q100 = 2.02;
                    } else if (derajat9 > 32.5) {
                        q100 = 2.03;
                    } else if (derajat9 > 27.5) {
                        q100 = 2.04;
                    } else {
                        q100 = null;
                    }

                    // Set nilai q101
                    if (derajat9 > 22.5) {
                        q101 = 2.06;
                    } else if (derajat9 > 18.4) {
                        q101 = 2.09;
                    } else if (derajat9 > 17.4) {
                        q101 = 2.1;
                    } else if (derajat9 > 16.4) {
                        q101 = 2.11;
                    } else if (derajat9 > 15.4) {
                        q101 = 2.12;
                    } else if (derajat9 > 14.4) {
                        q101 = 2.13;
                    } else if (derajat9 > 13.4) {
                        q101 = 2.15;
                    } else if (derajat9 > 12.4) {
                        q101 = 2.16;
                    } else {
                        q101 = null;
                    }

                    // Set nilai q102
                    if (derajat9 > 11.4) {
                        q102 = 2.18;
                    } else if (derajat9 > 10.4) {
                        q102 = 2.2;
                    } else if (derajat9 > 9.4) {
                        q102 = 2.23;
                    } else if (derajat9 > 8.4) {
                        q102 = 2.26;
                    } else if (derajat9 > 7.4) {
                        q102 = 2.31;
                    } else if (derajat9 > 6.4) {
                        q102 = 2.37;
                    } else if (derajat9 > 5.4) {
                        q102 = 2.45;
                    } else if (derajat9 > 4.4) {
                        q102 = 2.57;
                    } else {
                        q102 = null;
                    }

                    // Set nilai q103
                    if (derajat9 > 3.4) {
                        q103 = 2.78;
                    } else if (derajat9 > 2.4) {
                        q103 = 3.18;
                    } else if (derajat9 > 1.4) {
                        q103 = 4.3;
                    } else if (derajat9 <= 1.4) {
                        q103 = 12.7;
                    } else {
                        q103 = null;
                    }

                    // Set nilai q104 berdasarkan q100-q103
                    if (derajat9 > 27.5) {
                        q104 = q100;
                    } else if (derajat9 > 12.4) {
                        q104 = q101;
                    } else if (derajat9 > 4.4) {
                        q104 = q102;
                    } else if (derajat9 <= 4.4) {
                        q104 = q103;
                    } else {
                        q104 = null;
                    }

                    let ketidakpastian9 = tidakpasti9 * q104;
                    pangkat10.value = ketidakpastian9.toFixed(9);
                    hasil10.value = ketidakpastian9.toFixed(3);
                    // hitungan 11
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

                    let ubaku31 = L84 / normal1;
                    let ubaku32 = totals11 / normal2;
                    let ubaku33 = operator / retangular;
                    let ubakuc31 = ubaku31 / ci;
                    let ubakuc32 = ubaku32 / ci;
                    let ubakuc33 = ubaku33 / ci;

                    let ubakuci31 = (ubakuc31 ** 2);
                    let bakus31 = parseFloat(ubakuci31.toFixed(19));
                    let ubakuci32 = (ubakuc32 ** 2);
                    let bakus32 = parseFloat(ubakuci32.toFixed(19));
                    let ubakuci33 = (ubakuc33 ** 2);
                    let bakus33 = parseFloat(ubakuci33.toFixed(19));
                    let tambah21 = bakus31 + bakus32 + bakus33 + 0 + 0;
                    let tidakpasti10 = Math.sqrt(tambah21).toFixed(10);

                    let ubakucis31 = (ubakuc31 ** 4) / vi1;
                    let baku31 = parseFloat(ubakucis31.toFixed(19));
                    let ubakucis32 = (ubakuc32 ** 4) / vi2;
                    let baku32 = parseFloat(ubakucis32.toFixed(19));
                    let ubakucis33 = (ubakuc33 ** 4) / vi3;
                    let baku33 = parseFloat(ubakucis33.toFixed(19));
                    let tambah22 = baku31 + baku32 + baku33 + 0 + 0;

                    let derajat10 = (tidakpasti10 ** 4) / tambah22;
                    let zb100, zb101, zb102, zb103, zb104;

                    if (derajat10 > 124) {
                        zb100 = 1.96;
                    } else if (derajat10 > 104) {
                        zb100 = 1.98;
                    } else if (derajat10 > 74) {
                        zb100 = 1.99;
                    } else if (derajat10 > 54) {
                        zb100 = 2;
                    } else if (derajat10 > 47.5) {
                        zb100 = 2.01;
                    } else if (derajat10 > 37.5) {
                        zb100 = 2.02;
                    } else if (derajat10 > 32.5) {
                        zb100 = 2.03;
                    } else if (derajat10 > 27.5) {
                        zb100 = 2.04;
                    } else {
                        zb100 = null;
                    }

                    // Set nilai zb101
                    if (derajat10 > 22.5) {
                        zb101 = 2.06;
                    } else if (derajat10 > 18.4) {
                        zb101 = 2.09;
                    } else if (derajat10 > 17.4) {
                        zb101 = 2.1;
                    } else if (derajat10 > 16.4) {
                        zb101 = 2.11;
                    } else if (derajat10 > 15.4) {
                        zb101 = 2.12;
                    } else if (derajat10 > 14.4) {
                        zb101 = 2.13;
                    } else if (derajat10 > 13.4) {
                        zb101 = 2.15;
                    } else if (derajat10 > 12.4) {
                        zb101 = 2.16;
                    } else {
                        zb101 = null;
                    }

                    // Set nilai zb102
                    if (derajat10 > 11.4) {
                        zb102 = 2.18;
                    } else if (derajat10 > 10.4) {
                        zb102 = 2.2;
                    } else if (derajat10 > 9.4) {
                        zb102 = 2.23;
                    } else if (derajat10 > 8.4) {
                        zb102 = 2.26;
                    } else if (derajat10 > 7.4) {
                        zb102 = 2.31;
                    } else if (derajat10 > 6.4) {
                        zb102 = 2.37;
                    } else if (derajat10 > 5.4) {
                        zb102 = 2.45;
                    } else if (derajat10 > 4.4) {
                        zb102 = 2.57;
                    } else {
                        zb102 = null;
                    }

                    // Set nilai zb103
                    if (derajat10 > 3.4) {
                        zb103 = 2.78;
                    } else if (derajat10 > 2.4) {
                        zb103 = 3.18;
                    } else if (derajat10 > 1.4) {
                        zb103 = 4.3;
                    } else if (derajat10 <= 1.4) {
                        zb103 = 12.7;
                    } else {
                        zb103 = null;
                    }

                    // Set nilai zb104 berdasarkan zb100-zb103
                    if (derajat10 > 27.5) {
                        zb104 = zb100;
                    } else if (derajat10 > 12.4) {
                        zb104 = zb101;
                    } else if (derajat10 > 4.4) {
                        zb104 = zb102;
                    } else if (derajat10 <= 4.4) {
                        zb104 = zb103;
                    } else {
                        zb104 = null;
                    }

                    let ketidakpastian10 = tidakpasti10 * zb104;
                    pangkat11.value = ketidakpastian10.toFixed(9);
                    hasil11.value = ketidakpastian10.toFixed(3);


                    // hitungan 12
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

                    let ubaku34 = L84 / normal1;
                    let ubaku35 = totals12 / normal2;
                    let ubaku36 = operator / retangular;
                    let ubakuc34 = ubaku34 / ci;
                    let ubakuc35 = ubaku35 / ci;
                    let ubakuc36 = ubaku36 / ci;

                    let ubakuci34 = (ubakuc34 ** 2);
                    let bakus34 = parseFloat(ubakuci34.toFixed(19));
                    let ubakuci35 = (ubakuc35 ** 2);
                    let bakus35 = parseFloat(ubakuci35.toFixed(19));
                    let ubakuci36 = (ubakuc36 ** 2);
                    let bakus36 = parseFloat(ubakuci36.toFixed(19));
                    let tambah23 = bakus34 + bakus35 + bakus36 + 0 + 0;
                    let tidakpasti11 = Math.sqrt(tambah23).toFixed(10);

                    let ubakucis34 = (ubakuc34 ** 4) / vi1;
                    let baku34 = parseFloat(ubakucis34.toFixed(19));
                    let ubakucis35 = (ubakuc35 ** 4) / vi2;
                    let baku35 = parseFloat(ubakucis35.toFixed(19));
                    let ubakucis36 = (ubakuc36 ** 4) / vi3;
                    let baku36 = parseFloat(ubakucis36.toFixed(19));
                    let tambah24 = baku34 + baku35 + baku36 + 0 + 0;

                    let derajat11 = (tidakpasti11 ** 4) / tambah24;
                    let zs100, zs101, zs102, zs103, zs104;

                    if (derajat11 > 124) {
                        zs100 = 1.96;
                    } else if (derajat11 > 104) {
                        zs100 = 1.98;
                    } else if (derajat11 > 74) {
                        zs100 = 1.99;
                    } else if (derajat11 > 54) {
                        zs100 = 2;
                    } else if (derajat11 > 47.5) {
                        zs100 = 2.01;
                    } else if (derajat11 > 37.5) {
                        zs100 = 2.02;
                    } else if (derajat11 > 32.5) {
                        zs100 = 2.03;
                    } else if (derajat11 > 27.5) {
                        zs100 = 2.04;
                    } else {
                        zs100 = null;
                    }

                    // Set nilai zs101
                    if (derajat11 > 22.5) {
                        zs101 = 2.06;
                    } else if (derajat11 > 18.4) {
                        zs101 = 2.09;
                    } else if (derajat11 > 17.4) {
                        zs101 = 2.1;
                    } else if (derajat11 > 16.4) {
                        zs101 = 2.11;
                    } else if (derajat11 > 15.4) {
                        zs101 = 2.12;
                    } else if (derajat11 > 14.4) {
                        zs101 = 2.13;
                    } else if (derajat11 > 13.4) {
                        zs101 = 2.15;
                    } else if (derajat11 > 12.4) {
                        zs101 = 2.16;
                    } else {
                        zs101 = null;
                    }

                    // Set nilai zs102
                    if (derajat11 > 11.4) {
                        zs102 = 2.18;
                    } else if (derajat11 > 10.4) {
                        zs102 = 2.2;
                    } else if (derajat11 > 9.4) {
                        zs102 = 2.23;
                    } else if (derajat11 > 8.4) {
                        zs102 = 2.26;
                    } else if (derajat11 > 7.4) {
                        zs102 = 2.31;
                    } else if (derajat11 > 6.4) {
                        zs102 = 2.37;
                    } else if (derajat11 > 5.4) {
                        zs102 = 2.45;
                    } else if (derajat11 > 4.4) {
                        zs102 = 2.57;
                    } else {
                        zs102 = null;
                    }

                    // Set nilai zs103
                    if (derajat11 > 3.4) {
                        zs103 = 2.78;
                    } else if (derajat11 > 2.4) {
                        zs103 = 3.18;
                    } else if (derajat11 > 1.4) {
                        zs103 = 4.3;
                    } else if (derajat11 <= 1.4) {
                        zs103 = 12.7;
                    } else {
                        zs103 = null;
                    }

                    // Set nilai zs104 berdasarkan zs100-zs103
                    if (derajat11 > 27.5) {
                        zs104 = zs100;
                    } else if (derajat11 > 12.4) {
                        zs104 = zs101;
                    } else if (derajat11 > 4.4) {
                        zs104 = zs102;
                    } else if (derajat11 <= 4.4) {
                        zs104 = zs103;
                    } else {
                        zs104 = null;
                    }

                    let ketidakpastian11 = tidakpasti11 * zs104;
                    pangkat12.value = ketidakpastian11.toFixed(9);
                    hasil12.value = ketidakpastian11.toFixed(3);


                    // hitung 13
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

                    let ubaku37 = L84 / normal1;
                    let ubaku38 = totals12 / normal2;
                    let ubaku39 = operator / retangular;
                    let ubakuc37 = ubaku37 / ci;
                    let ubakuc38 = ubaku38 / ci;
                    let ubakuc39 = ubaku39 / ci;

                    let ubakuci37 = (ubakuc37 ** 2);
                    let bakus37 = parseFloat(ubakuci37.toFixed(19));
                    let ubakuci38 = (ubakuc38 ** 2);
                    let bakus38 = parseFloat(ubakuci38.toFixed(19));
                    let ubakuci39 = (ubakuc39 ** 2);
                    let bakus39 = parseFloat(ubakuci39.toFixed(19));
                    let tambah25 = bakus37 + bakus38 + bakus39 + 0 + 0;
                    let tidakpasti12 = Math.sqrt(tambah25).toFixed(10);

                    let ubakucis37 = (ubakuc37 ** 4) / vi1;
                    let baku37 = parseFloat(ubakucis37.toFixed(19));
                    let ubakucis38 = (ubakuc38 ** 4) / vi2;
                    let baku38 = parseFloat(ubakucis38.toFixed(19));
                    let ubakucis39 = (ubakuc39 ** 4) / vi3;
                    let baku39 = parseFloat(ubakucis39.toFixed(19));
                    let tambah26 = baku37 + baku38 + baku39 + 0 + 0;

                    let derajat12 = (tidakpasti12 ** 4) / tambah26;
                    let zp100, zp101, zp102, zp103, zp104;

                    if (derajat12 > 124) {
                        zp100 = 1.96;
                    } else if (derajat12 > 104) {
                        zp100 = 1.98;
                    } else if (derajat12 > 74) {
                        zp100 = 1.99;
                    } else if (derajat12 > 54) {
                        zp100 = 2;
                    } else if (derajat12 > 47.5) {
                        zp100 = 2.01;
                    } else if (derajat12 > 37.5) {
                        zp100 = 2.02;
                    } else if (derajat12 > 32.5) {
                        zp100 = 2.03;
                    } else if (derajat12 > 27.5) {
                        zp100 = 2.04;
                    } else {
                        zp100 = null;
                    }

                    // Set nilai zp101
                    if (derajat12 > 22.5) {
                        zp101 = 2.06;
                    } else if (derajat12 > 18.4) {
                        zp101 = 2.09;
                    } else if (derajat12 > 17.4) {
                        zp101 = 2.1;
                    } else if (derajat12 > 16.4) {
                        zp101 = 2.11;
                    } else if (derajat12 > 15.4) {
                        zp101 = 2.12;
                    } else if (derajat12 > 14.4) {
                        zp101 = 2.13;
                    } else if (derajat12 > 13.4) {
                        zp101 = 2.15;
                    } else if (derajat12 > 12.4) {
                        zp101 = 2.16;
                    } else {
                        zp101 = null;
                    }

                    // Set nilai zp102
                    if (derajat12 > 11.4) {
                        zp102 = 2.18;
                    } else if (derajat12 > 10.4) {
                        zp102 = 2.2;
                    } else if (derajat12 > 9.4) {
                        zp102 = 2.23;
                    } else if (derajat12 > 8.4) {
                        zp102 = 2.26;
                    } else if (derajat12 > 7.4) {
                        zp102 = 2.31;
                    } else if (derajat12 > 6.4) {
                        zp102 = 2.37;
                    } else if (derajat12 > 5.4) {
                        zp102 = 2.45;
                    } else if (derajat12 > 4.4) {
                        zp102 = 2.57;
                    } else {
                        zp102 = null;
                    }

                    // Set nilai zp103
                    if (derajat12 > 3.4) {
                        zp103 = 2.78;
                    } else if (derajat12 > 2.4) {
                        zp103 = 3.18;
                    } else if (derajat12 > 1.4) {
                        zp103 = 4.3;
                    } else if (derajat12 <= 1.4) {
                        zp103 = 12.7;
                    } else {
                        zp103 = null;
                    }

                    // Set nilai zp104 berdasarkan zp100-zp103
                    if (derajat12 > 27.5) {
                        zp104 = zp100;
                    } else if (derajat12 > 12.4) {
                        zp104 = zp101;
                    } else if (derajat12 > 4.4) {
                        zp104 = zp102;
                    } else if (derajat12 <= 4.4) {
                        zp104 = zp103;
                    } else {
                        zp104 = null;
                    }

                    let ketidakpastian12 = tidakpasti12 * zp104;
                    pangkat13.value = ketidakpastian12.toFixed(9);
                    hasil13.value = ketidakpastian12.toFixed(3);


                    // hitung 14
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

                    let ubaku40 = L84 / normal1;
                    let ubaku41 = totals12 / normal2;
                    let ubaku42 = operator / retangular;
                    let ubakuc40 = ubaku40 / ci;
                    let ubakuc41 = ubaku41 / ci;
                    let ubakuc42 = ubaku42 / ci;

                    let ubakuci40 = (ubakuc40 ** 2);
                    let bakus40 = parseFloat(ubakuci40.toFixed(19));
                    let ubakuci41 = (ubakuc41 ** 2);
                    let bakus41 = parseFloat(ubakuci41.toFixed(19));
                    let ubakuci42 = (ubakuc42 ** 2);
                    let bakus42 = parseFloat(ubakuci42.toFixed(19));
                    let tambah27 = bakus40 + bakus41 + bakus42 + 0 + 0;
                    let tidakpasti13 = Math.sqrt(tambah27).toFixed(10);

                    let ubakucis40 = (ubakuc40 ** 4) / vi1;
                    let baku40 = parseFloat(ubakucis40.toFixed(19));
                    let ubakucis41 = (ubakuc41 ** 4) / vi2;
                    let baku41 = parseFloat(ubakucis41.toFixed(19));
                    let ubakucis42 = (ubakuc42 ** 4) / vi3;
                    let baku42 = parseFloat(ubakucis42.toFixed(19));
                    let tambah28 = baku40 + baku41 + baku42 + 0 + 0;

                    let derajat13 = (tidakpasti13 ** 4) / tambah28;
                    let zj100, zj101, zj102, zj103, zj104;

                    if (derajat13 > 124) {
                        zj100 = 1.96;
                    } else if (derajat13 > 104) {
                        zj100 = 1.98;
                    } else if (derajat13 > 74) {
                        zj100 = 1.99;
                    } else if (derajat13 > 54) {
                        zj100 = 2;
                    } else if (derajat13 > 47.5) {
                        zj100 = 2.01;
                    } else if (derajat13 > 37.5) {
                        zj100 = 2.02;
                    } else if (derajat13 > 32.5) {
                        zj100 = 2.03;
                    } else if (derajat13 > 27.5) {
                        zj100 = 2.04;
                    } else {
                        zj100 = null;
                    }

                    // Set nilai zj101
                    if (derajat13 > 22.5) {
                        zj101 = 2.06;
                    } else if (derajat13 > 18.4) {
                        zj101 = 2.09;
                    } else if (derajat13 > 17.4) {
                        zj101 = 2.1;
                    } else if (derajat13 > 16.4) {
                        zj101 = 2.11;
                    } else if (derajat13 > 15.4) {
                        zj101 = 2.12;
                    } else if (derajat13 > 14.4) {
                        zj101 = 2.13;
                    } else if (derajat13 > 13.4) {
                        zj101 = 2.15;
                    } else if (derajat13 > 12.4) {
                        zj101 = 2.16;
                    } else {
                        zj101 = null;
                    }

                    // Set nilai zj102
                    if (derajat13 > 11.4) {
                        zj102 = 2.18;
                    } else if (derajat13 > 10.4) {
                        zj102 = 2.2;
                    } else if (derajat13 > 9.4) {
                        zj102 = 2.23;
                    } else if (derajat13 > 8.4) {
                        zj102 = 2.26;
                    } else if (derajat13 > 7.4) {
                        zj102 = 2.31;
                    } else if (derajat13 > 6.4) {
                        zj102 = 2.37;
                    } else if (derajat13 > 5.4) {
                        zj102 = 2.45;
                    } else if (derajat13 > 4.4) {
                        zj102 = 2.57;
                    } else {
                        zj102 = null;
                    }

                    // Set nilai zj103
                    if (derajat13 > 3.4) {
                        zj103 = 2.78;
                    } else if (derajat13 > 2.4) {
                        zj103 = 3.18;
                    } else if (derajat13 > 1.4) {
                        zj103 = 4.3;
                    } else if (derajat13 <= 1.4) {
                        zj103 = 12.7;
                    } else {
                        zj103 = null;
                    }

                    // Set nilai zj104 berdasarkan zj100-zj103
                    if (derajat13 > 27.5) {
                        zj104 = zj100;
                    } else if (derajat13 > 12.4) {
                        zj104 = zj101;
                    } else if (derajat13 > 4.4) {
                        zj104 = zj102;
                    } else if (derajat13 <= 4.4) {
                        zj104 = zj103;
                    } else {
                        zj104 = null;
                    }

                    let ketidakpastian13 = tidakpasti13 * zj104;
                    pangkat14.value = ketidakpastian13.toFixed(9);
                    hasil14.value = ketidakpastian13.toFixed(3);


                    // hitung 15
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

                    let ubaku43 = L84 / normal1;
                    let ubaku44 = totals12 / normal2;
                    let ubaku45 = operator / retangular;
                    let ubakuc43 = ubaku43 / ci;
                    let ubakuc44 = ubaku44 / ci;
                    let ubakuc45 = ubaku45 / ci;

                    let ubakuci43 = (ubakuc43 ** 2);
                    let bakus43 = parseFloat(ubakuci43.toFixed(19));
                    let ubakuci44 = (ubakuc44 ** 2);
                    let bakus44 = parseFloat(ubakuci44.toFixed(19));
                    let ubakuci45 = (ubakuc45 ** 2);
                    let bakus45 = parseFloat(ubakuci45.toFixed(19));
                    let tambah29 = bakus43 + bakus44 + bakus45 + 0 + 0;
                    let tidakpasti14 = Math.sqrt(tambah29).toFixed(10);

                    let ubakucis43 = (ubakuc43 ** 4) / vi1;
                    let baku43 = parseFloat(ubakucis43.toFixed(19));
                    let ubakucis44 = (ubakuc44 ** 4) / vi2;
                    let baku44 = parseFloat(ubakucis44.toFixed(19));
                    let ubakucis45 = (ubakuc45 ** 4) / vi3;
                    let baku45 = parseFloat(ubakucis45.toFixed(19));
                    let tambah30 = baku43 + baku44 + baku45 + 0 + 0;

                    let derajat14 = (tidakpasti14 ** 4) / tambah30;
                    let zg100, zg101, zg102, zg103, zg104;

                    if (derajat14 > 124) {
                        zg100 = 1.96;
                    } else if (derajat14 > 104) {
                        zg100 = 1.98;
                    } else if (derajat14 > 74) {
                        zg100 = 1.99;
                    } else if (derajat14 > 54) {
                        zg100 = 2;
                    } else if (derajat14 > 47.5) {
                        zg100 = 2.01;
                    } else if (derajat14 > 37.5) {
                        zg100 = 2.02;
                    } else if (derajat14 > 32.5) {
                        zg100 = 2.03;
                    } else if (derajat14 > 27.5) {
                        zg100 = 2.04;
                    } else {
                        zg100 = null;
                    }

                    // Set nilai zg101
                    if (derajat14 > 22.5) {
                        zg101 = 2.06;
                    } else if (derajat14 > 18.4) {
                        zg101 = 2.09;
                    } else if (derajat14 > 17.4) {
                        zg101 = 2.1;
                    } else if (derajat14 > 16.4) {
                        zg101 = 2.11;
                    } else if (derajat14 > 15.4) {
                        zg101 = 2.12;
                    } else if (derajat14 > 14.4) {
                        zg101 = 2.13;
                    } else if (derajat14 > 13.4) {
                        zg101 = 2.15;
                    } else if (derajat14 > 12.4) {
                        zg101 = 2.16;
                    } else {
                        zg101 = null;
                    }

                    // Set nilai zg102
                    if (derajat14 > 11.4) {
                        zg102 = 2.18;
                    } else if (derajat14 > 10.4) {
                        zg102 = 2.2;
                    } else if (derajat14 > 9.4) {
                        zg102 = 2.23;
                    } else if (derajat14 > 8.4) {
                        zg102 = 2.26;
                    } else if (derajat14 > 7.4) {
                        zg102 = 2.31;
                    } else if (derajat14 > 6.4) {
                        zg102 = 2.37;
                    } else if (derajat14 > 5.4) {
                        zg102 = 2.45;
                    } else if (derajat14 > 4.4) {
                        zg102 = 2.57;
                    } else {
                        zg102 = null;
                    }

                    // Set nilai zg103
                    if (derajat14 > 3.4) {
                        zg103 = 2.78;
                    } else if (derajat14 > 2.4) {
                        zg103 = 3.18;
                    } else if (derajat14 > 1.4) {
                        zg103 = 4.3;
                    } else if (derajat14 <= 1.4) {
                        zg103 = 12.7;
                    } else {
                        zg103 = null;
                    }

                    // Set nilai zg104 berdasarkan zg100-zg103
                    if (derajat14 > 27.5) {
                        zg104 = zg100;
                    } else if (derajat14 > 12.4) {
                        zg104 = zg101;
                    } else if (derajat14 > 4.4) {
                        zg104 = zg102;
                    } else if (derajat14 <= 4.4) {
                        zg104 = zg103;
                    } else {
                        zg104 = null;
                    }

                    let ketidakpastian14 = tidakpasti14 * zg104;
                    pangkat15.value = ketidakpastian14.toFixed(9);
                    hasil15.value = ketidakpastian14.toFixed(3);
                }

                function hapusline2() {
                    var table = document.getElementById("tabelTekananturun");
                    var rowCount = table.rows.length;

                    if (rowCount <= 3) {
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
                var hslId = 1; // ID untuk hsl

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

                        for (var i = 0; i < 9; i++) {
                            // Setiap line memiliki 9 kolom
                            var cell = row.insertCell(i);
                            cell.className = "border"; // Tambahkan class border pada setiap cell

                            if (line % 4 === 0 && (i === 0 || i === 1 || i === 3 || i === 5)) {
                                // Kosongkan cell tertentu pada line ke-4
                                if (i === 0) cell.className = "border dray";
                                if (i === 1) cell.innerHTML = "Rata Rata";
                                if (i === 3 || i === 5) cell.className = "border dray";
                                continue;
                            }

                            if (line % 4 === 1 && (i === 6 || i === 7 || i === 8)) {
                                cell.className = "border dray"
                                continue;
                            }
                            if (line % 4 === 2 && (i === 0 || i === 6 || i === 7 || i === 8)) {
                                cell.className = "border dray"
                                continue;
                            }
                            if (line % 4 === 3 && (i === 0 || i === 6 || i === 7 || i === 8)) {
                                cell.className = "border dray"
                                continue;
                            }
                            if (line % 4 === 4 && (i === 0 || i === 3 || i === 5)) {
                                cell.className = "border dray"
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
                            } else {
                                input.id = "bac" + miid;
                                input.name = "bac" + miid;

                                // Update miid hanya jika bukan kolom ke-9 pada line ke-4
                                if (!(line % 4 === 0 && i === 8)) {
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

                function getid2() {
                    let ids = [];

                    // Mengumpulkan ID untuk input bac dan hsl
                    for (let i = 1; i < miid; i++) {
                        ids.push("bac" + i);
                    }
                    for (let i = 1; i < hslId; i++) {
                        ids.push("hsl" + i);
                    }

                    // console.log("ID yang tersedia:\n" + ids.join("\n"));

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

                    // console.log("Nilai berdasarkan ID:", nilaiBerdasarkanId);

                    let hsl = {}; // Objek untuk menyimpan nilai bac

                    for (let i = 1; i <= 300; i++) {
                        const bacInput = document.getElementById(`bac${i}`);
                        hsl[`bac${i}`] = bacInput ? Number(bacInput.value) || 0 : 0; // Ambil nilai dari input
                    }

                    // hitungan 1
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

                    let ubaku1 = L84 / normal1;
                    let ubaku2 = ttls1 / normal2;
                    let ubaku3 = operator / retangular;
                    let ubakuc1 = ubaku1 / ci;
                    let ubakuc2 = ubaku2 / ci;
                    let ubakuc3 = ubaku3 / ci;

                    let ubakuci1 = (ubakuc1 ** 2);
                    let bakus1 = parseFloat(ubakuci1.toFixed(19));
                    let ubakuci2 = (ubakuc2 ** 2);
                    let bakus2 = parseFloat(ubakuci2.toFixed(19));
                    let ubakuci3 = (ubakuc3 ** 2);
                    let bakus3 = parseFloat(ubakuci3.toFixed(19));
                    let tambah1 = bakus1 + bakus2 + bakus3 + 0 + 0;
                    let tidakpasti = Math.sqrt(tambah1).toFixed(10);

                    let ubakucis1 = (ubakuc1 ** 4) / vi1;
                    let baku1 = parseFloat(ubakucis1.toFixed(19));
                    let ubakucis2 = (ubakuc2 ** 4) / vi2;
                    let baku2 = parseFloat(ubakucis2.toFixed(19));
                    let ubakucis3 = (ubakuc3 ** 4) / vi3;
                    let baku3 = parseFloat(ubakucis3.toFixed(19));
                    let tambah2 = baku1 + baku2 + baku3 + 0 + 0;

                    let derajat = (tidakpasti ** 4) / tambah2;
                    let n100, n101, n102, n103, n104;

                    if (derajat > 124) {
                        n100 = 1.96;
                    } else if (derajat > 104) {
                        n100 = 1.98;
                    } else if (derajat > 74) {
                        n100 = 1.99;
                    } else if (derajat > 54) {
                        n100 = 2;
                    } else if (derajat > 47.5) {
                        n100 = 2.01;
                    } else if (derajat > 37.5) {
                        n100 = 2.02;
                    } else if (derajat > 32.5) {
                        n100 = 2.03;
                    } else if (derajat > 27.5) {
                        n100 = 2.04;
                    } else {
                        n100 = null;
                    }

                    // Set nilai n101
                    if (derajat > 22.5) {
                        n101 = 2.06;
                    } else if (derajat > 18.4) {
                        n101 = 2.09;
                    } else if (derajat > 17.4) {
                        n101 = 2.1;
                    } else if (derajat > 16.4) {
                        n101 = 2.11;
                    } else if (derajat > 15.4) {
                        n101 = 2.12;
                    } else if (derajat > 14.4) {
                        n101 = 2.13;
                    } else if (derajat > 13.4) {
                        n101 = 2.15;
                    } else if (derajat > 12.4) {
                        n101 = 2.16;
                    } else {
                        n101 = null;
                    }

                    // Set nilai n102
                    if (derajat > 11.4) {
                        n102 = 2.18;
                    } else if (derajat > 10.4) {
                        n102 = 2.2;
                    } else if (derajat > 9.4) {
                        n102 = 2.23;
                    } else if (derajat > 8.4) {
                        n102 = 2.26;
                    } else if (derajat > 7.4) {
                        n102 = 2.31;
                    } else if (derajat > 6.4) {
                        n102 = 2.37;
                    } else if (derajat > 5.4) {
                        n102 = 2.45;
                    } else if (derajat > 4.4) {
                        n102 = 2.57;
                    } else {
                        n102 = null;
                    }

                    // Set nilai n103
                    if (derajat > 3.4) {
                        n103 = 2.78;
                    } else if (derajat > 2.4) {
                        n103 = 3.18;
                    } else if (derajat > 1.4) {
                        n103 = 4.3;
                    } else if (derajat <= 1.4) {
                        n103 = 12.7;
                    } else {
                        n103 = null;
                    }

                    // Set nilai n104 berdasarkan n100-n103
                    if (derajat > 27.5) {
                        n104 = n100;
                    } else if (derajat > 12.4) {
                        n104 = n101;
                    } else if (derajat > 4.4) {
                        n104 = n102;
                    } else if (derajat <= 4.4) {
                        n104 = n103;
                    } else {
                        n104 = null;
                    }

                    let ketidakpastian = tidakpasti * n104;
                    kuadrat1.value = ketidakpastian.toFixed(9);
                    hsl1.value = ketidakpastian.toFixed(3);               // hitungan 2
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
                    let ttls2 = Math.sqrt(ttl2);
                    bac40.value = ttls2.toFixed(2);

                    let ubaku4 = L84 / normal1;
                    let ubaku5 = ttls2 / normal2;
                    let ubaku6 = operator / retangular;
                    let ubakuc4 = ubaku4 / ci;
                    let ubakuc5 = ubaku5 / ci;
                    let ubakuc6 = ubaku6 / ci;

                    let ubakuci4 = (ubakuc4 ** 2);
                    let bakus4 = parseFloat(ubakuci4.toFixed(19));
                    let ubakuci5 = (ubakuc5 ** 2);
                    let bakus5 = parseFloat(ubakuci5.toFixed(19));
                    let ubakuci6 = (ubakuc6 ** 2);
                    let bakus6 = parseFloat(ubakuci6.toFixed(19));
                    let tambah3 = bakus4 + bakus5 + bakus6 + 0 + 0;
                    let tidakpasti1 = Math.sqrt(tambah3).toFixed(10);

                    let ubakucis4 = (ubakuc4 ** 4) / vi1;
                    let baku4 = parseFloat(ubakucis4.toFixed(19));
                    let ubakucis5 = (ubakuc5 ** 4) / vi2;
                    let baku5 = parseFloat(ubakucis5.toFixed(19));
                    let ubakucis6 = (ubakuc6 ** 4) / vi3;
                    let baku6 = parseFloat(ubakucis6.toFixed(19));
                    let tambah4 = baku4 + baku5 + baku6 + 0 + 0;

                    let derajat1 = (tidakpasti1 ** 4) / tambah4;
                    let m100, m101, m102, m103, m104;

                    if (derajat1 > 124) {
                        m100 = 1.96;
                    } else if (derajat1 > 104) {
                        m100 = 1.98;
                    } else if (derajat1 > 74) {
                        m100 = 1.99;
                    } else if (derajat1 > 54) {
                        m100 = 2;
                    } else if (derajat1 > 47.5) {
                        m100 = 2.01;
                    } else if (derajat1 > 37.5) {
                        m100 = 2.02;
                    } else if (derajat1 > 32.5) {
                        m100 = 2.03;
                    } else if (derajat1 > 27.5) {
                        m100 = 2.04;
                    } else {
                        m100 = null;
                    }

                    // Set nilai m101
                    if (derajat1 > 22.5) {
                        m101 = 2.06;
                    } else if (derajat1 > 18.4) {
                        m101 = 2.09;
                    } else if (derajat1 > 17.4) {
                        m101 = 2.1;
                    } else if (derajat1 > 16.4) {
                        m101 = 2.11;
                    } else if (derajat1 > 15.4) {
                        m101 = 2.12;
                    } else if (derajat1 > 14.4) {
                        m101 = 2.13;
                    } else if (derajat1 > 13.4) {
                        m101 = 2.15;
                    } else if (derajat1 > 12.4) {
                        m101 = 2.16;
                    } else {
                        m101 = null;
                    }

                    // Set nilai m102
                    if (derajat1 > 11.4) {
                        m102 = 2.18;
                    } else if (derajat1 > 10.4) {
                        m102 = 2.2;
                    } else if (derajat1 > 9.4) {
                        m102 = 2.23;
                    } else if (derajat1 > 8.4) {
                        m102 = 2.26;
                    } else if (derajat1 > 7.4) {
                        m102 = 2.31;
                    } else if (derajat1 > 6.4) {
                        m102 = 2.37;
                    } else if (derajat1 > 5.4) {
                        m102 = 2.45;
                    } else if (derajat1 > 4.4) {
                        m102 = 2.57;
                    } else {
                        m102 = null;
                    }

                    // Set nilai m103
                    if (derajat1 > 3.4) {
                        m103 = 2.78;
                    } else if (derajat1 > 2.4) {
                        m103 = 3.18;
                    } else if (derajat1 > 1.4) {
                        m103 = 4.3;
                    } else if (derajat1 <= 1.4) {
                        m103 = 12.7;
                    } else {
                        m103 = null;
                    }

                    // Set nilai m104 berdasarkan m100-m103
                    if (derajat1 > 27.5) {
                        m104 = m100;
                    } else if (derajat1 > 12.4) {
                        m104 = m101;
                    } else if (derajat1 > 4.4) {
                        m104 = m102;
                    } else if (derajat1 <= 4.4) {
                        m104 = m103;
                    } else {
                        m104 = null;
                    }

                    let ketidakpastian1 = tidakpasti1 * m104;
                    kuadrat2.value = ketidakpastian1.toFixed(9);
                    hsl2.value = ketidakpastian1.toFixed(3);                // hitung 3 
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
                    let ttls3 = Math.sqrt(ttl3);
                    bac60.value = ttls3.toFixed(2);

                    let ubaku7 = L84 / normal1;
                    let ubaku8 = ttls3 / normal2;
                    let ubaku9 = operator / retangular;
                    let ubakuc7 = ubaku7 / ci;
                    let ubakuc8 = ubaku8 / ci;
                    let ubakuc9 = ubaku9 / ci;

                    let ubakuci7 = (ubakuc7 ** 2);
                    let bakus7 = parseFloat(ubakuci7.toFixed(19));
                    let ubakuci8 = (ubakuc8 ** 2);
                    let bakus8 = parseFloat(ubakuci8.toFixed(19));
                    let ubakuci9 = (ubakuc9 ** 2);
                    let bakus9 = parseFloat(ubakuci9.toFixed(19));
                    let tambah5 = bakus7 + bakus8 + bakus9 + 0 + 0;
                    let tidakpasti2 = Math.sqrt(tambah5).toFixed(10);

                    let ubakucis7 = (ubakuc7 ** 4) / vi1;
                    let baku7 = parseFloat(ubakucis7.toFixed(19));
                    let ubakucis8 = (ubakuc8 ** 4) / vi2;
                    let baku8 = parseFloat(ubakucis8.toFixed(19));
                    let ubakucis9 = (ubakuc9 ** 4) / vi3;
                    let baku9 = parseFloat(ubakucis9.toFixed(19));
                    let tambah6 = baku7 + baku8 + baku9 + 0 + 0;

                    let derajat2 = (tidakpasti2 ** 4) / tambah6;
                    let b100, b101, b102, b103, b104;

                    if (derajat2 > 124) {
                        b100 = 1.96;
                    } else if (derajat2 > 104) {
                        b100 = 1.98;
                    } else if (derajat2 > 74) {
                        b100 = 1.99;
                    } else if (derajat2 > 54) {
                        b100 = 2;
                    } else if (derajat2 > 47.5) {
                        b100 = 2.01;
                    } else if (derajat2 > 37.5) {
                        b100 = 2.02;
                    } else if (derajat2 > 32.5) {
                        b100 = 2.03;
                    } else if (derajat2 > 27.5) {
                        b100 = 2.04;
                    } else {
                        b100 = null;
                    }

                    // Set nilai b101
                    if (derajat2 > 22.5) {
                        b101 = 2.06;
                    } else if (derajat2 > 18.4) {
                        b101 = 2.09;
                    } else if (derajat2 > 17.4) {
                        b101 = 2.1;
                    } else if (derajat2 > 16.4) {
                        b101 = 2.11;
                    } else if (derajat2 > 15.4) {
                        b101 = 2.12;
                    } else if (derajat2 > 14.4) {
                        b101 = 2.13;
                    } else if (derajat2 > 13.4) {
                        b101 = 2.15;
                    } else if (derajat2 > 12.4) {
                        b101 = 2.16;
                    } else {
                        b101 = null;
                    }

                    // Set nilai b102
                    if (derajat2 > 11.4) {
                        b102 = 2.18;
                    } else if (derajat2 > 10.4) {
                        b102 = 2.2;
                    } else if (derajat2 > 9.4) {
                        b102 = 2.23;
                    } else if (derajat2 > 8.4) {
                        b102 = 2.26;
                    } else if (derajat2 > 7.4) {
                        b102 = 2.31;
                    } else if (derajat2 > 6.4) {
                        b102 = 2.37;
                    } else if (derajat2 > 5.4) {
                        b102 = 2.45;
                    } else if (derajat2 > 4.4) {
                        b102 = 2.57;
                    } else {
                        b102 = null;
                    }

                    // Set nilai b103
                    if (derajat2 > 3.4) {
                        b103 = 2.78;
                    } else if (derajat2 > 2.4) {
                        b103 = 3.18;
                    } else if (derajat2 > 1.4) {
                        b103 = 4.3;
                    } else if (derajat2 <= 1.4) {
                        b103 = 12.7;
                    } else {
                        b103 = null;
                    }

                    // Set nilai b104 berdasarkan b100-b103
                    if (derajat2 > 27.5) {
                        b104 = b100;
                    } else if (derajat2 > 12.4) {
                        b104 = b101;
                    } else if (derajat2 > 4.4) {
                        b104 = b102;
                    } else if (derajat2 <= 4.4) {
                        b104 = b103;
                    } else {
                        b104 = null;
                    }

                    let ketidakpastian2 = tidakpasti2 * b104;
                    kuadrat3.value = ketidakpastian2.toFixed(9);
                    hsl3.value = ketidakpastian2.toFixed(3);                // hitung 4
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
                    let ttls4 = Math.sqrt(ttl4);
                    bac80.value = ttls4.toFixed(2);

                    let ubaku10 = L84 / normal1;
                    let ubaku11 = ttls4 / normal2;
                    let ubaku12 = operator / retangular;
                    let ubakuc10 = ubaku10 / ci;
                    let ubakuc11 = ubaku11 / ci;
                    let ubakuc12 = ubaku12 / ci;

                    let ubakuci10 = (ubakuc10 ** 2);
                    let bakus10 = parseFloat(ubakuci10.toFixed(19));
                    let ubakuci11 = (ubakuc11 ** 2);
                    let bakus11 = parseFloat(ubakuci11.toFixed(19));
                    let ubakuci12 = (ubakuc12 ** 2);
                    let bakus12 = parseFloat(ubakuci12.toFixed(19));
                    let tambah7 = bakus10 + bakus11 + bakus12 + 0 + 0;
                    let tidakpasti3 = Math.sqrt(tambah7).toFixed(10);

                    let ubakucis10 = (ubakuc10 ** 4) / vi1;
                    let baku10 = parseFloat(ubakucis10.toFixed(19));
                    let ubakucis11 = (ubakuc11 ** 4) / vi2;
                    let baku11 = parseFloat(ubakucis11.toFixed(19));
                    let ubakucis12 = (ubakuc12 ** 4) / vi3;
                    let baku12 = parseFloat(ubakucis12.toFixed(19));
                    let tambah8 = baku10 + baku11 + baku12 + 0 + 0;

                    let derajat3 = (tidakpasti3 ** 4) / tambah8;
                    let v100, v101, v102, v103, v104;

                    if (derajat3 > 124) {
                        v100 = 1.96;
                    } else if (derajat3 > 104) {
                        v100 = 1.98;
                    } else if (derajat3 > 74) {
                        v100 = 1.99;
                    } else if (derajat3 > 54) {
                        v100 = 2;
                    } else if (derajat3 > 47.5) {
                        v100 = 2.01;
                    } else if (derajat3 > 37.5) {
                        v100 = 2.02;
                    } else if (derajat3 > 32.5) {
                        v100 = 2.03;
                    } else if (derajat3 > 27.5) {
                        v100 = 2.04;
                    } else {
                        v100 = null;
                    }

                    // Set nilai v101
                    if (derajat3 > 22.5) {
                        v101 = 2.06;
                    } else if (derajat3 > 18.4) {
                        v101 = 2.09;
                    } else if (derajat3 > 17.4) {
                        v101 = 2.1;
                    } else if (derajat3 > 16.4) {
                        v101 = 2.11;
                    } else if (derajat3 > 15.4) {
                        v101 = 2.12;
                    } else if (derajat3 > 14.4) {
                        v101 = 2.13;
                    } else if (derajat3 > 13.4) {
                        v101 = 2.15;
                    } else if (derajat3 > 12.4) {
                        v101 = 2.16;
                    } else {
                        v101 = null;
                    }

                    // Set nilai v102
                    if (derajat3 > 11.4) {
                        v102 = 2.18;
                    } else if (derajat3 > 10.4) {
                        v102 = 2.2;
                    } else if (derajat3 > 9.4) {
                        v102 = 2.23;
                    } else if (derajat3 > 8.4) {
                        v102 = 2.26;
                    } else if (derajat3 > 7.4) {
                        v102 = 2.31;
                    } else if (derajat3 > 6.4) {
                        v102 = 2.37;
                    } else if (derajat3 > 5.4) {
                        v102 = 2.45;
                    } else if (derajat3 > 4.4) {
                        v102 = 2.57;
                    } else {
                        v102 = null;
                    }

                    // Set nilai v103
                    if (derajat3 > 3.4) {
                        v103 = 2.78;
                    } else if (derajat3 > 2.4) {
                        v103 = 3.18;
                    } else if (derajat3 > 1.4) {
                        v103 = 4.3;
                    } else if (derajat3 <= 1.4) {
                        v103 = 12.7;
                    } else {
                        v103 = null;
                    }

                    // Set nilai v104 berdasarkan v100-v103
                    if (derajat3 > 27.5) {
                        v104 = v100;
                    } else if (derajat3 > 12.4) {
                        v104 = v101;
                    } else if (derajat3 > 4.4) {
                        v104 = v102;
                    } else if (derajat3 <= 4.4) {
                        v104 = v103;
                    } else {
                        v104 = null;
                    }

                    let ketidakpastian3 = tidakpasti3 * v104;
                    kuadrat4.value = ketidakpastian3.toFixed(9);
                    hsl4.value = ketidakpastian3.toFixed(3);                // hitung 5
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
                    let ttls5 = Math.sqrt(ttl5);
                    bac100.value = ttls5.toFixed(2);

                    let ubaku13 = L84 / normal1;
                    let ubaku14 = ttls5 / normal2;
                    let ubaku15 = operator / retangular;
                    let ubakuc13 = ubaku13 / ci;
                    let ubakuc14 = ubaku14 / ci;
                    let ubakuc15 = ubaku15 / ci;

                    let ubakuci13 = (ubakuc13 ** 2);
                    let bakus13 = parseFloat(ubakuci13.toFixed(19));
                    let ubakuci14 = (ubakuc14 ** 2);
                    let bakus14 = parseFloat(ubakuci14.toFixed(19));
                    let ubakuci15 = (ubakuc15 ** 2);
                    let bakus15 = parseFloat(ubakuci15.toFixed(19));
                    let tambah9 = bakus13 + bakus14 + bakus15 + 0 + 0;
                    let tidakpasti4 = Math.sqrt(tambah9).toFixed(10);

                    let ubakucis13 = (ubakuc13 ** 4) / vi1;
                    let baku13 = parseFloat(ubakucis13.toFixed(19));
                    let ubakucis14 = (ubakuc14 ** 4) / vi2;
                    let baku14 = parseFloat(ubakucis14.toFixed(19));
                    let ubakucis15 = (ubakuc15 ** 4) / vi3;
                    let baku15 = parseFloat(ubakucis15.toFixed(19));
                    let tambah10 = baku13 + baku14 + baku15 + 0 + 0;

                    let derajat4 = (tidakpasti4 ** 4) / tambah10;
                    let p100, p101, p102, p103, p104;

                    if (derajat4 > 124) {
                        p100 = 1.96;
                    } else if (derajat4 > 104) {
                        p100 = 1.98;
                    } else if (derajat4 > 74) {
                        p100 = 1.99;
                    } else if (derajat4 > 54) {
                        p100 = 2;
                    } else if (derajat4 > 47.5) {
                        p100 = 2.01;
                    } else if (derajat4 > 37.5) {
                        p100 = 2.02;
                    } else if (derajat4 > 32.5) {
                        p100 = 2.03;
                    } else if (derajat4 > 27.5) {
                        p100 = 2.04;
                    } else {
                        p100 = null;
                    }

                    // Set nilai p101
                    if (derajat4 > 22.5) {
                        p101 = 2.06;
                    } else if (derajat4 > 18.4) {
                        p101 = 2.09;
                    } else if (derajat4 > 17.4) {
                        p101 = 2.1;
                    } else if (derajat4 > 16.4) {
                        p101 = 2.11;
                    } else if (derajat4 > 15.4) {
                        p101 = 2.12;
                    } else if (derajat4 > 14.4) {
                        p101 = 2.13;
                    } else if (derajat4 > 13.4) {
                        p101 = 2.15;
                    } else if (derajat4 > 12.4) {
                        p101 = 2.16;
                    } else {
                        p101 = null;
                    }

                    // Set nilai p102
                    if (derajat4 > 11.4) {
                        p102 = 2.18;
                    } else if (derajat4 > 10.4) {
                        p102 = 2.2;
                    } else if (derajat4 > 9.4) {
                        p102 = 2.23;
                    } else if (derajat4 > 8.4) {
                        p102 = 2.26;
                    } else if (derajat4 > 7.4) {
                        p102 = 2.31;
                    } else if (derajat4 > 6.4) {
                        p102 = 2.37;
                    } else if (derajat4 > 5.4) {
                        p102 = 2.45;
                    } else if (derajat4 > 4.4) {
                        p102 = 2.57;
                    } else {
                        p102 = null;
                    }

                    // Set nilai p103
                    if (derajat4 > 3.4) {
                        p103 = 2.78;
                    } else if (derajat4 > 2.4) {
                        p103 = 3.18;
                    } else if (derajat4 > 1.4) {
                        p103 = 4.3;
                    } else if (derajat4 <= 1.4) {
                        p103 = 12.7;
                    } else {
                        p103 = null;
                    }

                    // Set nilai p104 berdasarkan p100-p103
                    if (derajat4 > 27.5) {
                        p104 = p100;
                    } else if (derajat4 > 12.4) {
                        p104 = p101;
                    } else if (derajat4 > 4.4) {
                        p104 = p102;
                    } else if (derajat4 <= 4.4) {
                        p104 = p103;
                    } else {
                        p104 = null;
                    }

                    let ketidakpastian4 = tidakpasti4 * p104;
                    kuadrat5.value = ketidakpastian4.toFixed(9);
                    hsl5.value = ketidakpastian4.toFixed(3);                // hitungan 6
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
                    let ttls6 = Math.sqrt(ttl6);
                    bac120.value = ttls6.toFixed(2);

                    let ubaku16 = L84 / normal1;
                    let ubaku17 = ttls6 / normal2;
                    let ubaku18 = operator / retangular;
                    let ubakuc16 = ubaku16 / ci;
                    let ubakuc17 = ubaku17 / ci;
                    let ubakuc18 = ubaku18 / ci;

                    let ubakuci16 = (ubakuc16 ** 2);
                    let bakus16 = parseFloat(ubakuci16.toFixed(19));
                    let ubakuci17 = (ubakuc17 ** 2);
                    let bakus17 = parseFloat(ubakuci17.toFixed(19));
                    let ubakuci18 = (ubakuc18 ** 2);
                    let bakus18 = parseFloat(ubakuci18.toFixed(19));
                    let tambah11 = bakus16 + bakus17 + bakus18 + 0 + 0;
                    let tidakpasti5 = Math.sqrt(tambah11).toFixed(10);

                    let ubakucis16 = (ubakuc16 ** 4) / vi1;
                    let baku16 = parseFloat(ubakucis16.toFixed(19));
                    let ubakucis17 = (ubakuc17 ** 4) / vi2;
                    let baku17 = parseFloat(ubakucis17.toFixed(19));
                    let ubakucis18 = (ubakuc18 ** 4) / vi3;
                    let baku18 = parseFloat(ubakucis18.toFixed(19));
                    let tambah12 = baku16 + baku17 + baku18 + 0 + 0;

                    let derajat5 = (tidakpasti5 ** 4) / tambah12;
                    let l100, l101, l102, l103, l104;

                    if (derajat5 > 124) {
                        l100 = 1.96;
                    } else if (derajat5 > 104) {
                        l100 = 1.98;
                    } else if (derajat5 > 74) {
                        l100 = 1.99;
                    } else if (derajat5 > 54) {
                        l100 = 2;
                    } else if (derajat5 > 47.5) {
                        l100 = 2.01;
                    } else if (derajat5 > 37.5) {
                        l100 = 2.02;
                    } else if (derajat5 > 32.5) {
                        l100 = 2.03;
                    } else if (derajat5 > 27.5) {
                        l100 = 2.04;
                    } else {
                        l100 = null;
                    }

                    // Set nilai l101
                    if (derajat5 > 22.5) {
                        l101 = 2.06;
                    } else if (derajat5 > 18.4) {
                        l101 = 2.09;
                    } else if (derajat5 > 17.4) {
                        l101 = 2.1;
                    } else if (derajat5 > 16.4) {
                        l101 = 2.11;
                    } else if (derajat5 > 15.4) {
                        l101 = 2.12;
                    } else if (derajat5 > 14.4) {
                        l101 = 2.13;
                    } else if (derajat5 > 13.4) {
                        l101 = 2.15;
                    } else if (derajat5 > 12.4) {
                        l101 = 2.16;
                    } else {
                        l101 = null;
                    }

                    // Set nilai l102
                    if (derajat5 > 11.4) {
                        l102 = 2.18;
                    } else if (derajat5 > 10.4) {
                        l102 = 2.2;
                    } else if (derajat5 > 9.4) {
                        l102 = 2.23;
                    } else if (derajat5 > 8.4) {
                        l102 = 2.26;
                    } else if (derajat5 > 7.4) {
                        l102 = 2.31;
                    } else if (derajat5 > 6.4) {
                        l102 = 2.37;
                    } else if (derajat5 > 5.4) {
                        l102 = 2.45;
                    } else if (derajat5 > 4.4) {
                        l102 = 2.57;
                    } else {
                        l102 = null;
                    }

                    // Set nilai l103
                    if (derajat5 > 3.4) {
                        l103 = 2.78;
                    } else if (derajat5 > 2.4) {
                        l103 = 3.18;
                    } else if (derajat5 > 1.4) {
                        l103 = 4.3;
                    } else if (derajat5 <= 1.4) {
                        l103 = 12.7;
                    } else {
                        l103 = null;
                    }

                    // Set nilai l104 berdasarkan l100-l103
                    if (derajat5 > 27.5) {
                        l104 = l100;
                    } else if (derajat5 > 12.4) {
                        l104 = l101;
                    } else if (derajat5 > 4.4) {
                        l104 = l102;
                    } else if (derajat5 <= 4.4) {
                        l104 = l103;
                    } else {
                        l104 = null;
                    }

                    let ketidakpastian5 = tidakpasti5 * l104;
                    kuadrat6.value = ketidakpastian5.toFixed(9);
                    hsl6.value = ketidakpastian5.toFixed(3);                // hitungan 7
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
                    let ttls7 = Math.sqrt(ttl7);
                    bac140.value = ttls7.toFixed(2);

                    let ubaku19 = L84 / normal1;
                    let ubaku20 = ttls7 / normal2;
                    let ubaku21 = operator / retangular;
                    let ubakuc19 = ubaku19 / ci;
                    let ubakuc20 = ubaku20 / ci;
                    let ubakuc21 = ubaku21 / ci;

                    let ubakuci19 = (ubakuc19 ** 2);
                    let bakus19 = parseFloat(ubakuci19.toFixed(19));
                    let ubakuci20 = (ubakuc20 ** 2);
                    let bakus20 = parseFloat(ubakuci20.toFixed(19));
                    let ubakuci21 = (ubakuc21 ** 2);
                    let bakus21 = parseFloat(ubakuci21.toFixed(19));
                    let tambah13 = bakus19 + bakus20 + bakus21 + 0 + 0;
                    let tidakpasti6 = Math.sqrt(tambah13).toFixed(10);

                    let ubakucis19 = (ubakuc19 ** 4) / vi1;
                    let baku19 = parseFloat(ubakucis19.toFixed(19));
                    let ubakucis20 = (ubakuc20 ** 4) / vi2;
                    let baku20 = parseFloat(ubakucis20.toFixed(19));
                    let ubakucis21 = (ubakuc21 ** 4) / vi3;
                    let baku21 = parseFloat(ubakucis21.toFixed(19));
                    let tambah14 = baku19 + baku20 + baku21 + 0 + 0;

                    let derajat6 = (tidakpasti6 ** 4) / tambah14;
                    let y100, y101, y102, y103, y104;

                    if (derajat6 > 124) {
                        y100 = 1.96;
                    } else if (derajat6 > 104) {
                        y100 = 1.98;
                    } else if (derajat6 > 74) {
                        y100 = 1.99;
                    } else if (derajat6 > 54) {
                        y100 = 2;
                    } else if (derajat6 > 47.5) {
                        y100 = 2.01;
                    } else if (derajat6 > 37.5) {
                        y100 = 2.02;
                    } else if (derajat6 > 32.5) {
                        y100 = 2.03;
                    } else if (derajat6 > 27.5) {
                        y100 = 2.04;
                    } else {
                        y100 = null;
                    }

                    // Set nilai y101
                    if (derajat6 > 22.5) {
                        y101 = 2.06;
                    } else if (derajat6 > 18.4) {
                        y101 = 2.09;
                    } else if (derajat6 > 17.4) {
                        y101 = 2.1;
                    } else if (derajat6 > 16.4) {
                        y101 = 2.11;
                    } else if (derajat6 > 15.4) {
                        y101 = 2.12;
                    } else if (derajat6 > 14.4) {
                        y101 = 2.13;
                    } else if (derajat6 > 13.4) {
                        y101 = 2.15;
                    } else if (derajat6 > 12.4) {
                        y101 = 2.16;
                    } else {
                        y101 = null;
                    }

                    // Set nilai y102
                    if (derajat6 > 11.4) {
                        y102 = 2.18;
                    } else if (derajat6 > 10.4) {
                        y102 = 2.2;
                    } else if (derajat6 > 9.4) {
                        y102 = 2.23;
                    } else if (derajat6 > 8.4) {
                        y102 = 2.26;
                    } else if (derajat6 > 7.4) {
                        y102 = 2.31;
                    } else if (derajat6 > 6.4) {
                        y102 = 2.37;
                    } else if (derajat6 > 5.4) {
                        y102 = 2.45;
                    } else if (derajat6 > 4.4) {
                        y102 = 2.57;
                    } else {
                        y102 = null;
                    }

                    // Set nilai y103
                    if (derajat6 > 3.4) {
                        y103 = 2.78;
                    } else if (derajat6 > 2.4) {
                        y103 = 3.18;
                    } else if (derajat6 > 1.4) {
                        y103 = 4.3;
                    } else if (derajat6 <= 1.4) {
                        y103 = 12.7;
                    } else {
                        y103 = null;
                    }

                    // Set nilai y104 berdasarkan y100-y103
                    if (derajat6 > 27.5) {
                        y104 = y100;
                    } else if (derajat6 > 12.4) {
                        y104 = y101;
                    } else if (derajat6 > 4.4) {
                        y104 = y102;
                    } else if (derajat6 <= 4.4) {
                        y104 = y103;
                    } else {
                        y104 = null;
                    }

                    let ketidakpastian6 = tidakpasti6 * y104;
                    kuadrat7.value = ketidakpastian6.toFixed(9);
                    hsl7.value = ketidakpastian6.toFixed(3);                // hitung 8
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
                    let ttls8 = Math.sqrt(ttl8);
                    bac160.value = ttls8.toFixed(2);

                    let ubaku22 = L84 / normal1;
                    let ubaku23 = ttls8 / normal2;
                    let ubaku24 = operator / retangular;
                    let ubakuc22 = ubaku22 / ci;
                    let ubakuc23 = ubaku23 / ci;
                    let ubakuc24 = ubaku24 / ci;

                    let ubakuci22 = (ubakuc22 ** 2);
                    let bakus22 = parseFloat(ubakuci22.toFixed(19));
                    let ubakuci23 = (ubakuc23 ** 2);
                    let bakus23 = parseFloat(ubakuci23.toFixed(19));
                    let ubakuci24 = (ubakuc24 ** 2);
                    let bakus24 = parseFloat(ubakuci24.toFixed(19));
                    let tambah15 = bakus22 + bakus23 + bakus24 + 0 + 0;
                    let tidakpasti7 = Math.sqrt(tambah15).toFixed(10);

                    let ubakucis22 = (ubakuc22 ** 4) / vi1;
                    let baku22 = parseFloat(ubakucis22.toFixed(19));
                    let ubakucis23 = (ubakuc23 ** 4) / vi2;
                    let baku23 = parseFloat(ubakucis23.toFixed(19));
                    let ubakucis24 = (ubakuc24 ** 4) / vi3;
                    let baku24 = parseFloat(ubakucis24.toFixed(19));
                    let tambah16 = baku22 + baku23 + baku24 + 0 + 0;

                    let derajat7 = (tidakpasti7 ** 4) / tambah16;
                    let x100, x101, x102, x103, x104;

                    if (derajat7 > 124) {
                        x100 = 1.96;
                    } else if (derajat7 > 104) {
                        x100 = 1.98;
                    } else if (derajat7 > 74) {
                        x100 = 1.99;
                    } else if (derajat7 > 54) {
                        x100 = 2;
                    } else if (derajat7 > 47.5) {
                        x100 = 2.01;
                    } else if (derajat7 > 37.5) {
                        x100 = 2.02;
                    } else if (derajat7 > 32.5) {
                        x100 = 2.03;
                    } else if (derajat7 > 27.5) {
                        x100 = 2.04;
                    } else {
                        x100 = null;
                    }

                    // Set nilai x101
                    if (derajat7 > 22.5) {
                        x101 = 2.06;
                    } else if (derajat7 > 18.4) {
                        x101 = 2.09;
                    } else if (derajat7 > 17.4) {
                        x101 = 2.1;
                    } else if (derajat7 > 16.4) {
                        x101 = 2.11;
                    } else if (derajat7 > 15.4) {
                        x101 = 2.12;
                    } else if (derajat7 > 14.4) {
                        x101 = 2.13;
                    } else if (derajat7 > 13.4) {
                        x101 = 2.15;
                    } else if (derajat7 > 12.4) {
                        x101 = 2.16;
                    } else {
                        x101 = null;
                    }

                    // Set nilai x102
                    if (derajat7 > 11.4) {
                        x102 = 2.18;
                    } else if (derajat7 > 10.4) {
                        x102 = 2.2;
                    } else if (derajat7 > 9.4) {
                        x102 = 2.23;
                    } else if (derajat7 > 8.4) {
                        x102 = 2.26;
                    } else if (derajat7 > 7.4) {
                        x102 = 2.31;
                    } else if (derajat7 > 6.4) {
                        x102 = 2.37;
                    } else if (derajat7 > 5.4) {
                        x102 = 2.45;
                    } else if (derajat7 > 4.4) {
                        x102 = 2.57;
                    } else {
                        x102 = null;
                    }

                    // Set nilai x103
                    if (derajat7 > 3.4) {
                        x103 = 2.78;
                    } else if (derajat7 > 2.4) {
                        x103 = 3.18;
                    } else if (derajat7 > 1.4) {
                        x103 = 4.3;
                    } else if (derajat7 <= 1.4) {
                        x103 = 12.7;
                    } else {
                        x103 = null;
                    }

                    // Set nilai x104 berdasarkan x100-x103
                    if (derajat7 > 27.5) {
                        x104 = x100;
                    } else if (derajat7 > 12.4) {
                        x104 = x101;
                    } else if (derajat7 > 4.4) {
                        x104 = x102;
                    } else if (derajat7 <= 4.4) {
                        x104 = x103;
                    } else {
                        x104 = null;
                    }

                    let ketidakpastian7 = tidakpasti7 * x104;
                    kuadrat8.value = ketidakpastian7.toFixed(9);
                    hsl8.value = ketidakpastian7.toFixed(3);                // hitung 9
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
                    let ttls9 = Math.sqrt(ttl9);
                    bac180.value = ttls9.toFixed(2);

                    let ubaku25 = L84 / normal1;
                    let ubaku26 = ttls9 / normal2;
                    let ubaku27 = operator / retangular;
                    let ubakuc25 = ubaku25 / ci;
                    let ubakuc26 = ubaku26 / ci;
                    let ubakuc27 = ubaku27 / ci;

                    let ubakuci25 = (ubakuc25 ** 2);
                    let bakus25 = parseFloat(ubakuci25.toFixed(19));
                    let ubakuci26 = (ubakuc26 ** 2);
                    let bakus26 = parseFloat(ubakuci26.toFixed(19));
                    let ubakuci27 = (ubakuc27 ** 2);
                    let bakus27 = parseFloat(ubakuci27.toFixed(19));
                    let tambah17 = bakus25 + bakus26 + bakus27 + 0 + 0;
                    let tidakpasti8 = Math.sqrt(tambah17).toFixed(10);

                    let ubakucis25 = (ubakuc25 ** 4) / vi1;
                    let baku25 = parseFloat(ubakucis25.toFixed(19));
                    let ubakucis26 = (ubakuc26 ** 4) / vi2;
                    let baku26 = parseFloat(ubakucis26.toFixed(19));
                    let ubakucis27 = (ubakuc27 ** 4) / vi3;
                    let baku27 = parseFloat(ubakucis27.toFixed(19));
                    let tambah18 = baku25 + baku26 + baku27 + 0 + 0;

                    let derajat8 = (tidakpasti8 ** 4) / tambah18;
                    let z100, z101, z102, z103, z104;

                    if (derajat8 > 124) {
                        z100 = 1.96;
                    } else if (derajat8 > 104) {
                        z100 = 1.98;
                    } else if (derajat8 > 74) {
                        z100 = 1.99;
                    } else if (derajat8 > 54) {
                        z100 = 2;
                    } else if (derajat8 > 47.5) {
                        z100 = 2.01;
                    } else if (derajat8 > 37.5) {
                        z100 = 2.02;
                    } else if (derajat8 > 32.5) {
                        z100 = 2.03;
                    } else if (derajat8 > 27.5) {
                        z100 = 2.04;
                    } else {
                        z100 = null;
                    }

                    // Set nilai z101
                    if (derajat8 > 22.5) {
                        z101 = 2.06;
                    } else if (derajat8 > 18.4) {
                        z101 = 2.09;
                    } else if (derajat8 > 17.4) {
                        z101 = 2.1;
                    } else if (derajat8 > 16.4) {
                        z101 = 2.11;
                    } else if (derajat8 > 15.4) {
                        z101 = 2.12;
                    } else if (derajat8 > 14.4) {
                        z101 = 2.13;
                    } else if (derajat8 > 13.4) {
                        z101 = 2.15;
                    } else if (derajat8 > 12.4) {
                        z101 = 2.16;
                    } else {
                        z101 = null;
                    }

                    // Set nilai z102
                    if (derajat8 > 11.4) {
                        z102 = 2.18;
                    } else if (derajat8 > 10.4) {
                        z102 = 2.2;
                    } else if (derajat8 > 9.4) {
                        z102 = 2.23;
                    } else if (derajat8 > 8.4) {
                        z102 = 2.26;
                    } else if (derajat8 > 7.4) {
                        z102 = 2.31;
                    } else if (derajat8 > 6.4) {
                        z102 = 2.37;
                    } else if (derajat8 > 5.4) {
                        z102 = 2.45;
                    } else if (derajat8 > 4.4) {
                        z102 = 2.57;
                    } else {
                        z102 = null;
                    }

                    // Set nilai z103
                    if (derajat8 > 3.4) {
                        z103 = 2.78;
                    } else if (derajat8 > 2.4) {
                        z103 = 3.18;
                    } else if (derajat8 > 1.4) {
                        z103 = 4.3;
                    } else if (derajat8 <= 1.4) {
                        z103 = 12.7;
                    } else {
                        z103 = null;
                    }

                    // Set nilai z104 berdasarkan z100-z103
                    if (derajat8 > 27.5) {
                        z104 = z100;
                    } else if (derajat8 > 12.4) {
                        z104 = z101;
                    } else if (derajat8 > 4.4) {
                        z104 = z102;
                    } else if (derajat8 <= 4.4) {
                        z104 = z103;
                    } else {
                        z104 = null;
                    }

                    let ketidakpastian8 = tidakpasti8 * z104;
                    kuadrat9.value = ketidakpastian8.toFixed(9);
                    hsl9.value = ketidakpastian8.toFixed(3);                // hitung 10
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
                    let ttls10 = Math.sqrt(ttl10);
                    bac200.value = ttls10.toFixed(2);

                    let ubaku28 = L84 / normal1;
                    let ubaku29 = ttls10 / normal2;
                    let ubaku30 = operator / retangular;
                    let ubakuc28 = ubaku28 / ci;
                    let ubakuc29 = ubaku29 / ci;
                    let ubakuc30 = ubaku30 / ci;

                    let ubakuci28 = (ubakuc28 ** 2);
                    let bakus28 = parseFloat(ubakuci28.toFixed(19));
                    let ubakuci29 = (ubakuc29 ** 2);
                    let bakus29 = parseFloat(ubakuci29.toFixed(19));
                    let ubakuci30 = (ubakuc30 ** 2);
                    let bakus30 = parseFloat(ubakuci30.toFixed(19));
                    let tambah19 = bakus28 + bakus29 + bakus30 + 0 + 0;
                    let tidakpasti9 = Math.sqrt(tambah19).toFixed(10);

                    let ubakucis28 = (ubakuc28 ** 4) / vi1;
                    let baku28 = parseFloat(ubakucis28.toFixed(19));
                    let ubakucis29 = (ubakuc29 ** 4) / vi2;
                    let baku29 = parseFloat(ubakucis29.toFixed(19));
                    let ubakucis30 = (ubakuc30 ** 4) / vi3;
                    let baku30 = parseFloat(ubakucis30.toFixed(19));
                    let tambah20 = baku28 + baku29 + baku30 + 0 + 0;

                    let derajat9 = (tidakpasti9 ** 4) / tambah20;
                    let q100, q101, q102, q103, q104;

                    if (derajat9 > 124) {
                        q100 = 1.96;
                    } else if (derajat9 > 104) {
                        q100 = 1.98;
                    } else if (derajat9 > 74) {
                        q100 = 1.99;
                    } else if (derajat9 > 54) {
                        q100 = 2;
                    } else if (derajat9 > 47.5) {
                        q100 = 2.01;
                    } else if (derajat9 > 37.5) {
                        q100 = 2.02;
                    } else if (derajat9 > 32.5) {
                        q100 = 2.03;
                    } else if (derajat9 > 27.5) {
                        q100 = 2.04;
                    } else {
                        q100 = null;
                    }

                    // Set nilai q101
                    if (derajat9 > 22.5) {
                        q101 = 2.06;
                    } else if (derajat9 > 18.4) {
                        q101 = 2.09;
                    } else if (derajat9 > 17.4) {
                        q101 = 2.1;
                    } else if (derajat9 > 16.4) {
                        q101 = 2.11;
                    } else if (derajat9 > 15.4) {
                        q101 = 2.12;
                    } else if (derajat9 > 14.4) {
                        q101 = 2.13;
                    } else if (derajat9 > 13.4) {
                        q101 = 2.15;
                    } else if (derajat9 > 12.4) {
                        q101 = 2.16;
                    } else {
                        q101 = null;
                    }

                    // Set nilai q102
                    if (derajat9 > 11.4) {
                        q102 = 2.18;
                    } else if (derajat9 > 10.4) {
                        q102 = 2.2;
                    } else if (derajat9 > 9.4) {
                        q102 = 2.23;
                    } else if (derajat9 > 8.4) {
                        q102 = 2.26;
                    } else if (derajat9 > 7.4) {
                        q102 = 2.31;
                    } else if (derajat9 > 6.4) {
                        q102 = 2.37;
                    } else if (derajat9 > 5.4) {
                        q102 = 2.45;
                    } else if (derajat9 > 4.4) {
                        q102 = 2.57;
                    } else {
                        q102 = null;
                    }

                    // Set nilai q103
                    if (derajat9 > 3.4) {
                        q103 = 2.78;
                    } else if (derajat9 > 2.4) {
                        q103 = 3.18;
                    } else if (derajat9 > 1.4) {
                        q103 = 4.3;
                    } else if (derajat9 <= 1.4) {
                        q103 = 12.7;
                    } else {
                        q103 = null;
                    }

                    // Set nilai q104 berdasarkan q100-q103
                    if (derajat9 > 27.5) {
                        q104 = q100;
                    } else if (derajat9 > 12.4) {
                        q104 = q101;
                    } else if (derajat9 > 4.4) {
                        q104 = q102;
                    } else if (derajat9 <= 4.4) {
                        q104 = q103;
                    } else {
                        q104 = null;
                    }

                    let ketidakpastian9 = tidakpasti9 * q104;
                    kuadrat10.value = ketidakpastian9.toFixed(9);
                    hsl10.value = ketidakpastian9.toFixed(3);                // hitungan 11
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
                    let ttls11 = Math.sqrt(ttl11);
                    bac220.value = ttls11.toFixed(2);

                    let ubaku31 = L84 / normal1;
                    let ubaku32 = ttls11 / normal2;
                    let ubaku33 = operator / retangular;
                    let ubakuc31 = ubaku31 / ci;
                    let ubakuc32 = ubaku32 / ci;
                    let ubakuc33 = ubaku33 / ci;

                    let ubakuci31 = (ubakuc31 ** 2);
                    let bakus31 = parseFloat(ubakuci31.toFixed(19));
                    let ubakuci32 = (ubakuc32 ** 2);
                    let bakus32 = parseFloat(ubakuci32.toFixed(19));
                    let ubakuci33 = (ubakuc33 ** 2);
                    let bakus33 = parseFloat(ubakuci33.toFixed(19));
                    let tambah21 = bakus31 + bakus32 + bakus33 + 0 + 0;
                    let tidakpasti10 = Math.sqrt(tambah21).toFixed(10);

                    let ubakucis31 = (ubakuc31 ** 4) / vi1;
                    let baku31 = parseFloat(ubakucis31.toFixed(19));
                    let ubakucis32 = (ubakuc32 ** 4) / vi2;
                    let baku32 = parseFloat(ubakucis32.toFixed(19));
                    let ubakucis33 = (ubakuc33 ** 4) / vi3;
                    let baku33 = parseFloat(ubakucis33.toFixed(19));
                    let tambah22 = baku31 + baku32 + baku33 + 0 + 0;

                    let derajat10 = (tidakpasti10 ** 4) / tambah22;
                    let zb100, zb101, zb102, zb103, zb104;

                    if (derajat10 > 124) {
                        zb100 = 1.96;
                    } else if (derajat10 > 104) {
                        zb100 = 1.98;
                    } else if (derajat10 > 74) {
                        zb100 = 1.99;
                    } else if (derajat10 > 54) {
                        zb100 = 2;
                    } else if (derajat10 > 47.5) {
                        zb100 = 2.01;
                    } else if (derajat10 > 37.5) {
                        zb100 = 2.02;
                    } else if (derajat10 > 32.5) {
                        zb100 = 2.03;
                    } else if (derajat10 > 27.5) {
                        zb100 = 2.04;
                    } else {
                        zb100 = null;
                    }

                    // Set nilai zb101
                    if (derajat10 > 22.5) {
                        zb101 = 2.06;
                    } else if (derajat10 > 18.4) {
                        zb101 = 2.09;
                    } else if (derajat10 > 17.4) {
                        zb101 = 2.1;
                    } else if (derajat10 > 16.4) {
                        zb101 = 2.11;
                    } else if (derajat10 > 15.4) {
                        zb101 = 2.12;
                    } else if (derajat10 > 14.4) {
                        zb101 = 2.13;
                    } else if (derajat10 > 13.4) {
                        zb101 = 2.15;
                    } else if (derajat10 > 12.4) {
                        zb101 = 2.16;
                    } else {
                        zb101 = null;
                    }

                    // Set nilai zb102
                    if (derajat10 > 11.4) {
                        zb102 = 2.18;
                    } else if (derajat10 > 10.4) {
                        zb102 = 2.2;
                    } else if (derajat10 > 9.4) {
                        zb102 = 2.23;
                    } else if (derajat10 > 8.4) {
                        zb102 = 2.26;
                    } else if (derajat10 > 7.4) {
                        zb102 = 2.31;
                    } else if (derajat10 > 6.4) {
                        zb102 = 2.37;
                    } else if (derajat10 > 5.4) {
                        zb102 = 2.45;
                    } else if (derajat10 > 4.4) {
                        zb102 = 2.57;
                    } else {
                        zb102 = null;
                    }

                    // Set nilai zb103
                    if (derajat10 > 3.4) {
                        zb103 = 2.78;
                    } else if (derajat10 > 2.4) {
                        zb103 = 3.18;
                    } else if (derajat10 > 1.4) {
                        zb103 = 4.3;
                    } else if (derajat10 <= 1.4) {
                        zb103 = 12.7;
                    } else {
                        zb103 = null;
                    }

                    // Set nilai zb104 berdasarkan zb100-zb103
                    if (derajat10 > 27.5) {
                        zb104 = zb100;
                    } else if (derajat10 > 12.4) {
                        zb104 = zb101;
                    } else if (derajat10 > 4.4) {
                        zb104 = zb102;
                    } else if (derajat10 <= 4.4) {
                        zb104 = zb103;
                    } else {
                        zb104 = null;
                    }

                    let ketidakpastian10 = tidakpasti10 * zb104;
                    kuadrat11.value = ketidakpastian10.toFixed(9);
                    hsl11.value = ketidakpastian10.toFixed(3);

                    // hitungan 12
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
                    let ttls12 = Math.sqrt(ttl12);
                    bac240.value = ttls12.toFixed(2);

                    let ubaku34 = L84 / normal1;
                    let ubaku35 = ttls12 / normal2;
                    let ubaku36 = operator / retangular;
                    let ubakuc34 = ubaku34 / ci;
                    let ubakuc35 = ubaku35 / ci;
                    let ubakuc36 = ubaku36 / ci;

                    let ubakuci34 = (ubakuc34 ** 2);
                    let bakus34 = parseFloat(ubakuci34.toFixed(19));
                    let ubakuci35 = (ubakuc35 ** 2);
                    let bakus35 = parseFloat(ubakuci35.toFixed(19));
                    let ubakuci36 = (ubakuc36 ** 2);
                    let bakus36 = parseFloat(ubakuci36.toFixed(19));
                    let tambah23 = bakus34 + bakus35 + bakus36 + 0 + 0;
                    let tidakpasti11 = Math.sqrt(tambah23).toFixed(10);

                    let ubakucis34 = (ubakuc34 ** 4) / vi1;
                    let baku34 = parseFloat(ubakucis34.toFixed(19));
                    let ubakucis35 = (ubakuc35 ** 4) / vi2;
                    let baku35 = parseFloat(ubakucis35.toFixed(19));
                    let ubakucis36 = (ubakuc36 ** 4) / vi3;
                    let baku36 = parseFloat(ubakucis36.toFixed(19));
                    let tambah24 = baku34 + baku35 + baku36 + 0 + 0;

                    let derajat11 = (tidakpasti11 ** 4) / tambah24;
                    let zs100, zs101, zs102, zs103, zs104;

                    if (derajat11 > 124) {
                        zs100 = 1.96;
                    } else if (derajat11 > 104) {
                        zs100 = 1.98;
                    } else if (derajat11 > 74) {
                        zs100 = 1.99;
                    } else if (derajat11 > 54) {
                        zs100 = 2;
                    } else if (derajat11 > 47.5) {
                        zs100 = 2.01;
                    } else if (derajat11 > 37.5) {
                        zs100 = 2.02;
                    } else if (derajat11 > 32.5) {
                        zs100 = 2.03;
                    } else if (derajat11 > 27.5) {
                        zs100 = 2.04;
                    } else {
                        zs100 = null;
                    }

                    // Set nilai zs101
                    if (derajat11 > 22.5) {
                        zs101 = 2.06;
                    } else if (derajat11 > 18.4) {
                        zs101 = 2.09;
                    } else if (derajat11 > 17.4) {
                        zs101 = 2.1;
                    } else if (derajat11 > 16.4) {
                        zs101 = 2.11;
                    } else if (derajat11 > 15.4) {
                        zs101 = 2.12;
                    } else if (derajat11 > 14.4) {
                        zs101 = 2.13;
                    } else if (derajat11 > 13.4) {
                        zs101 = 2.15;
                    } else if (derajat11 > 12.4) {
                        zs101 = 2.16;
                    } else {
                        zs101 = null;
                    }

                    // Set nilai zs102
                    if (derajat11 > 11.4) {
                        zs102 = 2.18;
                    } else if (derajat11 > 10.4) {
                        zs102 = 2.2;
                    } else if (derajat11 > 9.4) {
                        zs102 = 2.23;
                    } else if (derajat11 > 8.4) {
                        zs102 = 2.26;
                    } else if (derajat11 > 7.4) {
                        zs102 = 2.31;
                    } else if (derajat11 > 6.4) {
                        zs102 = 2.37;
                    } else if (derajat11 > 5.4) {
                        zs102 = 2.45;
                    } else if (derajat11 > 4.4) {
                        zs102 = 2.57;
                    } else {
                        zs102 = null;
                    }

                    // Set nilai zs103
                    if (derajat11 > 3.4) {
                        zs103 = 2.78;
                    } else if (derajat11 > 2.4) {
                        zs103 = 3.18;
                    } else if (derajat11 > 1.4) {
                        zs103 = 4.3;
                    } else if (derajat11 <= 1.4) {
                        zs103 = 12.7;
                    } else {
                        zs103 = null;
                    }

                    // Set nilai zs104 berdasarkan zs100-zs103
                    if (derajat11 > 27.5) {
                        zs104 = zs100;
                    } else if (derajat11 > 12.4) {
                        zs104 = zs101;
                    } else if (derajat11 > 4.4) {
                        zs104 = zs102;
                    } else if (derajat11 <= 4.4) {
                        zs104 = zs103;
                    } else {
                        zs104 = null;
                    }

                    let ketidakpastian11 = tidakpasti11 * zs104;
                    kuadrat12.value = ketidakpastian11.toFixed(9);
                    hsl12.value = ketidakpastian11.toFixed(3);

                    // hitung 13
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
                    let ttls13 = Math.sqrt(ttl13);
                    bac260.value = ttls13.toFixed(2);

                    let ubaku37 = L84 / normal1;
                    let ubaku38 = ttls13 / normal2;
                    let ubaku39 = operator / retangular;
                    let ubakuc37 = ubaku37 / ci;
                    let ubakuc38 = ubaku38 / ci;
                    let ubakuc39 = ubaku39 / ci;

                    let ubakuci37 = (ubakuc37 ** 2);
                    let bakus37 = parseFloat(ubakuci37.toFixed(19));
                    let ubakuci38 = (ubakuc38 ** 2);
                    let bakus38 = parseFloat(ubakuci38.toFixed(19));
                    let ubakuci39 = (ubakuc39 ** 2);
                    let bakus39 = parseFloat(ubakuci39.toFixed(19));
                    let tambah25 = bakus37 + bakus38 + bakus39 + 0 + 0;
                    let tidakpasti12 = Math.sqrt(tambah25).toFixed(10);

                    let ubakucis37 = (ubakuc37 ** 4) / vi1;
                    let baku37 = parseFloat(ubakucis37.toFixed(19));
                    let ubakucis38 = (ubakuc38 ** 4) / vi2;
                    let baku38 = parseFloat(ubakucis38.toFixed(19));
                    let ubakucis39 = (ubakuc39 ** 4) / vi3;
                    let baku39 = parseFloat(ubakucis39.toFixed(19));
                    let tambah26 = baku37 + baku38 + baku39 + 0 + 0;

                    let derajat12 = (tidakpasti12 ** 4) / tambah26;
                    let zp100, zp101, zp102, zp103, zp104;

                    if (derajat12 > 124) {
                        zp100 = 1.96;
                    } else if (derajat12 > 104) {
                        zp100 = 1.98;
                    } else if (derajat12 > 74) {
                        zp100 = 1.99;
                    } else if (derajat12 > 54) {
                        zp100 = 2;
                    } else if (derajat12 > 47.5) {
                        zp100 = 2.01;
                    } else if (derajat12 > 37.5) {
                        zp100 = 2.02;
                    } else if (derajat12 > 32.5) {
                        zp100 = 2.03;
                    } else if (derajat12 > 27.5) {
                        zp100 = 2.04;
                    } else {
                        zp100 = null;
                    }

                    // Set nilai zp101
                    if (derajat12 > 22.5) {
                        zp101 = 2.06;
                    } else if (derajat12 > 18.4) {
                        zp101 = 2.09;
                    } else if (derajat12 > 17.4) {
                        zp101 = 2.1;
                    } else if (derajat12 > 16.4) {
                        zp101 = 2.11;
                    } else if (derajat12 > 15.4) {
                        zp101 = 2.12;
                    } else if (derajat12 > 14.4) {
                        zp101 = 2.13;
                    } else if (derajat12 > 13.4) {
                        zp101 = 2.15;
                    } else if (derajat12 > 12.4) {
                        zp101 = 2.16;
                    } else {
                        zp101 = null;
                    }

                    // Set nilai zp102
                    if (derajat12 > 11.4) {
                        zp102 = 2.18;
                    } else if (derajat12 > 10.4) {
                        zp102 = 2.2;
                    } else if (derajat12 > 9.4) {
                        zp102 = 2.23;
                    } else if (derajat12 > 8.4) {
                        zp102 = 2.26;
                    } else if (derajat12 > 7.4) {
                        zp102 = 2.31;
                    } else if (derajat12 > 6.4) {
                        zp102 = 2.37;
                    } else if (derajat12 > 5.4) {
                        zp102 = 2.45;
                    } else if (derajat12 > 4.4) {
                        zp102 = 2.57;
                    } else {
                        zp102 = null;
                    }

                    // Set nilai zp103
                    if (derajat12 > 3.4) {
                        zp103 = 2.78;
                    } else if (derajat12 > 2.4) {
                        zp103 = 3.18;
                    } else if (derajat12 > 1.4) {
                        zp103 = 4.3;
                    } else if (derajat12 <= 1.4) {
                        zp103 = 12.7;
                    } else {
                        zp103 = null;
                    }

                    // Set nilai zp104 berdasarkan zp100-zp103
                    if (derajat12 > 27.5) {
                        zp104 = zp100;
                    } else if (derajat12 > 12.4) {
                        zp104 = zp101;
                    } else if (derajat12 > 4.4) {
                        zp104 = zp102;
                    } else if (derajat12 <= 4.4) {
                        zp104 = zp103;
                    } else {
                        zp104 = null;
                    }

                    let ketidakpastian12 = tidakpasti12 * zp104;
                    kuadrat13.value = ketidakpastian12.toFixed(9);
                    hsl13.value = ketidakpastian12.toFixed(3);

                    // hitung 14
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
                    let ttls14 = Math.sqrt(ttl14);
                    bac280.value = ttls14.toFixed(2);

                    let ubaku40 = L84 / normal1;
                    let ubaku41 = ttls14 / normal2;
                    let ubaku42 = operator / retangular;
                    let ubakuc40 = ubaku40 / ci;
                    let ubakuc41 = ubaku41 / ci;
                    let ubakuc42 = ubaku42 / ci;

                    let ubakuci40 = (ubakuc40 ** 2);
                    let bakus40 = parseFloat(ubakuci40.toFixed(19));
                    let ubakuci41 = (ubakuc41 ** 2);
                    let bakus41 = parseFloat(ubakuci41.toFixed(19));
                    let ubakuci42 = (ubakuc42 ** 2);
                    let bakus42 = parseFloat(ubakuci42.toFixed(19));
                    let tambah27 = bakus40 + bakus41 + bakus42 + 0 + 0;
                    let tidakpasti13 = Math.sqrt(tambah27).toFixed(10);

                    let ubakucis40 = (ubakuc40 ** 4) / vi1;
                    let baku40 = parseFloat(ubakucis40.toFixed(19));
                    let ubakucis41 = (ubakuc41 ** 4) / vi2;
                    let baku41 = parseFloat(ubakucis41.toFixed(19));
                    let ubakucis42 = (ubakuc42 ** 4) / vi3;
                    let baku42 = parseFloat(ubakucis42.toFixed(19));
                    let tambah28 = baku40 + baku41 + baku42 + 0 + 0;

                    let derajat13 = (tidakpasti13 ** 4) / tambah28;
                    let zj100, zj101, zj102, zj103, zj104;

                    if (derajat13 > 124) {
                        zj100 = 1.96;
                    } else if (derajat13 > 104) {
                        zj100 = 1.98;
                    } else if (derajat13 > 74) {
                        zj100 = 1.99;
                    } else if (derajat13 > 54) {
                        zj100 = 2;
                    } else if (derajat13 > 47.5) {
                        zj100 = 2.01;
                    } else if (derajat13 > 37.5) {
                        zj100 = 2.02;
                    } else if (derajat13 > 32.5) {
                        zj100 = 2.03;
                    } else if (derajat13 > 27.5) {
                        zj100 = 2.04;
                    } else {
                        zj100 = null;
                    }

                    // Set nilai zj101
                    if (derajat13 > 22.5) {
                        zj101 = 2.06;
                    } else if (derajat13 > 18.4) {
                        zj101 = 2.09;
                    } else if (derajat13 > 17.4) {
                        zj101 = 2.1;
                    } else if (derajat13 > 16.4) {
                        zj101 = 2.11;
                    } else if (derajat13 > 15.4) {
                        zj101 = 2.12;
                    } else if (derajat13 > 14.4) {
                        zj101 = 2.13;
                    } else if (derajat13 > 13.4) {
                        zj101 = 2.15;
                    } else if (derajat13 > 12.4) {
                        zj101 = 2.16;
                    } else {
                        zj101 = null;
                    }

                    // Set nilai zj102
                    if (derajat13 > 11.4) {
                        zj102 = 2.18;
                    } else if (derajat13 > 10.4) {
                        zj102 = 2.2;
                    } else if (derajat13 > 9.4) {
                        zj102 = 2.23;
                    } else if (derajat13 > 8.4) {
                        zj102 = 2.26;
                    } else if (derajat13 > 7.4) {
                        zj102 = 2.31;
                    } else if (derajat13 > 6.4) {
                        zj102 = 2.37;
                    } else if (derajat13 > 5.4) {
                        zj102 = 2.45;
                    } else if (derajat13 > 4.4) {
                        zj102 = 2.57;
                    } else {
                        zj102 = null;
                    }

                    // Set nilai zj103
                    if (derajat13 > 3.4) {
                        zj103 = 2.78;
                    } else if (derajat13 > 2.4) {
                        zj103 = 3.18;
                    } else if (derajat13 > 1.4) {
                        zj103 = 4.3;
                    } else if (derajat13 <= 1.4) {
                        zj103 = 12.7;
                    } else {
                        zj103 = null;
                    }

                    // Set nilai zj104 berdasarkan zj100-zj103
                    if (derajat13 > 27.5) {
                        zj104 = zj100;
                    } else if (derajat13 > 12.4) {
                        zj104 = zj101;
                    } else if (derajat13 > 4.4) {
                        zj104 = zj102;
                    } else if (derajat13 <= 4.4) {
                        zj104 = zj103;
                    } else {
                        zj104 = null;
                    }

                    let ketidakpastian13 = tidakpasti13 * zj104;
                    kuadrat14.value = ketidakpastian13.toFixed(9);
                    hsl14.value = ketidakpastian13.toFixed(3);

                    // hitung 15
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
                    let ttls15 = Math.sqrt(ttl15);
                    bac300.value = ttls15.toFixed(2);

                    let ubaku43 = L84 / normal1;
                    let ubaku44 = ttls15 / normal2;
                    let ubaku45 = operator / retangular;
                    let ubakuc43 = ubaku43 / ci;
                    let ubakuc44 = ubaku44 / ci;
                    let ubakuc45 = ubaku45 / ci;

                    let ubakuci43 = (ubakuc43 ** 2);
                    let bakus43 = parseFloat(ubakuci43.toFixed(19));
                    let ubakuci44 = (ubakuc44 ** 2);
                    let bakus44 = parseFloat(ubakuci44.toFixed(19));
                    let ubakuci45 = (ubakuc45 ** 2);
                    let bakus45 = parseFloat(ubakuci45.toFixed(19));
                    let tambah29 = bakus43 + bakus44 + bakus45 + 0 + 0;
                    let tidakpasti14 = Math.sqrt(tambah29).toFixed(10);

                    let ubakucis43 = (ubakuc43 ** 4) / vi1;
                    let baku43 = parseFloat(ubakucis43.toFixed(19));
                    let ubakucis44 = (ubakuc44 ** 4) / vi2;
                    let baku44 = parseFloat(ubakucis44.toFixed(19));
                    let ubakucis45 = (ubakuc45 ** 4) / vi3;
                    let baku45 = parseFloat(ubakucis45.toFixed(19));
                    let tambah30 = baku43 + baku44 + baku45 + 0 + 0;

                    let derajat14 = (tidakpasti14 ** 4) / tambah30;
                    let zg100, zg101, zg102, zg103, zg104;

                    if (derajat14 > 124) {
                        zg100 = 1.96;
                    } else if (derajat14 > 104) {
                        zg100 = 1.98;
                    } else if (derajat14 > 74) {
                        zg100 = 1.99;
                    } else if (derajat14 > 54) {
                        zg100 = 2;
                    } else if (derajat14 > 47.5) {
                        zg100 = 2.01;
                    } else if (derajat14 > 37.5) {
                        zg100 = 2.02;
                    } else if (derajat14 > 32.5) {
                        zg100 = 2.03;
                    } else if (derajat14 > 27.5) {
                        zg100 = 2.04;
                    } else {
                        zg100 = null;
                    }

                    // Set nilai zg101
                    if (derajat14 > 22.5) {
                        zg101 = 2.06;
                    } else if (derajat14 > 18.4) {
                        zg101 = 2.09;
                    } else if (derajat14 > 17.4) {
                        zg101 = 2.1;
                    } else if (derajat14 > 16.4) {
                        zg101 = 2.11;
                    } else if (derajat14 > 15.4) {
                        zg101 = 2.12;
                    } else if (derajat14 > 14.4) {
                        zg101 = 2.13;
                    } else if (derajat14 > 13.4) {
                        zg101 = 2.15;
                    } else if (derajat14 > 12.4) {
                        zg101 = 2.16;
                    } else {
                        zg101 = null;
                    }

                    // Set nilai zg102
                    if (derajat14 > 11.4) {
                        zg102 = 2.18;
                    } else if (derajat14 > 10.4) {
                        zg102 = 2.2;
                    } else if (derajat14 > 9.4) {
                        zg102 = 2.23;
                    } else if (derajat14 > 8.4) {
                        zg102 = 2.26;
                    } else if (derajat14 > 7.4) {
                        zg102 = 2.31;
                    } else if (derajat14 > 6.4) {
                        zg102 = 2.37;
                    } else if (derajat14 > 5.4) {
                        zg102 = 2.45;
                    } else if (derajat14 > 4.4) {
                        zg102 = 2.57;
                    } else {
                        zg102 = null;
                    }

                    // Set nilai zg103
                    if (derajat14 > 3.4) {
                        zg103 = 2.78;
                    } else if (derajat14 > 2.4) {
                        zg103 = 3.18;
                    } else if (derajat14 > 1.4) {
                        zg103 = 4.3;
                    } else if (derajat14 <= 1.4) {
                        zg103 = 12.7;
                    } else {
                        zg103 = null;
                    }

                    // Set nilai zg104 berdasarkan zg100-zg103
                    if (derajat14 > 27.5) {
                        zg104 = zg100;
                    } else if (derajat14 > 12.4) {
                        zg104 = zg101;
                    } else if (derajat14 > 4.4) {
                        zg104 = zg102;
                    } else if (derajat14 <= 4.4) {
                        zg104 = zg103;
                    } else {
                        zg104 = null;
                    }

                    let ketidakpastian14 = tidakpasti14 * zg104;
                    kuadrat15.value = ketidakpastian14.toFixed(9);
                    hsl15.value = ketidakpastian14.toFixed(3);
                }

                function copyValue() {
                    for (let i = 1; i <= 15; i++) {
                        // Ambil elemen-elemen berdasarkan ID dinamis
                        const pangkatElem = document.getElementById("pangkat" + i);
                        const unaikElem = document.getElementById("Unaik" + i);
                        const kuadratElem = document.getElementById("kuadrat" + i);
                        const uturunElem = document.getElementById("Uturun" + i);
                        const unPangkatElem = document.getElementById("Unaikt" + i);
                        const utPangkatElem = document.getElementById("Uturunt" + i);
                        const ugabunganElem = document.getElementById("Ugabungan" + i);
                        const uhasilid = document.getElementById("uhasil" + i);

                        // Menyalin nilai jika elemen-elemen tersebut ada
                        if (pangkatElem && unaikElem) {
                            unaikElem.value = pangkatElem.value;
                        }
                        if (kuadratElem && uturunElem) {
                            uturunElem.value = kuadratElem.value;
                        }

                        let naikFloat = unaikElem ? parseFloat(unaikElem.value) : 0;
                        let turunFloat = uturunElem ? parseFloat(uturunElem.value) : 0;
                        let pangkatFloat = unPangkatElem ? parseFloat(unPangkatElem.value) : 0;
                        let kuadratFloat = utPangkatElem ? parseFloat(utPangkatElem.value) : 0;

                        if (unPangkatElem) {
                            let hitung1 = naikFloat ** 2;
                            unPangkatElem.value = hitung1.toFixed(9);
                        }

                        if (utPangkatElem) {
                            let hitung2 = turunFloat ** 2;
                            utPangkatElem.value = hitung2.toFixed(9);
                        }

                        // Menghitung akar kuadrat dari jumlah pangkat dan kuadrat
                        if (unPangkatElem && utPangkatElem && ugabunganElem) {
                            let hitung3 = Math.sqrt(pangkatFloat + kuadratFloat);
                            ugabunganElem.value = hitung3.toFixed(9);
                            uhasilid.value = hitung3.toFixed(2);
                        }
                    }
                }
                document.addEventListener("DOMContentLoaded", copyValue);
            </script>
            <script>
                let object = document.getElementById('nominal');
                let count = 0;
                function hitungKalibrasi() {
                    count = 0; // Reset count
                    for (let y = 1; y <= 15; y++) {
                        let element = document.getElementById('hasil' + y);
                        if (element) {
                            count++;
                        }
                    }
                    // for (let x = 0; x <= count; x++) {
                    //     earlier = 100;

                    //     let calibrationElement = document.getElementById('percenCalibration' + x);
                    //     if (calibrationElement) {
                    //         calibrationElement.value = earlier;
                    //     }
                    // }
                    let value = object ? parseFloat(object.value) : 0;
                    let baseValue = value ? 100 / value : 0;
                    let result = 0;
                    let amount = count - 1;

                    for (let i = 0; i <= amount; i++) {
                        result = baseValue * i;
                        console.log(`Iterasi ke-${i}:`, result);

                        let calibrationElement = document.getElementById('percenCalibration' + i);
                        if (calibrationElement) {
                            calibrationElement.value = result.toFixed(2);
                        }
                    }

                    let pc15 = document.getElementById('percenCalibration14');
                    if (count >= 15) {
                        pc15.value = 100;
                    }
                }
            </script>
            <script src="../../../components/bootstrap/js/bootstrap.min.js"></script>
            <script src="../../../components/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>