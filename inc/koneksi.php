<?php
mysql_connect("localhost","root","Sh4f1r4M4rlit47");
mysql_select_db("db_absensi");
date_default_timezone_set('Asia/Jakarta');

function selisih($jam_masuk,$jam_keluar) {
list($h,$m) = explode(":",$jam_masuk);
$dtAwal = mktime($h,$m,"1","1","1");
list($h,$m) = explode(":",$jam_keluar);
$dtAkhir = mktime($h,$m,"1","1","1");
$dtSelisih = $dtAkhir-$dtAwal;

$totalmenit=$dtSelisih/60;
$jam =explode(".",$totalmenit/60);
$sisamenit=($totalmenit/60)-$jam[0];
$sisamenit2=$sisamenit*60;
$jml_jam=$jam[0];
return $jml_jam." jam ".$sisamenit2." menit";
}

function  tanggal($tgl){
$tanggal  =  substr($tgl,8,2);
$bulan  =  getBulan(substr($tgl,5,2));
$tahun  =  substr($tgl,0,4);
return  $tanggal.' '.$bulan.' '.$tahun;
}
  
function  getBulan($bln){
switch  ($bln){
case  1:
return  "Januari";
break;
case  2:
return  "Februari";
break;
case  3:
return  "Maret";
break;
case  4:
return  "April";
break;
case  5:
return  "Mei";
break;
case  6:
return  "Juni";
break;
case  7:
return  "Juli";
break;
case  8:
return  "Agustus";
break;
case  9:
return  "September";
break;
case  10:
return  "Oktober";
break;
case  11:
return  "November";
break;
case  12:
return  "Desember";
break;
}
}

function hari($hari)
{
switch ($hari){
    case 0 : $hari="Minggu";
        Break;
    case 1 : $hari="Senin";
        Break;
    case 2 : $hari="Selasa";
        Break;
    case 3 : $hari="Rabu";
        Break;
    case 4 : $hari="Kamis";
        Break;
    case 5 : $hari="Jum'at";
        Break;
    case 6 : $hari="Sabtu";
        Break;
}
return $hari;
}

function hadir($var){
	if($var=='Y'){
		$status="Ya";
		return $status;
	}
	else if($var=='N'){
		$status="-";
		return $status;
	}
}

function status($var){
	if($var=='1'){
		$status="<span class='label label-success'> Aktif</span>";
		return $status;
	}
	else if($var=='0'){
		$status="<span class='label label-danger'>Resign</span>";
		return $status;
	}
}
function keterangan($var){
	if($var=='I'){
		$status="Izin";
		return $status;
	}
	else if($var=='S'){
		$status="Sakit";
		return $status;
	}
	else if($var=='M'){
		$status="<font color=green>Masuk</font>";
		return $status;
	} 
	else if($var=='MN'){
		$status="Melahirkan";
		return $status;
	} 
	else if($var=='MH'){
		$status="Menikah";
		return $status;
	} 
	else if($var=='C'){
		$status="Cuti";
		return $status;
	} 
	else if($var=='IH'){
		$status="Ibadah Haji";
		return $status;
	} 
	else if($var=='IU'){
		$status="Ibadah Umrah";
		return $status;
	} else {
		$status="Tidak Absen Pulang";
		return $status;
	}
}

?>