<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require'../../components/vendor/autoload.php';
include'../../config/config2.php';

// header
$dept2 = isset($_POST['dept2']) ? $_POST['dept2'] : 'Tidak tersedia';
$lok2 = isset($_POST['lok2']) ? $_POST['lok2'] : 'Tidak tersedia';
$kal2 = isset($_POST['kal2']) ? $_POST['kal2'] : 'Tidak tersedia';
$nam2 = isset($_POST['nam2']) ? $_POST['nam2'] : 'Tidak tersedia';
$mer2 = isset($_POST['mer2']) ? $_POST['mer2'] : 'Tidak tersedia';
$tip2 = isset($_POST['tip2']) ? $_POST['tip2'] : 'Tidak tersedia';
$kap2 = isset($_POST['kap2']) ? $_POST['kap2'] : 'Tidak tersedia';
$res2 = isset($_POST['res2']) ? $_POST['res2'] : 'Tidak tersedia';
$lok_kal2 = isset($_POST['lok_kal2']) ? $_POST['lok_kal2'] : 'Tidak tersedia';
$suh2 = isset($_POST['suh2']) ? $_POST['suh2'] : 'Tidak tersedia';
$kel2 = isset($_POST['kel2']) ? $_POST['kel2'] : 'Tidak tersedia';
$rang2 = isset($_POST['rang2']) ? $_POST['rang2'] : 'Tidak tersedia';
$lim2 = isset($_POST['lim2']) ? $_POST['lim2'] : 'Tidak tersedia';
$kode = isset($_POST['kode']) ? $_POST['kode'] : 'Tidak tersedia';
$tanggal_kalibrasi2 = isset($_POST['tanggal_kalibrasi2']) ? $_POST['tanggal_kalibrasi2'] : 'Tidak tersedia';
$tanggal_kalibrasi_ulang2 = isset($_POST['tanggal_kalibrasi_ulang2']) ? $_POST['tanggal_kalibrasi_ulang2'] : 'Tidak tersedia';


// titik kalibrasi
$nomor2  = isset($_POST['nomor2']) && is_numeric($_POST['nomor2']) ? $_POST['nomor2'] : 0;
$nomor4  = isset($_POST['nomor4']) && is_numeric($_POST['nomor4']) ? $_POST['nomor4'] : 0;
$nomor6  = isset($_POST['nomor6']) && is_numeric($_POST['nomor6']) ? $_POST['nomor6'] : 0;
$nomor8  = isset($_POST['nomor8']) && is_numeric($_POST['nomor8']) ? $_POST['nomor8'] : 0;
$nomor10 = isset($_POST['nomor10']) && is_numeric($_POST['nomor10']) ? $_POST['nomor10'] : 0;
$nomor12 = isset($_POST['nomor12']) && is_numeric($_POST['nomor12']) ? $_POST['nomor12'] : 0;
$nomor14 = isset($_POST['nomor14']) && is_numeric($_POST['nomor14']) ? $_POST['nomor14'] : 0;
$nomor16 = isset($_POST['nomor16']) && is_numeric($_POST['nomor16']) ? $_POST['nomor16'] : 0;
$nomor18 = isset($_POST['nomor18']) && is_numeric($_POST['nomor18']) ? $_POST['nomor18'] : 0;
$nomor20 = isset($_POST['nomor20']) && is_numeric($_POST['nomor20']) ? $_POST['nomor20'] : 0;
$nomor22 = isset($_POST['nomor22']) && is_numeric($_POST['nomor22']) ? $_POST['nomor22'] : 0;
$nomor24 = isset($_POST['nomor24']) && is_numeric($_POST['nomor24']) ? $_POST['nomor24'] : 0;
$nomor26 = isset($_POST['nomor26']) && is_numeric($_POST['nomor26']) ? $_POST['nomor26'] : 0;
$nomor28 = isset($_POST['nomor28']) && is_numeric($_POST['nomor28']) ? $_POST['nomor28'] : 0;
$nomor30 = isset($_POST['nomor30']) && is_numeric($_POST['nomor30']) ? $_POST['nomor30'] : 0;
$nomor32 = isset($_POST['nomor32']) && is_numeric($_POST['nomor32']) ? $_POST['nomor32'] : 0;
$nomor34 = isset($_POST['nomor34']) && is_numeric($_POST['nomor34']) ? $_POST['nomor34'] : 0;
$nomor36 = isset($_POST['nomor36']) && is_numeric($_POST['nomor36']) ? $_POST['nomor36'] : 0;
$nomor38 = isset($_POST['nomor38']) && is_numeric($_POST['nomor38']) ? $_POST['nomor38'] : 0;
$nomor40 = isset($_POST['nomor40']) && is_numeric($_POST['nomor40']) ? $_POST['nomor40'] : 0;


