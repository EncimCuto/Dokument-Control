<?php
    require_once'../../../../config/config2.php';
    require_once('../../../../components/tcpdf/tcpdf.php');

$id = $_GET['id'];
$query = "SELECT * FROM balance_handover WHERE id = $id";
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
    
    // 1. kemampuan ulang pembacaan
    $pdf->Rect(12.85, 98.6, $pdf->getPageWidth() - 46, $pdf->getPageHeight() - 279.9);
    $pdf->Rect(69.3, 98.6, $pdf->getPageWidth() - 178.28, $pdf->getPageHeight() - 279.9);
    $pdf->Rect(130.99, 98.6, $pdf->getPageWidth() - 164.12, $pdf->getPageHeight() - 279.9);

    // 2. pembacaan skala
    $pdf->Rect(12.85, 135.5, $pdf->getPageWidth() - 171.2, $pdf->getPageHeight() - 245);
    $pdf->Rect(51.59, 135.5, $pdf->getPageWidth() - 180, $pdf->getPageHeight() - 245);
    

    // Variabel untuk konten header dan data
    $logo = '<img src="../../../../assets/LogoForm.png">';
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
            <td rowspan="2"><span class="metode">Didopsi dari : "The Calibration of Balance"</span></td>
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
            <td></td>
            <td></td>
            <td rowspan="5" width="190px"><span class="tdbel">Oleh David B. Prowse, CSIRO National Measurement Laboratory, 1985,
                                                dan"Assestment of Uncertainties of Measurement for Calibration and Testing
                                                Laboratories" oleh R.R Cook,NATA,2002.</span></td>
        </tr>
        <tr>
            <td><span>Lokasi Kalibrasi</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['lokasi_kalibrasi'] . '</span></td>
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
<tr><td></td></tr>
    <tr>
        <td style="text-align: center;"><span class="metode">HASIL KALIBRASI</span></td>
    </tr>
</table>


<table>
<tr><td width="178px" style="line-height: 5px;"></td></tr>
    <tr>
        <td><span class="metode" style="text-align: center;">1. Kemampuan Ulang Pembacaan</span></td>
    </tr>
</table>
<table>
<tr><td width="190px" style="line-height: 4px;"></td></tr>
</table>
<table>
<tr>
<td width="8px"></td>
    <td class="border" width="160px" height="30px" style="text-align: center; line-height: 25px;" colspan="2"><span class="thbel">BEBAN</span></td>
    <td class="border" width="90px" style="text-align: center; line-height: 20px;"><span class="thbel">PEMBACAAN SKALA</span></td>
    <td class="border" width="85px" style="text-align: center; line-height: 20px;"><span class="thbel">STANDAR DEVIASI</span></td>
    <td class="border" width="130px" style="text-align: center; line-height: 20px;"><span class="thbel">MAXIMUM PERBEDAAN DALAM PEMBACAAN</span></td>
</tr>
<tr>
    <td></td>
    <td width="140px" style="line-height: 15px;"><span class="tdbel">Mendekati Nol</span></td>
    <td width="20px" style="line-height: 15px;"><span>(g)</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . $row['pembacaan_skala1'] . '</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . $row['standar_deviasi1'] . '</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . $row['maximum_perbedaan1'] . '</span></td>
</tr>
<tr>
    <td></td>
    <td style="line-height: 15px;"><span class="tdbel">Setengah Kapasitas Maximum</span></td>
    <td style="line-height: 15px;"><span>(g)</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . $row['pembacaan_skala2'] . '</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . $row['standar_deviasi2'] . '</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . $row['maximum_perbedaan2'] . '</span></td>
</tr>
<tr>
    <td></td>
    <td style="line-height: 15px;"><span class="tdbel">Kapasitas Maximum</span></td>
    <td style="line-height: 15px;"><span>(g)</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . $row['pembacaan_skala3'] . '</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . $row['standar_deviasi3'] . '</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . $row['maximum_perbedaan3'] . '</span></td>
</tr>
</table>

<table>
<tr>
    <td width="5px"></td>
    <td  style="line-height: 10px;"></td>
</tr>
<tr>
    <td></td>
    <td width="120px"><span class="metode">2. Pembacaan Skala</span></td>
    <td width="125px"></td>
    <td><span class="metode">3. Pembacaan Skala</span></td>
