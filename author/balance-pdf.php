<?php
// Sertakan file TCPDF
require_once('../components/tcpdf/tcpdf.php'); // Path ke file TCPDF mungkin berbeda

// Ambil data dari form
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
$kode_alat2 = isset($_POST['kode_alat2']) ? $_POST['kode_alat2'] : 'Tidak tersedia';
$tanggal_kalibrasi2 = isset($_POST['tanggal_kalibrasi2']) ? $_POST['tanggal_kalibrasi2'] : 'Tidak tersedia';
$tanggal_kalibrasi_ulang2 = isset($_POST['tanggal_kalibrasi_ulang2']) ? $_POST['tanggal_kalibrasi_ulang2'] : 'Tidak tersedia';

$mendekati_titik_nol = isset($_POST['mendekati_titik_nol']) ? $_POST['mendekati_titik_nol'] : 'Tidak tersedia';
$setengah_kapasitas_max = isset($_POST['setengah_kapasitas_max']) ? $_POST['setengah_kapasitas_max'] : 'Tidak tersedia';
$kapasitas_max = isset($_POST['kapasitas_max']) ? $_POST['kapasitas_max'] : 'Tidak tersedia';

$standarD1 = isset($_POST['standarD1']) ? $_POST['standarD1'] : 'Tidak tersedia';
$standarD2 = isset($_POST['standarD2']) ? $_POST['standarD2'] : 'Tidak tersedia';
$standarD3 = isset($_POST['standarD3']) ? $_POST['standarD3'] : 'Tidak tersedia';

$average1 = isset($_POST['average1']) ? $_POST['average1'] : 'Tidak tersedia';
$average2 = isset($_POST['average2']) ? $_POST['average2'] : 'Tidak tersedia';
$average3 = isset($_POST['average3']) ? $_POST['average3'] : 'Tidak tersedia';

$nominal1 = isset($_POST['nominal1']) ? $_POST['nominal1'] : 'Tidak tersedia';
$nominal2 = isset($_POST['nominal2']) ? $_POST['nominal2'] : 'Tidak tersedia';
$nominal3 = isset($_POST['nominal3']) ? $_POST['nominal3'] : 'Tidak tersedia';
$nominal4 = isset($_POST['nominal4']) ? $_POST['nominal4'] : 'Tidak tersedia';
$nominal5 = isset($_POST['nominal5']) ? $_POST['nominal5'] : 'Tidak tersedia';
$nominal6 = isset($_POST['nominal6']) ? $_POST['nominal6'] : 'Tidak tersedia';
$nominal7 = isset($_POST['nominal7']) ? $_POST['nominal7'] : 'Tidak tersedia';
$nominal8 = isset($_POST['nominal8']) ? $_POST['nominal8'] : 'Tidak tersedia';
$nominal9 = isset($_POST['nominal9']) ? $_POST['nominal9'] : 'Tidak tersedia';

$koreksi1 = isset($_POST['koreksi1']) ? $_POST['koreksi1'] : 'Tidak tersedia';
$koreksi2 = isset($_POST['koreksi2']) ? $_POST['koreksi2'] : 'Tidak tersedia';
$koreksi3 = isset($_POST['koreksi3']) ? $_POST['koreksi3'] : 'Tidak tersedia';
$koreksi4 = isset($_POST['koreksi4']) ? $_POST['koreksi4'] : 'Tidak tersedia';
$koreksi5 = isset($_POST['koreksi5']) ? $_POST['koreksi5'] : 'Tidak tersedia';
$koreksi6 = isset($_POST['koreksi6']) ? $_POST['koreksi6'] : 'Tidak tersedia';
$koreksi7 = isset($_POST['koreksi7']) ? $_POST['koreksi7'] : 'Tidak tersedia';
$koreksi8 = isset($_POST['koreksi8']) ? $_POST['koreksi8'] : 'Tidak tersedia';
$koreksi9 = isset($_POST['koreksi9']) ? $_POST['koreksi9'] : 'Tidak tersedia';

$diameterPinggan = isset($_POST['diameterPinggan']) ? $_POST['diameterPinggan'] : 'Tidak tersedia';
$massa = isset($_POST['massa']) ? $_POST['massa'] : 'Tidak tersedia';
$tengah = isset($_POST['tengah']) ? $_POST['tengah'] : 'Tidak tersedia';
$depan = isset($_POST['depan']) ? $_POST['depan'] : 'Tidak tersedia';
$belakang = isset($_POST['belakang']) ? $_POST['belakang'] : 'Tidak tersedia';
$kiri = isset($_POST['kiri']) ? $_POST['kiri'] : 'Tidak tersedia';
$kanan = isset($_POST['kanan']) ? $_POST['kanan'] : 'Tidak tersedia';