// titik dikalibrasi
$nan3   = isset($_POST['nan3']) && is_numeric($_POST['nan3']) ? $_POST['nan3'] : 0;
$nan18  = isset($_POST['nan18']) && is_numeric($_POST['nan18']) ? $_POST['nan18'] : 0;
$nan33  = isset($_POST['nan33']) && is_numeric($_POST['nan33']) ? $_POST['nan33'] : 0;
$nan48  = isset($_POST['nan48']) && is_numeric($_POST['nan48']) ? $_POST['nan48'] : 0;
$nan64  = isset($_POST['nan64']) && is_numeric($_POST['nan64']) ? $_POST['nan64'] : 0;
$nan78  = isset($_POST['nan78']) && is_numeric($_POST['nan78']) ? $_POST['nan78'] : 0;
$nan93  = isset($_POST['nan93']) && is_numeric($_POST['nan93']) ? $_POST['nan93'] : 0;
$nan108 = isset($_POST['nan108']) && is_numeric($_POST['nan108']) ? $_POST['nan108'] : 0;
$nan123 = isset($_POST['nan123']) && is_numeric($_POST['nan123']) ? $_POST['nan123'] : 0;
$nan138 = isset($_POST['nan138']) && is_numeric($_POST['nan138']) ? $_POST['nan138'] : 0;
$nan153 = isset($_POST['nan153']) && is_numeric($_POST['nan153']) ? $_POST['nan153'] : 0;
$nan168 = isset($_POST['nan168']) && is_numeric($_POST['nan168']) ? $_POST['nan168'] : 0;
$nan183 = isset($_POST['nan183']) && is_numeric($_POST['nan183']) ? $_POST['nan183'] : 0;
$nan198 = isset($_POST['nan198']) && is_numeric($_POST['nan198']) ? $_POST['nan198'] : 0;
$nan213 = isset($_POST['nan213']) && is_numeric($_POST['nan213']) ? $_POST['nan213'] : 0;
$nan228 = isset($_POST['nan228']) && is_numeric($_POST['nan228']) ? $_POST['nan228'] : 0;
$nan243 = isset($_POST['nan243']) && is_numeric($_POST['nan243']) ? $_POST['nan243'] : 0;
$nan258 = isset($_POST['nan258']) && is_numeric($_POST['nan258']) ? $_POST['nan258'] : 0;
$nan273 = isset($_POST['nan273']) && is_numeric($_POST['nan273']) ? $_POST['nan273'] : 0;
$nan288 = isset($_POST['nan288']) && is_numeric($_POST['nan288']) ? $_POST['nan288'] : 0;


// standar
$standar1  = isset($_POST['standar1']) && is_numeric($_POST['standar1']) ? $_POST['standar1'] : 0;
$standar2  = isset($_POST['standar2']) && is_numeric($_POST['standar2']) ? $_POST['standar2'] : 0;
$standar3  = isset($_POST['standar3']) && is_numeric($_POST['standar3']) ? $_POST['standar3'] : 0;
$standar4  = isset($_POST['standar4']) && is_numeric($_POST['standar4']) ? $_POST['standar4'] : 0;
$standar5  = isset($_POST['standar5']) && is_numeric($_POST['standar5']) ? $_POST['standar5'] : 0;
$standar6  = isset($_POST['standar6']) && is_numeric($_POST['standar6']) ? $_POST['standar6'] : 0;
$standar7  = isset($_POST['standar7']) && is_numeric($_POST['standar7']) ? $_POST['standar7'] : 0;
$standar8  = isset($_POST['standar8']) && is_numeric($_POST['standar8']) ? $_POST['standar8'] : 0;
$standar9  = isset($_POST['standar9']) && is_numeric($_POST['standar9']) ? $_POST['standar9'] : 0;
$standar10 = isset($_POST['standar10']) && is_numeric($_POST['standar10']) ? $_POST['standar10'] : 0;
$standar11 = isset($_POST['standar11']) && is_numeric($_POST['standar11']) ? $_POST['standar11'] : 0;
$standar12 = isset($_POST['standar12']) && is_numeric($_POST['standar12']) ? $_POST['standar12'] : 0;
$standar13 = isset($_POST['standar13']) && is_numeric($_POST['standar13']) ? $_POST['standar13'] : 0;
$standar14 = isset($_POST['standar14']) && is_numeric($_POST['standar14']) ? $_POST['standar14'] : 0;
$standar15 = isset($_POST['standar15']) && is_numeric($_POST['standar15']) ? $_POST['standar15'] : 0;
$standar16 = isset($_POST['standar16']) && is_numeric($_POST['standar16']) ? $_POST['standar16'] : 0;
$standar17 = isset($_POST['standar17']) && is_numeric($_POST['standar17']) ? $_POST['standar17'] : 0;
$standar18 = isset($_POST['standar18']) && is_numeric($_POST['standar18']) ? $_POST['standar18'] : 0;
$standar19 = isset($_POST['standar19']) && is_numeric($_POST['standar19']) ? $_POST['standar19'] : 0;
$standar20 = isset($_POST['standar20']) && is_numeric($_POST['standar20']) ? $_POST['standar20'] : 0;


