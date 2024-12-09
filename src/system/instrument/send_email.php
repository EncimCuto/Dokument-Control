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

// titikKalibrasi
$titikKalibrasi1  = isset($_POST['titikKalibrasi1']) && is_numeric($_POST['titikKalibrasi1']) ? $_POST['titikKalibrasi1'] : 0;
$titikKalibrasi2  = isset($_POST['titikKalibrasi2']) && is_numeric($_POST['titikKalibrasi2']) ? $_POST['titikKalibrasi2'] : 0;
$titikKalibrasi3  = isset($_POST['titikKalibrasi3']) && is_numeric($_POST['titikKalibrasi3']) ? $_POST['titikKalibrasi3'] : 0;
$titikKalibrasi4  = isset($_POST['titikKalibrasi4']) && is_numeric($_POST['titikKalibrasi4']) ? $_POST['titikKalibrasi4'] : 0;
$titikKalibrasi5  = isset($_POST['titikKalibrasi5']) && is_numeric($_POST['titikKalibrasi5']) ? $_POST['titikKalibrasi5'] : 0;

// average
$avgPembacaan1  = isset($_POST['avgPembacaan1']) && is_numeric($_POST['avgPembacaan1']) ? $_POST['avgPembacaan1'] : 0;
$avgPembacaan2  = isset($_POST['avgPembacaan2']) && is_numeric($_POST['avgPembacaan2']) ? $_POST['avgPembacaan2'] : 0;
$avgPembacaan3  = isset($_POST['avgPembacaan3']) && is_numeric($_POST['avgPembacaan3']) ? $_POST['avgPembacaan3'] : 0;
$avgPembacaan4  = isset($_POST['avgPembacaan4']) && is_numeric($_POST['avgPembacaan4']) ? $_POST['avgPembacaan4'] : 0;
$avgPembacaan5  = isset($_POST['avgPembacaan5']) && is_numeric($_POST['avgPembacaan5']) ? $_POST['avgPembacaan5'] : 0;

// Master
$valueMaster1  = isset($_POST['valueMaster1']) && is_numeric($_POST['valueMaster1']) ? $_POST['valueMaster1'] : 0;
$valueMaster2  = isset($_POST['valueMaster2']) && is_numeric($_POST['valueMaster2']) ? $_POST['valueMaster2'] : 0;
$valueMaster3  = isset($_POST['valueMaster3']) && is_numeric($_POST['valueMaster3']) ? $_POST['valueMaster3'] : 0;
$valueMaster4  = isset($_POST['valueMaster4']) && is_numeric($_POST['valueMaster4']) ? $_POST['valueMaster4'] : 0;
$valueMaster5  = isset($_POST['valueMaster5']) && is_numeric($_POST['valueMaster5']) ? $_POST['valueMaster5'] : 0;

// koreksi
$correction1  = isset($_POST['correction1']) && is_numeric($_POST['correction1']) ? $_POST['correction1'] : 0;
$correction2  = isset($_POST['correction2']) && is_numeric($_POST['correction2']) ? $_POST['correction2'] : 0;
$correction3  = isset($_POST['correction3']) && is_numeric($_POST['correction3']) ? $_POST['correction3'] : 0;
$correction4  = isset($_POST['correction4']) && is_numeric($_POST['correction4']) ? $_POST['correction4'] : 0;
$correction5  = isset($_POST['correction5']) && is_numeric($_POST['correction5']) ? $_POST['correction5'] : 0;

// ketidakpastian
$ketidakpastian1 = isset($_POST['ketidakpastian1']) && is_numeric($_POST['ketidakpastian1']) ? $_POST['ketidakpastian1'] : 0;

$tanggal_dibuat = date('m/d/Y');

// email
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = "PT.BUMI ALAM SEGAR";
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $email3 = $_POST['email3'];
    $email4 = $_POST['email4'];
    
    $stmt = $conn->prepare("INSERT INTO instrument_handover (
    departemen, lokasi, nomor_kalibrasi, nama_alat, merk, tipe, kapasitas, resolusi, lokasi_kalibrasi, suhu_ruangan, kelembaban, range_penggunaan_alat, limits_of_permissible_error, kode_alat, tgl_kalibrasi, tgl_kalibrasi_ulang, 
    titik_kalibrasi1, titik_kalibrasi2, titik_kalibrasi3, titik_kalibrasi4, titik_kalibrasi5,
    alat_dikalibrasi1, alat_dikalibrasi2, alat_dikalibrasi3, alat_dikalibrasi4, alat_dikalibrasi5,
    alat_standar1, alat_standar2, alat_standar3, alat_standar4, alat_standar5,
    koreksi1, koreksi2, koreksi3, koreksi4, koreksi5, tanggal_dibuat) 
   
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssssssssssdddddddddddddddddddds",
    $dept2, $lok2, $kal2, $nam2, $mer2, $tip2, $kap2, $res2, $lok_kal2, $suh2, $kel2, $rang2, $lim2, $kode, $tanggal_kalibrasi2, $tanggal_kalibrasi_ulang2,
    $titikKalibrasi1, $titikKalibrasi2, $titikKalibrasi3, $titikKalibrasi4, $titikKalibrasi5,
    $avgPembacaan1, $avgPembacaan2, $avgPembacaan3, $avgPembacaan4, $avgPembacaan5,
    $valueMaster1, $valueMaster2, $valueMaster3, $valueMaster4, $valueMaster5,
    $correction1, $correction2, $correction3, $correction4, $correction5, $tanggal_dibuat);

if ($stmt->execute()) {
    $last_id = mysqli_insert_id($conn);
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
        <tr>
            <td></td>
        </tr>
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

        $content1 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/instrument/log-in-app1.php?id= '.$last_id.'">Click Here</a>';
        $content2 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/instrument/log-in-app2.php?id= '.$last_id.'">Click Here</a>';
        $content3 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/instrument/log-in-app3.php?id= '.$last_id.'">Click Here</a>';
        $content4 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/instrument/log-in-app4.php?id= '.$last_id.'">Click Here</a>';

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
            $mail->Subject = 'Instrument-Form Approval request(Foreman Kalibrasi)';
            $mail->Body    = $content1;
            $mail->send();

            // Kirim email 2
            $mail->clearAddresses();
            $mail->addAddress($email2);
            $mail->Subject = 'Instrument-Form Approval request(Supervisor)';
            $mail->Body    = $content2;
            $mail->send();

            // Kirim email 3
            $mail->clearAddresses();
            $mail->addAddress($email3);
            $mail->Subject = 'Instrument-Form Approval request(Manager Enginnering)';
            $mail->Body    = $content3;
            $mail->send();

            // Kirim email 4
            $mail->clearAddresses();
            $mail->addAddress($email4);
            $mail->Subject = 'Instrument-Form Approval request(User)';
            $mail->Body    = $content4;
            $mail->send();

            header('Location:../../pages/kalibrasi/4-instrument/form.php?Berhasil');
        } catch (Exception $e) {
            header('Location:../../pages/kalibrasi/4-instrument/form.php?Beberapa Berhasil');
        }
    } else {
            header('Location:../../pages/kalibrasi/4-instrument/form.php?Kesalahan Menyimpan');
    }

    $stmt->close();
    $conn->close();
}
?>