$nol = isset($_POST['nol']) ? $_POST['nol'] : 'Tidak tersedia';
$maximum = isset($_POST['maximum']) ? $_POST['maximum'] : 'Tidak tersedia';

$beban = isset($_POST['beban']) ? $_POST['beban'] : 'Tidak tersedia';
$histerisis = isset($_POST['histerisis']) ? $_POST['histerisis'] : 'Tidak tersedia';

$perbedaan = isset($_POST['perbedaan']) ? $_POST['perbedaan'] : 'Tidak tersedia';

$max = isset($_POST['max']) ? $_POST['max'] : 'Tidak tersedia';

// Buat instance TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Setel informasi dokumen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Mustafic Suhruroyyan');
$pdf->SetTitle('sertifikat balance');
$pdf->SetSubject('sertifikat');
$pdf->SetKeywords('TCPDF, PDF, contoh, php');

// Hapus header dan footer default

$pdf = new TCPDF();
$pdf->SetPrintHeader(false);
$pdf->AddPage('A4');
$pdf->SetMargins(5, -5, 5);
$pdf->SetAutoPageBreak(FALSE, 0);
$pdf->SetFooterMargin(0);

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

// 1kemampuan ulang
$pdf->SetLineWidth(0.4);
$pdf->Rect(7.8, 94, $pdf->getPageWidth() - 45.9, $pdf->getPageHeight() - 280);
$pdf->Rect(64.3, 94, $pdf->getPageWidth() - 148.2, $pdf->getPageHeight() - 280);
$pdf->Rect(96.1, 94, $pdf->getPageWidth() - 134.2, $pdf->getPageHeight() - 280);

// 2skala
$pdf->SetLineWidth(0.3);
$pdf->Rect(7.7, 122, $pdf->getPageWidth() - 167.6, $pdf->getPageHeight() - 230);
$pdf->Rect(50.2, 122, $pdf->getPageWidth() - 176.5, $pdf->getPageHeight() - 230);


// tanda tangan
$pdf->SetLineWidth(0.3);
$pdf->Rect(7.5, 259, $pdf->getPageWidth() - 15, $pdf->getPageHeight() - 265);
$pdf->Rect(7.5, 259, $pdf->getPageWidth() - 82, $pdf->getPageHeight() - 265);
$pdf->Rect(7.5, 259, $pdf->getPageWidth() - 111, $pdf->getPageHeight() - 265);
$pdf->Rect(7.5, 259, $pdf->getPageWidth() - 149.5, $pdf->getPageHeight() - 265);
$pdf->Rect(7.5, 259, $pdf->getPageWidth() - 178.3, $pdf->getPageHeight() - 265);



$logo = '<img src="../assets/BAS.png">';
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
        <td style="width: 80%; height: 20px;"><div><h3>SERTIFIKAT KALIBRASI INTERNAL BALANCE</h3></div></td>
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
            <td width="150px"><span>' . htmlspecialchars($rang2) . '</span></td>
            <td width="37px"></td>
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
            <td><span>' . htmlspecialchars($kode_alat2) . '</span></td>
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
            <td rowspan="2"><span class="metode">Didopsi dari : "The Calibration of Balance"</span></td>
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
            <td></td>
            <td></td>
            <td rowspan="4" width="190px"><span>Oleh David B. Prowse, CSIRO National Measurement Laboratory, 1985,
                                                dan"Assestment of Uncertainties of Measurement for Calibration and Testing
                                                Laboratories" oleh R.R Cook,NATA,2002.</span></td>
        </tr>
        <tr>
            <td><span>Lokasi Kalibrasi</span></td>
            <td><span>:</span></td>
            <td><span>' . htmlspecialchars($lok_kal2) . '</span></td>
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
<tr><td width="190px" style="line-height: 5px;"></td></tr>
</table>
<table>
<tr>
<td width="8px"></td>
    <td class="border" width="160px" height="30px" style="text-align: center; line-height: 25px;"><span class="thbel">BEBAN</span></td>
    <td class="border" width="90px" style="text-align: center; line-height: 20px;"><span class="thbel">PEMBACAAN SKALA</span></td>
    <td class="border" width="85px" style="text-align: center; line-height: 20px;"><span class="thbel">STANDAR DEVIASI</span></td>
    <td class="border" width="130px" style="text-align: center; line-height: 20px;"><span class="thbel">MAXIMUM PERBEDAAN DALAM PEMBACAAN</span></td>
