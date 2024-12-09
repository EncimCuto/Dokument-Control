<?php
require_once '../../../../config/config2.php';
require_once '../../../../components/tcpdf/tcpdf.php';

// Validasi dan Ambil ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query database untuk mendapatkan data sesuai ID
    $query = "SELECT * FROM temprature_handover WHERE id = ?";
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
    $pdf->Rect(83, 76, $pdf->getPageWidth() - 170, $pdf->getPageHeight() - 297);

    $pdf->SetLineWidth(0.3);
    $pdf->Rect(7.6, 83.4, $pdf->getPageWidth() - 15.9, $pdf->getPageHeight() - 158);

    // kurva
    $pdf->SetLineWidth(0.1);
    $pdf->Rect(38.5, 175, $pdf->getPageWidth() - 80, $pdf->getPageHeight() - 252);

    $pdf->SetDrawColor(115,115,115);

    $pdf->SetLineWidth(0.01);
    $pdf->Rect(41, 180, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    $pdf->Rect(41, 185, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    $pdf->Rect(41, 190, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    $pdf->Rect(41, 195, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    $pdf->Rect(41, 200, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    $pdf->Rect(41, 205, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);
    $pdf->Rect(41, 210, $pdf->getPageWidth() - 85, $pdf->getPageHeight() - 297);

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
       .title {
            font-size: 15px;
            font-weight: bold;
       }
    </style>
    
    <table>
        <tr>
            <td width="8px"></td>
            <td style="width: 143px; ">'.$logo.'</td>
            <td style="width: 410px;text-align: center; line-height: 40px;"><span class="title">SERTIFIKAT KALIBRASI INTERNAL<br>THERMOMETER & HYGROMETER</span></td>
        </tr>
    </table>
    <table>
    <tr><td style="line-height: 5px;"></td></tr>
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
            <td rowspan="3"><span class="metode">Didopsi dari :  "The Expression of Uncertainty and Confidence in Measurement"</span></td>
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
        </tr>
        <tr>
            <td></td>
            <td><span>Lokasi Kalibrasi</span></td>
            <td><span>:</span></td>
            <td><span>' . $row['lokasi_kalibrasi'] . '</span></td>
            <td></td>
            <td></td>
            <td rowspan="3" width="190px"><span>Oleh UKAS (United Kingdom Accreditation Service) M3003, Edition <br> 3, November 2012</span></td>
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
<tr><td style="line-height: 16px"></td></tr>
    <tr>
        <td style="text-align: center;"><span class="metode">HASIL KALIBRASI</span></td>
    </tr>
</table>

<table>
<tr><td  style="line-height: 21px"></td></tr>
    <tr>
        <td width="16"></td>
        <td class="border" width="20px"  height="20px" style="line-height: 45px; text-align: center;" rowspan="2"><span class="metode">No</span></td>
        <td class="border" width="57px"  style="line-height: 10px; text-align: center;"><span class="metode">Titik Kalibrasi</span></td>
        <td class="border" width="55px"  style="line-height: 10px; text-align: center;"><span class="metode">Posisi Bagian*)</span></td>
        <td class="border" width="110px" style="line-height: 10px; text-align: center;" colspan="2"><span class="metode">Pembacaan Alat yang Dikalibrasi ( r )</span></td>
        <td class="border" width="102px" style="line-height: 10px; text-align: center;" colspan="2"><span class="metode">Pembacaan Alat Standar ( t )</span></td>
        <td class="border" width="102px" style="line-height: 20px; text-align: center;" colspan="2"><span class="metode">Koreksi ( t - r )</span></td>
        <td class="border" width="104px" style="line-height: 10px; text-align: center;" colspan="2"><span class="metode">Ketidakpastian</span><br><span class="metode">U95</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="20px" style="line-height: 18px; text-align: center;"><span class="thbel">(°C)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">( )</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">Suhu(°C)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">RH(%)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">Suhu(°C)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">RH(%)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">Suhu(°C)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">RH(%)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">Suhu(°C)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">RH(%)</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">1</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh1'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">2</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh2'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">3</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh3'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">4</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh4'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">5</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh5'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">6</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh6'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">7</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh7'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">8</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh8'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">9</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh9'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">10</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh10'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">11</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh11'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">12</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh12'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">13</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh13'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">14</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh14'] . '</span></td>
    </tr>
    <tr>
        <td width="16"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">15</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kalibrasi15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['posisi_bagian15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_suhu15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_rh15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_suhuk15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_rh15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_suhu15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_rh15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_suhu15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['ketidakpastian_rh15'] . '</span></td>
    </tr>
    <tr><td style="line-height: 5px;"></td></tr>
    <tr>
        <td width="16"></td>
        <td colspan="3"><span class="metode">Kurva Kalibrasi :</span></td>
    </tr>
</table>

<table>
    <tr>
        <td width="16px" style="line-height: 125px;"></td>
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
        <td><span>Hasil kalibrasi yang dilaporkan tertelusur ke satuan pengukuran pengukuran SI melalui LK-280-IDN.</span></td>
    </tr>
    <tr>
        <td></td>
        <td><span>alat standar adalah Dry Block.</span></td>
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

$alat_suhu1   = $row['alat_suhu1'];  $standar_suhuk1  =  $row['standar_suhuk1'];
$alat_suhu2   = $row['alat_suhu2'];  $standar_suhuk2  =  $row['standar_suhuk2'];
$alat_suhu3   = $row['alat_suhu3'];  $standar_suhuk3  =  $row['standar_suhuk3'];
$alat_suhu4   = $row['alat_suhu4'];  $standar_suhuk4  =  $row['standar_suhuk4'];
$alat_suhu5   = $row['alat_suhu5'];  $standar_suhuk5  =  $row['standar_suhuk5'];
$alat_suhu6   = $row['alat_suhu6'];  $standar_suhuk6  =  $row['standar_suhuk6'];
$alat_suhu7   = $row['alat_suhu7'];  $standar_suhuk7  =  $row['standar_suhuk7'];
$alat_suhu8   = $row['alat_suhu8'];  $standar_suhuk8  =  $row['standar_suhuk8'];
$alat_suhu9   = $row['alat_suhu9'];  $standar_suhuk9  =  $row['standar_suhuk9'];
$alat_suhu10  = $row['alat_suhu10'];  $standar_suhuk10 =  $row['standar_suhuk10'];
$alat_suhu11  = $row['alat_suhu11'];  $standar_suhuk11 =  $row['standar_suhuk11'];
$alat_suhu12  = $row['alat_suhu12'];  $standar_suhuk12 =  $row['standar_suhuk12'];
$alat_suhu13  = $row['alat_suhu13'];  $standar_suhuk13 =  $row['standar_suhuk13'];
$alat_suhu14  = $row['alat_suhu14'];  $standar_suhuk14 =  $row['standar_suhuk14'];
$alat_suhu15  = $row['alat_suhu15'];  $standar_suhuk15 =  $row['standar_suhuk15'];


$alat_rh1  = $row['alat_rh1'];  $standar_rh1  = $row['standar_rh1'];
$alat_rh2  = $row['alat_rh2'];  $standar_rh2  = $row['standar_rh2'];
$alat_rh3  = $row['alat_rh3'];  $standar_rh3  = $row['standar_rh3'];
$alat_rh4  = $row['alat_rh4'];  $standar_rh4  = $row['standar_rh4'];
$alat_rh5  = $row['alat_rh5'];  $standar_rh5  = $row['standar_rh5'];
$alat_rh6  = $row['alat_rh6'];  $standar_rh6  = $row['standar_rh6'];
$alat_rh7  = $row['alat_rh7'];  $standar_rh7  = $row['standar_rh7'];
$alat_rh8  = $row['alat_rh8'];  $standar_rh8  = $row['standar_rh8'];
$alat_rh9  = $row['alat_rh9'];  $standar_rh9  = $row['standar_rh9'];
$alat_rh10 = $row['alat_rh10'];  $standar_rh10 = $row['standar_rh10'];
$alat_rh11 = $row['alat_rh11'];  $standar_rh11 = $row['standar_rh11'];
$alat_rh12 = $row['alat_rh12'];  $standar_rh12 = $row['standar_rh12'];
$alat_rh13 = $row['alat_rh13'];  $standar_rh13 = $row['standar_rh13'];
$alat_rh14 = $row['alat_rh14'];  $standar_rh14 = $row['standar_rh14'];
$alat_rh15 = $row['alat_rh15'];  $standar_rh15 = $row['standar_rh15'];


$titik_kalibrasi1 = $row['titik_kalibrasi1'];
$titik_kalibrasi2 = $row['titik_kalibrasi2'];
$titik_kalibrasi3 = $row['titik_kalibrasi3'];
$titik_kalibrasi4 = $row['titik_kalibrasi4'];
$titik_kalibrasi5 = $row['titik_kalibrasi5'];
$titik_kalibrasi6 = $row['titik_kalibrasi6'];
$titik_kalibrasi7 = $row['titik_kalibrasi7'];
$titik_kalibrasi8 = $row['titik_kalibrasi8'];
$titik_kalibrasi9 = $row['titik_kalibrasi9'];
$titik_kalibrasi10 = $row['titik_kalibrasi10'];
$titik_kalibrasi11 = $row['titik_kalibrasi11'];
$titik_kalibrasi12 = $row['titik_kalibrasi12'];
$titik_kalibrasi13 = $row['titik_kalibrasi13'];
$titik_kalibrasi14 = $row['titik_kalibrasi14'];
$titik_kalibrasi15 = $row['titik_kalibrasi15'];

// Naik 
$r1 = 215  - ($alat_suhu1  / 2);  $b1 = 215  - ($standar_suhuk1  / 2);
$r2 = 215  - ($alat_suhu2  / 2);  $b2 = 215  - ($standar_suhuk2  / 2);
$r3 = 215  - ($alat_suhu3  / 2);  $b3 = 215  - ($standar_suhuk3  / 2);
$r4 = 215  - ($alat_suhu4  / 2);  $b4 = 215  - ($standar_suhuk4  / 2);
$r5 = 215  - ($alat_suhu5  / 2);  $b5 = 215  - ($standar_suhuk5  / 2);
$r6 = 215  - ($alat_suhu6  / 2);  $b6 = 215  - ($standar_suhuk6  / 2);
$r7 = 215  - ($alat_suhu7  / 2);  $b7 = 215  - ($standar_suhuk7  / 2);
$r8 = 215  - ($alat_suhu8  / 2);  $b8 = 215  - ($standar_suhuk8  / 2);
$r9 = 215  - ($alat_suhu9  / 2);  $b9 = 215  - ($standar_suhuk9  / 2);
$r10 = 215 - ($alat_suhu10 / 2);  $b10 = 215 - ($standar_suhuk10 / 2);
$r11 = 215 - ($alat_suhu11 / 2);  $b11 = 215 - ($standar_suhuk11 / 2);
$r12 = 215 - ($alat_suhu12 / 2);  $b12 = 215 - ($standar_suhuk12 / 2);
$r13 = 215 - ($alat_suhu13 / 2);  $b13 = 215 - ($standar_suhuk13 / 2);
$r14 = 215 - ($alat_suhu14 / 2);  $b14 = 215 - ($standar_suhuk14 / 2);
$r15 = 215 - ($alat_suhu15 / 2);  $b15 = 215 - ($standar_suhuk15 / 2);

// Turun
$y1 = 215  - ($alat_rh1  / 2);  $g1 = 215  - ($standar_rh1  / 2);
$y2 = 215  - ($alat_rh2  / 2);  $g2 = 215  - ($standar_rh2  / 2);
$y3 = 215  - ($alat_rh3  / 2);  $g3 = 215  - ($standar_rh3  / 2);
$y4 = 215  - ($alat_rh4  / 2);  $g4 = 215  - ($standar_rh4  / 2);
$y5 = 215  - ($alat_rh5  / 2);  $g5 = 215  - ($standar_rh5  / 2);
$y6 = 215  - ($alat_rh6  / 2);  $g6 = 215  - ($standar_rh6  / 2);
$y7 = 215  - ($alat_rh7  / 2);  $g7 = 215  - ($standar_rh7  / 2);
$y8 = 215  - ($alat_rh8  / 2);  $g8 = 215  - ($standar_rh8  / 2);
$y9 = 215  - ($alat_rh9  / 2);  $g9 = 215  - ($standar_rh9  / 2);
$y10 = 215 - ($alat_rh10 / 2);  $g10 = 215 - ($standar_rh10 / 2);
$y11 = 215 - ($alat_rh11 / 2);  $g11 = 215 - ($standar_rh11 / 2);
$y12 = 215 - ($alat_rh12 / 2);  $g12 = 215 - ($standar_rh12 / 2);
$y13 = 215 - ($alat_rh13 / 2);  $g13 = 215 - ($standar_rh13 / 2);
$y14 = 215 - ($alat_rh14 / 2);  $g14 = 215 - ($standar_rh14 / 2);
$y15 = 215 - ($alat_rh15 / 2);  $g15 = 215 - ($standar_rh15 / 2);

// titik kalibrasi
$a1 = 215  - ($titik_kalibrasi1  / 2);
$a2 = 215  - ($titik_kalibrasi2  / 2);
$a3 = 215  - ($titik_kalibrasi3  / 2);
$a4 = 215  - ($titik_kalibrasi4  / 2);
$a5 = 215  - ($titik_kalibrasi5  / 2);
$a6 = 215  - ($titik_kalibrasi6  / 2);
$a7 = 215  - ($titik_kalibrasi7  / 2);
$a8 = 215  - ($titik_kalibrasi8  / 2);
$a9 = 215  - ($titik_kalibrasi9  / 2);
$a10 = 215 - ($titik_kalibrasi10 / 2);
$a11 = 215 - ($titik_kalibrasi11 / 2);
$a12 = 215 - ($titik_kalibrasi12 / 2);
$a13 = 215 - ($titik_kalibrasi13 / 2);
$a14 = 215 - ($titik_kalibrasi14 / 2);
$a15 = 215 - ($titik_kalibrasi15 / 2);

// line kurva
$pdf->SetLineWidth(0.8);
$pdf->SetDrawColor(92, 90, 90);
$pdf->Curve(40, 215 , 48, $a1, 56, $a2, 64, $a3);
$pdf->Curve(64, $a3 , 72, $a4, 80, $a5, 88, $a6);
$pdf->Curve(88, $a6 , 96, $a7, 104, $a8, 112,  $a9);
$pdf->Curve(112, $a9 , 120, $a10, 128, $a11, 136, $a12);
$pdf->Curve(136, $a12 , 144, $a13, 152, $a14, 160, $a15);

$pdf->SetDrawColor(255, 0, 0);
$pdf->Curve(40, 215 , 48, $r1, 56, $r2, 64, $r3);
$pdf->Curve(64, $r3 , 72, $r4, 80, $r5, 88, $r6);
$pdf->Curve(88, $r6 , 96, $r7, 104, $r8, 112,  $r9);
$pdf->Curve(112, $r9 , 120, $r10, 128, $r11, 136, $r12);
$pdf->Curve(136, $r12 , 144, $r13, 152, $r14, 160, $r15);

$pdf->SetDrawColor(3, 144, 252);
$pdf->Curve(40, 215 , 48, $y1, 56, $y2, 64, $y3);
$pdf->Curve(64, $b3 , 72, $b4, 80, $b5, 88, $b6);
$pdf->Curve(88, $b6 , 96, $b7, 104, $b8, 112, $b9);
$pdf->Curve(112, $b9 , 120, $b10, 128, $b11, 136, $b12);
$pdf->Curve(136, $b12 , 144, $b13, 152, $b14, 160, $b15);

$pdf->SetDrawColor(255, 217, 0);
$pdf->Curve(40, 215 , 48, $y1, 56, $y2, 64, $y3);
$pdf->Curve(64, $y3 , 72, $y4, 80, $y5, 88, $y6);
$pdf->Curve(88, $y6 , 96, $y7, 104, $y8, 112,  $y9);
$pdf->Curve(112, $y9 , 120, $y10, 128, $y11, 136, $y12);
$pdf->Curve(136, $y12 , 144, $y13, 152, $y14, 160, $y15);

$pdf->SetDrawColor(0, 140, 2);
$pdf->Curve(40, 215 , 48, $g1, 56, $g2, 64, $g3);
$pdf->Curve(64, $g3 , 72, $g4, 80, $g5, 88, $g6);
$pdf->Curve(88, $g6 , 96, $g7, 104, $g8, 112,  $g9);
$pdf->Curve(112, $g9 , 120, $g10, 128, $g11, 136, $g12);
$pdf->Curve(136, $g12 , 144, $g13, 152, $g14, 160, $g15);

$kode = $row['kode_alat'];
$kode_bersih = str_replace('/', '_', $kode); // Ganti '/' dengan '_'
$pdf->Output($kode_bersih . '.pdf', 'D');
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