// koreksi naik
$koreksi1 = isset($_POST['koreksi1']) && is_numeric($_POST['koreksi1']) ? $_POST['koreksi1'] : 0;
$koreksi2 = isset($_POST['koreksi2']) && is_numeric($_POST['koreksi2']) ? $_POST['koreksi2'] : 0;
$koreksi3 = isset($_POST['koreksi3']) && is_numeric($_POST['koreksi3']) ? $_POST['koreksi3'] : 0;
$koreksi4 = isset($_POST['koreksi4']) && is_numeric($_POST['koreksi4']) ? $_POST['koreksi4'] : 0;
$koreksi5 = isset($_POST['koreksi5']) && is_numeric($_POST['koreksi5']) ? $_POST['koreksi5'] : 0;
$koreksi6 = isset($_POST['koreksi6']) && is_numeric($_POST['koreksi6']) ? $_POST['koreksi6'] : 0;
$koreksi7 = isset($_POST['koreksi7']) && is_numeric($_POST['koreksi7']) ? $_POST['koreksi7'] : 0;
$koreksi8 = isset($_POST['koreksi8']) && is_numeric($_POST['koreksi8']) ? $_POST['koreksi8'] : 0;
$koreksi9 = isset($_POST['koreksi9']) && is_numeric($_POST['koreksi9']) ? $_POST['koreksi9'] : 0;
$koreksi10 = isset($_POST['koreksi10']) && is_numeric($_POST['koreksi10']) ? $_POST['koreksi10'] : 0;
$koreksi11 = isset($_POST['koreksi11']) && is_numeric($_POST['koreksi11']) ? $_POST['koreksi11'] : 0;
$koreksi12 = isset($_POST['koreksi12']) && is_numeric($_POST['koreksi12']) ? $_POST['koreksi12'] : 0;
$koreksi13 = isset($_POST['koreksi13']) && is_numeric($_POST['koreksi13']) ? $_POST['koreksi13'] : 0;
$koreksi14 = isset($_POST['koreksi14']) && is_numeric($_POST['koreksi14']) ? $_POST['koreksi14'] : 0;
$koreksi15 = isset($_POST['koreksi15']) && is_numeric($_POST['koreksi15']) ? $_POST['koreksi15'] : 0;
$koreksi16 = isset($_POST['koreksi16']) && is_numeric($_POST['koreksi16']) ? $_POST['koreksi16'] : 0;
$koreksi17 = isset($_POST['koreksi17']) && is_numeric($_POST['koreksi17']) ? $_POST['koreksi17'] : 0;
$koreksi18 = isset($_POST['koreksi18']) && is_numeric($_POST['koreksi18']) ? $_POST['koreksi18'] : 0;
$koreksi19 = isset($_POST['koreksi19']) && is_numeric($_POST['koreksi19']) ? $_POST['koreksi19'] : 0;
$koreksi20 = isset($_POST['koreksi20']) && is_numeric($_POST['koreksi20']) ? $_POST['koreksi20'] : 0;

