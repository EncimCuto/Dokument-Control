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
$nan1   = isset($_POST['nan1']) && is_numeric($_POST['nan1']) ? $_POST['nan1'] : 0;
$nan21  = isset($_POST['nan21']) && is_numeric($_POST['nan21']) ? $_POST['nan21'] : 0;
$nan41  = isset($_POST['nan41']) && is_numeric($_POST['nan41']) ? $_POST['nan41'] : 0;
$nan61  = isset($_POST['nan61']) && is_numeric($_POST['nan61']) ? $_POST['nan61'] : 0;
$nan81  = isset($_POST['nan81']) && is_numeric($_POST['nan81']) ? $_POST['nan81'] : 0;
$nan101 = isset($_POST['nan101']) && is_numeric($_POST['nan101']) ? $_POST['nan101'] : 0;
$nan121 = isset($_POST['nan121']) && is_numeric($_POST['nan121']) ? $_POST['nan121'] : 0;
$nan141 = isset($_POST['nan141']) && is_numeric($_POST['nan141']) ? $_POST['nan141'] : 0;
$nan161 = isset($_POST['nan161']) && is_numeric($_POST['nan161']) ? $_POST['nan161'] : 0;
$nan181 = isset($_POST['nan181']) && is_numeric($_POST['nan181']) ? $_POST['nan181'] : 0;
$nan201 = isset($_POST['nan201']) && is_numeric($_POST['nan201']) ? $_POST['nan201'] : 0;
$nan221 = isset($_POST['nan221']) && is_numeric($_POST['nan221']) ? $_POST['nan221'] : 0;
$nan241 = isset($_POST['nan241']) && is_numeric($_POST['nan241']) ? $_POST['nan241'] : 0;
$nan261 = isset($_POST['nan261']) && is_numeric($_POST['nan261']) ? $_POST['nan261'] : 0;
$nan281 = isset($_POST['nan281']) && is_numeric($_POST['nan281']) ? $_POST['nan281'] : 0;

$inline1 = isset($_POST['inline1']);
$inline2 = isset($_POST['inline2']);
$inline3 = isset($_POST['inline3']);
$inline4 = isset($_POST['inline4']);
$inline5 = isset($_POST['inline5']);
$inline6 = isset($_POST['inline6']);
$inline7 = isset($_POST['inline7']);
$inline8 = isset($_POST['inline8']);
$inline9 = isset($_POST['inline9']);
$inline10 = isset($_POST['inline10']);
$inline11 = isset($_POST['inline11']);
$inline12 = isset($_POST['inline12']);
$inline13 = isset($_POST['inline13']);
$inline14 = isset($_POST['inline14']);
$inline15 = isset($_POST['inline15']);

// alat naik
$nan17  = isset($_POST['nan17']) && is_numeric($_POST['nan17']) ? $_POST['nan17'] : 0;
$nan37  = isset($_POST['nan37']) && is_numeric($_POST['nan37']) ? $_POST['nan37'] : 0;
$nan57  = isset($_POST['nan57']) && is_numeric($_POST['nan57']) ? $_POST['nan57'] : 0;
$nan77  = isset($_POST['nan77']) && is_numeric($_POST['nan77']) ? $_POST['nan77'] : 0;
$nan97  = isset($_POST['nan97']) && is_numeric($_POST['nan97']) ? $_POST['nan97'] : 0;
$nan117 = isset($_POST['nan117']) && is_numeric($_POST['nan117']) ? $_POST['nan117'] : 0;
$nan137 = isset($_POST['nan137']) && is_numeric($_POST['nan137']) ? $_POST['nan137'] : 0;
$nan157 = isset($_POST['nan157']) && is_numeric($_POST['nan157']) ? $_POST['nan157'] : 0;
$nan177 = isset($_POST['nan177']) && is_numeric($_POST['nan177']) ? $_POST['nan177'] : 0;
$nan197 = isset($_POST['nan197']) && is_numeric($_POST['nan197']) ? $_POST['nan197'] : 0;
$nan217 = isset($_POST['nan217']) && is_numeric($_POST['nan217']) ? $_POST['nan217'] : 0;
$nan237 = isset($_POST['nan237']) && is_numeric($_POST['nan237']) ? $_POST['nan237'] : 0;
$nan257 = isset($_POST['nan257']) && is_numeric($_POST['nan257']) ? $_POST['nan257'] : 0;
$nan277 = isset($_POST['nan277']) && is_numeric($_POST['nan277']) ? $_POST['nan277'] : 0;
$nan297 = isset($_POST['nan297']) && is_numeric($_POST['nan297']) ? $_POST['nan297'] : 0;

