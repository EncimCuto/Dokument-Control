<?php
// Sertakan file TCPDF
require_once('../components/tcpdf/tcpdf.php'); // Path ke file TCPDF mungkin berbeda
require_once('../config/config2.php');

$dept2 = isset($_POST['dept2']) ? $_POST['dept2'] : 'Tidak tersedia';
$lok2 = isset($_POST['lok2']) ? $_POST['lok2'] : 'Tidak tersedia';
$kal2 = isset($_POST['kal2']) ? $_POST['kal2'] : 'Tidak tersedia';
$nam2 = isset($_POST['nam2']) ? $_POST['nam2'] : 'Tidak tersedia';
$mer2 = isset($_POST['mer2']) ? $_POST['mer2'] : 'Tidak tersedia';
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


// naik
$nan1 = isset($_POST['nan1']) && is_numeric($_POST['nan1']) ? $_POST['nan1'] : 0;
$nan17 = isset($_POST['nan17']) && is_numeric($_POST['nan17']) ? $_POST['nan17'] : 0;
$nan18 = isset($_POST['nan18']) && is_numeric($_POST['nan18']) ? $_POST['nan18'] : 0;
$nan19 = isset($_POST['nan19']) && is_numeric($_POST['nan19']) ? $_POST['nan19'] : 0;

$nan21 = isset($_POST['nan21']) && is_numeric($_POST['nan21']) ? $_POST['nan21'] : 0;
$nan37 = isset($_POST['nan37']) && is_numeric($_POST['nan37']) ? $_POST['nan37'] : 0;
$nan38 = isset($_POST['nan38']) && is_numeric($_POST['nan38']) ? $_POST['nan38'] : 0;
$nan39 = isset($_POST['nan39']) && is_numeric($_POST['nan39']) ? $_POST['nan39'] : 0;

$nan41 = isset($_POST['nan41']) && is_numeric($_POST['nan41']) ? $_POST['nan41'] : 0;
$nan57 = isset($_POST['nan57']) && is_numeric($_POST['nan57']) ? $_POST['nan57'] : 0;
$nan58 = isset($_POST['nan58']) && is_numeric($_POST['nan58']) ? $_POST['nan58'] : 0;
$nan59 = isset($_POST['nan59']) && is_numeric($_POST['nan59']) ? $_POST['nan59'] : 0;

$nan61 = isset($_POST['nan61']) && is_numeric($_POST['nan61']) ? $_POST['nan61'] : 0;
$nan77 = isset($_POST['nan77']) && is_numeric($_POST['nan77']) ? $_POST['nan77'] : 0;
$nan78 = isset($_POST['nan78']) && is_numeric($_POST['nan78']) ? $_POST['nan78'] : 0;
$nan79 = isset($_POST['nan79']) && is_numeric($_POST['nan79']) ? $_POST['nan79'] : 0;

$nan81 = isset($_POST['nan81']) && is_numeric($_POST['nan81']) ? $_POST['nan81'] : 0;
$nan97 = isset($_POST['nan97']) && is_numeric($_POST['nan97']) ? $_POST['nan97'] : 0;
$nan98 = isset($_POST['nan98']) && is_numeric($_POST['nan98']) ? $_POST['nan98'] : 0;
$nan99 = isset($_POST['nan99']) && is_numeric($_POST['nan99']) ? $_POST['nan99'] : 0;

$nan101 = isset($_POST['nan101']) && is_numeric($_POST['nan101']) ? $_POST['nan101'] : 0;
$nan117 = isset($_POST['nan117']) && is_numeric($_POST['nan117']) ? $_POST['nan117'] : 0;
$nan118 = isset($_POST['nan118']) && is_numeric($_POST['nan118']) ? $_POST['nan118'] : 0;
$nan119 = isset($_POST['nan119']) && is_numeric($_POST['nan119']) ? $_POST['nan119'] : 0;

$nan121 = isset($_POST['nan121']) && is_numeric($_POST['nan121']) ? $_POST['nan121'] : 0;
$nan137 = isset($_POST['nan137']) && is_numeric($_POST['nan137']) ? $_POST['nan137'] : 0;
$nan138 = isset($_POST['nan138']) && is_numeric($_POST['nan138']) ? $_POST['nan138'] : 0;
$nan139 = isset($_POST['nan139']) && is_numeric($_POST['nan139']) ? $_POST['nan139'] : 0;

