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


// titik kalibrasi
$nan1   = isset($_POST['nan1']) && is_numeric($_POST['nan1']) ? $_POST['nan1'] : 0;
$nan21  = isset($_POST['nan21']) && is_numeric($_POST['nan21']) ? $_POST['nan21'] : 0;
$nan41  = isset($_POST['nan41']) && is_numeric($_POST['nan41']) ? $_POST['nan41'] : 0;
$nan61  = isset($_POST['nan61']) && is_numeric($_POST['nan61']) ? $_POST['nan61'] : 0;
$nan81  = isset($_POST['nan81']) && is_numeric($_POST['nan81']) ? $_POST['nan81'] : 0;
$nan101 = isset($_POST['nan101']) && is_numeric($_POST['nan101']) ? $_POST['nan101'] : 0;
$nan121 = isset($_POST['nan121']) && is_numeric($_POST['nan121']) ? $_POST['nan121'] : 0;
$nan141 = isset($_POST['nan141']) && is_numeric($_POST['nan141']) ? $_POST['nan141'] : 0;
$nan161 = isset($_POST['nan161']) && is_numeric($_POST['nan161']) ? $_POST['nan161'] : 0;
$nan181 = isset($_POST['nan181']) && is_numeric($_POST['nan181']) ? $_POST['nan181'] : 0;
$nan201 = isset($_POST['nan201']) && is_numeric($_POST['nan201']) ? $_POST['nan201'] : 0;
$nan221 = isset($_POST['nan221']) && is_numeric($_POST['nan221']) ? $_POST['nan221'] : 0;
$nan241 = isset($_POST['nan241']) && is_numeric($_POST['nan241']) ? $_POST['nan241'] : 0;
$nan261 = isset($_POST['nan261']) && is_numeric($_POST['nan261']) ? $_POST['nan261'] : 0;
$nan281 = isset($_POST['nan281']) && is_numeric($_POST['nan281']) ? $_POST['nan281'] : 0;


$persen0 = 0;
$persen1 = isset($_POST['percenCalibration1']) && is_numeric($_POST['percenCalibration1']) ? $_POST['percenCalibration1'] : 0;
$titikpersen1 = number_format($persen1, 2, '.', '');
$persen2 = isset($_POST['percenCalibration2']) && is_numeric($_POST['percenCalibration2']) ? $_POST['percenCalibration2'] : 0;
$titikpersen2 = number_format($persen2, 2, '.', '');
$persen3 = isset($_POST['percenCalibration3']) && is_numeric($_POST['percenCalibration3']) ? $_POST['percenCalibration3'] : 0;
$titikpersen3 = number_format($persen3, 2, '.', '');
$persen4 = isset($_POST['percenCalibration4']) && is_numeric($_POST['percenCalibration4']) ? $_POST['percenCalibration4'] : 0;
$titikpersen4 = number_format($persen4, 2, '.', '');
$persen5 = isset($_POST['percenCalibration5']) && is_numeric($_POST['percenCalibration5']) ? $_POST['percenCalibration5'] : 0;
$titikpersen5 = number_format($persen5, 2, '.', '');
$persen6 = isset($_POST['percenCalibration6']) && is_numeric($_POST['percenCalibration6']) ? $_POST['percenCalibration6'] : 0;
$titikpersen6 = number_format($persen6, 2, '.', '');
$persen7 = isset($_POST['percenCalibration7']) && is_numeric($_POST['percenCalibration7']) ? $_POST['percenCalibration7'] : 0;
$titikpersen7 = number_format($persen7, 2, '.', '');
$persen8 = isset($_POST['percenCalibration8']) && is_numeric($_POST['percenCalibration8']) ? $_POST['percenCalibration8'] : 0;
$titikpersen8 = number_format($persen8, 2, '.', '');
$persen9 = isset($_POST['percenCalibration9']) && is_numeric($_POST['percenCalibration9']) ? $_POST['percenCalibration9'] : 0;
$titikpersen9 = number_format($persen9, 2, '.', '');
$persen10 = isset($_POST['percenCalibration10']) && is_numeric($_POST['percenCalibration10']) ? $_POST['percenCalibration10'] : 0;
$titikpersen10 = number_format($persen10, 2, '.', '');
$persen11 = isset($_POST['percenCalibration11']) && is_numeric($_POST['percenCalibration11']) ? $_POST['percenCalibration11'] : 0;
$titikpersen11 = number_format($persen11, 2, '.', '');
$persen12 = isset($_POST['percenCalibration12']) && is_numeric($_POST['percenCalibration12']) ? $_POST['percenCalibration12'] : 0;
$titikpersen12 = number_format($persen12, 2, '.', '');
$persen13 = isset($_POST['percenCalibration13']) && is_numeric($_POST['percenCalibration13']) ? $_POST['percenCalibration13'] : 0;
$titikpersen13 = number_format($persen13, 2, '.', '');
$persen14 = isset($_POST['percenCalibration14']) && is_numeric($_POST['percenCalibration14']) ? $_POST['percenCalibration14'] : 0;
$titikpersen14 = number_format($persen14, 2, '.', '');