// ketidakpastian
$stdv1 = isset($_POST['stdv1']) && is_numeric($_POST['stdv1']) ? $_POST['stdv1'] : 0;
$stdv2 = isset($_POST['stdv2']) && is_numeric($_POST['stdv2']) ? $_POST['stdv2'] : 0;
$stdv3 = isset($_POST['stdv3']) && is_numeric($_POST['stdv3']) ? $_POST['stdv3'] : 0;
$stdv4 = isset($_POST['stdv4']) && is_numeric($_POST['stdv4']) ? $_POST['stdv4'] : 0;
$stdv5 = isset($_POST['stdv5']) && is_numeric($_POST['stdv5']) ? $_POST['stdv5'] : 0;
$stdv6 = isset($_POST['stdv6']) && is_numeric($_POST['stdv6']) ? $_POST['stdv6'] : 0;
$stdv7 = isset($_POST['stdv7']) && is_numeric($_POST['stdv7']) ? $_POST['stdv7'] : 0;
$stdv8 = isset($_POST['stdv8']) && is_numeric($_POST['stdv8']) ? $_POST['stdv8'] : 0;
$stdv9 = isset($_POST['stdv9']) && is_numeric($_POST['stdv9']) ? $_POST['stdv9'] : 0;
$stdv10 = isset($_POST['stdv10']) && is_numeric($_POST['stdv10']) ? $_POST['stdv10'] : 0;
$stdv11 = isset($_POST['stdv11']) && is_numeric($_POST['stdv11']) ? $_POST['stdv11'] : 0;
$stdv12 = isset($_POST['stdv12']) && is_numeric($_POST['stdv12']) ? $_POST['stdv12'] : 0;
$stdv13 = isset($_POST['stdv13']) && is_numeric($_POST['stdv13']) ? $_POST['stdv13'] : 0;
$stdv14 = isset($_POST['stdv14']) && is_numeric($_POST['stdv14']) ? $_POST['stdv14'] : 0;
$stdv15 = isset($_POST['stdv15']) && is_numeric($_POST['stdv15']) ? $_POST['stdv15'] : 0;
$stdv16 = isset($_POST['stdv16']) && is_numeric($_POST['stdv16']) ? $_POST['stdv16'] : 0;
$stdv17 = isset($_POST['stdv17']) && is_numeric($_POST['stdv17']) ? $_POST['stdv17'] : 0;
$stdv18 = isset($_POST['stdv18']) && is_numeric($_POST['stdv18']) ? $_POST['stdv18'] : 0;
$stdv19 = isset($_POST['stdv19']) && is_numeric($_POST['stdv19']) ? $_POST['stdv19'] : 0;
$stdv20 = isset($_POST['stdv20']) && is_numeric($_POST['stdv20']) ? $_POST['stdv20'] : 0;

$tanggal_dibuat = date('m/d/Y');