$nan141 = isset($_POST['nan141']) && is_numeric($_POST['nan141']) ? $_POST['nan141'] : 0;
$nan157 = isset($_POST['nan157']) && is_numeric($_POST['nan157']) ? $_POST['nan157'] : 0;
$nan158 = isset($_POST['nan158']) && is_numeric($_POST['nan158']) ? $_POST['nan158'] : 0;
$nan159 = isset($_POST['nan159']) && is_numeric($_POST['nan159']) ? $_POST['nan159'] : 0;

$nan161 = isset($_POST['nan161']) && is_numeric($_POST['nan161']) ? $_POST['nan161'] : 0;
$nan177 = isset($_POST['nan177']) && is_numeric($_POST['nan177']) ? $_POST['nan177'] : 0;
$nan178 = isset($_POST['nan178']) && is_numeric($_POST['nan178']) ? $_POST['nan178'] : 0;
$nan179 = isset($_POST['nan179']) && is_numeric($_POST['nan179']) ? $_POST['nan179'] : 0;

$nan181 = isset($_POST['nan181']) && is_numeric($_POST['nan181']) ? $_POST['nan181'] : 0;
$nan197 = isset($_POST['nan197']) && is_numeric($_POST['nan197']) ? $_POST['nan197'] : 0;
$nan198 = isset($_POST['nan198']) && is_numeric($_POST['nan198']) ? $_POST['nan198'] : 0;
$nan199 = isset($_POST['nan199']) && is_numeric($_POST['nan199']) ? $_POST['nan199'] : 0;

$nan201 = isset($_POST['nan201']) && is_numeric($_POST['nan201']) ? $_POST['nan201'] : 0;
$nan217 = isset($_POST['nan217']) && is_numeric($_POST['nan217']) ? $_POST['nan217'] : 0;
$nan218 = isset($_POST['nan218']) && is_numeric($_POST['nan218']) ? $_POST['nan218'] : 0;
$nan219 = isset($_POST['nan219']) && is_numeric($_POST['nan219']) ? $_POST['nan219'] : 0;

$nan221 = isset($_POST['nan221']) && is_numeric($_POST['nan221']) ? $_POST['nan221'] : 0;
$nan237 = isset($_POST['nan237']) && is_numeric($_POST['nan237']) ? $_POST['nan237'] : 0;
$nan238 = isset($_POST['nan238']) && is_numeric($_POST['nan238']) ? $_POST['nan238'] : 0;
$nan239 = isset($_POST['nan239']) && is_numeric($_POST['nan239']) ? $_POST['nan239'] : 0;

$nan241 = isset($_POST['nan241']) && is_numeric($_POST['nan241']) ? $_POST['nan241'] : 0;
$nan257 = isset($_POST['nan257']) && is_numeric($_POST['nan257']) ? $_POST['nan257'] : 0;
$nan258 = isset($_POST['nan258']) && is_numeric($_POST['nan258']) ? $_POST['nan258'] : 0;
$nan259 = isset($_POST['nan259']) && is_numeric($_POST['nan259']) ? $_POST['nan259'] : 0;

$nan261 = isset($_POST['nan261']) && is_numeric($_POST['nan261']) ? $_POST['nan261'] : 0;
$nan277 = isset($_POST['nan277']) && is_numeric($_POST['nan277']) ? $_POST['nan277'] : 0;
$nan278 = isset($_POST['nan278']) && is_numeric($_POST['nan278']) ? $_POST['nan278'] : 0;
$nan279 = isset($_POST['nan279']) && is_numeric($_POST['nan279']) ? $_POST['nan279'] : 0;

$nan281 = isset($_POST['nan281']) && is_numeric($_POST['nan281']) ? $_POST['nan281'] : 0;
$nan297 = isset($_POST['nan297']) && is_numeric($_POST['nan297']) ? $_POST['nan297'] : 0;
$nan298 = isset($_POST['nan298']) && is_numeric($_POST['nan298']) ? $_POST['nan298'] : 0;
$nan299 = isset($_POST['nan299']) && is_numeric($_POST['nan299']) ? $_POST['nan299'] : 0;