// standar naik
$nan18  = isset($_POST['nan18']) && is_numeric($_POST['nan18']) ? $_POST['nan18'] : 0;
$nan38  = isset($_POST['nan38']) && is_numeric($_POST['nan38']) ? $_POST['nan38'] : 0;
$nan58  = isset($_POST['nan58']) && is_numeric($_POST['nan58']) ? $_POST['nan58'] : 0;
$nan78  = isset($_POST['nan78']) && is_numeric($_POST['nan78']) ? $_POST['nan78'] : 0;
$nan98  = isset($_POST['nan98']) && is_numeric($_POST['nan98']) ? $_POST['nan98'] : 0;
$nan118 = isset($_POST['nan118']) && is_numeric($_POST['nan118']) ? $_POST['nan118'] : 0;
$nan138 = isset($_POST['nan138']) && is_numeric($_POST['nan138']) ? $_POST['nan138'] : 0;
$nan158 = isset($_POST['nan158']) && is_numeric($_POST['nan158']) ? $_POST['nan158'] : 0;
$nan178 = isset($_POST['nan178']) && is_numeric($_POST['nan178']) ? $_POST['nan178'] : 0;
$nan198 = isset($_POST['nan198']) && is_numeric($_POST['nan198']) ? $_POST['nan198'] : 0;
$nan218 = isset($_POST['nan218']) && is_numeric($_POST['nan218']) ? $_POST['nan218'] : 0;
$nan238 = isset($_POST['nan238']) && is_numeric($_POST['nan238']) ? $_POST['nan238'] : 0;
$nan258 = isset($_POST['nan258']) && is_numeric($_POST['nan258']) ? $_POST['nan258'] : 0;
$nan278 = isset($_POST['nan278']) && is_numeric($_POST['nan278']) ? $_POST['nan278'] : 0;
$nan298 = isset($_POST['nan298']) && is_numeric($_POST['nan298']) ? $_POST['nan298'] : 0;

// koreksi naik
$nan19  = isset($_POST['nan19']) && is_numeric($_POST['nan19']) ? $_POST['nan19'] : 0;
$nan39  = isset($_POST['nan39']) && is_numeric($_POST['nan39']) ? $_POST['nan39'] : 0;
$nan59  = isset($_POST['nan59']) && is_numeric($_POST['nan59']) ? $_POST['nan59'] : 0;
$nan79  = isset($_POST['nan79']) && is_numeric($_POST['nan79']) ? $_POST['nan79'] : 0;
$nan99  = isset($_POST['nan99']) && is_numeric($_POST['nan99']) ? $_POST['nan99'] : 0;
$nan119 = isset($_POST['nan119']) && is_numeric($_POST['nan119']) ? $_POST['nan119'] : 0;
$nan139 = isset($_POST['nan139']) && is_numeric($_POST['nan139']) ? $_POST['nan139'] : 0;
$nan159 = isset($_POST['nan159']) && is_numeric($_POST['nan159']) ? $_POST['nan159'] : 0;
$nan179 = isset($_POST['nan179']) && is_numeric($_POST['nan179']) ? $_POST['nan179'] : 0;
$nan199 = isset($_POST['nan199']) && is_numeric($_POST['nan199']) ? $_POST['nan199'] : 0;
$nan219 = isset($_POST['nan219']) && is_numeric($_POST['nan219']) ? $_POST['nan219'] : 0;
$nan239 = isset($_POST['nan239']) && is_numeric($_POST['nan239']) ? $_POST['nan239'] : 0;
$nan259 = isset($_POST['nan259']) && is_numeric($_POST['nan259']) ? $_POST['nan259'] : 0;
$nan279 = isset($_POST['nan279']) && is_numeric($_POST['nan279']) ? $_POST['nan279'] : 0;
$nan299 = isset($_POST['nan299']) && is_numeric($_POST['nan299']) ? $_POST['nan299'] : 0;

