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
    <title>Motor Pump</title>
    <!-- <link rel="shortcut icon" href="../assets/img/wings1.png" type="image/x-icon"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Times+New+Roman:wght@400&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* border: 1px solid; */
    }

    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    .container {
        min-width: 1350px;
        margin-left: 14%;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    th,
    td {
        border: 1px solid black;
        text-align: center;
        padding: 5px;
        font-size: 12px;
    }

    th {
        background-color: #f2f2f2;
    }

    .form {
        padding: 5px;
    }

    .judul {
        padding: 10px;
    }

    .bold {
        font-weight: bold;
    }

    .left {
        text-align: left;
    }

    .left-top {
        text-align: left;
        vertical-align: top;
    }

    td {
        height: 20px;
    }

    .kondisi {
        width: 70px;
    }

    .keterangan {
        width: 350px;
    }

    .hijau {
        border: 2px solid #A8E6CF;
        padding: 3px;
    }

    .biru {
        border: 2px solid #A8D0FF;
        padding: 3px;
    }

    .oren {
        border: 2px solid #FFB3B3;
        padding: 3px;
    }

    .abu {
        border: 2px solid #B0B0B0;
        padding: 3px;
    }

    .korektif {
        padding: 10px;
        width: 100%;
        height: 100%;
        box-sizing: border-box;
        text-align: left;
        vertical-align: top;
        resize: none;
        font-size: 16px;
    }

    .fill {
        margin-top: 30px;
        padding: 10px;
    }

    .fill a {
        text-decoration: none;
        color: black;
    }

    .fill a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <div class="container">

        <!-- Ngelink -->
        <div class="fill">
            <a href="../../../../public/indeks.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MENU</a>
            <b>></b>
            <a href="../../maintenance.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MAINTENANCE</a>
            <b>></b>
            <a href="./dashboard.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MOTOR PUMP</a>
        </div>

        <form action="simpan_data.php" method="post">
            <div class="form">
                <table border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">

                    <!-- JUDUL -->
                    <thead>
                        <tr>
                            <th rowspan="4" colspan="2">
                                <img src="../../../assets/BAS.png" alt="logo" style="width: 100%; height: 30%;">
                            </th>
                            <th colspan="9" rowspan="2">
                                <h1 style="margin: 0;">LAPORAN MAINTENANCE MOTOR & POMPA UTILITY</h1>
                            </th>
                        </tr>
                        <tr></tr>
                        <tr>
                            <th colspan="9" rowspan="2" style="text-align: center;">
                                <h1 style="margin: 0;">PT BUMI ALAM SEGAR</h1>
                            </th>
                        </tr>
                    </thead>

                    <tbody style="border: none;">
                        <!-- INPUTAN DATE, WAKTU & SELECT -->
                        <tr style="display: flex; justify-content: space-around;margin-top:10px;height:30px;">
                            <td style="display: flex; align-items: center; width: 45%; padding: 8px; border: none;margin-right:480%">
                                <p style="margin: 0; margin-right: 10px;font-size:15px;font-weight:600;">Tanggal:</p>
                                <input type="date" name="date" id="date">
                            </td>
                            <td style="display: flex; align-items: center; width: 45%; padding: 8px; border: none;">
                                <p style="margin: 0; margin-right: 10px;font-size:15px;font-weight:600; white-space: nowrap;">Nama Mesin:</p>
                                <input type="text" name="nama_mesin" id="nama_mesin">
                            </td>
                        </tr>

                        <tr style="display: flex; justify-content: space-around;height:30px;">
                            <td style="display: flex; align-items: center; width: 45%; padding: 8px; border: none;margin-right:480%">
                                <p style="margin: 0; margin-right: 20px;font-size:15px;font-weight:600;">Waktu:</p>
                                <input type="time" name="waktu" id="waktu">
                            </td>
                            <td style="display: flex; align-items: center; width: 45%; padding: 8px; border: none;">
                                <p style="margin: 0; margin-right: 10px;font-size:15px;font-weight:600; white-space: nowrap;">Paket:</p>
                                <select name="paket" id="paket">
                                    <option value="" selected disabled>Pilih Paket</option>
                                    <option value="Z">Z</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </td>
                        </tr>

                        <!-- HEADER -->
                        <tr>
                            <td colspan="1">
                                <h3>Mesin</h3>
                            </td>
                            <td colspan="5">
                                <h3>Jenis Pemeliharaan</h3>
                            </td>
                            <td colspan="1">
                                <h3>Kondisi</h3>
                            </td>
                            <td colspan="4">
                                <h3>Keterangan</h3>
                            </td>
                        </tr>

                        <!-- MOTOR -->
                        <div class="motor">
                            <tr>
                                <td rowspan="8">Motor</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_motor1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check electrical</td>
                                <td>
                                    <input type="text" name="kondisi_motor1" id="kondisi_motor1" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor1" id="keterangan_motor1" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_motor2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cek putaran motor</td>
                                <td>
                                    <input type="text" name="kondisi_motor2" id="kondisi_motor2" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor2" id="keterangan_motor2" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_motor3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check fibrasi dan suara motor</td>
                                <td>
                                    <input type="text" name="kondisi_motor3" id="kondisi_motor3" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor3" id="keterangan_motor3" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_motor4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check bearing</td>
                                <td>
                                    <input type="text" name="kondisi_motor4" id="kondisi_motor4" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor4" id="keterangan_motor4" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_motor5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Pelumasan motor</td>
                                <td>
                                    <input type="text" name="kondisi_motor5" id="kondisi_motor5" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor5" id="keterangan_motor5" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_motor6" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Kebersihan unit dan body motor</td>
                                <td>
                                    <input type="text" name="kondisi_motor6" id="kondisi_motor6" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor6" id="keterangan_motor6" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_motor7" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_motor1" id="pemeliharaan_motor1" class="keterangan hijau">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_motor7" id="kondisi_motor7" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor7" id="keterangan_motor7" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_motor8" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_motor2" id="pemeliharaan_motor2" class="keterangan hijau">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_motor8" id="kondisi_motor8" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_motor8" id="keterangan_motor8" class="keterangan hijau">
                                </td>
                            </tr>
                        </div>

                        <!-- POMPA -->
                        <div class="pompa">
                            <tr>
                                <td rowspan="10">Pompa</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_pompa1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check putaran pompa</td>
                                <td>
                                    <input type="text" name="kondisi_pompa1" id="kondisi_pompa1" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_pompa1" id="keterangan_pompa1" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_pompa2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check shaft dan karet coupling</td>
                                <td>
                                    <input type="text" name="kondisi_pompa2" id="kondisi_pompa2" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_pompa2" id="keterangan_pompa2" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_pompa3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check fan belt</td>
                                <td>
                                    <input type="text" name="kondisi_pompa3" id="kondisi_pompa3" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_pompa3" id="keterangan_pompa3" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_pompa4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check pressure pompa</td>
                                <td>
                                    <input type="text" name="kondisi_pompa4" id="kondisi_pompa4" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_pompa4" id="keterangan_pompa4" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_pompa5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check mechanical seal</td>
                                <td>
                                    <input type="text" name="kondisi_pompa5" id="kondisi_pompa5" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_pompa5" id="keterangan_pompa5" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_pompa6" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check gasket pompa</td>
                                <td>
                                    <input type="text" name="kondisi_pompa6" id="kondisi_pompa6" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_pompa6" id="keterangan_pompa6" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_pompa7" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check impeler</td>
                                <td>
                                    <input type="text" name="kondisi_pompa7" id="kondisi_pompa7" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_pompa7" id="keterangan_pompa7" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_pompa8" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Kebersihan unit dan body</td>
                                <td>
                                    <input type="text" name="kondisi_pompa8" id="kondisi_pompa8" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_pompa8" id="keterangan_pompa8" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_pompa9" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_pompa1" id="pemeliharaan_pompa1" class="keterangan biru">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_pompa9" id="kondisi_pompa9" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_pompa9" id="keterangan_pompa9" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_pompa10" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_pompa2" id="pemeliharaan_pompa2" class="keterangan biru">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_pompa10" id="kondisi_pompa10" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_pompa10" id="keterangan_pompa10" class="keterangan biru">
                                </td>
                            </tr>
                        </div>

                        <!-- AKSESORIS -->
                        <div class="aksesoris">
                            <tr>
                                <td rowspan="7">Aksesoris</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_aksesoris1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Valve</td>
                                <td>
                                    <input type="text" name="kondisi_aksesoris1" id="kondisi_aksesoris1" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_aksesoris1" id="keterangan_aksesoris1" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_aksesoris2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Cek valve</td>
                                <td>
                                    <input type="text" name="kondisi_aksesoris2" id="kondisi_aksesoris2" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_aksesoris2" id="keterangan_aksesoris2" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_aksesoris3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Flow meter</td>
                                <td>
                                    <input type="text" name="kondisi_aksesoris3" id="kondisi_aksesoris3" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_aksesoris3" id="keterangan_aksesoris3" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_aksesoris4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Strainer</td>
                                <td>
                                    <input type="text" name="kondisi_aksesoris4" id="kondisi_aksesoris4" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_aksesoris4" id="keterangan_aksesoris4" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_aksesoris5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check alat ukur</td>
                                <td>
                                    <input type="text" name="kondisi_aksesoris5" id="kondisi_aksesoris5" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_aksesoris5" id="keterangan_aksesoris5" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_aksesoris6" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check kelengkapan baut mur</td>
                                <td>
                                    <input type="text" name="kondisi_aksesoris6" id="kondisi_aksesoris6" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_aksesoris6" id="keterangan_aksesoris6" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_aksesoris7" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_aksesoris" id="pemeliharaan_aksesoris" class="keterangan oren">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_aksesoris7" id="kondisi_aksesoris7" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_aksesoris7" id="keterangan_aksesoris7" class="keterangan oren">
                                </td>
                            </tr>
                        </div>

                        <!-- GEARBOX -->
                        <div class="gearbox">
                            <tr>
                                <td rowspan="7">Gearbox</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_gearbox1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Penambahan/penggantian oli</td>
                                <td>
                                    <input type="text" name="kondisi_gearbox1" id="kondisi_gearbox1" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_gearbox1" id="keterangan_gearbox1" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_gearbox2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check unit dan area</td>
                                <td>
                                    <input type="text" name="kondisi_gearbox2" id="kondisi_gearbox2" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_gearbox2" id="keterangan_gearbox2" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_gearbox3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check oil seal</td>
                                <td>
                                    <input type="text" name="kondisi_gearbox3" id="kondisi_gearbox3" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_gearbox3" id="keterangan_gearbox3" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_gearbox4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check filter udara</td>
                                <td>
                                    <input type="text" name="kondisi_gearbox4" id="kondisi_gearbox4" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_gearbox4" id="keterangan_gearbox4" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_gearbox5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check bearing</td>
                                <td>
                                    <input type="text" name="kondisi_gearbox5" id="kondisi_gearbox5" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_gearbox5" id="keterangan_gearbox5" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_gearbox6" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_gearbox1" id="pemeliharaan_gearbox1" class="keterangan abu">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_gearbox6" id="kondisi_gearbox6" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_gearbox6" id="keterangan_gearbox6" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_gearbox7" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_gearbox2" id="pemeliharaan_gearbox2" class="keterangan abu">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_gearbox7" id="kondisi_gearbox7" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_gearbox7" id="keterangan_gearbox7" class="keterangan abu">
                                </td>
                            </tr>
                        </div>

                        <!-- ROW KOSONG -->
                        <tr>
                            <td colspan="11"></td>
                        </tr>

                        <!-- TINDAKAN KOREKTIF -->
                        <tr>
                            <td colspan="6" style="border-bottom: none;">
                                <h3 class="left">Tindakan Korektif :</h3>
                            </td>
                            <td colspan="2" style="border-right: none;">
                                <h3 class="left">Kebutuhan Material :</h3>
                            </td>
                            <td colspan="3" style="border-left: none;" class="left">
                                <input type="text" name="material" id="material" class="biru" style=" width:320px; margin-left:-50px;">
                            </td>
                        </tr>

                        <!-- DESKRIPSI & JUMLAH -->
                        <tr>
                            <td colspan="6" rowspan="17" style="border-top: none;">
                                <textarea name="korektif" id="korektif" class="korektif hijau"></textarea>
                            </td>
                            <td colspan="4">
                                <h3>Deskripsi</h3>
                            </td>
                            <td>
                                <h3>Jumlah</h3>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi1" id="deskripsi1" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah1" id="jumlah1" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi2" id="deskripsi2" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah2" id="jumlah2" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi3" id="deskripsi3" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah3" id="jumlah3" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi4" id="deskripsi4" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah4" id="jumlah4" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi5" id="deskripsi5" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah5" id="jumlah5" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi6" id="deskripsi6" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah6" id="jumlah6" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi7" id="deskripsi7" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah7" id="jumlah7" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi8" id="deskripsi8" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah8" id="jumlah8" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi9" id="deskripsi9" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah9" id="jumlah9" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi10" id="deskripsi10" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah10" id="jumlah10" class="kondisi oren">
                            </td>
                        </tr>

                        <!-- DIBUAT -->
                        <tr>
                            <td colspan="3" class="left">
                                <p>Dibuat :</p>
                            </td>
                            <td colspan="2" rowspan="2"></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="left">
                                <p>Teknisi</p>
                            </td>
                        </tr>

                        <!-- DIKETAHUI : REJA FIRMANSYAH -->
                        <tr>
                            <td colspan="3" class="left">
                                <p>Diketahui : Reja Firmansyah</p>
                            </td>
                            <td colspan="2" rowspan="2"></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="left">
                                <p>Staff Engineering</p>
                            </td>
                        </tr>

                        <!-- DITERIMA -->
                        <tr>
                            <td colspan="3" class="left">
                                <p>Diterima :</p>
                            </td>
                            <td colspan="2" rowspan="2"></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="left">
                                <p>Staff User</p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="11" style="text-align: right;">
                                <h2>FRM/EUT/01/009/009-02</h2>
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>
    </div>
    </div>

    <button type="submit" style="padding: 10px;">Simpan</button>

    </form>
    <button><a href="./pdf.php"> Cetak</button></a>
</body>

</html>