</tr>
</table>
<table>
<tr><td width="8px" style="line-height: 2px;"></td></tr>
<tr>
<td width="8px"></td>
    <td class="border" width="110px" height="35px" style="text-align: center; line-height: 25px;"><span class="tdbel">PEMBACAAN SKALA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td class="border" width="85px" height="35px" style="text-align: center; line-height: 25px;"><span class="tdbel">KOREKSI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td width="50px"></td>
    <td><span class="tdbel">sebuah anak timbangan ' . $row['massa'] . 'gram diletakan pada sebuah pinggan yang diameternya ' . $row['pinggan'] . 'mm dan digerakan dengan posisi yang brevariasi pada pinggan</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center;"><br><br><span>' . $row['skala_g1'] . '</span></td>
    <td style="text-align: center;"><br><br><span>' . $row['koreksi1'] . '</span></td>
    <td></td>
    <td width="47px" class="border" rowspan="2"  style="text-align: center; line-height: 35px;"><span class="thbel">Tengah (g)</span></td>
    <td width="47px" class="border" rowspan="2"  style="text-align: center; line-height: 35px;"><span class="thbel">Depan (g)</span></td>
    <td width="47px" class="border" rowspan="2"  style="text-align: center; line-height: 35px;"><span class="thbel">Belakang (g)</span></td>
    <td width="47px" class="border" rowspan="2"  style="text-align: center; line-height: 35px;"><span class="thbel">Kiri &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td width="47px" class="border" rowspan="2"  style="text-align: center; line-height: 35px;"><span class="thbel">Kanan (g)</span></td>
    <td width="52px" class="border" rowspan="2"  style="text-align: center; line-height: 35px;"><span class="thbel">Perbedaan Maximum (g)</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . $row['skala_g2'] . '</span></td>
    <td style="text-align: center; line-height: 15px;"><span>' . $row['koreksi2'] . '</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 5px;"><span>' . $row['skala_g3'] . '</span></td> 
    <td style="text-align: center; line-height: 5px;"><span>' . $row['koreksi3'] . '</span></td>
    <td></td>
    <td class="border" style="text-align: center; line-height: 15px;"><span>' . $row['tengah'] . '</span></td>
    <td class="border" style="text-align: center; line-height: 15px;"><span>' . $row['depan'] . '</span></td>
    <td class="border" style="text-align: center; line-height: 15px;"><span>' . $row['belakang'] . '</span></td>
    <td class="border" style="text-align: center; line-height: 15px;"><span>' . $row['kiri'] . '</span></td>
    <td class="border" style="text-align: center; line-height: 15px;"><span>' . $row['kanan'] . '</span></td>
    <td class="border" style="text-align: center; line-height: 15px;"><span>' . $row['maximum'] . '</span></td> 
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 10px;"><span>' . $row['skala_g4'] . '</span></td>
    <td style="text-align: center; line-height: 10px;"><span>' . $row['koreksi4'] . '</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . $row['skala_g5'] . '</span></td>
    <td style="text-align: center; line-height: 15px;"><span>' . $row['koreksi5'] . '</span></td>
    <td></td>
    <td colspan="4"><span class="metode">4. Pengaruh Pengenolan Beban (Tare)</span></td>
    <td colspan="2"><span class="metode">5. Histerisis</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . $row['skala_g6'] . '</span></td>
    <td style="text-align: center; line-height: 15px;"><span>' . $row['koreksi6'] . '</span></td>
    <td></td>
    <td class="border" rowspan="2" style="text-align: center; line-height: 18px;"><span class="thbel">Beban Tara &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td class="border" rowspan="2" colspan="2" style="text-align: center; line-height: 20px;"><span class="thbel">Pembacaan Timbangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td></td>
    <td class="border" rowspan="2" style="text-align: center; line-height: 25px;"><span class="thbel">Beban (g)</span></td>
    <td class="border" rowspan="2" style="text-align: center; line-height: 25px;"><span class="thbel">Histersisis (g)</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . $row['skala_g7'] . '</span></td>
    <td style="text-align: center; line-height: 15px;"><span>' . $row['koreksi7'] . '</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 10px;"><span>' . $row['skala_g8'] . '</span></td>
    <td style="text-align: center; line-height: 10px;"><span>' . $row['koreksi8'] . '</span></td>
    <td></td>
    <td class="border" style="text-align: center; line-height: 15px;"><span class="tdbel">Nol</span></td>
    <td class="border" colspan="2" style="text-align: center; line-height: 15px;"><span>' . $row['nol'] . '</span></td>
    <td></td>
    <td class="border" style="text-align: center; line-height: 30px;" rowspan="2"><span>' . $row['beban'] . '</span></td>
    <td class="border" style="text-align: center; line-height: 30px;" rowspan="2"><span>' . $row['histerisis'] . '</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . $row['skala_g9'] . '</span></td>
    <td style="text-align: center; line-height: 15px;"><span>' . $row['koreksi9'] . '</span></td>
    <td></td>
    <td class="border" style="text-align: center; line-height: 15px;"><span class="tdbel">Maximum</span></td>
    <td class="border" colspan="2" style="text-align: center; line-height: 15px;"><span>' . $row['maximum'] . '</span></td>