// alat turun
$bac17  = isset($_POST['bac17']) && is_numeric($_POST['bac17']) ? $_POST['bac17'] : 0;
$bac37  = isset($_POST['bac37']) && is_numeric($_POST['bac37']) ? $_POST['bac37'] : 0;
$bac57  = isset($_POST['bac57']) && is_numeric($_POST['bac57']) ? $_POST['bac57'] : 0;
$bac77  = isset($_POST['bac77']) && is_numeric($_POST['bac77']) ? $_POST['bac77'] : 0;
$bac97  = isset($_POST['bac97']) && is_numeric($_POST['bac97']) ? $_POST['bac97'] : 0;
$bac117 = isset($_POST['bac117']) && is_numeric($_POST['bac117']) ? $_POST['bac117'] : 0;
$bac137 = isset($_POST['bac137']) && is_numeric($_POST['bac137']) ? $_POST['bac137'] : 0;
$bac157 = isset($_POST['bac157']) && is_numeric($_POST['bac157']) ? $_POST['bac157'] : 0;
$bac177 = isset($_POST['bac177']) && is_numeric($_POST['bac177']) ? $_POST['bac177'] : 0;
$bac197 = isset($_POST['bac197']) && is_numeric($_POST['bac197']) ? $_POST['bac197'] : 0;
$bac217 = isset($_POST['bac217']) && is_numeric($_POST['bac217']) ? $_POST['bac217'] : 0;
$bac237 = isset($_POST['bac237']) && is_numeric($_POST['bac237']) ? $_POST['bac237'] : 0;
$bac257 = isset($_POST['bac257']) && is_numeric($_POST['bac257']) ? $_POST['bac257'] : 0;
$bac277 = isset($_POST['bac277']) && is_numeric($_POST['bac277']) ? $_POST['bac277'] : 0;
$bac297 = isset($_POST['bac297']) && is_numeric($_POST['bac297']) ? $_POST['bac297'] : 0;

// standar turun
$bac18  = isset($_POST['bac18']) && is_numeric($_POST['bac18']) ? $_POST['bac18'] : 0;
$bac38  = isset($_POST['bac38']) && is_numeric($_POST['bac38']) ? $_POST['bac38'] : 0;
$bac58  = isset($_POST['bac58']) && is_numeric($_POST['bac58']) ? $_POST['bac58'] : 0;
$bac78  = isset($_POST['bac78']) && is_numeric($_POST['bac78']) ? $_POST['bac78'] : 0;
$bac98  = isset($_POST['bac98']) && is_numeric($_POST['bac98']) ? $_POST['bac98'] : 0;
$bac118 = isset($_POST['bac118']) && is_numeric($_POST['bac118']) ? $_POST['bac118'] : 0;
$bac138 = isset($_POST['bac138']) && is_numeric($_POST['bac138']) ? $_POST['bac138'] : 0;
$bac158 = isset($_POST['bac158']) && is_numeric($_POST['bac158']) ? $_POST['bac158'] : 0;
$bac178 = isset($_POST['bac178']) && is_numeric($_POST['bac178']) ? $_POST['bac178'] : 0;
$bac198 = isset($_POST['bac198']) && is_numeric($_POST['bac198']) ? $_POST['bac198'] : 0;
$bac218 = isset($_POST['bac218']) && is_numeric($_POST['bac218']) ? $_POST['bac218'] : 0;
$bac238 = isset($_POST['bac238']) && is_numeric($_POST['bac238']) ? $_POST['bac238'] : 0;
$bac258 = isset($_POST['bac258']) && is_numeric($_POST['bac258']) ? $_POST['bac258'] : 0;
$bac278 = isset($_POST['bac278']) && is_numeric($_POST['bac278']) ? $_POST['bac278'] : 0;
$bac298 = isset($_POST['bac298']) && is_numeric($_POST['bac298']) ? $_POST['bac298'] : 0;