// email
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = "PT.BUMI ALAM SEGAR";
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $email3 = $_POST['email3'];
    $email4 = $_POST['email4'];

    $stmt = $conn->prepare("INSERT INTO volumetrik_handover (
    departemen, lokasi, nomor_kalibrasi, nama_alat, merk, tipe, kapasitas, resolusi, lokasi_kalibrasi, suhu_ruangan, kelembaban, range_penggunaan_alat, limits_of_permissible_error, kode_alat, tgl_kalibrasi, tgl_kalibrasi_ulang,
    titik_kalibrasi1, titik_kalibrasi2, titik_kalibrasi3, titik_kalibrasi4, titik_kalibrasi5, titik_kalibrasi6, titik_kalibrasi7, titik_kalibrasi8, titik_kalibrasi9, titik_kalibrasi10, titik_kalibrasi11, titik_kalibrasi12, titik_kalibrasi13, titik_kalibrasi14, titik_kalibrasi15, titik_kalibrasi16, titik_kalibrasi17, titik_kalibrasi18, titik_kalibrasi19, titik_kalibrasi20,
    alat_dikalibrasi1, alat_dikalibrasi2, alat_dikalibrasi3, alat_dikalibrasi4, alat_dikalibrasi5, alat_dikalibrasi6, alat_dikalibrasi7, alat_dikalibrasi8, alat_dikalibrasi9, alat_dikalibrasi10, alat_dikalibrasi11, alat_dikalibrasi12, alat_dikalibrasi13, alat_dikalibrasi14, alat_dikalibrasi15, alat_dikalibrasi16, alat_dikalibrasi17, alat_dikalibrasi18, alat_dikalibrasi19, alat_dikalibrasi20,
    alat_standar1, alat_standar2, alat_standar3, alat_standar4, alat_standar5, alat_standar6, alat_standar7, alat_standar8, alat_standar9, alat_standar10, alat_standar11, alat_standar12, alat_standar13, alat_standar14, alat_standar15, alat_standar16, alat_standar17, alat_standar18, alat_standar19, alat_standar20,
    koreksi1, koreksi2, koreksi3, koreksi4, koreksi5, koreksi6, koreksi7, koreksi8, koreksi9, koreksi10, koreksi11, koreksi12, koreksi13, koreksi14, koreksi15, koreksi16, koreksi17, koreksi18, koreksi19, koreksi20,
    ketidakpastian1, ketidakpastian2, ketidakpastian3, ketidakpastian4, ketidakpastian5, ketidakpastian6, ketidakpastian7, ketidakpastian8, ketidakpastian9, ketidakpastian10, ketidakpastian11, ketidakpastian12, ketidakpastian13, ketidakpastian14, ketidakpastian15, ketidakpastian16, ketidakpastian17, ketidakpastian18, ketidakpastian19, ketidakpastian20,
    tanggal_dibuat) 

    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("ssssssssssssssssssssssssssssssssssssdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddds",
    $dept2, $lok2, $kal2, $nam2, $mer2, $tip2, $kap2, $res2, $lok_kal2, $suh2, $kel2, $rang2, $lim2, $kode, $tanggal_kalibrasi2, $tanggal_kalibrasi_ulang2,
    $nomor2, $nomor4, $nomor6, $nomor8, $nomor10, $nomor12, $nomor14, $nomor16, $nomor18, $nomor20, $nomor22, $nomor24, $nomor26, $nomor28, $nomor30, $nomor32, $nomor34, $nomor36, $nomor38, $nomor40,
    $nan3, $nan18, $nan33, $nan48, $nan64, $nan78, $nan93, $nan108, $nan123, $nan138, $nan153, $nan168, $nan183, $nan198, $nan213, $nan228, $nan243, $nan258, $nan273, $nan288, 
    $standar1, $standar2, $standar3, $standar4, $standar5, $standar6, $standar7, $standar8, $standar9, $standar10, $standar11, $standar12, $standar13, $standar14, $standar15, $standar16, $standar17, $standar18, $standar19, $standar20, 
    $koreksi1, $koreksi2, $koreksi3, $koreksi4, $koreksi5, $koreksi6, $koreksi7, $koreksi8, $koreksi9, $koreksi10, $koreksi11, $koreksi12, $koreksi13, $koreksi14, $koreksi15, $koreksi16, $koreksi17, $koreksi18, $koreksi19, $koreksi20, 
    $stdv1, $stdv2, $stdv3, $stdv4, $stdv5, $stdv6, $stdv7, $stdv8, $stdv9, $stdv10, $stdv11, $stdv12, $stdv13, $stdv14, $stdv15, $stdv16, $stdv17, $stdv18, $stdv19, $stdv20, $tanggal_dibuat);

