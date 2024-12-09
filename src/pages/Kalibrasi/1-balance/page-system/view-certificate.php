<?php
require_once '../../../../config/config2.php';
require_once '../../../../components/tcpdf/tcpdf.php';

// Validasi dan Ambil ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query database untuk mendapatkan data sesuai ID
    $query = "SELECT * FROM balance_handover WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

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

        // Buat instance baru TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


    // Hapus header dan footer default

    $pdf = new TCPDF();
    $pdf->SetPrintHeader(false);
    $pdf->AddPage('A4');
    $pdf->SetMargins(2, -5, 5);
    $pdf->SetAutoPageBreak(FALSE, 0);
    $pdf->SetFooterMargin(0);

    
    $pdf->SetLineWidth(0.2);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Rect(5, 4, $pdf->getPageWidth() - 160, $pdf->getPageHeight() - 278);

    $pdf->SetLineWidth(0.4);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Rect(4, 3, $pdf->getPageWidth() - 8, $pdf->getPageHeight() - 6);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Rect(5, 4, $pdf->getPageWidth() - 10, $pdf->getPageHeight() - 8);

    $pdf->SetLineWidth(0.3);
    $pdf->Rect(5, 23, $pdf->getPageWidth() - 10, $pdf->getPageHeight() - 252);
    $pdf->SetLineWidth(0.3);
    $pdf->Rect(5, 70, $pdf->getPageWidth() - 10, $pdf->getPageHeight() - 297);

    $pdf->SetLineWidth(0.3);
    $pdf->Rect(85, 76, $pdf->getPageWidth() - 171, $pdf->getPageHeight() - 297);


    // 1. kemampuan ulang pembacaan
    $pdf->Rect(8.99, 94.2, $pdf->getPageWidth() - 46, $pdf->getPageHeight() - 279.9);
    $pdf->Rect(65.46, 94.2, $pdf->getPageWidth() - 178.2, $pdf->getPageHeight() - 279.9);
    $pdf->Rect(127.2, 94.2, $pdf->getPageWidth() - 164.12, $pdf->getPageHeight() - 279.9);

    // 2. pembacaan skala
    $pdf->Rect(8.99, 131, $pdf->getPageWidth() - 171.1, $pdf->getPageHeight() - 245);
    $pdf->Rect(48, 131, $pdf->getPageWidth() - 180.1, $pdf->getPageHeight() - 245);
    
    // tanda tangan
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.3);
    $pdf->Rect(7.6, 260, $pdf->getPageWidth() - 16, $pdf->getPageHeight() - 265);
    $pdf->Rect(7.6, 260, $pdf->getPageWidth() - 176.1, $pdf->getPageHeight() - 265);
    $pdf->Rect(75.3, 260, $pdf->getPageWidth() - 170.5, $pdf->getPageHeight() - 265);
    $pdf->Rect(148.7, 260, $pdf->getPageWidth() - 157.1, $pdf->getPageHeight() - 265);

    $logo   = '<img src="../../../../assets/LogoForm.png">';
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
    
    <table style="padding:0; margin:0; align-items:center;">
    <tr style="text-align: center;">
        <td width="16px"></td>
        <td class="bortd" style="width: 120px; height: 20px; line-height: 4px;">' . $logo . '</td>
        <td style="width: 80%; height: 20px;"><div><h3>SERTIFIKAT KALIBRASI INTERNAL MANOMETER</h3></div></td>
    </tr>
    </table>
    <table>
    <tr><td></td></tr>
        <tr>
            <td width="16px"></td>
            <td width="100px"><span>Departemen Pemilik</span></td>
            <td width="10px"><span>:</span></td>
            <td width="135px"><span>' . $row['departemen'] . '</span></td>
            <td width="125px"><span>Range Penggunaan Alat</span></td>
            <td width="10px"><span>:</span></td>
            <td width="155px"><span>' . $row['range_penggunaan_alat'] . '</span></td>
            <td width="40px"></td>
        </tr>
        <tr>
            <td></td>
            <td><span>Lokasi</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['lokasi'] . '</span></td>
            <td><span>Limits Of Permissible Error</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['limits_of_permissible_error'] . '</span></td>
        </tr>
        <tr>
            <td></td>
            <td><span>Nomor Kalibrasi</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['nomor_kalibrasi'] . '</span></td>
            <td><span>Kode Alat</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['kode_alat'] . '</span></td>
        </tr>
        <tr>
            <td></td>
            <td><span>Nama Alat</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['nama_alat'] . '</span></td>
            <td><span>Tgl. Kalibrasi</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['tgl_kalibrasi'] . '</span></td>
        </tr>
        <tr>
            <td></td>
            <td><span>Merk</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['merk'] . '</span></td>
            <td><span>Tgl. Kalibrasi Ulang</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['tgl_kalibrasi_ulang'] . '</span></td>
        </tr>
        <tr>
            <td></td>
            <td><span>Tipe</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['tipe'] . '</span></td>
            <td><span>Metode Kalibrasi</span></td>
            <td><span>:</span></td>
            <td rowspan="2"><span class="metode">Didopsi dari : "The Calibration of Balance"</span></td>
        </tr>
        <tr>
            <td></td>
            <td><span>Kapasitas</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['kapasitas'] . '</span></td>
        </tr>
        <tr>
            <td></td>
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
            <td></td>
            <td><span>Lokasi Kalibrasi</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['lokasi_kalibrasi'] . '</span></td>
        </tr>
        <tr>
            <td></td>
            <td><span>Suhu Ruangan</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['suhu_ruangan'] . '</span></td>
        </tr>
        <tr>
            <td></td>
            <td><span>Kelembaban</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['kelembaban'] . '</span></td>
        </tr>
    </table>
