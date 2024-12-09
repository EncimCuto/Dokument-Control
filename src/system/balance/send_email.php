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


$mendekati_titik_nol = isset($_POST['mendekati_titik_nol']) ? $_POST['mendekati_titik_nol'] : 0;
$setengah_kapasitas_max = isset($_POST['setengah_kapasitas_max']) ? $_POST['setengah_kapasitas_max'] : 0;
$kapasitas_max = isset($_POST['kapasitas_max']) ? $_POST['kapasitas_max'] : 0;

$standarD1 = isset($_POST['standarD1']) ? $_POST['standarD1'] : 0;
$standarD2 = isset($_POST['standarD2']) ? $_POST['standarD2'] : 0;
$standarD3 = isset($_POST['standarD3']) ? $_POST['standarD3'] : 0;
$average1 = isset($_POST['average1']) ? $_POST['average1'] : 0;
$average2 = isset($_POST['average2']) ? $_POST['average2'] : 0;
$average3 = isset($_POST['average3']) ? $_POST['average3'] : 0;

$nominal1 = isset($_POST['nominal1']) ? $_POST['nominal1'] : 0;
$nominal2 = isset($_POST['nominal2']) ? $_POST['nominal2'] : 0;
$nominal3 = isset($_POST['nominal3']) ? $_POST['nominal3'] : 0;
$nominal4 = isset($_POST['nominal4']) ? $_POST['nominal4'] : 0;
$nominal5 = isset($_POST['nominal5']) ? $_POST['nominal5'] : 0;
$nominal6 = isset($_POST['nominal6']) ? $_POST['nominal6'] : 0;
$nominal7 = isset($_POST['nominal7']) ? $_POST['nominal7'] : 0;
$nominal8 = isset($_POST['nominal8']) ? $_POST['nominal8'] : 0;
$nominal9 = isset($_POST['nominal9']) ? $_POST['nominal9'] : 0;

$koreksi1  = isset($_POST['koreksi1']) ? $_POST['koreksi1'] : 0;
$koreksi2  = isset($_POST['koreksi2']) ? $_POST['koreksi2'] : 0;
$koreksi3  = isset($_POST['koreksi3']) ? $_POST['koreksi3'] : 0;
$koreksi4  = isset($_POST['koreksi4']) ? $_POST['koreksi4'] : 0;
$koreksi5  = isset($_POST['koreksi5']) ? $_POST['koreksi5'] : 0;
$koreksi6  = isset($_POST['koreksi6']) ? $_POST['koreksi6'] : 0;
$koreksi7  = isset($_POST['koreksi7']) ? $_POST['koreksi7'] : 0;
$koreksi8  = isset($_POST['koreksi8']) ? $_POST['koreksi8'] : 0;
$koreksi9  = isset($_POST['koreksi9']) ? $_POST['koreksi9'] : 0;

$tengah  = isset($_POST['tengah']) ? $_POST['tengah'] : 0;
$depan  = isset($_POST['depan']) ? $_POST['depan'] : 0;
$belakang  = isset($_POST['belakang']) ? $_POST['belakang'] : 0;
$kiri  = isset($_POST['kiri']) ? $_POST['kiri'] : 0;
$kanan = isset($_POST['kanan']) ? $_POST['kanan'] : 0;
$max   = isset($_POST['max']) ? $_POST['max'] : 0;

$nol  = isset($_POST['nol']) ? $_POST['nol'] : 0;
$maximum = isset($_POST['maximum']) ? $_POST['maximum'] : 0;
$beban     = isset($_POST['beban']) ? $_POST['beban'] : 0;
$histerisis  = isset($_POST['histerisis']) ? $_POST['histerisis'] : 0;
$perbedaan  = isset($_POST['perbedaan']) ? $_POST['perbedaan'] : 0;

$pinggan  = isset($_POST['pinggan']) ? $_POST['pinggan'] : 0;
$massa  = isset($_POST['massa']) ? $_POST['massa'] : 0;

