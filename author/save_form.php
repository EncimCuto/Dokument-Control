<?php
session_start();
require_once '../config/config2.php';
require_once '../components/tcpdf/tcpdf.php';

// Periksa method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $departemen_pemilik = $_POST['departemen_pemilik'];
    $nama_alat = $_POST['nama_alat'];
    $kode_alat = $_POST['kode_alat'];
    $merk_alat = $_POST['merk_alat'];
    $tipe = $_POST['tipe'];
    $lokasi_alat = $_POST['lokasi_alat'];
    $nomor_kalibrasi = $_POST['kalibrasi'];
    $resolusi = $_POST['resolusi'];
    $pembacaan_terkecil = $_POST['pembacaan_terkecil'];
    $kapasitas = $_POST['kapasitas'];
    $kapasitas_alat = $_POST['kapasitas_alat'];
    $range_penggunaan = $_POST['range_penggunaan'];
    $limits_of_permissible_error = $_POST['limits_of_permissible_error'];
    $relates_form_balances = $_POST['relates_form_balances'];

    $pdf = new TCPDF();
    $pdf->SetPrintHeader(false);
    $pdf->AddPage('A4');
    $pdf->SetMargins(10, -5, 10);
    $pdf->SetAutoPageBreak(TRUE, 0);
    $pdf->SetFooterMargin(0);

    $logo = '<img src="../assets/LogoForm.png" />';
    $header = 
    '<table border="1" style="padding:0; margin:0; width: 100%; align-items:center;">
    <tr style="text-align: center;">
        <td style="width: 20%; height: 20px;"><div><br>'.$logo.'</div></td>
        <td style="width: 80%; height: 20px;"><div><h4>FORM KALIBRASI BALANCE</h4></div></td>
    </tr>
    <table style="border:1px solid black; padding-top: 2;">
    <tr>
        <td><h6>Departemen Pemilik : '. $departemen_pemilik .'</h6></td>    
        <td><h6>Nama Alat : '. $nama_alat .'</h6></td>
        <td><h6>Kode Alat : '. $kode_alat .'</h6></td>
        <td><h6>Merk Alat : '. $merk_alat .'</h6></td>
    </tr><tr>
        <td><h6>Tipe : '. $tipe .'</h6></td> 
        <td><h6>Lokasi Alat : '. $lokasi_alat .'</h6></td>   
        <td><h6>Nomor Kalibrasi : '. $nomor_kalibrasi .'</h6></td>
        <td><h6>Resolusi : '. $resolusi .'</h6></td>
    </tr><tr>
        <td><h6>Pembacaan Terkecil : '. $pembacaan_terkecil .'</h6></td> 
        <td><h6>Kapasitas : '. $kapasitas .'</h6></td>   
        <td><h6>Kapasitas Alat : '. $kapasitas_alat .'</h6></td>
        <td><h6>Range Penggunaan : '. $range_penggunaan .'</h6></td>
    </tr><tr>
        <td><h6>Limits of Pessible Error : '. $limits_of_permissible_error .'</h6></td>
        <td><h6>Relates Form Balance : '. $relates_form_balances .'</h6></td>
    </tr>
    </table>
    </table>';
    $pdf->Ln(-6);
    $html = 
    '<table border="1" cellpadding="0.2">
        <tr>
            <td colspan="7" align="center"><h6>A. Pengujian Kemampuan Ulang Pembacaan ( Mendekati Nol) </h6></td>
            <td rowspan="5"><h6>&nbsp;Dibuat Oleh :</h6></td>
        </tr>
        <tr align="center">
            <td rowspan="4" style="align-items:center;"><div><h6>Ulangan Ke -</h6></div></td>
            <td colspan="2"><h6>Mendekati Nol</h6></td>
            <td colspan="2"><h6>Setengah Kapasitas</h6></td>
            <td colspan="2"><h6>Full Kapasitas</h6></td>
        </tr>
         <tr align="center">
            <td colspan="2"><h6>…….  (gram)</h6></td>
            <td colspan="2"><h6>…….  (gram)</h6></td>
            <td colspan="2"><h6>…….  (gram)</h6></td>
        </tr>
         <tr align="center">
            <td colspan="2"><h6>Pembacaan</h6></td>
            <td colspan="2"><h6>Pembacaan</h6></td>
            <td colspan="2"><h6>Pembacaan</h6></td>
        </tr>
        <tr align="center">
            <td><h6>Z</h6></td>
            <td><h6>M</h6></td>
            <td><h6>Z</h6></td>
            <td><h6>M</h6></td>
            <td><h6>Z</h6></td>
            <td><h6>M</h6></td>
        </tr><tr>
            <td align="center"><h6>1</h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td rowspan="4"><h6>&nbsp;Dicek Oleh :</h6></td>
        </tr><tr>
            <td align="center"><h6>2</h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> 
        </tr><tr>
            <td align="center"><h6>3</h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> 
        </tr><tr>
            <td align="center"><h6>4</h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> 
        </tr><tr>
            <td align="center"><h6>5</h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td align="center"><h6> Staff</h6></td> 
        </tr><tr>
            <td align="center"><h6>6</h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td rowspan="4" ><h6>&nbsp;Diketahui Oleh :</h6></td>
        </tr><tr>
            <td align="center"><h6>7</h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> 
        </tr><tr>
            <td align="center"><h6>8</h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> 
        </tr><tr>
            <td align="center"><h6>9</h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> 
        </tr><tr>
            <td align="center"><h6>10</h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td align="center"><h6>SPV</h6></td> 
        </tr>
    </table>

    <table border="1" cellpadding="0.2">
        <tr>
            <td colspan="3" align="center"><h6>B. Keseragaman Skala</h6></td>
            <td colspan="5" align="center"><h6>C. Pengaruh Penyimpanan Pada Pinggan</h6></td>
        </tr><tr>
            <td rowspan="2" align="center"><h6>Beban Timbangan</h6></td>
            <td rowspan="2" align="center"><h6>Beban (gram)</h6></td>
            <td rowspan="2" align="center"><h6>Pembacaan Skala</h6></td>
            <td colspan="2"><h6>&nbsp;Diameter Pinggan</h6></td>
            <td><h6>&nbsp;:</h6></td>
            <td><h6>&nbsp;mm</h6></td>
            <td><h6></h6></td>
        </tr><tr>
            <td colspan="2"><h6>&nbsp;Massa Diatas Pinggan</h6></td>
            <td><h6>&nbsp;:</h6></td>
            <td><h6>&nbsp;gram</h6></td>
        </tr><tr>
            <td align="center"><h6>0</h6></td>
            <td><h6></h6></td>
            <td><h6></h6></td>
            <td colspan="5"><h6>&nbsp;Percobaan 1</h6></td>
        </tr><tr>
            <td align="center"><h6>1M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>1M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>0</h6></td>
            <td><h6></h6></td>
            <td><h6></h6></td>
            <td colspan="5"><h6>&nbsp;Percobaan 2</h6></td>
        </tr><tr>
            <td align="center"><h6>2M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>2M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>0</h6></td>
            <td><h6></h6></td>
            <td><h6></h6></td>
            <td colspan="5"><h6>&nbsp;Percobaan 3</h6></td>
        </tr><tr>
            <td align="center"><h6>3M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>3M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>0</h6></td>
            <td><h6></h6></td>
            <td><h6></h6></td>
            <td colspan="5"><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>4M</h6></td>
            <td><h6></h6></td>
            <td><h6></h6></td>
            <td colspan="5" align="center"><h6>D. Pengaruh Pengenolan Beban (Tare)</h6></td>
        </tr><tr>
            <td align="center"><h6>4M</h6></td>
            <td><h6></h6></td>
            <td></td>
            <td colspan="5"><h6>&nbsp;Massa Diatas pinggan = 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            gram</h6></td>
        </tr><tr>
            <td align="center"><h6>0</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td colspan="2" align="center"><h6>Tanpa Pengenolan</h6></td> <td><h6></h6></td>
            <td colspan="2"><h6 align="center">Memakai Pengenolan</h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>5M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td align="center"><h6>Beban</h6></td> <td><h6 align="center">Pembacaan</h6></td>
            <td><h6></h6></td> <td><h6 align="center">Beban</h6></td> <td align="center"><h6>Pembacaan</h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>5M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td align="center"><h6>Zero</h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td align="center"><h6>Zero</h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>0M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td align="center"><h6>M</h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6 align="center">M</h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>6M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td align="center"><h6>M</h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td align="center"><h6>M</h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>6M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td align="center"><h6>Zero</h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td align="center"><h6>Zero</h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr>
        <tr>
            <td align="center"><h6>0</h6></td>
            <td><h6></h6></td>
            <td><h6></h6></td>
            <td colspan="5"><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>7M</h6></td>
            <td><h6></h6></td>
            <td><h6></h6></td>
            <td colspan="5" rowspan="3" style="padding:0; margin:0; line-height: 0.4;">
            <h6><p>&nbsp;E. Histerisis</p></h6>

           <h6><p>&nbsp;Pembacaan Terkecil Timbangan = 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            gram</p></h6>

            <h6><p>&nbsp;M (Setengah Kapasitas Timbangan) = 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;gram</p></h6>
            </td>
        </tr><tr>
            <td align="center"><h6>7M</h6></td>
            <td><h6></h6></td>
            <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>0M</h6></td>
            <td><h6></h6></td>
            <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>8M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td colspan="2" align="center"><h6>Beban Diatas Pinggan</h6></td> <td align="center"><h6>1</h6></td>
            <td align="center"><h6>2</h6></td><td align="center"><h6>3</h6></td>
        </tr><tr>
            <td align="center"><h6>8M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td align="center"><h6>Zero</h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>0</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td align="center"><h6>M</h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>9M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td align="center"><h6>M+M\'</h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center"><h6>9M</h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td align="center"><h6>M</h6></td> <td><h6></h6></td>
            <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
        </tr><tr>
            <td align="center" colspan="3"><h6></h6></td>
            <td align="center"><h6>Zero</h6></td> <td><h6></h6></td> <td><h6></h6></td> <td><h6></h6></td>
            <td><h6></h6></td>
        </tr>
    </table>';

    $pdf->writeHTML($header, true, false, true, false,);
    $pdf->writeHTML($html, true, false, true, false,);
    $file_name = 'FORM_BALANCE_' . date('d') . '-' . date('n') . '-' . date('Y') . '.pdf';
    $pdf->Output($file_name, 'D');
    exit;
} else {
    header('Location: form.php');
    exit;
}
?>