// ambil turunan
$bac1 = isset($_POST['bac1']) && is_numeric($_POST['bac1']) ? $_POST['bac1'] : 0;
$bac17 = isset($_POST['bac17']) && is_numeric($_POST['bac17']) ? $_POST['bac17'] : 0;
$bac18 = isset($_POST['bac18']) && is_numeric($_POST['bac18']) ? $_POST['bac18'] : 0;
$bac19 = isset($_POST['bac19']) && is_numeric($_POST['bac19']) ? $_POST['bac19'] : 0;

$bac21 = isset($_POST['bac21']) && is_numeric($_POST['bac21']) ? $_POST['bac21'] : 0;
$bac37 = isset($_POST['bac37']) && is_numeric($_POST['bac37']) ? $_POST['bac37'] : 0;
$bac38 = isset($_POST['bac38']) && is_numeric($_POST['bac38']) ? $_POST['bac38'] : 0;
$bac39 = isset($_POST['bac39']) && is_numeric($_POST['bac39']) ? $_POST['bac39'] : 0;

$bac41 = isset($_POST['bac41']) && is_numeric($_POST['bac41']) ? $_POST['bac41'] : 0;
$bac57 = isset($_POST['bac57']) && is_numeric($_POST['bac57']) ? $_POST['bac57'] : 0;
$bac58 = isset($_POST['bac58']) && is_numeric($_POST['bac58']) ? $_POST['bac58'] : 0;
$bac59 = isset($_POST['bac59']) && is_numeric($_POST['bac59']) ? $_POST['bac59'] : 0;

$bac61 = isset($_POST['bac61']) && is_numeric($_POST['bac61']) ? $_POST['bac61'] : 0;
$bac77 = isset($_POST['bac77']) && is_numeric($_POST['bac77']) ? $_POST['bac77'] : 0;
$bac78 = isset($_POST['bac78']) && is_numeric($_POST['bac78']) ? $_POST['bac78'] : 0;
$bac79 = isset($_POST['bac79']) && is_numeric($_POST['bac79']) ? $_POST['bac79'] : 0;

$bac81 = isset($_POST['bac81']) && is_numeric($_POST['bac81']) ? $_POST['bac81'] : 0;
$bac97 = isset($_POST['bac97']) && is_numeric($_POST['bac97']) ? $_POST['bac97'] : 0;
$bac98 = isset($_POST['bac98']) && is_numeric($_POST['bac98']) ? $_POST['bac98'] : 0;
$bac99 = isset($_POST['bac99']) && is_numeric($_POST['bac99']) ? $_POST['bac99'] : 0;

$bac101 = isset($_POST['bac101']) && is_numeric($_POST['bac101']) ? $_POST['bac101'] : 0;
$bac117 = isset($_POST['bac117']) && is_numeric($_POST['bac117']) ? $_POST['bac117'] : 0;
$bac118 = isset($_POST['bac118']) && is_numeric($_POST['bac118']) ? $_POST['bac118'] : 0;
$bac119 = isset($_POST['bac119']) && is_numeric($_POST['bac119']) ? $_POST['bac119'] : 0;

$bac121 = isset($_POST['bac121']) && is_numeric($_POST['bac121']) ? $_POST['bac121'] : 0;
$bac137 = isset($_POST['bac137']) && is_numeric($_POST['bac137']) ? $_POST['bac137'] : 0;
$bac138 = isset($_POST['bac138']) && is_numeric($_POST['bac138']) ? $_POST['bac138'] : 0;
$bac139 = isset($_POST['bac139']) && is_numeric($_POST['bac139']) ? $_POST['bac139'] : 0;

$bac141 = isset($_POST['bac141']) && is_numeric($_POST['bac141']) ? $_POST['bac141'] : 0;
$bac157 = isset($_POST['bac157']) && is_numeric($_POST['bac157']) ? $_POST['bac157'] : 0;
$bac158 = isset($_POST['bac158']) && is_numeric($_POST['bac158']) ? $_POST['bac158'] : 0;
$bac159 = isset($_POST['bac159']) && is_numeric($_POST['bac159']) ? $_POST['bac159'] : 0;