<table>
<table>
<tr><td></td></tr>
    <tr>
        <td style="text-align: center;"><span class="metode">HASIL KALIBRASI</span></td>
    </tr>
</table>

<table>
<tr><td style="line-height: 10px;"></td></tr>
<tr>
    <td width="20px"></td>
    <td><span class="metode">1. Kemampuan Ulang Pembacaan</span></td>
</tr>
<tr>
<td></td>
    <td class="border" width="160px" height="30px" style="text-align: center; line-height: 25px;" colspan="2"><span class="thbel">BEBAN</span></td>
    <td class="border" width="90px" style="text-align: center; line-height: 20px;"><span class="thbel">PEMBACAAN SKALA</span></td>
    <td class="border" width="85px" style="text-align: center; line-height: 20px;"><span class="thbel">STANDAR &nbsp;&nbsp;DEVIASI</span></td>
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
    <td width="20px"></td>
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
<tr><td width="20px" style="line-height: 2px;"></td></tr>
<tr>
<td width="20px"></td>
    <td class="border" width="110px" height="35px" style="text-align: center; line-height: 25px;"><span class="tdbel">PEMBACAAN SKALA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td class="border" width="85px" height="35px" style="text-align: center; line-height: 25px;"><span class="tdbel">KOREKSI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td width="60px"></td>
    <td><span class="tdbel">sebuah anak timbangan ' . $row['massa'] . 'gram diletakan pada sebuah pinggan yang diameternya ' . $row['pinggan'] . 'mm dan digerakan dengan posisi yang brevariasi pada pinggan</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center;"><br><br><span>' . $row['skala_g1'] . '</span></td>
    <td style="text-align: center;"><br><br><span>' . $row['koreksi1'] . '</span></td>
    <td></td>
    <td width="47px" class="border" rowspan="2"  style="text-align: center; line-height: 35px;"><span class="thbel">Tengah &nbsp;&nbsp;(g)</span></td>
    <td width="47px" class="border" rowspan="2"  style="text-align: center; line-height: 35px;"><span class="thbel">Depan &nbsp;&nbsp;&nbsp;(g)</span></td>
    <td width="47px" class="border" rowspan="2"  style="text-align: center; line-height: 35px;"><span class="thbel">Belakang (g)</span></td>
    <td width="47px" class="border" rowspan="2"  style="text-align: center; line-height: 35px;"><span class="thbel">Kiri &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td width="47px" class="border" rowspan="2"  style="text-align: center; line-height: 35px;"><span class="thbel">Kanan &nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
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
    <td class="border" rowspan="2" style="text-align: center; line-height: 18px;"><span class="thbel">Beban Tara &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td class="border" rowspan="2" colspan="2" style="text-align: center; line-height: 20px;"><span class="thbel">Pembacaan Timbangan  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td></td>
    <td class="border" rowspan="2" style="text-align: center; line-height: 25px;"><span class="thbel">Beban  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
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
    <td height="32px"></td>
    <td style="line-height: 5px;" colspan="2"><span class="metode">6. Ketidak Pastian Yang Luas : </span><span>' . $row['ketidakpastian'] . ' g</span></td>