// koreksi turun
$bac19  = isset($_POST['bac19']) && is_numeric($_POST['bac19']) ? $_POST['bac19'] : 0;
$bac39  = isset($_POST['bac39']) && is_numeric($_POST['bac39']) ? $_POST['bac39'] : 0;
$bac59  = isset($_POST['bac59']) && is_numeric($_POST['bac59']) ? $_POST['bac59'] : 0;
$bac79  = isset($_POST['bac79']) && is_numeric($_POST['bac79']) ? $_POST['bac79'] : 0;
$bac99  = isset($_POST['bac99']) && is_numeric($_POST['bac99']) ? $_POST['bac99'] : 0;
$bac119 = isset($_POST['bac119']) && is_numeric($_POST['bac119']) ? $_POST['bac119'] : 0;
$bac139 = isset($_POST['bac139']) && is_numeric($_POST['bac139']) ? $_POST['bac139'] : 0;
$bac159 = isset($_POST['bac159']) && is_numeric($_POST['bac159']) ? $_POST['bac159'] : 0;
$bac179 = isset($_POST['bac179']) && is_numeric($_POST['bac179']) ? $_POST['bac179'] : 0;
$bac199 = isset($_POST['bac199']) && is_numeric($_POST['bac199']) ? $_POST['bac199'] : 0;
$bac219 = isset($_POST['bac219']) && is_numeric($_POST['bac219']) ? $_POST['bac219'] : 0;
$bac239 = isset($_POST['bac239']) && is_numeric($_POST['bac239']) ? $_POST['bac239'] : 0;
$bac259 = isset($_POST['bac259']) && is_numeric($_POST['bac259']) ? $_POST['bac259'] : 0;
$bac279 = isset($_POST['bac279']) && is_numeric($_POST['bac279']) ? $_POST['bac279'] : 0;
$bac299 = isset($_POST['bac299']) && is_numeric($_POST['bac299']) ? $_POST['bac299'] : 0;

$rh = "";

