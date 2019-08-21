<link href="assets/css/bootstrap.css" rel="stylesheet" />
<style type="text/css">
* {font-size:13px;
font-family:Arial, Helvetica, sans-serif;
}
p 	{
line-height:5px;
}

@media print
{
.print {display:none}
}
</style>
<title>Print</title>
<body onLoad="indow.print()">
<?php
error_reporting(0);
include"inc/koneksi.php";


 function bulan($x)	{
 $bulan = array('01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'); 
 return $bulan[$x];
 }

$SQL=mysql_query("SELECT A.id_absensi, A.tanggal_absen,A.jam_masuk,A.jam_keluar,A.ket,A.terlambat,B.id_karyawan,B.nama,B.dept,B.jabatan FROM tbl_absen A,tbl_karyawan B WHERE A.id_karyawan=B.id_karyawan AND A.tanggal_absen>='".$_POST['awal']."' AND A.tanggal_absen<='".$_POST['sampai']."' AND pin='".$_POST['pin']."' ORDER BY id_absensi ASC");
if(mysql_num_rows($SQL) >0 )	{
 
$absensi = array();
$SQL2=mysql_query("SELECT A.id_absensi,A.tanggal_absen,A.jam_masuk,A.jam_keluar,A.ket,A.terlambat,B.id_karyawan,B.nama,B.dept,B.jabatan FROM tbl_absen A,tbl_karyawan B WHERE A.id_karyawan=B.id_karyawan AND A.tanggal_absen>='".$_POST['awal']."' AND A.tanggal_absen<='".$_POST['sampai']."' AND pin='".$_POST['pin']."' ORDER BY tanggal_absen ASC");
while($data = mysql_fetch_array($SQL2)){
  $absensi[$data['tanggal_absen']] = $data;
}
$libur = array();
$SQL3=mysql_query("SELECT * FROM tbl_libur WHERE tanggal>='".$_POST['awal']."' AND tanggal<='".$_POST['sampai']."'");
while($data = mysql_fetch_array($SQL3)){
$libur[$data['tanggal']] = $data['description'];
}

if(mysql_num_rows($SQL)>0 )	{
$cetak=mysql_fetch_array($SQL);
$tgl = $cetak['tanggal_absen']; 
$exp = explode('-',$tgl);

echo'

<table width="750" border="0" align="center">
  <tr>
    <td width="161" valign="top"><img src="images/logo.jpg" width="152" height="74"></td>
    <td width="442"><p style="font-size:18px;">PT. SERASI AUTORAYA</p>
      <small>
      <p>Jl. Soekarno Hatta No. 135</p>
      <p>Kel. Siring Agung Palembang</p>
      <p>Telp. (0711) 444999 Fax. (0711) 441188</p>
    </small></td>
    <td width="37">&nbsp;</td>
    <td width="37">&nbsp;</td>
    <td width="39">&nbsp;</td>
  </tr>
</table>
<br>
<div class="panel panel-info">
<div class="panel-heading">
 <center> <h4> Laporan Absensi Karyawan Outsource Perbulan</h4></center>
</div>
  <div class="panel-body">
 
<table width="461" border="0" align="center" style="padding:10px;">
  <tr>
    <td width="159">Nama Karyawan</td>
    <td width="12">:</td>
    <td width="276"> '.$cetak['nama'].'</td>
  </tr>
  <tr>
    <td>Department</td>
    <td>:</td>
    <td>'.$cetak['dept'].'</td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td>:</td>
    <td>'.$cetak['jabatan'].'</td>
  </tr>
  <tr>
    <td>Periode  </td>
    <td>:</td>
    <td>'.tanggal($_POST['awal']).' s/d '.tanggal($_POST['sampai']).'</td>
  </tr>
  
</table>
';

echo'
<br>
<table  align="center" width="750" border="0">
<tr>
<td>
<table class="table table-bordered" align="center" width="700" border="0" >
  <tr style="font-weight:bold" align="center">
    
    <td>Tanggal</td>
	 <td>Hari</td>
    <td>Jam Masuk</td>
    <td>Jam Keluar</td>
    <td>Keterangan</td>
    <td> Terlambat </td>
    <td> Jam  Kerja</td>
  </tr>';
  
 // $ym = $_POST['year'].'-'.$_POST['month'];
 // $date1 = $ym.'-01';
//  $date2 = ($ym==date('Y-m')) ? date('Y-m-d') : $ym.date('-t',strtotime($ym));
 $date1=$_POST['awal'];
 $date2=$_POST['sampai'];
$alpha=0;
  while(strtotime($date1) <= strtotime($date2)){
    if(array_key_exists($date1, $absensi)){
      $jam_masuk = $absensi[$date1]['jam_masuk'];
      $jam_keluar = $absensi[$date1]['jam_keluar'];
      $ket = keterangan($absensi[$date1]['ket']);
      $terlambat = $absensi[$date1]['terlambat'];
    }
    else{
      $jam_masuk = '<font color=red>00:00:00</font>';
      $jam_keluar = '<font color=red>00:00:00</font>';
     if (array_key_exists($date1,$libur)) { $ket = $libur[$date1]; }
else if (date('w',strtotime($date1))==0){ $ket = '<font color=red>Minggu</font>'; }
else {
$ket = '<font color=red>Alpha</font>';
      $terlambat = '';
	 $alpha ++; 
	 }
    }
	
	
	
     echo'<tr>
           <td> <center>'.date('d',strtotime($date1)). ' </center></td>
		   <td> <center>'.hari(date('w',strtotime($date1))). ' </center></td>
           <td> <center>'.$jam_masuk.' </center></td>
           <td> <center>'.$jam_keluar.'</center> </td>
           <td> <center>'.$ket.'</center></td>
           <td> <center>'.hadir($terlambat).'</center> </td>
           <td> <center><font color=#666>'.selisih($jam_masuk,$jam_keluar). '</font></center></td>
         </tr>';
    $date1 = date('Y-m-d',strtotime($date1.'+1 days'));
   
  }
  unset($absensi);
  /*while($data=mysql_fetch_assoc($SQL2)) {
 
  $tanggal=explode('-',''.$data['tanggal_absen'].'');
 
   
   echo'<tr>
 
   <td> '.$tanggal[2]. '</td>
   <td> '.$data['jam_masuk'].' </td>
   <td> '.$data['jam_keluar'].' </td>
   <td> '.keterangan($data['ket']).' </td>
   <td> '.hadir($data['terlambat']).' </td>
   <td> <center>'.selisih($data['jam_masuk'],$data['jam_keluar']). '</center></td>
 </tr>';
 
   $no++; }*/
echo'</table> </div></div>';
?>
<?php } 

$sql1=mysql_fetch_assoc(mysql_query("select COUNT(ket) as masuk FROM tbl_absen WHERE ket='M' AND id_karyawan='".$cetak['id_karyawan']."' AND tanggal_absen>='".$_POST['awal']."' AND tanggal_absen<='".$_POST['sampai']."'"));
echo"<center> Keterangan : <span class='label label-success'>Masuk : ".$sql1['masuk']."</span> <span class='label label-danger'>Alpha : ".$alpha."</span>";

$sql2=mysql_fetch_assoc(mysql_query("select COUNT(status_keluar) as not_complete  FROM tbl_absen WHERE status_keluar='N' AND id_karyawan='".$cetak['id_karyawan']."' AND tanggal_absen>='".$_POST['awal']."' AND tanggal_absen<='".$_POST['sampai']."'"));
echo"  <span class='label label-warning'> Tidak Absen pulang : ".$sql2['not_complete']."</span>";

$sql3=mysql_fetch_assoc(mysql_query("select COUNT(ket) as sakit  FROM tbl_absen WHERE ket='S' AND id_karyawan='".$cetak['id_karyawan']."' AND tanggal_absen>='".$_POST['awal']."' AND tanggal_absen<='".$_POST['sampai']."'"));
echo"  <span class='label label-default'> Sakit : ".$sql3['sakit']."</span>";

$sql4=mysql_fetch_assoc(mysql_query("select COUNT(ket) as izin  FROM tbl_absen WHERE ket='I' AND id_karyawan='".$cetak['id_karyawan']."' AND tanggal_absen>='".$_POST['awal']."' AND tanggal_absen<='".$_POST['sampai']."'"));
echo"  <span class='label label-info'> Izin : ".$sql4['izin']."</span>";

$sql5=mysql_fetch_assoc(mysql_query("select COUNT(ket) as cuti  FROM tbl_absen WHERE ket='C' AND id_karyawan='".$cetak['id_karyawan']."' AND tanggal_absen>='".$_POST['awal']."' AND tanggal_absen<='".$_POST['sampai']."'"));
echo"  <span class='label label-primary'> Cuti : ".$sql5['cuti']."</span></center>";

}

else	{
echo" <br><div class='alert alert-danger'><i class='fa fa-warning'></i> Belum ada laporan absen untuk ditampilkan</div>";
}
?>
</body>