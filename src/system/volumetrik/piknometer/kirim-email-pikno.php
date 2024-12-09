<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require'../../../components/vendor/autoload.php';
include'../../../config/config2.php';

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
$nan1  = isset($_POST['nan1']) && is_numeric($_POST['nan1']) ? $_POST['nan1'] : 0;
$nan3  = isset($_POST['nan3']) && is_numeric($_POST['nan3']) ? $_POST['nan3'] : 0;
$average1  = isset($_POST['average1']) && is_numeric($_POST['average1']) ? $_POST['average1'] : 0;
$average2  = isset($_POST['average2']) && is_numeric($_POST['average2']) ? $_POST['average2'] : 0;
$ketidakpastian  = isset($_POST['ketidakpastian']) && is_numeric($_POST['ketidakpastian']) ? $_POST['ketidakpastian'] : 0;

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
    titik_kalibrasi1, alat_dikalibrasi1, alat_standar1, koreksi1, ketidakpastian1, tanggal_dibuat) 

    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("sssssssssssssssssdddds",
    $dept2, $lok2, $kal2, $nam2, $mer2, $tip2, $kap2, $res2, $lok_kal2, $suh2, $kel2, $rang2, $lim2, $kode, $tanggal_kalibrasi2, $tanggal_kalibrasi_ulang2,
    $nan1, $nan3, $average1, $average2, $ketidakpastian, $tanggal_dibuat);

// Eksekusi statement
if (!$stmt->execute()) {
    die("Execute error: " . $stmt->error);
}

    require'../../../components/tcpdf/tcpdf.php';
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Hapus header dan footer default
    $pdf->SetPrintHeader(false);
    $pdf->AddPage('A4');
    $pdf->SetMargins(2, -5, 5);
    $pdf->SetAutoPageBreak(FALSE, 0);
    $pdf->SetFooterMargin(0);

    $logo = '<img src="../../../assets/BAS.png">';
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
            $mail->Subject = 'Volumetrik(Piknometer)-Form Approval request(Foreman Kalibrasi)';
            $mail->Body    = $content1;
            $mail->send();

            // Kirim email 2
            $mail->clearAddresses();
            $mail->addAddress($email2);
            $mail->Subject = 'Volumetrik(Piknometer)-Form Approval request(Supervisor)';
            $mail->Body    = $content2;
            $mail->send();

            // Kirim email 3
            $mail->clearAddresses();
            $mail->addAddress($email3);
            $mail->Subject = 'Volumetrik(Piknometer)-Form Approval request(Manager Enginnering)';
            $mail->Body    = $content3;
            $mail->send();

            // Kirim email 4
            $mail->clearAddresses();
            $mail->addAddress($email4);
            $mail->Subject = 'Volumetrik(Piknometer)-Form Approval request(User)';
            $mail->Body    = $content4;
            $mail->send();

            header('Location:../../../pages/kalibrasi/8-volumetrik/form-pikno.php?Berhasil');
        } catch (Exception $e) {
            header('Location:../../../pages/kalibrasi/8-volumetrik/form-pikno.php?Beberapa Berhasil');
        }
    } else {
            header('Location:../../../pages/kalibrasi/8-volumetrik/form-pikno.php?Kesalahan Menyimpan');
    }

    $stmt->close();
    $conn->close();
}
?>