// alat naik
$nan17  = isset($_POST['nan17']) && is_numeric($_POST['nan17']) ? $_POST['nan17'] : 0;
$nan37  = isset($_POST['nan37']) && is_numeric($_POST['nan37']) ? $_POST['nan37'] : 0;
$nan57  = isset($_POST['nan57']) && is_numeric($_POST['nan57']) ? $_POST['nan57'] : 0;
$nan77  = isset($_POST['nan77']) && is_numeric($_POST['nan77']) ? $_POST['nan77'] : 0;
$nan97  = isset($_POST['nan97']) && is_numeric($_POST['nan97']) ? $_POST['nan97'] : 0;
$nan117 = isset($_POST['nan117']) && is_numeric($_POST['nan117']) ? $_POST['nan117'] : 0;
$nan137 = isset($_POST['nan137']) && is_numeric($_POST['nan137']) ? $_POST['nan137'] : 0;
$nan157 = isset($_POST['nan157']) && is_numeric($_POST['nan157']) ? $_POST['nan157'] : 0;
$nan177 = isset($_POST['nan177']) && is_numeric($_POST['nan177']) ? $_POST['nan177'] : 0;
$nan197 = isset($_POST['nan197']) && is_numeric($_POST['nan197']) ? $_POST['nan197'] : 0;
$nan217 = isset($_POST['nan217']) && is_numeric($_POST['nan217']) ? $_POST['nan217'] : 0;
$nan237 = isset($_POST['nan237']) && is_numeric($_POST['nan237']) ? $_POST['nan237'] : 0;
$nan257 = isset($_POST['nan257']) && is_numeric($_POST['nan257']) ? $_POST['nan257'] : 0;
$nan277 = isset($_POST['nan277']) && is_numeric($_POST['nan277']) ? $_POST['nan277'] : 0;
$nan297 = isset($_POST['nan297']) && is_numeric($_POST['nan297']) ? $_POST['nan297'] : 0;

