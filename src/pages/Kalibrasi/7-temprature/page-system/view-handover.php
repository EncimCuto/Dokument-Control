<?php
    require_once'../../../../config/config2.php';
    require_once('../../../../components/tcpdf/tcpdf.php');

$id = $_GET['id'];
$query = "SELECT * FROM temprature_handover WHERE id = $id";
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


    $pdf->SetLineWidth(0.01);
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
       .title {
            font-size: 15px;
            font-weight: bold;
       }
    </style>
    
    <table class="bortd">
        <tr>
            <td style="width: 143px; ">'.$logo.'</td>
            <td style="width: 410px;text-align: center; line-height: 40px;"><span class="title">SERTIFIKAT KALIBRASI INTERNAL<br>THERMOMETER & HYGROMETER</span></td>
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
<tr><td style="line-height: 15px"></td></tr>
    <tr>
        <td style="text-align: center;"><span class="metode">HASIL KALIBRASI</span></td>
    </tr>
</table>

<table>
<tr><td  style="line-height: 5px"></td></tr>
    <tr>
        <td width="8"></td>
        <td class="border" width="20px"  height="20px" style="line-height: 45px; text-align: center;" rowspan="2"><span class="metode">No</span></td>
        <td class="border" width="50px"  style="line-height: 10px; text-align: center;"><span class="metode">Titik Kalibrasi</span></td>
        <td class="border" width="50px"  style="line-height: 10px; text-align: center;"><span class="metode">Posisi Bagian*)</span></td>
        <td class="border" width="110px" style="line-height: 10px; text-align: center;" colspan="2"><span class="metode">Pembacaan Alat yang Dikalibrasi ( r )</span></td>
        <td class="border" width="102px" style="line-height: 10px; text-align: center;" colspan="2"><span class="metode">Pembacaan Alat Standar ( t )</span></td>
        <td class="border" width="102px" style="line-height: 20px; text-align: center;" colspan="2"><span class="metode">Koreksi ( t - r )</span></td>
        <td class="border" width="104px" style="line-height: 10px; text-align: center;" colspan="2"><span class="metode">Ketidakpastian</span><br><span class="metode">U95</span></td>
    </tr>
    <tr>
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
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
        <td width="8"></td>
        <td colspan="3"><span class="metode">Kurva Kalibrasi :</span></td>
    </tr>
</table>



<table>
    <tr>
        <td width="8px" style="line-height: 120px;"></td>
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