</tr>
<tr>
    <td></td>
    <td style="line-height: 15px;"><span>Mendekati Nol &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . htmlspecialchars($mendekati_titik_nol) . '</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . htmlspecialchars($standarD1) . '</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . htmlspecialchars($average1) . '</span></td>
</tr>
<tr>
    <td></td>
    <td style="line-height: 15px;"><span>Setengah Kapasitas Maximum(g)</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . htmlspecialchars($setengah_kapasitas_max) . '</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . htmlspecialchars($standarD2) . '</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . htmlspecialchars($average2) . '</span></td>
</tr>
<tr>
    <td></td>
    <td style="line-height: 15px;"><span>Kapasitas Maximum &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . htmlspecialchars($kapasitas_max) . '</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . htmlspecialchars($standarD3) . '</span></td>
    <td style="line-height: 15px; text-align: center;"><span>' . htmlspecialchars($average3) . '</span></td>
</tr>
</table>


<table>
<tr>
<td width="8px"></td>
<td  style="line-height: 20px;"></td>
</tr>
<tr>
    <td></td>
    <td width="120px"><span class="metode">2. Pembacaan Skala</span></td>
    <td width="145px"></td>
    <td><span class="metode">3. Pembacaan Skala</span></td>
</tr>
</table>
<table>
<tr><td width="8px" style="line-height: 5px;"></td></tr>
<tr>
<td width="8px"></td>
    <td class="border" width="120px" height="35px" style="text-align: center; line-height: 25px;"><span class="tdbel">PEMBACAAN SKALA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td class="border" width="95px" height="35px" style="text-align: center; line-height: 25px;"><span class="tdbel">KOREKSI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td width="50px"></td>
    <td><span class="tdbel">sebuah anak timbangan ' . htmlspecialchars($massa) . ' gram diletakan pada sebuah pinggan yang diameternya ' . htmlspecialchars($diameterPinggan) . ' mm dan digerakan dengan posisi yang brevariasi pada pinggan</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center;"><br><br><span>' . htmlspecialchars($nominal1) . '</span></td>
    <td style="text-align: center;"><br><br><span>' . htmlspecialchars($koreksi1) . '</span></td>
    <td></td>
    <td width="47px" class="border" rowspan="3"  style="text-align: center; line-height: 45px;"><span class="thbel">Tengah (g)</span></td>
    <td width="47px" class="border" rowspan="3"  style="text-align: center; line-height: 45px;"><span class="thbel">Depan (g)</span></td>
    <td width="47px" class="border" rowspan="3"  style="text-align: center; line-height: 45px;"><span class="thbel">Belakang (g)</span></td>
    <td width="47px" class="border" rowspan="3"  style="text-align: center; line-height: 45px;"><span class="thbel">Kiri &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td width="47px" class="border" rowspan="3"  style="text-align: center; line-height: 45px;"><span class="thbel">Kanan (g)</span></td>
    <td width="52px" class="border" rowspan="3"  style="text-align: center; line-height: 35px;"><span class="thbel">Perbedaan Maximum (g)</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($nominal2) . '</span></td>
    <td style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($koreksi2) . '</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($nominal3) . '</span></td> 
    <td style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($koreksi3) . '</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($nominal4) . '</span></td>
    <td style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($koreksi4) . '</span></td>
    <td></td>
    <td class="border" rowspan="2" style="text-align: center; line-height: 30px;"><span>' . htmlspecialchars($tengah) . '</span></td>
    <td class="border" rowspan="2" style="text-align: center; line-height: 30px;"><span>' . htmlspecialchars($depan) . '</span></td>
    <td class="border" rowspan="2" style="text-align: center; line-height: 30px;"><span>' . htmlspecialchars($belakang) . '</span></td>
    <td class="border" rowspan="2" style="text-align: center; line-height: 30px;"><span>' . htmlspecialchars($kiri) . '</span></td>
    <td class="border" rowspan="2" style="text-align: center; line-height: 30px;"><span>' . htmlspecialchars($kanan) . '</span></td>
    <td class="border" rowspan="2" style="text-align: center; line-height: 30px;"><span>' . htmlspecialchars($max) . '</span></td> 
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($nominal5) . '</span></td>
    <td style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($koreksi5) . '</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($nominal6) . '</span></td>
    <td style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($koreksi6) . '</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($nominal7) . '</span></td>
    <td style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($koreksi7) . '</span></td>
    <td></td>
    <td colspan="4"><span class="metode">4. Pengaruh Pengenolan Beban (Tare)</span></td>
    <td colspan="2"><span class="metode">5. Histerisis</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($nominal8) . '</span></td>
    <td style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($koreksi8) . '</span></td>