// standar naik
$nan18 = isset($_POST['nan18']) && is_numeric($_POST['nan18']) ? $_POST['nan18'] : 0;
$standarn1 = number_format($nan18, 1, '.', '');
$nan38  = isset($_POST['nan38']) && is_numeric($_POST['nan38']) ? $_POST['nan38'] : 0;
$standarn2 = number_format($nan38, 1, '.', '');
$nan58  = isset($_POST['nan58']) && is_numeric($_POST['nan58']) ? $_POST['nan58'] : 0;
$standarn3 = number_format($nan58, 1, '.', '');
$nan78  = isset($_POST['nan78']) && is_numeric($_POST['nan78']) ? $_POST['nan78'] : 0;
$standarn4 = number_format($nan78, 1, '.', '');
$nan98  = isset($_POST['nan98']) && is_numeric($_POST['nan98']) ? $_POST['nan98'] : 0;
$standarn5 = number_format($nan98, 1, '.', '');
$nan118 = isset($_POST['nan118']) && is_numeric($_POST['nan118']) ? $_POST['nan118'] : 0;
$standarn6 = number_format($nan118, 1, '.', '');
$nan138 = isset($_POST['nan138']) && is_numeric($_POST['nan138']) ? $_POST['nan138'] : 0;
$standarn7 = number_format($nan138, 1, '.', '');
$nan158 = isset($_POST['nan158']) && is_numeric($_POST['nan158']) ? $_POST['nan158'] : 0;
$standarn8 = number_format($nan158, 1, '.', '');
$nan178 = isset($_POST['nan178']) && is_numeric($_POST['nan178']) ? $_POST['nan178'] : 0;
$standarn9 = number_format($nan178, 1, '.', '');
$nan198 = isset($_POST['nan198']) && is_numeric($_POST['nan198']) ? $_POST['nan198'] : 0;
$standarn10 = number_format($nan198, 1, '.', '');
$nan218 = isset($_POST['nan218']) && is_numeric($_POST['nan218']) ? $_POST['nan218'] : 0;
$standarn11 = number_format($nan218, 1, '.', '');
$nan238 = isset($_POST['nan238']) && is_numeric($_POST['nan238']) ? $_POST['nan238'] : 0;
$standarn12 = number_format($nan238, 1, '.', '');
$nan258 = isset($_POST['nan258']) && is_numeric($_POST['nan258']) ? $_POST['nan258'] : 0;
$standarn13 = number_format($nan258, 1, '.', '');
$nan278 = isset($_POST['nan278']) && is_numeric($_POST['nan278']) ? $_POST['nan278'] : 0;
$standarn14 = number_format($nan278, 1, '.', '');
$nan298 = isset($_POST['nan298']) && is_numeric($_POST['nan298']) ? $_POST['nan298'] : 0;
$standarn15 = number_format($nan298, 1, '.', '');

// koreksi naik
$nan19  = isset($_POST['nan19']) && is_numeric($_POST['nan19']) ? $_POST['nan19'] : 0;
$koreksin1 = number_format($nan19, 1, '.', '');
$nan39  = isset($_POST['nan39']) && is_numeric($_POST['nan39']) ? $_POST['nan39'] : 0;
$koreksin2 = number_format($nan39, 1, '.', '');
$nan59  = isset($_POST['nan59']) && is_numeric($_POST['nan59']) ? $_POST['nan59'] : 0;
$koreksin3 = number_format($nan59, 1, '.', '');
$nan79  = isset($_POST['nan79']) && is_numeric($_POST['nan79']) ? $_POST['nan79'] : 0;
$koreksin4 = number_format($nan79, 1, '.', '');
$nan99  = isset($_POST['nan99']) && is_numeric($_POST['nan99']) ? $_POST['nan99'] : 0;
$koreksin5 = number_format($nan99, 1, '.', '');
$nan119 = isset($_POST['nan119']) && is_numeric($_POST['nan119']) ? $_POST['nan119'] : 0;
$koreksin6 = number_format($nan119, 1, '.', '');
$nan139 = isset($_POST['nan139']) && is_numeric($_POST['nan139']) ? $_POST['nan139'] : 0;
$koreksin7 = number_format($nan139, 1, '.', '');
$nan159 = isset($_POST['nan159']) && is_numeric($_POST['nan159']) ? $_POST['nan159'] : 0;
$koreksin8 = number_format($nan159, 1, '.', '');
$nan179 = isset($_POST['nan179']) && is_numeric($_POST['nan179']) ? $_POST['nan179'] : 0;
$koreksin9 = number_format($nan179, 1, '.', '');
$nan199 = isset($_POST['nan199']) && is_numeric($_POST['nan199']) ? $_POST['nan199'] : 0;
$koreksin10 = number_format($nan199, 1, '.', '');
$nan219 = isset($_POST['nan219']) && is_numeric($_POST['nan219']) ? $_POST['nan219'] : 0;
$koreksin11 = number_format($nan219, 1, '.', '');
$nan239 = isset($_POST['nan239']) && is_numeric($_POST['nan239']) ? $_POST['nan239'] : 0;
$koreksin12 = number_format($nan239, 1, '.', '');
$nan259 = isset($_POST['nan259']) && is_numeric($_POST['nan259']) ? $_POST['nan259'] : 0;
$koreksin13 = number_format($nan259, 1, '.', '');
$nan279 = isset($_POST['nan279']) && is_numeric($_POST['nan279']) ? $_POST['nan279'] : 0;
$koreksin14 = number_format($nan279, 1, '.', '');
$nan299 = isset($_POST['nan299']) && is_numeric($_POST['nan299']) ? $_POST['nan299'] : 0;
$koreksin15 = number_format($nan299, 1, '.', '');