</tr>
<tr>
    <td height="5px"></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td height="5px"></td>
    <td style="line-height: 5px;" colspan="2"><span class="metode">6. Ketidak Pastian Yang Luas : </span><span>' . $row['ketidakpastian'] . ' g</span></td>
</tr>
</table>
<table>
<tr>
    <td width="2"></td>
    <td style=" line-height: 10px;"></td>
</tr>
<tr>
    <td></td>
    <td width="100%"><span class="metode">&nbsp; Keterangan :</span></td>
</tr>
<tr>
    <td></td>
    <td><span>- Ketidakpastian Dihitung Pada Tingkat Kepercayaan 95% Dan Faktor Cakupan K = 2</span></td>
</tr>
<tr>
    <td></td>
    <td><span>- Jika Tanda Koreksi Adalah Positif (+) Harus Ditambahkan Pada Pembacaan Skala Untuk Menghasilkan Nilai Sebenarnya</span></td>
</tr>
<tr>
    <td></td>
    <td><span>- Jika Tanda Koreksi Adalah Negatif (-) Harus Dikurang Pada Pembacaan Skala Untuk Menghasilkan Nilai Sebenarnya</span></td>
</tr>
<tr>
    <td></td>
    <td><span>- Limit Performance Adalah Kesalahan Maximal Timbangan Yang Diperoleh Dari penjumblahan Aljabar Antara</span><br><span>&nbsp;&nbsp;Koreksi Terbesar Skala Timbangan Dan Ketidakpastian Terbesar</span></td>
</tr>
<tr>
    <td></td>
    <td><span>- Hasil Kalibrasi Yang Dilaporkan Tertelusur Dan Kesatuan Pengukuran SI Melalui LK-202-IDN & LK-106-IDN</span></td>
</tr>
<tr>
    <td></td>
    <td><span>- Alat Standar Yang Digunakan Adalah Anak Timbangan Kelas M2</span></td>
</tr>
<tr>
    <td></td>
    <td><span>- Parameter Kalibrasi Adalah :</span></td>
</tr>
<tr>
    <td></td>
    <td><span class="metode">&nbsp;&nbsp;1. Kemampuan Ulang Pemacaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3. Pengaruh Penyimpanan Pada Timbangan</span></td>
</tr>
<tr>
    <td></td>
    <td><span class="metode">&nbsp;&nbsp;2. Pembacaan Skala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4. Pengaruh Pengenolan Beban (Tare)</span></td>
</tr>
</table>
<table>
<tr>
    <td style=" line-height: 10px;"></td>
</tr>
<tr>
    <td style=" line-height: 10px; text-align: center;"><span class="baca">Sertifikat atau laporan ini dilarang diperbanyak tanpa persetujuan tertulis dari Kalibrasi PT. Bumi Alam Segar</span></td>
</tr>
<tr>
    <td style=" text-align: center;"><span class="baca">This certificate or report shall not be reproduced without the written approval from Calibration of PT. Bumi Alam Segar</span></td>
</tr>
</table>

<table>
    <tr>
        <td width="10px"></td>
        <td class="border" width="100px"><span class="tdbel metode">Dibuat Oleh :</span></td>
        <td class="border" width="90px"><span class="tdbel metode">Dicek Oleh :</span></td>
        <td class="border" width="110px"><span class="tdbel metode">Disetujui Oleh :</span></td>
        <td class="border" width="90px"><span class="tdbel metode">Diterima Oleh :</span></td>
        <td class="border" width="140px"><span class="tdbel metode">Dibuat Tanggal :</span></td>
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

    // Output PDF ke string
    $pdfContent = $pdf->Output('', 's'); // Output ke string
    }
    ?>

<html>
<head>
    <title>Tampilkan PDF</title>
    <link rel="stylesheet" href="../src/components/bootstrap/css/bootstrap.min.css">
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
        <a href="../handover.php"><button class="btn ">Back</button></a>
    </div>
    </div>
    </div>

</body>
</html>