// email
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = "PT.BUMI ALAM SEGAR";
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $email3 = $_POST['email3'];
    $email4 = $_POST['email4'];
    
    $stmt = $conn->prepare("INSERT INTO balance_handover (
    departemen, lokasi, nomor_kalibrasi, nama_alat, merk, tipe, kapasitas, resolusi, lokasi_kalibrasi, suhu_ruangan, kelembaban, range_penggunaan_alat, limits_of_permissible_error, kode_alat, tgl_kalibrasi, tgl_kalibrasi_ulang, 
    pembacaan_skala1, pembacaan_skala2, pembacaan_skala3, standar_deviasi1, standar_deviasi2, standar_deviasi3, maximum_perbedaan1, maximum_perbedaan2, maximum_perbedaan3,
    skala_g1, skala_g2, skala_g3, skala_g4, skala_g5, skala_g6, skala_g7, skala_g8, skala_g9, koreksi1, koreksi2, koreksi3, koreksi4, koreksi5, koreksi6, koreksi7, koreksi8, koreksi9,
    tengah, depan, belakang, kiri, kanan, perbedaan_maximum, nol, maximum, beban, histerisis, ketidakpastian, pinggan, massa) 

    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    
    $stmt->bind_param("ssssssssssssssssdddddddddddddddddddddddddddddddddddddddd",
    $dept2, $lok2, $kal2, $nam2, $mer2, $tip2, $kap2, $res2, $lok_kal2, $suh2, $kel2, $rang2, $lim2, $kode, $tanggal_kalibrasi2, $tanggal_kalibrasi_ulang2,
    $mendekati_titik_nol, $setengah_kapasitas_max, $kapasitas_max, $standarD1, $standarD2, $standarD3, $average1, $average2, $average3, 
    $nominal1, $nominal2, $nominal3, $nominal4, $nominal5, $nominal6, $nominal7, $nominal8, $nominal9, $koreksi1, $koreksi2, $koreksi3, $koreksi4, $koreksi5, $koreksi6, $koreksi7, $koreksi8, $koreksi9, 
    $tengah, $depan, $belakang, $kiri, $kanan, $max,  $nol, $maximum, $beban, $histerisis, $perbedaan, $pinggan, $massa);


    if ($stmt->execute()) {
        $last_id = mysqli_insert_id($conn);
        
    // require'../../components/tcpdf/tcpdf.php';
    // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // // Hapus header dan footer default
    // $pdf->SetPrintHeader(false);
    // $pdf->AddPage('A4');
    // $pdf->SetMargins(2, -5, 5);
    // $pdf->SetAutoPageBreak(FALSE, 0);
    // $pdf->SetFooterMargin(0);

    // $logo = '<img src="../../assets/BAS.png">';
    // $header = '
    // <style>
    // //    * {
    //         line-height : 0.9;
    //     }
    //     .border {
    //         border : 1px solid black;
    //     }
    //     .bortd td {
    //         border : 1px solid black;
    //     }
    //     span {
    //         font-size : 10px;
    //         text_align: left;
    //     }
    //     .metode {
    //         font-weight : bold;
    //     }
    //     .* {
    //         margin : 0;
    //         padding : 0;
    //     }
    //     .divborder {
    //         border : 1px solid black;
    //         outline : 1px;
    //     }
    //     .thbel {
    //         text-align: center;
    //         font-size: 9px;
    //         font-weight: bold;
    //     }
    //     .tdbel {
    //         font-size: 9px;
    //     }
    //     .baca {
    //         font-size: 8px;
    //     }
    // </style>
    
    // <table class="bortd" style="padding:0; margin:0; width: 100%; align-items:center;">
    // <tr style="text-align: center;">
    //     <td class="tdlogo" style="width: 20%; height: 20px; line-height: 4px;">' . $logo . '</td>
    //     <td style="width: 80%; height: 20px;"><div><h3>SERTIFIKAT KALIBRASI INTERNAL MANOMETER</h3></div></td>
    // </tr>
    // </table>
    // <table>
    // <tr><td></td></tr>
    //     <tr>
    //         <td width="100px"><span>Departemen Pemilik</span></td>
    //         <td width="10px"><span>:</span></td>
    //         <td width="135px"><span>' . htmlspecialchars($dept2) . '</span></td>
    //         <td width="125px"><span>Range Penggunaan Alat</span></td>
    //         <td width="10px"><span>:</span></td>
    //         <td width="155px"><span>' . htmlspecialchars($rang2) . '</span></td>
    //         <td width="40px"></td>
    //     </tr>
    //     <tr>
    //         <td><span>Lokasi</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($lok2) . '</span></td>
    //         <td><span>Limits Of Permissible Error</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($lim2) . '</span></td>
    //     </tr>
    //     <tr>
    //         <td><span>Nomor Kalibrasi</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($kal2) . '</span></td>
    //         <td><span>Kode Alat</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($kode) . '</span></td>
    //     </tr>
    //     <tr>
    //         <td><span>Nama Alat</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($nam2) . '</span></td>
    //         <td><span>Tgl. Kalibrasi</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($tanggal_kalibrasi2) . '</span></td>
    //     </tr>
    //     <tr>
    //         <td><span>Merk</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($mer2) . '</span></td>
    //         <td><span>Tgl. Kalibrasi Ulang</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($tanggal_kalibrasi_ulang2) . '</span></td>
    //     </tr>
    //     <tr>
    //         <td><span>Tipe</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($tip2) . '</span></td>
    //         <td><span>Metode Kalibrasi</span></td>
    //         <td><span>:</span></td>
    //         <td rowspan="3"><span class="metode">Didopsi dari :  "The Expression of Uncertainty and Confidence in Measurement"</span></td>
    //     </tr>
    //     <tr>
    //         <td><span>Kapasitas</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($kap2) . '</span></td>
    //     </tr>
    //     <tr>
    //         <td><span>Resolusi</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($res2) . '</span></td>
    //     </tr>
    //     <tr>
    //         <td><span>Lokasi Kalibrasi</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($lok_kal2) . '</span></td>
    //         <td></td>
    //         <td></td>
    //         <td rowspan="3" width="190px"><span>Oleh UKAS (United Kingdom Accreditation Service) M3003, Edition 3, November 2012</span></td>
    //     </tr>
    //     <tr>
    //         <td><span>Suhu Ruangan</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($suh2) . '</span></td>
    //     </tr>
    //     <tr>
    //         <td><span>Kelembaban</span></td>
    //         <td><span>:</span></td>
    //         <td><span>' . htmlspecialchars($kel2) . '</span></td>
    //     </tr>
    // </table>';
    // $pdf->SetY($pdf->GetY() - 6);
    // $pdf->writeHTML($header, true, false, true, false, '');
    
    // $pdfContent = $pdf->Output('', 'S'); 
    
    // $stmt1 = $conn->prepare("INSERT INTO balance_form (keterangan, pdf) VALUES (?, ?)");
    // $stmt1->bind_param("sb", $kode, $pdfContent);
    
    // $stmt1->send_long_data(1, $pdfContent);
    // if ($stmt1->execute()) {
    //     echo "PDF berhasil disimpan ke database.";
    // } else {
    //     echo "Error: " . $stmt1->error;
    // }

        $content1 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/balance/log-in-app1.php?id= '.$last_id.'">Click Here</a>';
        $content2 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/balance/log-in-app2.php?id= '.$last_id.'">Click Here</a>';
        $content3 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/balance/log-in-app3.php?id= '.$last_id.'">Click Here</a>';
        $content4 = 'Link : <a href="http://10.11.11.176/dokumentcontrol/approvement/balance/log-in-app4.php?id= '.$last_id.'">Click Here</a>';

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
            $mail->Subject = 'balance-Form Approval request(Foreman Kalibrasi)';
            $mail->Body    = $content1;
            $mail->send();

            // Kirim email 2
            $mail->clearAddresses();
            $mail->addAddress($email2);
            $mail->Subject = 'balance-Form Approval request(Supervisor)';
            $mail->Body    = $content2;
            $mail->send();

            // Kirim email 3
            $mail->clearAddresses();
            $mail->addAddress($email3);
            $mail->Subject = 'balance-Form Approval request(Manager Enginnering)';
            $mail->Body    = $content3;
            $mail->send();

            // Kirim email 4
            $mail->clearAddresses();
            $mail->addAddress($email4);
            $mail->Subject = 'balance-Form Approval request(User)';
            $mail->Body    = $content4;
            $mail->send();

            header('Location:../../pages/kalibrasi/1-balance/form.php?Berhasil');
        } catch (Exception $e) {
            header('Location:../../pages/kalibrasi/1-balance/form.php?Beberapa Berhasil');
        }
    } else {
            header('Location:../../pages/kalibrasi/1-balance/form.php?Kesalahan Menyimpan');
    }

    $stmt->close();
    $conn->close();
}
?>