</tr>
<tr>
<td></td>
    <td height="8px" style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($nominal9) . '</span></td>
    <td style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($koreksi9) . '</span></td>
    <td></td>
    <td class="border" rowspan="3" style="text-align: center; line-height: 18px;"><span class="thbel">Beban Tara &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td class="border" rowspan="3" colspan="2" style="text-align: center; line-height: 20px;"><span class="thbel">Pembacaan Timbangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(g)</span></td>
    <td></td>
    <td class="border" rowspan="3" style="text-align: center; line-height: 25px;"><span class="thbel">Beban (g)</span></td>
    <td class="border" rowspan="3" style="text-align: center; line-height: 25px;"><span class="thbel">Histersisis (g)</span></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
</tr>
<tr>
    <td height="15px"></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="border" style="text-align: center; line-height: 15px;"><span class="tdbel">Nol</span></td>
    <td class="border" colspan="2" style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($nol) . '</span></td>
    <td></td>
    <td class="border" style="text-align: center; line-height: 30px;" rowspan="2"><span>' . htmlspecialchars($beban) . '</span></td>
    <td class="border" style="text-align: center; line-height: 30px;" rowspan="2"><span>' . htmlspecialchars($histerisis) . '</span></td>
</tr>
<tr>
    <td height="15px"></td>
    <td style="line-height: 15px;" colspan="2"><span class="metode">6. Ketidak Pastian Yang Luas : </span><span> ' . htmlspecialchars($perbedaan) . '  g</span></td>
    <td></td>
    <td class="border" style="text-align: center; line-height: 15px;"><span class="tdbel">Maximum</span></td>
    <td class="border" colspan="2" style="text-align: center; line-height: 15px;"><span>' . htmlspecialchars($maximum) . '</span></td>
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
    <td width="8px"></td>
    <td width="90px"><span>Dibuat Oleh :</span></td>
    <td><span>Dicek Oleh :</span></td>
    <td width="110px"><span>Disetujui Oleh :</span></td>
    <td><span>Diterima Oleh :</span></td>
    <td colspan="2" width="170px"><span>Diterbitkan Tanggal :</span></td>
</tr>
<tr>
    <td></td>
    <td rowspan="5"></td>
    <td rowspan="5"></td>
    <td rowspan="5"></td>
    <td rowspan="5"></td>
    <td colspan="2"><span class="thbel">Catatan :</span></td>
</tr>
<tr>
    <td></td>
    <td colspan="2" rowspan="6" style="line-height: 15px;"><span class="tdbel">Timbangan layak digunakan, dan dalam kondisi baik. Nilai Ketidakpastian berada di antara nilai keberterimaan alat.</span></td>
</tr>
<tr>
    <td></td>
</tr>
<tr>
    <td></td>
</tr>
<tr>
    <td></td>
</tr>
<tr>
    <td></td>
    <td style="text-align: center;"><span>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></td>
    <td style="text-align: center;"><span>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></td>
    <td style="text-align: center;"><span>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></td>
    <td style="text-align: center;"><span>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span></td>
</tr>
<tr>
    <td></td>
    <td style="text-align: center;"><span>Foreman Kalibrasi</span></td>
    <td style="text-align: center;"><span>Supervisor</span></td>
    <td style="text-align: center;"><span>Manager Enginnering</span></td>
    <td style="text-align: center;"><span>User</span></td>
</tr>
</table>
';
$pdf->SetY($pdf->GetY() - 6);
$pdf->writeHTML($header, true, false, true, false, '');

// Tutup dan keluarkan file PDF
$pdf->Output('Form_Sertifikat_Balance.pdf', 'I'); // 'I' untuk menampilkan di browser
?>