// alat turun
$bac17  = isset($_POST['bac17']) && is_numeric($_POST['bac17']) ? $_POST['bac17'] : 0;
$bac37  = isset($_POST['bac37']) && is_numeric($_POST['bac37']) ? $_POST['bac37'] : 0;
$bac57  = isset($_POST['bac57']) && is_numeric($_POST['bac57']) ? $_POST['bac57'] : 0;
$bac77  = isset($_POST['bac77']) && is_numeric($_POST['bac77']) ? $_POST['bac77'] : 0;
$bac97  = isset($_POST['bac97']) && is_numeric($_POST['bac97']) ? $_POST['bac97'] : 0;
$bac117 = isset($_POST['bac117']) && is_numeric($_POST['bac117']) ? $_POST['bac117'] : 0;
$bac137 = isset($_POST['bac137']) && is_numeric($_POST['bac137']) ? $_POST['bac137'] : 0;
$bac157 = isset($_POST['bac157']) && is_numeric($_POST['bac157']) ? $_POST['bac157'] : 0;
$bac177 = isset($_POST['bac177']) && is_numeric($_POST['bac177']) ? $_POST['bac177'] : 0;
$bac197 = isset($_POST['bac197']) && is_numeric($_POST['bac197']) ? $_POST['bac197'] : 0;
$bac217 = isset($_POST['bac217']) && is_numeric($_POST['bac217']) ? $_POST['bac217'] : 0;
$bac237 = isset($_POST['bac237']) && is_numeric($_POST['bac237']) ? $_POST['bac237'] : 0;
$bac257 = isset($_POST['bac257']) && is_numeric($_POST['bac257']) ? $_POST['bac257'] : 0;
$bac277 = isset($_POST['bac277']) && is_numeric($_POST['bac277']) ? $_POST['bac277'] : 0;
$bac297 = isset($_POST['bac297']) && is_numeric($_POST['bac297']) ? $_POST['bac297'] : 0;

// standar turun
$bac18 = isset($_POST['bac18']) && is_numeric($_POST['bac18']) ? $_POST['bac18'] : 0;
$standart1 = number_format($bac18, 1, '.', '');
$bac38  = isset($_POST['bac38']) && is_numeric($_POST['bac38']) ? $_POST['bac38'] : 0;
$standart2 = number_format($bac38, 1, '.', '');
$bac58  = isset($_POST['bac58']) && is_numeric($_POST['bac58']) ? $_POST['bac58'] : 0;
$standart3 = number_format($bac58, 1, '.', '');
$bac78  = isset($_POST['bac78']) && is_numeric($_POST['bac78']) ? $_POST['bac78'] : 0;
$standart4 = number_format($bac78, 1, '.', '');
$bac98  = isset($_POST['bac98']) && is_numeric($_POST['bac98']) ? $_POST['bac98'] : 0;
$standart5 = number_format($bac98, 1, '.', '');
$bac118 = isset($_POST['bac118']) && is_numeric($_POST['bac118']) ? $_POST['bac118'] : 0;
$standart6 = number_format($bac118, 1, '.', '');
$bac138 = isset($_POST['bac138']) && is_numeric($_POST['bac138']) ? $_POST['bac138'] : 0;
$standart7 = number_format($bac138, 1, '.', '');
$bac158 = isset($_POST['bac158']) && is_numeric($_POST['bac158']) ? $_POST['bac158'] : 0;
$standart8 = number_format($bac158, 1, '.', '');
$bac178 = isset($_POST['bac178']) && is_numeric($_POST['bac178']) ? $_POST['bac178'] : 0;
$standart9 = number_format($bac178, 1, '.', '');
$bac198 = isset($_POST['bac198']) && is_numeric($_POST['bac198']) ? $_POST['bac198'] : 0;
$standart10 = number_format($bac198, 1, '.', '');
$bac218 = isset($_POST['bac218']) && is_numeric($_POST['bac218']) ? $_POST['bac218'] : 0;
$standart11 = number_format($bac218, 1, '.', '');
$bac238 = isset($_POST['bac238']) && is_numeric($_POST['bac238']) ? $_POST['bac238'] : 0;
$standart12 = number_format($bac238, 1, '.', '');
$bac258 = isset($_POST['bac258']) && is_numeric($_POST['bac258']) ? $_POST['bac258'] : 0;
$standart13 = number_format($bac258, 1, '.', '');
$bac278 = isset($_POST['bac278']) && is_numeric($_POST['bac278']) ? $_POST['bac278'] : 0;
$standart14 = number_format($bac278, 1, '.', '');
$bac298 = isset($_POST['bac298']) && is_numeric($_POST['bac298']) ? $_POST['bac298'] : 0;
$standart15 = number_format($bac298, 1, '.', '');