</tr>
</table>
<table>
<tr>
    <td width="14"></td>
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
        <td width="16px"></td>
        <td class="border" style="line-height: 10px;"><span class="tdbel metode">Dibuat Oleh :</span></td>
        <td class="border" style="line-height: 10px;"><span class="tdbel metode">Dicek Oleh :</span></td>
        <td class="border" style="line-height: 10px;" width="112px"><span class="tdbel metode">Disetujui Oleh :</span></td>
        <td class="border" style="line-height: 10px;"><span class="tdbel metode">Diterima Oleh :</span></td>
        <td class="border" style="line-height: 10px;" width="150px"><span class="tdbel metode">Dibuat Tanggal :</span></td>
    </tr>
    <tr>
        <td width="16px" ></td>
        <td rowspan="2" style="line-height: 10px; text-align:center;"><img src="data:image/png;base64,' . $gambarBase64Array[0] . '" alt="gambar" width="63" height="50"></td>
        <td rowspan="2" style="line-height: 10px; text-align:center;"><img src="data:image/png;base64,' . $gambarBase64Array[1] . '" alt="gambar" width="63" height="50"></td>
        <td rowspan="2" style="line-height: 10px; text-align:center;"><img src="data:image/png;base64,' . $gambarBase64Array[2] . '" alt="gambar" width="63" height="50"></td>
        <td rowspan="2" style="line-height: 10px; text-align:center;"><img src="data:image/png;base64,' . $gambarBase64Array[3] . '" alt="gambar" width="63" height="50"></td>
        <td style="line-height: 10px;"><span class="baca metode">CATATAN :</span></td>
    </tr>
    <tr>
        <td width="16px" height="55px"></td>
        <td></td>
    </tr>
    <tr>
        <td width="16px"></td>
        <td style="text-align:center;"><span>(' . $row['foreman'] . ')</span></td>
        <td style="text-align:center;"><span>(' . $row['supervisor'] . ')</span></td>
        <td style="text-align:center;"><span>(' . $row['manager'] . ')</span></td>
        <td style="text-align:center;"><span>(' . $row['user'] . ')</span></td>
        <td></td>
    </tr><tr>
        <td width="16px"></td>
        <td style="text-align:center;"><span>Foreman Kalibrasi</span></td>
        <td style="text-align:center;"><span>Supervisor</span></td>
        <td style="text-align:center;"><span>Manager Enginnering</span></td>
        <td style="text-align:center;"><span>User</span></td>
        <td></td>
    </tr>
</table>';
$pdf->SetY($pdf->GetY() - 6);
$pdf->writeHTML($header, true, false, true, false, '');

$kode = $row['kode_alat'];
$kode_bersih = str_replace('/', '_', $kode); // Ganti '/' dengan '_'
$pdf->Output($kode_bersih . '.pdf', 'i');


    } else {
        // Jika data tidak ditemukan, redirect dengan pesan error
        header("Location: ../certificate.php?status=not_found");
        exit();
    }
} else {
    // Jika ID tidak ada, redirect dengan pesan error
    header("Location: ../certificate.php?status=invalid_id");
    exit();
}
?>