$bac161 = isset($_POST['bac161']) && is_numeric($_POST['bac161']) ? $_POST['bac161'] : 0;
$bac177 = isset($_POST['bac177']) && is_numeric($_POST['bac177']) ? $_POST['bac177'] : 0;
$bac178 = isset($_POST['bac178']) && is_numeric($_POST['bac178']) ? $_POST['bac178'] : 0;
$bac179 = isset($_POST['bac179']) && is_numeric($_POST['bac179']) ? $_POST['bac179'] : 0;

$bac181 = isset($_POST['bac181']) && is_numeric($_POST['bac181']) ? $_POST['bac181'] : 0;
$bac197 = isset($_POST['bac197']) && is_numeric($_POST['bac197']) ? $_POST['bac197'] : 0;
$bac198 = isset($_POST['bac198']) && is_numeric($_POST['bac198']) ? $_POST['bac198'] : 0;
$bac199 = isset($_POST['bac199']) && is_numeric($_POST['bac199']) ? $_POST['bac199'] : 0;

$bac201 = isset($_POST['bac201']) && is_numeric($_POST['bac201']) ? $_POST['bac201'] : 0;
$bac217 = isset($_POST['bac217']) && is_numeric($_POST['bac217']) ? $_POST['bac217'] : 0;
$bac218 = isset($_POST['bac218']) && is_numeric($_POST['bac218']) ? $_POST['bac218'] : 0;
$bac219 = isset($_POST['bac219']) && is_numeric($_POST['bac219']) ? $_POST['bac219'] : 0;

$bac221 = isset($_POST['bac221']) && is_numeric($_POST['bac221']) ? $_POST['bac221'] : 0;
$bac237 = isset($_POST['bac237']) && is_numeric($_POST['bac237']) ? $_POST['bac237'] : 0;
$bac238 = isset($_POST['bac238']) && is_numeric($_POST['bac238']) ? $_POST['bac238'] : 0;
$bac239 = isset($_POST['bac239']) && is_numeric($_POST['bac239']) ? $_POST['bac239'] : 0;

$bac241 = isset($_POST['bac241']) && is_numeric($_POST['bac241']) ? $_POST['bac241'] : 0;
$bac257 = isset($_POST['bac257']) && is_numeric($_POST['bac257']) ? $_POST['bac257'] : 0;
$bac258 = isset($_POST['bac258']) && is_numeric($_POST['bac258']) ? $_POST['bac258'] : 0;
$bac259 = isset($_POST['bac259']) && is_numeric($_POST['bac259']) ? $_POST['bac259'] : 0;

$bac261 = isset($_POST['bac261']) && is_numeric($_POST['bac261']) ? $_POST['bac261'] : 0;
$bac277 = isset($_POST['bac277']) && is_numeric($_POST['bac277']) ? $_POST['bac277'] : 0;
$bac278 = isset($_POST['bac278']) && is_numeric($_POST['bac278']) ? $_POST['bac278'] : 0;
$bac279 = isset($_POST['bac279']) && is_numeric($_POST['bac279']) ? $_POST['bac279'] : 0;

$bac281 = isset($_POST['bac281']) && is_numeric($_POST['bac281']) ? $_POST['bac281'] : 0;
$bac297 = isset($_POST['bac297']) && is_numeric($_POST['bac297']) ? $_POST['bac297'] : 0;
$bac298 = isset($_POST['bac298']) && is_numeric($_POST['bac298']) ? $_POST['bac298'] : 0;
$bac299 = isset($_POST['bac299']) && is_numeric($_POST['bac299']) ? $_POST['bac299'] : 0;

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// Hapus header dan footer default

$pdf = new TCPDF();
$pdf->SetPrintHeader(false);
$pdf->AddPage('A4');
$pdf->SetMargins(2, -5, 5);
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