// koreksi turun
$bac19  = isset($_POST['bac19']) && is_numeric($_POST['bac19']) ? $_POST['bac19'] : 0;
$koreksit1 = number_format($bac19, 1, '.', '');
$bac39  = isset($_POST['bac39']) && is_numeric($_POST['bac39']) ? $_POST['bac39'] : 0;
$koreksit2 = number_format($bac39, 1, '.', '');
$bac59  = isset($_POST['bac59']) && is_numeric($_POST['bac59']) ? $_POST['bac59'] : 0;
$koreksit3 = number_format($bac59, 1, '.', '');
$bac79  = isset($_POST['bac79']) && is_numeric($_POST['bac79']) ? $_POST['bac79'] : 0;
$koreksit4 = number_format($bac79, 1, '.', '');
$bac99  = isset($_POST['bac99']) && is_numeric($_POST['bac99']) ? $_POST['bac99'] : 0;
$koreksit5 = number_format($bac99, 1, '.', '');
$bac119 = isset($_POST['bac119']) && is_numeric($_POST['bac119']) ? $_POST['bac119'] : 0;
$koreksit6 = number_format($bac119, 1, '.', '');
$bac139 = isset($_POST['bac139']) && is_numeric($_POST['bac139']) ? $_POST['bac139'] : 0;
$koreksit7 = number_format($bac139, 1, '.', '');
$bac159 = isset($_POST['bac159']) && is_numeric($_POST['bac159']) ? $_POST['bac159'] : 0;
$koreksit8 = number_format($bac159, 1, '.', '');
$bac179 = isset($_POST['bac179']) && is_numeric($_POST['bac179']) ? $_POST['bac179'] : 0;
$koreksit9 = number_format($bac179, 1, '.', '');
$bac199 = isset($_POST['bac199']) && is_numeric($_POST['bac199']) ? $_POST['bac199'] : 0;
$koreksit10 = number_format($bac199, 1, '.', '');
$bac219 = isset($_POST['bac219']) && is_numeric($_POST['bac219']) ? $_POST['bac219'] : 0;
$koreksit11 = number_format($bac219, 1, '.', '');
$bac239 = isset($_POST['bac239']) && is_numeric($_POST['bac239']) ? $_POST['bac239'] : 0;
$koreksit12 = number_format($bac239, 1, '.', '');
$bac259 = isset($_POST['bac259']) && is_numeric($_POST['bac259']) ? $_POST['bac259'] : 0;
$koreksit13 = number_format($bac259, 1, '.', '');
$bac279 = isset($_POST['bac279']) && is_numeric($_POST['bac279']) ? $_POST['bac279'] : 0;
$koreksit14 = number_format($bac279, 1, '.', '');
$bac299 = isset($_POST['bac299']) && is_numeric($_POST['bac299']) ? $_POST['bac299'] : 0;
$koreksit15 = number_format($bac299, 1, '.', '');