// email
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = "PT.BUMI ALAM SEGAR";
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $email3 = $_POST['email3'];
    $email4 = $_POST['email4'];
    
    $stmt = $conn->prepare("INSERT INTO temprature_handover (
    departemen, lokasi, nomor_kalibrasi, nama_alat, merk, tipe, kapasitas, resolusi, lokasi_kalibrasi, suhu_ruangan, kelembaban, range_penggunaan_alat, limits_of_permissible_error, kode_alat, tgl_kalibrasi, tgl_kalibrasi_ulang,
    titik_kalibrasi1, titik_kalibrasi2, titik_kalibrasi3, titik_kalibrasi4, titik_kalibrasi5, titik_kalibrasi6, titik_kalibrasi7, titik_kalibrasi8, titik_kalibrasi9, titik_kalibrasi10, titik_kalibrasi11, titik_kalibrasi12, titik_kalibrasi13, titik_kalibrasi14, titik_kalibrasi15, 
    posisi_bagian1, posisi_bagian2, posisi_bagian3, posisi_bagian4, posisi_bagian5, posisi_bagian6, posisi_bagian7, posisi_bagian8, posisi_bagian9, posisi_bagian10, posisi_bagian11, posisi_bagian12, posisi_bagian13, posisi_bagian14, posisi_bagian15,
    alat_suhu1, alat_suhu2, alat_suhu3, alat_suhu4, alat_suhu5, alat_suhu6, alat_suhu7, alat_suhu8, alat_suhu9, alat_suhu10, alat_suhu11, alat_suhu12, alat_suhu13, alat_suhu14, alat_suhu15,
    standar_suhuk1, standar_suhuk2, standar_suhuk3, standar_suhuk4, standar_suhuk5, standar_suhuk6, standar_suhuk7, standar_suhuk8, standar_suhuk9, standar_suhuk10, standar_suhuk11, standar_suhuk12, standar_suhuk13, standar_suhuk14, standar_suhuk15,
    koreksi_suhu1, koreksi_suhu2, koreksi_suhu3, koreksi_suhu4, koreksi_suhu5, koreksi_suhu6, koreksi_suhu7, koreksi_suhu8, koreksi_suhu9, koreksi_suhu10, koreksi_suhu11, koreksi_suhu12, koreksi_suhu13, koreksi_suhu14, koreksi_suhu15,
    ketidakpastian_suhu1, ketidakpastian_suhu2, ketidakpastian_suhu3, ketidakpastian_suhu4, ketidakpastian_suhu5, ketidakpastian_suhu6, ketidakpastian_suhu7, ketidakpastian_suhu8, ketidakpastian_suhu9, ketidakpastian_suhu10, ketidakpastian_suhu11, ketidakpastian_suhu12, ketidakpastian_suhu13, ketidakpastian_suhu14, ketidakpastian_suhu15) 
   
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd",
    $dept2, $lok2, $kal2, $nam2, $mer2, $tip2, $kap2, $res2, $lok_kal2, $suh2, $kel2, $rang2, $lim2, $kode, $tanggal_kalibrasi2, $tanggal_kalibrasi_ulang2,
    $nan1,  $nan21, $nan41, $nan61, $nan81, $nan101, $nan121, $nan141, $nan161, $nan181, $nan201, $nan221, $nan241, $nan261, $nan281, 
    $inline1,  $inline2, $inline3, $inline4, $inline5, $inline6, $inline7, $inline8, $inline9, $inline10, $inline11, $inline12, $inline13, $inline14, $inline15, 
    $nan17, $nan37, $nan57, $nan77, $nan97, $nan117, $nan137, $nan157, $nan177, $nan197, $nan217, $nan237, $nan257, $nan277, $nan297,
    $nan18, $nan38, $nan58, $nan78, $nan98, $nan118, $nan138, $nan158, $nan178, $nan198, $nan218, $nan238, $nan258, $nan278, $nan298,
    $nan19, $nan39, $nan59, $nan79, $nan99, $nan119, $nan139, $nan159, $nan179, $nan199, $nan219, $nan239, $nan259, $nan279, $nan299,
    $bac19, $bac39, $bac59, $bac79, $bac99, $bac119, $bac139, $bac159, $bac179, $bac199, $bac219, $bac239, $bac259, $bac279, $bac299);
     
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

        $content1 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/temprature/log-in-app1.php?id= '.$last_id.'">Click Here</a>';
        $content2 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/temprature/log-in-app2.php?id= '.$last_id.'">Click Here</a>';
        $content3 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/temprature/log-in-app3.php?id= '.$last_id.'">Click Here</a>';
        $content4 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/temprature/log-in-app4.php?id= '.$last_id.'">Click Here</a>';

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
            $mail->Subject = 'Temprature-Form Approval request(Foreman Kalibrasi)';
            $mail->Body    = $content1;
            $mail->send();

            // Kirim email 2
            $mail->clearAddresses();
            $mail->addAddress($email2);
            $mail->Subject = 'Temprature-Form Approval request(Supervisor)';
            $mail->Body    = $content2;
            $mail->send();

            // Kirim email 3
            $mail->clearAddresses();
            $mail->addAddress($email3);
            $mail->Subject = 'Temprature-Form Approval request(Manager Enginnering)';
            $mail->Body    = $content3;
            $mail->send();

            // Kirim email 4
            $mail->clearAddresses();
            $mail->addAddress($email4);
            $mail->Subject = 'Temprature-Form Approval request(User)';
            $mail->Body    = $content4;
            $mail->send();

            header('Location:../../pages/kalibrasi/7-temprature/form.php?Berhasil');
        } catch (Exception $e) {
            header('Location:../../pages/kalibrasi/7-temprature/form.php?Beberapa Berhasil');
        }
    } else {
            header('Location:../../pages/kalibrasi/7-temprature/form.php?Kesalahan Menyimpan');
    }

    $stmt->close();
    $conn->close();
}
?>