$pdf->SetLineWidth(0.3);
$pdf->Rect(7.8, 79.5, $pdf->getPageWidth() - 16, $pdf->getPageHeight() - 155);

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
    </table>
<table>
<tr><td></td></tr>
    <tr>
        <td style="text-align: center;"><span class="metode">HASIL KALIBRASI</span></td>
    </tr>
</table>

<table>
<tr><td  style="line-height: 10px"></td></tr>
    <tr>
        <td width="8"></td>
        <td class="border" rowspan="2" height="30px" width="20px" style="line-height: 55px; text-align: center;"><span class="metode">No</span></td>
        <td class="border" colspan="2" width="116px" style="line-height: 20px; text-align: center;"><span class="metode">Titik Kalibrasi</span></td>
        <td class="border" colspan="2" width="110px" style="line-height: 15px; text-align: center;"><span class="metode">Pembacaan Alat yang Dikalibrasi ( r )</span></td>
        <td class="border" colspan="2" width="102px" style="line-height: 15px; text-align: center;"><span class="metode">Pembacaan Alat Standar ( t )</span></td>
        <td class="border" colspan="2" width="102px" style="line-height: 20px; text-align: center;"><span class="metode">Koreksi ( t - r )</span></td>
        <td class="border" rowspan="2" width="100px" style=" text-align: center;"><br><br><span class="metode">Ketidakpastian</span><br><span class="metode">U95</span><br><span class="metode">(kg/cm²)</span></td>
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
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan1) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan17) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac17) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan18) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac18) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan19) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac19) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">2</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan21) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan37) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac37) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan38) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac38) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan39) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac39) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">3</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan41) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan57) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac57) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan58) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac58) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan59) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac59) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">4</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan61) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan77) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac77) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan78) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac78) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan79) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac79) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">5</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan81) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan97) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac97) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan98) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac98) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan99) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac99) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">6</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan101) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan117) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac117) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan118) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac118) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan119) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac119) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">7</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan121) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan137) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac137) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan138) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac138) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan139) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac139) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">8</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan141) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan157) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac157) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan158) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac158) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan159) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac159) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">9</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan161) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan177) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac177) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan178) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac178) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan179) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac179) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">10</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan181) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan197) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac197) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan198) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac198) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan199) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac199) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">11</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan201) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan217) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac217) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan218) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac218) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan219) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac219) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">12</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan221) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan237) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac237) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan238) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac238) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan239) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac239) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">13</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan241) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan257) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac257) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan258) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac258) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan259) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac259) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">14</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan261) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan277) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac277) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan278) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac278) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan279) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac279) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
    </tr>
    <tr>
        <td width="8"></td>
        <td class="border" height="10px" style="line-height: 13px; text-align: center;"><span class="thbel">15</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span class="thbel"> </span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan281) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan297) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac297) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan298) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac298) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($nan299) . '</span></td>
        <td class="border" style="line-height: 13px; text-align: center;"><span>' . htmlspecialchars($bac299) . '</span></td>
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
        <td width="8px" style="line-height: 125px;"></td>
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
        <td style="line-height: 15px;"></td>
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
        <td width="89px"><span>Dibuat Oleh:</span></td>
        <td width="81px"><span>Dicek Oleh:</span></td>
        <td width="110px"><span>Disetujui Oleh:</span></td>
        <td width="81px"><span>Diterima Oleh:</span></td>
        <td width="190px"><span>Diterbitkan Tanggal:</span></td>
    </tr>
    <tr>
        <td></td>
        <td height="59px"></td>
        <td></td>
        <td></td>
        <td></td>
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
$pdf->SetY($pdf->GetY() - 6);
$pdf->writeHTML($header, true, false, true, false, '');