$uhasil1  = isset($_POST['uhasil1']) && is_numeric($_POST['uhasil1']) ? $_POST['uhasil1'] : 0;
$tidakpasti1 = number_format($uhasil1, 2, '.', '');
$uhasil2  = isset($_POST['uhasil2']) && is_numeric($_POST['uhasil2']) ? $_POST['uhasil2'] : 0;
$tidakpasti2 = number_format($uhasil2, 2, '.', '');
$uhasil3  = isset($_POST['uhasil3']) && is_numeric($_POST['uhasil3']) ? $_POST['uhasil3'] : 0;
$tidakpasti3 = number_format($uhasil3, 2, '.', '');
$uhasil4  = isset($_POST['uhasil4']) && is_numeric($_POST['uhasil4']) ? $_POST['uhasil4'] : 0;
$tidakpasti4 = number_format($uhasil4, 2, '.', '');
$uhasil5  = isset($_POST['uhasil5']) && is_numeric($_POST['uhasil5']) ? $_POST['uhasil5'] : 0;
$tidakpasti5 = number_format($uhasil5, 2, '.', '');
$uhasil6  = isset($_POST['uhasil6']) && is_numeric($_POST['uhasil6']) ? $_POST['uhasil6'] : 0;
$tidakpasti6 = number_format($uhasil6, 2, '.', '');
$uhasil7  = isset($_POST['uhasil7']) && is_numeric($_POST['uhasil7']) ? $_POST['uhasil7'] : 0;
$tidakpasti7 = number_format($uhasil7, 2, '.', '');
$uhasil8  = isset($_POST['uhasil8']) && is_numeric($_POST['uhasil8']) ? $_POST['uhasil8'] : 0;
$tidakpasti8 = number_format($uhasil8, 2, '.', '');
$uhasil9  = isset($_POST['uhasil9']) && is_numeric($_POST['uhasil9']) ? $_POST['uhasil9'] : 0;
$tidakpasti9 = number_format($uhasil9, 2, '.', '');
$uhasil10 = isset($_POST['uhasil10']) && is_numeric($_POST['uhasil10']) ? $_POST['uhasil10'] : 0;
$tidakpasti10 = number_format($uhasil10, 2, '.', '');
$uhasil11 = isset($_POST['uhasil11']) && is_numeric($_POST['uhasil11']) ? $_POST['uhasil11'] : 0;
$tidakpasti11 = number_format($uhasil11, 2, '.', '');
$uhasil12 = isset($_POST['uhasil12']) && is_numeric($_POST['uhasil12']) ? $_POST['uhasil12'] : 0;
$tidakpasti12 = number_format($uhasil12, 2, '.', '');
$uhasil13 = isset($_POST['uhasil13']) && is_numeric($_POST['uhasil13']) ? $_POST['uhasil13'] : 0;
$tidakpasti13 = number_format($uhasil13, 2, '.', '');
$uhasil14 = isset($_POST['uhasil14']) && is_numeric($_POST['uhasil14']) ? $_POST['uhasil14'] : 0;
$tidakpasti14 = number_format($uhasil14, 2, '.', '');
$uhasil15 = isset($_POST['uhasil15']) && is_numeric($_POST['uhasil15']) ? $_POST['uhasil15'] : 0;
$tidakpasti15 = number_format($uhasil15, 2, '.', '');

$tanggal_dibuat = date('m/d/Y');

