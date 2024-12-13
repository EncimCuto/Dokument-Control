<?php
session_start();
require_once '../../src/config/config.php';

$id = $_GET['id'];

if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    header('Location: log-in-app2.php?id=' . $id );
    exit;
}

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$bagian = $_SESSION['bagian'];
?>

<?php
    require_once'../../src/config/config2.php';
    require_once('../../src/components/tcpdf/tcpdf.php');

$id = $_GET['id'];
$username = $_GET['username'];
$bagian = $_GET['bagian'];


$query = "SELECT * FROM instrument_handover WHERE id = $id";
    $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

    $gambarBase64Array = [];

    // Mengambil gambar dari setiap kolom
    if ($row) {
        // Gambar 1
        $gambarBase64Array[] = base64_encode($row['app1']);
        // Gambar 2
        $gambarBase64Array[] = base64_encode($row['app2']);
        // Gambar 3
        $gambarBase64Array[] = base64_encode($row['app3']);
        // Gambar 4
        $gambarBase64Array[] = base64_encode($row['app4']);
    }

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->AddPage('A4');
    $pdf->SetMargins(0, 0, 5);
    $pdf->SetHeaderMargin(0);
    $pdf->SetFooterMargin(0);
    $pdf->SetAutoPageBreak(false, 0);
    
    $pdf->SetLineWidth(0.4);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Rect(10, 10, $pdf->getPageWidth() - 15, $pdf->getPageHeight() - 15);
    $pdf->Rect(9, 9, $pdf->getPageWidth() - 13, $pdf->getPageHeight() - 13);

    
    $pdf->SetLineWidth(0.4);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Rect(10, 29, $pdf->getPageWidth() - 15, $pdf->getPageHeight() - 253);
    $pdf->SetLineWidth(0.3);
    $pdf->Rect(12.8, 85.001, $pdf->getPageWidth() - 20.9, $pdf->getPageHeight() - 175);

    $pdf->SetLineWidth(0.01);
    $pdf->Rect(38.5, 155, $pdf->getPageWidth() - 80, $pdf->getPageHeight() - 252);
    $pdf->SetDrawColor(115,115,115);
    $pdf->SetLineWidth(0.01);
    $pdf->Rect(41, 160, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    $pdf->Rect(41, 165, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    $pdf->Rect(41, 170, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    $pdf->Rect(41, 175, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    $pdf->Rect(41, 180, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    $pdf->Rect(41, 185, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    $pdf->Rect(41, 190, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    
    // Variabel untuk konten header dan data
    $logo = '<img src="../../src/assets/LogoForm.png">';
    $header = '
    <style>
        * {
            line-height: 0.9;
        }
        .border {
            border: 1px solid black;
        }
        .bortd td {
            border: 1px solid black;
        }
        span {
            font-size: 10px;
            text_align:left;
        }
        .metode {
            font-weight: bold;
        }
        .* {
            margin: 0;
            padding: 0;
        }
        .divborder {
            border: 1px solid black;
            outline: 1px;
        }
        .thbel {
            text-align: center;
            font-size: 9px;
            font-weight: bold;
        }
        .tdbel {
            font-size: 9px;
        }
        .baca {
            font-size: 8px;
        }
       .title {
            font-size: 15px;
            font-weight: bold;
       }
    </style>
    <table class="bortd">
        <tr>
            <td style="width: 143px; ">'.$logo.'</td>
            <td style="width: 410px;text-align: center; line-height: 40px;"><span class="title">SERTIFIKAT KALIBRASI INTERNAL<br>INSTRUMENT LABORATORIUM</span></td>
        </tr>
    </table>
    <table>
    <tr><td style="line-height: 5px;"></td></tr>
        <tr>
            <td width="100px"><span>Departemen Pemilik</span></td>
            <td width="10px"><span>:</span></td>
            <td width="135px"><span>' . $row['departemen'] . '</span></td>
            <td width="125px"><span>Range Penggunaan Alat</span></td>
            <td width="10px"><span>:</span></td>
            <td width="155px"><span>' . $row['range_penggunaan_alat'] . '</span></td>
            <td width="40px"></td>
        </tr>
        <tr>
            <td><span>Lokasi</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['lokasi'] . '</span></td>
            <td><span>Limits Of Permissible Error</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['limits_of_permissible_error'] . '</span></td>
        </tr>
        <tr>
            <td><span>Nomor Kalibrasi</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['nomor_kalibrasi'] . '</span></td>
            <td><span>Kode Alat</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['kode_alat'] . '</span></td>
        </tr>
        <tr>
            <td><span>Nama Alat</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['nama_alat'] . '</span></td>
            <td><span>Tgl. Kalibrasi</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['tgl_kalibrasi'] . '</span></td>
        </tr>
        <tr>
            <td><span>Merk</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['merk'] . '</span></td>
            <td><span>Tgl. Kalibrasi Ulang</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['tgl_kalibrasi_ulang'] . '</span></td>
        </tr>
        <tr>
            <td><span>Tipe</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['tipe'] . '</span></td>
            <td><span>Metode Kalibrasi</span></td>
            <td><span>:</span></td>
            <td rowspan="3"><span class="metode">Didopsi dari :  "The Expression of Uncertainty and Confidence in Measurement"</span></td>
        </tr>
        <tr>
            <td><span>Kapasitas</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['kapasitas'] . '</span></td>
        </tr>
        <tr>
            <td><span>Resolusi</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['resolusi'] . '</span></td>
        </tr>
        <tr>
            <td><span>Lokasi Kalibrasi</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['lokasi_kalibrasi'] . '</span></td>
            <td></td>
            <td></td>
            <td rowspan="3" width="190px"><span>Oleh UKAS (United Kingdom Accreditation Service) M3003, Edition-<br>3, November 2012</span></td>
        </tr>
        <tr>
            <td><span>Suhu Ruangan</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['suhu_ruangan'] . '</span></td>
        </tr>
        <tr>
            <td><span>Kelembaban</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['kelembaban'] . '</span></td>
        </tr>
    </table>
    <table>
<tr><td style="line-height: 14px"></td></tr>
    <tr>
        <td style="text-align: center;"><span class="metode">HASIL KALIBRASI</span></td>
    </tr>
</table>

<table>
<tr><td  style="line-height: 10px"></td></tr>
    <tr>
        <td width="8"></td>
        <td class="border" width="20px" height="40px" style="line-height: 45px; text-align: center;" rowspan="2"><span class="metode">No</span></td>
        <td class="border" width="100px" style="line-height: 20px; text-align: center;"><span class="metode">Titik Kalibrasi</span></td>
        <td class="border" width="108px" style="line-height: 10px; text-align: center;"><span class="metode">Pembacaan Alat yang Dikalibrasi</span></td>
        <td class="border" width="102px" style="line-height: 10px; text-align: center;"><span class="metode">Pembacaan Alat Standar</span></td>
        <td class="border" width="102px" style="line-height: 20px; text-align: center;"><span class="metode">Koreksi</span></td>
        <td class="border" width="104px" style="line-height: 10px; text-align: center;"><span class="metode">Ketidakpastian</span><br><span class="metode">U95</span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" style="line-height: 15px; height="20px" text-align: center;"><span class="thbel">( pH )</span></td>
        <td class="border" style="line-height: 15px; text-align: center;"><span class="thbel">( pH )</span></td>
        <td class="border" style="line-height: 15px; text-align: center;"><span class="thbel">( pH )</span></td>
        <td class="border" style="line-height: 15px; text-align: center;"><span class="thbel">( pH )</span></td>
        <td class="border" style="line-height: 15px; text-align: center;"><span class="thbel">( pH )</span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="30px" style="line-height: 30px; text-align: center;"><span class="thbel">1</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['titik_kalibrasi1'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['alat_dikalibrasi1'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['alat_standar1'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['koreksi1'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['ketidakpastian1'] . '</span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="30px" style="line-height: 30px; text-align: center;"><span class="thbel">2</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['titik_kalibrasi2'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['alat_dikalibrasi2'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['alat_standar2'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['koreksi2'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['ketidakpastian2'] . '</span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="30px" style="line-height: 30px; text-align: center;"><span class="thbel">3</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['titik_kalibrasi3'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['alat_dikalibrasi3'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['alat_standar3'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['koreksi3'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['ketidakpastian3'] . '</span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="30px" style="line-height: 30px; text-align: center;"><span class="thbel">4</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['titik_kalibrasi4'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['alat_dikalibrasi4'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['alat_standar4'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['koreksi4'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['ketidakpastian4'] . '</span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="30px" style="line-height: 30px; text-align: center;"><span class="thbel">5</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['titik_kalibrasi5'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['alat_dikalibrasi5'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['alat_standar5'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['koreksi5'] . '</span></td>
        <td class="border" style="line-height: 30px; text-align: center;"><span>' . $row['ketidakpastian5'] . '</span></td>
    </tr>
    <tr><td style="line-height: 5px;"></td></tr>
    <tr>
        <td width="8"></td>
        <td colspan="3"><span class="metode">Kurva :</span></td>
    </tr>
</table>



<table>
    <tr>
        <td width="8px" style="line-height: 180px;"></td>
    </tr>
    <tr>
        <td></td>
        <td><span class="metode">Keterangan :</span></td>
    </tr>
    <tr>
        <td></td>
        <td><span>Ketidakpastian dihitung pada tingkat kepercayaan 95% dan faktor cakupan k = 2.</span></td>
    </tr>
    <tr>
        <td></td>
        <td><span>Jika tanda koreksi adalah positif ( + ) harus ditambahkan pada pembacaan skala untuk menghasilkan nilai sebenarnya.</span></td>
    </tr>
    <tr>
        <td></td>
        <td><span>Jika tanda koreksi adalah  negatif ( - ) harus dikurangi pada pembacaan skala untuk menghasilkan nilai sebenarnya.</span></td>
    </tr>
    <tr>
        <td></td>
        <td><span>Hasil Kalibrasi Yang Dilapor Tertelusur Di NIST</span></td>
    </tr>
    <tr>
        <td></td>
        <td><span>Alat Standar Yang Digunakan Adalah Buffer Solution</span></td>
    </tr>
</table>

<table>
    <tr>
        <td style="line-height: 5px;"></td>
    </tr>
    <tr>
        <td style="text-align: center;"><span class="baca">Sertifikat atau laporan ini dilarang diperbanyak tanpa persetujuan tertulis dari Kalibrasi PT. Bumi Alam Segar</span></td>
    </tr>
    <tr>
        <td style="text-align: center;"><span class="baca">This certificate or report shall not be reproduced without the written approval from Calibration of PT. Bumi Alam Segar</span></td>
    </tr>
</table>

<table>
    <tr>
        <td width="10px"></td>
        <td class="border" width="100px"><span class="tdbel metode">Dibuat Oleh :</span></td>
        <td class="border" width="90px"><span class="tdbel metode">Dicek Oleh :</span></td>
        <td class="border" width="110px"><span class="tdbel metode">Disetujui Oleh :</span></td>
        <td class="border" width="90px"><span class="tdbel metode">Diterima Oleh :</span></td>
        <td class="border" width="140px"><span class="tdbel metode">Dibuat Tanggal : ' . $row['tanggal_dibuat'] . '</span></td>
    </tr>
    <tr>
        <td width="10px"></td>
        <td class="border" rowspan="2" style="text-align: center; line-height: 15px;"><img src="data:image/png;base64,' . $gambarBase64Array[0] . '" alt="gambar" width="63" height="50"></td>
        <td class="border" rowspan="2" style="text-align: center; line-height: 15px;"><img src="data:image/png;base64,' . $gambarBase64Array[1] . '" alt="gambar" width="63" height="50"></td>
        <td class="border" rowspan="2" style="text-align: center; line-height: 15px;"><img src="data:image/png;base64,' . $gambarBase64Array[2] . '" alt="gambar" width="63" height="50"></td>
        <td class="border" rowspan="2" style="text-align: center; line-height: 15px;"><img src="data:image/png;base64,' . $gambarBase64Array[3] . '" alt="gambar" width="63" height="50"></td>
        <td class="border"><span class="baca metode">Catatan :</span></td>
    </tr>
    <tr>
        <td width="10px" height="60px"></td>
        <td class="border"></td>
    </tr>
    <tr>
        <td width="10px"></td>
        <td class="border" style="text-align: center;"><span class="metode">(' . $row['foreman'] . ')</span></td>
        <td class="border" style="text-align: center;"><span class="metode">(' . $row['supervisor'] . ')</span></td>
        <td class="border" style="text-align: center;"><span class="metode">(' . $row['manager'] . ')</span></td>
        <td class="border" style="text-align: center;"><span class="metode">(' . $row['user'] . ')</span></td>
        <td class="border"></td>
    </tr>
    <tr>
        <td width="10px"></td>
        <td class="border" style="text-align: center;"><span>Foreman Kalibrasi</span></td>
        <td class="border" style="text-align: center;"><span>Supervisor</span></td>
        <td class="border" style="text-align: center;"><span>Manager Kalibrasi</span></td>
        <td class="border" style="text-align: center;"><span>User</span></td>
        <td class="border"></td>
    </tr>
</table>';

    // Menambahkan konten header ke PDF
    $pdf->writeHTML($header, true, false, true, false, '');

    
    // $alat_naik1   = $row['alat_naik1'];  $standar_naik1  =  $row['standar_naik1'];
    // $alat_naik2   = $row['alat_naik2'];  $standar_naik2  =  $row['standar_naik2'];
    // $alat_naik3   = $row['alat_naik3'];  $standar_naik3  =  $row['standar_naik3'];
    // $alat_naik4   = $row['alat_naik4'];  $standar_naik4  =  $row['standar_naik4'];
    // $alat_naik5   = $row['alat_naik5'];  $standar_naik5  =  $row['standar_naik5'];
    // $alat_naik6   = $row['alat_naik6'];  $standar_naik6  =  $row['standar_naik6'];
    // $alat_naik7   = $row['alat_naik7'];  $standar_naik7  =  $row['standar_naik7'];
    // $alat_naik8   = $row['alat_naik8'];  $standar_naik8  =  $row['standar_naik8'];
    // $alat_naik9   = $row['alat_naik9'];  $standar_naik9  =  $row['standar_naik9'];
    // $alat_naik10  = $row['alat_naik10'];  $standar_naik10 =  $row['standar_naik10'];
    // $alat_naik11  = $row['alat_naik11'];  $standar_naik11 =  $row['standar_naik11'];
    // $alat_naik12  = $row['alat_naik12'];  $standar_naik12 =  $row['standar_naik12'];
    // $alat_naik13  = $row['alat_naik13'];  $standar_naik13 =  $row['standar_naik13'];
    // $alat_naik14  = $row['alat_naik14'];  $standar_naik14 =  $row['standar_naik14'];
    // $alat_naik15  = $row['alat_naik15'];  $standar_naik15 =  $row['standar_naik15'];
    
    
    // $alat_turun1  = $row['alat_turun1'];  $standar_turun1  = $row['standar_turun1'];
    // $alat_turun2  = $row['alat_turun2'];  $standar_turun2  = $row['standar_turun2'];
    // $alat_turun3  = $row['alat_turun3'];  $standar_turun3  = $row['standar_turun3'];
    // $alat_turun4  = $row['alat_turun4'];  $standar_turun4  = $row['standar_turun4'];
    // $alat_turun5  = $row['alat_turun5'];  $standar_turun5  = $row['standar_turun5'];
    // $alat_turun6  = $row['alat_turun6'];  $standar_turun6  = $row['standar_turun6'];
    // $alat_turun7  = $row['alat_turun7'];  $standar_turun7  = $row['standar_turun7'];
    // $alat_turun8  = $row['alat_turun8'];  $standar_turun8  = $row['standar_turun8'];
    // $alat_turun9  = $row['alat_turun9'];  $standar_turun9  = $row['standar_turun9'];
    // $alat_turun10 = $row['alat_turun10'];  $standar_turun10 = $row['standar_turun10'];
    // $alat_turun11 = $row['alat_turun11'];  $standar_turun11 = $row['standar_turun11'];
    // $alat_turun12 = $row['alat_turun12'];  $standar_turun12 = $row['standar_turun12'];
    // $alat_turun13 = $row['alat_turun13'];  $standar_turun13 = $row['standar_turun13'];
    // $alat_turun14 = $row['alat_turun14'];  $standar_turun14 = $row['standar_turun14'];
    // $alat_turun15 = $row['alat_turun15'];  $standar_turun15 = $row['standar_turun15'];
    
    // $titik_kalibrasi1 = $row['titik_kgcm1'];
    // $titik_kalibrasi2 = $row['titik_kgcm2'];
    // $titik_kalibrasi3 = $row['titik_kgcm3'];
    // $titik_kalibrasi4 = $row['titik_kgcm4'];
    // $titik_kalibrasi5 = $row['titik_kgcm5'];
    // $titik_kalibrasi6 = $row['titik_kgcm6'];
    // $titik_kalibrasi7 = $row['titik_kgcm7'];
    // $titik_kalibrasi8 = $row['titik_kgcm8'];
    // $titik_kalibrasi9 = $row['titik_kgcm9'];
    // $titik_kalibrasi10 = $row['titik_kgcm10'];
    // $titik_kalibrasi11 = $row['titik_kgcm11'];
    // $titik_kalibrasi12 = $row['titik_kgcm12'];
    // $titik_kalibrasi13 = $row['titik_kgcm13'];
    // $titik_kalibrasi14 = $row['titik_kgcm14'];
    // $titik_kalibrasi15 = $row['titik_kgcm15'];
    
    // // Naik 
    // $r1 = 215  - ($alat_naik1  / 2);  $b1 = 215  - ($standar_naik1  / 2);
    // $r2 = 215  - ($alat_naik2  / 2);  $b2 = 215  - ($standar_naik2  / 2);
    // $r3 = 215  - ($alat_naik3  / 2);  $b3 = 215  - ($standar_naik3  / 2);
    // $r4 = 215  - ($alat_naik4  / 2);  $b4 = 215  - ($standar_naik4  / 2);
    // $r5 = 215  - ($alat_naik5  / 2);  $b5 = 215  - ($standar_naik5  / 2);
    // $r6 = 215  - ($alat_naik6  / 2);  $b6 = 215  - ($standar_naik6  / 2);
    // $r7 = 215  - ($alat_naik7  / 2);  $b7 = 215  - ($standar_naik7  / 2);
    // $r8 = 215  - ($alat_naik8  / 2);  $b8 = 215  - ($standar_naik8  / 2);
    // $r9 = 215  - ($alat_naik9  / 2);  $b9 = 215  - ($standar_naik9  / 2);
    // $r10 = 215 - ($alat_naik10 / 2);  $b10 = 215 - ($standar_naik10 / 2);
    // $r11 = 215 - ($alat_naik11 / 2);  $b11 = 215 - ($standar_naik11 / 2);
    // $r12 = 215 - ($alat_naik12 / 2);  $b12 = 215 - ($standar_naik12 / 2);
    // $r13 = 215 - ($alat_naik13 / 2);  $b13 = 215 - ($standar_naik13 / 2);
    // $r14 = 215 - ($alat_naik14 / 2);  $b14 = 215 - ($standar_naik14 / 2);
    // $r15 = 215 - ($alat_naik15 / 2);  $b15 = 215 - ($standar_naik15 / 2);
    
    // // Turun
    // $y1 = 215  - ($alat_turun1  / 2);  $g1 = 215  - ($standar_turun1  / 2);
    // $y2 = 215  - ($alat_turun2  / 2);  $g2 = 215  - ($standar_turun2  / 2);
    // $y3 = 215  - ($alat_turun3  / 2);  $g3 = 215  - ($standar_turun3  / 2);
    // $y4 = 215  - ($alat_turun4  / 2);  $g4 = 215  - ($standar_turun4  / 2);
    // $y5 = 215  - ($alat_turun5  / 2);  $g5 = 215  - ($standar_turun5  / 2);
    // $y6 = 215  - ($alat_turun6  / 2);  $g6 = 215  - ($standar_turun6  / 2);
    // $y7 = 215  - ($alat_turun7  / 2);  $g7 = 215  - ($standar_turun7  / 2);
    // $y8 = 215  - ($alat_turun8  / 2);  $g8 = 215  - ($standar_turun8  / 2);
    // $y9 = 215  - ($alat_turun9  / 2);  $g9 = 215  - ($standar_turun9  / 2);
    // $y10 = 215 - ($alat_turun10 / 2);  $g10 = 215 - ($standar_turun10 / 2);
    // $y11 = 215 - ($alat_turun11 / 2);  $g11 = 215 - ($standar_turun11 / 2);
    // $y12 = 215 - ($alat_turun12 / 2);  $g12 = 215 - ($standar_turun12 / 2);
    // $y13 = 215 - ($alat_turun13 / 2);  $g13 = 215 - ($standar_turun13 / 2);
    // $y14 = 215 - ($alat_turun14 / 2);  $g14 = 215 - ($standar_turun14 / 2);
    // $y15 = 215 - ($alat_turun15 / 2);  $g15 = 215 - ($standar_turun15 / 2);
    
    // // titik kalibrasi
    // $a1 = 215  - ($titik_kalibrasi1  / 2);
    // $a2 = 215  - ($titik_kalibrasi2  / 2);
    // $a3 = 215  - ($titik_kalibrasi3  / 2);
    // $a4 = 215  - ($titik_kalibrasi4  / 2);
    // $a5 = 215  - ($titik_kalibrasi5  / 2);
    // $a6 = 215  - ($titik_kalibrasi6  / 2);
    // $a7 = 215  - ($titik_kalibrasi7  / 2);
    // $a8 = 215  - ($titik_kalibrasi8  / 2);
    // $a9 = 215  - ($titik_kalibrasi9  / 2);
    // $a10 = 215 - ($titik_kalibrasi10 / 2);
    // $a11 = 215 - ($titik_kalibrasi11 / 2);
    // $a12 = 215 - ($titik_kalibrasi12 / 2);
    // $a13 = 215 - ($titik_kalibrasi13 / 2);
    // $a14 = 215 - ($titik_kalibrasi14 / 2);
    // $a15 = 215 - ($titik_kalibrasi15 / 2);
    
    // // line kurva
    // $pdf->SetLineWidth(0.8);
    // $pdf->SetDrawColor(92, 90, 90);
    // $pdf->Curve(40, 215 , 48, $a1, 56, $a2, 64, $a3);
    // $pdf->Curve(64, $a3 , 72, $a4, 80, $a5, 88, $a6);
    // $pdf->Curve(88, $a6 , 96, $a7, 104, $a8, 112,  $a9);
    // $pdf->Curve(112, $a9 , 120, $a10, 128, $a11, 136, $a12);
    // $pdf->Curve(136, $a12 , 144, $a13, 152, $a14, 160, $a15);
    
    // $pdf->SetDrawColor(255, 0, 0);
    // $pdf->Curve(40, 215 , 48, $r1, 56, $r2, 64, $r3);
    // $pdf->Curve(64, $r3 , 72, $r4, 80, $r5, 88, $r6);
    // $pdf->Curve(88, $r6 , 96, $r7, 104, $r8, 112,  $r9);
    // $pdf->Curve(112, $r9 , 120, $r10, 128, $r11, 136, $r12);
    // $pdf->Curve(136, $r12 , 144, $r13, 152, $r14, 160, $r15);
    
    // $pdf->SetDrawColor(3, 144, 252);
    // $pdf->Curve(40, 215 , 48, $b1, 56, $b2, 64, $b3);
    // $pdf->Curve(64, $b3 , 72, $b4, 80, $b5, 88, $b6);
    // $pdf->Curve(88, $b6 , 96, $b7, 104, $b8, 112, $b9);
    // $pdf->Curve(112, $b9 , 120, $b10, 128, $b11, 136, $b12);
    // $pdf->Curve(136, $b12 , 144, $b13, 152, $b14, 160, $b15);
    
    // $pdf->SetDrawColor(255, 217, 0);
    // $pdf->Curve(40, 215 , 48, $y1, 56, $y2, 64, $y3);
    // $pdf->Curve(64, $y3 , 72, $y4, 80, $y5, 88, $y6);
    // $pdf->Curve(88, $y6 , 96, $y7, 104, $y8, 112,  $y9);
    // $pdf->Curve(112, $y9 , 120, $y10, 128, $y11, 136, $y12);
    // $pdf->Curve(136, $y12 , 144, $y13, 152, $y14, 160, $y15);
    
    // $pdf->SetDrawColor(0, 140, 2);
    // $pdf->Curve(40, 215 , 48, $g1, 56, $g2, 64, $g3);
    // $pdf->Curve(64, $g3 , 72, $g4, 80, $g5, 88, $g6);
    // $pdf->Curve(88, $g6 , 96, $g7, 104, $g8, 112,  $g9);
    // $pdf->Curve(112, $g9 , 120, $g10, 128, $g11, 136, $g12);
    // $pdf->Curve(136, $g12 , 144, $g13, 152, $g14, 160, $g15);
    

    // Output PDF ke string
    $pdfContent = $pdf->Output('', 's'); // Output ke string
    }
    ?>

<html>
<head>
    <title>Tampilkan PDF</title>
    <link rel="stylesheet" href="../../src/components/bootstrap/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #EDDFE0;
        }
        .container {
            width: 100vmax;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .pdf {
            display: flex;
            justify-content: center;
            width: 600px;
            height: auto;
            background-color: white;
        }
        iframe {
            object-fit: cover;
        }
        .box {
            width: 600px;
            height: 9%;
            background-color: white;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            padding-top: 5px;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="">
    <div class="pdf">
        <iframe src='data:application/pdf;base64,<?php echo base64_encode($pdfContent); ?>' width='540' height='580'></iframe>
    </div>
    <div class="box">
    <form action="system/app_2.php?id=<?php echo $_GET['id']; ?>&username=<?php echo $_GET['username']; ?>&bagian=<?php echo $_GET['bagian']; ?>" method="POST">
        <button type="submit" class="btn btn-success" id="app">APPROVE</button>
    </form>
    </div>
    </div>
    </div>
</body>
</html>