// Eksekusi statement
if (!$stmt->execute()) {
    die("Execute error: " . $stmt->error);
}

    require'../../components/tcpdf/tcpdf.php';
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Hapus header dan footer default
    $pdf->SetPrintHeader(false);
    $pdf->AddPage('A4');
    $pdf->SetMargins(2, -5, 5);
    $pdf->SetAutoPageBreak(FALSE, 0);
    $pdf->SetFooterMargin(0);

    $logo = '<img src="../../assets/BAS.png">';
    $header = '
    <style>
        * {
            line-height : 0.9;
        }
        .border {
            border : 1px solid black;
        }
        .bortd td {
            border : 1px solid black;
        }
        span {
            font-size : 10px;
            text_align: left;
        }
        .metode {
            font-weight : bold;
        }
        .* {
            margin : 0;
            padding : 0;
        }
        .divborder {
            border : 1px solid black;
            outline : 1px;
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
    </style>
    
    <table class="bortd" style="padding:0; margin:0; width: 100%; align-items:center;">
    <tr style="text-align: center;">
        <td class="tdlogo" style="width: 20%; height: 20px; line-height: 4px;">' . $logo . '</td>
        <td style="width: 80%; height: 20px;"><div><h3>SERTIFIKAT KALIBRASI INTERNAL MANOMETER</h3></div></td>
    </tr>
    </table>
    <table>
    <tr><td></td></tr>
        <tr>
            <td width="100px"><span>Departemen Pemilik</span></td>
            <td width="10px"><span>:</span></td>
            <td width="135px"><span>' . htmlspecialchars($dept2) . '</span></td>
            <td width="125px"><span>Range Penggunaan Alat</span></td>
            <td width="10px"><span>:</span></td>
            <td width="155px"><span>' . htmlspecialchars($rang2) . '</span></td>
            <td width="40px"></td>
        </tr>
        <tr>
            <td><span>Lokasi</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($lok2) . '</span></td>
            <td><span>Limits Of Permissible Error</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($lim2) . '</span></td>
        </tr>
        <tr>
            <td><span>Nomor Kalibrasi</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($kal2) . '</span></td>
            <td><span>Kode Alat</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($kode) . '</span></td>
        </tr>
        <tr>
            <td><span>Nama Alat</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($nam2) . '</span></td>
            <td><span>Tgl. Kalibrasi</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($tanggal_kalibrasi2) . '</span></td>
        </tr>
        <tr>
            <td><span>Merk</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($mer2) . '</span></td>
            <td><span>Tgl. Kalibrasi Ulang</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($tanggal_kalibrasi_ulang2) . '</span></td>
        </tr>
        <tr>
            <td><span>Tipe</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($tip2) . '</span></td>
            <td><span>Metode Kalibrasi</span></td>
            <td><span>:</span></td>
            <td rowspan="3"><span class="metode">Didopsi dari :  "The Expression of Uncertainty and Confidence in Measurement"</span></td>
        </tr>
        <tr>
            <td><span>Kapasitas</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($kap2) . '</span></td>
        </tr>
        <tr>
            <td><span>Resolusi</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($res2) . '</span></td>
        </tr>
        <tr>
            <td><span>Lokasi Kalibrasi</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($lok_kal2) . '</span></td>
            <td></td>
            <td></td>
            <td rowspan="3" width="190px"><span>Oleh UKAS (United Kingdom Accreditation Service) M3003, Edition 3, November 2012</span></td>
        </tr>
        <tr>
            <td><span>Suhu Ruangan</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($suh2) . '</span></td>
        </tr>
        <tr>
            <td><span>Kelembaban</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($kel2) . '</span></td>
        </tr>
    </table>';
    $pdf->SetY($pdf->GetY() - 6);
    $pdf->writeHTML($header, true, false, true, false, '');
    
    $pdfContent = $pdf->Output('', 'S'); 
    
    $stmt1 = $conn->prepare("INSERT INTO pressure_form (keterangan, pdf) VALUES (?, ?)");
    $stmt1->bind_param("sb", $kode, $pdfContent);
    
    $stmt1->send_long_data(1, $pdfContent);
    if ($stmt1->execute()) {
        echo "PDF berhasil disimpan ke database.";
    } else {
        echo "Error: " . $stmt1->error;
    }

    if ($stmt->execute()) {
        $last_id = mysqli_insert_id($conn);  // ID yang terakhir dimasukkan
        $padded_id = str_pad($last_id, 12, '0', STR_PAD_LEFT);

        $content1 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/volumetrik/log-in-app1.php?id= '.$last_id.'">Click Here</a>';
        $content2 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/volumetrik/log-in-app2.php?id= '.$last_id.'">Click Here</a>';
        $content3 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/volumetrik/log-in-app3.php?id= '.$last_id.'">Click Here</a>';
        $content4 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/volumetrik/log-in-app4.php?id= '.$last_id.'">Click Here</a>';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'wexsurf070@gmail.com';
            $mail->Password   = 'bysr wpqr sxkx hmls';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('wexsurf070@gmail.com', $name);

            // Kirim email 1
            $mail->clearAddresses();
            $mail->addAddress($email1);
            $mail->isHTML(true);
            $mail->Subject = 'Volumetrik-Form Approval request(Foreman Kalibrasi)';
            $mail->Body    = $content1;
            $mail->send();

            // Kirim email 2
            $mail->clearAddresses();
            $mail->addAddress($email2);
            $mail->Subject = 'Volumetrik-Form Approval request(Supervisor)';
            $mail->Body    = $content2;
            $mail->send();

            // Kirim email 3
            $mail->clearAddresses();
            $mail->addAddress($email3);
            $mail->Subject = 'Volumetrik-Form Approval request(Manager Enginnering)';
            $mail->Body    = $content3;
            $mail->send();

            // Kirim email 4
            $mail->clearAddresses();
            $mail->addAddress($email4);
            $mail->Subject = 'Volumetrik-Form Approval request(User)';
            $mail->Body    = $content4;
            $mail->send();

            header('Location:../../pages/kalibrasi/8-volumetrik/form.php?Berhasil');
        } catch (Exception $e) {
            header('Location:../../pages/kalibrasi/8-volumetrik/form.php?Beberapa Berhasil');
        }
    } else {
            header('Location:../../pages/kalibrasi/8-volumetrik/form.php?Kesalahan Menyimpan');
    }

    $stmt->close();
    $conn->close();
}
?>