// email
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = "PT.BUMI ALAM SEGAR";
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $email3 = $_POST['email3'];
    $email4 = $_POST['email4'];
    
    $stmt = $conn->prepare("INSERT INTO pressure_handover (
    departemen, lokasi, nomor_kalibrasi, nama_alat, merk, tipe, kapasitas, resolusi, lokasi_kalibrasi, suhu_ruangan, kelembaban, range_penggunaan_alat, limits_of_permissible_error, kode_alat, tgl_kalibrasi, tgl_kalibrasi_ulang, 
    titik_persen1, titik_persen2, titik_persen3, titik_persen4, titik_persen5, titik_persen6, titik_persen7, titik_persen8, titik_persen9, titik_persen10, titik_persen11, titik_persen12, titik_persen13, titik_persen14, titik_persen15, 
    titik_kgcm1, titik_kgcm2, titik_kgcm3, titik_kgcm4, titik_kgcm5, titik_kgcm6, titik_kgcm7, titik_kgcm8, titik_kgcm9, titik_kgcm10, titik_kgcm11, titik_kgcm12, titik_kgcm13, titik_kgcm14, titik_kgcm15, 
    alat_naik1, alat_naik2, alat_naik3, alat_naik4, alat_naik5, alat_naik6, alat_naik7, alat_naik8, alat_naik9, alat_naik10, alat_naik11, alat_naik12, alat_naik13, alat_naik14, alat_naik15, 
    standar_naik1, standar_naik2, standar_naik3, standar_naik4, standar_naik5, standar_naik6, standar_naik7, standar_naik8, standar_naik9, standar_naik10, standar_naik11, standar_naik12, standar_naik13, standar_naik14, standar_naik15, 
    koreksi_naik1, koreksi_naik2, koreksi_naik3, koreksi_naik4, koreksi_naik5, koreksi_naik6, koreksi_naik7, koreksi_naik8, koreksi_naik9, koreksi_naik10, koreksi_naik11, koreksi_naik12, koreksi_naik13, koreksi_naik14, koreksi_naik15, 
    alat_turun1, alat_turun2, alat_turun3, alat_turun4, alat_turun5, alat_turun6, alat_turun7, alat_turun8, alat_turun9, alat_turun10, alat_turun11, alat_turun12, alat_turun13, alat_turun14, alat_turun15, 
    standar_turun1, standar_turun2, standar_turun3, standar_turun4, standar_turun5, standar_turun6, standar_turun7, standar_turun8, standar_turun9, standar_turun10, standar_turun11, standar_turun12, standar_turun13, standar_turun14, standar_turun15, 
    koreksi_turun1, koreksi_turun2, koreksi_turun3, koreksi_turun4, koreksi_turun5, koreksi_turun6, koreksi_turun7, koreksi_turun8, koreksi_turun9, koreksi_turun10, koreksi_turun11, koreksi_turun12, koreksi_turun13, koreksi_turun14, koreksi_turun15, 
    ketidakpastian1, ketidakpastian2, ketidakpastian3, ketidakpastian4, ketidakpastian5, ketidakpastian6, ketidakpastian7, ketidakpastian8, ketidakpastian9, ketidakpastian10, ketidakpastian11, ketidakpastian12, ketidakpastian13, ketidakpastian14, ketidakpastian15, tanggal_dibuat) 
   
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssssssssssdddddddddddddddsssssssssssssssddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddds",
    $dept2, $lok2, $kal2, $nam2, $mer2, $tip2, $kap2, $res2, $lok_kal2, $suh2, $kel2, $rang2, $lim2, $kode, $tanggal_kalibrasi2, $tanggal_kalibrasi_ulang2,
     $persen0, $titikpersen1, $titikpersen2, $titikpersen3, $titikpersen4, $titikpersen5, $titikpersen6, $titikpersen7, $titikpersen8, $titikpersen9, $titikpersen10, $titikpersen11, $titikpersen12, $titikpersen13, $titikpersen14, 
     $nan1, $nan21, $nan41, $nan61, $nan81, $nan101, $nan121, $nan141, $nan161, $nan181, $nan201, $nan221, $nan241, $nan261, $nan281, 
     $nan17, $nan37, $nan57, $nan77, $nan97, $nan117, $nan137, $nan157, $nan177, $nan197, $nan217, $nan237, $nan257, $nan277, $nan297,
     $standarn1, $standarn2, $standarn3, $standarn4, $standarn5, $standarn6, $standarn7, $standarn8, $standarn9, $standarn10, $standarn11, $standarn12, $standarn13, $standarn14, $standarn15, 
     $koreksin1, $koreksin2, $koreksin3, $koreksin4, $koreksin5, $koreksin6, $koreksin7, $koreksin8, $koreksin9, $koreksin10, $koreksin11, $koreksin12, $koreksin13, $koreksin14, $koreksin15,
     $bac17, $bac37, $bac57, $bac77, $bac97, $bac117, $bac137, $bac157, $bac177, $bac197, $bac217, $bac237, $bac257, $bac277, $bac297, 
     $standart1, $standart2, $standart3, $standart4, $standart5, $standart6, $standart7, $standart8, $standart9, $standart10, $standart11, $standart12, $standart13, $standart14, $standart15,
     $koreksit1, $koreksit2, $koreksit3, $koreksit4, $koreksit5, $koreksit6, $koreksit7, $koreksit8, $koreksit9, $koreksit10, $koreksit11, $koreksit12, $koreksit13, $koreksit14, $koreksit15,
     $tidakpasti1, $tidakpasti2, $tidakpasti3, $tidakpasti4, $tidakpasti5, $tidakpasti6, $tidakpasti7, $tidakpasti8, $tidakpasti9, $tidakpasti10, $tidakpasti11, $tidakpasti12, $tidakpasti13, $tidakpasti14, $tidakpasti15, $tanggal_dibuat);

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

        $content1 = '
        <table>
            <tr>
                <td>kode</td>
                <td>:</td>
                <td>' . htmlspecialchars($kode) . '</td>
            </tr><tr>
                <td>Dibuat</td>
                <td>:</td>
                <td>' . htmlspecialchars($tanggal_dibuat) . '</td>
            </tr>
        </table>
        <a href="http://10.11.11.176/dokumentcontrol/approvement/pressure/log-in-app1.php?id= '.$last_id.'"><button>link to approval</button></a>';
        $content2 = '
        <table>
            <tr>
                <td>kode</td>
                <td>:</td>
                <td>' . htmlspecialchars($kode) . '</td>
            </tr><tr>
                <td>Dibuat</td>
                <td>:</td>
                <td>' . htmlspecialchars($tanggal_dibuat) . '</td>
            </tr>
        </table>
        <a href="http://10.11.11.176/dokumentcontrol/approvement/pressure/log-in-app2.php?id= '.$last_id.'"><button>link to approval</button></a>';
        $content3 = '
        <table>
            <tr>
                <td>kode</td>
                <td>:</td>
                <td>' . htmlspecialchars($kode) . '</td>
            </tr><tr>
                <td>Dibuat</td>
                <td>:</td>
                <td>' . htmlspecialchars($tanggal_dibuat) . '</td>
            </tr>
        </table>
        <a href="http://10.11.11.176/dokumentcontrol/approvement/pressure/log-in-app3.php?id= '.$last_id.'"><button>link to approval</button></a>';
        $content4 = '
        <table>
            <tr>
                <td>kode</td>
                <td>:</td>
                <td>' . htmlspecialchars($kode) . '</td>
            </tr><tr>
                <td>Dibuat</td>
                <td>:</td>
                <td>' . htmlspecialchars($tanggal_dibuat) . '</td>
            </tr>
        </table>
        <a href="http://10.11.11.176/dokumentcontrol/approvement/pressure/log-in-app4.php?id= '.$last_id.'"><button>link to approval</button></a>';

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
            $mail->Subject = 'Pressure-Form Approval request(Foreman Kalibrasi)';
            $mail->Body    = $content1;
            $mail->send();

            // Kirim email 2
            $mail->clearAddresses();
            $mail->addAddress($email2);
            $mail->Subject = 'Pressure-Form Approval request(Supervisor)';
            $mail->Body    = $content2;
            $mail->send();

            // Kirim email 3
            $mail->clearAddresses();
            $mail->addAddress($email3);
            $mail->Subject = 'Pressure-Form Approval request(Manager Enginnering)';
            $mail->Body    = $content3;
            $mail->send();

            // Kirim email 4
            $mail->clearAddresses();
            $mail->addAddress($email4);
            $mail->Subject = 'Pressure-Form Approval request(User)';
            $mail->Body    = $content4;
            $mail->send();

            header('Location:../../pages/kalibrasi/6-pressure/form.php?alert=Berhasil');
        } catch (Exception $e) {
            header('Location:../../pages/kalibrasi/6-pressure/form.php?alert=Beberapa');
        }
    } else {
            header('Location:../../pages/kalibrasi/6-pressure/form.php?alert=gagal');
    }

    $stmt->close();
    $conn->close();
}
?>