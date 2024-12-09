<?php
    require_once'../../../../config/config2.php';
    require_once('../../../../components/tcpdf/tcpdf.php');

    $id = $_GET['id'];

    $query = "SELECT * FROM pressure_handover WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

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
<tr><td style="line-height: 2px"></td></tr>
    <tr>
        <td style="text-align: center;"><span class="metode">HASIL KALIBRASI</span></td>
    </tr>
</table>

<table>
<tr><td  style="line-height: 5px"></td></tr>
    <tr>
        <td width="8"></td>
        <td class="border" rowspan="2" height="30px" width="20px" style="line-height: 55px; text-align: center;"><span class="metode">No</span></td>
        <td class="border" colspan="2" width="116px" style="line-height: 20px; text-align: center;"><span class="metode">Titik Kalibrasi</span></td>
        <td class="border" colspan="2" width="110px" style="line-height: 15px; text-align: center;"><span class="metode">Pembacaan Alat yang Dikalibrasi ( r )</span></td>
        <td class="border" colspan="2" width="102px" style="line-height: 15px; text-align: center;"><span class="metode">Pembacaan Alat Standar ( t )</span></td>
        <td class="border" colspan="2" width="102px" style="line-height: 20px; text-align: center;"><span class="metode">Koreksi ( t - r )</span></td>
        <td class="border" rowspan="2" width="88px" style=" text-align: center;"><br><br><span class="metode">Ketidakpastian</span><br><span class="metode">U95</span><br><span class="metode">(kg/cm²)</span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="30px" style="line-height: 25px; text-align: center;"><span class="thbel">%</span></td>
        <td class="border" style="line-height: 25px; text-align: center;"><span class="thbel">(kg/cm²)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">Naik (kg/cm²)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">Turun (kg/cm²)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">Naik (kg/cm²)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">Turun (kg/cm²)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">Naik (kg/cm²)</span></td>
        <td class="border" style="line-height: 18px; text-align: center;"><span class="thbel">Turun (kg/cm²)</span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">1</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun1'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">2</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun2'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">3</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun3'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">4</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun4'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">5</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun5'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">6</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun6'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">7</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun7'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">8</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun8'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">9</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun9'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">10</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun10'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">11</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun11'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">12</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun12'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">13</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun13'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">14</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun14'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">15</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_persen15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['titik_kgcm15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_naik15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['alat_turun15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_naik15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['standar_turun15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_naik15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . $row['koreksi_turun15'] . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
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
        <td><span>Nomor sertifikat alat standar adalah Fluke PV350.</span></td>
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
        <td width="8"></td>
        <td  class="border" width="89px"><span>Dibuat Oleh:</span></td>
        <td  class="border" width="81px"><span>Dicek Oleh:</span></td>
        <td  class="border" width="110px"><span>Disetujui Oleh:</span></td>
        <td  class="border" width="81px"><span>Diterima Oleh:</span></td>
        <td width="175px"><span>Diterbitkan Tanggal:</span></td>
    </tr>
    <tr>
        <td style="height: 10px;"></td>
    </tr>
    <tr>
        <td></td>
        <td style="width: 89px;  height: 60px; text-align: center; display: flex; align-item: center;">     </td>
        <td style="width: 81px;  height: 60px; text-align: center;">    </td>
        <td style="width: 110px; height: 60px; text-align: center;"><span>      </span></td>
        <td style="width: 81px;  height: 60px; text-align: center;">        </td>
        <td><span class="metode">Catatan:</span></td>
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
        <a href="../form-pdf.php"><button class="btn ">Back</button></a>
    </div>
    </div>
    </div>

</body>
</html>