<?php
$radin =  "Radinka Dhiaulhaq";
$kelas =  "XI RPL_3";
$umur =  16;
$tinggi_badan = 172.5;


$tahunini = 2026;
$hitungan = $tahunini - $umur;
$status = False;

echo "!========Biodata Diri==========! <br> <br>";
echo "Nama Saya: $radin <br>";
echo "Kelas Saya: $kelas <br>";
echo "Umur Saya: $umur <br>";
echo "Tahun lahir saya: $hitungan <br>";

if ($status) {
    echo "Status: Radin ganteng banget jirss";
} else {
    echo "Status: Radin Ganteng";
}
?>