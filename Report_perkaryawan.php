<head>
 <link rel="stylesheet" href="choosen/chosen.css">
 <style type="text/css">
 .ming	{background-color:#e74c3c;
 color:white;
 font-weight:bold;
 }
 </style>
 </head>
 
 <?php
 /*
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
		$status="Masuk";
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
		$status="-";
		return $status;
	}
}

function kehadiran($var){
	if($var=='I'){
		$status="Tidak Masuk";
		return $status;
	}
	else if($var=='S'){
		$status="Tidak Masuk";
		return $status;
	}
	else if($var=='M'){
		$status="Masuk";
		return $status;
	} else {
		$status="-";
		return $status;
	}
}
 function bulan($x)	{
 $bulan = array('01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'); 
 return $bulan[$x];
 }
 */
 ?>
<form action="" method="post">
<legend><i class="fa fa-arrow-circle-o-right"> </i>  Laporan Absensi Karyawan Perbulan </legend>
  <table width="536" border="0">
    <tr>
      <td> <label>Bulan </label> </td>
      <td><select name="month" id="select2" class="form-control" required>
        <option value="">Pilih</option>
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label>Tahun</label></td>
      <td><select name="year" id="select3" class="form-control" required>
        <option value="">Pilih</option>
        <?php for($i=2014;$i<=date("Y");$i++){ ?>
        <option value="<?php echo $i;?>"> <?php echo $i; ?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="146">&nbsp;</td>
      <td width="286"><input type="submit" name="tampilkan" id="button" value="Tampilkan" class="btn btn-success" /></td>
    </tr>
  </table>
</form>
<?PHP
/*
session_start();
if(isset($_POST['tampilkan']))	{
$SQL=mysql_query("SELECT A.id_absensi, A.tanggal_absen,A.jam_masuk,A.jam_keluar,A.ket,A.terlambat,B.id_karyawan,B.nama,B.dept,B.jabatan FROM tbl_absen A,tbl_karyawan B WHERE A.id_karyawan=B.id_karyawan AND MONTH(tanggal_absen)='".$_POST['bulan']."' AND YEAR(tanggal_absen)='".$_POST['tahun']."' AND pin='".$_SESSION['SES_PIN']."' ORDER BY id_absensi ASC");

$SQL2=mysql_query("SELECT A.id_absensi,A.tanggal_absen,A.jam_masuk,A.jam_keluar,A.ket,A.terlambat,B.id_karyawan,B.nama,B.dept,B.jabatan FROM tbl_absen A,tbl_karyawan B WHERE A.id_karyawan=B.id_karyawan AND MONTH(tanggal_absen)='".$_POST['bulan']."' AND YEAR(tanggal_absen)='".$_POST['tahun']."' AND pin='". $_SESSION['SES_PIN']."' ORDER BY tanggal_absen ASC");

if(mysql_num_rows($SQL) >0 )	{
$cetak=mysql_fetch_array($SQL);
$tgl = $cetak['tanggal_absen']; 
$exp = explode('-',$tgl);

echo'<br>
<div class="panel panel-info">
<div class="panel-heading">
 <center> <h3 class="panel-title"> Laporan Absensi Karyawan Outsource Perbulan</h3></center>
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
    <td>Bulan </td>
    <td>:</td>
    <td>'.bulan($exp[1]).'</td>
  </tr>
  <tr>
    <td>Tahun</td>
    <td>:</td>
    <td>'.$_POST['tahun'].'</td>
  </tr>
</table>
';

echo'
<br>
<table class="table">
  <tr style="font-weight:bold">
    <td>No</td>
    <td>Tanggal</td>
    <td>Jam Masuk</td>
    <td>Jam Keluar</td>
    <td>Keterangan</td>
    <td> Terlambat </td>
    
  </tr>';
  
  $no=1;
  while($data=mysql_fetch_assoc($SQL2))	{
  $tanggal=explode('-',''.$data['tanggal_absen'].'');
echo $data['tot_masuk'];
  $week=date('w',strtotime($data['tanggal_absen']));
   if($week==0)	{
   echo'<tr  class="ming"><td> '.$no.'</td>';
   echo'<td colspan="5"><center> Hari Libur </center></td></tr>';
   
   }
   else {
   echo'<tr>
    <td> '.$no.' </td>
    <td> '.  $tanggal[2]. '</td>
    <td> '.$data['jam_masuk'].' </td>
    <td> '.$data['jam_keluar'].' </td>
    <td> '.keterangan($data['ket']).' </td>
    <td> '.hadir($data['terlambat']).' </td>
   
  </tr>';
  }
   $no++; }
echo'</table> </div></div>';
?>
<?php }  else	{

echo" <br><div class='alert alert-danger'><i class='fa fa-warning'></i> Belum ada data untuk ditampilkan</div>";

}
}
*/
?> 

<?php


 function bulan($x)	{
 $bulan = array('01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'); 
 return $bulan[$x];
 }
 
 if(isset($_POST['tampilkan']))	{
 
$SQL=mysql_query("SELECT A.id_absensi, A.tanggal_absen,A.jam_masuk,A.jam_keluar,A.ket,A.terlambat,B.id_karyawan,B.nama,B.dept,B.jabatan FROM tbl_absen A,tbl_karyawan B WHERE A.id_karyawan=B.id_karyawan AND MONTH(tanggal_absen)='".$_POST['month']."' AND YEAR(tanggal_absen)='".$_POST['year']."' AND pin='". $_SESSION['SES_PIN']."' ORDER BY id_absensi ASC");
if(mysql_num_rows($SQL) >0 )	{
 
$absensi = array();
$SQL2=mysql_query("SELECT A.id_absensi,A.tanggal_absen,A.jam_masuk,A.jam_keluar,A.ket,A.terlambat,B.id_karyawan,B.nama,B.dept,B.jabatan FROM tbl_absen A,tbl_karyawan B WHERE A.id_karyawan=B.id_karyawan AND MONTH(tanggal_absen)='".$_POST['month']."' AND YEAR(tanggal_absen)='".$_POST['year']."' AND pin='". $_SESSION['SES_PIN']."' ORDER BY tanggal_absen ASC");
while($data = mysql_fetch_array($SQL2)){
  $absensi[$data['tanggal_absen']] = $data;
}
$libur = array();
$SQL3=mysql_query("SELECT * FROM tbl_libur WHERE MONTH(tanggal)='".$_POST['month']."' AND YEAR(tanggal)='".$_POST['year']."'");
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
    <td width="161" valign="top"></td>
    <td width="442"></td>
    <td width="37">&nbsp;</td>
    <td width="37">&nbsp;</td>
    <td width="39">&nbsp;</td>
  </tr>
</table>
<br>
<div class="panel panel-success">
<div class="panel-heading">
 <center> <h4 class="panel-title"> Laporan Absensi Karyawan Outsource Perbulan</h4></center>
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
    <td>Bulan </td>
    <td>:</td>
    <td>'.bulan($exp[1]).'</td>
  </tr>
  <tr>
    <td>Tahun</td>
    <td>:</td>
    <td>'.$_POST['year'].'</td>
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
  
  $ym = $_POST['year'].'-'.$_POST['month'];
  $date1 = $ym.'-01';
  $date2 = ($ym==date('Y-m')) ? date('Y-m-d') : $ym.date('-t',strtotime($ym));
 
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
     if(array_key_exists($date1,$libur)) { $ket = $libur[$date1]; }
else if(date('w',strtotime($date1))==0) { $ket = '<font color=red>Minggu</font>'; }
else { $ket = '<font color=red>Alpha</font>';
      $terlambat = '';
	$alpha++; }
    }
     echo'<tr>
           <td> <center>'.date('d',strtotime($date1)). ' </center></td>
		   <td> <center>'.hari(date('w',strtotime($date1))). ' </center></td>
           <td> <center>'.$jam_masuk.' </center></td>
           <td> <center>'.$jam_keluar.'</center> </td>
           <td> <center>'.$ket.' </center></td>
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
$sql1=mysql_fetch_assoc(mysql_query("select COUNT(ket) as masuk FROM tbl_absen WHERE ket='M' AND id_karyawan='".$cetak['id_karyawan']."' AND MONTH(tanggal_absen)='".$_POST['month']."' AND YEAR(tanggal_absen)='".$_POST['year']."'"));
echo"<center> Keterangan : <span class='label label-success'>Masuk : ".$sql1['masuk']."</span> <span class='label label-danger'>Alpha : ".$alpha."</span>";

$sql2=mysql_fetch_assoc(mysql_query("select COUNT(status_keluar) as not_complete  FROM tbl_absen WHERE status_keluar='N' AND id_karyawan='".$cetak['id_karyawan']."' AND MONTH(tanggal_absen)='".$_POST['month']."' AND YEAR(tanggal_absen)='".$_POST['year']."'"));
echo"  <span class='label label-warning'> Tidak Absen pulang : ".$sql2['not_complete']."</span>";

$sql3=mysql_fetch_assoc(mysql_query("select COUNT(ket) as sakit  FROM tbl_absen WHERE ket='S' AND id_karyawan='".$cetak['id_karyawan']."' AND MONTH(tanggal_absen)='".$_POST['month']."' AND YEAR(tanggal_absen)='".$_POST['year']."'"));
echo"  <span class='label label-default'> Sakit : ".$sql3['sakit']."</span>";

$sql4=mysql_fetch_assoc(mysql_query("select COUNT(ket) as izin  FROM tbl_absen WHERE ket='I' AND id_karyawan='".$cetak['id_karyawan']."' AND MONTH(tanggal_absen)='".$_POST['month']."' AND YEAR(tanggal_absen)='".$_POST['year']."'"));
echo"  <span class='label label-info'> Izin : ".$sql4['izin']."</span>";

$sql5=mysql_fetch_assoc(mysql_query("select COUNT(ket) as cuti  FROM tbl_absen WHERE ket='C' AND id_karyawan='".$cetak['id_karyawan']."' AND MONTH(tanggal_absen)='".$_POST['month']."' AND YEAR(tanggal_absen)='".$_POST['year']."'"));
echo"  <span class='label label-primary'> Cuti : ".$sql5['cuti']."</span></center>";
}

else	{
echo" <br><div class='alert alert-danger'><i class='fa fa-warning'></i> Belum ada laporan absen untuk ditampilkan</div>";
}
}
?>