// Naik
$r1 = 215 - ($nan17 / 2);     $b1 = 215 - ($nan18 / 2);
$r2 = 215 - ($nan37 / 2);     $b2 = 215 - ($nan38 / 2);
$r3 = 215 - ($nan57 / 2);     $b3 = 215 - ($nan58 / 2);
$r4 = 215 - ($nan77 / 2);     $b4 = 215 - ($nan78 / 2);
$r5 = 215 - ($nan97 / 2);     $b5 = 215 - ($nan98 / 2);
$r6 = 215 - ($nan117 / 2);     $b6 = 215 - ($nan118 / 2);
$r7 = 215 - ($nan137 / 2);     $b7 = 215 - ($nan138 / 2);
$r8 = 215 - ($nan157 / 2);     $b8 = 215 - ($nan158 / 2);
$r9 = 215 - ($nan177 / 2);     $b9 = 215 - ($nan178 / 2);
$r10 = 215 - ($nan297 / 2);     $b10 = 215 - ($nan298 / 2);
$r11 = 215 - ($nan217 / 2);     $b11 = 215 - ($nan218 / 2);
$r12 = 215 - ($nan237 / 2);     $b12 = 215 - ($nan238 / 2);
$r13 = 215 - ($nan257 / 2);     $b13 = 215 - ($nan258 / 2);
$r14 = 215 - ($nan277 / 2);     $b14 = 215 - ($nan278 / 2);
$r15 = 215 - ($nan297 / 2);     $b15 = 215 - ($nan298 / 2);

// Turun
$y1 = 215 - ($bac17 / 2);     $g1 = 215 - ($bac18 / 2);
$y2 = 215 - ($bac37 / 2);     $g2 = 215 - ($bac38 / 2);
$y3 = 215 - ($bac57 / 2);     $g3 = 215 - ($bac58 / 2);
$y4 = 215 - ($bac77 / 2);     $g4 = 215 - ($bac78 / 2);
$y5 = 215 - ($bac97 / 2);     $g5 = 215 - ($bac98 / 2);
$y6 = 215 - ($bac117 / 2);     $g6 = 215 - ($bac118 / 2);
$y7 = 215 - ($bac137 / 2);     $g7 = 215 - ($bac138 / 2);
$y8 = 215 - ($bac157 / 2);     $g8 = 215 - ($bac158 / 2);
$y9 = 215 - ($bac177 / 2);     $g9 = 215 - ($bac178 / 2);
$y10 = 215 - ($bac297 / 2);     $g10 = 215 - ($bac298 / 2);
$y11 = 215 - ($bac217 / 2);     $g11 = 215 - ($bac218 / 2);
$y12 = 215 - ($bac237 / 2);     $g12 = 215 - ($bac238 / 2);
$y13 = 215 - ($bac257 / 2);     $g13 = 215 - ($bac258 / 2);
$y14 = 215 - ($bac277 / 2);     $g14 = 215 - ($bac278 / 2);
$y15 = 215 - ($bac297 / 2);     $g15 = 215 - ($bac298 / 2);

// titik kalibrasi
$a1 = 215 - ($nan1 / 2);
$a2 = 215 - ($nan21 / 2);
$a3 = 215 - ($nan41 / 2);
$a4 = 215 - ($nan61 / 2);
$a5 = 215 - ($nan81 / 2);
$a6 = 215 - ($nan101 / 2);
$a7 = 215 - ($nan121 / 2);
$a8 = 215 - ($nan141 / 2);
$a9 = 215 - ($nan161 / 2);
$a10 = 215 - ($nan181 / 2);
$a11 = 215 - ($nan201 / 2);
$a12 = 215 - ($nan221 / 2);
$a13 = 215 - ($nan241 / 2);
$a14 = 215 - ($nan261 / 2);
$a15 = 215 - ($nan281 / 2);

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

// create name
date_default_timezone_set('Asia/Jakarta');
$currentDate = date('d-m-Y');
$currentDateTime = date('H:i:s');

// save string
$pdfContent = $pdf->Output('', 'S'); 

// convert to biner
$pdfContent = $conn->real_escape_string($pdfContent);

// insert into database
$sql = "INSERT INTO certificate_pressure (tanggal, keterangan, pdf) VALUES ('$currentDate', 'sertificate-pressure ($currentDate)-($currentDateTime) ', '$pdfContent')";

// after saving back to form page
if ($conn->query($sql) === TRUE) {
    header('location:../pages/kalibrasi/6-pressure/form.php');
    echo"<script>alert('');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>